<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $seoinfo['seotitle'];?>-<?php echo $GLOBALS['cfg_webname'];?></title>
    <?php if($seoinfo['keyword']) { ?>
    <meta name="keywords" content="<?php echo $seoinfo['keyword'];?>"/>
    <?php } ?>
    <?php if($seoinfo['description']) { ?>
    <meta name="description" content="<?php echo $seoinfo['description'];?>"/>
    <?php } ?>
    <?php echo  Stourweb_View::template("pub/varname");  ?>
    <?php echo Common::css('tuan.css,base.css,extend.css');?>
    <?php echo Common::js('jquery.min.js,base.js,common.js,SuperSlide.min.js,template.js,tuan.js');?>
<script>
$(function(){
//团购首页焦点图
$('.st-tuan-slideBox').slide({mainCell:'.bd ul',easing:'easeOutCirc',autoPlay:true})
})
</script>
</head>
<body>
<?php echo Request::factory("pub/header")->execute()->body(); ?>
  
  
  <div class="big">
  <div class="wm-1200">
    
    <div class="st-guide">
            <a href="<?php echo $cmsurl;?>"><?php echo $GLOBALS['cfg_indexname'];?></a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;<?php echo $channelname;?>
        </div><!--面包屑-->
      
      <div id="st-tuan-slideBox" class="st-tuan-slideBox">
        <div class="hd">
          <ul>
              <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$tuanad = $ad_tag->getad(array('action'=>'getad','name'=>'TuanRollingAd','pc'=>'1','return'=>'tuanad',));}?>
                  <?php $n=1; if(is_array($tuanad['aditems'])) { foreach($tuanad['aditems'] as $k => $v) { ?>
                    <li><?php echo $k;?></li>
                  <?php $n++;}unset($n); } ?>
              
          </ul>
        </div>
        <div class="bd">
          <ul>
              <?php $n=1; if(is_array($tuanad['aditems'])) { foreach($tuanad['aditems'] as $v) { ?>
                <li><a href="<?php echo $v['adlink'];?>" target="_blank"><img src="<?php echo Common::img($v['adsrc']);?>" width="1200" height="360"/></a></li>
              <?php $n++;}unset($n); } ?>
          </ul>
        </div>
        <!--前/后按钮代码-->
        <a class="prev" href="javascript:void(0)"></a>
        <a class="next" href="javascript:void(0)"></a>
      </div><!--团购首页焦点图-->
      
      <div class="tuan-home-lsit">
      <div class="st-cp-slideTab">
        <div class="st-tabnav">
          <h3>团购精选</h3>
                <?php require_once ("C:/phpstudy/WWW/taglib/dest.php");$dest_tag = new Taglib_Dest();if (method_exists($dest_tag, 'query')) {$destlist = $dest_tag->query(array('action'=>'query','flag'=>'channel_nav','typeid'=>$typeid,'row'=>'6','return'=>'destlist',));}?>
                  <?php $n=1; if(is_array($destlist)) { foreach($destlist as $dest) { ?>
                    <span <?php if($n==1) { ?>class="on"<?php } ?>
 data-id="<?php echo $dest['id'];?>"><?php echo $dest['kindname'];?><i></i></span>
                  <?php $n++;}unset($n); } ?>
                
            <a href="<?php echo $cmsurl;?>tuan/all/" class="more">更多</a>
          </div>
          <div class="st-tabcon">
          <ul class="st-cp-list">
              <?php require_once ("C:/phpstudy/WWW/taglib/tuan.php");$tuan_tag = new Taglib_Tuan();if (method_exists($tuan_tag, 'query')) {$tuanlist = $tuan_tag->query(array('action'=>'query','flag'=>'mdd','destid'=>$destlist[0]['id'],'row'=>'6','return'=>'tuanlist',));}?>
               <?php $index=1;?>
               <?php $n=1; if(is_array($tuanlist)) { foreach($tuanlist as $t) { ?>
                    <li <?php if($index%3==0) { ?>class="mr_0"<?php } ?>
>
                    <i class="hot-ico"></i>
                    <a class="pic" href="<?php echo $t['url'];?>" target="_blank"><img class="fl" src="<?php echo $t['litpic'];?>" alt="<?php echo $t['title'];?>" width="378" height="265" /></a>
                    <a class="tit" href="<?php echo $t['url'];?>" target="_blank"><?php echo $t['title'];?></a>
                    <p class="attr">
                        <?php $n=1; if(is_array($t['iconlist'])) { foreach($t['iconlist'] as $ico) { ?>
                            <img src="<?php echo $ico['litpic'];?>" />
                        <?php $n++;}unset($n); } ?>
                    </p>
                    <p class="num">
                      <del><?php if(!empty($t['sellprice'])) { ?>原价：<i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $t['sellprice'];?><?php } ?>
</del>
                      <span><?php if(!empty($t['price'])) { ?><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><b><?php echo $t['price'];?></b><?php } else { ?>电询<?php } ?>
</span>
                      <em><?php if($t['discount']) { ?><b><?php echo $t['discount'];?></b>折<?php } ?>
</em>
                    </p>
                    <p class="data">
                      <span class="rq">
                          <span class="dao" id="tick_<?php echo $t['id'];?>">
                              <span class="RemainD"></span>天
                              <span class="RemainH"></span>时
                              <span class="RemainM"></span>分
                              <span class="RemainS"></span>秒
                              <input type="hidden" class="ticktime" rel="tick_<?php echo $t['id'];?>" value="<?php echo date('Y/m/d H:i:s',$t['endtime']);?>">
                          </span>
                      </span>
                      <span class="yg"><?php echo $t['sellnum'];?>人已购</span>
                    </p>
                  </li>
                <?php $index++;?>
               <?php $n++;}unset($n); } ?>
              
            </ul>
          </div>
        </div>
      </div><!--团购首页列表-->
    
    </div>
  </div>
