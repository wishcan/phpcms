<?php
defined('IN_PHPCMS') or exit('No permission resources.');
// 榜单生成与处理
class index{
	public $db;
	public $limit;#获取回顾榜单的数目
	public function __construct()
	{
		$this->limit='1,100';
		$this->db=pc_base::load_model("chart_model");
	}
	// 榜单回顾
	public function init()
	{
		$sql='select id,title,count(*) as num from v9_chart group by title having num=3 order by updatetime desc limit '.$this->limit;
		$data=$this->db->queryAll($sql);
		$sql='select title,count(*) as num from v9_mounth group by title having num=3 order by updatetime desc limit '.$this->limit;
		$mounths=$this->db->queryAll($sql);
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