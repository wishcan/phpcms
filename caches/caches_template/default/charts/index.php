<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><title>榜单回顾</title>
<?php include template("content",'header'); ?>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>/hy/css/charts.css">
<style type="text/css">
		.chart{
		margin-top: 25px;
		display: block;
		float: left;
		background-color: #fcfbf8;
	}
	.chart iframe{
		width:980px;
		height: 405px;
		/**height: 337px;*/
		/**height: 367px;*/
	}

</style>
<script type="text/javascript">
		
	$(function(){

		$(".select").click(function()
		{
			$(this).find("li").show();	 
		})
			$("li").click(function(){
				if($(this).attr("class")=='on'){
					$(this).parent().find("li").show();
					return ;
				}

					$(this).parent().find(".on").removeClass('on');
					$(this).parent().parent().parent().next("div").find("iframe").attr("src",$("iframe[name='con']").attr("src")+"&title="+$(this).attr("title"))
					$(this).addClass("on");
					$(this).parent().find("li").hide();
					$(this).show();
					return false;
			})
	})

</script>
<div class="center2">
	<h3 class="page_title">
		<div class="bdhg_w bdhg_title">
			<ul class='select'>
				<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
				<li <?php if($n==1) { ?>class='on'<?php } ?> title='<?php echo mb_substr($v["title"],1,20,"UTF-8")?>'>
				<?php echo mb_substr($v["title"],1,20,'UTF-8')?>
				</li>
				<?php $n++;}unset($n); ?>
			</ul>	
		</div>
	</h3>
	<div class="center3">
		<div class='chart' >
		<iframe src="<?php echo APP_PATH;?>index.php?m=music&c=index&a=showCharts" frameborder="0" name='con'></iframe>
		</div>
	</div>
	<div class="c"></div>
	<h3 class="page_title">
		<div class="bdhg_m bdhg_title" >
			<ul class='select'>
				<?php $n=1;if(is_array($mounths)) foreach($mounths AS $v) { ?>
				<li <?php if($n==1) { ?>class='on'<?php } ?> title='<?php echo mb_substr($v["title"],1,20,"UTF-8")?>'>
				<?php echo mb_substr($v["title"],1,20,'UTF-8')?>
				</li>
				<?php $n++;}unset($n); ?>
			</ul>
		</div>
	</h3>
	<div class="center3">
		<div class='chart' style='width:960px;' >
		<iframe src="<?php echo APP_PATH;?>index.php?m=music&c=index&a=showMounths" frameborder="0"></iframe>
		</div>
	</div>
</div>

<div class="c"></div>
<?php include template("content","footer"); ?>