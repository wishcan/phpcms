<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>
<?php include template("content","header"); ?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>hy/css/about.css">
<script type="text/javascript" src='<?php echo CSS_PATH;?>hy/js/search.js'></script>
<div id='new_music' class='center2 art new_music list_once'>

<!-- 新歌推荐页头部开始 -->
<div class='page_title new_tj_title'>
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
		<div class='search_num'>
			<h3 style='text-align:center'>共位您搜索出<span style='color:red'><?php echo $num;?></span>首歌曲
				<?php if($num==0) { ?>请尝试其他条件搜索<?php } ?>
			</h3>
			
		</div>
		<!-- 搜索栏开始 -->
			<div class='search l'>
				<form class='l' type='post'>
					<span>歌曲搜索</span>
 							<select class='l'>
								<option name='search[singerName]'>按歌手搜索</option>
								<option name='search[musicName]'>按歌名搜索</option>
							</select>
					<input tpye='text' name='search[musicName]' class='name'/>
					<input type='button' value='' class='submit' style='float:left;' />
				</form>
			</div>
		<!-- 搜索栏结束 -->	
			<div class='c'></div>
			<!-- 内地歌曲推荐开始 -->
			<div class='music_list music_list_n'>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>hy/css/about.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>hy/css/hy_header.css">
<div id='music_list_page' class='new_t_n'>
	<div class='musics'>
	<table cellspacing="0">
		<thead>
		
					<th>歌曲</th>
					<th>歌手</th>
					<th>专辑</th>
					<th>唱片公司</th>
					<th width="20">试听</th>
		</thead>
		<tbody>
			<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
			<tr>
				<!-- 捕捉到跟搜索关键字相符合的字符高亮显示 -->
				<td><?php echo str_replace($key,'<span class="red">'.$key.'</span>',$r[title]);?></td>
				<td><?php echo str_replace($key,'<span class="red">'.$key.'</span>',$r[singer]);?></td>
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
	


</div>
</div>
</div>
</div></div>
<div class='c'></div>
<?php include template("content","footer"); ?>