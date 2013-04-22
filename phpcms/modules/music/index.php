<?php 
defined('IN_PHPCMS') or exit('No permission resources.');

class index{
	private $db;
	public $pre;
	/**
	 * 
	 * @param string $pre 表前缀
	 */
	
	public function __construct(){
		$this->db=pc_base::load_model("music_model");
		$this->_username=param::get_cookie('_username');
		$this->_userid=param::get_cookie('_userid');
		$this->pre=$this->db->db_tablepre;
		$this->sql='select * from '.$this->pre.'music as m inner join '.$this->pre.'music_data as md on m.id=md.id  ' ;
		pc_base::load_app_func('global');
	}
	public function init(){
			$sql='select m.url,m.title,s.title from v9_music as m inner join v9_singer as s on m.sid=s.id';
			$row=$this->db->fetch_array($this->db->query($sql));
	}

	/**
	 * @param  $_GET['id']
	 * @return page分页页面
	 * @return $data['music']  歌曲名称
	 * @return $data['singer'] 歌手
	 * @return $data['cname']  唱片公司
	 * @return $data['spname'] 专辑名称
	 * @return $data['mUrl']   歌曲附件地址
	 */

	public function lists(){
		if(!$_GET['id'])return false;
		isset($_GET['hash'])? $pageSize=50:$pageSize=10;
		isset($_GET['page'])?$page=$_GET['page']:$page=1;
		$where=' catid='.$_GET['id'];
		$row=$this->selectMusic('catid = '.$_GET['id'],0,$page,$pageSize);
		$page=$row['page'];
		$data=$row['data'];
		include template('music','lists');
	}
	/**
	 * @param [string] $_POST['search']['musicName']  查询歌曲名
	 * @param [string] $_POST['search']['singerName'] 查询歌手名
	 * @return [array] $data 查询得到的结果集
	 * @message 未完成功能  分页
	 */
	public function search()
	{
		
		if(!$_GET['search'])
		{
			return false;
			// 暂时返回个错误，之后改善
		}
		
		$musicName=$singerName='';
		$where='';
		$data=array();
		if(isset($_GET['search']['musicName']))
		{
			$key=$_GET['search']['musicName'];
			$where='title like "%'.$key.'%"';
			
		}else if(isset($_GET['search']['singerName']))
		{
			$key=$_GET['search']['singerName'];
			$where='singer like "%'.$key.'%"';
		}
		$data=$this->selectMusic($where);
		$num =count($data);
		include template('music','search');

	}

	/**
	 * 显示歌曲的全部信息
	 * @param [num] $_GET['id'];
	 */
	public function mp3()
	{
		if(!isset($_GET['id'])){
			return false;
		}

		$data=$this->selectMusic('m.id = '.$_GET['id']);
		extract($data[0]);
		$url=explode(',', $data[0][mUrl]);
		$url=explode('=>',$url[0]);

		$mUrl=trim($url[2]," '");
		if(substr($mUrl, 0,23)=='http://localhost/phpcms')
			{
				$mUrl=str_replace('http://localhost/phpcms',APP_PATH,$mUrl);
			}
			if(!$photo){
				$photo=$thumb;
			}
			
		include template('music','show_mp3');
	}

