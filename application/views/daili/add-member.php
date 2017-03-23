<!-- Content Wrapper. Contains page content d-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                会员添加
            </h1>
            <ol class="breadcrumb">
                <li><a href="/daili"><i class="fa fa-dashboard"></i> 首页</a></li>
                <li><a href="/daili/addMember">会员添加</a></li>
            </ol>
        </section>
                    <div style="width:900px;" align="center">
                        <label onclick="cutover(this);" id="1"><input type="radio" name="xz" checked="" />公司用户</label>
                        &nbsp;&nbsp;
                        <label onclick="cutover(this);" id="2"><input type="radio" name="xz"/>个人用户</label>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="gongsi" style="width:600px; height:900px; margin:0 auto;">
                            <br/>
                                <form action="<?php echo site_url('daili/add'); ?>" method="post">
                                    <label for="nickname">昵　称　:</label>
                                    <input type="text" name="nickname" id="nickname"/>
                                    <br/><br/>
                                    
                                    <label for="referrer">推荐人　:</label>
                                    <input type="text" name="referrer" id="referrer"/><br/><br/>

                                    <label for="">注册地 :</label>
                                    <span>　<?= $city['up_name'] ?> - <?= $city['city_name'] ?>　　　</span>
                                    <input type="hidden" name="p_id" value="<?= $city['upid'] ?>"/><br/>
                                    <input type="hidden" name="c_id" value="<?= $city['city_id'] ?>"/><br/>

                                    <label for="area">区　县　:</label>
                                    <select onchange="join(this);" name="arae" id="area" style="width:150px; height:26px;">
                                        <option>不限</option>
                                        <?php foreach($arae as $item): ?>
                                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <br/><br/>

                                    <label for="street">街　道　:</label>
                                    <select id="street" name="street" style="width:150px; height:26px;">
                                        <option>不限</option>
                                    </select>
                                    <br/><br/>

                                    <label for="address">详细地址:</label>
                                    <input type="text" onBlur="check(this,1);" name="address" id="address"/>
                                    <span id="1address_error" style="color:#F92672;"></span>
                                    <br/><br/>
                                    
                                    <label for="mobile">手　机　:</label>
                                    <input type="text" onBlur="check(this,1);"  name="mobile" id="mobile"/>
                                    <span id="1mobile_error" style="color:#F92672;"></span>
                                    <br/><br/>
                                    
                                    <label for="tel">固　话　:</label>
                                    <input type="text" name="tel" id="tel"/><br/><br/>
                                    
                                    <label for="city_id">工　种　:</label>
                                    <select  style="width:150px; height:26px;" name="job_type">
                                        <?php foreach($job as $item): ?>
                                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <br/><br/>

                                    <label for="coname">公司名称:</label>
                                    <input type="text" onBlur="check(this,1);" name="coname" id="coname"/>
                                    <span id="1coname_error" style="color:#F92672;"></span>
                                    <br/><br/>
                                    
                                    <label for="info1">服务标题:</label>
                                    <input type="text" onBlur="check(this,1);" name="info1" id="info1"/>
                                    <span id="1info1_error" style="color:#F92672;"></span>
                                    <br/><br/>

                                    <label for="info3">服务介绍:</label>
                                    <textarea onBlur="check(this,1);" style="resize:none" name="info3" id="info3" rows="6" cols="40"></textarea>
                                    <span id="1info3_error" style="color:#F92672;"></span>
                                    <br/><br/>

                                    <label for="info">公司简介:</label>
                                    <textarea onBlur="check(this,1);" style="resize:none" name="info" id="info" rows="6" cols="40"></textarea>
                                    <span id="1info_error" style="color:#F92672;"></span>
                                    <br/><br/>

                                    <input type="hidden" name="is_co" value="gongsi"> 

                                    <input type="submit" value="提交" style="border-bottom-left-radius: 10px;
