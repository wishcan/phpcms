<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>hy/css/news.css">
<!--main-->
<div class="main center2"id='friend'>
    <!-- 合作联盟 -->
	<div class="col-left">
            <div class='media'>
            <h2 class='me_title'></h2>
        	<?php $j=1;?>
        	<?php $n=1;if(is_array(subcat($catid))) foreach(subcat($catid) AS $v) { ?>
        	<?php if($v['type']!=0) continue;?>

            		<!-- <h5><?php echo $v['catname'];?></h5> -->
                    <div class='medias'>
                         <div class='medias_auto'>
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=5d107604b68e61f01796643989da0a78&action=lists&catid=%24v%5Bcatid%5D&num=5&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$v[catid],'order'=>'id DESC','limit'=>'5',));}?>
                       
        					<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
        						<a href="" target="_blank"<?php echo title_style($v[style]);?>><?php echo $v['title'];?></a>
        					<?php $n++;}unset($n); ?>
                      
        				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                        </div>
                    </div>

                    <!-- <div class='morem r'></div> -->
                    <div class='c'></div>
            <?php if($j%2==0) { ?><div class="bk10"></div><?php } ?>
    	   <?php $j++; ?>
    	   <?php $n++;}unset($n); ?>
           </div>
</div>

    <div class="col-left">
      <div class='school'>
         <h2 class='sc_title'></h2>
         <div class='medias'>
                <div class='medias_auto'>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=5d107604b68e61f01796643989da0a78&action=lists&catid=%24v%5Bcatid%5D&num=5&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$v[catid],'order'=>'id DESC','limit'=>'5',));}?>
                           
                                <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                                    <a href="<?php echo $v['url'];?>" target="_blank"<?php echo title_style($v[style]);?>><?php echo $v['title'];?></a>
                                <?php $n++;}unset($n); ?>
                            

                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </div>
          </div>  
      </div>
    </div>
 </div> 
  <!--高校联盟-->

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
  $(function(){
  $(".morem").on("click",function(){
      $(".focus").css("height",42)
       $(this).prev(".medias").css("height",$(this).prev(".medias").find(".medias_auto").height());
       $(this).prev(".medias").addClass("focus");

  })
  })

 </script>



</script>
<?php include template("content","footer"); ?>