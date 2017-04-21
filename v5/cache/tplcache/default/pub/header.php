<?php echo Common::css('header.css');?>
<?php if($indexpage) { ?>
<?php require_once ("C:/phpstudy/WWW/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$data = $ad_tag->getad(array('action'=>'getad','name'=>'HeaderAd','pc'=>'1','row'=>'1',));}?>
    <?php if(!empty($data)) { ?>
    <div class="top-column-banner">
        <div class="wm-1200"><i class="top-closed"></i></div>
        <a href="<?php echo $data['adlink'];?>"><img src="<?php echo Common::img($data['adsrc']);?>" title="<?php echo $data['adname'];?>"></a>
    </div><!--顶部广告-->
    <?php } ?>
    <script>
        $(function(){
            $('.top-closed').click(function(){
                $(".top-column-banner").slideUp();
            })
        })
    </script>
<?php } ?>
<div class="web-top">
    <div class="wm-1200">
        <div class="notice-txt"><?php echo $GLOBALS['cfg_gonggao'];?></div>
        <div class="scroll-order">
            <ul>
                <?php require_once ("C:/phpstudy/WWW/taglib/comment.php");$comment_tag = new Taglib_Comment();if (method_exists($comment_tag, 'query')) {$data = $comment_tag->query(array('action'=>'query','flag'=>'all','row'=>'3',));}?>
                  <?php $n++;}unset($n); } ?>
                
            </ul>
        </div>
        <div class="top-login">
            <span id="loginstatus">
            </span>
            <a class="dd" href="<?php echo $cmsurl;?>search/order"><i></i>订单查询</a>
            <dl class="dh">
                <dt><i></i>网站导航</dt>
                <dd>
                    <?php require_once ("C:/phpstudy/WWW/taglib/channel.php");$channel_tag = new Taglib_Channel();if (method_exists($channel_tag, 'pc')) {$data = $channel_tag->pc(array('action'=>'pc','row'=>'20',));}?>
                      <?php $n=1; if(is_array($data)) { foreach($data as $row) { ?>
                       <a href="<?php echo $row['url'];?>"><?php echo $row['title'];?></a>
                      <?php $n++;}unset($n); } ?>
                    
                </dd>
            </dl>
        </div>
    </div>
</div><!--顶部-->
<div class="st-header">
    <div class="wm-1200">
        <div class="st-logo">
            <?php if(!empty($GLOBALS['cfg_logo'])) { ?>
            <a href="<?php echo $GLOBALS['cfg_logourl'];?>"><img src="<?php echo $GLOBALS['cfg_logo'];?>" alt="<?php echo $GLOBALS['cfg_logotitle'];?>" /></a>
            <?php } ?>
        </div>
        <div class="st-top-search">
            <div class="st-search-down">
                <strong id="typename"><i></i></strong>
                <ul class="st-down-select searchmodel">
                    <li data-id="0">全部</li>
                    <?php $n=1; if(is_array($searchmodel)) { foreach($searchmodel as $m) { ?>
                        <li data-id="<?php echo $m['id'];?>" data-url="<?php echo $m['url'];?>"><?php echo $m['modulename'];?></li>
                    <?php $n++;}unset($n); } ?>
                </ul>
            </div>
            <input type="text" class="st-txt searchkeyword" placeholder="输入目的地、酒店、攻略" />
        <span>
            <?php require_once ("C:/phpstudy/WWW/taglib/hotsearch.php");$hotsearch_tag = new Taglib_Hotsearch();if (method_exists($hotsearch_tag, 'hot')) {$data = $hotsearch_tag->hot(array('action'=>'hot','row'=>'3',));}?>
             <?php $n=1; if(is_array($data)) { foreach($data as $row) { ?>
          <a href="<?php echo $row['url'];?>" target="_blank"><?php echo $row['title'];?></a>
             <?php $n++;}unset($n); } ?>
            
        </span>
            <input type="button" value="搜索" class="st-btn" />
        </div>
        <div class="st-link-way">
            <strong>客服电话：</strong>
            <em><?php echo $GLOBALS['cfg_phone'];?></em>
        </div>
    </div>
