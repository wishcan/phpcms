
// 搜索音乐
$(function(){
	name='search[singerName]';
	$("select").change(function(){
		if($(this).val()=='按歌名搜索'){
			name='search[musicName]';
		}else{
			name='search[singerName]';
			// $("form input[type='text']").attr("name",'search[musicName]');
		}
	})
$("form").submit(function(){
	return false;
})
	$(".submit").click(function(){

		key=$(this).prev("input").val();
		if(key!==''){
			self.location.href=APP_PATH+'index.php?m=music&c=index&a=search&'+name+'='+key;
		}
		return false;
	})


	$(".name").focus(function(){
		$(window).keydown(function(e){
			if(e.keyCode==13){
				key=$('.name').val();
					if(key!==''){
						self.location.href=APP_PATH+'index.php?m=music&c=index&a=search&'+name+'='+key;
					}
			}

		})



	})



})