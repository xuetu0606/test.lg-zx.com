<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/static/css/common.css"/>
    <link rel="stylesheet" href="/static/css/head-foot.css"/>
    <link rel="stylesheet" href="/static/css/help.css"/>
    <title>零工小参</title>
</head>
<body>
<section>
    <div class="head">
        <img src="/static/images/LOGOa.png" alt=""/>
        <span>零工小参</span>
    </div>
<p class="line"></p>
<div class="wenti">
    <ul>
        <li><a href="<?php echo site_url('help/cjwt'); ?>">常见问题</a></li>
        <li><a href="<?php echo site_url('help/gdbz'); ?>">更多帮助</a></li>
        <li><a href="<?php echo site_url('help/yjfk'); ?>">意见反馈</a></li>
    </ul>
</div>
</section>
<footer>
    <div class="main">
        <ul>
            <li><a href="#">法律声明 |</a></li>
            <li><a href="#">零工宝 |</a></li>
            <li><a href="<?php echo site_url('help/index'); ?>">零工小参 |</a></li>
            <li><a href="#">招贤纳士 |</a></li>
            <li><a href="#">关注微博</a></li>
        </ul>
        <p>Copyright © 2016 lg-zx.com Corporation, All Rights Reserved 鲁ICP备16012134号-1 站长统计</p>
    </div>
</footer>
</body>
<style>
    div.wenti{
        padding: 100px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    section div.wenti ul{
        list-style-type: disc;
    }
section div.wenti ul li{
    display: list-item;
    list-style-type: disc;
    line-height: 40px;
}
    section div.wenti ul li a{
        font-size: 18px;
    }
</style>
</html>