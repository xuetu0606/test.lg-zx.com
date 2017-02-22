<link rel="stylesheet" href="/static/css/tpls/register.css"/>

<section>
    <p class="userRegister"><?php echo $title; ?></p>
    <?php echo form_open('user/reg','name="register" id="registerForm"'); ?>
        <div id="regarea" class="list" style="height: 4rem;">
            <span>注册地<b> :</b></span>
            <select name="p_id" class="province">
            <?php foreach($province as $key => $value){ ?>
                    <option value="<?php echo $key; ?>" <?php if($key == $city_arr['pro_id'])echo 'selected="selected"';?>><?php echo $value; ?></option>
                <?php } ?>
            </select>
            <select name="c_id" class="city1">
           		<?php foreach ($city_list as $key=>$value){?>
                	<option value="<?php echo $key;?>" <?php if($key==$city_arr['id'])echo 'selected="selected"';?>><?php echo $value?></option>
                <?php }?>
            </select>
            <p style="color: #ff0000; width: 19rem; font-size: 1rem;margin: .4rem 6.5rem;">请确认您当前所在城市，注册后不可修改！</p>
        </div>
        <div class="list">
            <span><b class="red">*</b>注册类型<b> :</b></span>
            <input type="radio" name="type" checked="checked" id="personCheck"/> 个人零工
            <input type="radio" name="type" id="companyCheck"/> 公司零工
            <input type="hidden" name="is_co" id="is_co" value="<?php echo set_value('is_co')?set_value('is_co'):'0'; ?>" />
        </div>
        <div class="list">
            <span><b class="red">*</b>用户名<b> :</b></span>
            <input type="text" name="username" required="required" value="<?php echo set_value('username'); ?>"/>
            <?php echo form_error('username'); ?>
        </div>
        <div class="list">
            <span><b class="red">*</b>密码<b> :</b></span>
            <input type="password" name="password" required="required"/>
            <?php echo form_error('password'); ?>
        </div>
        <div class="list">
            <span><b class="red">*</b>确认密码<b> :</b></span>
            <input type="password" name="passconf" required="required"/>
            <?php echo form_error('passconf'); ?>
        </div>
        <div class="list">
            <span>邮箱<b> :</b></span>
            <input type="email" name="email"  value="<?php echo set_value('email'); ?>"/>
            <?php echo form_error('email'); ?>
        </div>
        <div class="list">
            <span>推介人<b> :</b></span>
            <input type="text" name="referer" value="零工在线" value="<?php echo set_value('referer'); ?>"/>
            <?php echo form_error('referer'); ?>
        </div>
        <div class="list">
            <span id="nickname"><b class="red">*</b>姓名<b> :</b></span>
            <input type="text" name="realname" id="realname" required="required" value="<?php echo set_value('is_co')?set_value('coname'):set_value('realname'); ?>"/>
            <?php echo set_value('is_co')?form_error('coname'):form_error('realname'); ?>
        </div>
        <div class="list">
            <span><b class="red">*</b>手机号<b> :</b></span>
            <input type="tel" name="mobile" id="mobile" required="required" value="<?php echo set_value('mobile'); ?>"/>
            <?php echo form_error('mobile'); ?><p class="error" id="mobileError"></p>
        </div>
        <div class="list">
            <span></span>

            <img src="/static/images/tpls/register/register_03.gif" alt="获取验证码" class="getcode"/>
            <span id="gotcode">重新获取&#40;<span id="seconds" style="color: #fff;width: auto;margin: 0;">120</span>s&#41;</span>
        </div>
        <div class="list">
            <span>短信验证码<b> :</b><b></b></span>
            <input type="text" name="messagecode" required="required"/>
            <p class="error"><?php echo $codeError; ?></p>
        </div>
        <!--<div class="list" style="display: none" id="contact">-->
        <!--<span>联系电话<b> :</b><b></b></span>-->
        <!--<input type="text" name="contact"/>-->
        <!--</div>-->
        <div class="list">
            <p>
                <input type="checkbox" name="agree" checked="checked" onchange="changeBox()"/>
                <!--<img src="../../images/tpls/register/register_04.gif" alt=""/>-->
                我已阅读并同意 <a href="/user/useragreement">《零工在线用户协议》</a>
            </p>
            <div class="check" onclick="changeDiv()"></div>

        </div>
        <div class="list">
            <p>
                <input type="submit" name="register" id="submit" value="注册"/>
                <span><?php echo $formError;?></span>
            </p>
        </div>
    </form>
</section>


<script src="/static/js/agree.js"></script>
<script src="/static/js/jquery.cxselect.min.js"></script>
<script>
    if($('#is_co').val()=='1'){
        $('#nickname').html('<b class="red">*</b>公司名称<b> :</b>');
        $("#realname").attr("name","coname");
        $("#companyCheck").attr("checked","checked");
    }else{
        $('#nickname').html('<b class="red">*</b>姓名<b> :</b>');
        $("#realname").attr("name","realname");
        $("#personCheck").attr("checked","checked");
    }

    $('#personCheck').click(function()
    {
//            $('#contact').css('display','none');
        $('#nickname').html('<b class="red">*</b>姓名<b> :</b>');
        $("#realname").attr("name","realname");
        $('#is_co').val(0);

    });
    $('#companyCheck').click(function()
    {

        $(this).prop("checked","true");
//        $('#contact').css('display','block');
        $('#nickname').html('<b class="red">*</b>公司名称<b> :</b>');
        $("#realname").attr("name","coname");
        $('#is_co').val(1);
    });

        $('.getcode').click(function(){
            $.ajax({
                url: 'getcode/reg',
                type: "POST",
                dataType: 'json',
                data: {mobile:$("#mobile").val()},
                cache: false,
                error: function(){
                    alert('检测失败，请重试');
                },
                success: function(data){
                    $('#mobileError').html(data.msg);
                    if(data.status=="success"){
                        $('.getcode').css('display','none');
                        $('#gotcode').css('display','inline-block');
                        var num=120;
                        function countDown(){
                            if(num>1){
                                num--;
                                $('#seconds').text(num);
                            }
                            else{
                                $('.getcode').css('display','inline-block');
                                $('#gotcode').css('display','none');
                                $('#seconds').text(120);
                                clearInterval(time);
                            }
                        };
                        var time=setInterval(countDown,1000);
                    }
                }
            });
        })
</script>
<script>
    $('#regarea').cxSelect({
        selects: ['province', 'city1'],
        required: true,
        jsonValue: 'v',
        jsonName: 'n',
        jsonSub: 's',
        data: [
            <?php
            foreach ($area[0] as $k1=>$v1) {
                echo '{\'v\': \''.$k1.'\', \'n\': \''.$v1.'\', \'s\': [';
                foreach($area[1][$k1] as $k2=>$v2){

                    echo '{\'v\': \''.$k2.'\', \'n\': \''.$v2.'\'';

                    if(end($area[1][$k1])==$v2){
                        echo '}';
                    }else{
                        echo '},';
                    }
                }
                if(end($area[0])==$v1){
                    echo ']}';
                }else{
                    echo ']},';
                }
            }

            ?>

        ]
    });
</script>
