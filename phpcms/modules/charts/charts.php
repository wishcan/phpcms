<?php 

defined('IN_PHPCMS') or exit('No permission resources.');
// 榜单生成与处理
// 想法。定时发布表单
pc_base::load_app_class('admin','admin',0);
pc_base::load_sys_class('form','',0);
pc_base::load_app_func('util');
pc_base::load_sys_class('format','',0);
class charts extends admin{
	public $db;
	public $rid;

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
	public function add()
	{



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
					echo 1;
				}else{
					echo -1;
				}
			}
		}


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

			isset($_POST['chids'])?$chids=$_POST['chids']:$chids=$chids;
			isset($_POST['id'])?$id=$_POST['id']:$id=$id;
			$chids=$this->getchids($id,$chids);
			$updateSQL='update v9_mounth set chids= concat_ws(",",chids,"'.$chids.'") where id='.$id;
			// return $updateSQL;
			if($this->db->query($updateSQL))
			{
				return 1;
			}else{
				return 0;
			}

	}
	public function test()
	{
		$c1=array(
				0=>array("mid"=>20,"point"=>10),
				1=>array("mid"=>22,"point"=>13),
				2=>array("mid"=>23,"point"=>14),
				3=>array("mid"=>24,"point"=>15),
				4=>array("mid"=>26,"point"=>9),
				5=>array("mid"=>27,"point"=>11),
				6=>array("mid"=>30,"point"=>31),
				7=>array("mid"=>2,"point"=>50),
				8=>array("mid"=>11,"point"=>15),
				9=>array("mid"=>12,"point"=>14),
				10=>array("mid"=>25,"point"=>15),
				11=>array("mid"=>13,"point"=>17),
				12=>array("mid"=>14,"point"=>18),
				13=>array("mid"=>17,"point"=>22),
				14=>array("mid"=>18,"point"=>29),
				15=>array("mid"=>19,"point"=>25),
			);
		$c2=array(
				0=>array("mid"=>31,"point"=>33),
				1=>array("mid"=>32,"point"=>14),
				2=>array("mid"=>33,"point"=>12),
				3=>array("mid"=>34,"point"=>11),
				4=>array("mid"=>35,"point"=>31),
				5=>array("mid"=>36,"point"=>50),
				6=>array("mid"=>37,"point"=>23),
				7=>array("mid"=>38,"point"=>24),
				8=>array("mid"=>39,"point"=>26),
				9=>array("mid"=>40,"point"=>31),
				10=>array("mid"=>41,"point"=>39),
				11=>array("mid"=>42,"point"=>50),
				12=>array("mid"=>43,"point"=>51),
				13=>array("mid"=>44,"point"=>17),
				14=>array("mid"=>45,"point"=>19),
				15=>array("mid"=>46,"point"=>22),
			);
		$c3=array(
				0=>array("mid"=>20,"point"=>31),
				1=>array("mid"=>11,"point"=>22),
				2=>array("mid"=>10,"point"=>25),
				3=>array("mid"=>42,"point"=>29),
				4=>array("mid"=>50,"point"=>31),
				5=>array("mid"=>41,"point"=>38),
				6=>array("mid"=>52,"point"=>41),
				7=>array("mid"=>53,"point"=>42),
				8=>array("mid"=>55,"point"=>46),
				9=>array("mid"=>59,"point"=>55),
				10=>array("mid"=>22,"point"=>67),
				11=>array("mid"=>8,"point"=>66),
				12=>array("mid"=>22,"point"=>33),
				13=>array("mid"=>16,"point"=>39),
				14=>array("mid"=>43,"point"=>15),
				15=>array("mid"=>46,"point"=>7),
			);
		$array=array($c1,$c2,$c3);
		$min=25;
		$mounth=array();
		foreach ($array as $key => $v) {
				
				foreach ($v as $n => $r)
				{
					
				}

		}


	}


}
?>