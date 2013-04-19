<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><title>网友投票</title>
<!-- 网友投票页面 -->


<?php include template("content",'header'); ?>
<style type="text/css">
	
	.vote{
		display: block;
		width: 640px;
		*width: 629px;
		height: 550px;
		*height: 546px;
		margin-top: 25px;
	}
	.col_left{
		width: 640px;

	}
	.col_right{
		float: right;
	}
	.chart{
		height: 
	}
	.chart{
		margin-top: 25px;
		display: block;
		width:300px;
		height: 348px;
		*height: 358px;
		border:solid 1px #e3d8bf;
	}
.vote{
	background: #faf8f4;
	float: left;
	height: 544px;
	/*width: 634px;*/
}
.vote h3{
	height: 41px;
	/*width:629px;*/
	line-height: 41px;
	text-indent: 5px;

	background-repeat: repeat-x;
}

.vote_title0{
	background: url(<?php echo CSS_PATH;?>hy/images/wytp_bg_n.png);
	color:#ff7200;
}
.vote_title0 .vote_num{
	color:#ff7635;
}
.vote_title1{
	background: url(<?php echo CSS_PATH;?>hy/images/wytp_bg_g.png);
	color:#f0686c;
}
.vote_title1 .vote_num{
color:#e35657;
}
.vote_title2{
	background: url(<?php echo CSS_PATH;?>hy/images/wytp_bg_m.png);
	color:#ae89d8;
}
.vote_title2 .vote_num{
	color:#b077fe;
}

.thumb img{
	width: 95px;
	height: 95px;
}

ul li{
	list-style: none;
	width: 102px;
	float: left;
	margin-right: 22px;
	*margin-right: 20px;
	margin-bottom:10px;
}
ul li p{
	height: 12px;
	margin-top: 10px;
	font-size: 12px;
	padding-left:5px;
	font-family: '微软雅黑';
}
ul li .thumb{
	height: 95px;
	border: solid 1px #d7d5d2;
	padding: 3px;
	 
}
ul li .st{
	*position: relative;
	*top:-16px;
}
.tp{
	width: 45px;
	height: 23px;
	cursor: pointer;
	background-repeat: no-repeat;
}
.tp0{
	background-image: url(<?php echo CSS_PATH;?>hy/images/tp_4.png);
}
.tp1{
	background-image: url(<?php echo CSS_PATH;?>hy/images/tp_5.png);
}
.tp2{
	background-image: url(<?php echo CSS_PATH;?>hy/images/tp_6.png);
}
ul{
	padding-left: 19px;
}
.pointUp{
	position:relative;left:45px;color:red;font-weight:bold;font-family:'微软雅黑';
}
</style>
<div class="center2">
<div class='col_left l'>
	
	<?php $n=1; if(is_array($week)) foreach($week AS $k => $v) { ?>
	<div class="vote border">     
	<h3 class="vote_title<?php echo $k;?>">至尊<?php if($k==0) { ?>内地<?php } elseif ($k==1 ) { ?>港台<?php } else { ?>民歌<?php } ?>榜
	<span class="vote_num"><?php echo $v['title'];?></span></h3>
	<ul>
		<?php $n=1;if(is_array($v['data'])) foreach($v['data'] AS $r) { ?>
		<li>
			<p  class='thumb'><img src="<?php echo $r['thumb'];?>" alt="" ></p>	
			<p  style=''>
				<span class='title'><?php echo str_cut($r[music],18);?></span>
				<a href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $r['mid'];?>' target='blank'class='st r'></a>
			</p>
			<p><?php echo $r['singer'];?></p>
			<p class='point'><span>票数： <span class='point_n'><?php echo $r['point'];?></span></span></p>
			<p class="tp<?php echo $k;?> tp" ids="<?php echo $r['id'];?>" catid="<?php echo $r['id'];?>" b="<?php echo substr($v[tablename],9);?>"></p>
		</li>
		<?php $n++;}unset($n); ?>

	</ul>
	</div>
	<?php $n++;}unset($n); ?>
</div>	
	<div class='col_right l'>
 	<div class='week'>
	  <!--  -->
	  	<?php $n=1; if(is_array($week)) foreach($week AS $k => $v) { ?>

	         <ul class='week_<?php if($k==0) { ?>n<?php } elseif ($k==1) { ?>g<?php } elseif ($k==2) { ?>m<?php } ?> border' style='margin-top:25px;'> 
	          <h1><?php echo $v['title'];?></h1>
	          <table cellspacing="0">
	                <thead>
	                    <tr>
	                    	<td class='td1'>名次</td>
	                    	<td class='td2'>歌曲</td>
	                    	<td class='td3'>歌手</td>
	                    	<td class='td4'>票数</td>
	                    	<td class='td5'>试听</td>
	                    </tr>
	               </thead>
	               <tbody>
	              
	               		<?php $n=1; if(is_array($v['data'])) foreach($v['data'] AS $n => $d) { ?>
	             		<tr <?php if($n%2==1) { ?> class='tr2' <?php } ?>>
	                    	<td class='td1'><span class='one num num<?php echo $n+1?>'></span></td>
	                    	<td class='td2'><?php echo str_cut($d[music],18);?></td>
	                    	<td class='td3'><?php echo $d['singer'];?></td>
	                    	<td class='td4'><?php echo $d['point'];?></td>	
	
	                    	<td class='td5'><a href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $d['mid'];?>' target='blank'><b class='st'></b></a></td>
	                    </tr>
	                   	<?php if($n==10) break;?>
	           			<?php $n++;}unset($n); ?>
	              		  
	               </tbody>
	          </table>
	      	</ul>
	      	 <?php $n++;}unset($n); ?>
      </div>

	</div>

<div class="c"></div>
<script type="text/javascript">
	// 投票异步
	$(function(){
		$(".tp").click(function(){

			var id=$(this).attr("ids");
			var catid=$(this).attr("catid");
			var tablename=$(this).attr("b");
			th=$(this);
			$.post(
				"<?php echo APP_PATH;?>index.php?m=music&c=index&a=addVoteNum",
				{id:id,catid:catid,tablename:tablename},
				function(statu)
				{
					switch(parseInt(statu)){
						case 1:
						var point_n=th.prev("p").find(".point_n");
							
						th.append("<span class='pointUp'>+1</span>");
						$(".pointUp").animate({"top":"-12px"},500).fadeOut(500);
						setTimeout(function(){
							point_n.html(parseInt(point_n.text())+1)},500)
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
<?php include template("content",'footer'); ?>

