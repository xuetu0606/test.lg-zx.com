<!-- Content Wrapper. Contains page content d-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                招聘信息展示
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i> 首页</a></li>
                <li><a href="/admin/addMember">会员添加</a></li>
            </ol>
        </section>
                    <div align="center">
                        <button onclick="cutover(this);" name="gongsi">打开添加公司用户</button>
                        <button onclick="cutover(this);" name="geren">打开添加个人用户</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="gongsi" align="center" style="width:600px; height:980px; ">
                            <h3>公司用户</h3>
                                <form action="<?php echo site_url('admin/addMember'); ?>" method="post">
                                    <label for="username">用户名　:</label>
                                    <input type="text" name="username" id="username"/><br/><br/>
                                    
                                    <label for="password">密　码　:</label>
                                    <input type="password" name="password" id="password"/><br/><br/>
                                    
                                    <label for="province_id">省　份　:</label>
                                    <select style="width:150px; height:26px;" class="myselect" name="province_id">
                                        <option value="1">男</option>
                                    </select>
                                    <br/><br/>
                                    <!-- -->
                                    <label for="city_id">城　市　:</label>
                                    <select style="width:150px; height:26px;" class="myselect" name="city_id">
                                        <option value="1">男</option>
                                    </select>
                                    <br/><br/>
                                    
                                    <label for="address">详细地址:</label>
                                    <input type="text" name="address" id="address"/><br/><br/>
                                    
                                    <label for="mobile">手　机　:</label>
                                    <input type="text" name="mobile" id="mobile"/><br/><br/>
                                    
                                    <label for="tel">固　话　:</label>
                                    <input type="text" name="tel" id="tel"/><br/><br/>
                                    
                                    <label for="email">邮　箱　:</label>
                                    <input type="text" name="email" id="email"/><br/><br/>
                                    
                                    <label for="qq">QQ　号　:</label>
                                    <input type="text" name="qq" id="qq"/><br/><br/>
                                    
                                    <label for="wechat">微信号　:</label>
                                    <input type="text" name="wechat" id="wechat"/><br/><br/>
                                    
                                    <label for="coname">公司名称:</label>
                                    <input type="text" name="coname" id="coname"/><br/><br/>
                                    
                                    <label for="scale_code">公司规模:</label>
                                    <input type="text" name="scale_code" id="scale_code"/><br/><br/>
                                    
                                    <label for="weburl">公司网址:</label>
                                    <input type="text" name="weburl" id="weburl"/><br/><br/>
                                    
                                    <label for="idno" title="营业执照号">证件号　:</label>
                                    <input type="text" name="idno" id="idno"/><br/><br/>

                                    <label for="info">公司简介:</label>
                                    <textarea name="info" id="info" rows="6" cols="40"></textarea><br/><br/>

                                    <input type="hidden" name="is_co" value="gongsi"> 

                                    <input type="submit" value="提交"/>
                                </form>
                        </div>
                        <div id="geren" align="center" style="width:600px; height:980px; display:none">
                            <h3>个人用户</h3>
                                <form action="<?php echo site_url('admin/addMember'); ?>" method="post">    
                                    <label for="username">用户名　:</label>
                                    <input type="text" name="username" id="username"/><br/><br/>
                                    
                                    <label for="password">密　码　:</label>
                                    <input type="password" name="password" id="password"/><br/><br/>
                                    
                                    <label for="province_id">省　份　:</label>
                                    <select style="width:150px; height:26px;" class="myselect" name="province_id">
                                        <option value="1">男</option>
                                    </select>
                                    <br/><br/>
                                    
                                    <label for="city_id">城　市　:</label>
                                    <select style="width:150px; height:26px;" class="myselect" name="city_id">
                                        <option value="1">男</option>
                                    </select>
                                    <br/><br/>
                                    
                                    <label for="address">详细地址:</label>
                                    <input type="text" name="address" id="address"/><br/><br/>
                                    
                                    <label for="mobile">手　机　:</label>
                                    <input type="text" name="mobile" id="mobile"/><br/><br/>
                                    
                                    <label for="tel">固　话　:</label>
                                    <input type="text" name="tel" id="tel"/><br/><br/>
                                    
                                    <label for="email">邮　箱　:</label>
                                    <input type="text" name="email" id="email"/><br/><br/>
                                    
                                    <label for="qq">QQ　号　:</label>
                                    <input type="text" name="qq" id="qq"/><br/><br/>
                                    
                                    <label for="wechat">微信号　:</label>
                                    <input type="text" name="wechat" id="wechat"/><br/><br/>
                                    
                                    <label for="realname">真实姓名:</label>
                                    <input type="text" name="realname" id="realname"/><br/><br/>
                                    
                                    <label for="nickname">昵　称　:</label>
                                    <input type="text" name="nickname" id="nickname"/><br/><br/>
                                    
                                    <label for="sex">性　别　:</label>
                                    <select style="width:150px; height:26px;" class="myselect" name="sex">
                                        <option value="1">男</option>
                                        <option value="2">女</option>
                                    </select>
                                    <br/><br/>
                                    
                                    <label for="idno" title="身份证号">证件号　:</label>
                                    <input type="text" name="idno" id="idno"/><br/><br/>
                                    
                                    <label for="info">个人简介:</label>
                                    <textarea name="info" id="info" rows="6" cols="40"></textarea><br/><br/>

                                    <input type="hidden" name="is_co" value="geren"> 

                                    <input type="submit" value="提交"/>
                                </form>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                    <ul class="pagination"><?php echo $page;?></ul>
                                </div>
                            </div>
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
<!-- AdminLTE App -->
<script src="/static/daili/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/static/daili/dist/js/demo.js"></script>
<!-- 下拉选 -->
<script src="/static/css/select.css"></script>
<!-- Page script -->
<script>
    function cutover(obj){
        if(obj.name == 'gongsi'){
            document.getElementById('gongsi').style.display="block";
            document.getElementById('geren').style.display="none";
        }else if(obj.name == 'geren'){
            document.getElementById('gongsi').style.display="none";
            document.getElementById('geren').style.display="block";
        }
    }
</script>
</body>
</html>