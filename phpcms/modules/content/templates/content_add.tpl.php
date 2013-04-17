<?php
defined('IN_ADMIN') or exit('No permission resources.');$addbg=1;
include $this->admin_tpl('header','admin');?>
<script type="text/javascript">
<!--
	var charset = '<?php echo CHARSET;?>';
	var uploadurl = '<?php echo pc_base::load_config('system','upload_url')?>';
//-->
</script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>content_addtop.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>colorpicker.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>hotkeys.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>cookie.js"></script>
<script type="text/javascript">var catid=<?php echo $catid;?></script>
<form name="myform" id="myform" action="?m=content&c=content&a=add" method="post" enctype="multipart/form-data">
<div class="addContent">
<div class="crumbs"><?php echo L('add_content_position');?></div>
<div class="col-right">
    	<div class="col-1">
        	<div class="content pad-6">
<?php
if(is_array($forminfos['senior'])) {
 foreach($forminfos['senior'] as $field=>$info) {
	if($info['isomnipotent']) continue;
	if($info['formtype']=='omnipotent') {
		foreach($forminfos['base'] as $_fm=>$_fm_value) {
			if($_fm_value['isomnipotent']) {
				$info['form'] = str_replace('{'.$_fm.'}',$_fm_value['form'],$info['form']);
			}
		}
		foreach($forminfos['senior'] as $_fm=>$_fm_value) {
			if($_fm_value['isomnipotent']) {
				$info['form'] = str_replace('{'.$_fm.'}',$_fm_value['form'],$info['form']);
			}
		}
	}
 ?>
	<h6><?php if($info['star']){ ?> <font color="red">*</font><?php } ?> <?php echo $info['name']?></h6>
	 <?php echo $info['form']?><?php echo $info['tips']?> 
<?php
} }
?>
<?php if($_SESSION['roleid']==1 || $priv_status) {?>
<h6><?php echo L('c_status');?></h6>
<span class="ib" style="width:90px"><label><input type="radio" name="status" value="99" checked/> <?php echo L('c_publish');?> </label></span>
<?php if($workflowid) { ?><label><input type="radio" name="status" value="1" > <?php echo L('c_check');?> </label><?php }?>
<?php }

	
?>
          </div>
        </div>
    </div>
    <a title="展开与关闭" class="r-close" hidefocus="hidefocus" style="outline-style: none; outline-width: medium;" id="RopenClose" href="javascript:;"><span class="hidden">展开</span></a>
    <div class="col-auto">
    	<div class="col-1">
        	<div class="content pad-6">
<table width="100%" cellspacing="0" class="table_form">
	<tbody>

<?php
if(is_array($forminfos['base'])) {
 foreach($forminfos['base'] as $field=>$info) {
	 if($info['isomnipotent']) continue;
	 if($info['formtype']=='omnipotent') {
		foreach($forminfos['base'] as $_fm=>$_fm_value) {
			if($_fm_value['isomnipotent']) {
				$info['form'] = str_replace('{'.$_fm.'}',$_fm_value['form'],$info['form']);
			}
		}
		foreach($forminfos['senior'] as $_fm=>$_fm_value) {
			if($_fm_value['isomnipotent']) {
				$info['form'] = str_replace('{'.$_fm.'}',$_fm_value['form'],$info['form']);
			}
		}
	}
 ?>
	<tr>
      <th width="80">	<?php if($info['star']){ ?> <font color="red">*</font><?php } ?> <?php echo $info['name']?>
	  </th>
	  <?php 
	 //  if ($forminfos['base']['title']['name']=='歌曲名' || $forminfos['base']['title']['name']=='专辑名')
	 //  	{
	 //  			switch($info['name'])
	 //  			{
	 //  				case '歌手':
	 //  				$info['form']='<input type="button" class="sid button" value="请选择" /><input type="hidden" class="info_sid" name="info[sid]" />';
	 //  				break;
	 //  				case '专辑':
	 //  				$info['form']='<input type="button" class="spid button" value="请选择" /><input type="hidden" class="info_spid" name="info[spid]" />';
	 //  				break;
	 //  				default:
	 //  				break;

		// }
	 //  			}
	  		
	  ?>
	 	

      <td><?php echo $info['form']?>  <?php echo $info['tips']?></td>
    </tr>
<?php
} }
?>

    </tbody></table>
                </div>
        	</div>
        </div>
        
    </div>
</div>

