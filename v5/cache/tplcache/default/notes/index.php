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
    <?php echo Common::css('youji.css,base.css,extend.css');?>
    <?php echo Common::js('jquery.min.js,base.js,common.js,template.js');?>
</head>
<body>
<?php echo Request::factory("pub/header")->execute()->body(); ?>
  
<div class="big bgcolor_pa20">
  <div class="yj_top_fb">
    <a href="/notes/write/">发表新游记</a>
    </div>
  </div>
  
  <div class="big">
  <div class="wm-1200">
    
      <div class="user_yj_con">
      
        <div class="slide_lm">
        
          <div class="lm_tj">
          <h3><strong><?php echo $total_notes;?></strong>篇游记攻略</h3>
            <span>讲述精彩旅行故事</span>
          </div>
          
          <div class="user_ph">
          <h3><strong>达人排行榜</strong>看旅游达人分享经历</h3>
            <div class="ph_list">
            <ul>
                <?php require_once ("C:/phpstudy/WWW/taglib/notes.php");$notes_tag = new Taglib_Notes();if (method_exists($notes_tag, 'daren')) {$data = $notes_tag->daren(array('action'=>'daren','row'=>'5',));}?>
                    <?php $n=1; if(is_array($data)) { foreach($data as $row) { ?>
                        <li>
                            <strong class="pic">
                                <?php if($n==1) { ?>
                                <i class="bgico_f5"><?php echo $n;?></i>
                                <?php } else if($n==2) { ?>
                                <i class="bgico_f6"><?php echo $n;?></i>
                                <?php } else if($n==3) { ?>
                                <i class="bgico_fb"><?php echo $n;?></i>
                                <?php } else { ?>
                                <i class="bgico_fa"><?php echo $n;?></i>
                                <?php } ?>
                                <img src="<?php echo Common::img($row['litpic']);?>" width="56" height="56" /></strong>
                          <p>
                                <span class="name"><?php echo $row['nickname'];?></span>
                            <span class="js"><?php echo $row['remark'];?></span>
                          </p>
                        </li>
                    <?php $n++;}unset($n); } ?>
                
              </ul>
            </div>
          </div><!--达人排行榜-->
          
          <div class="youji_ph">
          <h3><strong>热门游记排行</strong>看旅游达人分享经历</h3>
            <div class="ph_list">
            <ul>
                <?php require_once ("C:/phpstudy/WWW/taglib/notes.php");$notes_tag = new Taglib_Notes();if (method_exists($notes_tag, 'query')) {$hotlist = $notes_tag->query(array('action'=>'query','flag'=>'hot','row'=>'5','return'=>'hotlist',));}?>
                    <?php $n=1; if(is_array($hotlist)) { foreach($hotlist as $hot) { ?>
                        <li>
                            <strong class="num<?php echo $n;?>"><?php echo $n;?></strong>
                          <p>
                                <span class="name"><?php echo $hot['title'];?></span>
                            <span class="js"><?php echo $hot['description'];?></span>
                          </p>
                        </li>
                    <?php $n++;}unset($n); } ?>
              </ul>
            </div>
          </div><!--热门攻略排行-->
         <?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$ad1 = $ad_tag->getad(array('action'=>'getad','name'=>'NotesLeftAd1','pc'=>'1','return'=>'ad1',));}?>
            <?php if(!empty($ad1)) { ?>
          <div class="pic_ad">
          <a class="fl" href="<?php echo $ad1['adlink'];?>"><img class="fl" src="<?php echo Common::img($ad1['adsrc']);?>" alt="<?php echo $ad1['adname'];?>" width="263" height="150" /></a>
          </div>
            <?php } ?>
         
          
          <div class="new_ph">
          <h3><strong>最新攻略</strong>看旅游达人分享经历</h3>
            <div class="ph_list">
                <?php require_once ("C:/phpstudy/WWW/taglib/notes.php");$notes_tag = new Taglib_Notes();if (method_exists($notes_tag, 'query')) {$newarc = $notes_tag->query(array('action'=>'query','flag'=>'new','row'=>'5','return'=>'newarc',));}?>
                <?php $n=1; if(is_array($newarc)) { foreach($newarc as $new) { ?>
                    <dl>
                        <dt><img src="<?php echo Common::img($new['litpic'],48,48);?>" alt="<?php echo $new['title'];?>" width="48" height="48" /></dt>
                        <dd>
                            <a href="<?php echo $new['url'];?>" target="_blank"><?php echo $new['title'];?></a>
                            <p><?php echo Common::cutstr_html($new['description'],10);?></p>
                            <span><?php echo Common::mydate('Y-m-d',$new['modtime']);?></span>
                        </dd>
                    </dl>
                <?php $n++;}unset($n); } ?>
            </div>
          </div><!--最新攻略-->
          
        </div>
        
        <div class="main_con">
        
        <div class="dj_hot_box">
          <div class="dj_tit">
            <h3>本季热门</h3>
              <span>看旅游达人分享经历</span>
              <p>
                <?php require_once ("C:/phpstudy/WWW/taglib/dest.php");$dest_tag = new Taglib_Dest();if (method_exists($dest_tag, 'query')) {$hotdest = $dest_tag->query(array('action'=>'query','flag'=>'hot','row'=>'3','return'=>'hotdest',));}?>
                  <?php $n=1; if(is_array($hotdest)) { foreach($hotdest as $h) { ?>
                  <a href="/<?php echo $h['pinyin'];?>/" target="_blank"><?php echo $h['kindname'];?></a>
                  <?php $n++;}unset($n); } ?>
                <a href="/destinations/" class="more">更多&gt;&gt;</a>
              </p>
            </div>
            <div class="dj_con">
                <?php require_once ("C:/phpstudy/WWW/taglib/notes.php");$notes_tag = new Taglib_Notes();if (method_exists($notes_tag, 'query')) {$seasonarc = $notes_tag->query(array('action'=>'query','flag'=>'season','row'=>'9','return'=>'seasonarc',));}?>
            <ul class="top_list">
                    <?php $n=1; if(is_array($seasonarc)) { foreach($seasonarc as $sarc) { ?>
                        <?php if($n<4) { ?>
                            <li <?php if($n==3) { ?>class="mr_0"<?php } ?>
>
                                <i><img class="fl" src="<?php echo Common::img($sarc['memberpic'],56,56);?>" alt="asdf" width="56" height="56" /></i>
                                <a class="fl" href="<?php echo $sarc['url'];?>" target="_blank"><img class="fl" src="<?php echo Common::img($sarc['litpic'],280,175);?>" alt="<?php echo $sarc['title'];?>" width="280" height="175" /></a>
                              <p class="tit"><a href="<?php echo $sarc['url'];?>" target="_blank"><?php echo $sarc['title'];?></a></p>
                              <p class="txt"><?php echo $sarc['description'];?></p>
                              <p class="msg">
                                <span class="name"><?php echo $sarc['nickname'];?></span>
                                <span class="time"><?php echo Common::mydate("Y-m-d",$sarc['modtime']);?></span>
                              </p>
                            </li>
                        <?php } ?>
                    <?php $n++;}unset($n); } ?>
              </ul>
              <ul class="bom_list">
                  <?php $n=1; if(is_array($seasonarc)) { foreach($seasonarc as $sarc) { ?>
                  <?php if($n>3) { ?>
                    <li <?php if(($n==5 || $n==7 || $n==9)) { ?>class="mr_0"<?php } ?>
>
                        <a class="fl" href="<?php echo $sarc['url'];?>" target="_blank"><img class="fl" src="<?php echo Common::img($sarc['litpic'],140,115);?>" alt="<?php echo $sarc['title'];?>" width="140" height="115" /></a>
                      <div class="box_t">
                        <a class="tit" href="<?php echo $sarc['url'];?>" target="_blank"><?php echo $sarc['title'];?></a>
                        <p class="txt"><?php echo $sarc['description'];?></p>
                        <p class="msg">
                            <span class="name"><img class="fl" src="<?php echo Common::img($sarc['memberpic'],26,26);?>" alt="asdf" width="26" height="26" /><?php echo $sarc['nickname'];?></span>
                            <span class="time"><?php echo Common::mydate("Y-m-d",$sarc['modtime']);?></span>
                        </p>
                      </div>
                    </li>
                  <?php } ?>
                  <?php $n++;}unset($n); } ?>
              </ul>
            </div>
          </div><!--本季热门-->
          
          <div class="dr_hot_box">
          <div class="dr_tit">
            <h3>达人攻略</h3>
              <span>看旅游达人分享经历</span>
              <p>
                  <?php $n=1; if(is_array($hotdest)) { foreach($hotdest as $h) { ?>
                    <a href="/<?php echo $h['pinyin'];?>/" target="_blank"><?php echo $h['kindname'];?></a>
                  <?php $n++;}unset($n); } ?>
                <a href="/destinations/" class="more">更多&gt;&gt;</a>
              </p>
            </div>
            <div class="dt_con">
            <ul id="list_contain">
              </ul>
            </div>
            <div  id="pageinfo" style="text-align: right">
            </div>
          </div><!--达人攻略-->
        
        </div>
        
      </div>
      
    </div>
  </div>
    <script type="text/html" id="tpl_notes">
        <ul class="st-cp-list">
            {{each list as value i}}
                <li>
                    <a class="fl" href="{{value.url}}" target="_blank"><img class="fl" src="{{value.litpic}}" alt="{{value.title}}" width="170" height="126"></a>
                    <div class="box_t">
                        <a class="tit" href="{{value.url}}">{{value.title}}</a>
                        <p class="txt">{{value.description}}</p>
                        <p class="msg">
                            <span class="name"><img class="fl" src="{{value.memberpic}}" width="26" height="26">{{value.nickname}}</span>
                            <span class="time">{{value.pubdate}}</span>
                        </p>
                    </div>
                    <div class="num">
                        <span>{{value.shownum}}</span>人<br>已阅读
                    </div>
                </li>
            {{/each}}
        </ul>
    </script>
    <?php echo Request::factory("pub/footer")->execute()->body(); ?>
    <?php echo Request::factory("pub/flink")->execute()->body(); ?>
<script src="/res/js/laypage/laypage.js"></script>
<script>
    $(function(){
        var pagesize = 6 //显示条数
        var total_count = <?php echo $total_notes;?>;
        var totalPageNumber = Math.ceil(total_count/pagesize);
        layPage(totalPageNumber,1);
    })
    function layPage(pagenum,currentpage){
        //分页
        var ajaxUrl = SITEURL+'notes/ajax_get_new_notes';
        laypage({
            cont: 'pageinfo', //页码显示容器。【如该容器为】：<div id="page1"></div>
            pages: pagenum, //通过后台拿到的总页数
            curr: currentpage, //初始化当前页
            next:false,
            skin:'#00a0e9',
            jump: function(e){ //触发分页后的回调
                $.getJSON(ajaxUrl, {curr: e.curr}, function(res){
                    //渲染
                    var view = $('#list_contain');
                    var licontent = template('tpl_notes',res);
                    view.html(licontent);
                });
            }
        });
    }
</script>
</body>
</html>
