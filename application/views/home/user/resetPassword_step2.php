<link rel="stylesheet" href="/static/css/forgetPass.css"/>
<link rel="stylesheet" href="/static/css/form.css"/>
<section>
    <div class="position">
        <span>零工在线</span>
        <span> > </span>
        <span>忘记密码</span>
    </div>
    <div class="main">
        <div class="middle">
            <div class="buzhou">
                <span class="step step1 stress">验证手机</span>
                <span class="step b"> > </span>
                <span class="step step2">重置密码</span>
                <span class="step b"> > </span>
                <span class="step step3"> 完成 </span>
            </div>
            <div class="reset">
                <?php echo form_open('user/reset','id="reset"'); ?>
                    <input type="hidden" name="step" value="2">
                    <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                    <div class="form-group">
                        <div class="form-control">
                            <input type="password" class="input-normal" name="password" placeholder="输入新密码" required="required"/>
                            <label><?php echo form_error('password'); ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control">
                            <input type="password" class="input-normal" name="passconf" placeholder="确认密码" required="required"/>
                            <label><?php echo form_error('passconf'); ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control">
                            <input type="button" class="btn btn-main next-step2" value="下一步"/>
                        </div>
                    </div>
                </form>
            </div>
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
<script src="/static/js/head-foot.js"></script>
<script src="/static/js/getyzm.js"></script>
<script>
    $(function(){

            $('.reset').show();
            $('span.step2').addClass('stress');
        $('.next-step2').click(function(){
            document.getElementById("reset").submit();
        })

    });
</script>
</html>
