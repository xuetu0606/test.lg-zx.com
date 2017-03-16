<!-- Content Wrapper. Contains page content d-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                招聘信息展示
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i> 首页</a></li>
                <li><a href="/admin/reveal">招聘展示</a></li>
            </ol>
        </section>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered table-hover dataTable" width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>标题</th>
                                        <th>工种</th>
                                        <th>区/县</th>
                                        <th>工资</th>
                                        <th>薪资单位</th>
                                        <th>结算周期</th>
                                        <th>招聘人数</th>
                                        <th>工作时间</th>
                                        <th>审核</th>
                                        <th>浏览量</th>
                                        <th>添加时间</th>
                                        <th>更新时间</th>
                                        <th>刷新时间</th>
                                        <th>工作内容</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(count($users)>0) {
                                    foreach ($users as $item) {
                                        ?>
                                        <tr>
                                            
                                            <td><?= $item['title'] ?></td>
                                            <td><?= $item['job_name'] ?></td>
                                            <td><?= $item['district_name'] ?></td>
                                            <td><?= $item['pay'] ?></td>
                                            <td><?= $item['pay_unit_name'] ?></td>
                                            <td><?= $item['pay_circle_name'] ?></td>
                                            <td><?= $item['sum'] ?></td>
                                            <td><?= $item['worktime'] ?></td>
                                            <td><?php 
                                                    if($item['flag'] == 1){
                                                        echo '审核通过';
                                                    }else if($item['flag'] == -1){
                                                        echo '审核失败';
                                                    }else{
                                                        echo '待审核';
                                                    }
                                                ?>
                                            </td>
                                            <td><?= $item['pv'] ?></td>
                                            <td><?= date("Y-m-d",$item['addtime']) ?></td>
                                            <td><?= date("Y-m-d",$item['updatetime']) ?></td>
                                            <td><?= date("Y-m-d",$item['flushtime']) ?></td>
                                            <td><?= $item['info'] ?></td>
                                            <td>
                                                <a href="<?php echo site_url('admin/toUpdateReveal'); ?>/<?= $item['id'] ?>">修改</a>
                                                |
                                                <a href="<?php echo site_url('admin/deleteReveal'); ?>/<?= $item['id'] ?>">删除</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }else{
                                    echo '<tr><td>暂无数据显示!</td></tr>';
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>标题</th>
                                        <th>工种</th>
                                        <th>区/县</th>
                                        <th>工资</th>
                                        <th>薪资单位</th>
                                        <th>结算周期</th>
                                        <th>招聘人数</th>
                                        <th>工作时间</th>
                                        <th>审核</th>
                                        <th>浏览量</th>
                                        <th>添加时间</th>
                                        <th>更新时间</th>
                                        <th>刷新时间</th>
                                        <th>工作内容</th>
                                        <th>操作</th>
                                    </tr>
                                </tfoot>
                            </table>
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