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
th,td{
	width: 148px;
}
td{
	border-bottom: dashed 1px #b4b4b4;
}
</style>
</header>
	<body>
		<div class="iframe change"  style='width:660px;'>
			<h3>网络收藏夹</h3>
			<table cellspacing="0"style='width:690px;' width="100%">
					<thead>
					<tr><th>歌曲</th>
					<th>歌手</th>
					<th>专辑</th>
					<th>唱片公司</th>
					<th>操作</th>
				</tr>
			</thead>
				<tbody>
					<?php $n=1;if(is_array($info)) foreach($info AS $v) { ?>
					<tr>
						<td><?php echo $v['music'];?></td>
						<td><?php echo $v['singer'];?></td>
						<td><?php echo $v['spName'];?></td>
						<td><?php echo substr($v[addtime],0,10);?></td>
						<td><a href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $v['id'];?>' target='_blank'>播放</a>/<a href=''>删除</a></td>
					</tr>
					<?php $n++;}unset($n); ?>
				</tbody>
			</table>
		</div>
	</body>
</html>



