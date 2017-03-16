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
            <div class="send">
                <?php echo form_open('user/reset','id="reset"'); ?>
                    <input type="hidden" name="step" value="1">
                    <div class="form-group">
                        <div class="form-control">
                            <input type="text" class="input-normal" name="mobile" id="mobile" placeholder="请输入手机号" value="<?php echo set_value('mobile'); ?>" placeholder="输入手机号码" required="required"/>
                            <label><span class="getyzm djq getcode">获取手机验证码</span></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control">
                            <input type="text" class="input-normal" name="messagecode" value="<?php echo set_value('messagecode'); ?>" placeholder="输入短信验证码" required="required"/>
                        </div>
                    </div>

                    <div class="error">
                        <?php if(!empty($_POST)):?>
                        <div class="list">
                            <img width="16" height="16" src="/static/images/tpls/error.png" alt="错误"/>
                            <?php echo validation_errors(); ?>
                            <?php echo $codeError; ?>
                        </div>
                        <?php endif;?>
                        <p id="mobileError"></p>
                    </div>


                    <div class="form-group">
                        <div class="form-control">
                            <input type="button" class="btn btn-main next-step1" value="下一步"/>
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
    $('.getcode').click(function(){

        if($("#mobile").val().length==0){
            $('.error').show();
            $('#mobileError').html('手机号码不能为空');
            return false;
        }
        $.ajax({
            url: '<?php echo base_url()?>getcode/index/res',
            type: "POST",
            dataType: 'json',
            data: {mobile:$("#mobile").val()},
            cache: false,
            error: function(){
                alert('检测失败，请重试');
            },
            success: function(data){
                $('.error').show();
                $('#mobileError').html(data.msg);
            }
        });
    });

    $(function(){
        $('.next-step1').click(function(){
            document.getElementById("reset").submit();
        });
    });
</script>
</html>
