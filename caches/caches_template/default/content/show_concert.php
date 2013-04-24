<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><title>演出信息-<?php echo $title;?></title>
<?php include template("content","header"); ?>
<!--main-->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>hy/css/news.css"> -->
<link rel="stylesheet" href="<?php echo CSS_PATH;?>hy/css/video.css">
<script type="text/javascript" src='<?php echo JS_PATH;?>jquery.min.js'></script>
<div class="main center2 concert_page">
  <!-- 文章内容开始 -->
    <div id='new' class='l'>
        <div class='content_title l'>
            <h2 class='l'>演出信息</h2>
            <span class='r'>当前位置:<a href='<?php echo APP_PATH;?>'>首页</a>><a href='<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=<?php echo $catid;?>'>演出信息</a>>内页</span>
        </div>
        <hr/>
        <div id='messages' class='l'>
            <div class="m_h l">
                <img src='<?php echo $thumb;?>' class='l'/>
                <div class="message l">
                  <h3><?php echo $title;?></h3>            
                      <p><span>演出时间: </span><?php echo $showtime;?></p>
                      <p><span>演出地点: </span><?php echo $showplace;?></p>
                      <p><span>门票票价: </span><?php echo $price;?></p>
                </div>
            </div>

            <div class="m_b l border">
                    <h4>演唱会介绍</h4>
                    <div>
                        <?php echo $content;?>
                </div>
            </div>
            <div class="m_f l border">
                    <h4>订票地址</h4>
                    <div><?php echo $description;?> </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  // function postToWb(){
  //   var _t = encodeURI(document.title);
  //   var _url = encodeURIComponent(document.location);
  //   var _appkey = encodeURI("cba3558104094dbaa4148d8caa436a0b");
  //   var _pic = encodeURI('<?php echo $thumb;?>');
  //   var _site = '';
  //   var _u = 'http://v.t.qq.com/share/share.php?url='+_url+'&appkey='+_appkey+'&site='+_site+'&pic='+_pic+'&title='+_t;
  //   window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
  // }
</script>
          <script type="text/javascript">//document.write('<a href="http://v.t.sina.com.cn/share/share.php?url='+encodeURIComponent(location.href)+'&appkey=3172366919&title='+encodeURIComponent('<?php echo new_addslashes($title);?>')+'" title="分享到新浪微博" class="t1" target="_blank">&nbsp;</a>');</script>
      <script type="text/javascript">//document.write('<a href="http://www.douban.com/recommend/?url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent('<?php echo new_addslashes($title);?>')+'" title="分享到豆瓣" class="t2" target="_blank">&nbsp;</a>');</script>
      <script type="text/javascript">//document.write('<a href="http://share.renren.com/share/buttonshare.do?link='+encodeURIComponent(location.href)+'&title='+encodeURIComponent('<?php echo new_addslashes($title);?>')+'" title="分享到人人" class="t3" target="_blank">&nbsp;</a>');</script>
      <script type="text/javascript">//document.write('<a href="http://www.kaixin001.com/repaste/share.php?rtitle='+encodeURIComponent('<?php echo new_addslashes($title);?>')+'&rurl='+encodeURIComponent(location.href)+'&rcontent=" title="分享到开心网" class="t4" target="_blank">&nbsp;</a>');</script>
      <script type="text/javascript">//document.write('<a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(location.href)+'" title="分享到QQ空间" class="t5" target="_blank">&nbsp;</a>');</script>


<script type="text/javascript">
// function ChannelSlide(Name,Class){
//   $(Name+' ul.photo li').sGallery({
//     titleObj:Name+' div.title p',
//     thumbObj:Name+' .thumb li',
//     thumbNowClass:Class
//   });
// }
// new ChannelSlide(".channel-slide","on",311,260);
</script>
       <div class='c'></div>
<?php include template("content","footer"); ?>
<script language="JavaScript" src="<?php echo APP_PATH;?>api.php?op=count&id=<?php echo $id;?>&modelid=<?php echo $modelid;?>"></script>