	public function selectMusic($where,$page=0,$page,$pageSize)
	{
		$sql=$this->sql.' where '.$where;
		if(!$page)
		{
			$data=$this->db->queryAll($sql);
			return $data;
		}
		$data=$infos=$row=array();

		$info=$this->db->my_listinfo(array('sql'=>$sql),'m.listorder desc,m.updatetime desc ',$page,$pageSize);
		$total=$this->db->number;
		if($total>0)
		{
				$pages=$this->db->pages;
				foreach($info as $_v)
				{
					if(strpos($_v['url'],'://')===false)$v['url']='1'.$v['url'];
					$data[]=$_v;
				}
				$row['pages']=$page;
				$row['data']=$data;

		}else{
			$row=$info;
		}

		return $row;
	}
	/**
	 * 添加投票数
	 * @return bollean [0:今天已经投过票 ,1:投票成功，-1:没有登陆,-2：超时]
	 */
	public function addVoteNum()
	{
			$id=$_POST['id'];
			// echo 1;exit;
			$catid=$_POST['catid'];
			$tablename=$this->pre.'chart_'.$_POST['tablename'];
			$addTime=time();
			switch ($this->checkIp($id,$tablename)) {
				case 0:
					echo 0;
					return ;
				case 1:
				$sql="update ".$tablename."_ip"." set  addtime = ".$addTime." ,catids = concat_ws('|',catids,".$id.")";
				break;
				case 2:
				$ip=ip();
				$sql="insert into ".$tablename."_ip"."(ip,addtime,catids)values('".$ip."' , ".$addTime.",".$id." )";
				default:
					# code...
					break;
			}
			if($this->db->query($sql))
				{
					$addVoteNumSql='update '.$tablename.' set point = point+1 where id='.$id;
					if($this->db->query($addVoteNumSql))
					{
						echo 1;
					}else{
						echo -2;
					}
					
				}else{
					echo -2;
				}


	}
	// 验证是否IP已投票
	/**是否已经投票
	 * 检查Ip
	 * @param  [int] $id    [榜单中的歌曲ID]
	 * @param  [int] $catid [description]
	 * @return [int] $stau  1:没投过票，0：投过票,2:没有投过票需要新建一条记录]; 
	 */
	private function checkIp($id,$tablename)
	{
		$ip=ip();
		$iptable=$tablename.'_ip';
		if(!isset($id)) exit('你没有权限进行此操作');
		$sql='select  catids ,addtime from '.$iptable.' where ip = "'.$ip.'"';
		$row=$this->db->queryAll($sql);
		$statu=1;
		
		// var_dump($row)
		// 获取结果如果不是空数组，那就拆分字符串进行比对
		if(!empty($row))
		{	
			$arr=explode('|',$row[0]['catids']);
			if((!in_array($id, $arr)) && $this->checkAddtime($row[0]['addtime']))
			{
				$statu=1;
			}else{
				$statu=0;
			}
		}else{
			$statu=2;
		}

		return $statu;
	}
	/**
	 * 检查是否当天已经投过票了
	 * 
	 * @return [bollean] [0:投过,1:没投过]
	 */
	private function checkAddtime($addTime)
	{
			$checkTime=date('Ymd');
			$addTime=date('Ymd',$addTime);
			if(intval($addTime)===intval($chekTiem))
			{
				return 0;
			}else{
				return 1;
			}
	}

	public function getMusic()
	{
		if(!$_GET['singer']){

			$sql='select m.title as music,m.id as id,s.id s uid ,s.title as singer from v9_music as m inner join v9_singer as s on m.singer like %s.title%';
			echo json_decode($this->db->queryAll($sql));
			return;
		}
		$sql='select * from v9_music where singer like "'.$_GET['singer'].'"';
		$data=$this->db->queryAll($sql);
		include template('music','mp3');


	}

