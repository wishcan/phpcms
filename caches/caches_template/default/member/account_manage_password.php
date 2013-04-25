<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><link rel="stylesheet" href="<?php echo CSS_PATH;?>hy/css/member.css">
<link href="<?php echo CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>table_form.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>cookie.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>member_common.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>dialog.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>formvalidator.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>formvalidatorregex.js" charset="UTF-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo JS_PATH;?>calendar/jscal2.css">
<link rel="stylesheet" type="text/css" href="<?php echo JS_PATH;?>calendar/border-radius.css">
<link rel="stylesheet" type="text/css" href="<?php echo JS_PATH;?>calendar/win2k.css"><script type="text/javascript" src="<?php echo JS_PATH;?>calendar/calendar.js"></script><script type="text/javascript" src="<?php echo JS_PATH;?>calendar/lang/en.js"></script>
<script type="text/javascript">
<!--
$(function(){

	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#password").formValidator({onshow:"<?php echo L('input').L('password');?>",onfocus:"<?php echo L('password').L('between_6_to_20');?>"}).inputValidator({min:0,max:20,onerror:"<?php echo L('password').L('between_6_to_20');?>"});
	$("#newpassword").formValidator({onshow:"<?php echo L('input').L('password');?>",onfocus:"<?php echo L('password').L('between_6_to_20');?>"}).inputValidator({min:0,max:20,onerror:"<?php echo L('password').L('between_6_to_20');?>"});
	$("#renewpassword").formValidator({onshow:"<?php echo L('input').L('cofirmpwd');?>",onfocus:"<?php echo L('input').L('passwords_not_match');?>",oncorrect:"<?php echo L('passwords_match');?>"}).compareValidator({desid:"newpassword",operateor:"=",onerror:"<?php echo L('input').L('passwords_not_match');?>"});	
	$("#email").formValidator({onshow:"<?php echo L('input').L('email');?>",onfocus:"<?php echo L('email').L('format_incorrect');?>",oncorrect:"<?php echo L('email').L('format_right');?>"}).inputValidator({min:2,max:32,onerror:"<?php echo L('email').L('between_2_to_32');?>"}).regexValidator({regexp:"email",datatype:"enum",onerror:"<?php echo L('email').L('format_incorrect');?>"}).ajaxValidator({
	    type : "get",
		url : "",
		data :"m=member&c=index&a=public_checkemail_ajax",
		datatype : "html",
		async:'false',
		success : function(data){	
            if( data == "1" ) {
                return true;
			} else {
                return false;
			}
		},
		buttons: $("#dosubmit"),
		onerror : "<?php echo L('deny_register').L('or').L('email_already_exist');?>",
		onwait : "<?php echo L('connecting_please_wait');?>"
	}).defaultPassed();
})
//-->
</script>
<div class="iframe change"  style='width:600px;'>
	<h3>修改资料</h3>
			<div class="content" width='600'>
			<form method="post" action="" id="myform" name="myform">
				<table width="100%" cellspacing="0" class="table_form">
					<tr>
						<th><label><?php echo L('email');?></label>：</th>        
						<td><input name="info[email]" type="text" id="email" size="30" value="<?php echo $memberinfo['email'];?>" class="input-text"></td>
					</tr>
					<tr>
						<th ><label><?php echo L('old_password');?></label>：</th>      
						<td><input name="info[password]" type="password" id="password" size="30" value="" class="input-text"></td>
					</tr>

					<tr>
						<th><label><?php echo L('new_password');?></label>：</th>
						<td><input name="info[newpassword]" type="password" id="newpassword" size="30" value="" class="input-text"></td>
					</tr>
					<tr>
						<th><label><?php echo L('re_input').L('new_password');?></label>：</th>
						<td><input name="info[renewpassword]" type="password" id="renewpassword" size="30" value="" class="input-text"></td>
					</tr>

					<tr>
						<th><label>所在城市</label>： </th>
						<td id='city'><span class='ld'><?php echo menu_linkage(1,'L_1');?></span></td>
					</tr>
					<tr>
						<th><label>性别</label>： </th>
						<td><span class='ld'><?php echo menu_linkage(3446,'L_3446');?></span></td>
					</tr>
					<tr>
						<th><label>生日</label>： </th>
						<td>
						<input type="text" name="birthday" id="info[birthday]" value="<?php echo $birthday;?>" size="10" class="date input-text" readonly="">
							<script type="text/javascript">
							$(".colselect").css("background-image",'url(<?php echo CSS_PATH;?>hy/images/select_bg.png)')
							Calendar.setup({
							weekNumbers: true,
						    inputField : "info[birthday]",
						    trigger    : "info[birthday]",
						    dateFormat: "%Y-%m-%d",
						    showTime: false,
						    onSelect   : function() {this.hide();}
							});
				      	  </script>
			    	</td>
					</tr>
					<tr>
						<th><label>QQ</label>： </th>
						<td><input type="text" name="info[qq]"value="<?php echo $qq;?>" id="QQ"></td>
					</tr>
					<tr>
						<th><label>手机</label>： </th>
						<td><input type="text" name="info[phone]"value="<?php echo $phone;?>" id="hone"></td>
					</tr>
					<tr>
						<th></th>
						<td><input style='width: 108px;' name="dosubmit" type="submit" id="dosubmit" value="" class="button"></td>
					</tr>
				</table>

				
			</form>
			</div>
			<span class="o1"></span><span class="o2"></span><span class="o3"></span><span class="o4"></span>
		</div>
	</div>
</div>
<div class="clear"></div>

