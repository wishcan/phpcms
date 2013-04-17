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
		$sql='select m.title as music,m.id as mid,m.thumb as mthumb,ch.id as id,ch.point from '.$tablename.' as ch inner join '.$this->pre.'music as m on ch.mid=m.id  order by ch.point desc';
		$row=$this->db->queryAll($sql);
		$num=count($row);
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



}
?>