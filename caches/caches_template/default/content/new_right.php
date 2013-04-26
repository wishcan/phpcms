<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>

<div class="col-left cates l">
	<?php $j=1;?>
	<?php $n=1;if(is_array(subcat(9))) foreach(subcat(9) AS $v) { ?>
	<?php if($v['type']!=0) continue;?>
         <div class='cate <?php if($v[catid]==37) { ?>imgnews<?php } ?>'>
        	<h3 class="title-1"><a href="<?php echo $v['url'];?>"><?php echo $v['catname'];?></a></h3>
             <div class="content">
                <div class="bk15 hr"></div>
                
                <ul class="list  lh24 f14 " style='width:324px;'>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=8d4394069d2d8a463fd58bd014d20fad&action=lists&catid=%24v%5Bcatid%5D&num=4&order=updatetime+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$v[catid],'order'=>'updatetime DESC','limit'=>'4',));}?>
					<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                      <?php if($v[catid]==37) { ?>
						<li> <a href="<?php echo $r['url'];?>" target="_blank"> 
                           <img src='<?php echo $r['thumb'];?>' />
                           <p> <?php echo str_cut($r[title],40);?></p>
                            <?php } else { ?>
                            <li> <a href="<?php echo $r['url'];?>" target="_blank"> 
                             <?php echo str_cut($r[title],70);?>
                             <?php } ?>  
                             </a>
                        </li>
					<?php $n++;}unset($n); ?>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
            </div>
        
         </div>
	<?php $j++; ?>
	<?php $n++;}unset($n); ?>
    <div class="c"></div>
     <div class='weibo'><iframe width="328" height="224" class="share_self"  style='background:#faf8f4'frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=328&height=230&fansRow=2&ptype=1&speed=0&skin=1&isTitle=0&noborder=1&isWeibo=1&isFans=0&uid=3189165094&verifier=fd3040f8&colors=d6f3f7,f8faf4,666666,0082cb,ecfbfd&dpc=1"></iframe></div>
    
     <script language="javascript" src="<?php echo APP_PATH;?>index.php?m=poster&c=index&a=show_poster&id=11"></script>

  </div>
  <div class="c"></div>
      <div class="ads" style='margin-top: 15px;'>
        <div class='c'></div>