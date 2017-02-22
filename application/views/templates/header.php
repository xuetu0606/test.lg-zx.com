<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes"/>
    <title><?php echo $title; ?> - 零工在线</title>
    <link rel="stylesheet" href="/static/css/head-foot.css"/>
    <link rel="stylesheet" href="/static/css/list.category.css"/>
    <link rel="stylesheet" href="/static/css/font-awesome.css"/>
	<script src="/static/js/jquery.js"></script>
	<script src="/static/js/head-foot.js"></script>
	<script src="/static/js/category.js"></script>
  <script src="/static/js/section.js"></script>
</head>
<body>
<header id="top">
   <div class="header-top">
      <div class="logo-address">
          <a href="/"><img src="/static/images/header/logo.png" alt="零工在线" class="logo"/></a>
          <a href="http://m.lg-zx.com"><span><?php echo $cityname?$cityname:'青岛'; ?></span> <span class="fa fa-angle-down"></span></a>
      </div>
       <div class="user">
        <div class="mine">
          <?php
            if($_SESSION['username']){//检测用户是否登录,如登录进入零工宝，没登录跳转到登录页
          ?>
            <a href="<?php echo site_url("User/center")?>">
                <span>我的</span>
            </a>
          <?php
            }else{
          ?>
            <a href="<?php echo site_url("User/index")?>">
                <span>我的</span>
            </a>
          <?php } ?>
        </div>
           <span class="line"></span>
           <div class="publish">
               <a href="<?php echo site_url('user/publish') ?>">
                   <span>发布</span>
               </a>
           </div>
           <div class="sign">
               <a href="<?php echo site_url("Home/sign")?>">
                   <img src="/static/images/header/h-f/h.png" alt="签到"/>
               </a>
           </div>

       </div>
   </div>
</header>
