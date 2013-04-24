<?php 

defined('IN_PHPCMS') or exit('No permission resources.');
// 榜单生成与处理
// 想法。定时发布表单
pc_base::load_app_class('admin','admin',0);
pc_base::load_sys_class('form','',0);
pc_base::load_app_func('util');
pc_base::load_sys_class('format','',0);
class charts extends admin{
	public  $db;
	public  $rid;
	private $min;
	public $tableName;
	public function __construct()
	{
		$this->db=pc_base::load_model("chart_model");
		// 实际表单为系统表单前缀+;
		$this->pre=$this->db->db_tablepre;
		$this->tableName='chart_';
			if(isset($_GET['catid']) && $_SESSION['roleid'] != 1 && ROUTE_A !='pass' && strpos(ROUTE_A,'public_')===false) {
			$catid = intval($_GET['catid']);
			$this->priv_db = pc_base::load_model('category_priv_model');
			$action = $this->categorys[$catid]['type']==0 ? ROUTE_A : 'init';
			$priv_datas = $this->priv_db->get_one(array('catid'=>$catid,'is_admin'=>1,'action'=>$action));
			
			if(!$priv_datas)  showmessage(L('permission_to_operate'),'blank');
		}

	}
	/**
	 * @param  [integer] $_GET['id'] 榜单
	 * @return [integer] [$num]      榜单内的歌曲条数
	 */
	public function admin()
	{
		isset($_GET['id'])?$id=$_GET['id']:showmessage("非法操作",'blank');
		$tablename=$this->pre.$this->tableName.$id;

		if($this->db->table_exists($this->tableName.$id))
		{
			$sql='select m.title as music,sid,m.singer,m.id as mid,ch.id as id,ch.point from '.$tablename.' as ch inner join '.$this->pre.'music as m on ch.mid=m.id  order by ch.point desc';
			$row=$this->db->queryAll($sql);
			$num=count($row);
		}else{
			showmessage('榜单中尚未有歌曲请添加');
		}
		
		include $this->admin_tpl('chart_admin');

	}
		
	// }
	/**
	 * 榜单生成
	 * @param  $_POST['table_a'] 表单后缀
	 * @param  $_POST['sids']    歌手id组合
	 * @param  $_POST['ids']     歌曲ID组合
	 * @return num               1：成功；-1：超时操作; -2:某些歌曲已经存在表单中功能后期
	 */
	public function createChart()
	{

		if(!$_POST['table_a'] || !$_POST['sids'] || !$_POST['ids'] ){
			echo -1;
			return;

		}
		$ids=$sids=array();
		$table_a=$_POST['table_a'];
		$tableName=$this->db->db_tablepre.$this->tableName.$table_a;
		$sids=explode(',',$_POST['sids']);
		$ids=explode(',',trim($_POST['ids'],','));
		$updateSQL="update v9_chart set tablename = '$tableName' where id = $table_a";
		$this->db->query($updateSQL);
		if(!$this->db->table_exists($this->tableName.$table_a))
		{

			$crSQL='create table '.$tableName.' select * from v9_chart_back where 1=2;';
			$pkSQL='alter table '.$tableName.' change id id int not null primary key auto_increment;';
			$this->db->query($crSQL);
			$this->db->query($pkSQL);
						
		}

		// 创建对应的IP表 格式为v9_charts_N_ip N=>num
		if(!$this->db->table_exists($this->tableName.$table_a.'_ip'))
			{
				$ipSQL='create table '.$tableName.'_ip'.' select * from v9_charts_ip_back where 1=2;';
				$this->db->query($ipSQL);

			}



		foreach ($ids as $k => $v) {

			$select='select id from '.$tableName.' where mid = '.$v;
			if(!$this->db->queryAll($select)){
				$sql='insert into '.$tableName.'(mid,cid)values('.trim($v).','.trim($table_a).');';
				if($this->db->query($sql)){
					$statu=1;
				}else{
					$statu=0;
				}		
			}
		

		}
			if($statu){
				echo 1;
			}
		
	}

