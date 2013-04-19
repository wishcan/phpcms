<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
<meta name="description" content="<?php echo $SEO['description'];?>">
<!-- 系统自带CSS和JS开始 -->
<!-- <link href="<?php echo CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>default_blue.css" rel="stylesheet" type="text/css" /> -->
<!-- 系统自带CSS和JS结束 -->
<SCRIPT TYPE="text/javascript">
	APP_PATH="<?php echo APP_PATH;?>";
</SCRIPT>
 <script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>

<script type="text/javascript" src="<?php echo JS_PATH;?>search_common.js"></script>
<!--  -->
<!-- 自定义CSS和JS脚本开始 -->
<link href="<?php echo CSS_PATH;?>hy/css/hy_header.css" rel="stylesheet" type="text/css" />
<!-- 自定义CSS和JS脚本结束 -->
</head>

<body>
<div class="body-top">

<!--     <div class="content">

	 <?php echo runhook('glogal_header')?>
<script type="text/javascript">
$(function(){
	startmarquee('announ',22,1,500,3000);
})
</script>
    <div class="login lh24 blue">
            <a href="<?php echo APP_PATH;?>index.php?m=content&c=rss&siteid=<?php echo get_siteid();?>" class="rss ib">rss</a><span class="rt"><script type="text/javascript">document.write('<iframe src="<?php echo APP_PATH;?>index.php?m=member&c=index&a=mini&forward='+encodeURIComponent(location.href)+'&siteid=<?php echo get_siteid();?>" allowTransparency="true"  width="500" height="24" frameborder="0" scrolling="no"></iframe>')</script></span></div>
  
</div> -->
	<div class='login'>
		<span class="rt">
			<script type="text/javascript">
			$(".rt").append('<iframe src="<?php echo APP_PATH;?>index.php?m=member&c=index&a=mini&forward='+encodeURIComponent(location.href)+'&siteid=<?php echo get_siteid();?>" allowTransparency="true"  width="500" height="24" frameborder="0" scrolling="no"></iframe>')
			</script>

		</span>

	</div>
<!-- 头部开始 -->
<div class="header">
	<!-- LOGO开始 -->
<!-- 	<div class='center1'>
		<div class='login_sign'>
			<a href="">登陆</a>
			<a href="">注册</a>
		</div>
	</div>	 -->
	<div class='center'>
<!-- 		<div class='top'>
		</div> -->
		<div style='width:1060px;margin:0 auto;'>
			<div class='logo'>
			</div>
		</div>
		<div class='center'>
			<div class='menu'>
				<a href="<?php echo APP_PATH;?>">首页</a>
				<a href='<?php echo APP_PATH;?>index.php?m=about'>榜单简介</a>
				<a href='<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=9'>新闻资讯</a>
				<a href='<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=12'>新歌推荐</a>
				<a href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=vote'>网友投票</a>
				<a href='<?php echo APP_PATH;?>index.php?m=charts'>榜单回顾</a>
				<a href='<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=15'>合作联盟</a>
				<a href='<?php echo APP_PATH;?>index.php?m=artistic'>艺术人生</a>
			</div>
		</div>

	</div>
	<!--LOGO 结束-->
	<!-- 登陆和注册开始 -->

	<!-- 登陆和注册结束-->
</div>
<!-- 头部结束 -->
 