	/**
	 * [加入收藏夹]
	 * @return [num] 1 添加成功 -1 需要登陆 -2 已经收藏
	 * @补充  人性化功能 在显示歌曲的时候显示是否已经搜查
	 */
	public function collect(){
	
		if(!$_POST['id']){
			echo '错误的操作';
			return ;

		}
		if(!$this->_userid){
			echo -1;
			return ;
		}
		// $sql ='select m.title as music,md.mUrl,s.title as  singer ,sp.title as spName from v9_music as m inner join v9_singer as s inner join v9_member_sc as sc inner join v9_sp as sp on m.id=md.id and m.sid=s.id and m.spid = sp.id and s.id = sd.id and s.id =sc.id where ';
		// $where = ' sid = '.;
		$db=pc_base::load_model('member_sc_model');
		$row=$db->get_one('id='.$this->_userid.' and  mid = '.$_POST['id']);
		if($row){
			echo -2;
			return;
		}
		$id=$db->insert(array('id'=>$this->_userid,'mid'=>$_POST['id']),true);
		if($id){
			echo 1;

		}

	}
	// 网友排行页面
	public function vote()
	{
		$week=$this->getNewChart();

		// for($i=0;$i<40;$i++)
		// {
		// 	$data[$i]=$week[0]['data'][0];
		// }
		$size=10;
		include template('music','vote');

	}
	/**
	 * 单类投票页面显示
	 * @param $catid 栏目的Id
	 * @return [type] [description]
	 */
	public function showVote()
	{
		isset($_GET['hash'])? $pageSize=50:$pageSize=9;
		isset($_GET['page'])?$page=$_GET['page']:$page=1;
		$id='';
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
		}
		$row=$this->getChar($id);
		$title=$row['title'];
		$data=$row['data'];
		include template("music","showVote");


	}
	/**
	 * 显示周榜的信息
	 * @param  $catid 栏目的ID
	 * @return [type] [description]
	 * @return [title] 
	 */
	public function showCharts()
	{

		isset($_GET['id'])?$id=$_GET['id']:$id=26;
		if(!$_GET['title'])
		{
			$week=$this->getNewChart();
		}else
		{

			$title=$_GET['title'];
			$sql='select * from v9_chart where title = "'.'第'.$title.'"  order by catid';
			$row=$this->db->queryAll($sql);
			$week=array();
			foreach ($row as $k=>$v) {
				
				$week[$k]=$this->getDatas($v['tablename']);
				$week[$k]['tablename']=$v['tablename'];
				$week[$k]['title']=$v['title'];
			}
		}
			include template("music",'showCharts');

		}


	// 获得最新的榜单信息
	public function getNewChart()
	{
		$week_n=$this->getChar(26);
		$week_g=$this->getChar(27);
		$week_m=$this->getChar(28);
		$week=array($week_n,$week_g,$week_m);
		return $week;
	}
	/**
	 * 获得分类的当前榜单
	 * @param  integer $id    因为栏目ID正好有20的差距所以加上20
	 * @param  integer $limit 取数据多少从0开始
	 * @return array   $data  获得的数据结果集
	 * @return string  $title 榜单标题 
	 * 待优化
	 */
	public function getChar($id,$limit=1)
	{
		if(!$id){
			exit("请指定榜单");
		}
	
		$id=$id+20;
		$sql='select id,title,tablename from v9_chart where catid='.$id.' and statu = 1 order by updatetime desc limit '.$limit;
		$chart=$this->db->queryAll($sql);
		$data=$this->getDatas($chart[0]['tablename']);
		$data['tablename']=$chart[0]['tablename'];
		$data['title']=$chart[0]['title'];
		return $data;
	}
	/**
	 * 获得数据并分页
	 * @param  string  $tablename [周榜表名]
	 * @param  integer $page      [分页号]
	 * @param  integer $limit     [数量条数]
	 * @return integer $id        榜单表中的主键
	 * @return array   $row       [二维数组包括得到的数据和分页]
	 */
	public function getDatas($tablename='',$page=1,$limit=10)
	{

		if(!$tablename || !$this->db->table_exists(substr($tablename, mb_strlen($this->pre))))
		{

			return $data='此表不存在';
		}


		$data=$infos=array();
		$sql='select m.title as music,m.singer,thumb,m.id as mid,ch.id as id,ch.point from '.$tablename.' as ch inner join '.$this->pre.'music as m inner join '.$this->pre.'music_data as md on ch.mid=m.id and m.id=md.id ';	

		$info=$this->db->my_listinfo(array('sql'=>$sql),'ch.point desc',$page,$limit);
		$total=$this->db->number;
		if($total>0)
		{
				$pages=$this->db->pages;
				foreach($info as $_v)
				{
					if(strpos($_v['url'],'://')===false)$v['url']='1'.$v['url'];
					$data[]=$_v;
				}

		}else{
			$data=$info;
		}
		
		$row['page']=$pages;
		$row['data']=$data;
		return $row;
	}

	// 榜单显示大页面
	// 单项
 	public function listCharts()
 	{
 		isset($_GET['t'])?$title=$_GET['t']:showmessage("非法操作");
 		isset($_GET['b'])?$tablename=$this->pre.'chart_'.$_GET['b']:showmessage('非法操作');
 		$row=$this->getDatas($tablename,'',40);
		$data=$row['data'];
		$page=$data['page'];
		for($j=0;$j<40;$j++){
			$datas[$j]=$data[0];
		}
 		include template('music','list_charts');
 	}

 	public function setPos()
 	{

 		if(!$_POST['id']) showmessage("非法操作");

 		if($_POST['statu']==1)
 		{
 			$statu=0;
 		}elseif($_POST['statu']==0){
 			$statu=1;

 		}else{
 			showmessage("非法操作");

 		}

 		$sql=$this->db->update(array("pos"=>$statu),'id = '.$$_POST['id']);

 		if($sql){
 			echo 1;
 		}else{
 			echo 2;
 		}



 	}




}



?>