<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{$info['productname']}-{$GLOBALS['cfg_webname']}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    {php echo Common::css('amazeui.css,style.css,extend.css');}
    {php echo Common::js('jquery.min.js,amazeui.js,template.js,layer/layer.m.js');}
</head>

<body>
{request "pub/header/typeid/$typeid/isorder/1"}

<section>

    <div class="mid_content">
        <div class="confirm_order_msg">
            <dl>
                <dt><img src="{Common::img($info['litpic'])}"></dt>
                <dd>
                    <span>{$info['productname']}</span>
                    <strong>¥<b>{$info['price']}</b>起</strong>
                </dd>
            </dl>
            <ul>
                {if !empty($info['subname'])}
                <li><span>价格类型：</span>{$info['subname']}</li>
                {/if}
                <li><span>预订电话：</span>{$info['linktel']}</li>
                <li><span>预定人数：</span>{$info['num']}</li>
            </ul>
            <ul>
                <li><span>订单编号：</span>{$info['ordersn']}</li>
                <li><span>订单时间：</span>{date('Y-m-d',$info['addtime'])}</li>
                <li><span>订单状态：</span><em class="no">{if $info['status']==5}交易成功{elseif $info['status']==4}已退款{elseif $info['status']==3}取消订单{elseif $info['status']==2}付款成功{elseif $info['status']==1}待付款{else}等待处理{/if}</em></li>
            </ul>
            {if !empty($info['eticketno'])}
            <ul>

                <style>
                    /*消费码*/
                    .consume-box{
                        clear:both;
                        }
                    .consume-box .consume-num{
                        color:#333;
                        font-size:14px}
                    .consume-box .consume-num span{
                        color:#999}
                    .consume-box .consume-pic{
                        margin-top:20px}
                    .consume-box .consume-pic img{
                        /*width:180px;
                        height:180px;
                        padding:15px;*/
                        border-radius:10px;
                        border:1px solid #dcdcdc}

                </style>
                <div class="consume-box">
                    <div class="consume-num">短信消费码：<span>{$info['eticketno']}</span></div>
                    <div class="consume-pic"><img src="{$GLOBALS['cfg_basehost']}/qrcode.php?data={$info['eticketno']}&size=7"></div>
                </div>
            </ul>
            {/if}
            <div class="total">总额：<span><i class="currency_sy">{Currency_Tool::symbol()}</i>{$info['total']}</span></div>


        </div>
        {if $info['ispinlun']}
        <div class="dp_con_box">
            <h3 class="tit">我的点评</h3>
            <ul class="dp_list">
                <li>
                    <dl>
                        <dt>
                            <span class="name"><img src="{$member['litpic']}">{$member['nickname']}</span>
                            <span class="myd">满意度：<b>{$comment['score']}</b></span>
                        </dt>
                        <dd>{$comment['content']}</dd>
                    </dl>
                </li>
            </ul>
        </div>
        {/if}
    </div>
</section>


<div class="bom_link_box">
    <div class="bom_fixed">
        {if $info['status']==1}
        <a class="on" href="{$info['payurl']}">付款</a>
        {/if}
        {if empty($info['ispinlun']) && $info['status']==5}
            <a class="dp" href="{$cmsurl}member/comment/index?id={$info['id']}">立即点评</a>
        {/if}
    </div>
</div>


</body>
</html>
