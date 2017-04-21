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
    <?php echo Common::css('lines.css,base.css,extend.css');?>
    <?php echo Common::js('jquery.min.js,base.js,common.js,SuperSlide.min.js,template.js');?>
</head>
<body>
  <?php echo Request::factory("pub/header")->execute()->body(); ?>
  
  <div class="big">
  <div class="wm-1200">
    
    <div class="st-guide">
        <a href="<?php echo $cmsurl;?>"><?php echo $GLOBALS['cfg_indexname'];?></a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;<?php echo $channelname;?>
        </div><!--面包屑-->
      
      <div class="st-line-home-top">
      
      <div class="st-line-dh">
        <div class="st-dh-tit"><?php echo $channelname;?>导航</div>
          <div class="st-dh-con">
          <h3>
              <strong>旅游目的地</strong>
              <p>
                <?php require_once ("C:/phpstudy/WWW/taglib/dest.php");$dest_tag = new Taglib_Dest();if (method_exists($dest_tag, 'query')) {$linedestlist = $dest_tag->query(array('action'=>'query','flag'=>'channel_nav','typeid'=>'1','row'=>'5','return'=>'linedestlist',));}?>
               <?php $n=1; if(is_array($linedestlist)) { foreach($linedestlist as $row) { ?>
                  <a href="<?php echo $cmsurl;?>lines/<?php echo $row['pinyin'];?>/" target="_blank"><?php echo $row['kindname'];?></a>
                 <?php $n++;}unset($n); } ?>
              </p>
            </h3>
            <div class="st-dh-item">
                <?php $n=1; if(is_array($linedestlist)) { foreach($linedestlist as $d) { ?>
            <dl>
              <dt><a href="<?php echo $cmsurl;?>lines/<?php echo $row['pinyin'];?>/" target="_blank"><?php echo $d['kindname'];?></a></dt>
                <dd>
                    <?php require_once ("C:/phpstudy/WWW/taglib/dest.php");$dest_tag = new Taglib_Dest();if (method_exists($dest_tag, 'query')) {$nextd = $dest_tag->query(array('action'=>'query','flag'=>'next','typeid'=>$typeid,'pid'=>$d['id'],'row'=>'30','return'=>'nextd',));}?>
                     <?php $n=1; if(is_array($nextd)) { foreach($nextd as $nd) { ?>
                    <a href="<?php echo $cmsurl;?>lines/<?php echo $nd['pinyin'];?>/"><?php echo $nd['kindname'];?></a>
                     <?php $n++;}unset($n); } ?>
                </dd>
              </dl>
               <?php $n++;}unset($n); } ?>
            </div>
          </div>
       <div class="st-dh-con">
          <h3>
            <strong>旅行方式</strong>
              <p>
                <?php require_once ("C:/phpstudy/WWW/taglib/attr.php");$attr_tag = new Taglib_Attr();if (method_exists($attr_tag, 'query')) {$data = $attr_tag->query(array('action'=>'query','flag'=>'childname','typeid'=>$typeid,'row'=>'5','groupname'=>'旅行方式',));}?>
                  <?php $n=1; if(is_array($data)) { foreach($data as $r) { ?>
                  <a href="<?php echo $cmsurl;?>lines/all-0-0-0-0-0-<?php echo $r['id'];?>-1"><?php echo $r['title'];?></a>
                  <?php $n++;}unset($n); } ?>
                
              </p>
            </h3>
          </div>
          <div class="st-dh-con">
          <h3>
            <strong>旅游主题</strong>
              <p>
                  <?php require_once ("C:/phpstudy/WWW/taglib/attr.php");$attr_tag = new Taglib_Attr();if (method_exists($attr_tag, 'query')) {$data = $attr_tag->query(array('action'=>'query','flag'=>'childname','typeid'=>$typeid,'row'=>'5','groupname'=>'交通选择',));}?>
                      <?php $n=1; if(is_array($data)) { foreach($data as $r) { ?>
                      <a href="<?php echo $cmsurl;?>lines/all-0-0-0-0-0-<?php echo $r['id'];?>-1"><?php echo $r['title'];?></a>
                      <?php $n++;}unset($n); } ?>
                  
              </p>
            </h3>
          </div>
          <div class="st-dh-con">
          <h3 class="bor_0">
            <strong>节日特惠</strong>
              <p>
                  <?php require_once ("C:/phpstudy/WWW/taglib/attr.php");$attr_tag = new Taglib_Attr();if (method_exists($attr_tag, 'query')) {$data = $attr_tag->query(array('action'=>'query','flag'=>'childname','typeid'=>$typeid,'row'=>'5','groupname'=>'节日特惠',));}?>
                      <?php $n=1; if(is_array($data)) { foreach($data as $r) { ?>
                      <a href="<?php echo $cmsurl;?>lines/all-0-0-0-0-0-<?php echo $r['id'];?>-1"><?php echo $r['title'];?></a>
                      <?php $n++;}unset($n); } ?>
                  
              </p>
            </h3>
          </div>
        </div><!--线路分类导航-->
        
        <div id="st-line-slideBox" class="st-line-slideBox">
          <div class="hd">
            <ul>
              <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$linead = $ad_tag->getad(array('action'=>'getad','name'=>'LineRollingAd','pc'=>'1','return'=>'linead',));}?>
                <?php $n=1; if(is_array($linead['aditems'])) { foreach($linead['aditems'] as $k => $v) { ?>
                 <li>$k</li>
                <?php $n++;}unset($n); } ?>
            </ul>
          </div>
          <div class="bd">
            <ul>
             <?php $n=1; if(is_array($linead['aditems'])) { foreach($linead['aditems'] as $v) { ?>
              <li><a href="<?php echo $v['adlink'];?>" target="_blank"><img src="<?php echo Common::img($v['adsrc']);?>" width="858" height="324"/></a></li>
             <?php $n++;}unset($n); } ?>
            </ul>
          </div>
          <!--前/后按钮代码-->
          <a class="prev" href="javascript:void(0)"></a>
          <a class="next" href="javascript:void(0)"></a>
        </div><!--线路首页焦点图-->
        
      </div>
      
      <div class="st-line-home-lsit">
        <?php require_once ("C:/phpstudy/WWW/taglib/dest.php");$dest_tag = new Taglib_Dest();if (method_exists($dest_tag, 'query')) {$destlist = $dest_tag->query(array('action'=>'query','flag'=>'channel_nav','typeid'=>'1','row'=>'6','return'=>'destlist',));}?>
          <?php $autoindex=0;?>
          <?php $n=1; if(is_array($destlist)) { foreach($destlist as $dest) { ?>
            <div class="st-cp-slideTab">
              <div class="st-tabnav">
                <h3><?php echo $dest['kindname'];?></h3>
                        <span data-id="<?php echo $dest['id'];?>" data-url="/lines/<?php echo $dest['pinyin'];?>/">热门<i></i></span>
                 <?php require_once ("C:/phpstudy/WWW/taglib/dest.php");$dest_tag = new Taglib_Dest();if (method_exists($dest_tag, 'query')) {$nextdest = $dest_tag->query(array('action'=>'query','flag'=>'next','typeid'=>$typeid,'pid'=>$dest['id'],'row'=>'6','return'=>'nextdest',));}?>
                    <?php $n=1; if(is_array($nextdest)) { foreach($nextdest as $nr) { ?>
                        <span data-id="<?php echo $nr['id'];?>" data-url="/lines/<?php echo $nr['pinyin'];?>/"><?php echo $nr['kindname'];?><i></i></span>
                    <?php $n++;}unset($n); } ?>
                 
                <a href="/lines/<?php echo $dest['pinyin'];?>/" class="more">更多</a>
              </div>
              <div class="st-line-slidemenu">
                <div class="slidemenu-list">
                    <dl>
                    <dt>热门目的地</dt>
                    <dd>
                        <?php require_once ("C:/phpstudy/WWW/taglib/dest.php");$dest_tag = new Taglib_Dest();if (method_exists($dest_tag, 'query')) {$hotdest = $dest_tag->query(array('action'=>'query','flag'=>'hot','typeid'=>$typeid,'destid'=>$dest['id'],'row'=>'10','return'=>'hotdest',));}?>
                            <?php $n=1; if(is_array($hotdest)) { foreach($hotdest as $hr) { ?>
                                 <a href="<?php echo $cmsurl;?>lines/<?php echo $hr['pinyin'];?>/"><?php echo $hr['kindname'];?></a>
                            <?php $n++;}unset($n); } ?>
                        
                    </dd>
                  </dl>
                </div>
                <div class="slidemenu-adbg">
                    <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'sortad')) {$pluginad = $ad_tag->sortad(array('action'=>'sortad','index'=>$autoindex,'pc'=>'1','adname'=>'LineIndex_LeftAd1,LineIndex_LeftAd2,LineIndex_LeftAd3,LineIndex_LeftAd4,LineIndex_LeftAd5,LineIndex_LeftAd6','return'=>'pluginad','row'=>'1',));}?>
                        <?php if(!empty($pluginad)) { ?>
                         <a href="<?php echo $pluginad['adlink'];?>"><img src="<?php echo Common::img($pluginad['adsrc']);?>" title="<?php echo $pluginad['adname'];?>" ></a>
                        <?php } ?>
                    
                </div>
              </div>
              <div class="st-tabcon">
                <ul class="st-cp-list">
                    <?php require_once ("C:/phpstudy/WWW/taglib/line.php");$line_tag = new Taglib_Line();if (method_exists($line_tag, 'query')) {$linelist = $line_tag->query(array('action'=>'query','flag'=>'mdd','destid'=>$dest['id'],'row'=>'6','return'=>'linelist',));}?>
                      <?php $n=1; if(is_array($linelist)) { foreach($linelist as $line) { ?>
                         <li>
                            <div class="pic">
                              <img class="fl" src="<?php echo Common::img($line['litpic']);?>" alt="<?php echo $line['title'];?>" width="285" height="190" />
                              <div class="buy"><a href="<?php echo $line['url'];?>">立即预订</a></div>
                            </div>
                            <div class="js">
                              <a class="tit" href="<?php echo $line['url'];?>" target="_blank"><?php echo $line['title'];?></a>
                              <p class="attr">
                                  <?php $n=1; if(is_array($line['iconlist'])) { foreach($line['iconlist'] as $ico) { ?>
                                    <img src="<?php echo $ico['litpic'];?>" />
                                  <?php $n++;}unset($n); } ?>
                              </p>
                              <p class="num">
                                <?php if($line['sellprice']) { ?>
                                 <del>原价：<i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $line['sellprice'];?></del>
                                <?php } ?>
                                <?php if($line['price']) { ?>
                                  <span><b><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $line['price'];?></b>起</span>
                                <?php } else { ?>
                                  <span><b>电询</b></span>
                                <?php } ?>
                              </p>
                            </div>
                          </li>
                      <?php $n++;}unset($n); } ?>
                    
                </ul>
              </div>
            </div>
            <div class="st-list-sd">
                <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'sortad')) {$bottomad = $ad_tag->sortad(array('action'=>'sortad','index'=>$autoindex,'pc'=>'1','adname'=>'LineIndex_BottomAd1,LineIndex_BottomAd2,LineIndex_BottomAd3,LineIndex_BottomAd4,LineIndex_BottomAd5,LineIndex_BottomAd6','return'=>'bottomad',));}?>
                    <?php if(!empty($bottomad)) { ?>
                        <a href="<?php echo $bottomad['adlink'];?>"><img src="<?php echo Common::img($bottomad['adsrc']);?>" title="<?php echo $bottomad['adname'];?>" width="1200" height="100"></a>
                    <?php } ?>
                
            </div><!--广告-->
           <?php $autoindex++;?>
          <?php $n++;}unset($n); } ?>
        
      </div><!--列表结束-->
    
    </div>
  </div>
  
 <?php echo Request::factory("pub/footer")->execute()->body(); ?>
 <?php echo Request::factory("pub/flink")->execute()->body(); ?>
