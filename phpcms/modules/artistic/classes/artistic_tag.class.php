<?php 
 class artistic_tag{
 	private $db;
 	public function __construct(){
 			$this->db=pc_base::load_model('singer_model');
 			$this->position = pc_base::load_model('position_data_model');
 	}
 	public function lists($data)
 	{
 		
 		 isset($data['catid'])?$catid=$data['catid']:$catid=29;
 		 if(isset($data['where'])){
 		 	$sql=$data['where'];
 		 }else{
 		 	isset(intval($data['limit'])):$limit=intval($data['limit']):$limit='';
 		 	$sql='catid=29';
 		 }
 		 isset($data['order'])?$order=$data['order']:$order='inputtime asc';
 		 $return =$this->db->select($sql,'*',$order,$limit);
 	}





 }




?>