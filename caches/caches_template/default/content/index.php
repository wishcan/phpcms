<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>
<?php include template("content","header"); ?>
<!--首页页面显示开始-->
<div class='main'>
	
    <!-- 首页上部分开始 -->
    <div class='center2 main-top'>
        <!-- 幻灯片开始 -->
        <div class='h_images l'>  
            <div class='imgs'>
			<script language="javascript" src="<?php echo APP_PATH;?>caches/poster_js/12.js"></script>
            </div>
            <div class='zz'></div>
            <ul class='h_num'>
                <li>6</li>
                <li>5</li>
                <li class='lion'>4</li>
                <li>3</li>
                <li>2</li>
                <li>1</li>
            </ul>

        </div>
        <!-- 幻灯片结束 -->
        <!-- 绝对好声音开始 -->
        <div class='good_sound l'>
            <div class='good_h'></div>
            <ul class='classes l'>
                <li class='l good_l1'>
               	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b69252b3748fdcdb641a13f103299780&action=lists&catid=26&order=listorder+asc%2Cupdatetime+desc&num=3&return=data&where=bestpost+%3D+1+and+catid%3D26&moreinfo=%271%27++\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'26','order'=>'listorder asc,updatetime desc','where'=>'bestpost = 1 and catid=26','moreinfo'=>'\'1\'  ','limit'=>'3',));}?>
               	<?php $keys=array_keys($data)?>
                <img src='<?php echo $data[$keys['0']]['thumb'];?>' class='l imgthumb'/> 
                <ul class='l'>
                    <div class='good_h2'></div>
                    <table>
                
					<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                        <tr thumb='<?php echo $v["thumb"];?>'>
                           <td class='good_t1'><?php echo $v['title'];?></td> 
                           <td class='good_t2'><?php echo $v['singer'];?></td>
                           <td class='good_t3'><a target='_blank' href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $v['id'];?>'><b class='st'></b></a></td>
                        </tr>
					<?php $n++;}unset($n); ?>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>                                 
                    </table>
                </ul>
                </li>
                <div class='c'></div>
                 <li class='l  good_l2'>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=a9d192abb61f96f34f6c85a62721e09b&action=lists&catid=27&order=listorder+asc%2Cupdatetime+desc&num=3&return=data&where=bestpost+%3D+1++and+catid%3D27&moreinfo=%271%27++\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'27','order'=>'listorder asc,updatetime desc','where'=>'bestpost = 1  and catid=27','moreinfo'=>'\'1\'  ','limit'=>'3',));}?> 	
                               	<?php $keys=array_keys($data)?>
                <img src='<?php echo $data[$keys['0']]['thumb'];?>' class='l'/> 
                <ul class='l'>
                    <div class='good_h3'></div>
                    <table>
                   
					<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                        <tr thumb='<?php echo $v["thumb"];?>'>
                           
                           <td class='good_t1'><?php echo $v['title'];?></td> 
                           <td class='good_t2'><?php echo $v['singer'];?></td>
                           <td class='good_t3'><a target='_blank' href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $v['id'];?>'><b class='st'></b></a></td>
                        </tr>
					<?php $n++;}unset($n); ?>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>           
                    </table>
                </ul>

                </li>
                <div class='c'></div>
                <li class='l good_l3'>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c0a85a147f0f17af6d7dffb013623f65&action=lists&catid=28&order=listorder+asc%2Cupdatetime+desc&num=3&return=data&where=bestpost+%3D+1++and+catid%3D28&moreinfo=%271%27++\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'28','order'=>'listorder asc,updatetime desc','where'=>'bestpost = 1  and catid=28','moreinfo'=>'\'1\'  ','limit'=>'3',));}?> 	
                <?php $keys=array_keys($data)?>
                <img src='<?php echo $data[$keys['0']]['thumb'];?>' class='l'/>
                <ul class='l'>
                    <div class='good_h4'></div>
                    <table>

					<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                        <tr thumb='<?php echo $v["thumb"];?>'>
                           <td class='good_t1'><?php echo $v['title'];?></td> 
                           <td class='good_t2'><?php echo $v['singer'];?></td>
                           <td class='good_t3'><a target='_blank' href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $v['id'];?>'><b class='st'></b></a></td>
                        </tr>
					<?php $n++;}unset($n); ?>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>          
                    </table>
                </ul>

                </li>
            </ul>
        </div>
        <!-- 绝对好声音结束 -->
        <div class='c'></div> 
        <!-- 上部第二部分开始 -->
        <div class='center2 main_top2'>
            <!--左侧-->
            <div class='main_top2_l l'>
                <div class='top2_l'>
                <!-- 缩略图 -->
                  <div class='thumb l'>
                    <img src='<?php echo CSS_PATH;?>hy/images/zw2.png' />
                    <div class='zz2'></div>
                    <p>谭晶亮相山西大剧院</p>
                  </div>
                  <div class='news l'>
                    <!-- 热点新闻开始 -->
                    <div class='hot'>
                    	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=70e60edaff7f2f83f3be09bbd3707e1d&action=position&posid=2&order=listorder+DESC&num=1&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$info = $content_tag->position(array('posid'=>'2','order'=>'listorder DESC','limit'=>'1',));}?>
                    	
                    	<?php $n=1;if(is_array($info)) foreach($info AS $v) { ?>
                    <a href="<?php echo $v['url'];?>" target="__blank" title="<?php echo $v['title'];?>"<?php echo title_style($v[style]);?>>
                          <h3 class='hot_title'><?php echo str_cut($v['title'],50);?></h3>
                          <p class='hot_desc'>
                            <?php echo str_cut($v['description'],100);?> <span class='more'>查看详细 >></span>
                          </p>
                     </a>
                     <?php $n++;}unset($n); ?>
            		  <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>  
                    </div>
                    <!-- 热点新闻结束 -->
                    <!-- 新新闻 -->
                    <ul class='new'>

             		 	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=8d937d324091ec1ae074221a9f17b3ba&action=lists&catid=9&order=updatetime+desc&num=5&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'9','order'=>'updatetime desc','limit'=>'5',));}?>
             		 	<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
             		 	<?php if($n!==1):?>
                        <li>
                            <a href='<?php echo $v['url'];?>'><span class='news_title'><?php echo str_cut($v['title'],50);?></span>
                            <span class='time'><?php echo date("Y-m-d",$v[inputtime]);?></span>
                            </a>
                        </li>
						<?php endif;?>
                        <?php $n++;}unset($n); ?>
                       	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                       
                    </ul>
                  </div>
                </div>
            </div>
            <div class='maing_top2_r l'>
              <div class='top2_r_h'>
                <a href='' class='login1'></a>
                <a href='' class='login2'></a>
                <a href='' class='login3'></a>
              </div>
              <!-- 微博同步开始 -->
              <div class='weibo l'>
                <img src='<?php echo CSS_PATH;?>hy/images/weibo_zw.png' />
              </div>
              <!-- 微博同步结束  -->
            </div>
        </div>
        <div class='c'></div>
    <!-- 广告位 -->
      <div class='gg'>
        <img src='<?php echo CSS_PATH;?>hy/images/zw4.png' />
      </div>
    </div>
    <!-- 首页上部分结束 -->
   <!--首页内容部分开始-->
    <div class='center2' id='main-body'>
    <!-- 首页排行榜开始 -->
      <!-- 周排行榜 -->
      <div class='week'>
	  <!--  -->
	  	<?php $n=1; if(is_array($week)) foreach($week AS $s => $v) { ?>
	         <ul class='week_<?php if($s==0) { ?>n<?php } elseif ($s==1) { ?>g<?php } elseif ($s==2) { ?>m<?php } ?>'> 
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
	              
	               		<?php $n=1; if(is_array($v['data'])) foreach($v['data'] AS $k => $d) { ?>
	             		<tr <?php if($n%2==0) { ?> class='tr2' <?php } ?>>
	                    	<td class='td1'><span class='one num num<?php echo $k+1?>'></span></td>
	                    	<td class='td2'><?php echo str_cut($d[music],18);?></td>
	                    	<td class='td3'><?php echo $d['singer'];?></td>
	                    	<td class='td4'><?php echo $d['point'];?></td>

	                    	<td class='td5'><a href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $d['mid'];?>' target='_blank'><b class='st'></b></a></td>
	                    </tr>
	              		  <?php $n++;}unset($n); ?>
	              		  
	               </tbody>
	          </table>
	          	<div class='week_t'>
	          		<span>为您喜欢的歌曲投上一票吧</span>
	          		<a target='_blank' href='<?php echo APP_PATH;?>/index.php?m=music&c=index&a=vote#vote_<?php if($s==0) { ?>n<?php } elseif ($s==1) { ?>g<?php } elseif ($s==2) { ?>m<?php } ?>'></a>
	          	</div>
	      	</ul>
	      	 <?php $n++;}unset($n); ?>
      </div>
      <!-- 月排行榜 -->
      <div class='c'></div>
      <div class='month week'>
      	<?php $n=1; if(is_array($mounth)) foreach($mounth AS $s => $v) { ?>
	         <ul class='week_<?php if($s==0) { ?>n<?php } elseif ($s==1) { ?>g<?php } elseif ($s==2) { ?>m<?php } ?>'> 
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
	              
	               		<?php $n=1; if(is_array($v['data'])) foreach($v['data'] AS $k => $d) { ?>
	             		<tr <?php if($n%2==0) { ?> class='tr2' <?php } ?>>
	                    	<td class='td1'><span class='one num num<?php echo $k+1?>'></span></td>
	                    	<td class='td2'><?php echo str_cut($d[music],18);?></td>
	                    	<td class='td3'><?php echo $d['singer'];?></td>
	                    	<td class='td4'><?php echo $d['point'];?></td>

	                    	<td class='td5'><a href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $d['mid'];?>' target='_blank'><b class='st'></b></a></td>
	                    </tr>
	              		  <?php $n++;}unset($n); ?>
	              		  
	               </tbody>
	          </table>
	      	</ul>
	      	 <?php $n++;}unset($n); ?>
	      <!-- 	<ul class='week_n'>
	          <h1>第201301期</h1>
	          <table cellspacing="0">
	                <thead>
	                    <tr>
	                    	<td class='td1'>名次</td>
	                    	<td class='td2'>歌曲</td>
	                    	<td class='td3'>歌手</td>
	                    	<td class='td4'>得分</td>
	                    	<td class='td5'>试听</td>
	                    </tr>
	               </thead>
	               <tbody>
	                    <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                                        <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                                        <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                                        <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                                        <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                                        <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                                        <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='s1'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='os2'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	               </tbody>

	          </table>
	        </ul>
	        <ul class='week_g'>
	          <h1>第201301期</h1>
	          <table cellspacing="0">
	                <thead>
	                    <tr>
	                    	<td class='td1'>名次</td>
	                    	<td class='td2'>歌曲</td>
	                    	<td class='td3'>歌手</td>
	                    	<td class='td4'>得分</td>
	                    	<td class='td5'>试听</td>
	                    </tr>
	               </thead>
	               <tbody>
						<tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='s1'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='os2'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	               </tbody>
	          </table>
	        </ul>
	        <ul class='week_m'>
	          <h1>第201301期</h1>
	          <table cellspacing="0">
	                <thead>
	                    <tr><td>名次</td><td>歌曲</td><td>歌手</td><td>得分</td><td>试听</td></tr>
	               </thead>
						<tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='one'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='s1'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	                    <tr>
	                    	<td class='td1'><span class='os2'></span></td>
	                    	<td class='td2'>微日舞曲</td>
	                    	<td class='td3'>白若溪</td>
	                    	<td class='td4'>99</td>
	                    	<td class='td5'><b class='st'></b></td>
	                    </tr>
	               </tbody>

	          </table>
	        </ul> -->
      </div>
    <!-- 首页排行榜结束 -->
    <div class='c'></div>
    <!-- 新歌推荐开始-->
	    <div id='new_music'>
	    	<div class='n_m_h l'>
			    	<i class='n_m_l l'></i>		
			    	<h3 class='l'></h3>
			    	<i class='n_m_r l'></i>
			    	<div class='new_music_h l'></div>
	    	</div>
	    	<div class='c'></div>
	    	<div class='music_link'>
		    		<div class='music_link_l'>
		    			<i class='l'></i>
		    			<i class='l'></i>
		    		</div>
		    		<div class='music_link_r r'>
		    			<i class='l'></i>
		    			<i class='l'></i>
		    		</div>
	    	</div>
	    	<!-- 内地推荐 -->

	    </div>

	<!-- 新歌推荐结束--> 
	</div>

