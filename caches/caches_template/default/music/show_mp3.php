<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><title><?php echo $singer;?>—<?php echo $title;?></title>
<?php include template("content","header"); ?>
<script type="text/javascript" src='<?php echo CSS_PATH;?>hy/js/search.js'></script>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>hy/css/about.css">
<script type="text/javascript" src="<?php echo CSS_PATH;?>hy/js/swfobject.js"></script>
<div id='new_music' class='center2 art new_music list_once'>

<!-- 歌曲页头部开始 -->
<div class='mp3_title page_title'>
  <h3><?php echo $singer;?>-<?php echo $title;?></h3>
</div>
<div class='music_link l'>
  <i class='l'></i>
  <i class='l'></i>
</div>
<div class='music_link r'>
  
  <i class='l'></i>
  <i class='l'></i>
</div>
<!-- 歌曲内容 -->
<div class="center2 mp3_content l">
	<div class="mp3">
		<!-- 歌曲信息 -->
		<div class="mp3_message l">
			<div class="mp3_l l" style='width:420px'>
				<!-- 加入收藏 -->
				<p class="collect">加入收藏</p>
				<div class="c"></div>
				<div class="messages">
					<!-- mp3播放器 -->
					<div class="player">	
					
											
													
						<object type="application/x-shockwave-flash" data="<?php echo CSS_PATH;?>hy/player/dewplayer-vol.swf?mp3=<?php echo $mUrl;?>" width="240" height="20" id="dewplayer-vol">
							<param name="wmode" value="transparent">
							<param name="movie" value="<?php echo CSS_PATH;?>hy/player/dewplayer-vol.swf?mp3=<?php echo $mUrl;?>">
						</object>
					</div>

					<ul>
						<li>作词：<?php echo $writer;?></li>
						<li>作曲：<?php echo $comper;?></li>
						<li>专辑：<?php echo $spname;?></li>
						<li>唱片公司：<?php echo $rcname;?></li>
					</ul>

				</div>

			</div>
			<!-- 歌手缩略图 -->
			<div class="mp3_r l">
					<div class="thumb l"><img src='<?php echo $photo;?>' /></div>
					<img class='l' src='<?php echo CSS_PATH;?>hy/images/singer_thumb_bg.png' />
			</div>
		</div>
		<div class="c"></div>
		<div class="lyric">
			<h5>	
				歌曲信息
			</h5>
		<div class="lyrics">
			
					<?php if($content) { ?><?php echo $content;?><?php } else { ?>还没歌词？快联系我们！<?php } ?>
			</div>
		</div>
	</div>
</div>
</div>
<div class='c'></div>
<?php include template("content","footer"); ?>
<script language="JavaScript" src="<?php echo APP_PATH;?>api.php?op=count&id=<?php echo $id;?>&modelid=<?php echo $modelid;?>"></script>
<script type='text/JavaScript'>
		$(".collect").click(function(){
			$.post(
					"<?php echo APP_PATH;?>index.php?m=music&c=index&a=collect",
					{id:"<?php echo $_GET['id'];?>"},
					function(statu){
						switch(parseInt(statu)){
							case 1:
							alert('成功加入收藏夹');
							break;
							case -1:
							alert("尚未请登录");
							location.href="<?php echo APP_PATH;?>/index.php?m=member&c=index&a=login";
							break;
							case -2:
							alert("已经在您的收藏夹中");
							break;
							default:
							alert(statu);
							break;	
						}
					}


				)


		})



</script>