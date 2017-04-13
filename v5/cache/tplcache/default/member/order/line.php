<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title> <?php if($ordertype=='all') { ?>全部线路订单<?php } else if($ordertype=='unpay') { ?>未付款线路订单<?php } else { ?>未点评线路订单<?php } ?>
-<?php echo $webname;?></title>
    <?php echo Common::css('user.css,base.css,extend.css');?>
    <?php echo Common::js('jquery.min.js,base.js,common.js');?>
</head>
<body>
<?php echo Request::factory("pub/header")->execute()->body(); ?>
<div class="big">
    <div class="wm-1200">
        <div class="st-guide">
            <a href="<?php echo $cmsurl;?>">首页</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;<?php if($ordertype=='all') { ?>全部订单<?php } else if($ordertype=='unpay') { ?>未付款订单<?php } else { ?>未点评订单<?php } ?>
        </div><!--面包屑-->
        <div class="st-main-page">
            <?php echo  Stourweb_View::template("member/left_menu");  ?>
            <div class="user-order-box">
                <div class="user-home-box">
                    <div class="tabnav">
                        <span <?php if($ordertype=='all') { ?>class="on"<?php } ?>
 data-type="all">全部订单</span>
                        <span <?php if($ordertype=='unpay') { ?>class="on"<?php } ?>
 data-type="unpay">未付款订单</span>
                        <span <?php if($ordertype=='uncomment') { ?>class="on"<?php } ?>
 data-type="uncomment">未点评订单</span>
                    </div><!-- 订单切换 -->
                    <div class="user-home-order">
                        <?php if(!empty($list)) { ?>
                        <div class="order-list">
                            <table width="100%" border="0">
                                <tr>
                                    <th width="52%" height="38" bgcolor="#fbfbfb" scope="col">订单信息</th>
                                    <th width="10%" height="38" bgcolor="#fbfbfb" scope="col">出发日期</th>
                                    <th width="6%" height="38" bgcolor="#fbfbfb" scope="col">人数</th>
                                    <th width="8%" height="38" bgcolor="#fbfbfb" scope="col">订单金额</th>
                                    <th width="12%" height="38" bgcolor="#fbfbfb" scope="col">订单状态</th>
                                    <th width="12%" height="38" bgcolor="#fbfbfb" scope="col">订单操作</th>
                                </tr>
                                <?php $n=1; if(is_array($list)) { foreach($list as $row) { ?>
                                <tr>
                                    <td height="114">
                                        <div class="con">
                                            <dl>
                                                <dt><a href="<?php echo $row['producturl'];?>" target="_blank"><img src="<?php echo $row['litpic'];?>" alt="<?php echo $row['productname'];?>" /></a></dt>
                                                <dd>
                                                    <a class="tit" href="<?php echo $row['producturl'];?>" target="_blank"><?php echo $row['productname'];?></a>
                                                    <p>订单编号：<?php echo $row['ordersn'];?></p>
                                                    <p>下单时间：<?php echo Common::mydate('Y-m-d H:i:s',$row['addtime']);?></p>
                                                </dd>
                                            </dl>
                                        </div>
                                    </td>
                                    <td align="center"><span class="attr"><?php echo $row['usedate'];?></span></td>
                                    <td align="center"><span class="attr"><?php echo $row['dingnum'];?></span></td>
                                    <td align="center"><span class="price"><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><?php echo $row['totalprice'];?></span></td>
                                    <td align="center"><span class="dfk"><?php echo $row['status'];?></span></td>
                                    <td align="center">
                                        <?php if($row['status']=='等待付款') { ?>
                                        <a class="now-fk" href="<?php echo $cmsurl;?>member/index/pay?ordersn=<?php echo $row['ordersn'];?>">立即付款</a>
                                        <a class="cancel_order now-dp" style="background:#ccc" href="javascript:;" data-orderid="<?php echo $row['id'];?>">取消</a>
                                        <?php } else if($ordertype=='unpay') { ?>
                                        <a class="now-fk" href="<?php echo $cmsurl;?>member/index/pay?ordersn=<?php echo $row['ordersn'];?>">立即付款</a>
                                        <a class="cancel_order now-dp" style="background:#ccc" href="javascript:;" data-orderid="<?php echo $row['id'];?>">取消</a>
                                        <?php } else if($ordertype=='uncomment') { ?>
                                        <a class="now-dp" href="<?php echo $cmsurl;?>member/order/pinlun?ordersn=<?php echo $row['ordersn'];?>">立即点评</a>
                                        <?php } ?>
                                        <a class="order-ck" href="<?php echo $cmsurl;?>member/order/view?ordersn=<?php echo $row['ordersn'];?>">查看订单</a>
                                    </td>
                                </tr>
                                <?php $n++;}unset($n); } ?>
                            </table>
                            <div class="main_mod_page clear">
                                <?php echo $pageinfo;?>
                            </div><!-- 翻页 -->
                        </div>
                        <?php } else { ?>
                        <div class="order-no-have"><span></span><p>没有查到相关订单信息，<a href="/" target="_blank">去逛逛</a>去哪儿玩吧！</p></div>
                        <?php } ?>
                    </div><!-- 我的订单 -->
                </div>
            </div><!--所有订单-->
        </div>
    </div>
</div>
<?php echo Common::js('layer/layer.js');?>
<?php echo Request::factory("pub/footer")->execute()->body(); ?>
<script>
    $(function(){
        //导航选中
        $('#nav_lineorder').addClass('on');
        //订单类型切换
        $(".tabnav span").click(function(){
            var orderType = $(this).attr('data-type');
            var url = SITEURL+'member/order/line-'+orderType;
            window.location.href = url;
        })
    })
</script>
<?php echo  Stourweb_View::template("member/order/jsevent");  ?>
</body>
</html>
