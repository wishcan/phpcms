<?php defined('IN_ADMIN') or exit('No permission resources.');?>
<?php include $this->admin_tpl('header', 'admin');?>
<div class="pad-lr-10">
<div class="table-list"> 
<div class="subnav">
    <div class="content-menu ib-a blue line-x">
<a href="<?php echo APP_PATH;?>index.php?m=music&c=admin_music&a=musicList&id=<?php echo $id.'&search='.$_GET['search']?>">返回上一层</a>
</div>
<div class="bk10"></div>
<form name="myform" id="myform" action="?m=member&c=member_model&a=delete" method="post" onsubmit="check();return false;">
<table width="100%" cellspacing="0">
	<style type="text/css">
	td,th{text-align: center;}
	</style>
	<thead>
		<tr>
			<th align="center" width="30px"><input type="checkbox" value="" id="check_box" onclick="selectall('modelid[]');"></th>
			<th align="center">歌曲名</th>
			<th align="center">歌手</th>
			<th>操作</th>
		</tr>
	</thead>
<tbody>

<?php
	foreach($data as $k=>$v) {
?>
    <tr>

    	<td><input type="checkbox" value="<?php echo $v['id'];?>" name="modelid[]"></td>
    	<td><?php echo $v['title'];?></td>
    	<td><?php echo $v['singer'];?></td>
    	<td>
    		| <a style='cursor: pointer;'onclick='javascript:addpos(<?php echo $v["id"] ?>)'>加入试听</a>	
    	</td>	
		
    </tr>
<?php
	}
?>
</tbody>
</table>

<div class="btn">
	<label for="check_box"><?php echo L('select_all')?>/<?php echo L('cancel')?></label>
	<input type="button" class="button" id='addall'name="dosubmit" value="添加所有"/>
</div> 
<div id="pages"><?php echo $pages?></div>
</div>
</div>
</form>
<div id="PC__contentHeight" style="display:none">160</div>

<script language="JavaScript">
<!--
function edit(id, name) {
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:'<?php echo L('edit').L('member_model')?>《'+name+'》',id:'edit',iframe:'?m=member&c=member_model&a=edit&modelid='+id,width:'700',height:'500'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;d.document.getElementById('dosubmit').click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}

function move(id, name) {
	window.top.art.dialog({id:'move'}).close();
	window.top.art.dialog({title:'<?php echo L('move')?>《'+name+'》',id:'move',iframe:'?m=member&c=member_model&a=move&modelid='+id,width:'700',height:'500'}, function(){var d = window.top.art.dialog({id:'move'}).data.iframe;d.$('#dosubmit').click();return false;}, function(){window.top.art.dialog({id:'move'}).close()});
}

function check() {
	if(myform.action == '?m=member&c=member_model&a=delete') {
		var ids='';
		$("input[name='modelid[]']:checked").each(function(i, n){
			ids += $(n).val() + ',';
		});
		if(ids=='') {
			window.top.art.dialog({content:'<?php echo L('plsease_select').L('member_model')?>',lock:true,width:'200',height:'50',time:1.5},function(){});
			return false;
		}
	}
	myform.submit();
}

//修改菜单地址栏
function _M(menuid) {
	$.get("?m=admin&c=index&a=public_current_pos&menuid="+menuid, function(data){
		parent.$("#current_pos").html(data);
	});
}
$(function(){
	 sid=<?php echo $_GET['id'];?>;
	$("#addall").click(function(){

		var ids='';
		$("input[name='modelid[]']:checked").each(function(i, n){
			ids += $(this).val()+',';
		});
		if(ids==''|| ids==','){
			alert("你还没有选定歌曲")
			return;
		}
		addpos(ids);
	})


})



	
//添加试听
function addpos(ids)
{
				$.post(
					'?m=music&c=admin_music&a=addpos',
					{id:sid,ids:ids},
					function(statu)
					{
						
						switch(parseInt(statu)){
							case 1:
							alert("操作成功")
							location.reload();
							break;
							case 0:
							alert("操作有误");
							break;
							case -1:
							alert("操作失败请稍后重试");
							break;
							default:
							alert(statu);
							break;
						}
					}


					);
} 


//-->
</script>
</body>
</html>