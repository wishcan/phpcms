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
		 $page=$_GET['page'];
		 $infos=$this->db->listinfo('thumb!=""',"");
		 $this->db->table_name=$this->db->table_name.'_data';
		 $r2=$this->db->get_one('id='.$r['id']);
		 $r=array_merge($r,$r2);
		 extract($r);

		 include template('artistic','index');
	}
	/*分页显示*/
	public function list_page()
	{
		$this->db=pc_base::load_model('singer_model');
		isset($_GET['page'])?$page=$_GET['page']:$page=1;
		$data=$infos=array();
		// 参数4为每条显示的数字，参数$page为页码
		$info=$this->db->my_listinfo('thumb!=""','id desc',$page,3);
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
		include template('artistic','list_page');

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