	// 修改发布状态
	/**
	 * @param $id 榜单ID
	 * @param $statu  状态
	 * @return [num] 1 成功刷新页面;
	 */
	public function changeType()
	{
		if(!$_POST){
			return ;
		}
		if(intval($_POST['statu'])==1)
		{
			$statu=2;
		}elseif(intval($_POST['statu'])==2){
			$statu=1;
		}
		if($this->db->update(array('statu'=>$statu),' id = '.intval($_POST['id'])))
		{

			echo 1;

		}else{
			echo 2;
		}

	}
	/**
	 * 删除榜单中的歌曲
	 * @return [num] 1:删除成功；-1：删除失败
	 */
	public function deleteMusic()
	{
		if(!$_POST['id']) return '非法操作，请刷新页面后重试';
		$id=rtrim($_POST['id'],',');
		$tablename=$_POST['tablename'];
		$sql='delete from '.$tablename.' where id in ('.$id.' )';

		if($this->db->query($sql))
		{
			echo 1;
		}else{
			echo -1;
		}

	}
	/**
	 * 修改票数
	 * @param  id        歌曲在榜单中的Id；
	 * @param  tablename 表单的表名；
	 * @param  point     修改后需要达到的票数
	 * @return [statu]      1:修改成功；-1：修改失败
	 */
	public function changePoint(){
		if(!$_POST['id'])
		{
			return '非法操作，请刷新页面后重试';
		}
		$sql='update '.$_POST['tablename'].' set point = '.$_POST['point'].' where id = '.$_POST['id'];
		if($this->db->query($sql)){

			echo 1;
		}else{
			echo -1;
		}

	}
	/**
	 * @param  id       歌曲在榜单中的Id 
	 * @param  tablname 表单名
	 * @param  pos      是否推荐
	 * @return [statu]  1:修改成功；-1：修改失败
	 */
	public function setPos()
	{
		if(!$_POST['id'])
		{
			return '非法操作，请刷新页面后重试';
		}
		if($_POST['pos']==1){
			$pos=0;
		}else if($_POST['pos']==0){
			$pos=1;
		}
		$sql='update '.$_POST['tablename'].' set sid = '.$pos.' where id = '.$_POST['id'];
		if($this->db->query($sql)){
			echo 1;
		}else{
			echo -1;
		}
	}




	/**
	 * 月榜的生成与后台管理
	 */

	public function createMounth()
	{
		$catid=$_POST['catid'];
		$id=$_POST['id'];
		$lastDay=date("t");
		// 获得当前月的最后一天和第一天的时间戳；
		$first=strtotime(date("Y-m-1"));
		$last=strtotime(date("Y-m-".$lastDay));	
		//获取对应周榜中的Id
		$sql='select * from v9_chart where catid='.$catid.' and inputtime between '.$first.' and '.$last;
		$row=$this->db->queryAll($sql);
		$chids=array();
		foreach ($row as $k=> $v) {	
			$chids[]=$v['id'];		
		}
		if($this->updateMounth($id,$chids))
		{
			$tablename=$this->pre.'mounth_'.$id;

			if(!$this->db->table_exists('mounth_'.$id))
			{
				$crSQL=' create table '.$tablename.' (id int not null primary key auto_increment,mid int ,hids text,meids varchar (400),eids varchar (400),hgrade int,megrade int,exgrade int,commit text)';
				
				if($this->db->query($crSQL))
				{
					$statu=1;
				}else{
					$stau=0;
				}
			}
		}
		$data=$this->getMusics($catid+10,$chids);
		
		echo $this->addMusicToMounth($data,$id);
	}
	/**
	 * 验证月榜中周榜的Id
	 * @param  [integer] $id   [月榜的主键]
	 * @return [array]   $data [周榜Id素组]
	 */
	public function getchids($id,$chids)
	{
		$mouSQL='select chids from v9_mounth where id='.$id;
		$data=$this->db->queryAll($mouSQL);
		$data=explode(',', $data[0]['chids']);
		$chid='';
		foreach ($chids as $v) {
			if(!in_array($v, $data))
			{
				$chid.=$v.',';
			}
		}

		return rtrim($chid,',');
	}	
	/**
	 * 更新月榜的chids
	 * @param  [integer] $ids [需要添加的字段]
	 * @return [integer] 1:更新成功  0：失败
	 */
	public function updateMounth($id,$chids)
	{		
			$statu=1;
			isset($_POST['chids'])?$chids=$_POST['chids']:$chids=$chids;
			isset($_POST['id'])?$id=$_POST['id']:$id=$id;
			$chids=$this->getchids($id,$chids);
			if(!$chids || $chids=',') return $statu;
		
			$updateSQL='update v9_mounth set chids= concat_ws(",",chids,"'.$chids.'") where id='.$id;
		
			// return $updateSQL;
			if($this->db->query($updateSQL))
			{
				$statu=1;
			}else{
				$statu=0;
			}
			return $statu;
	}
	/**
	 * @param  [integer] $catid 月榜单的类别
	 * @param  [integer] $ids   周榜的Id
	 * @return [array]	 $data  mid为歌曲的Id point为歌曲的票数 从0开始计算
	 */
	public function getMusics($catid,$ids)
	{
		//6,8
		$musics=$this->getDatas($ids);
		switch (intval($catid)) {
			case 56:
				$this->min=25;
				break;
			case 57:
				$this->min=20;
				break;
			case 58:
			$this->min=15;
				break;
			default:
				# code...
				break;
		}

		// 如果歌曲数目不够就获取差的数据；
		if(count($musics)<$this->min)
		{

			$minus=$this->min-count($musics);
			$moreMusic=$this->getDatas($ids,'10,1000',1);
			$temp='';
			$keys=array_keys($moreMusic);
			$i=$j=$n=0;
			$len=count($moreMusic);
			$more=array();
			// 将获得的第二次获得的数据排序
			foreach ($moreMusic as $k=>$v)
			{

				if(in_array($k,array_keys($musics)))
				{	
					continue;
				}else{
				$more[$i]['mid']=$k;
				$more[$i]['point']=$v['point']/$v['time'];
				}

				$i++;
			}
			for($n=0;$n<count($more);$n++)
			{	

				for($j=0;$j<count($more);$j++)
				{
					if($more[$j]['point']<$more[$n]['point'])
					{
						$temp=$more[$n];
						// $temp['mid']=$more[];
						$more[$n]=$more[$j];
						$more[$j]=$temp;
					}
				}
			}
			// 获得差的数据条数
			foreach ($more as $m => $n) {
					$musics[$n['mid']]['point']=$n['point'];

					if($m+1==$minus)
					{
						break;
					}
			}
		}
		$data=array();
		$x=0;
		foreach ($musics as $key => $value) {
			
				$data[$x]['point']=$value['point'];
				$data[$x]['mid']=$key;
			$x++;	
		}
		return $data;
	}

