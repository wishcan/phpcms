<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>hy/css/video.css">
<!--main-->
<div class="main center2 border concert">

	<div class="content_title l">
            <h2 class="l">演出信息</h2>
            <span class="r">当前位置:<a href='<?php echo APP_PATH;?>'>首页</a>&gt;演出信息</span>
       </div>
       <hr/>
	<div id='messages' class='l'>
			<ul class='l'>
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=5afd6a33e5d7548cb4439c97fcc34ca6&action=lists&catid=%24catid&num=15&order=id+DESC&page=%24page&moreinfo=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 15;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'id DESC','moreinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'order'=>'id DESC','moreinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
				<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
				<li>
		<a href="<?php echo $r['url'];?>" target="_blank"<?php echo title_style($r[style]);?>>
				<img src='<?php echo $r['thumb'];?>'class='l' />
						<div class='message l'>
						
								<h3 class='message_title'><?php echo $r['title'];?></h3>
								<p><span>时间：</span><?php echo $r['showtime'];?></p>
								<p><span>地点: </span><?php echo $r['showplaces'];?></p>
								<p><span>地址: </span><?php echo $r['showplace'];?></p>
							</a>
						</div>
						
				</li>	
				<?php if($n%6==0) { ?><li class="bk20 hr"></li><?php } ?>
				<?php $n++;}unset($n); ?> 
			</ul>	
			<div id="pages" class="text-c"><?php echo $pages;?></div> 
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	</div>		
</div>
    <div class="c"></div>
<?php include template("content","footer"); ?>