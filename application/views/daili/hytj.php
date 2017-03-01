    <!-- Content Wrapper. Contains page content d-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                会员统计
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/daili"><i class="fa fa-dashboard"></i> 首页</a></li>
                <li><a href="#">客情维护</a></li>
                <li class="active">会员统计</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">筛选条件</h3>
                        </div>
                        <div class="box-header">
                            <p><b>零工类型:</b>
                                <?php
                                    echo '<a '.($url_gong==0?$class:'').' href="/daili/hytj/gong/0/reg/'.$url_reg.'/vip/'.$url_vip.'">不限</a> 
                                          <a '.($url_gong==1?$class:'').' href="/daili/hytj/gong/1/reg/'.$url_reg.'/vip/'.$url_vip.'">个人</a> 
                                          <a '.($url_gong==2?$class:'').' href="/daili/hytj/gong/2/reg/'.$url_reg.'/vip/'.$url_vip.'">公司</a> 
                                          ';
                                ?></p>
                            <p><b>注册类型:</b>
                                <?php
                                echo '<a '.($url_reg==0?$class:'').' href="/daili/hytj/gong/'.$url_gong.'/reg/0/vip/'.$url_vip.'">不限</a> 
                                          <a '.($url_reg==1?$class:'').' href="/daili/hytj/gong/'.$url_gong.'/reg/1/vip/'.$url_vip.'">推广注册</a> 
                                          <a '.($url_reg==2?$class:'').' href="/daili/hytj/gong/'.$url_gong.'/reg/2/vip/'.$url_vip.'">站内注册</a> 
                                          ';
                                ?>
                            </p>
                            <p><b>套餐期限:</b>
                                <?php
                                echo '<a '.($url_vip==0?$class:'').' href="/daili/hytj/gong/'.$url_gong.'/reg/'.$url_reg.'/vip/0">不限</a> 
                                      <a '.($url_vip==1?$class:'').' href="/daili/hytj/gong/'.$url_gong.'/reg/'.$url_reg.'/vip/1">一个月内</a> 
                                     ';
                                ?>
                            </p>
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
                                <?php
                                if(count($users)>0) {
                                    foreach ($users as $item) {
                                        ?>

                                        <tr>
                                            <td><?= $item['no'] ?></td>
                                            <td><?= $item['is_co'] ? '公司' : '个人' ?></td>
                                            <td><?= $item['name'] ? $item['name'] : '未填写' ?></td>
                                            <td><?= $item['gong'] ? $item['gong'] : '无' ?></td>
                                            <td><?= $item['is_vip'] ? 'VIP' : '普通会员' ?></td>
                                            <td><?= $item['promotion_flag'] ? $item['referrer'] : '站内注册' ?></td>
                                            <td><?= date('Y-m-d', $item['addtime']) ?></td>
                                            <td><?= $item['is_vip'] ? date('Y-m-d', $item['vip_starttime']) : '无' ?></td>
                                            <td><?= $item['is_vip'] ? date('Y-m-d', $item['is_vip']) : '无' ?></td>
                                            <td><?= $item['mobile'] ?></td>
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
                            <!--
                            <div class="row">

                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button previous disabled" id="example2_previous">
                                                <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a>
                                            </li>
                                            <li class="paginate_button active">
                                                <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a>
                                            </li>
                                            <li class="paginate_button ">
                                                <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a>
                                            </li>
                                            <li class="paginate_button ">
                                                <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a>
                                            </li>
                                            <li class="paginate_button ">
                                                <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a>
                                            </li>
                                            <li class="paginate_button ">
                                                <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a>
                                            </li>
                                            <li class="paginate_button ">
                                                <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a>
                                            </li>
                                            <li class="paginate_button next" id="example2_next">
                                                <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            -->
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