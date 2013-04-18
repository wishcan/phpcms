<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><div class="col-left cates l">
	<?php $j=1;?>
	<?php $n=1;if(is_array(subcat(9))) foreach(subcat(9) AS $v) { ?>
	<?php if($v['type']!=0) continue;?>
         <div class='cate'>
        	<h3 class="title-1"><a href="<?php echo $v['url'];?>"><?php echo $v['catname'];?></a></h3>
             <div class="content">

                <div class="bk15 hr"></div>
                <ul class="list  lh24 f14">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=5d107604b68e61f01796643989da0a78&action=lists&catid=%24v%5Bcatid%5D&num=5&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$v[catid],'order'=>'id DESC','limit'=>'5',));}?>
					<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
						<li><a href="<?php echo $v['url'];?>" target="_blank"><?php echo str_cut($v[title],70);?></a></li>
					<?php $n++;}unset($n); ?>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
            </div>
        
         </div>
	<?php $j++; ?>
	<?php $n++;}unset($n); ?>
     <div class='weibo'><img src='<?php echo CSS_PATH;?>hy/images/weibo_zw.png' /></div>
    
     <script language="javascript" src="<?php echo APP_PATH;?>index.php?m=poster&c=index&a=show_poster&id=11"></script>

  </div>
  <div class="c"></div>
      <div class="ads" style='margin-top: 15px;'>
        <div class="col-left"><script language="javascript" src="<?php echo APP_PATH;?>caches/poster_js/4.js"></script></div>
        <div class='c'></div>