<script type="text/html" id="tpl_line">
    <ul class="st-cp-list">
   {{each list as value i}}
    <li>
        <div class="pic">
            <img class="fl" src="{{value.litpic}}" alt="{{value.title}}" width="285" height="190" />
            <div class="buy"><a href="{{value.url}}">立即预订</a></div>
        </div>
        <div class="js">
            <a class="tit" href="{{value.url}}" target="_blank">{{value.title}}</a>
            <p class="attr">
                {{each value.iconlist as ico k}}
                    <img src="{{ico['litpic']}}" />
                {{/each}}
            </p>
            <p class="num">
                {{if value.sellprice}}
                   <del>原价：<i class="currency_sy"><?php echo Currency_Tool::symbol();?></i>{{value.sellprice}}</del>
                {{/if}}
                {{if value.price}}
                  <span><b><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i>{{value.price}}</b>起</span>
                {{else}}
                  <span><b>电询</b></span>
                {{/if}}
            </p>
        </div>
    </li>
    {{/each}}
    </ul>
</script>
<script>
    $(function(){
        //线路首页焦点图
        $('.st-line-slideBox').slide({mainCell:'.bd ul',easing:'easeOutCirc',autoPlay:true})
        //选中第一个选项
        $('.st-tabnav').each(function(i,obj){
            $(obj).find('span').first().addClass('on');
        })
        $('.st-tabnav').find('span').click(function(){
            var destid = $(this).attr('data-id');
            var url = SITEURL+'line/ajax_index_line';
            var content = $(this).data(destid);
            var concontain = $(this).parents('.st-cp-slideTab').first().find('.st-tabcon');
            $(this).addClass('on').siblings().removeClass('on');
            var urlmore = $(this).attr("data-url");
            $(this).parent().find('.more').attr('href',urlmore);
            concontain.html('<img src="/res/images/loading.gif" style="display:block;width:28px;height:28px;margin:160px auto 157px auto;">');
            if(content){
                concontain.html(content);
            }else{
                $.getJSON(url, {destid:destid,pagesize:6}, function(data) {
                    var licontent = template('tpl_line',data);
                    concontain.html(licontent);
                    concontain.data(destid,licontent);
                });
            }
        })
    })
</script>
</body>
</html>