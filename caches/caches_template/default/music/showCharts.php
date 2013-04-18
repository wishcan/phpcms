<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?> <link rel="stylesheet" href="<?php echo CSS_PATH;?>hy/css/hy_header.css">
 <style type="text/css">
	div{
		width: 290px;
		font-size: 8px;
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
.week tbody td{
	border: 0;
	font-size: 14px;
}
.week tbody .tr2 td{
	background-color: #f2f1ec;
}
.week tbody .td1{
	width: 35px;
}
 </style>
 <div class='week'>
	        <ul class='week_<?php if($id==26) { ?>n<?php } elseif ($id==27) { ?>g<?php } elseif ($id==28) { ?>m<?php } ?>'>
	          <h1><?php echo $title;?></h1>
	          <table cellspacing="0">
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
	               	<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>

	             		<tr <?php if($n%2==0) { ?> class='tr2' <?php } ?>>
	                    	<td class='td1'><span class='one num num<?php echo $n;?>'></span></td>
	                    	<td class='td2'><?php echo str_cut($v[music],18);?></td>
	                    	<td class='td3'><?php echo $v['singer'];?></td>
	                    	<td class='td4'><?php echo $v['point'];?></td>

	                    	<td class='td5'><a href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $v['mid'];?>' target='blank'><b class='st'></b></a></td>
	                    </tr>
	                <?php $n++;}unset($n); ?>
	               </tbody>
	          </table>
	        </ul>

