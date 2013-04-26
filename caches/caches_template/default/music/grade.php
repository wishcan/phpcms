<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><html>
<header>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>hy/css/member.css">
<link rel="stylesheet" href="<?php echo CSS_PATH;?>hy/css/hy_header.css">
<script type="text/javascript" src='<?php echo JS_PATH;?>jquery.min.js'></script>
<style type="text/css">

		th{
			padding: 9px;
			background: #f1efeb;
			text-align: center;
		}
		td{
			padding:15px;
				text-align: center;
		}
body{
	background: #faf8f4;
}
table{
		border:0;
		white-space: normal;
}
.iframe h3{
	padding:30px 30px;
	*width:690px;
}

td{
	border-bottom: dashed 1px #b4b4b4;
}
</style>
</header>
	<body>
		<div class="iframe change"  style='width:660px;'>
			<p><span style='color:#f00;'>*</span>评分后将不能更改</p>
			<h3>第<?php echo $row['title'];?><?php if($catid==56) { ?>内地<?php } elseif ($catid==57) { ?>港台<?php } elseif ($catid==58) { ?>民歌<?php } ?>月榜</h3>
			
			<input type="hidden" name="tid" value='<?php echo $row['tid'];?>'>

			<table cellspacing="0"style='width:690px;' width="100%">
					<thead>
					<tr>
						<th style='width:200px;'>歌曲</th>
						<th style='width:80px;'>歌手</th>
						<th style='width:40px;'>得分</th>
						<th style='width: 160px;'>试听</th>
						<th style='width: 120px'>评分</th>
					</tr>
					</thead>
				<tbody>
					<?php $n=1;if(is_array($row[data])) foreach($row[data] AS $v) { ?>
					<tr>
						<td style='width:200px;'><?php echo $v['music'];?></td>
						<td><?php echo $v['singer'];?></td>
						<td><?php echo $v['grade'];?></td>
						<td style='width: 160px;text-align: left;'>
							<object type="application/x-shockwave-flash" data="<?php echo CSS_PATH;?>hy/player/dewplayer-mini.swf?mp3=<?php echo $v['mUrl'];?>" width="150" height="20" id="dewplayer-vol">
							<param name="wmode" value="transparent">
							<param name="movie" value="<?php echo CSS_PATH;?>hy/player/dewplayer-mini.swf?mp3=<?php echo $v['mUrl'];?>">
						</object>
						</td>
						<td style=''>
							<select name="grade" id="" style='width:50px;'>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<button value=<?php echo $v["mid"];?> ids=<?php echo $v['id'];?>>打分</button>
						</td>
					</tr>
					<?php $n++;}unset($n); ?>
				</tbody>
			</table>
		</div>
		<div class="c"></div>
	
		<div class='page'><?php echo $page;?></div>
	</body>


	<script type="text/javascript">
	$(function(){
		$("button").click(function(){

			var tid=$("input[name='tid']").val();
			var grade=$(this).prev("select").val();
			var mid=$(this).val();
			var modelid= $(window.parent.document).find("input[name='modelid']").val();
			var id=$(this).attr("ids");
			gradenum=$(this).parent().prev().prev("td");
			$.post(
				"<?php echo APP_PATH;?>index.php?m=music&c=member&a=addGrade",
				{tid:tid,grade:grade,mid:mid,modelid:modelid,id:id},
				function(statu)
				{
					switch(parseInt(statu))
					{
						case 1:
						num=parseInt(gradenum.html())+parseInt(grade);
						gradenum.html(num);
						alert("评分成功");
						break;
						case 0:
						alert("非法操作");
						break;
						case -1:
						alert("您没有权限做此操作");
						break;
						case -2:
						alert("您为此歌评过分了");
						break;
						default:
						alert(statu);
						break;
					}
				}

				)
		})
	})

	</script>
</html>