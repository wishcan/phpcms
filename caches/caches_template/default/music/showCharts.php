<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?> <link rel="stylesheet" href="<?php echo CSS_PATH;?>hy/css/hy_header.css">
 <style type="text/css">
 ul{
 	float: left;
 }
 .week_g{
 	margin: 0px 22px;
 }
 .week h1{

		*width: 300px;
	}

 </style>
   <div class='week chart'>
	  	<?php $n=1; if(is_array($week)) foreach($week AS $s => $v) { ?>

	         <ul class='week_<?php if($s==0) { ?>n<?php } elseif ($s==1) { ?>g<?php } elseif ($s==2) { ?>m<?php } ?> border'> 
	          <h1><?php echo $v['title'];?></h1>
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
	              
	               		<?php $n=1; if(is_array($v['data'])) foreach($v['data'] AS $k => $d) { ?>

	             		<tr <?php if($k%2==1) { ?> class='tr2' <?php } ?>>
	                    	<td class='td1'><span class='one num num<?php echo $k+1?>'></span></td>
	                    	<td class='td2'><?php echo str_cut($d[music],18);?></td>
	                    	<td class='td3'><?php echo $d['singer'];?></td>
	                    	<td class='td4'><?php echo $d['point'];?></td>
	
	                    	<td class='td5'><a href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $d['mid'];?>' target='blank'><b class='st'></b></a></td>
	                    </tr>
	              		  <?php $n++;}unset($n); ?>
	              		  
	               </tbody>
	          </table>
	          	<p class='bdxq_<?php if($s==0) { ?>n<?php } elseif ($s==1) { ?>g<?php } elseif ($s==2) { ?>m<?php } ?>'>
	          		<a href='<?php echo APP_PATH;?>/index.php?m=music&c=index&a=listCharts&id=<?php echo $s;?>&t=<?php echo $v['title'];?>&b=<?php echo substr($v[tablename],9)?>' target='_blank'></a>
	          	</p>
	      	</ul>
	      	 <?php $n++;}unset($n); ?>
      </div>

