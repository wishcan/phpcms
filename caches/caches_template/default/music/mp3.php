<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>hy/css/about.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>hy/css/hy_header.css">
<script type="text/javascript" src='<?php echo JS_PATH;?>jquery.min.js'></script>

<script type='text/javascript'>
	
	$(function(){
	
   $(window.parent.document).find("iframe").css({'height':parseInt($(".woorks").height())+100});
   
})
</script>
<div class='woorks' style='float:left'>
			<p style='color:#908878;padding:10px;font-weight: bold;'>作品试听</p>
			<table border="0" cellspacing="0" cellpadding="0" accesskey="">
				<thead>
					<tr class='odd'><td>歌名</td><td>所属专辑</td><td>试听</td></tr>
				</thead>
				<tbody>
					<tr class='blank'>
					</tr>
					<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
					<tr>
						<td class='t1'><span><?php echo $v['music'];?></span></td>
						<td class='t2'><span><?php echo $v['spName'];?></span></td>
						<td class='t2'><span><a href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $v['id'];?>' target='blank'><b class='st'></b></a></span></td>
						
					</tr>
					<?php if($n==count($data)/2):break;endif;?>
					<?php $n++;}unset($n); ?>
				</tbody>
			</table>

						<table border="0" cellspacing="0" cellpadding="0" accesskey="">
				<thead>

					<tr class='odd'><td>歌名</td><td>所属专辑</td><td>试听</td></tr>
				</thead>
				<tbody>
					<tr class='blank'>
					</tr>
					<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
					<?php if($n>count($data)/2):?>
					<tr>
						<td class='t1'><span><?php echo $v['music'];?></span></td>
						<td class='t2'><span><?php echo $v['spName'];?></span></td>
						<td class='t2'><span><a href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $v['id'];?>' target='blank'><b class='st'></b></a></span></td>
						
					</tr>
					<?php endif?>
					<?php $n++;}unset($n); ?>
				</tbody>
			</table>
		</div>