border-bottom-right-radius: 10px; border-top-left-radius: 10px;
border-top-right-radius: 10px; background:#1FF0FA; width:70px; height:35px;"/>
                                </form>
                        </div>
                        <div id="geren" style="width:600px; height:900px; display:none; margin:0 auto;">
                            <br/>
                                <form action="<?php echo site_url('daili/addMember'); ?>" method="post">    
                                    <label for="nickname">昵　称　:</label>
                                    <input type="text" name="nickname" id="nickname"/>
                                    <br/><br/>
                                    
                                    <label for="referrer">推荐人　:</label>
                                    <input type="text" name="referrer" id="referrer"/><br/><br/>

                                    <label for="">注册地 :</label>
                                    <span>　<?= $city['up_name'] ?> - <?= $city['city_name'] ?>　　　</span>
                                    <input type="hidden" name="pre" valeu="<?= $city['upid'] ?>"/><br/>
                                    <input type="hidden" name="city" valeu="<?= $city['city_id'] ?>"/><br/>
                                    
                                    <label for="area">区　县　:</label>
                                    <select onchange="join(this);" name="arae" id="area" style="width:150px; height:26px;">
                                        <option>不限</option>
                                        <?php foreach($arae as $item): ?>
                                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <br/><br/>

                                    <label for="street">街　道　:</label>
                                    <select id="street" name="street" style="width:150px; height:26px;">
                                        <option>不限</option>
                                    </select>
                                    <br/><br/>

                                    <label for="address">详细地址:</label>
                                    <input onBlur="check(this,2);" type="text" name="address" id="address"/>
                                    <span id="2address_error" style="color:#F92672;"></span>
                                    <br/><br/>
                                    
                                    <label for="mobile">手　机　:</label>
                                    <input onBlur="check(this,2);" type="text" name="mobile" id="mobile"/>
                                    <span id="2mobile_error" style="color:#F92672;"></span>
                                    <br/><br/>
                                    
                                    <label for="tel">固　话　:</label>
                                    <input type="text" name="tel" id="tel"/><br/><br/>
                                    
                                    <label for="city_id">工　种　:</label>
                                    <select  style="width:150px; height:26px;" name="job_type">
                                        <?php foreach($job as $item): ?>
                                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <br/><br/>

                                    <label for="info1">服务标题:</label>
                                    <input onBlur="check(this,2);" type="text" name="info1" id="info1"/>
                                    <span id="2info1_error" style="color:#F92672;"></span>
                                    <br/><br/>

                                    <label for="info3">服务介绍:</label>
                                    <textarea onBlur="check(this,2);" style="resize:none" name="info3" id="info3" rows="6" cols="40"></textarea>
                                    <span id="2info3_error" style="color:#F92672;"></span>
                                    <br/><br/>

                                    <label for="info">个人简介:</label>
                                    <textarea onBlur="check(this,2);" style="resize:none" name="info" id="info" rows="6" cols="40"></textarea>
                                    <span id="2info_error" style="color:#F92672;"></span>
                                    <br/><br/>

                                    <input type="hidden" name="is_co" value="geren"> 

                                    <input type="submit" value="提交" style="border-bottom-left-radius: 10px;
border-bottom-right-radius: 10px; border-top-left-radius: 10px;
border-top-right-radius: 10px; background:#1FF0FA; width:70px; height:35px;"/>
                                </form>
                        </div>
                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
        </div>


        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
    <!-- /.content-wrapper -->


<!-- jQuery 2.2.3 -->
<script src="/static/daili/plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- Bootstrap 3.3.6 -->
<script src="/static/daili/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="/static/daili/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->


<script src="/static/daili/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/static/daili/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/static/daili/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->

<script src="/static/daili/js/moment.min.js"></script>
<script src="/static/daili/plugins/daterangepicker/daterangepicker.js"></script>


<!-- bootstrap datepicker -->
<script src="/static/daili/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="/static/daili/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

<!-- bootstrap time picker -->
<script src="/static/daili/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="/static/daili/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="/static/daili/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="/static/daili/plugins/fastclick/fastclick.js"></script>
<!-- dailiLTE App -->
<script src="/static/daili/dist/js/app.min.js"></script>
<!-- dailiLTE for demo purposes -->
<script src="/static/daili/dist/js/demo.js"></script>
<script src="/static/js/jquery.cxselect.min.js"></script>
<!-- Page script -->
<script>
    function cutover(obj){
        console.log(obj);
        if(obj.id == '1'){
            document.getElementById('gongsi').style.display="block";
            document.getElementById('geren').style.display="none";
        }else if(obj.id == '2'){
            document.getElementById('gongsi').style.display="none";
            document.getElementById('geren').style.display="block";
        }
    }  
    function join(obj){
        var grade = obj.options[obj.selectedIndex].value;
        var select;
        console.log(obj.name);
        $.get('<?php echo site_url('daili/getJoin'); ?>/'+grade,function(str){
            if(obj.name == 'c_id'){
                select = $("select#area");
            }else if(obj.name == 'arae'){
                select = $("select#street");
            }
            var data = eval('(' + str + ')');
            select.html('');
            select.append('<option>不限</option>');
            for(var i = 0 ; i < data.length ; i++){
                select.append('<option value="'+data[i]['id']+'">'+data[i]['name']+'</option>');
            }
        });
    }
    function check(obj,num){
        if(! obj.value){
            if(! $('#'+num+obj.name+'_error').html()){
                $('#'+num+obj.name+'_error').append('此项不能为空');
            }
        }else{
            $('#'+num+obj.name+'_error').html('');
        }
    }
</script>
</body>
</html>