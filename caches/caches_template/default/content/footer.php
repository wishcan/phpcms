<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!-- 底部开始 -->
<div class="footer" id="footer">
	<!-- 底部第一部分开始 -->
	<div class='footer_t'>
		<div class='center2'>
			<div class='footer_t_l'>
				<a href='' class='foot_logo'></a>
				<p>联系电话：010-22222222   010-88888888</p>
				<p>新闻发布：XXX@xxx.com</p>
				<p>内容合作：12345678 XXX</p>
				<p>市场合作：12345678 XXX</p>
			</div>
			<div class='footer_t_r'>
				<h3>合作伙伴</h3>
				<div class='firend_link'>
			<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"link\" data=\"op=link&tag_md5=99c32cd273c57223c20074bf5196e97a&action=type_list&siteid=%24siteid&order=listorder+DESC&num=10&return=dat\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$link_tag = pc_base::load_app_class("link_tag", "link");if (method_exists($link_tag, 'type_list')) {$dat = $link_tag->type_list(array('siteid'=>$siteid,'order'=>'listorder DESC','limit'=>'10',));}?>

					<?php $n=1;if(is_array($dat)) foreach($dat AS $v) { ?>
			              <span><?php echo $v['name'];?></span> |
					<?php $n++;}unset($n); ?>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
				</div>
			</div>
		</div>
	</div>
	<div class='footer_b'>
		<div class='center2'>
			<p class='live_us l'>关注我们:</p>
			<p class='abuto_us r'>© 2007 - 2012 北京红色春天有限公司   京网文[2011]0012-005号    京ICP备08103200号-2 </p>

		</div>
	</div>

<div class='c'></div>
<!-- <p class="info">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=e3d146232857be4579899ac97dbd2f7c&action=category&catid=1&num=15&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'1','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'15',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
<a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['catname'];?></a> |  
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=15" target="_blank">友情链接</a>
<br />
Powered by <strong><a href="http://www.phpcms.cn" target="_blank"></em> &copy; 2011 <img src="<?php echo IMG_PATH;?>copyright.gif"/><?php echo tjcode();?><?php echo runhook('glogal_footer')?>
</p> -->
</div>
<script type="text/javascript">
$(function(){
	$(".picbig").each(function(i){
		var cur = $(this).find('.img-wrap').eq(0);
		var w = cur.width();
		var h = cur.height();
	   $(this).find('.img-wrap img').LoadImage(true, w, h,'<?php echo IMG_PATH;?>msg_img/loading.gif');
	});
	if(parseInt($(".footer_t_l").height())>parseInt($(".footer_t_r").height())){
		var hei=parseInt($(".footer_t_l").height());
	}else{
		var hei=parseInt($(".footer_t_r").height());
	}
	$(".footer_t").css('height',hei)
})
</script>
</body>
</html>