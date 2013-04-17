<?php

defined('IN_PHPCMS') or exit('No permission resources.');
class member{
	public $db;
	public $data;
	public $encrypt;
	public $password;
	public function __construct()
	{
		$this->db=pc_base::load_model("member_model");

		$this->_username=param::get_cookie('_username');
		$this->_userid=param::get_cookie('_userid');
		$row=$this->db->get_one('userid = '.$this->_userid);
		$this->encrypt=$row['encrypt'];
		$this->password=$row['password'];
	}
	/**
	 * 修改个人信息
	 * @return [$row]角色信息
	 */
	public function change()
	{
		$userid=$this->_userid;
		if(!isset($_GET['id'])){
			die("非法操作");

		}
		$row=$this->db->get_one('userid = '.$_GET['id']);
		if(!$row)
		{
			die("非法操作");

		}
		extract($row);
		include template('music','change');

	}
	/**
	 * 修改密码验证
	 * @param  userid
	 * @return [int] 1:正常;-1:密码错误; -2:错误的操作;-3:请登录;
	 */
	public function check_psd()
	{
		if(!$_POST['id'])
		{
			echo -2;
			return ;
		}
		if($_POST['id']!=$this->_userid)
		{
			echo -3;
		}

		 $password=md5(md5(trim($_POST['password'])).$this->encrypt);
		if($password!= $this->password)
		{
			echo -1;
		}	

	}

	/**
	 * 修改用户资料
	 * @return [num] 1：修改成功;-1：修改失败；
	 */
	public function changeMember()
	{
		$post=explode('&',$_POST['post']);
		$data=array();
		foreach($post as $v)
		{
			$v=explode('=', $v);
			$data[$v[0]]=$v[1];
		}
		$password= password($data['newPassword']);

		$data['encrypt']=$password['encrypt'];
		$data['password']=$password['password'];
		if($this->db->update($data,'userid = '.$this->_userid)){
		}else{
			echo -1;
		}
	}

	/**
	 * 显示收藏夹
	 * @return array    $row
	 * @return music    歌曲名
	 * @return singer   歌手名
	 * @return spName   专辑名
	 * @return  addTime 收藏时间
	 */
	public function collect()
	{

		isset($_GET['hash'])? $pageSize=50:$pageSize=9;
		isset($_GET['page'])?$page=$_GET['page']:$page=1;
		$data=$infos=array();
		$id=$this->_userid;
		$sql='select m.title as music,m.id,s.title as singer ,sp.title as spName ,sc.addtime from v9_music as m inner join v9_singer as s inner join v9_sp as sp inner join v9_member_sc as sc on m.sid=s.id and m.spid = sp.id and m.id = sc.mid where sc.id = '.$id;
		$info=$this->db->my_listinfo(array('sql'=>$sql),'m.listorder desc',$page,$pageSize);
		$total=$this->db->number;	
		include template('music','collect');

	}

}














?>