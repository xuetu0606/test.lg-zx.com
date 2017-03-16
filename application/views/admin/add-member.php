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
                    <div>
                        <button onclick="">添加公司用户</button>
                        <button onclick="">添加个人用户</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="gongsi" align="center" style="width:600px; height:710px; ">
                            <h3>公司用户</h3>
                                <form action="" method="">
                                    <label for="username">用户名　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">密　码　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">省　份　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">城　市　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">详细地址:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">手　机　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">固　话　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">邮　箱　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">QQ　号　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">微信号　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">公司名称:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">公司规模:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">公司网址:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">证件号　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                </form>
                        </div>
                        <div id="geren" align="center" style="width:600px; height:710px; display:none">
                            <h3>个人用户</h3>
                                <form action="" method="">    
                                    <label for="">用户名　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">密　码　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">省　份　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">城　市　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">详细地址:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">手　机　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">固　话　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">邮　箱　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">QQ　号　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">微信号　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">真实姓名:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">昵　称　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">性　别　:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">身份证号:</label>
                                    <input type="text" name="" id=""/><br/><br/>
                                    
                                    <label for="">个人简介:</label>
                                    <input type="text" name="" id=""/><br/><br/>
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
<!-- Page script -->

</body>
</html>