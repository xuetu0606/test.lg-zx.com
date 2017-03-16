
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i> 首页</a></li>
                <li><a href="/admin/reveal">招聘展示</a></li>
                <li class="active">招聘信息修改</li>
            </ol>
        </section>
		<div class="box box-info" style="width:600px; margin:0 auto;">
            <div class="box-header with-border">
              <h3 class="box-title">修改信息</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo site_url('admin/updateReveal'); ?>" method="post">
				<input type="hidden" name="id" value="<?= $user['id'] ?>"/>
				<label for="inputEmail3">标题</label>
				<input type="text" id="inputEmail3" name="title" value="<?= $user['title'] ?>"/>
				<br/>
				<label>工种</label>
				<select name="job_code">
					<?php foreach($job_names as $item): ?>
					<option value="<?= $item['id'] ?>" 
						<?php 
							if($user['job_code'] == $item['id']){
								echo 'selected = "selected"';
							}
						?>
					><?= $item['name'] ?></option>
					<?php endforeach; ?>
				</select>
				<br/>
				<label>区/县</label>
				<select name="district_id">
					<?php foreach($district_names as $item): ?>
					<option value="<?= $item['id'] ?>" 
						<?php 
							if($user['district_id'] == $item['id']){
								echo 'selected = "selected"';
							}
						?>
					><?= $item['name'] ?></option>
					<?php endforeach; ?>
				</select>
				<br/>
				<label for="inputPassword3">工资</label>
				<input type="text" id="inputPassword3" name="pay" value="<?= $user['pay'] ?>"/>
				<br/>
				<label>薪资单位</label>
				<select name="pay_unit">
					<?php foreach($pay_unit_names as $item): ?>
					<option value="<?= $item['id'] ?>" 
						<?php 
							if($user['pay_unit'] == $item['id']){
								echo 'selected = "selected"';
							}
						?>
					><?= $item['name'] ?></option>
					<?php endforeach; ?>
				</select>
				<br/>
				<label>结算周期</label>
				<select name="pay_circle">
					<?php foreach($pay_circle_names as $item): ?>
					<option value="<?= $item['id'] ?>" 
						<?php 
							if($user['pay_circle'] == $item['id']){
								echo 'selected = "selected"';
							}
						?>
					><?= $item['name'] ?></option>
					<?php endforeach; ?>
				</select>
				<br/>
				<label for="inputPassword3">招聘人数</label>
				<input type="text" id="inputPassword3" name="sum" value="<?= $user['sum'] ?>"/>
				<br/>
				<label for="inputPassword3">工作时间</label>
				<input type="text" id="inputPassword3" name="worktime" value="<?= $user['worktime'] ?>"/>
				<br/>
				<label for="inputPassword3">工作地址</label>
				<input type="text" id="inputPassword3" name="address" value="<?= $user['address'] ?>"/>
				<br/>
				<label for="inputPassword3">联系电话</label>
				<input type="text" id="inputPassword3" name="mobile" value="<?= $user['mobile'] ?>"/>
				<br/>
				<label for="inputPassword3">联系人</label>
				<input type="text" id="inputPassword3" name="contacts" value="<?= $user['contacts'] ?>"/>
				<br/>
				<label for="inputPassword3">审核</label>
				<input type="text" id="inputPassword3" name="flag"  disabled="" value="<?php 
						if($user['flag'] == 1){
							echo '审核通过';
						}else if($item['flag'] == -1){
							echo '审核失败';
						}else{
							echo '待审核';
						}
					?>">
				<br/>
				<label for="inputPassword3">浏览量</label>
				<input type="text" id="inputPassword3" name="pv" disabled="" value="<?= $user['pv'] ?>"/>
				<br/>
				<label for="inputPassword3">添加时间</label>
				<input type="text" id="inputPassword3" name="addtime" disabled="" value="<?= date("Y-m-d",$user['addtime']) ?>"/>
				<br/>
				<label for="inputPassword3">更新时间</label>
				<input type="text" id="inputPassword3" name="updatetime" disabled="" value="<?= date("Y-m-d",$user['updatetime']) ?>"/>
				<br/>
				<label for="inputPassword3">刷新时间</label>
				<input type="text" id="inputPassword3" name="flushtime" disabled="" value="<?= date("Y-m-d",$user['flushtime']) ?>"/>
				<br/>
				<label for="inputPassword3">工作内容</label>
				<input type="text" id="inputPassword3" name="info" value="<?= $user['info'] ?>"/>
				<br/>
				<input type="submit" value="提交"/>
              <!-- /.box-footer -->
            </form>
          </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->