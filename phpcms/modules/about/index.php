<?php 
defined('IN_PHPCMS') or exit('No permission resources.');
class index{
	
	public function init(){
		
		$id=int;
		isset($_GET['id'])?$id=intval($_GET['id']):$id=1;
		$id=32;
		$cate=32;
		include template('about','index',$id,$cate);
	}

}


?>