	/**
	 * 获得周榜中的歌曲
	 * @param  [type]  $ids   [description]
	 * @param  integer $limit [description]
	 * @return [type]         [description]
	 */
	public function getDatas($ids,$limit=10,$time=0)
	{
		if(is_string($ids))$ids=explode(',', $ids);
		$musics=array();
		foreach ($ids as $v)
		{
				$sql='select mid,point from '.$this->pre.'chart_'.$v.' order by point desc limit '.$limit;
				$row=$this->db->queryAll($sql);
				foreach ($row as $n) {

					if(array_key_exists($n['mid'], $musics))
					{

						$musics[$n['mid']]['point']+=$n['point'];
					}else
					{
						$musics[$n['mid']]=array();
						$musics[$n['mid']]['point']=$n['point'];
					}
					if($time)$musics[$n['mid']]['time']+=1;
				}

		}
		return $musics;
	}
	/**
	 * 将歌曲添加到月榜单中
	 * @param  [mixed]   $mids 歌曲的Id可为2维数组也可为一维数组也可以是字符串也可是数字
	 * @param  [integer] $id   对应的表单Id
	 * @return [integer]       1:成功；-1：数据库执行失败； -2：缺少参数；
	 */
	public function addMusicToMounth($mids,$id)
	{
		
		if(!$mids || !$id)
		{
			echo -2;
		}
		$str=array();
		if(is_array($mids))
		{
			foreach ($mids as $key => $value)
			{
				if(array_key_exists('mid', $value))
				{
					$str[]=$value['mid'];
				}else{
					$str=$mids;
				}
			}
		}elseif(is_string($mids)){
			$str=explode(',', $mids);
		}
		$tablename=$this->pre.'mounth_'.$id;
		$musisc=array();
		$sql='select mid from '.$tablename;
		$music=$this->db->queryAll($sql);
		$ids=array();
		$insertids='';
		$updateids='';
		foreach ($music as $k => $v) {
			$ids[]=$v['mid'];
		}
		foreach ($str as $m => $n) {
			if(in_array($n, $ids))
			{	
				if($n)$updateids.=$n.',';
				
			}else{
				if($n)$insertids.="($n),";
				
			}
		}

		$statu=1;
		if($updateids){
			$updateSQL='update '.$tablename.' set updatetime = '.time().' where mid in ('.trim($updateids,',').')';
			if($this->db->query($updateSQL))
			{
				$statu=1;
			}else{
				$statu=0;
			}
		}

		if($insertids && $insertids!=="(),")
		{
			$insertSQL='insert into '.$tablename.' (mid) values'.trim($insertids,',');
			if($this->db->query($insertSQL))
			{
				$statu=1;
			}else{
				$statu=0;
			}
		}
		return $statu;
	}
	/**
	 * 添加歌曲进入月榜单
	 * @param  [integer] $_POST['mids'] 歌曲的Id
	 * @param  [integer] $_POST['id']    榜单的Id
	 * @return [integer] 1:成功 -1：失败；0：错误的操作
	 */
	public function insertToMounth()
	{
		if(!$_POST['mids'] || !$_POST['id'])
		{
			echo -1;return;
		}


		$id=$_POST['id'];
		$mids=$_POST['mids'];
		echo $this->addMusicToMounth($mids,$id);

	}
	/**
	 * 显示月榜中的歌曲
	 * @return [type] [description]
	 */
	public function mounthAdmin($id)
	{
		isset($_GET['id'])?$id=$_GET['id']:$id=$id;
		$tablename=$this->pre.'mounth_'.$id;
		$sql='select m.id as mid,m.title as music ,m.singer,mo.id as id from '.$tablename.' as mo inner join v9_music as m on m.id=mo.mid';

		$row=$this->db->queryAll($sql);
		$num=count($row);
		include $this->admin_tpl('mounth_admin');
	}




}
?>