<div class="fixed-bottom">
	<div class="fixed-but text-c">
    <div class="button"><input value="<?php echo L('save_close');?>" type="submit" name="dosubmit" class="cu" style="width:145px;" onclick="refersh_window()"></div>
    <div class="button"><input value="<?php echo L('save_continue');?>" type="submit" name="dosubmit_continue" class="cu" style="width:130px;" title="Alt+X" onclick="refersh_window()"></div>
    <div class="button"><input value="<?php echo L('c_close');?>" type="button" name="close" onclick="refersh_window();close_window();" class="cu" style="width:70px;"></div>
      </div>
</div>
</form>
<!-- 当是歌曲添加页面的时候才加载 -->

<?php if($forminfos['base']['title']['name']=='歌曲名' || $forminfos['base']['title']['name']=='专辑名'):?>
<div class='zz'></div>
	  	<div style="position: absolute; width: auto; z-index: 1989;" class="   aui_state_focus aui_state_lock hide_sid"><div class="aui_outer"><table class="aui_border"><tbody><tr><td class="aui_nw"></td><td class="aui_n"></td><td class="aui_ne"></td></tr><tr><td class="aui_w"></td><td class="aui_c"><div class="aui_inner"><table class="aui_dialog"><tbody><tr><td colspan="2" class="aui_header"><div class="aui_titleBar"><div class="aui_title" style="cursor: move; display: block;">歌手</div><a class="aui_close" href="javascript:void(0)/;" style="display: block;">×</a></div></td></tr><tr><td class="aui_icon" style="display: none;"><div class="aui_iconBg" style="background-image: none; background-position: initial initial; background-repeat: initial initial;"></div></td><td class="aui_main"><div class="aui_content" style="padding: 20px 25px;"><div class="linkage-menu"><h6><span>歌手</span> <a href="javascript:;" onclick="get_parent(this)" id="parent_birthplace" parentid="0"><img src="statics/images/icon/old-edit-redo.png" width="16" height="16" alt="返回上一级"></a></h6><div class="ib-a menu" id="ul_birthplace">	
	  			<?php 
				$db=pc_base::load_model('singer_model');
				$r=$db->select('id!=0','id,title');
				foreach ($r as $v){
					echo "<a href='javascript:void(0)' value='".$v['id']."'>$v[title]"."</a>";
				}
				?></div></div></div></td></tr><tr><td colspan="2" class="aui_footer"><div class="aui_buttons" style="display: none;"></div></td></tr></tbody></table></div></td><td class="aui_e"></td></tr><tr><td class="aui_sw"></td><td class="aui_s"></td><td class="aui_se" style="cursor: se-resize;"></td></tr></tbody></table></div></div>
		<div style="position: absolute; width: auto; z-index: 1989;" class="   aui_state_focus aui_state_lock hide_spid">
			<div class="aui_outer">
				<table class="aui_border">
					<tbody>
					<tr>
						<td class="aui_nw"></td>
						<td class="aui_n"></td>
						<td class="aui_ne"></td>
					</tr>
						<tr>
							<td class="aui_w"></td>
						<td class="aui_c"><div class="aui_inner"><table class="aui_dialog"><tbody><tr><td colspan="2" class="aui_header"><div class="aui_titleBar"><div class="aui_title" style="cursor: move; display: block;">专辑</div>
							<a class="aui_close" href="javascript:void(0)/;" style="display: block;">×</a>
						</div>
						</td>
						</tr>
							<tr>
								<td class="aui_icon" style="display: none;">
									<div class="aui_iconBg" style="background-image: none; background-position: initial initial; background-repeat: initial initial;"></div>
							</td>
								<td class="aui_main">
									<div class="aui_content" style="padding: 20px 25px;">
										<div class="linkage-menu">
											<h6><span>专辑</span> 
												<a href="javascript:;" onclick="showAui('sid')" id="parent_birthplace" parentid="0"><img src="statics/images/icon/old-edit-redo.png" width="16" height="16" alt="返回上一级">
												</a>
											</h6>
											<div class="ib-a menu" id="ul_birthplace">	
													<!-- 放专辑名称 -->
											</div>
										</div>
									</div>
								</td>
							</tr>
			`				<tr>
								<td colspan="2" class="aui_footer">
									<div class="aui_buttons" style="display: none;"></div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</td>
			<td class="aui_e"></td>
		</tr>
		<tr>
			<td class="aui_sw"></td>
			<td class="aui_s"></td>
			<td class="aui_se" style="cursor: se-resize;"></td>
		</tr>
	</tbody>
</table>
</div>
</div>		
		
<style type="text/css">
		.zz{
			position: absolute;
			top:0px;
			left:0px;
			background-color: #333;
			opacity: 0.7;
			-moz-opacity: 0.7;
			filter:alpha(opacity=7);
			display: none;
		}
		.aui_state_focus{
			display: none;
			width:688px;
			left:0px;
		}

</style>
<script type="text/javascript">

// $(".aui_state_lock").hide()
// $(".zz").css({
// 		"width":$(window).width(),
// 		"height":$(window).height(),
// 		"display":'hidden',
// 	})
// 	$(".aui_state_focus").css({
// 		'width':698,
// 		'left':(parseInt($(window).width())-688)/2,
// 		'top':(parseInt($(window).height())-parseInt($(".aui_state_focus").height()))/2
// 	})
// $(".aui_close").click(function(){
// 	$(".zz").hide();
// 	$(".aui_state_focus").hide();
// })


// $(".spid").click(function(){
// 	if(!$(".info_sid").val()){
// 		alert("请先选择歌手");
// 		 $(".hide_sid").show();
// 		 stopPropagation()
// 	}else{
// 		$(".sp").show();
// 		var sid=$(".info_sid").val();
// 		if(sid!=$(".has_post").val()){
// 			$.post(
// 				'index.php?m=music&c=index&a=getSps',
// 				{sid:sid},
// 				function(data){
// 					$(".hide_spid #ul_birthplace").append('<input type="hidden" class="has_post" value="'+sid+'" />');
// 					var i=0;
// 					for(i;i<data.length;i++){
// 						$(".hide_spid #ul_birthplace").append(
// 							"<a href='javascript:void(0)' value='"+data[i]['id']+"'>"+data[i]['title']+"</a>"
// 							)
// 					}
// 				},'json');
// 		}
// 	}
	

// })
// function showAui(element){
// 	$("."+element).click(function(){
// 		$(".zz").show();
// 		$(".hide_"+element).show();
// 	})
// }
// showAui("sid")
// showAui("spid");
// /**
//  * @param element 触发事件的元素节点
//  * @param getId   获得值的元素节点
//  * @param child   添加和删除的时间
//  */
// function changeId(element,getId,child)
// {
// 	$(element).live('click',function(){

// 		if($(this).text()!=='×')
// 		{
// 			$("."+child).remove();
// 			$("."+getId).attr('value',$(this).attr("value"));
// 			var starName='<span class="'+child+'" style="padding:0 2px;maring-right:4px;">'+$(this).text()+'</span>';
// 			$(starName).insertBefore($("."+getId).prev("input"));
// 			$(".zz").hide();
// 			$(".aui_state_focus").hide();

// 		}
// 	})
// }
// changeId(".hide_sid a",'info_sid',"starName");
// changeId(".hide_spid #ul_birthplace a",'info_spid',"spName");
</script>
<?php endif;?>
</body>
</html>
<script type="text/javascript"> 
<!--

//只能放到最下面
var openClose = $("#RopenClose"), rh = $(".addContent .col-auto").height(),colRight = $(".addContent .col-right"),valClose = getcookie('openClose');
$(function(){
	if(valClose==1){
		colRight.hide();
		openClose.addClass("r-open");
		openClose.removeClass("r-close");
	}else{
		colRight.show();
	}
	openClose.height(rh);
	$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({id:'check_content_id',content:msg,lock:true,width:'200',height:'50'}, 	function(){$(obj).focus();
	boxid = $(obj).attr('id');
	if($('#'+boxid).attr('boxid')!=undefined) {
		check_content(boxid);
	}
	})}});
	<?php echo $formValidator;?>
	
/*
 * 加载禁用外边链接
 */

	$('#linkurl').attr('disabled',true);
	$('#islink').attr('checked',false);
	$('.edit_content').hide();
	jQuery(document).bind('keydown', 'Alt+x', function (){close_window();});
})
document.title='<?php echo L('add_content');?>';
self.moveTo(-4, -4);
function refersh_window() {
	setcookie('refersh_time', 1);
}
openClose.click(
	  function (){
		if(colRight.css("display")=="none"){
			setcookie('openClose',0,1);
			openClose.addClass("r-close");
			openClose.removeClass("r-open");
			colRight.show();
		}else{
			openClose.addClass("r-open");
			openClose.removeClass("r-close");
			colRight.hide();
			setcookie('openClose',1,1);
		}
	}
)

//-->
</script>