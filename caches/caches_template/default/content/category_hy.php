<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--main-->
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>hy/css/news.css">
<script type="text/javascript" src='<?php echo JS_PATH;?>jquery.min.js'></script>
<style type="text/css">
li{
    list-style-type: square;
  }
</style>
<div class="main center2">
    <div id='new' class='l'>
        <div class='content_title l'>
            <h2 class='l'>新闻资讯</h2>
            <span class='r'>当前位置:首页>新闻资讯</span>
        </div>
        <div class='c'></div>
        <div class="col-auto channel-slide">
            <div class='newlist'>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0f61c2895a82256f65c91834b3b011ae&action=lists&catid=%24catid&order=updatetime+desc&num=25\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catid,'order'=>'updatetime desc','limit'=>'25',));}?>
                        <div class="title">
                        <?php $n=1; if(is_array($data)) foreach($data AS $k => $v) { ?>
                         <li> <p  <?php if($n==1) { ?>style="display:block"<?php } ?>>
                          <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" target='blank' class="blue"<?php echo title_style($v[style]);?>><?php echo str_cut($v[title], 80);?></a>
                            <span class='time'><?php echo date('Y-m-d H:i:s',$v[inputtime]);?></span>
                          </p>
                          </li>
                           <div <?php if($n%5==0) { ?> class='pre'<?php } ?>></div>
                        <?php $n++;}unset($n); ?>
                      </div>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
          </div>
        </div>
   </div>

    <!--分类新闻-->
    <!-- 引入右侧文件-->
	<?php include template("content","new_right"); ?>
<!--         <div class="col-auto">
            <div class="left">推广链接</div>
            <div class="right">这里放广告</div>
        </div> -->
  </div>

  <div class="bk10"></div>
</div>
<script type="text/javascript">
function ChannelSlide(Name,Class){
	$(Name+' ul.photo li').sGallery({
		titleObj:Name+' div.title p',
		thumbObj:Name+' .thumb li',
		thumbNowClass:Class
	});
}
new ChannelSlide(".channel-slide","on",311,260);
</script>
<?php include template("content","footer"); ?>
<script type="text/javascript">
</script>