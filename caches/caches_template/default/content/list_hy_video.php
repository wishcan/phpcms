<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>hy/css/video.css">
<!--main-->
<div class="main center2 border">

	<div class="content_title l" >
            <h2 class="l">视频推荐</h2>
            <span class="r">当前位置:<a href='<?php echo APP_PATH;?>'>首页</a>&gt;新闻资讯</span>
       </div>
      <hr /> 
     <div class="list">  
    	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=5ab4b05e97fd14c3ed386604ee1a9399&action=lists&catid=%24catid&num=25&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 25;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        <ul class="">
        	<?php for($i=0;$i<15;$i++):?>
		<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
			<li>
				<a href="<?php echo $r['url'];?>" target="_blank"<?php echo title_style($r[style]);?>>
				<p><img src='<?php echo $r['thumb'];?>' width='140' height='90' /></p>
				<b><?php echo $r['title'];?></b></a></li>
			<?php if($n%6==0) { ?><li class="bk20 hr"></li><?php } ?>
		<?php $n++;}unset($n); ?>
		       
		        
		        <?php endfor;?>
		  </ul>       
		       <div id="pages" class="text-c"><?php echo $pages;?></div> 
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	</div>	
</div>
    <div class="c"></div>
<?php include template("content","footer"); ?>