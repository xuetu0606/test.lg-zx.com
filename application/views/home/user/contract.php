<div class="content">
    <h1>签约推广申请表</h1>

    <form action="<?php echo site_url('user/contract'); ?>" method="POST">
        <div class="form-group">
            <label>姓名：</label>
            <span><?php echo $personal['realname'];?></span>
        </div>
        <div class="form-group">
            <label>身份证号：</label>
            <span><?php echo strlen($user['idno'])==15?substr_replace($idcard,"****",8,4):(strlen($user['idno'])==18?substr_replace($idcard,"****",10,4):"身份证位数不正常！");?></span>
        </div>
        <div class="form-group">
            <label>联系电话：</label>
            <span><?php echo $user['mobile']; ?></span>
        </div>
        <div class="form-group">
            <label>微信号：</label>
            <input type="text" name='wechat' value="<?php echo $user['wechat']; ?>" class="input-normal"/>
        </div>
        <div class="form-group">
            <label>QQ号：</label>
            <input type="text" name='qq' value="<?php echo $user['qq']; ?>" class="input-normal"/>
        </div>
        <div class="form-group">
            <label>留言：</label>
            <textarea name="words"></textarea>
        </div>
        <div class="form-group">
            <label></label>
            <input type="checkbox" name="agree" checked="checked" onchange="changeBox()"/>
            <span>我已阅读并同意 <a href="#">《零工在线服务推广协议》</a></span>
        </div>

        <div class="form-group">
            <p style="color:red;"><?php echo $error ?></p>
        </div>
        <div class="form-group">
            <label></label>
            <input type="submit" class="btn btn-primary" value="申请签约"/>
        </div>
    </form>
</div>
</div>
</div>
</section>