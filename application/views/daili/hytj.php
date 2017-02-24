    <!-- Content Wrapper. Contains page content d-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Tables
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Hover Data Table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>工号</th>
                                    <th>零工类型</th>
                                    <th>昵称/公司名称</th>
                                    <th>工种</th>
                                    <th>零工状态</th>
                                    <th>注册类型/推广ID</th>
                                    <th>注册时间</th>
                                    <th>充值时间</th>
                                    <th>套餐期限</th>
                                    <th>联系电话</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($users as $item): ?>
                                    <tr>
                                        <td><?= $item['no'] ?></td>
                                        <td><?= $item['is_co']?'公司':'个人' ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td><?= $item['gong'] ?></td>
                                        <td><?= $item['is_vip']?'VIP':'普通会员' ?></td>
                                        <td><?= $item['referrer']?$item['referrer']:'零工在线' ?></td>
                                        <td><?= date('Y-m-d',$item['addtime']) ?></td>
                                        <td><?= $item['is_vip']?date('Y-m-d',$item['vip_starttime']):'无' ?></td>
                                        <td><?= $item['is_vip']?date('Y-m-d',$item['is_vip']):'无' ?></td>
                                        <td><?= $item['mobile'] ?></td>
                                    </tr>
                                <?php endforeach; ?>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>工号</th>
                                    <th>零工类型</th>
                                    <th>昵称/公司名称</th>
                                    <th>工种</th>
                                    <th>零工状态</th>
                                    <th>注册类型/推广ID</th>
                                    <th>注册时间</th>
                                    <th>充值时间</th>
                                    <th>套餐期限</th>
                                    <th>联系电话</th>
                                </tr>
                                </tfoot>
                            </table>
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