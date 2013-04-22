<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>
<title><?php echo $title;?>-<?php if($_GET[id]==26) { ?>内地<?php } elseif ($_GET[id]==27) { ?>港台<?php } elseif ($_GET[id]==28) { ?><?php } ?>榜周榜</title>

<?php include template('content','header'); ?>

  <style type="text/css">
 .list_title{
	width: 780px;
	margin: 0 auto;
	margin-top: 25px;
	line-height: 42px;
} 
	.week h1,.week .week_t{
	*width: 300px;
	}

	td{text-align: center;}
	.st{
		float: right;
		background-repeat: no-repeat;
		/*padding-right: 10px;*/
		margin-right: 5px;
	}
.week_g h1{
	color: #e45757;
}
.week_m h1{
	color: #b078fe;
}
.week table{
	width:363px ;
}
.week tbody td{
	border: 0;
background: #fcfbf8;
}
.week thead td{
	background: url(<?php echo CSS_PATH;?>hy/images/bdhg_list_tbg.png);
	padding: 8px 0;

}
.week tbody .tr2 td{
	background-color: #f2f1ec;
	border-right: 
}
.week tbody .td1{
	width: 35px;
}
.week ul{
	float: left;
	background-color: #fcfbf8;
	border-right: solid 1px #feaa7c;
}
.week .u2{
		border-right:0;
		border-left: solid 1px #feaa7c;
}
.border{
	margin: 10px 0;
	width: 363px;
}
.week{
	width: 736px;
	margin: 0 auto;

}
.td5{
	padding: 0;
}
.st{
	margin-right: 15px;
}

 </style>
</div>
<div class="center2">
	<h3 class="page_title list_title">
		<?php echo $title;?> 至尊<?php if($_GET[id]==0) { ?>内地<?php } elseif ($_GET[id]==1) { ?>港台<?php } elseif ($_GET[id]==2) { ?><?php } ?>榜周榜</h3>
 <div class='week'>

 	<?php $n=1;if(is_array($datas)) foreach($datas AS $v) { ?>
 	<?php if(in_array(($n-1)/10,array(0,1,2,3))){?>
	<div class="border l">
 		<ul class='week_<?php if($_GET[id]==0) { ?>n<?php } elseif ($_GET[id]==1) { ?>g<?php } elseif ($_GET[id]==2) { ?>m<?php } ?> <?php if((($n-1)/10)%2>0)echo  "u2";?>'>
 		<style type="text/css">

 		</style>
	          <table cellspacing="0" class='l'>
	                <thead>
	                    <tr>
	                    	<td class='td1'>名次</td>
	                    	<td class='td2'>歌曲</td>
	                    	<td class='td3'>歌手</td>
	                    	<td class='td4'>票数</td>
	                    	<td class='td5'>试听</td>
	                    </tr>
	               </thead>
	               <tbody>
	               		    <tr <?php if($n%2==1) { ?> class='tr2' <?php } ?>>
	                    	<td class='td1'><span class='one' style='color:#ff6600;font-w:bold;'><?php echo $n;?></span></td>
	                    	<td class='td2'><?php echo $v['music'];?></td>
	                    	<td class='td3'><?php echo $v['singer'];?></td>
	                    	<td class='td4'><?php echo $v['point'];?></td>
	                    	<td class='td5'><a href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $v['mid'];?>' class='st'></a></td>
	                    </tr>
	<?php }else{?>              	
	               
	             		<tr <?php if($n%2==1) { ?> class='tr2' <?php } ?>>
	                    	<td class='td1'><span class='one' style='color:#ff6600;font-w:bold;'><?php echo $n;?></span></td>
	                    	<td class='td2'><?php echo $v['music'];?></td>
	                    	<td class='td3'><?php echo $v['singer'];?></td>
	                    	<td class='td4'><?php echo $v['point'];?></td>
	                    	<td class='td5'><a href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $v['mid'];?>' class='st'></a></td>
	                    </tr>
	<?php }?>
	<?php if(in_array($n/10,array(0,1,2,3,4))){?>
	               </tbody>
	          </table>
		</ul>         
	</div>
<?php }?> 
<?php $n++;}unset($n); ?>

<div class="c"></div>
</div>
</div>
<?php include template('content','footer'); ?>