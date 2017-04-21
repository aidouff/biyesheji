<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title><?php echo $searchtitle;?>-<?php echo $GLOBALS['cfg_webname'];?></title>
    <?php echo  Stourweb_View::template("pub/varname");  ?>
    <?php echo Common::css('car.css,base.css,extend.css');?>
    <?php echo Common::js('jquery.min.js,base.js,common.js');?>
</head>
<body>
<?php echo Request::factory("pub/header")->execute()->body(); ?>
  
  <div class="big">
  <div class="wm-1200">
    
    <div class="st-guide">
            <a href="<?php echo $cmsurl;?>"><?php echo $GLOBALS['cfg_indexname'];?></a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;<a href="<?php echo $cmsurl;?>cars/"><?php echo $channelname;?></a>
        </div><!--面包屑-->
    
      <div class="st-main-page">
      <div class="st-carlist-box">
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
                            <a href="<?php echo $cmsurl;?>cars/<?php echo $dest['pinyin'];?>/"><?php echo $dest['kindname'];?></a>
                            <?php $n++;}unset($n); } ?>
                            
                        </p>
                        <?php if(count($destlist)>10) { ?>
                        <em><b>展开</b><i></i></em>
                        <?php } ?>
                    </dd>
                </dl>
              <dl class="type">
                <dt>车型：</dt>
                <dd>
                <p>
                        <?php require_once ("C:/phpstudy/WWW/taglib/car.php");$car_tag = new Taglib_Car();if (method_exists($car_tag, 'kind_list')) {$data = $car_tag->kind_list(array('action'=>'kind_list','row'=>'10',));}?>
                            <?php $n=1; if(is_array($data)) { foreach($data as $kind) { ?>
                                <a href="<?php echo Model_Car::get_search_url($kind['id'],'carkindid',$param);?>" <?php if($param['carkindid']==$kind['id']) { ?>class="on"<?php } ?>
><?php echo $kind['title'];?></a>
                            <?php $n++;}unset($n); } ?>
                        
                  </p>
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
                            <a href="<?php echo Model_Car::get_search_url($attr['id'],'attrid',$param);?>" <?php if(Common::check_in_attr($param['attrid'],$attr['id'])!==false) { ?>class="on"<?php } ?>
