<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title><?php echo $seoinfo['seotitle'];?>-<?php echo $GLOBALS['cfg_webname'];?></title>
    <?php if($seoinfo['keyword']) { ?>
    <meta name="keywords" content="<?php echo $seoinfo['keyword'];?>" />
    <?php } ?>
    <?php if($seoinfo['description']) { ?>
    <meta name="description" content="<?php echo $seoinfo['description'];?>" />
    <?php } ?>
    <?php echo  Stourweb_View::template("pub/varname");  ?>
    <?php echo Common::css('gonglue.css,base.css,extend.css');?>
    <?php echo Common::js('jquery.min.js,base.js,common.js,SuperSlide.min.js,template.js');?>
</head>
<body>
<?php echo Request::factory("pub/header")->execute()->body(); ?>
  
  <div class="st-gl-home-top">
    
    <div id="st-gl-slideBox" class="st-gl-slideBox">
      <div class="hd">
        <ul>
            <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$articlead = $ad_tag->getad(array('action'=>'getad','name'=>'ArticleRollingAd','pc'=>'1','return'=>'articlead',));}?>
            <?php $n=1; if(is_array($articlead['aditems'])) { foreach($articlead['aditems'] as $k => $v) { ?>
            <li><?php echo $k;?></li>
            <?php $n++;}unset($n); } ?>
        </ul>
      </div>
      <div class="bd">
        <ul>
            <?php $n=1; if(is_array($articlead['aditems'])) { foreach($articlead['aditems'] as $v) { ?>
             <li><a href="<?php echo $v['adlink'];?>" target="_blank"><img src="<?php echo Common::img($v['adsrc']);?>" width="815" height="320"/></a></li>
            <?php $n++;}unset($n); } ?>
        </ul>
      </div>
      <!--前/后按钮代码-->
      <a class="prev" href="javascript:void(0)"></a>
      <a class="next" href="javascript:void(0)"></a>
    </div><!--酒店首页焦点图-->
    
  </div>   
  
  <div class="big">
  <div class="wm-1200">
    
    <div class="st-guide">
            <a href="<?php echo $cmsurl;?>"><?php echo $GLOBALS['cfg_indexname'];?></a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;<?php echo $channelname;?>
        </div><!--面包屑-->
     
      <div class="st-main-page">
      
        <div class="st-gl-home-list">
          <ul>
           <?php require_once ("C:/phpstudy/WWW/taglib/article.php");$article_tag = new Taglib_Article();if (method_exists($article_tag, 'query')) {$arclist = $article_tag->query(array('action'=>'query','flag'=>'order','row'=>'4','return'=>'arclist',));}?>
            <?php $n=1; if(is_array($arclist)) { foreach($arclist as $arc) { ?>
            <li <?php if($n%4==0) { ?>class="mr_0"<?php } ?>
>
              <div class="tj-tb"></div>
              <div class="pic">
                <img class="fl" src="<?php echo Common::img($arc['litpic'],283,190);?>" alt="aasf" width="283" height="190" />
                <div class="buy"><a href="<?php echo $arc['url'];?>" target="_blank">查看详情</a></div>
              </div>
              <div class="js">
                <a href="<?php echo $arc['url'];?>" target="_blank" class="tit"><?php echo $arc['title'];?></a>
                <p class="txt"><?php echo Common::cutstr_html($arc['content'],20);?></p>
              </div>
            </li>
            <?php $n++;}unset($n); } ?>
          
          </ul>
        </div>
          <?php require_once ("C:/phpstudy/WWW/taglib/dest.php");$dest_tag = new Taglib_Dest();if (method_exists($dest_tag, 'query')) {$destlist = $dest_tag->query(array('action'=>'query','flag'=>'channel_nav','typeid'=>$typeid,'row'=>'5','return'=>'destlist',));}?>
          <?php $index=0;?>
              <?php $n=1; if(is_array($destlist)) { foreach($destlist as $dest) { ?>
              <div class="st-slideTab">
               <div class="st-gl-dest-module">
                  <div class="st-tabnav">
                    <h3><?php echo $dest['kindname'];?></h3>
                        <span data-id="<?php echo $dest['id'];?>" class="on" data-url="/raiders/<?php echo $dest['pinyin'];?>/">热门<i></i></span>
                        <?php require_once ("C:/phpstudy/WWW/taglib/dest.php");$dest_tag = new Taglib_Dest();if (method_exists($dest_tag, 'query')) {$nextdest = $dest_tag->query(array('action'=>'query','flag'=>'next','typeid'=>$typeid,'pid'=>$dest['id'],'row'=>'6','return'=>'nextdest',));}?>
                            <?php $n=1; if(is_array($nextdest)) { foreach($nextdest as $nr) { ?>
                            <span data-id="<?php echo $nr['id'];?>" data-url="/raiders/<?php echo $nr['pinyin'];?>/"><?php echo $nr['kindname'];?><i></i></span>
                            <?php $n++;}unset($n); } ?>
                        
                    <a href="/raiders/<?php echo $dest['pinyin'];?>/" class="more">更多<?php echo $channelname;?></a>
                  </div>
                   <div class="st-tabcon">
                       <ul>
                           <?php require_once ("C:/phpstudy/WWW/taglib/article.php");$article_tag = new Taglib_Article();if (method_exists($article_tag, 'query')) {$arclist = $article_tag->query(array('action'=>'query','flag'=>'mdd','destid'=>$dest['id'],'row'=>'7','return'=>'arclist',));}?>
                           <?php $autoindex=1;?>
                           <?php $n=1; if(is_array($arclist)) { foreach($arclist as $a) { ?>
                           <?php if($autoindex==1) { ?>
                           <li class="list-pic">
                               <i class="hot-ico">HOT</i>
                               <a class="pic" href="<?php echo $a['url'];?>" target="_blank"><img src="<?php echo Common::img($a['litpic'],360,225);?>" alt="<?php echo $a['title'];?>" /></a>
                               <a class="tit" href="<?php echo $a['url'];?>" target="_blank"><?php echo $a['title'];?></a>
                               <p class="txt"><?php echo Common::cutstr_html($a['content'],40);?></p>
                           </li>
                           <?php } else { ?>
                           <li class="list-txt<?php if($autoindex>5) { ?> mb_0<?php } ?>
">
                               <a class="tit" href="<?php echo $a['url'];?>" target="_blank"><?php echo $a['title'];?></a>
                               <p class="txt"><?php echo Common::cutstr_html($a['content'],40);?></p>
                           </li>
                           <?php } ?>
                           <?php $autoindex++;?>
                           <?php $n++;}unset($n); } ?>
                       </ul>
                   </div>
              <?php $n=1; if(is_array($nextdest)) { foreach($nextdest as $ad) { ?>
               <div class="st-tabcon">
                <ul>
                    <?php require_once ("C:/phpstudy/WWW/taglib/article.php");$article_tag = new Taglib_Article();if (method_exists($article_tag, 'query')) {$arclist = $article_tag->query(array('action'=>'query','flag'=>'mdd','destid'=>$ad['id'],'row'=>'7','return'=>'arclist',));}?>
                    <?php $autoindex=1;?>
                    <?php $n=1; if(is_array($arclist)) { foreach($arclist as $a) { ?>
                     <?php if($autoindex==1) { ?>
                       <li class="list-pic">
                        <i class="hot-ico">HOT</i>
                        <a class="pic" href="<?php echo $a['url'];?>" target="_blank"><img src="<?php echo Common::img($a['litpic'],360,225);?>" alt="<?php echo $a['title'];?>" /></a>
                        <a class="tit" href="<?php echo $a['url'];?>" target="_blank"><?php echo $a['title'];?></a>
                        <p class="txt"><?php echo Common::cutstr_html($a['content'],40);?></p>
                       </li>
                     <?php } else { ?>
                        <li class="list-txt<?php if($autoindex>5) { ?> mb_0<?php } ?>
">
                        <a class="tit" href="<?php echo $a['url'];?>" target="_blank"><?php echo $a['title'];?></a>
                        <p class="txt"><?php echo Common::cutstr_html($a['content'],40);?></p>
                        </li>
                     <?php } ?>
                     <?php $autoindex++;?>
                    <?php $n++;}unset($n); } ?>
                </ul>
              </div>
              <?php $n++;}unset($n); } ?>
            </div><!-- 分类攻略 -->
              </div>
              <?php $n++;}unset($n); } ?>
          
        </div>
      </div>
    
    </div>
<?php echo Request::factory("pub/footer")->execute()->body(); ?>
<?php echo Request::factory("pub/flink")->execute()->body(); ?>
<?php echo Common::js("fcous.js,slideTabs.js");?>
</body>
<script>
    $(function(){
        //攻略首页焦点图
        $('.st-gl-slideBox').slide({mainCell:'.bd ul',easing:'easeOutCirc',autoPlay:true})
        $('.st-slideTab').switchTab()
        $('.st-tabnav').find('span').click(function(){
            var urlmore = $(this).attr("data-url");
            $(this).parent().find('.more').attr('href',urlmore);
        })
    })
</script>
</html>
