<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $seoinfo['seotitle'];?>-<?php echo $webname;?></title>
    <?php if($seoinfo['keyword']) { ?>
    <meta name="keywords" content="<?php echo $seoinfo['keyword'];?>"/>
    <?php } ?>
    <?php if($seoinfo['description']) { ?>
    <meta name="description" content="<?php echo $seoinfo['description'];?>"/>
    <?php } ?>
    <?php echo $GLOBALS['cfg_indexcode'];?>
    <?php echo  Stourweb_View::template("pub/varname");  ?>
    <?php echo Common::css("base.css,index.css,extend.css");?>
    <?php echo Common::js("jquery.min.js,base.js,common.js");?>
</head>
<body>
<?php echo Request::factory('pub/header')->execute()->body(); ?>
  
  <div class="focus_img">
    <div id="_banners" class="banners">
        <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$ad = $ad_tag->getad(array('action'=>'getad','name'=>'IndexRollingAd','pc'=>'1','return'=>'ad',));}?>
            <?php $n=1; if(is_array($ad['aditems'])) { foreach($ad['aditems'] as $v) { ?>
                <div class="banner"><a href="<?php echo $v['adlink'];?>" target="_blank"><img width="1920" height="420" src="<?php echo Common::img($v['adsrc']);?>" alt="<?php echo $v['adname'];?>" /></a></div>
            <?php $n++;}unset($n); } ?>
        
    </div>
    <div id="_focus" class="focus">
      <?php $n=1; if(is_array($ad['aditems'])) { foreach($ad['aditems'] as $k) { ?>
      <a data-index="<?php echo $n-1;?>" href="javascript:void(0);" <?php if($n==1) { ?>class="on"<?php } ?>
><span class="bg-b"></span><span class="inner"></span></a>
      <?php $n++;}unset($n); } ?>
    </div>
  </div><!--滚动焦点图结束-->
  
  <div class="big">
  <div class="wm-1200">
    <?php if($channel['line']['isopen']==1) { ?>
      <div class="st-slideTab">
      <div class="st-tabnav">
          <h3 class="xl-bt"><?php echo $channel['line']['channelname'];?></h3>
          <?php require_once ("C:/phpstudy/WWW/taglib/dest.php");$dest_tag = new Taglib_Dest();if (method_exists($dest_tag, 'query')) {$linedest = $dest_tag->query(array('action'=>'query','flag'=>'channel_nav','row'=>'6','typeid'=>'1','return'=>'linedest',));}?>
            <?php $n=1; if(is_array($linedest)) { foreach($linedest as $ld) { ?>
                <span data-id="<?php echo $ld['id'];?>"><?php echo $ld['kindname'];?></span>
            <?php $n++;}unset($n); } ?>
          <a href="<?php echo $cmsurl;?>lines/" class="more">更多<?php echo $channel['line']['channelname'];?></a>
        </div>
        <?php $n=1; if(is_array($linedest)) { foreach($linedest as $ld) { ?>
        <div class="st-tabcon">
        <ul class="st-cp-list">
            <?php require_once ("C:/phpstudy/WWW/taglib/line.php");$line_tag = new Taglib_Line();if (method_exists($line_tag, 'query')) {$linelist = $line_tag->query(array('action'=>'query','flag'=>'mdd','destid'=>$ld['id'],'row'=>'6','return'=>'linelist',));}?>
              <?php $n=1; if(is_array($linelist)) { foreach($linelist as $l) { ?>
                    <li>
                        <div class="pic">
                        <img class="fl" src="<?php echo Common::img($l['litpic'],285,190);?>" alt="<?php echo $l['title'];?>" width="285" height="190" />
                        <div class="buy"><a href="<?php echo $l['url'];?>" target="_blank">立即预订</a></div>
                      </div>
                      <div class="js">
                        <a class="tit" href="<?php echo $l['url'];?>" target="_blank"><?php echo $l['title'];?></a>
                        <p class="attr">
                            <?php $n=1; if(is_array($l['iconlist'])) { foreach($l['iconlist'] as $ico) { ?>
                                <img src="<?php echo $ico['litpic'];?>" />
                            <?php $n++;}unset($n); } ?>
                        </p>
                        <p class="num">
                            <?php if(!empty($l['storeprice'])) { ?>
                                <del>原价：<i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $l['sellprice'];?></del>
                            <?php } ?>
                            <span>
                                <?php if(!empty($l['price'])) { ?>
                                  <b><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $l['price'];?></b>元起
                                <?php } else { ?>
                                    电询
                                <?php } ?>
                            </span>
                        </p>
                      </div>
                    </li>
              <?php $n++;}unset($n); } ?>
          </ul>
        </div>
        <?php $n++;}unset($n); } ?>
          <div class="st-adimg">
              <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$linead1 = $ad_tag->getad(array('action'=>'getad','name'=>'IndexLineAd1','pc'=>'1','return'=>'linead1',));}?>
                  <?php if(!empty($linead1)) { ?>
                    <a href="<?php echo $linead1['adlink'];?>"><img class="fl" src="<?php echo Common::img($linead1['adsrc']);?>" alt="<?php echo $linead1['adname'];?>" width="285" height="622" /></a>
                  <?php } ?>
              
          </div>
      </div><!--旅游线路结束-->
        <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$linead2 = $ad_tag->getad(array('action'=>'getad','name'=>'IndexLineAd2','pc'=>'1','return'=>'linead2',));}?>
        <?php if(!empty($linead2)) { ?>
        <div class="st-list-sd">
            <a href="<?php echo $linead2['adlink'];?>"><img class="fl" src="<?php echo Common::img($linead2['adsrc']);?>" alt="<?php echo $linead2['adname'];?>" width="1200" height="100"></a>
        </div>
        <?php } ?>
    <?php } ?>
    <?php if($channel['hotel']['isopen']==1) { ?>
      <div class="st-slideTab">
      <div class="st-tabnav">
        <h3 class="jd-bt"><?php echo $channel['hotel']['channelname'];?></h3>
            <?php require_once ("C:/phpstudy/WWW/taglib/dest.php");$dest_tag = new Taglib_Dest();if (method_exists($dest_tag, 'query')) {$hoteldest = $dest_tag->query(array('action'=>'query','flag'=>'channel_nav','row'=>'6','typeid'=>'2','return'=>'hoteldest',));}?>
            <?php $n=1; if(is_array($hoteldest)) { foreach($hoteldest as $hd) { ?>
                <span data-id="<?php echo $hd['id'];?>"><?php echo $hd['kindname'];?></span>
            <?php $n++;}unset($n); } ?>
          <a href="<?php echo $cmsurl;?>hotels/" class="more">更多<?php echo $channel['hotel']['channelname'];?></a>
        </div>
       <?php $n=1; if(is_array($hoteldest)) { foreach($hoteldest as $hd) { ?>
        <div class="st-tabcon">
        <ul class="st-cp-list">
            <?php require_once ("C:/phpstudy/WWW/taglib/hotel.php");$hotel_tag = new Taglib_Hotel();if (method_exists($hotel_tag, 'query')) {$hotellist = $hotel_tag->query(array('action'=>'query','flag'=>'mdd','destid'=>$hd['id'],'row'=>'6','return'=>'hotellist',));}?>
              <?php $n=1; if(is_array($hotellist)) { foreach($hotellist as $h) { ?>
                <li>
                    <div class="pic">
                    <img class="fl" src="<?php echo Common::img($h['litpic'],285,190);?>" alt="<?php echo $h['title'];?>" width="285" height="190" />
                    <div class="buy"><a href="<?php echo $h['url'];?>" target="_blank">立即预订</a></div>
                  </div>
                  <div class="js">
                    <a class="tit" href="<?php echo $h['url'];?>" target="_blank"><?php echo $h['title'];?></a>
                    <p class="num">
                        <?php if(!empty($h['sellprice'])) { ?>
                        <del>原价：<i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $h['sellprice'];?></del>
                        <?php } ?>
                            <span>
                                <?php if(!empty($h['price'])) { ?>
                                  <b><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $h['price'];?></b>元起
                                <?php } else { ?>
                                    电询
                                <?php } ?>
                            </span>
                    </p>
                  </div>
                </li>
                <?php $n++;}unset($n); } ?>
            
          </ul>
        </div>
       <?php $n++;}unset($n); } ?>
        <div class="st-adimg">
            <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$hotelad1 = $ad_tag->getad(array('action'=>'getad','name'=>'IndexHotelAd1','return'=>'hotelad1',));}?>
                <?php if(!empty($hotelad1)) { ?>
                <a href="<?php echo $hotelad1['adlink'];?>"><img class="fl" src="<?php echo Common::img($hotelad1['adsrc']);?>" alt="<?php echo $hotelad1['adname'];?>" width="285" height="570" /></a>
                <?php } ?>
            
        </div>
      </div><!--热门酒店结束-->
        <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$hotelad2 = $ad_tag->getad(array('action'=>'getad','name'=>'IndexHotelAd2','return'=>'hotelad2',));}?>
        <?php if(!empty($hotelad2)) { ?>
        <div class="st-list-sd">
            <a href="<?php echo $hotelad2['adlink'];?>"><img class="fl" src="<?php echo Common::img($hotelad2['adsrc']);?>" alt="<?php echo $hotelad2['adname'];?>" width="1200" height="100"></a>
        </div>
        <?php } ?>
    <?php } ?>
    <?php if($channel['spot']['isopen']==1) { ?>
      <div class="st-slideTab">
      <div class="st-tabnav">
        <h3 class="mp-bt"><?php echo $channel['spot']['channelname'];?></h3>
            <?php require_once ("C:/phpstudy/WWW/taglib/dest.php");$dest_tag = new Taglib_Dest();if (method_exists($dest_tag, 'query')) {$spotdest = $dest_tag->query(array('action'=>'query','flag'=>'channel_nav','row'=>'6','typeid'=>'5','return'=>'spotdest',));}?>
            <?php $n=1; if(is_array($spotdest)) { foreach($spotdest as $sd) { ?>
            <span data-id="<?php echo $sd['id'];?>"><?php echo $sd['kindname'];?></span>
            <?php $n++;}unset($n); } ?>
          <a href="/spots/" class="more">更多<?php echo $channel['spot']['channelname'];?></a>
        </div>
        <?php $n=1; if(is_array($spotdest)) { foreach($spotdest as $sd) { ?>
            <div class="st-tabcon">
        <ul class="st-cp-list">
                <?php require_once ("C:/phpstudy/WWW/taglib/spot.php");$spot_tag = new Taglib_Spot();if (method_exists($spot_tag, 'query')) {$spotlist = $spot_tag->query(array('action'=>'query','flag'=>'mdd','destid'=>$sd['id'],'row'=>'6','return'=>'spotlist',));}?>
                <?php $n=1; if(is_array($spotlist)) { foreach($spotlist as $s) { ?>
                <li>
                    <div class="pic">
                        <img class="fl" src="<?php echo Common::img($s['litpic'],285,190);?>" alt="<?php echo $s['title'];?>" width="285" height="190" />
                        <div class="buy"><a href="<?php echo $s['url'];?>" target="_blank">立即预订</a></div>
                    </div>
                    <div class="js">
                        <a class="tit" href="<?php echo $s['url'];?>" target="_blank"><?php echo $s['title'];?></a>
                        <p class="num">
                            <?php if(!empty($s['sellprice'])) { ?>
                            <del>原价：<i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $s['sellprice'];?></del>
                            <?php } ?>
                            <span>
                                <?php if(!empty($s['price'])) { ?>
                                  <b><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $s['price'];?></b>元起
                                <?php } else { ?>
                                    电询
                                <?php } ?>
                            </span>
                        </p>
                    </div>
                </li>
                <?php $n++;}unset($n); } ?>
                
          </ul>
        </div>
        <?php $n++;}unset($n); } ?>
        <div class="st-adimg">
            <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$spotad1 = $ad_tag->getad(array('action'=>'getad','name'=>'IndexSpotAd1','return'=>'spotad1',));}?>
            <?php if(!empty($spotad1)) { ?>
            <a href="<?php echo $spotad1['adlink'];?>"><img class="fl" src="<?php echo Common::img($spotad1['adsrc']);?>" alt="<?php echo $spotad1['adname'];?>" width="285" height="570" /></a>
            <?php } ?>
            
        </div>
      </div><!--景点门票结束-->
        <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$spotad2 = $ad_tag->getad(array('action'=>'getad','name'=>'IndexSpotAd2','return'=>'spotad2',));}?>
        <?php if(!empty($spotad2)) { ?>
        <div class="st-list-sd">
            <a href="<?php echo $spotad2['adlink'];?>"><img class="fl" src="<?php echo Common::img($spotad2['adsrc']);?>" alt="<?php echo $spotad2['adname'];?>" width="1200" height="100"></a>
        </div>
        <?php } ?>
    <?php } ?>
    <?php if($channel['tuan']['isopen']==1) { ?>
      <div class="st-slideTab">
      <div class="st-tabnav">
        <h3 class="tg-bt"><?php echo $channel['tuan']['channelname'];?></h3>
            <?php require_once ("C:/phpstudy/WWW/taglib/dest.php");$dest_tag = new Taglib_Dest();if (method_exists($dest_tag, 'query')) {$tuandest = $dest_tag->query(array('action'=>'query','flag'=>'channel_nav','row'=>'6','typeid'=>'13','return'=>'tuandest',));}?>
                <?php $n=1; if(is_array($tuandest)) { foreach($tuandest as $td) { ?>
                <span data-id="<?php echo $td['id'];?>"><?php echo $td['kindname'];?></span>
                <?php $n++;}unset($n); } ?>
          <a href="<?php echo $cmsurl;?>tuan/" class="more">更多<?php echo $channel['tuan']['channelname'];?></a>
        </div>
       <?php $n=1; if(is_array($tuandest)) { foreach($tuandest as $td) { ?>
        <div class="st-tabcon">
        <ul class="st-cp-list tuan-list">
                <?php require_once ("C:/phpstudy/WWW/taglib/tuan.php");$tuan_tag = new Taglib_Tuan();if (method_exists($tuan_tag, 'query')) {$tuanlist = $tuan_tag->query(array('action'=>'query','flag'=>'mdd','destid'=>$td['id'],'row'=>'6','return'=>'tuanlist',));}?>
                <?php $k=1;?>
                <?php $n=1; if(is_array($tuanlist)) { foreach($tuanlist as $t) { ?>
                <li <?php if($k%4==0) { ?>class="mr_0"<?php } ?>
>
            <div class="pic">
              <img class="fl" src="<?php echo Common::img($t['litpic'],285,190);?>" alt="<?php echo $t['title'];?>" width="285" height="190" />
                <div class="buy"><a href="<?php echo $t['url'];?>" target="_blank">立即预订</a></div>
              </div>
              <div class="js">
              <a class="tit" href="<?php echo $t['url'];?>" target="_blank"><?php echo $t['title'];?></a>
                <p class="attr">
                    <?php $n=1; if(is_array($t['iconlist'])) { foreach($t['iconlist'] as $ico) { ?>
                    <img src="<?php echo $ico['litpic'];?>" />
                    <?php $n++;}unset($n); } ?>
                </p>
                <p class="num">
                    <?php if(!empty($t['sellprice'])) { ?>
                    <del>原价：<i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $t['sellprice'];?></del>
                    <?php } ?>
                            <span>
                                <?php if(!empty($t['price'])) { ?>
                                  <b><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $t['price'];?></b>元起
                                <?php } else { ?>
                                    电询
                                <?php } ?>
                            </span>
                </p>
              </div>
            </li>
                <?php $k++?>
                <?php $n++;}unset($n); } ?>
          </ul>
        </div>
       <?php $n++;}unset($n); } ?>
      </div><!--特价团购结束-->
        <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$tuanad1 = $ad_tag->getad(array('action'=>'getad','name'=>'IndexTuanAd1','return'=>'tuanad1',));}?>
        <?php if(!empty($tuanad1)) { ?>
        <div class="st-list-sd">
            <a href="<?php echo $tuanad1['adlink'];?>"><img class="fl" src="<?php echo Common::img($tuanad1['adsrc']);?>" alt="<?php echo $tuanad1['adname'];?>" width="1200" height="100"></a>
        </div>
        <?php } ?>
    <?php } ?>
    <?php if($channel['car']['isopen']==1) { ?>
      <div class="st-slideTab">
      <div class="st-tabnav">
          <h3 class="zc-bt"><?php echo $channel['car']['channelname'];?></h3>
          <a href="<?php echo $cmsurl;?>cars/" class="more">更多<?php echo $channel['car']['channelname'];?></a>
        </div>
            <div class="st-tabcon">
        <ul class="st-car-list">
                <?php require_once ("C:/phpstudy/WWW/taglib/car.php");$car_tag = new Taglib_Car();if (method_exists($car_tag, 'query')) {$carlist = $car_tag->query(array('action'=>'query','flag'=>'recommend','row'=>'5','return'=>'carlist',));}?>
                 <?php $n=1; if(is_array($carlist)) { foreach($carlist as $c) { ?>
                 <li <?php if($n%5==0) { ?>class="mr_0"<?php } ?>
>
                        <div class="pic">
                        <img class="fl" src="<?php echo Common::img($c['litpic'],224,190);?>" alt="<?php echo $c['title'];?>" width="224" height="190" />
                        <div class="buy"><a href="<?php echo $c['url'];?>" target="_blank">立即预订</a></div>
                      </div>
                      <div class="js">
                        <a class="tit" href="<?php echo $c['url'];?>" target="_blank"><?php echo $c['title'];?></a>
                        <p class="num">
                            <?php if(!empty($c['sellprice'])) { ?>
                            <del>原价：<i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $c['sellprice'];?></del>
                            <?php } ?>
                            <span>
                                <?php if(!empty($c['price'])) { ?>
                                  <b><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $c['price'];?></b>元起
                                <?php } else { ?>
                                    电询
                                <?php } ?>
                            </span>
                        </p>
                      </div>
                  </li>
                 <?php $n++;}unset($n); } ?>
          </ul>
        </div>
      </div><!--旅游租车结束-->
        <!--car ad-->
        <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$carad1 = $ad_tag->getad(array('action'=>'getad','name'=>'IndexCarAd1','return'=>'carad1',));}?>
        <?php if(!empty($carad1)) { ?>
        <div class="st-list-sd">
            <a href="<?php echo $carad1['adlink'];?>"><img class="fl" src="<?php echo Common::img($carad1['adsrc']);?>" alt="<?php echo $carad1['adname'];?>" width="1200" height="100"></a>
        </div>
        <?php } ?>
    <?php } ?>
    <?php if($channel['visa']['isopen']==1) { ?>
      <div class="st-slideTab">
      <div class="st-tabnav">
        <h3 class="qz-bt"><?php echo $channel['visa']['channelname'];?></h3>
          <a href="<?php echo $cmsurl;?>visa/" class="more">更多<?php echo $channel['visa']['channelname'];?></a>
        </div>
        <div class="st-tabcon">
        <ul class="st-visa-list">
             <?php require_once ("C:/phpstudy/WWW/taglib/visa.php");$visa_tag = new Taglib_Visa();if (method_exists($visa_tag, 'query')) {$visalist = $visa_tag->query(array('action'=>'query','flag'=>'order','row'=>'5','return'=>'visalist',));}?>
                <?php $n=1; if(is_array($visalist)) { foreach($visalist as $v) { ?>
                    <li <?php if($n%5==0) { ?> class="mr_0" <?php } ?>
>
                        <a class="fl" href="<?php echo $v['url'];?>" target="_blank">
                        <div class="country"><em><img src="<?php echo Common::img($v['litpic'],77,77);?>"  width="77" height="77" /></em></div>
                        <span class="tit"><?php echo $v['title'];?></span>
                      </a>
                      <p class="num">
                        <?php if(!empty($v['sellprice'])) { ?>
                            <del>原价：<i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $v['sellprice'];?></del>
                        <?php } ?>
                        <?php if(!empty($v['price'])) { ?>
                            <span><b><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $v['price'];?></b>元</span>
                        <?php } ?>
                      </p>
                    </li>
                <?php $n++;}unset($n); } ?>
          </ul>
        </div>
      </div><!--签证办理结束-->
        <!--visa ad-->
        <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$visaad1 = $ad_tag->getad(array('action'=>'getad','name'=>'IndexVisaAd1','return'=>'visaad1',));}?>
        <?php if(!empty($visaad1)) { ?>
        <div class="st-list-sd">
            <a href="<?php echo $visaad1['adlink'];?>"><img class="fl" src="<?php echo Common::img($visaad1['adsrc']);?>" alt="<?php echo $visaad1['adname'];?>" width="1200" height="100"></a>
        </div>
        <?php } ?>
    <?php } ?>
    <?php if($channel['article']['isopen']==1) { ?>
      <div class="st-slideTab">
      <div class="st-tabnav">
          <h3 class="gl-bt"><?php echo $channel['article']['channelname'];?></h3>
          <span>最新<?php echo $channel['article']['channelname'];?></span>
          <?php require_once ("C:/phpstudy/WWW/taglib/dest.php");$dest_tag = new Taglib_Dest();if (method_exists($dest_tag, 'query')) {$articledest = $dest_tag->query(array('action'=>'query','flag'=>'channel_nav','row'=>'6','typeid'=>'4','return'=>'articledest',));}?>
            <?php $n=1; if(is_array($articledest)) { foreach($articledest as $ad) { ?>
            <span data-id="<?php echo $td['id'];?>"><?php echo $ad['kindname'];?></span>
            <?php $n++;}unset($n); } ?>
          <a href="<?php echo $cmsurl;?>raiders/" class="more">更多<?php echo $channel['article']['channelname'];?></a>
        </div>
        <?php require_once ("C:/phpstudy/WWW/taglib/article.php");$article_tag = new Taglib_Article();if (method_exists($article_tag, 'query')) {$articlelist = $article_tag->query(array('action'=>'query','flag'=>'order','row'=>'7','return'=>'articlelist',));}?>
        <div class="st-tabcon">
        <ul class="st-gl-list">
            <?php $n=1; if(is_array($articlelist)) { foreach($articlelist as $a) { ?>
                <?php if($n==1) { ?>
                    <li class="ml_0">
                        <a class="fl" href="<?php echo $a['url'];?>"><i class="hot">hot</i><img class="fl" src="<?php echo Common::img($a['litpic'],386,298);?>" alt="<?php echo $a['title'];?>" width="386" height="298" /></a>
                      <a class="tit" href="<?php echo $a['url'];?>" target="_blank"><?php echo $a['title'];?></a>
                      <p class="txt"><?php echo Common::cutstr_html($a['content'],70);?></p>
                    </li>
                <?php } else if($n<4) { ?>
                    <li>
                        <a class="fl" href="<?php echo $a['url'];?>"><i class="hot">hot</i><img class="fl" src="<?php echo Common::img($a['litpic'],386,298);?>" alt="<?php echo $a['title'];?>" width="180" height="154" /></a>
                      <div class="con">
                        <a class="tit" href="<?php echo $a['url'];?>"><?php echo $a['title'];?></a>
                        <p class="txt"><?php echo Common::cutstr_html($a['content'],70);?></p>
                      </div>
                    </li>
                <?php } else if($n>3) { ?>
                    <li>
                      <a class="tit" href="<?php echo $a['url'];?>" target="_blank"><?php echo $a['title'];?></a>
                      <p class="txt"><?php echo Common::cutstr_html($a['content'],70);?></p>
                    </li>
                <?php } ?>
            <?php $n++;}unset($n); } ?>
          </ul>
        </div>
        <?php $n=1; if(is_array($articledest)) { foreach($articledest as $ad) { ?>
          <div class="st-tabcon">
              <ul class="st-gl-list">
                  <?php require_once ("C:/phpstudy/WWW/taglib/article.php");$article_tag = new Taglib_Article();if (method_exists($article_tag, 'query')) {$articlelist = $article_tag->query(array('action'=>'query','flag'=>'mdd','destid'=>$ad['id'],'row'=>'7','return'=>'articlelist',));}?>
                  <?php $n=1; if(is_array($articlelist)) { foreach($articlelist as $a) { ?>
                  <?php if($n==1) { ?>
                  <li class="ml_0">
                      <a class="fl" href="<?php echo $a['url'];?>"><i class="hot">hot</i><img class="fl" src="<?php echo Common::img($a['litpic'],386,298);?>" alt="<?php echo $a['title'];?>" width="386" height="298" /></a>
                      <a class="tit" href="<?php echo $a['url'];?>" target="_blank"><?php echo $a['title'];?></a>
                      <p class="txt"><?php echo Common::cutstr_html($a['content'],70);?></p>
                  </li>
                  <?php } else if($n<4) { ?>
                  <li>
                      <a class="fl" href="<?php echo $a['url'];?>"><i class="hot">hot</i><img class="fl" src="<?php echo Common::img($a['litpic'],386,298);?>" alt="<?php echo $a['title'];?>" width="180" height="154" /></a>
                      <div class="con">
                          <a class="tit" href="<?php echo $a['url'];?>"><?php echo $a['title'];?></a>
                          <p class="txt"><?php echo Common::cutstr_html($a['content'],70);?></p>
                      </div>
                  </li>
                  <?php } else if($n>3) { ?>
                  <li>
                      <a class="tit" href="<?php echo $a['url'];?>" target="_blank"><?php echo $a['title'];?></a>
                      <p class="txt"><?php echo Common::cutstr_html($a['content'],70);?></p>
                  </li>
                  <?php } ?>
                  <?php $n++;}unset($n); } ?>
              </ul>
          </div>
        <?php $n++;}unset($n); } ?>
      </div><!--旅游攻略结束-->
        <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$articlead1 = $ad_tag->getad(array('action'=>'getad','name'=>'IndexArticleAd1','return'=>'articlead1',));}?>
        <?php if(!empty($articlead1)) { ?>
        <div class="st-list-sd">
            <a href="<?php echo $articlead1['adlink'];?>"><img class="fl" src="<?php echo Common::img($articlead1['adsrc']);?>" alt="<?php echo $articlead1['adname'];?>" width="1200" height="100"></a>
        </div>
        <?php } ?>
    <?php } ?>
    
    </div>
  </div>
 <?php echo Request::factory('pub/footer')->execute()->body(); ?>
 <?php echo Request::factory("pub/flink")->execute()->body(); ?>
 <?php echo Common::js("fcous.js,slideTabs.js");?>
    <script>
        $(function(){
            $('.st-slideTab').switchTab()
        })
    </script>
</body>
</html>
