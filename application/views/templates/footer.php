<footer>
    <!--<div class="div-top">-->
    <a href="#top" class="top">
        <img src="/static/images/header/h-f/returnTop.png" alt="回到顶部"/>
    </a>
    <!--</div>-->
    <div class="foot">
        <span class="line1"></span>
        <span class="line2"></span>
        <nav>
            <a href="<?php echo site_url("Lista/zlg")?>">招聘零工</a>
            <span class="vertical-line"></span>
            <a href="<?php echo site_url("home/contractads")?>">签约推广</a>
            <span class="vertical-line"></span>
             <?php
            if($_SESSION['username']){//检测用户是否登录,如登录进入零工宝，没登录跳转到登录页
            ?>
                <a href="<?php echo site_url("User/center")?>">零工宝</a>
            <?php
                }else{
            ?>
                <a href="<?php echo site_url("User/index")?>">
                    <span>零工宝</span>
                </a>
            <?php } ?>
            <span class="vertical-line"></span>
            <a href="<?php echo site_url('/Home/lgxc'); ?>">零工小参</a>
            <span class="vertical-line"></span>
          <?php if($_SESSION['username']){//判断用户是否登录，如登录跳转到我要评价页，如没登录跳转到登录页，登陆后跳转到评价页?>
            <a href="<?php echo site_url('/Home/evaluate') ?>">我要评价</a>
          <? }else{ ?>
            <a href="<?php echo site_url('/User/evallogin') ?>">我要评价</a>
          <?php } ?>
        </nav>
    </div>
    <div class="version">
        <a href="javascript:void(0);"> <img src="/static/images/footer/cpb.png" alt=""/></a>
        <a href="http://www.lg-zx.com"><img src="/static/images/footer/dnb.png" alt=""/></a>
            <a href="javascript:void(0);"><img src="/static/images/footer/wxb.png" alt=""/></a>
    </div>
    <p>Copyright ? 2016 lg-zx.com Corporation,</p>
    <p> All Rights Reserved 鲁ICP备16012134号-1 站长统计</p>
</footer>
</body>

</html>