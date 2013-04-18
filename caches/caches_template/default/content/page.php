<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><script type="text/javascript" src='<?php echo JS_PATH;?>jquery.min.js'></script>
<!-- 榜单相关页面 -->
<script type='text/javascript'>
$(function(){
 
    // alert($(".col-auto").height())
   window.onload=function(){

   $(window.parent.document).find("iframe").css({'height':parseInt($(".col-auto").height())+120});
   } 
})
</script>
    <div id="content">

      <div class="col-auto">

            <div class="content" style='line-height:2em;margin-top:55px;text-algin:center;'>
            	    <?php echo $content;?>
            </div>
        </div>
     </div>
