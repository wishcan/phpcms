<?php
defined('IN_PHPCMS') or exit('No permission resources.');
// 榜单生成与处理
class index{
	public $db;
	public function __construct()
	{

		$this->db=pc_base::load_model("chart_model");
	}
	// 榜单回顾
	public function init()
	{
		$row=$this->db->select('id!=0 group by title','title');
		include template('charts','index');
	}
	// 榜单显示大页面
	// 单项

 	// 查分结果页面显示
 	
 	public function searchPoint()
 	{
 		include template('charts','search_point');
 	}




 	/**
 	 * 榜单生成
 	 * @param $_POST['dosubmit'] 如果存在则进行添加,否则显示添加页面
 	 * 
 	 */	
 	

 	






}







 ?>