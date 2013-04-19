<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><title> 华语乐坛至尊榜- <?php echo L('member','','member').L('manage_center');?></title>
<?php include template("content",'header'); ?>

<link href="<?php echo CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>table_form.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>cookie.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>member_common.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>dialog.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>formvalidator.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>formvalidatorregex.js" charset="UTF-8"></script>
<script language="JavaScript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#username").formValidator({onshow:"<?php echo L('input').L('email');?>",onfocus: "<?php echo L('between_6_to_20');?>"}).inputValidator({min:6,max:20,onerror:"<?php echo L('between_6_to_20');?>"}).regexValidator({regexp:"email",datatype:"enum",onerror:"<?php echo L('email').L('format_incorrect');?>"});
	$("#password").formValidator({onshow:"<?php echo L('input').L('password');?>",onfocus:"<?php echo L('password').L('between_6_to_20');?>"}).inputValidator({min:6,max:20,onerror:"<?php echo L('password').L('between_6_to_20');?>"});
	$(".login").hide();

});
//-->
</script>
<link href="<?php echo CSS_PATH;?>hy/css/about.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>dialog_simp.css" rel="stylesheet" type="text/css" />
</head>

<div class='login_page'>
<div class="col-left form-login" id="logindiv">
	<div class="page_title login_title">
		<h3></h3>
	
		<div class='music_link l'>
	  <i class='l'></i>
	  <i class='l'></i>
	</div>
	<div class='music_link r'>
	  
	  <i class='l'></i>
	  <i class='l'></i>
	</div>
</div>
<div class="form">
	<form method="post" action="" onsubmit="save_username();" id="myform" name="myform">
		<div class='inputs'>
			<input type="hidden" name="forward" id="forward" value="<?php echo $forward;?>">
	    	<div class="input">
				<label><?php echo L('emailName');?>：</label><input type="text" id="username" name="username" size="22" class="input-text">
			</div>
	        <div class="input">
				<label><?php echo L('password');?>：</label><input type="password" id="password" name="password" size="22" class="input-text">
			</div>
	        <div class="input">
				<label style='padding-left:1em;'><?php echo L('checkcode');?>：</label><input type="text" id="code" name="code" size="8" class="input-text"style='margin-right:15px;'><?php echo form::checkcode('code_img', '4', '14', 104, 33);?>
			</div>
	        <div class="take">
			<input type="checkbox" name="cookietime" value="2592000" id="cookietime"> <?php echo L('remember');?><?php echo L('username');?>
			&nbsp;&nbsp;&nbsp;
			<a href="index.php?m=member&c=index&a=public_forget_password&siteid=<?php echo $siteid;?>" class="blue"><?php echo L('forgetpassword');?></a><br />
				
					<div class="submit">
						<input type="submit" name="dosubmit" id="dosubmit"value='' />
					</div>
					<div class="submit">
						<a id="sign" href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=register&siteid=<?php echo $siteid;?>" target="_blank">
							&nbsp;
						</a>
					</div>
				
			</div>
	        <div class="hr"><hr /></div>
	       </div>
	</form>
	   
			
	    </div>

</div>
<script language="JavaScript">
<!--

// 	$(function(){
// 		$('#username').focus();
// 	})

// 	function save_username() {
// 		if($('#cookietime').attr('checked')==true) {
// 			var username = $('#username').val();
// 			setcookie('username', username, 3);
// 		} else {
// 			delcookie('username');
// 		}
// 	}
// 	var username = getcookie('username');
// 	if(username != '' && username != null) {
// 		$('#username').val(username);
// 		$('#cookietime').attr('checked',true);
// 	}

// 	function show_login(site) {
// 		if(site == 'sina') {
// 			art.dialog({lock:false,title:'<?php echo L('sina_login');?>',id:'protocoliframe', iframe:'index.php?m=member&c=index&a=public_sina_login',width:'500',height:'310',yesText:'<?php echo L('close');?>'}, function(){
// 			});
// 		} else if(site == 'snda') {
// 			art.dialog({lock:false,title:'<?php echo L('snda_login');?>',id:'protocoliframe', iframe:'index.php?m=member&c=index&a=public_snda_login',width:'500',height:'310',yesText:'<?php echo L('close');?>'}, function(){
// 			});
// 		} else if(site == 'qq') {
// 			art.dialog({lock:false,title:'<?php echo L('qq_login');?>',id:'protocoliframe', iframe:'index.php?m=member&c=index&a=public_qq_login',width:'500',height:'310',yesText:'<?php echo L('close');?>'}, function(){
// 			});
// 		}
// 	}
// //-->
</script>
</div>
<div class="c"></div>
<?php include template('content', 'footer'); ?>
</html>

