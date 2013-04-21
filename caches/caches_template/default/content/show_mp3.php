<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>

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
      <div class='c'></div>
      <!-- 内地歌曲推荐开始 -->
      <div class='music_list music_list_n'>

<?php include template("content","footer"); ?>
<script language="JavaScript" src="<?php echo APP_PATH;?>api.php?op=count&id=<?php echo $id;?>&modelid=<?php echo $modelid;?>"></script>