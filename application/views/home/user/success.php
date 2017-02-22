<link rel="stylesheet" href="/static/css/tpls/reset.css"/>
<link rel="stylesheet" href="/static/css/tpls/register.css"/>

<section>
    <p class="userRegister" style="color: #000;">用户注册</p>
    <div class="reset3 reset">
        <div class="success" style="font-weight: bold">
            <img src="/static/images/tpls/success.png" alt=""/>
            <p class="pink"><span class="username" style="color: #0036ff;"><?php echo  $user['username'];?></span> 恭喜您，注册成功！</p>
            <p>您的注册工号是 <span style="color: #0036ff;"><?php echo $user['no'];?></span>,零工在线赠送您 <span class="pink">10</span>个零工币</p>
            <p style="color: #333;">即将为您跳转到登录界面（<span id="time">5</span>s）</p>
        </div>
    </div>
</section>

<script src="/static/js/jquery.js"></script>
<script src="/static/js/countDown.js"></script>