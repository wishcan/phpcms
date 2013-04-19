<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><title><?php echo L('member','','member').L('manage_center');?></title>
<?php include template("content",'header'); ?>
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>member_common.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>formvalidator.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>formvalidatorregex.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>dialog.js"></script>
<link href="<?php echo CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>dialog_simp.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
<!--
$(function(){
    $.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});

    $("#username").formValidator({onshow:"<?php echo L('input').L('username');?>",onfocus:"<?php echo L('username').L('between_2_to_20');?>"}).inputValidator({min:2,max:20,onerror:"<?php echo L('username').L('between_2_to_20');?>"}).regexValidator({regexp:"ps_username",datatype:"enum",onerror:"<?php echo L('username').L('format_incorrect');?>"}).ajaxValidator({
        type : "get",
        url : "",
        data :"m=member&c=index&a=public_checkname_ajax",
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
        onerror : "<?php echo L('deny_register').L('or').L('user_already_exist');?>",
        onwait : "<?php echo L('connecting_please_wait');?>"
    });
    $("#password").formValidator({onshow:"<?php echo L('input').L('password');?>",onfocus:"<?php echo L('password').L('between_6_to_20');?>"}).inputValidator({min:6,max:20,onerror:"<?php echo L('password').L('between_6_to_20');?>"});
    $("#pwdconfirm").formValidator({onshow:"<?php echo L('input').L('cofirmpwd');?>",onfocus:"<?php echo L('passwords_not_match');?>",oncorrect:"<?php echo L('passwords_match');?>"}).compareValidator({desid:"password",operateor:"=",onerror:"<?php echo L('passwords_not_match');?>"});
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
    });
    $("#nickname").formValidator({onshow:"<?php echo L('input').L('nickname');?>",onfocus:"<?php echo L('nickname').L('between_2_to_20');?>"}).inputValidator({min:2,max:20,onerror:"<?php echo L('nickname').L('between_2_to_20');?>"}).regexValidator({regexp:"ps_username",datatype:"enum",onerror:"<?php echo L('nickname').L('format_incorrect');?>"}).ajaxValidator({
            type : "get",
            url : "",
            data :"m=member&c=index&a=public_checknickname_ajax",
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
            onerror : "<?php echo L('already_exist').L('already_exist');?>",
            onwait : "<?php echo L('connecting_please_wait');?>"
        });

    $(":checkbox[name='protocol']").formValidator({tipid:"protocoltip",onshow:"<?php echo L('read_protocol');?>",onfocus:"<?php echo L('read_protocol');?>"}).inputValidator({min:1,onerror:"<?php echo L('read_protocol');?>"});
    
    <?php if($member_setting['mobile_checktype']=='2' && $sms_setting['sms_enable']=='1') { ?>
    $("#mobile").formValidator({onshow:"请输入手机号码",onfocus:"请输入手机号码"}).inputValidator({min:1,onerror:"请输入手机号码"});
    <?php } ?>
    $("#mobile_verify").formValidator({onshow:"请输入手机收到的验证码",onfocus:"请输入手机收到的验证码"}).inputValidator({min:1,onerror:"请输入手机收到的验证码"}).ajaxValidator({
                    type : "get",
                    url : "api.php",
                    data :"op=sms_idcheck&action=id_code",
                    datatype : "html",
                    <?php if($member_setting['mobile_checktype']=='2') { ?>
                    getdata:{mobile:"mobile"},
                    <?php } ?>
                    async:"false",
                    success : function(data){
                        if( data == "1" ) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    buttons: $("#dosubmit"),
                    onerror : "验证码错误",
                    onwait : "请稍候..."
                });

    <?php echo $formValidator;?>

    <?php if(!isset($_GET['modelid']) && !isset($_GET['t']) && !empty($member_setting['showregprotocol'])) { ?>
        show_protocol();
    <?php } ?>
});

function show_protocol() {
    art.dialog({lock:false,title:'<?php echo L('register_protocol');?>',id:'protocoliframe', iframe:'?m=member&c=index&a=register&protocol=1',width:'500',height:'310',yesText:'<?php echo L('agree');?>'}, function(){
        $("#protocol").attr("checked",true);
    });
}

