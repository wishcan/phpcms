<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php if($_GET[hash]==1) { ?>
<?php include template("content","header"); ?>
<SCRIPT TYPE="text/javascript">
	$('title').html('新歌推荐——<?php if($_GET[id]==26) { ?>内地推荐<?php } elseif ($_GET[id]==27) { ?>港台推荐<?php } else { ?>民歌推荐<?php } ?>')
</SCRIPT>
<title></title>
<script type="text/javascript" src='<?php echo CSS_PATH;?>hy/js/search.js'></script>
<div id='new_music' class='center2 art new_music list_once'>

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
				<form class='l' type='post' style='width:700px'>
					<span>歌曲搜索</span>
					<div class='select'>
						<div>
 							<select>
								<option name='search[singerName]'>按歌手搜索</option>
								<option name='search[musicName]'>按歌名搜索</option>
							</select>
						</div>
					</div>
					<input tpye='text' name='search[musicName]' class='name l' />
					<input type='button' value='' class='submit l' />
				</form>
			</div>
		<!-- 搜索栏结束 -->	
			<div class='c'></div>
			<!-- 内地歌曲推荐开始 -->
			<div class='music_list music_list_n' style='height:auto;'>
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>hy/css/hy_header.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>hy/css/about.css">
<div id='music_list_page' style='height:auto;' class='<?php if($_GET[id]==26) { ?>new_t_n<?php } elseif ($_GET[id]==27) { ?>new_t_g<?php } else { ?>new_t_m<?php } ?>'>
	<h3 class=''>
		<?php if(!$_GET['hash']) { ?><a href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=lists&id=<?php echo $_GET['id'];?>&hash=1' target='blank'></a><?php } ?></h3>
	<div class='musics' style='height:auto;'>
	<table cellspacing="0">
		<thead>
		
					<th>歌曲</th>
					<th>歌手</th>
					<th>专辑</th>
					<th>唱片公司</th>
					<th>试听</th>
		</thead>
		<tbody>
			<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
			<tr>
				<td><?php echo $r['title'];?></td>
				<td><?php echo $r['singer'];?></td>
				<td><?php echo $r['spname'];?></td>
				<td><?php echo $r['rcname'];?></td>
				<td><a href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $r['id'];?>' target='blank'><b class='st'></b></a></td>
			</tr>
			<?php $n++;}unset($n); ?>
		</tbody>
	</table>
	 <?php if($pages) { ?><div class=page><?php echo $pages;?></div><?php } ?>
	</div>
	 <div style='clear:both'></div>
	

<?php if($_GET[hash]==1) { ?>
</div>
</div>
</div>
</div></div>
<div class='c'></div>
<?php include template("content","footer"); ?>
<?php } ?>