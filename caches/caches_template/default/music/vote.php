<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><title>网友投票</title>
<!-- 网友投票页面 -->


<?php include template("content",'header'); ?>
<style type="text/css">
	
	.vote{
		display: block;
		width: 640px;
		*width: 629px;
		height: 550px;
		*height: 546px;
		margin-top: 25px;
	}
	.col_left{
		float: left;
	}
	.col_right{
		float: right;
	}
	.chart{
		height: 
	}
	.chart{
		margin-top: 25px;
		display: block;
		width:300px;
		height: 348px;
		*height: 358px;
		border:solid 1px #e3d8bf;
	}

</style>
<div class="center2">
<div class='col_left'>

	<iframe class='vote' src="<?php echo APP_PATH;?>index.php?m=music&c=index&a=showVote&id=26" frameborder="0" name="#week_n"></iframe>
	<iframe class='vote' src="<?php echo APP_PATH;?>index.php?m=music&c=index&a=showVote&id=27" frameborder="0" name="#week_g"></iframe>
	<iframe class='vote' src="<?php echo APP_PATH;?>index.php?m=music&c=index&a=showVote&id=28" frameborder="0" name="#week_m"></iframe>
	</div>
	<div class='col_right'>
	<iframe class='chart' src="<?php echo APP_PATH;?>index.php?m=music&c=index&a=showCharts&id=26" frameborder="0"></iframe>
	<iframe class='chart' src="<?php echo APP_PATH;?>index.php?m=music&c=index&a=showCharts&id=27" frameborder="0"></iframe>
	<iframe class='chart' src="<?php echo APP_PATH;?>index.php?m=music&c=index&a=showCharts&id=28" frameborder="0"></iframe>
	</div>
</div>
<div class="c"></div>
<?php include template("content",'footer'); ?>