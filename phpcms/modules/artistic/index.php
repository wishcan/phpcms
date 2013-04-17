<?php
defined('IN_PHPCMS') or exit('No permission resources.');
#艺术人生
class index{

	/**
	 *@param 
	 *@param $id        	id
	 *@param $title  		姓名
	 *@param $thumb			缩略图地址
	 *@param $keywords		关键字
	 *@param $description	简介
	 *@param $url           链接地址
	 *@param $content  		内容
	 */

	public $db;
	public function init()
	{
		
		 $this->db=pc_base::load_model('singer_model');
		 $r=$this->db->get_one('supstar=1','id,title,thumb,description,url');
		 // 获得所有歌手的资料分页显示
		 $size=3;
		 $data=$this->db->select('thumb!=""','id,thumb,title,url','','id desc');
		 $num=count($data);
		 $this->db->table_name=$this->db->table_name.'_data';
		 if($r)
		 {
			 $r2=$this->db->get_one('id='.$r['id']);
			 $r=array_merge($r,$r2);
		 }
		 extract($r);
		 $page=
		 // 分页显示歌手
		
		include template('artistic','index');
	}
	/**
	 * 设置推荐明星
	 */
	public function setSupstar(){

		if(!$_POST['id']){
			echo '2';
		}else{

			$id=$_POST['id'];
			$this->db=pc_base::load_model('singer_model');
			if($this->db->update('supstar=0','supstar=1') && $this->db->update('supstar=1','id = '.$id)){
				echo 1;
			}
		}




	}
	



}


 ?>