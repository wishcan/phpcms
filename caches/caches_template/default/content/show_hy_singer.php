<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>


<!-- 需要参数
	$title   	歌手姓名
	$thumb  	缩略图   
	$content 	内容->歌手的个人信息
	$eName   	英文名    
	$good_works 代表作品
  -->
  <!-- 艺术人生信息页-->
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>hy/css/about.css">
<div id='cont' class='center2 art'>

	<!-- 艺术人生信息页头部开始 -->
	<div class='ar_title page_title'>
		<h3><i></i></h3>
	</div>
	<!-- 歌手个人信息 -->
	<div class='music_link l'>
	
	<i class='l'></i>
	<i class='l'></i>
	</div>
	<div class='music_link r'>
		
		<i class='l'></i>
		<i class='l'></i>
	</div>

<!-- 列表页头部结束 -->

	<div class='arcontent content2 l'>
		<!-- 信息开始 -->
		<div class='art_message l'>
						<!-- 缩略图 -->
						<div class='thumb l'>
							<img src="<?php echo $thumb;?>" />
						</div>
						
						<div class='message l'>
							<!-- 姓名 -->
							<h2><?php echo $title;?></h2>
							<div class='data'>
								 <p><?php echo $content;?></p>
							</div>
						</div>

					<?php $words=explode(chr(13),$word);?>
					<div class='c'></div>	
						<table border="0" cellspacing="0" cellpadding="0" accesskey="">
							<?php $m=1?>
							<?php $n=1; if(is_array($words)) foreach($words AS $k => $v) { ?>
							<?php $v=explode("|",$v)?>
							<?php if($k%2==0) { ?>
							<tr <?php if($m%2==1) { ?>class='odd'<?php } ?>>
								<td <?php echo $k;?>><?php echo $v['0'];?></td>
								<td class='mes'>
								<?php echo $v['1'];?>
								</td>
							<?php } else { ?>
								<td <?php echo $k;?>><?php echo $v['0'];?></td>
								<td class='mes'>
								<?php echo $v['1'];?>
								<?php $m+=1?>								</td>
							</tr>
							<?php } ?>
							<?php $n++;}unset($n); ?>
							</tr>
						</table>
		</div>
		<!-- 信息结束 -->
		<!-- 作品试听开始 -->
		<div class='c'></div>
	<iframe src="<?php echo APP_PATH;?>index.php?m=music&c=index&a=getMusic&singer=<?php echo $title;?>" frameborder="0"></iframe>
		
		<!-- 作品试听结束 -->
	</div>
</div>
<div class='c'></div>
<script type="text/javascript">
<!--
	function show_ajax(obj) {
		var keywords = $(obj).text();
		var offset = $(obj).offset();
		var jsonitem = '';
		$.getJSON("<?php echo APP_PATH;?>index.php?m=content&c=index&a=json_list&type=keyword&modelid=<?php echo $modelid;?>&id=<?php echo $id;?>&keywords="+encodeURIComponent(keywords),
				function(data){
				var j = 1;
				var string = "<div class='point key-float'><div style='position:relative'><div class='arro'></div>";
				string += "<a href='JavaScript:;' onclick='$(this).parent().parent().remove();' hidefocus='true' class='close'><span>关闭</span></a><div class='contents f12'>";
				if(data!=0) {
				  $.each(data, function(i,item){
					j = i+1;
					jsonitem += "<a href='"+item.url+"' target='_blank'>"+j+"、"+item.title+"</a><BR>";
					
				  });
					string += jsonitem;
				} else {
					string += '没有找到相关的信息！';
				}
					string += "</div><span class='o1'></span><span class='o2'></span><span class='o3'></span><span class='o4'></span></div></div>";		
					$(obj).after(string);
					$('.key-float').mouseover(
						function (){
							$(this).siblings().css({"z-index":0})
							$(this).css({"z-index":1001});
						}
					)
					$(obj).next().css({ "left": +offset.left-100, "top": +offset.top+$(obj).height()+12});
				});
	}

	function add_favorite(title) {
		$.getJSON('<?php echo APP_PATH;?>api.php?op=add_favorite&title='+encodeURIComponent(title)+'&url='+encodeURIComponent(location.href)+'&'+Math.random()+'&callback=?', function(data){
			if(data.status==1)	{
				$("#favorite").html('收藏成功');
			} else {
				alert('请登录');
			}
		});
	}

//-->
</script>
<?php include template("content","footer"); ?>