<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>会员中心-<?php echo $webname;?></title>
    <?php echo  Stourweb_View::template("pub/varname");  ?>
    <?php echo Common::css('user.css,base.css,extend.css');?>
    <?php echo Common::js('jquery.min.js,base.js,common.js');?>
</head>
<body>
<?php echo Request::factory("pub/header")->execute()->body(); ?>
<div class="big">
<div class="wm-1200">
<div class="st-guide">
    <a href="<?php echo $cmsurl;?>">首页</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;会员中心
</div><!--面包屑-->
<div class="st-main-page">
<?php echo  Stourweb_View::template("member/left_menu");  ?>
<div class="user-order-box">
    <div class="user-home-box">
        <?php if((empty($info['email']) || empty($info['mobile'])||empty($info['nickname'])||empty($info['truename'])||empty($info['cardid'])||empty($info['address']))) { ?>
        <div class="hint-msg-box">
            <span class="close-btn">关闭</span>
            <p class="hint-txt">
                <?php if(empty($info['email']) || empty($info['mobile'])) { ?>
                  温馨提示：请完善手机/邮箱信息，避免错过产品预定联系等重要通知!
                <?php } else if((empty($info['nickname'])||empty($info['truename'])||empty($info['cardid'])||empty($info['address']))) { ?>
                  温馨提醒：请完善个人资料信息，体验更便捷的产品预定流程！
                <?php } ?>
            </p>
        </div>
        <script>
            $(function(){
                $('.close-btn').click(function(){
                    $('.hint-msg-box').hide(500);
                })
            })
        </script>
        <?php } ?>
        <div class="user-home-msg">
            <div class="user-msg-con">
                <div class="user-pic"><a href="/member/index/userinfo"><img src="<?php echo $info['litpic'];?>" width="90" height="90" /></a></div>
                <div class="user-txt">
                    <p class="name"><?php echo $info['nickname'];?></p>
                    <p class="mail-box">登录邮箱：
                        <?php if($info['email']) { ?><?php echo $info['email'];?><?php } else { ?>未绑定<a href="<?php echo $cmsurl;?>member/index/modify_email?change=0">立即绑定</a><?php } ?>
</p>
                    <p class="phone-num">手机号码：
                        <?php if($info['mobile']) { ?><?php echo $info['mobile'];?><?php } else { ?>未绑定<a href="<?php echo $cmsurl;?>member/index/modify_phone?change=0">立即绑定</a><?php } ?>