><?php echo $attr['attrname'];?></a>
                            <?php $n++;}unset($n); } ?>
                            
                        </p>
                    </dd>
                </dl>
                <?php $n++;}unset($n); } ?>
                
            </div>
          </div><!--条件搜索-->
          <div class="st-carlist-con">
          <div class="st-sort-menu">
            <span class="sort-sum">
              <a href="javascript:;">综合排序</a>
                  <a href="javascript:;">价格
                      <?php if($param['sorttype']!=1 && $param['sorttype']!=2) { ?>
                      <i class="jg-default" data-url="<?php echo Model_Car::get_search_url(1,'sorttype',$param);?>"></i>
                      <?php } ?>
                      <?php if($param['sorttype']==1) { ?>
                      <i class="jg-up" data-url="<?php echo Model_Car::get_search_url(2,'sorttype',$param);?>"></i>
                      <?php } ?>
                      <?php if($param['sorttype']==2) { ?>
                      <i class="jg-down" data-url="<?php echo Model_Car::get_search_url(0,'sorttype',$param);?>"></i></a>
                    <?php } ?>
                <a href="javascript:;">销量
                    <?php if($param['sorttype']!=3) { ?>
                    <i class="xl-default" data-url="<?php echo Model_Car::get_search_url(3,'sorttype',$param);?>"></i>
                    <?php } ?>
                    <?php if($param['sorttype']==3) { ?>
                    <i class="xl-down" data-url="<?php echo Model_Car::get_search_url(0,'sorttype',$param);?>"></i>
                    <?php } ?>
                </a>
                <a href="javascript:;">推荐
                    <?php if($param['sorttype']!=4) { ?>
                    <i class="tj-default" data-url="<?php echo Model_Car::get_search_url(4,'sorttype',$param);?>"></i>
                    <?php } ?>
                    <?php if($param['sorttype']==4) { ?>
                    <i class="tj-down" data-url="<?php echo Model_Car::get_search_url(0,'sorttype',$param);?>"></i>
                    <?php } ?>
                </a>
              </span><!--排序-->
            </div>
            <div class="car-list-con">
            <?php if(!empty($list)) { ?>
                <?php $n=1; if(is_array($list)) { foreach($list as $c) { ?>
                  <div class="list-child">
                    <div class="hot-ico"></div>
                    <div class="lc-image-text">
                        <div class="pic"><a href="<?php echo $c['url'];?>" target="_blank"><img src="<?php echo Common::img($c['litpic']);?>" alt="<?php echo $c['title'];?>" /></a></div>
                      <div class="text">
                        <p class="bt">
                            <a href="<?php echo $c['url'];?>" target="_blank"><?php echo $c['title'];?>
                                <?php $n=1; if(is_array($c['iconlist'])) { foreach($c['iconlist'] as $icon) { ?>
                                    <img src="<?php echo $icon['litpic'];?>" />
                                <?php $n++;}unset($n); } ?>
                            </a></p>
                        <p class="attr">
                          <span>销量：<?php echo $c['sellnum'];?></span>
                          <span>满意度：<?php if($c['satisfyscore']) { ?><?php echo $c['satisfyscore'];?>%<?php } ?>
</span>
                          <span>推荐：<?php echo $c['recommendnum'];?></span>
                        </p>
                        <p class="js">推荐理由：<?php echo $c['sellpoint'];?></p>
                        <p class="ads">车型：<?php echo $c['kindname'];?></p>
                      </div>
                      <div class="lowest-jg">
                          <?php if($c['price']) { ?>
                            <span><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><b><?php echo $c['price'];?></b>起</span>
                          <?php } else { ?>
                            <span>电询</span>
                          <?php } ?>
                      </div>
                    </div>
                    <div class="car-typetable">
                        <table width="100%" border="0">
                            <?php require_once ("C:/phpstudy/WWW/taglib/car.php");$car_tag = new Taglib_Car();if (method_exists($car_tag, 'suit_type')) {$typelist = $car_tag->suit_type(array('action'=>'suit_type','row'=>'8','productid'=>$c['id'],'return'=>'typelist',));}?>
                            <?php $n=1; if(is_array($typelist)) { foreach($typelist as $type) { ?>
                            <tr>
                                <th width="240" height="40" scope="col"><span class="pl20"><?php echo $type['title'];?></span></th>
                                <th width="80" align="center" scope="col">用车日期</th>
                                <th width="80" scope="col">单位</th>
                                <th width="80" align="center" scope="col">优惠价</th>
                                <th width="100" scope="col">支付方式</th>
                                <th width="200" scope="col">&nbsp;</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                            <?php require_once ("C:/phpstudy/WWW/taglib/car.php");$car_tag = new Taglib_Car();if (method_exists($car_tag, 'suit')) {$suitlist = $car_tag->suit(array('action'=>'suit','row'=>'10','productid'=>$c['id'],'suittypeid'=>$type['id'],'return'=>'suitlist',));}?>
                            <?php $n=1; if(is_array($suitlist)) { foreach($suitlist as $suit) { ?>
                            <tr>
                                <td height="40"><strong class="type-tit"><?php echo $suit['title'];?></strong></td>
                                <td align="center"><span class="date" data-suitid="<?php echo $suit['id'];?>">选择日期</span></td>
                                <td align="center"><?php echo $suit['unit'];?></td>
                                <td align="center"><span class="price"><?php if(!empty($suit['price'])) { ?><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $suit['price'];?>起<?php } else { ?>电询<?php } ?>
</span></td>
                                <td>
                                    <?php if($suit['paytype']==1) { ?>
                                    <span class="fk-way">全款支付</span>
                                    <?php } else if($suit['paytype']==2) { ?>
                                    <span class="fk-way">定金支付</span>
                                    <?php } else if($suit['paytype']==3) { ?>
                                    <span class="fk-way">二次确认</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($suit['jifenbook']) { ?>
                                    <span class="s-jf"><?php echo $suit['jifenbook'];?>分<i></i></span>
                                    <?php } ?>
                                    <?php if($suit['jifencomment']) { ?>
                                    <span class="p-jf"><?php echo $suit['jifencomment'];?>分<i></i></span>
                                    <?php } ?>
                                    <?php if($suit['jifentprice']) { ?>
                                    <span class="d-jf"><?php echo $suit['jifentprice'];?>元<i></i></span>
                                    <?php } ?>
                                </td>
                                <td><a class="booking-btn" href="javascript:;" data-url="<?php echo $cmsurl;?>cars/show_<?php echo $c['aid'];?>.html" >预订</a></td>
                            </tr>
                            <tr style="display: none">
                                <td colspan="7">
                                    <div class="cartype-nr">
                                        <?php echo $suit['content'];?>
                                    </div>
                                </td>
                            </tr>
                            <?php $n++;}unset($n); } ?>
                            <?php $n++;}unset($n); } ?>
                        </table>
                    </div>
                  </div>
                <?php $n++;}unset($n); } ?>
                 <div class="main_mod_page clear">
                     <?php echo $pageinfo;?>
                  </div>
            <?php } else { ?>
                <div class="no-content">
                    <p><i></i>抱歉，没有找到符合条件的产品！<a href="/cars/all">查看全部产品</a></p>
                </div>
            <?php } ?>
            </div>
          </div>
        </div>
        <div class="st-sidebox">
            <?php require_once ("C:/phpstudy/WWW/taglib/right.php");$right_tag = new Taglib_Right();if (method_exists($right_tag, 'get')) {$data = $right_tag->get(array('action'=>'get','typeid'=>$typeid,'data'=>$templetdata,'pagename'=>'search',));}?>
        </div><!--边栏模块-->
      </div>
    
    </div>
<?php echo Request::factory("pub/footer")->execute()->body(); ?>
<?php echo Request::factory("pub/flink")->execute()->body(); ?>
<script>
    $(function(){
        //租车搜索条件去掉最后一条边框
        $('.line-search-tj').find('dl').last().addClass('bor_0')
        $(".line-search-tj dl dd em").toggle(function(){
            $(this).prev().children('.hide-list').show();
            $(this).children('b').text('收起');
            $(this).children('i').addClass('up')
        },function(){
            $(this).prev().children('.hide-list').hide();
            $(this).children('b').text('展开');
            $(this).children('i').removeClass('up')
        });
        //套餐点击
        $(".type-tit").click(function(){
            $(this).parents('tr').first().next().toggle();
        })
        //隐藏没有属性下级分类
        $(".type").each(function(i,obj){
            var len = $(obj).find('dd p a').length;
            if(len<1){
                $(obj).hide();
            }
        })
        //排序方式点击
        $('.sort-sum').find('a').click(function(){
            var url = $(this).find('i').attr('data-url');
            if(url==undefined){
                url = location.href;
            }
            window.location.href = url;
        })
        //删除已选
        $(".chooseitem").find('i').click(function(){
            var url = $(this).parent().attr('data-url');
            window.location.href = url;
        })
        //清空筛选条件
        $('.clearc').click(function(){
            var url = SITEURL+'cars/all/';
            window.location.href = url;
        })
        //预订
        $(".booking-btn").click(function(){
            var dataurl = $(this).attr('data-url');
            window.location.href = dataurl;
            //$(this).parents('tr').first().find('.date').trigger('click');
        })
    })
</script>
</body>
</html>
