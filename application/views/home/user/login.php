<link rel="stylesheet" href="/static/css/tpls/login.css"/>
<section>
    <div class="register">
        <p>还没有账号？30 秒 <a href="/user/reg">快速注册</a></p>
    </div>

    <?php echo form_open('user','name="login"'); ?>
        <div class="input">
            <input name="username" type="text" placeholder="用户名/电子邮箱/手机号" value="<?php echo get_cookie('username')?get_cookie('username'):set_value('username'); ?>"/>
            <input name="passwd" type="password" placeholder="请输入密码"  value="<?php echo get_cookie('passwd')?get_cookie('passwd'):set_value('passwd'); ?>" id="unvisiableInput" style="display: block"/>
            <input type="text" placeholder="请输入密码" id="visiableInput" style="display: none"/>
            <img src="/static/images/tpls/hidepass.png" alt="隐藏密码" class="passimg" id="unvisiableImg" style="display: block"/>
            <img src="/static/images/tpls/showpass.png" alt="显示密码" class="passimg" id="visiableImg" style="display: none"/>

            <?php if(!empty($_POST)):?>
                <div class="error">
                    <div class="list">
                        <img src="/static/images/tpls/error.png" alt="错误"/>
                        <?php echo validation_errors(); ?>
                        <?php echo (empty($error_string))?'':'<span>'.$error_string.'</span>'; ?>
                    </div>

                </div>
            <?php endif;?>

        </div>
        <div class="login">
            <div class="pass">
                <input type="checkbox" name="remember" id="rememberBox" style="display: none;"/>
                <img src="/static/images/tpls/login_08.gif" alt="记住密码" class="rememberp imgone" style="display: none;"/>
                <img src="/static/images/tpls/rememberp.png" alt="" class="rememberp imgtwo" style="display: inline-block"/>
                <span class="one">记住密码</span>
                <a href="/user/reset">忘记密码</a>
            </div>
            <input type="submit" value="登录"/>
        </div>
        <div class="qr-code">
            <img src="/static/images/tpls/qrcode_03.gif" alt=""/>
            <div id="qrDiv"></div>
            <p>长摁识别二维码</p>
            <p>关注 <span>零工在线</span></p>
        </div>
    </form>
</section>

<script src="/static/js/jquery.js"></script>
<script src="/static/js/login.js"></script>
<script src="/static/js/category.js"></script>