//-->
</script>
<link href="<?php echo CSS_PATH;?>table_form.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>hy/css/about.css" rel="stylesheet" type="text/css" />
<style type="text/css">

</style>
</head>
<body>
<div class="center2" id='sign_page'>
    <div class="page_title sign_title">
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
<div id="content" class='border'>

<?php if(!isset($_GET['t'])) { ?>
<form method="post" action="" id="myform">
    <input type="hidden" name="siteid" value="<?php echo $siteid;?>" />
        <?php if($member_setting['choosemodel']) { ?>
        <!--是否开启选择会员模型选项-->
        <div class="point">
            <div class="content">
                <strong class="title"><?php echo L('notice');?></strong>
                <p><?php echo L('register_notice');?></p>
                <p><?php echo $description;?></p>
            </div>
            <span class="o1"></span><span class="o2"></span><span class="o3"></span><span class="o4"></span>
        </div>

        <div class="input"><label><?php echo L('member_model');?>：</label>
            <?php $n=1; if(is_array($modellist)) foreach($modellist AS $k => $v) { ?>
            <label class="type"><input name="modelid" type="radio" value="<?php echo $k;?>" <?php if($k==$modelid) { ?>checked<?php } ?> onclick="changemodel($(this).val())" /><?php echo $v['name'];?></label>
            <?php $n++;}unset($n); ?>
        </div>
        <?php } ?>
        <div class="input" class='email' style='margin-left:26px'>
                <label><?php echo L('email');?>：</label>
            <input type="text" id="email" name="email" size="36" class="input-text">
        </div>
        <div class="input" style='margin-left:26px'>
                <label><?php echo L('nickname');?>：</label>
                <input type="text" id="nickname" name="nickname" size="36" class="input-text">
        </div>
        <div class="input" style=''>
                <label><?php echo L('password');?>：</label>
            <input type="password" id="password" name="password" size="36" class="input-text">
        </div>
        <div class="input">
                <label><?php echo L('cofirmpwd');?>：</label>
            <input type="password" name="pwdconfirm" id="pwdconfirm" size="36" class="input-text"></div>
        <?php if($member_setting['choosemodel']) { ?>
            <!--是否开启选择会员模型选项-->
            <script language="JavaScript">
            <!--
                function changemodel(modelid) {
                    redirect('<?php echo APP_PATH;?>index.php?m=member&c=index&a=register&modelid='+modelid+'&siteid=<?php echo $siteid;?>');
                }
            //-->
            </script>

            <?php $n=1; if(is_array($forminfos)) foreach($forminfos AS $k => $v) { ?>
                <div class="input"><label><?php if($v['isbase']) { ?><font color=red>*</font><?php } ?> <?php echo $v['name'];?>：<?php if($v['tips']) { ?><br />(<?php echo $v['tips'];?>)<?php } ?></label><div class="form"><?php echo $v['form'];?></div></div>
            <?php $n++;}unset($n); ?>
        <?php } ?>
        <?php if($member_setting['mobile_checktype']=='1' && $sms_setting['sms_enable']=='1') { ?>
            <div class="input"><label>手机验证：：</label>
            <font color="red"><?php echo $member_setting['user_sendsms_title'];?></font>
            </div>
            <div class="input"><label>短信验证码：：</label><input type="text" name="mobile_verify" id="mobile_verify" value="" size="14" class="input-text"></div>
        <?php } ?>
        
        <?php if($member_setting['mobile_checktype']=='2' && $sms_setting['sms_enable']=='1') { ?>
        <div class="input"><label> 手机号码：</label><div class="form"><div id="mobile_div"><input type="text" name="mobile" id="mobile" value="" size="36" class="input-text" title="此服务免费,验证码将以短信免费发送到您的手机"> 
            <div class="submit"><button onclick="get_verify()" type="button" class="hqyz">获取短信验证码</button></div> 
            <br>
            </div>
            <div id="mobile_send_div" style="display:none">此服务免费,验证码已发送到<span id="mobile_send"></span>，<span id="edit_mobile" style="display:none"><a href="javascript:void();" onclick="edit_mobile()">修改号码</a>，</span> 如果超过90秒未收到验证码，您可以免费重新获取。<br><br>
            <div class="submit"><button type="button" id="GetVerify" onclick="get_verify()" class="hqyz">重获短信验证码</button></div> <br><br></div> 
            <script language="JavaScript">
            <!--
                var times = 90;
                var isinerval;
                function get_verify() {
                    var mobile = $("#mobile").val();
                    var partten = /^1[3-9]\d{9}$/;
                    if(!partten.test(mobile)){
                        alert("请输入正确的手机号码");
                        return false;
                    }
                    $.get("api.php?op=sms",{ mobile: mobile,random:Math.random()}, function(data){
                        if(data=="0") {
                            $("#mobile_send").html(mobile);
                            $("#mobile_div").css("display","none");
                            $("#mobile_send_div").css("display","");
                            times = 90;
                            $("#GetVerify").attr("disabled", true);
                            isinerval = setInterval("CountDown()", 1000);
                        } else if(data=="-1") {
                            alert("你今天获取验证码次数已达到上限");
                        } else {
                            alert("短信发送失败");
                        }
                    });
                    
                }
                function CountDown() {
                    if (times < 1) {
                        $("#GetVerify").html("获取短信验证码").attr("disabled", false);
                        $("#edit_mobile").css("display","");
                        clearInterval(isinerval);
                        return;
                    }
                    $("#GetVerify").html(times+"秒后重获验证码");
                    times--;
                }
                function edit_mobile() {
                    $("#mobile_div").css("display","");
                    $("#mobile_send_div").css("display","none");
                }
            //-->
            </script>
            </div></div>
            <div class="input"><label>短信验证码：：</label><input type="text" name="mobile_verify" id="mobile_verify" value="" size="14" class="input-text"></div>    
        
        <?php } ?>
        
        <?php if($member_setting['enablcodecheck']=='1') { ?>
        <div class="input" style='padding-left:2.1em;'><label><?php echo L('checkcode');?>：</label><input type="text" id="code" name="code" size="20" class="input-text"><?php echo form::checkcode('code_img', '4', '14', 80, 25);?></div>
        <?php } ?>
        
        
        <!-- 注释验证码
        
        -->
            <div class="reg">
                <div class="submit"><input type="submit" name="dosubmit" id="sign" value=""></div><br />
            </div>
        </div>
</form>
<?php } elseif (isset($_GET['t']) && $_GET['t']==2) { ?>
<div class="col-left form-login form-reg">
<?php $emailurl = param::get_cookie('email') ? str_replace('@', '',strstr(param::get_cookie('email'), '@')) : '';?>
<?php echo param::get_cookie('_username');?> <?php echo L('hellow');?>，<?php echo L('login_email_authentication');?> <?php if($emailurl) { ?> <?php echo L('please_click');?><a href="http://mail.<?php echo $emailurl;?>"><?php echo L('login_email');?></a><br><br>
重新填写邮箱请点击<a onclick="$('#send_newemail').show()"><font color="red">这里</font></a><br><br>
<div style="display:none" id="send_newemail">
<input type="text" id="newemail" name="newemail" size="36" class="input-text"> 
<div class="submit"><input type="submit" name="dosubmit" value="重新发送新邮箱验证" onclick="javascript:send_newmail();"></div></div>
<script language="JavaScript">
function send_newmail() {
    //var mail_type = $('input[checkbox=mail_type][checked]').val();
    var newemail = $('#newemail').val();
 $.post('?m=member&c=index&a=send_newmail&newemail='+newemail,{},function(data){
    if(data=='1'){alert('发送成功，请查看验证！');}else if(data=='-1'){alert('邮箱已被占用！');}else{alert('发送错误，请联系管理员！');}
    });
} 
</script>
<?php } ?>
</div>
<?php } elseif (isset($_GET['t']) && $_GET['t']==3) { ?>
<div class="col-left form-login form-reg">
<?php echo param::get_cookie('_username');?> <?php echo L('hellow');?>，<?php echo L('please_wait_administrator_verify');?>
</div>
<?php } else { ?>
<script language="JavaScript">
<!--
    redirect("<?php echo APP_PATH;?>index.php?m=member&c=index&a=login");
//-->
</script>
<?php } ?>
</div>
</div>
<div class="c"></div>
</body>
<?php include template('content', 'footer'); ?>