</p>
                </div>
            </div><!-- 账号信息 -->
            <div class="user-msg-tj">
                <ul>
                    <li class="my-jf" data-url="/member/index/jifen">
                        <em></em>
                        <span>我的积分</span>
                        <strong><?php echo $info['jifen'];?></strong>
                    </li>
                    <li class="un-fk" data-url="/member/order/all-unpay">
                        <em></em>
                        <span>未付款</span>
                        <strong><?php echo $info['unpay'];?></strong>
                    </li>
                    <li class="un-dp" data-url="/member/order/all-uncomment">
                        <em></em>
                        <span>未点评</span>
                        <strong><?php echo $info['uncomment'];?></strong>
                    </li>
                    <li class="my-zx" data-url="/member/index/myquestion">
                        <em></em>
                        <span>我的咨询</span>
                        <strong><?php echo $info['question'];?></strong>
                    </li>
                </ul>
            </div><!-- 订单信息 -->
        </div>
        <div class="user-home-order">
            <div class="order-tit">最新订单</div>
            <?php if(!empty($neworder)) { ?>
            <div class="order-list">
                <table width="100%" border="0">
                    <tr>
                        <th width="55%" height="38" scope="col">订单信息</th>
                        <th width="15%" height="38" scope="col">订单金额</th>
                        <th width="15%" height="38" scope="col">订单状态</th>
                        <th width="15%" height="38" scope="col">订单操作</th>
                    </tr>
                    <?php $n=1; if(is_array($neworder)) { foreach($neworder as $order) { ?>
                    <tr>
                        <td height="114">
                            <div class="con">
                                <dl>
                                    <dt><a href="<?php echo $order['producturl'];?>" target="_blank"><img src="<?php echo $order['litpic'];?>" alt="<?php echo $order['title'];?>" /></a></dt>
                                    <dd>
                                        <a class="tit" href="<?php echo $order['producturl'];?>" target="_blank"><?php echo $order['productname'];?></a>
                                        <p>订单编号：<?php echo $order['ordersn'];?></p>
                                        <p>下单时间：<?php echo Common::mydate('Y-m-d H:i:s',$order['addtime']);?></p>
                                    </dd>
                                </dl>
                            </div>
                        </td>
                        <td align="center"><span class="price"><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $order['price'];?></span></td>
                        <td align="center"><span class="dfk"><?php echo $order['status'];?></span></td>
                        <td align="center">
                            <?php if($order['status']=='等待付款') { ?>
                            <a class="now-fk" href="<?php echo $cmsurl;?>member/index/pay?ordersn=<?php echo $order['ordersn'];?>">立即付款</a>
                            <a class="cancel_order now-dp" style="background:#ccc" href="javascript:;" data-orderid="<?php echo $order['id'];?>">取消</a>
                            <?php } else if($order['status']=='交易完成' && $order['ispinlun']!=1) { ?>
                             <a class="now-dp" href="<?php echo $cmsurl;?>member/order/pinlun?ordersn=<?php echo $order['ordersn'];?>">立即点评</a>
                            <?php } ?>
                            <a class="order-ck" href="<?php echo $cmsurl;?>member/order/view?ordersn=<?php echo $order['ordersn'];?>">查看订单</a>
                        </td>
                    </tr>
                    <?php $n++;}unset($n); } ?>
                </table>
            </div>
            <?php } else { ?>
                <div class="order-no-have"><span></span><p>您的订单空空如也，<a href="/">去逛逛</a>去哪儿玩吧！</p></div>
            <?php } ?>
        </div><!-- 我的订单 -->
        <div class="guess-you-like">
            <div class="like-tit">猜你喜欢的</div>
            <div class="like-list">
                <ul>
                     <?php require_once ("C:/phpstudy/WWW/taglib/line.php");$line_tag = new Taglib_Line();if (method_exists($line_tag, 'query')) {$recline = $line_tag->query(array('action'=>'query','flag'=>'order','row'=>'4','return'=>'recline',));}?>
                        <?php $n=1; if(is_array($recline)) { foreach($recline as $line) { ?>
                        <li <?php if($n%4==0) { ?>class="mr_0"<?php } ?>
>
                            <div class="pic"><a href="<?php echo $line['url'];?>" target="_blank"><img src="<?php echo Common::img($line['litpic']);?>" alt="<?php echo $line['title'];?>" /></a></div>
                            <div class="con">
                                <a href="<?php echo $line['url'];?>" target="_blank"><?php echo $line['title'];?></a>
                                <p>
                                    <?php if(!empty($line['sellprice'])) { ?>
                                    <del>市场价：<i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $line['sellprice'];?></del>
                                    <?php } ?>
                                    <?php if(!empty($line['price'])) { ?>
                                        <span><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><b><?php echo $line['price'];?></b>元起</span>
                                    <?php } else { ?>
                                        <span>电询</span>
                                    <?php } ?>
                                </p>
                            </div>
                        </li>
                       <?php $n++;}unset($n); } ?>
                </ul>
            </div>
        </div><!-- 猜你喜欢的 -->
    </div>
</div><!--会员首页-->
</div>
</div>
</div>
<?php echo Common::js('layer/layer.js');?>
<?php echo Request::factory("pub/footer")->execute()->body(); ?>
<script>
    $(function(){
        $("#nav_index").addClass('on');
        $(".user-msg-tj li").click(function(){
            var url = $(this).attr('data-url');
            if(url!=''){
                location.href = url;
            }
        })
    })
</script>
<?php echo  Stourweb_View::template("member/order/jsevent");  ?>
</body>
</html>
