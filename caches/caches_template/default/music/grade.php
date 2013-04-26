<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><html>
<header>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>hy/css/member.css">
<link rel="stylesheet" href="<?php echo CSS_PATH;?>hy/css/hy_header.css">
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
			<h3>第<?php echo $row['title'];?><?php if($catid==56) { ?>内地<?php } elseif ($catid==57) { ?>港台<?php } elseif ($catid==58) { ?>民歌<?php } ?>月榜</h3>
			<input type="hidden" name="tid" value='<?php echo $row['id'];?>'>
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
							<button tid={$}>提交</button>
						</td>
					</tr>
					<?php $n++;}unset($n); ?>
				</tbody>
			</table>
		</div>
	</body>
</html>



