<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!-- 新歌推荐页面 -->
<!--[if lt IE 9]><link href="<?php echo CSS_PATH;?>vms/ielt9.css" rel="stylesheet" type="text/css" /><![endif]--> 
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.tools_tabs.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>cookie.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>hy/css/about.css">
<SCRIPT TYPE="text/javascript">
	APP_PATH="<?php echo APP_PATH;?>";
</SCRIPT>
<script type="text/javascript" src='<?php echo CSS_PATH;?>hy/js/search.js'></script>

<div id='new_music' class='center2 art new_music'>

<!-- 新歌推荐页头部开始 -->
<div class='new_tj_title page_title'>
	<h3><i></i></h3>
</div>
<div class='music_link l'>
	
	<i class='l'></i>
	<i class='l'></i>
</div>
<div class='music_link r'>
	
	<i class='l'></i>
	<i class='l'></i>
</div>
<!-- 推荐歌曲部分 -->
<div class='news_m_c l'>
	<div class='news_m l'>
		<!-- 搜索栏开始 -->
			<div class='search l'>
				<form class='l' type='post'>
					<span>歌曲搜索</span>
					<div class='select'>
						<div>
 							<select>
								<option name='search[singerName]'>按歌手搜索</option>
								<option name='search[musicName]'>按歌名搜索</option>	
							</select>
						</div>
					</div>
					<input tpye='text' name='name' class='name'/>
					<input type='button' value='' class='submit' style='float:left;' />
				</form>
			</div>
		<!-- 搜索栏结束 -->	
			<div class='c'></div>
			<!-- 内地歌曲推荐开始 -->
			<div class='music_list music_list_n'>
					<iframe frameborder="no"  border='0' src="<?php echo APP_PATH;?>index.php?m=music&c=index&a=lists&id=26"></iframe>
			</div>
			<!-- 内地歌曲推荐结束 -->
			<!-- 港台歌曲推荐开始 -->
			<div class='music_list music_list_n'>

					<iframe frameborder="no"  border='0' src="<?php echo APP_PATH;?>index.php?m=music&c=index&a=lists&id=27"></iframe>
			
			</div>
			<!-- 港台歌曲推荐结束 -->
			<!-- 民歌曲推荐开始 -->
			<div class='music_list music_list_n'>
					<iframe  frameborder="no"  border='0' src="<?php echo APP_PATH;?>index.php?m=music&c=index&a=lists&id=28"></iframe>
			</div>
			<!-- 民歌曲推荐结束 -->
	</div>	

</div>

</div>


<div class='c'></div>
<?php include template("content","footer"); ?> 
