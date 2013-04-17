<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>

<!-- 艺术人生列表页开始 -->
<script type="text/javascript">
$("title").html('艺术人生');
</script>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>hy/css/about.css">
<div id='cont' class='center2 art'>

<!-- 列表页头部开始 -->
<div class='ar_title page_title'>
	<h3><i></i></h3>
</div>
<div class='music_link l'>
	
	<i class='l'></i>
	<i class='l'></i>
</div>
<div class='music_link r'>
	
	<i class='l'></i>
	<i class='l'></i>
</div>
<div id="header"></div>
	
<!-- 列表页头部结束 -->
<div class='arcontent content2 l'>
	<div class='ar_t l'>
	<h3 class='arlist_h'></h3>
	<!-- 推荐明星开始 -->
		<div class='supstar l'>
			<!-- 缩略图 -->
			<img src="<?php echo $thumb;?>" class='l thumb' />
			<!-- 信息开始 -->
			<div class='message l'>
				<!-- 姓名 -->
				<h2><?php echo $title;?></h2>
				<div class='data'>
					 <p><?php echo $content;?></p>
				</div>
			</div>
			<!--  信息结束 -->
		</div>
	</div>
	<!-- 推荐明星结束 -->
	<!-- 明星列表开始 -->
	<div class="c"></div>
		<div class='star_list' border='0'>
			<div class='list_page l'>
				<div class="auto_art">
					<ul class='stars l'>
					<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
						 <li class='border <?php if($n%5==0) { ?>l5<?php } ?>'>
						 	<a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>">
						 		<img src="<?php echo $r['thumb'];?>" />
						 		<span><?php echo str_cut($r[title],'28');?></span>
						 	</a>
						 </li>
					<?php if($n%$size==0):?>
					</ul>
					<ul class='stars l'>
					<?php endif;?>
					<?php $n++;}unset($n); ?>
					 </ul>
					<div class="c"></div>
					 
				 </div>
			</div>
			<div class="c"></div>
			<div class='page nums'><?php echo $pages;?></div>
		</div>
	<!--搜索框-->
	<div class='c'></div>
		<div class='search'>
			<form action='<?php echo APP_PATH;?>/index.php?m=artistic&c=index&a=search' type='post'>
				<span>人物搜索</span>
				<input tpye='text' name='name' />
				<input type='submit' value='' />
			</form>
		</div>
	<!--搜索框-->			
	<!-- 明星列表结束 -->

</div>




</div>
<div class='c'></div>
<!-- 艺术人生列表页结束 -->
<?php include template("content","footer"); ?>

<script type="text/javascript">
	$(function(){
		var w=0;
		$(".stars").each(function(){
			w+=$(this).width();
		})
		$(".auto_art").css("width",w);
		var len=$(".stars").length;
		if(len>1){
			var i=0;
			for(i;i<len;i++)
			{
				$(".page").append("<li class='l border'>"+i+"</li>");
			}
		}

		$(".page li").eq(0).addClass("numon");


		$(".page li").click(function()
		{
				var index=$(this).index();
				$(".stars").hide();
				$(".stars").eq(index).fadeIn();
				$(".numon").removeClass("numon");
				$(this).addClass("numon")

		})
	})

</script>


