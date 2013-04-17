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
		$this->sql='select * from '.$this->pre.'music as m inner join '.$this->pre.'music_data';
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
		isset($_GET['hash'])? $pageSize=50:$pageSize=9;
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
			if(!$this->_userid){
				echo -1;
				return;
			}
			$id=$_POST['id'];
			$catid=$_POST['catid'];
			$tablename=$_POST['tablename'];
			$ip='127.0.0.1';
			$addTime=time();
			switch ($this->checkIp($catid,$tablename)) {
				case 0:
					echo 0;
					return ;
				case 1:
				$sql="update ".$tablename."_ip"." set  addtime = ".$addTime." ,catids = concat_ws('|',catids,".$catid.")";
				break;
				case 2:
				$sql="insert into ".$tablename."_ip"."(ip,addtime,catids)values('".$ip."' , ".$addTime.",".$catid." )";
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
	private function checkIp($catid,$tablename)
	{
		$ip=ip();
		$ip='127.0.0.1';
		$iptable=$tablename.'_ip';
		if(!$catid) exit('你没有权限进行此操作');
		$sql='select  catids ,addtime from '.$iptable.' where ip = "'.$ip.'"';
		$row=$this->db->queryAll($sql);
		$statu=1;
		
		// var_dump($row)
		// 获取结果如果不是空数组，那就拆分字符串进行比对
		if(!empty($row))
		{	
			$arr=explode('|',$row[0]['catids']);
			if((!in_array($catid, $arr)) && $this->checkAddtime($row[0]['addtime']))
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


	// 获得专辑
	public function getSps()
	{
			if(isset($_POST['sid']))
			{
				$sid=$_POST['sid'];
				$where='sid = '.$sid;
			}else{
				$where='';
			}
			$db=pc_base::load_model('sp_model');
			$data=$db->select($where);
		 	echo json_encode($data);
		}

	public function getMusic()
	{
		if(!$_GET['id']){

			$sql='select m.title as music,m.id as id,s.id s uid ,s.title as singer from v9_music as m inner join v9_singer as s on m.sid = s.id';
			echo json_decode($this->db->queryAll($sql));
			return;
		}
		$sql='select m.title as music,m.id as id,sp.title as spName from v9_music as m inner join v9_sp as sp on m.spid=sp.id and m.sid = '.$_GET['id'];
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
		$title=$row[0]['title'];
		$tablename=$row[0]['tablename'];
		$char=$this->getDatas($tablename,$page,$pageSize);
		$data=$char['data'];
		$page=$char['page'];
		include template("music","showVote");


	}
	/**
	 * 显示周榜的信息
	 * @param  $catid 栏目的ID
	 * @return [type] [description]
	 */
	public function showCharts()
	{

		isset($_GET['id'])?$id=$_GET['id']:$id=26;
		$row=$this->getChar($id);
		$title=$row[0]['title'];
		$tablename=$row[0]['tablename'];
		$row=$this->getDatas($tablename);

		$data=$row['data'];
		$page=$data['page'];
		include template("music",'showCharts');
	}
	/**
	 * 获得分类的当前榜单
	 * @param  integer $id    因为栏目ID正好有20的差距所以加上20
	 * @param  integer $limit 取数据多少从0开始
	 * @return array   $data  获得的数据结果集
	 * @return string  $title 榜单标题 
	 */
	public function getChar($id,$limit=1)
	{
		if(!$id){
			exit("请指定榜单");
		}
		$id=$id+20;
		$sql='select id,title,tablename from v9_chart where catid='.$id.' and statu = 1 order by updatetime desc limit '.$limit;
		$data=$this->db->queryAll($sql);
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
		$sql='select m.title as music,m.id as mid,m.thumb as mthumb,s.url as surl,s.title, s.id as singerid,s.title as singer,ch.id as id,ch.point from '.$tablename.' as ch inner join '.$this->pre.'music as m inner join '.$this->pre.'singer as s on ch.mid=m.id and ch.sid=s.id ';
		
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
 		isset($_GET['id'])?$id=$_GET['id']:$id=26;
		$row=$this->getChar($id);
		$title=$row[0]['title'];
		$tablename=$row[0]['tablename'];
		$row=$this->getDatas($tablename,'',40);
		$data=$row['data'];
		$page=$data['page'];
 		include template('music','list_charts');
 	}



}



?>