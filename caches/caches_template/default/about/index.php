<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!-- 引入头部文件开始 -->
<?php include template("content","header"); ?>
<!-- 引入头部文件结束 -->
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>hy/css/about.css">
<!-- 内容部分开始 -->
<script type="text/javascript">

</script>
<div id='cont' class='center2'>
	<!-- 左侧选择导航开始 -->
	<div class='l list'>
    	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0ac801f493f0f7197fbb8ed33ab647ad&action=category&catid=31&num=25&siteid=%24siteid&order=listorder+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'31','siteid'=>$siteid,'order'=>'listorder DESC','limit'=>'25',));}?>
        	<ul class="nav-site">
			<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
			<li <?php if($id==$r['catid']) { ?> class="liston" <?php } ?>><a href="<?php echo $r['url'];?>" target='con'><span><?php echo $r['catname'];?></span></a></li>
			<?php $n++;}unset($n); ?>
            </ul>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		<?php echo runhook('glogal_menu')?>
    </div> 
	<!-- 左侧选择导航结束 -->
	<!-- 文章内容开始 -->
	<div class='l content'>
		<div class='content_title l'>
			<h2 class='l'>榜单简介</h2>
			<span class='r'>当前位置:首页>榜单简介</span>
		</div>
		<div class='c'></div>
		<iframe src="" name='con' style='background:#F4F2ED' frameborder="no" width='710'class='l'></iframe>

	</div>
	<!-- 文章内容结束 -->
</div>
<div class='c'></div>
<!-- 内容部分结束 -->
<script type="text/javascript">
	
	$(function(){
		$("li").click(function(){
			$(".liston").removeClass("liston");
			$(this).addClass("liston");
		})
		$("iframe[name='con']").attr('src',$(".list:first").find("a").attr('href'))

	})
</script>
<?php include template('content',"footer"); ?>