<?php echo Request::factory("pub/footer")->execute()->body(); ?>
<?php echo Request::factory("pub/flink")->execute()->body(); ?>
<script type="text/html" id="tpl_tuan">
    <ul class="st-cp-list">
      {{each list as value i}}
        <li{{if i==2 || i==5}}class="mr_0"{{/if}}>
        <i class="hot-ico"></i>
        <a class="pic" href="{{value.url}}" target="_blank"><img class="fl" src="{{value.litpic}}" alt="{{value.title}}" width="378" height="265" /></a>
        <a class="tit" href="{{value.url}}" target="_blank">{{value.title}}</a>
        <p class="attr">
            {{each value.iconlist as ico k}}
                <img src="{{ico['litpic']}}" />
            {{/each}}
        </p>
        <p class="num">
            <del>{{if value.sellprice}}原价：<i class="currency_sy"><?php echo Currency_Tool::symbol();?></i>{{value.sellprice}}{{/if}}</del>
            <span>{{if value.price}}<i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><b>{{value.price}}</b>{{else}}电询{{/if}}</span>
            <em>{{if value.discount}}<b>{{value.discount}}</b>折{{/if}}</em>
        </p>
        <p class="data">
                      <span class="rq">
                          <span class="dao" id="tick_{{value.id}}">
                              <span class="RemainD"></span>天
                              <span class="RemainH"></span>时
                              <span class="RemainM"></span>分
                              <span class="RemainS"></span>秒
                              <input type="hidden" class="ticktime" rel="tick_{{value.id}}" value="{{jsdate(value.endtime)}}"/>
                          </span>
                      </span>
            <span class="yg">{{value.sellnum}}人已购</span>
        </p>
        </li>
        {{/each}}
    </ul>
</script>
<script>
    $(function(){
        //js模板扩展函数
        template.helper('jsdate', function (unixtime) {
            var   now = new   Date(parseInt(unixtime) * 1000);
            var   year=now.getFullYear();
            var   month=now.getMonth()+1;
            var   date=now.getDate();
            var   hour=now.getHours();
            var   minute=now.getMinutes();
            var   second=now.getSeconds();
            var   nowdate =   year+"/"+month+"/"+date+" 00:00:00";
            return nowdate;
        });
        //倒计时
        $(".ticktime").each(function(index, element) {
            Tuan.tickTimeEle(element);
        });
        $('.st-tabnav').find('span').click(function(){
            var destid = $(this).attr('data-id');
            var url = SITEURL+'tuan/ajax_index_tuan';
            var content = $(this).data(destid);
            var concontain = $('.st-tabcon');
            var content = concontain.data(destid);
            $(this).addClass('on').siblings().removeClass('on');
            concontain.html('<img src="/res/images/loading.gif" style="display:block;width:28px;height:28px;margin:160px auto 157px auto;">');
            if(content!=undefined){
                concontain.html(content);
            }else{
                $.getJSON(url, {destid:destid,pagesize:6}, function(data) {
                    var licontent = template('tpl_tuan',data);
                    concontain.html(licontent);
                    concontain.data(destid,licontent);
                    $(".ticktime").each(function(index, element) {
                        Tuan.tickTimeEle(element);
                    });
                });
            }
        })
    })
</script>
</body>
</html>
