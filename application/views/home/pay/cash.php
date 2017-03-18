<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>工分提现</title>
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
            <span class="stress"><?php echo $cityname; ?></span>
            <a href="http://www.lg-zx.com/">[切换城市]</a>
        </div>
        <div class="fr">
            <ul>
                <?php if($_SESSION['uid']){?>
                    <li><a href="/user"><?php echo $_SESSION['username']?></a></li>
                    <li><a href="/user/logout">退出</a></li>
                <?php }else{?>
                    <li><a href="/user/reg">注册</a></li>
                    <li><a href="/user/login">登录</a></li>
                <?php }?>
                <li class="lgbxl"><a href="#">零工宝</a><img src="/static/images/xiala.png" alt=""/></li>
                <li class="stress wxb">微信版</li>
                <li><a href="#" class="stress">手机版</a></li>
                <li><a href="#">帮助</a></li>
            </ul>
            <div class="lgb">
                <a href="/user">零工宝<img src="/static/images/xiala.png" alt="" /></a>
                <a href="/pub/my" class="lgba">我的发布</a>
                <a href="/user/shoucang" class="lgba">我的收藏</a>
                <a href="/user/myinfo" class="lgba">我的资料</a>
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
        <span>工分提现</span>
    </div>
    <div class="gftx-main">
        <h1>提现申请</h1>
        <?php echo form_open('/pay/cash'); ?>

            <div class="form-group">
                <label><span>姓名 </span></label>
                <label><span><?php echo $user['realname'] ?></span></label>

            </div>
            <div class="form-group">
                <label><span>身份证号</span></label>
                <label><span><span><?php echo $user['idno'] ?></span></label>
            </div>
            <div class="form-group">
                <label><span>提现选择</span></label>
                <div class="radio">
                    <input type="radio" name="mode" value="1" checked="checked"/>支付宝
                </div>
                <div class="radio">
                    <input type="radio" name="mode" value="2"/>银行卡
                </div>
            </div>
            <div class="form-group" id="bank" style="display: none;">
                <label><span>开户行</span></label>
                <div class="notice-bottom">
                    <input type="text" name="bank" class="input-normal"/>
                    <p class="txt">例如：工商银行北京朝阳支行</p>
                </div>
            </div>
            <div class="form-group">
                <label><span id="withdraw">支付宝账号</span></label>
                <div class="notice-bottom">
                    <input type="text" name="account" class="input-normal"/>
                    <p class="txt" id="account_tip">请输入有效的支付宝账号</p>
                </div>
            </div>

        <div class="form-group">
            <label><span>提现金额</span></label>
            <div class="notice-bottom">
                <?php echo $credit['credit2']?$credit['credit2']:'0' ?>
            </div>
        </div>

            <div class="form-group mar">
                <input type="submit" class="btn btn-primary" value="申请"/>
            </div>
        </form>
    </div>
</section>