</div>
   
    <div class='c'></div>
<!--分类推荐开始 -->
<div class='music_tui center'>
			<!-- 内地 -->
			<div class='music_n'>
				<h3 class='l'></h3>
				<div class='center2 l'>
				<ul>

				<?php $n=1;if(is_array($pos_n['data'])) foreach($pos_n['data'] AS $v) { ?>
					<li>
						<img src='<?php echo $v["thumb"];?>' />
						<p class='music_name'><span><span><?php echo str_cut($v['music'],24);?></span></span><a taget="_blank" href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $v['mid'];?>'><b class='st'></b></a></p>
						<p class='singer'><?php echo $v['singer'];?></p>
						<i class='tp' ids="<?php echo $v['mid'];?>" b=<?php echo substr($pos_n['table_name'],9);?>></i>
					</li>
				<?php $n++;}unset($n); ?>	
							
				</ul>
			</div>
			</div>
			<div class='center3'>
		 		<div class='music_link'>
				    		<div class='music_link_l'>
				    			<i class='l'></i>
				    			<i class='l'></i>
				    		</div>
				    		<div class='music_link_r r'>
				    			<i class='l'></i>
				    			<i class='l'></i>
				    		</div>
			    	</div>
		    </div>	
				<div class='c'></div>
				<!-- 港台新歌推荐 -->
		 		<div class='music_g'>
						<h3 class='l'></h3>
						<div class='center2 l'>
						<ul>
						
				<?php $n=1;if(is_array($pos_g['data'])) foreach($pos_g['data'] AS $v) { ?>

					<li>
						<img src='<?php echo $v["thumb"];?>' />
						<p class='music_name'><span><span><?php echo $v['music'];?></span></span><a target="_blank" href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $v['id'];?>'><b class='st'></b></a></p>
						<p class='singer'><?php echo $v['singer'];?></p>
						<i class='tp' ids="<?php echo $v['mid'];?>" b=<?php echo substr($pos_g['table_name'],9);?>></i>
					</li>
				<?php $n++;}unset($n); ?>	
								
						</ul>
					</div>
				</div>
			<div class='center3'>	 
		 		<div class='music_link' style='top:-65px;'>
				    		<div class='music_link_l'>
				    			<i class='l'></i>
				    			<i class='l'></i>
				    		</div>
				    		<div class='music_link_r r'>
				    			<i class='l'></i>
				    			<i class='l'></i>
				    		</div>
			    	</div>
		    </div>	
		    <div class='c'></div>
		    <!-- 民歌新歌推荐 -->
			<div class='music_m'>
						<h3 class='l'></h3>
						<div class='center2 l'>
						<ul>
				<?php $n=1;if(is_array($pos_m['data'])) foreach($pos_m['data'] AS $v) { ?>
					<li>
						<img src='<?php echo $v["thumb"];?>' />
						<p class='music_name'><span><span><?php echo $v['music'];?></span></span><a target='_blank' href='<?php echo APP_PATH;?>index.php?m=music&c=index&a=mp3&id=<?php echo $v['mid'];?>'><b class='st'></b></a></p>
						<p class='singer'><?php echo $v['singer'];?></p>
						<i class='tp' ids="<?php echo $v['mid'];?>" b=<?php echo substr($pos_m['table_name'],9);?>></i>
					</li>
				<?php $n++;}unset($n); ?>	
									
						</ul>
			</div>
			</div>		
		 </div>
	<div class='c'></div>
