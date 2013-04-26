<?php

defined('IN_PHPCMS') or exit('No permission resources.');
class member{
	public $db;
	public $data;
	public $encrypt;
	public $password;
	public $catid;
	public $type;
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
		$sql='select m.title as music ,m.id as id, m.spname,m.singer,sc.addtime from  v9_music as m inner join v9_member_sc as sc on sc.mid = m.id where sc.id = '.$id;
		$info=$this->db->my_listinfo(array('sql'=>$sql),'sc.addtime desc',$page,$pageSize);
		$total=$this->db->number;
		if($total>0)
		{
				$pages=$this->db->pages;
				foreach($info as $_v)
				{
					if(strpos($_v['url'],'://')===false)$_v['url']='1'.$_v['url'];
					$data[]=$_v;
				}
				$row['pages']=$pages;
				$row['data']=$data;

		}else{
			$row=$info;
		}
		include template('music','collect');

	}
	/**
	 * 月票评分页面显示
	 * @return tid   月榜的Id
	 * @return title 榜单的标题
	 * @return data  查询到的结果集
	 */
	public function grade()
	{
		if(!isset($this->_userid) || !$_GET['moid'] || !$_GET['catid']) exit('非法操作');
		$this->catid=$_GET['catid'];
		$row=$this->getNewMounth($this->catid);
		foreach ($row['data'] as $k => $v) {

			$url=explode(',', $v[mUrl]);
			$url=explode('=>',$url[0]);
			$mUrl=trim($url[2]," '");
			if(substr($mUrl, 0,23)=='http://localhost/phpcms')
				{
					$mUrl=str_replace('http://localhost/phpcms',APP_PATH,$mUrl);
				}
				$row['data'][$k]['mUrl']=$mUrl;
		}
		$page=$row['page'];
		include template("music",'grade');
	}
	// 获得最新的月榜的数据
	public function getNewMounth($catid,$size=15,$limit=1)
 	 	{

 	 		if(!$catid) exit('非法操作');
 	 		$sql='select id,title from v9_mounth where catid ='.$catid.' order by updatetime desc,inputtime desc limit '.$limit;
 	 		$row=$this->db->queryAll($sql);
 	 		if(empty($row))
 	 		{
 	 			showmessage('暂无榜单请发布');
 		}
 		isset($_GET['page'])?$page=$_GET['page']:$page=1;
 		$data['tid']=$row[0]['id'];
 		$data['title']=$row[0]['title'];
 		$mounths=$this->getMounthData($row[0]['id'],$page,$size);
 		$data['data']=$mounths['data'];
 		$data['page']=$mounths['pages'];
 		return $data;
 	}

 	public function getMounthData($id,$page,$limit=10,$where='')
 	{
 		
 		$sql='select mo.hgrade+mo.megrade+mo.exgrade as grade ,md.mUrl,m.id as mid,mo.id as id,m.title as music,m.singer from v9_mounth_'.$id.' as mo inner join v9_music as m inner join v9_music_data as md on mo.mid=m.id and m.id=md.id '.$where ;
 		$info=$this->db->my_listinfo(array('sql'=>$sql),'grade desc,m.updatetime desc ',$page,$limit);
		$total=$this->db->number;
		if($total>0)
		{
				$pages=$this->db->pages;
				foreach($info as $_v)
				{
					if(strpos($_v['url'],'://')===false)$v['url']='1'.$v['url'];
					$data[]=$_v;
				}
				$row['pages']=$pages;
				$row['data']=$data;

		}else{
			$row=$info;
		}
 		return $row;
 	}

 	/**
 	 * 添加评分
 	 */
 	public function addGrade()
 	{

 		if(!$this->_userid ||  (!isset($_POST['modelid']) && !in_array($_POST['modelid'], array(23,24,25))))
 		{
 			echo -1;
 			return;
 		}

 		if(!$_POST['mid'] || !$_POST['tid'] || !$_POST['grade'])
 		{
 			echo 0;
 			return;
 		}
		extract($_POST);
		$field='';
	 		switch (intval($modelid)) {
	 			case 23:
	 			$field='hids';
	 			$grafield='hgrade';
	 			break;
	 			case 24:
	 			$field='meids';
	 			$grafield='megrade';
	 			break;
	 			case 25:
	 			$field='eids';
	 			$grafield='exgrade';
	 			break;
	 			default:
	 			return false;
	 			break;
	 		}

		if($this->checkIsGrade($tid,$id,$this->_userid,$field))
		{
			$sql='update v9_mounth_'.$tid.' set '.$field.' = concat_ws("|",'.$field.','.$this->_userid.'), '.$grafield.'= '.$grafield.'+'.$grade.' where id ='.$id;
			if($this->db->query($sql))
			{
				echo 1;
			}else{
				echo -2;
			}
		}else{
			echo -2;
		}

 	}
 	/**
 	 * 检查是否已经评分过
 	 * @return [type] [description]
 	 */
 	public function checkIsGrade($tid,$id,$userid,$field)
 	{


 		$sql='select '.$field.' from v9_mounth_'.$tid.' where id = '.$id;
 		$row=$this->db->queryAll($sql);

 		if(empty($row)) return true;
 		$ids=explode('|',$row[0][$field]);

 		if(in_array($this->_userid, $ids))
 		{
 			return false;
 		}else{
 			return true;
 		}


 	}

}














?>