<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><title>会员中心</title>
<?php include template('content', 'header'); ?>
<link rel='stylesheet' href='<?php echo CSS_PATH;?>hy/css/member.css'>
    <script type='text/javascript'>
        $('.login').remove()
    </script>

<div class='center2'id='member' >
    <div class='link l'>
        <h5 class='wel'>欢迎您  <a href='<?php echo APP_PATH;?>index.php?m=member&c=index&a=logout'><?php echo L('logout');?></a></h5>
        <span><?php echo $modelName;?></span><b><?php echo trim(get_nickname(),'()');?></b>
        <a href='<?php echo APP_PATH;?>index.php?m=member&c=index&a=account_manage_password&t=1'class='change' target='con'><h3 class='on'></h3></a>
        <a href='<?php echo APP_PATH;?>index.php?m=music&c=member&a=collect'class='collect' target='con'><h3></h3></a>
        <?php if(in_array($modelid,array('23','24','25'))) { ?>
        <a href='javascript:void(0)'class='grade'><h3></h3></a>
        <?php } ?>

     </div>
    <div id="con"class='border' style='float:left;height: 720px'>
        <iframe style='float:left'width='700'height='720' src="<?php echo APP_PATH;?>index.php?m=member&c=index&a=account_manage_password&t=1" name='con' frameborder="0"></iframe>
    </div>
</div>     
    
<script type='text/javascript' src='<?php echo JS_PATH;?>cookie.js'></script>
<script language='JavaScript'>
<!--
$(document).ready(function() {
	var announcement = getcookie('announcement_<?php echo $memberinfo['userid'];?>_<?php echo $announceid;?>');
	if(announcement==null || announcement=='') {
		$('#announcement').fadeIn('slow');
	}
});

$(function(){
    $(".link a h3").click(function(){
        $(".link a .on").removeClass("on");
        $(this).addClass("on");
    })
})
//-->
</script>
<div class="c"></div>
<?php include template('content', 'footer'); ?>