<div class='main'>
	
	<div class='center2'>
	<!-- 视频推荐开始 -->
		<div id='video'>

			<h6><a href='<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=42'>更多</a></h6>
			<ul class='l'>
			<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=586152055df632d2472e9ce8a94dfa69&action=lists&catid=42&order=updatetime+desc&num=5&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'42','order'=>'updatetime desc','limit'=>'5',));}?>
			<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>

				<li>
				<a href='<?php echo $v['url'];?>'>
						<img src='<?php echo $v['thumb'];?>' />
						<p><b><?php echo $v['title'];?></b></p>
					</a>
				</li>
				<?php $n++;}unset($n); ?>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</ul>
		</div>
	<!-- 视频推荐结束 -->
	<!-- 演出信息开始 -->
		<div id='messages' class='l'>
			<h6><a href='<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=44'>更多</a></h6>
			<ul class='l'>
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=15b76812b4a4fa1682a86eb9abfbfd08&action=lists&catid=44&order=updatetime+desc&num=3&return=data&moreinfo=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'44','order'=>'updatetime desc','moreinfo'=>'1','limit'=>'3',));}?>

				<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
				<li>
					<a href='<?php echo $v['url'];?>' title='<?php echo $v['title'];?>' target='_blank'>
						<img src='<?php echo $v['thumb'];?>' class='l' />
						<div class='message l'>
							
								<h3 class='message_title'><?php echo str_cut($v[title],30);?></h3>
								<p class='message_desc'><?php echo str_cut($v[content],100);?></p>
								<p><span>时间：</span><?php echo date("Y-m-d",$v[showtime]);?></p>
								<p><span>地点: </span><?php echo $v['showplace'];?></p>
								<p><span>购票地址: </span><?php echo str_cut($v[showplaces],40);?></p>
							
						</div>
					</a>
				</li>
				<?php $n++;}unset($n); ?>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			
			</ul>
		</div>
	<!-- 演出信息结束 -->	
</div>
<div class='c'></div>
<!--首页内容结束-->
<!--引入尾部文件开始-->
<?php include template("content","footer"); ?>
<!--引入尾部结束-->
<!-- 页面结束 -->

</div>
  
<script type="text/javascript"> 
$(function(){
	$("a").attr("target",'_blank');

	$(".good_sound tr").mouseover(function()
	{

		$(this).parent().parent().parent().prev("img").attr("src",$(this).attr("thumb"));
	})

		$(".tp").click(function(){

			var id=$(this).attr("ids");
			var catid=$(this).attr("catid");
			var tablename=$(this).attr("b");
			th=$(this);
			$.post(
				"<?php echo APP_PATH;?>index.php?m=music&c=index&a=addVoteNum",
				{id:id,tablename:tablename},
				function(statu)
				{
					switch(parseInt(statu)){
						case 1:
						var point_n=th.prev("p").find(".point_n");
						th.append("<span class='pointUp' >+1</span>");
						$(".pointUp").animate({"top":"-80px"},500).fadeOut(500);
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
						alert("您今天已经对此歌曲已经投过票了");
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
