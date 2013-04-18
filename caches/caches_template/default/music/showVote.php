<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>

<style type="text/css">
body{
	float: left;
	/*width: 630px;*/
}
*{
	padding: 0;
	margin: 0;
}
.center{
		border: solid 1px #e3d8bf;
		background: #fff;
		width: 629px;
		height: 545px;
}
#vote{
	background: #faf8f4;
	float: left;
	height: 544px;
	/*width: 634px;*/
}
#vote h3{
	height: 41px;
	/*width:629px;*/
	line-height: 41px;
	text-indent: 5px;

	background-repeat: repeat-x;
}

.vote_title26{
	background: url(<?php echo CSS_PATH;?>hy/images/wytp_bg_n.png);
	color:#ff7200;
}
.vote_title26 .vote_num{
	color:#ff7635;
}
.vote_title27{
	background: url(<?php echo CSS_PATH;?>hy/images/wytp_bg_g.png);
	color:#f0686c;
}
.vote_title227 .vote_num{
color:#e35657;
}
.vote_title28{
	background: url(<?php echo CSS_PATH;?>hy/images/wytp_bg_m.png);
	color:#ae89d8;
}
.vote_title28 .vote_num{
	color:#b077fe;
}
.thumb{
	padding: 3px;
	border: solid 1 #d7d5d2; 
}
.thumb img{
	width: 95px;
	height: 95px;
}
ul{
	padding-left: 16px;
	/*padding-bottom: 15px;*/
/*	
	padding-top: 20px;
	padding-left: 19px;*/
}
ul li{

}
ul li p{
	line-height: 10px;
	margin-top: 10px;
	font-size: 14px;
	padding-left:5px;
	background-repeat: no-repeat;
}
ul li{
	list-style: none;
	width: 102px;
	/*height: 180px;*/
	float: left;
	margin-right: 19px;
	margin-top: 20px;
}
.tp{
	width: 45px;
	height: 23px;
	cursor: pointer;
}
.tp26{
	background-image: url(<?php echo CSS_PATH;?>hy/images/tp_4.png);
}
.tp27{
	background-image: url(<?php echo CSS_PATH;?>hy/images/tp_5.png);
}
.tp28{
	background-image: url(<?php echo CSS_PATH;?>hy/images/tp_6.png);
}
.st{
	display: block;
	width: 16px;
	height: 16px;
	float:right;
	background-image: url(<?php echo CSS_PATH;?>hy/images/st_bg.png);
	*position: relative;
	*top:-12px;
}
.title{
	/*float: left;*/
}
.c{
	clear: both;

}
.cneter .title{
height:16px;
}

</style>

<script type="text/javascript" src='<?php echo JS_PATH;?>/jquery.min.js'></script>
<body>
<div class='center'>
<div id="vote" class='border'>
	<h3 class="vote_title<?php echo $_GET['id'];?>">至尊<?php if($id==26) { ?>内地<?php } elseif ($id==27 ) { ?>港台<?php } elseif ($id==28) { ?>民歌<?php } ?>榜
	<span class="vote_num"><?php echo $title;?></span></h3>
	<input type='hidden' value='<?php echo $tablename;?>' name='tablename'>
	<ul>
		<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
		<li>
			<p  class='thumb'><img src="<?php echo $v['mthumb'];?>" alt="" ></p>	
			<p style='height:title;' style=''><span class='title'><?php echo str_cut($v[music],18);?></span><a href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $v['mid'];?>' target='blank'class='st'></a></p>
			<div class='c'></div>
			<p><?php echo $v['singer'];?></p>
			<p class='num'><span>票数： <?php echo $v['point'];?></span></p>
			<p class="tp<?php echo $id;?> tp" ids=<?php echo $v['id'];?> catid="<?php echo $id;?>"></p>

		</li>
		<?php $n++;}unset($n); ?>
	</ul>

	
</div>
<script type="text/javascript">
	// 投票异步
	$(function(){
		$(".tp").click(function(){

			var id=$(this).attr("ids");
			var catid=$(this).attr("catid");
			var tablename=$("input[name='tablename']").val();
			$.post(
				"<?php echo APP_PATH;?>index.php?m=music&c=index&a=addVoteNum",
				{id:id,catid:catid,tablename:tablename},
				function(statu)
				{
					switch(parseInt(statu)){
						case 1:
						alert("感谢您的投票");
						break;
						case -1:
						alert("你尚未登陆，请登陆后再投票");
						break;
						case -2:
						alert("响应超时，请重试");
						break;
						case 0:
						alert("您今天在此榜单已经投过票了");
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
</div>
</body>
