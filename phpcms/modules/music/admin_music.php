<?php 
defined('IN_PHPCMS') or exit('No permission resources.');
// 榜单生成与处理
// 想法。定时发布表单
pc_base::load_app_class('admin','admin',0);
pc_base::load_sys_class('form','',0);
pc_base::load_app_func('util');
pc_base::load_sys_class('format','',0);
class admin_music extends admin{
		public function __construct()
	{
		$this->db=pc_base::load_model("music_model");
		// 实际表单为系统表单前缀+;
		$this->singer=pc_base::load_model("singer_model");
		$this->pre=$this->db->db_tablepre;
			if(isset($_GET['catid']) && $_SESSION['roleid'] != 1 && ROUTE_A !='pass' && strpos(ROUTE_A,'public_')===false) {
			$catid = intval($_GET['catid']);
			$this->priv_db = pc_base::load_model('category_priv_model');
			$action = $this->categorys[$catid]['type']==0 ? ROUTE_A : 'init';
			$priv_datas = $this->priv_db->get_one(array('catid'=>$catid,'is_admin'=>1,'action'=>$action));
			
			if(!$priv_datas)  showmessage(L('permission_to_operate'),'blank');
		}

	}

	/*显示试听作品*/
	public function musicList()
	{
		if(!$_GET['id'])
		{
			showmessage("错误的操作");
	
		}else{
			$id=$_GET['id'];
			$row=$this->singer->get_one("id=".$id);
			if($row[opus]=='')
			{
				echo "没有试听歌曲请添加";

			}else{
				
				$data=$this->db->select('id in ('.trim($row['opus'],',').')');

			}	

		}
		include $this->admin_tpl('admin_music');
	}
	/**
	 * 显示添加试听歌曲页面及完成添加
	 * @return [type] [description]
	 */
	public function addpos()
	{

		if(!$_POST){
			if(!$_GET['search'] || !$_GET['id']){
				showmessage("错误的操作");
			}else{
				$search=$_GET['search'];
				$id=intval($_GET['id']);
				$sql="select * from v9_music as m inner join v9_music_data as md on m.id=md.id where m.singer like '%$search%' or md.witer like '%$search%' or md.comper like '%$search%' order by m.id desc";
				$data=$this->db->queryAll($sql);
				include $this->admin_tpl('addpos');
			}
		}else{
			$id=$_POST['id'];
			$ids=$_POST['ids'];#需要添加的歌曲
			$row=$this->singer->get_one('id='.$id);
			$mids=$row['opus'];
			$opus=explode(",", $mids);#已经存在的歌曲Id
			$ids=explode(',', $ids);
			$newids='';
			foreach ($ids as $key => $value) {
				# code...
				if(!in_array($value, $opus))
				{
					$newids.=$value.',';

				}
				$newids=ltrim($newids,',');
			}
			if($this->singer->update("opus = concat(opus,'$newids')","id=$id"))
			{
				echo 1;
			}else{
				echo 0;
			}

		}

	}
	/**
	 * 移除一首或多少Id
	 * @return [type] [description]
	 */
	public function deletepos()
	{

		if(!$_POST['id']){
			showmessage('非法操作');

		}
		$id=$_POST['id'];
		$row=$this->singer->get_one('id = '.$id);
		$ids=explode(',', $_POST['ids']);
		$mids=explode(',', $row['opus']);
		foreach ($ids as $key => $value) {
			if(in_array($value, $mids))
			{
				unset($mids[$key]);
			}
		}
		empty($mids)?$mids="''":$mids=implode(',', $mids);

		if($this->singer->update("opus = $mids","id=$id")){
			echo 1;
		}else{
			echo 0;
		}

	}





}


?>