</div><!--header-->
<div class="st-nav">
    <div class="wm-1200">
        <?php echo  Stourweb_View::template("pub/usernav");  ?>
        <div class="st-menu">
            <a href="<?php echo $cmsurl;?>"><?php echo $GLOBALS['cfg_indexname'];?><s></s></a>
            <?php require_once ("C:/phpstudy/WWW/taglib/channel.php");$channel_tag = new Taglib_Channel();if (method_exists($channel_tag, 'pc')) {$data = $channel_tag->pc(array('action'=>'pc','row'=>'20',));}?>
             <?php $n=1; if(is_array($data)) { foreach($data as $row) { ?>
              <a href="<?php echo $row['url'];?>"><?php echo $row['title'];?>
                 <?php if($row['kind']==1) { ?>
                  <i class="st-new-ico"></i><s></s>
                 <?php } else if($row['kind']==2) { ?>
                  <i class="st-hot-ico"></i><s></s>
                 <?php } else if($row['kind']==3) { ?>
                  <i class="st-jing-ico"></i><s></s>
                 <?php } else if($row['kind']==4) { ?>
                  <i class="st-jian-ico"></i><s></s>
                 <?php } ?>
              </a>
             <?php $n++;}unset($n); } ?>
            
        </div>
    </div>
</div><!--主导航-->
<?php echo Common::js('SuperSlide.min.js');?>
<script>
    var SITEURL = "<?php echo $cmsurl;?>";
    $(function(){
        $(".searchmodel li").click(function(){
            var typeid = $(this).attr('data-id');
            var durl = $(this).attr('data-url');
            var typename = $(this).text();
            $("#typename").html(typename+'<i></i>');
            $("#typename").attr('data-id',typeid);
            $("#typename").attr('data-url',durl);
        })
        $(".searchmodel li:first").trigger('click');
        //search
        $('.st-btn').click(function(){
            var keyword = $('.searchkeyword').val();
            if(keyword == ''){
                $('.searchkeyword').focus();
                return false;
            }
            var typeid = $("#typename").attr('data-id');
            var durl = $("#typename").attr('data-url');
            if(typeid==0 || typeid==8){
                var url = SITEURL+'search/cloudsearch?keyword='+encodeURIComponent(keyword)+"&typeid="+typeid;
            }else{
                var url = "<?php echo $GLOBALS['cfg_basehost'];?>"+durl+'all?keyword='+encodeURIComponent(keyword);
            }
            location.href = url;
        })
        //导航的选中状态
        $(".st-menu a").each(function(){
            var url= window.location.href;
            url=url.replace('index.php','');
            url=url.replace('index.html','');
            var ulink=$(this).attr("href");
            if(url==ulink)
            {
                $(this).addClass('active');
            }
        })
        //登陆状态
        $.ajax({
            type:"POST",
            url:SITEURL+"member/login/ajax_is_login",
            dataType:'json',
            success:function(data){
                if(data.status){
                    $txt = '<a class="dl" style="padding:0" href="javascript:;">你好,</a>';
                    $txt+= '<a class="dl" href="<?php echo $cmsurl;?>member/">'+data.user.nickname+'</a>';
                    $txt+= '<a class="dl" href="<?php echo $cmsurl;?>member/login/loginout">退出</a>';
                    //$txt+= '<a class="dl" href="<?php echo $cmsurl;?>member">个人中心</a>';
                }else{
                    $txt = '<a class="dl" href="<?php echo $cmsurl;?>member/login">登录</a>';
                    $txt+= '<a class="zc" href="<?php echo $cmsurl;?>member/register">免费注册</a>';
                }
                $("#loginstatus").html($txt);
            }
        })
    })
</script>