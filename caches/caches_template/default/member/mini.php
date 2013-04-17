<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>

<style type="text/css">
		a{
					text-decoration: none;
		}
	.r a{

		display: block;
		float: left;
		margin-right: 20px;
		width: 47px;
		height: 23px;
		background: url(<?php echo CSS_PATH;?>hy/images/login.png);
		font-size: 12px;
		text-decoration: none;
		line-height: 23px;
		text-align: center;
		color:#fff;

	}
.has_log a:link{
	color:;
}	
.has_log a:visited
	{
		color:red;
	}
	

.has_log{
	color:red;
	font-weight:bold;
	position: absolute;
	right: 0px

}

</style>
<body style="background-color:transparent">
<div class="log w27" style=''>
	
	<?php if($_username) { ?>
	<div class='has_log'> 
		欢迎回来
		<span><?php echo get_nickname();?></span> 
		  <a href="<?php echo APP_PATH;?>index.php?m=member&siteid=<?php echo $siteid;?>"  target="_blank"><?php echo L('member_center');?></a> <a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=logout&forward=<?php echo urlencode($_GET['forward']);?>&siteid=<?php echo $siteid;?>" style='color:red;'target="_top"><?php echo L('logout');?></a>
	</div>
	  &nbsp;&nbsp;
	  <?php } else { ?> 
	  <span class="r" style='position:absolute;right:0px'>
	  	<a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=login&forward=<?php echo urlencode($_GET['forward']);?>&siteid=<?php echo $siteid;?>" target="_top"><?php echo L('login');?></a>
	  	<a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=register&siteid=<?php echo $siteid;?>" target="_blank"><?php echo L('register');?></a>
	  	</span>

	<?php } ?>
</div>
</body>