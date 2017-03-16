<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>会员购买-公司</title>
    <link rel="stylesheet" href="/static/css/common.css"/>
    <link rel="stylesheet" href="/static/css/head-foot.css"/>
    <link rel="stylesheet" href="/static/css/workInfor.css"/>
    <link rel="stylesheet" href="/static/css/form.css"/>
    <link rel="stylesheet" href="/static/css/xiaoye.css"/>
</head>
<body>
<header>
    <div class="main">
        <div class="city">
            <span class="stress">青岛</span>
            <a href="切换城市.html">[切换城市]</a>
        </div>
        <div class="fr">
            <ul>
                <li><a href="#">注册</a></li>
                <li><a href="#">登录</a></li>
                <li class="lgbxl"><a href="#">零工宝</a><img src="/static/images/xiala.png" alt=""/>

                </li>
                <li class="stress wxb">微信版</li>
                <li><a href="#" class="stress">手机版</a></li>
                <li><a href="#">帮助</a></li>
            </ul>
            <div class="lgb">
                <a href="#">零工宝<img src="/static/images/xiala.png" alt="" /></a>
                <a href="#" class="lgba">我的发布</a>
                <a href="#" class="lgba">我的收藏</a>
                <a href="#" class="lgba">我的资料</a>
            </div>
            <div class="wx">
                <img src="/static/images/head-foot/weixin.png" alt=""/>
            </div>
        </div>

    </div>

</header>
<div class="full">
    <div class="main">
        <img src="/static/images/LOGOa.png" alt="" class="logo"/>
    </div>
</div>
<section>
    <div class="position">
        <span>青岛零工在线</span>
        <span> > </span>
        <span><?php echo $title; ?></span>
    </div>
    <div class="hycz-company">
        <div class="title">
            <div class="left">
                <span class="jin">VIP</span> 会员
                <span class="type">类型：<?php echo $is_co==1?'公司':'个人'; ?></span>
            </span>
            </div>
            <div class="right">
                <span>零工币余额：<span class="stress"><?php echo $user['credit1']?$user['credit1']:'0'; ?></span>个</span>
                <a href="recharge">购买</a>
            </div>
        </div>
        <div class="zhu">
            <?php echo form_open('user/buyvip','name="buyvip"'); ?>
            <input type="hidden" name="vipid" id="vipid">
            <input type="hidden" name="credit" id="credit">
            <div class="VIP">
                <?php
                if($is_co) {
                    ?>

                    <p><span class="jin">VIP</span>会员</p>
                    <div class="demo">
                        <span class="package" data-id="4">月度 <span class="blue">30</span>零工币</span>
                        <span class="money">60元</span>
                        <span class="youhui">优惠</span>
                        <p class="hui txt">购买日起1个月内，免费发布、刷新信息</p>
                    </div>
                    <div class="demo">
                        <span class="package" data-id="5">季度 <span class="blue">80</span>零工币</span>
                        <span class="money">240元</span>
                        <span class="youhui">特惠</span>
                        <p class="hui txt">购买日起3个月内，免费发布、刷新信息</p>
                    </div>
                    <div class="demo">
                        <span class="package" data-id="6">年度 <span class="blue">300</span>零工币</span>
                        <span class="money">1200元</span>
                        <span class="youhui">超值</span>
                        <p class="hui txt">购买日起1年内，免费发布、刷新信息</p>
                    </div>

                    <?php
                }else {
                    ?>

                    <p><span class="jin">VIP</span>会员</p>
                    <div class="demo">
                        <span class="package" data-id="1">月度 <span class="blue">15</span>零工币</span>
                        <span class="money">30元</span>
                        <span class="youhui">优惠</span>
                        <p class="hui txt">购买日起1个月内，免费发布、刷新信息</p>
                    </div>
                    <div class="demo">
                        <span class="package" data-id="2">季度 <span class="blue">30</span>零工币</span>
                        <span class="money">90元</span>
                        <span class="youhui">特惠</span>
                        <p class="hui txt">购买日起3个月内，免费发布、刷新信息</p>
                    </div>
                    <div class="demo">
                        <span class="package" data-id="3">年度 <span class="blue">100</span>零工币</span>
                        <span class="money">400元</span>
                        <span class="youhui">超值</span>
                        <p class="hui txt">购买日起1年内，免费发布、刷新信息</p>
                    </div>

                    <?php
                }
                ?>
                <div class="error" style=" color: red"><?php echo $error; ?></div>
                <div class="demo">
                    <input class="btn btn-primary" type="submit" value="购买"/>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>
<footer>
    <div class="main">
        <ul>
            <li><a href="#">法律声明 |</a></li>
            <li><a href="#">零工宝 |</a></li>
            <li><a href="#">零工小参 |</a></li>
            <li><a href="#">招贤纳士 |</a></li>
            <li><a href="#">关注微博</a></li>
        </ul>
        <p>Copyright © 2016 lg-zx.com Corporation, All Rights Reserved 鲁ICP备16012134号-1 站长统计</p>
    </div>
</footer>
</body>
<script src="/staticjs/jquery.js"></script>
<script src="/staticjs/head-foot.js"></script>
<script src="/staticjs/xiaoye.js"></script>
<script>
    $(function(){
        $('.package').click(function(){

            $(this).parent().children('.package').addClass('active');
            $('#vipid').val($(this).attr('data-id'));
            $('#credit').val($(this).children('span').html());
            $(this).parent().siblings().children('.package').removeClass('active');
        })
    })

</script>
</html>