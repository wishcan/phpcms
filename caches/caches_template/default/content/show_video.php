<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--main-->
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>hy/css/news.css">
<script type="text/javascript" src='<?php echo JS_PATH;?>jquery.min.js'></script>

<div class="main center2">
  <!-- 文章内容开始 -->
    <div id='new' class='l'>
        <div class='content_title l'>
            <h2 class='l'>视频推荐</h2>
            <span class='r'>当前位置:首页>视频推荐>内页</span>
        </div>
        <div class='c'></div>
        <div class="col-auto channel-slide">
            <div class='newlist'>
              <div class='new_title'>
                <h4>
                  <?php echo str_cut($title,80);?>
                </h4>
                <p class='new_message'>
                <!-- 分享到：
               <img src="http://v.t.qq.com/share/images/s/weiboicon16.png"  onclick="postToWb();" class="cu" title="分享到腾讯微博"/> -->
                  <span>来源:<?php if($copyfrom=='') { ?>原创<?php } else { ?><?php echo $copyfrom;?><?php } ?></span>
                  <span>发布时间:<?php echo substr($inputtime,0,10)?></span>
                  <span>浏览:<span id="hits"></span></span>

                </p>
             </div>

         <div class='news_content'style='line-height:1.5em;margin-bottom: 15px;' >

            <?php if($allow_visitor==1) { ?>
          <?php echo $content;?>
          <!--内容关联投票-->
<?php } ?>

        <div class="Article-Tool">
<script type="text/javascript">
  function postToWb(){
    var _t = encodeURI(document.title);
    var _url = encodeURIComponent(document.location);
    var _appkey = encodeURI("cba3558104094dbaa4148d8caa436a0b");
    var _pic = encodeURI('<?php echo $thumb;?>');
    var _site = '';
    var _u = 'http://v.t.qq.com/share/share.php?url='+_url+'&appkey='+_appkey+'&site='+_site+'&pic='+_pic+'&title='+_t;
    window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
  }
</script>
          <script type="text/javascript">//document.write('<a href="http://v.t.sina.com.cn/share/share.php?url='+encodeURIComponent(location.href)+'&appkey=3172366919&title='+encodeURIComponent('<?php echo new_addslashes($title);?>')+'" title="分享到新浪微博" class="t1" target="_blank">&nbsp;</a>');</script>
      <script type="text/javascript">//document.write('<a href="http://www.douban.com/recommend/?url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent('<?php echo new_addslashes($title);?>')+'" title="分享到豆瓣" class="t2" target="_blank">&nbsp;</a>');</script>
      <script type="text/javascript">//document.write('<a href="http://share.renren.com/share/buttonshare.do?link='+encodeURIComponent(location.href)+'&title='+encodeURIComponent('<?php echo new_addslashes($title);?>')+'" title="分享到人人" class="t3" target="_blank">&nbsp;</a>');</script>
      <script type="text/javascript">//document.write('<a href="http://www.kaixin001.com/repaste/share.php?rtitle='+encodeURIComponent('<?php echo new_addslashes($title);?>')+'&rurl='+encodeURIComponent(location.href)+'&rcontent=" title="分享到开心网" class="t4" target="_blank">&nbsp;</a>');</script>
      <script type="text/javascript">//document.write('<a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(location.href)+'" title="分享到QQ空间" class="t5" target="_blank">&nbsp;</a>');</script>
      
    <span id='favorite'>
    </span>

    </div>

      </div>

        </div>
        </div>

   </div>
  <!-- 文章内容结束 -->
    <!--分类新闻-->
    <!-- 引入右侧文件-->
  <?php include template("content","new_right"); ?>
<!--         <div class="col-auto">
            <div class="left">推广链接</div>
            <div class="right">这里放广告</div>
        </div> -->
  </div>

  <div class="bk10"></div>
</div>
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
<script language="JavaScript" src="<?php echo APP_PATH;?>api.php?op=count&id=<?php echo $id;?>&modelid=<?php echo $modelid;?>"></script>
<?php include template("content","footer"); ?>
