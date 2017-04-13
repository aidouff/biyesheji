<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title><?php echo $searchtitle;?>-<?php echo $GLOBALS['cfg_webname'];?></title>
    <?php echo  Stourweb_View::template("pub/varname");  ?>
    <?php echo Common::css('photo.css,base.css,extend.css');?>
    <?php echo Common::js('jquery.min.js,base.js,common.js');?>
</head>
<body>
<?php echo Request::factory("pub/header")->execute()->body(); ?>
  
  
  
  <div class="big">
  <div class="wm-1200">
    <div class="st-guide">
        <a href="<?php echo $cmsurl;?>"><?php echo $GLOBALS['cfg_indexname'];?></a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;<a href="<?php echo $cmsurl;?>lines/"><?php echo $channelname;?></a>
        <?php $n=1; if(is_array($predest)) { foreach($predest as $pre) { ?>
        &gt;&nbsp;&nbsp;<a href="<?php echo $cmsurl;?>lines/<?php echo $pre['pinyin'];?>/"><?php echo $pre['kindname'];?></a>
        <?php $n++;}unset($n); } ?>
    </div><!--面包屑-->
      
      <div class="st-photolist-box">
        <div class="st-list-search">
          <div class="been-tj" <?php if(count($chooseitem)<1) { ?>style="display:none"<?php } ?>
>
            <strong>已选条件：</strong>
            <p>
                <?php $n=1; if(is_array($chooseitem)) { foreach($chooseitem as $item) { ?>
                <span class="chooseitem" data-url="<?php echo $item['url'];?>"><?php echo $item['itemname'];?><i></i></span>
                <?php $n++;}unset($n); } ?>
                <a href="javascript:;" class="clearc">清空筛选条件 </a>
            </p>
          </div>
          <div class="line-search-tj">
            <dl class="type">
              <dt>目的地：</dt>
              <dd>
                  <p>
                      <?php require_once ("C:/phpstudy/WWW/taglib/dest.php");$dest_tag = new Taglib_Dest();if (method_exists($dest_tag, 'query')) {$destlist = $dest_tag->query(array('action'=>'query','typeid'=>$typeid,'flag'=>'nextsame','row'=>'30','pid'=>$destid,'return'=>'destlist',));}?>
                      <?php $n=1; if(is_array($destlist)) { foreach($destlist as $dest) { ?>
                      <a href="<?php echo $cmsurl;?>photos/<?php echo $dest['pinyin'];?>/"><?php echo $dest['kindname'];?></a>
                      <?php $n++;}unset($n); } ?>
                      
                  </p>
                  <?php if(count($destlist)>10) { ?>
                  <em><b>展开</b><i></i></em>
                  <?php } ?>
              </dd>
            </dl>
              <!--属性组读取-->
              <?php require_once ("C:/phpstudy/WWW/taglib/attr.php");$attr_tag = new Taglib_Attr();if (method_exists($attr_tag, 'query')) {$grouplist = $attr_tag->query(array('action'=>'query','flag'=>'grouplist','typeid'=>$typeid,'return'=>'grouplist',));}?>
              <?php $n=1; if(is_array($grouplist)) { foreach($grouplist as $group) { ?>
               <dl class="type">
                  <dt><?php echo $group['attrname'];?>：</dt>
                  <dd>
                      <p>
                          <?php require_once ("C:/phpstudy/WWW/taglib/attr.php");$attr_tag = new Taglib_Attr();if (method_exists($attr_tag, 'query')) {$attrlist = $attr_tag->query(array('action'=>'query','flag'=>'childitem','typeid'=>$typeid,'groupid'=>$group['id'],'return'=>'attrlist',));}?>
                          <?php $n=1; if(is_array($attrlist)) { foreach($attrlist as $attr) { ?>
                          <a href="<?php echo Model_Photo::get_search_url($attr['id'],'attrid',$param);?>" <?php if(Common::check_in_attr($param['attrid'],$attr['id'])!==false) { ?>class="on"<?php } ?>
><?php echo $attr['attrname'];?></a>
                          <?php $n++;}unset($n); } ?>
                          
                      </p>
                  </dd>
              </dl>
              <?php $n++;}unset($n); } ?>
              
          </div>
        </div><!--条件搜索-->
        <div class="photolist-con">
         <?php if(empty($list)) { ?>
          <div class="no-content">
          <p><i></i>抱歉，没有找到符合条件的产品！<a href="<?php echo $cmsurl;?>photos/all">查看全部产品</a></p>
          </div>
         <?php } ?>
          <ul class="st-photolist">
           <?php $n=1; if(is_array($list)) { foreach($list as $p) { ?>
          <li <?php if($n%4==0) { ?>class="mr_0"<?php } ?>
>
            <div class="pic">
            <a href="<?php echo $p['url'];?>" target="_blank"><img src="<?php echo $p['litpic'];?>" alt="<?php echo $p['title'];?>" /></a>
                <div class="num">
                  <span class="zan-on"><?php echo $p['favorite'];?></span>
                <span class="pl"><?php echo $p['commentnum'];?></span>
                </div>
              </div>
              <div class="txt">
              <a href="<?php echo $p['url'];?>" target="_blank"><?php echo Common::cutstr_html($p['content'],40);?></a>
                <span>(<?php echo $p['photonum'];?>张)</span>
              </div>
            </li>
           <?php $n++;}unset($n); } ?>
          </ul>
          <div class="main_mod_page clear">
              <?php echo $pageinfo;?>
          </div><!--分页-->
        </div>
      </div><!--相册搜索列表-->
    
    </div>
  </div>
<script>
    $(function(){
        //搜索条件去掉最后一条边框
        $('.line-search-tj').find('dl').last().addClass('bor_0')
        $(".line-search-tj dl dd em").toggle(function(){
            $(this).prev().height('auto');
            $(this).children('b').text('收起');
            $(this).children('i').addClass('up')
        },function(){
            $(this).prev()().height('24px');
            $(this).children('b').text('展开');
            $(this).children('i').removeClass('up')
        });
        //排序方式点击
        $('.sort-sum').find('a').click(function(){
            var url = $(this).find('i').attr('data-url');
            window.location.href = url;
        })
        //删除已选
        $(".chooseitem").find('i').click(function(){
            var url = $(this).parent().attr('data-url');
            window.location.href = url;
        })
        //清空筛选条件
        $('.clearc').click(function(){
            var url = SITEURL+'photos/all/';
            window.location.href = url;
        })
        //隐藏没有属性下级分类
        $(".type").each(function(i,obj){
            var len = $(obj).find('dd p a').length;
            if(len<1){
                $(obj).hide();
            }
        })
    })
</script>
<?php echo Request::factory("pub/footer")->execute()->body(); ?>
<?php echo Request::factory("pub/flink")->execute()->body(); ?>
</body>
</html>
