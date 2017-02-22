<link rel="stylesheet" href="/static/css/shouye.css"/>
<link rel="stylesheet" href="/static/css/nodata.css"/>
<section>
    <div class="industry">
           <!-- 遍历Home.php控制器发过来的职业信息 一级分类 -->
           <?php 
                foreach($first_level as $key => $value){ 
            ?>
            <div class="industry-intro">
                <a href="<?php echo site_url('/Home/profession/'.$value['id']) ?>"><img src="/static/images/section/shouye/<?php echo $key + 1; ?>.gif" alt="<?= $value['name']; ?>"/>
                <span><?= $value['name']; ?></span></a>
            </div>
            <?php
                }
            ?>
			
			<div class="industry-intro">
                <a href="<?php echo site_url('/lista/index/stu/1/') ?>">
                <img src="/static/images/section/shouye/8.gif" alt="大学生专栏"/>
                <span>大学生专栏</span></a>
            </div>
            <div class="industry-intro">
            <a href="#new"><img src="/static/images/section/shouye/9.gif" alt="最新发布"/>
            <span>最新发布</span></a>
            </div>
            
    </div>

    <div class="detail-industry">
        
            <?php 
                foreach($first_level as $key => $value){
            ?>
		<div>
            <div class="head">
                <a href="<?php echo site_url('/Home/profession/'.$value['id']) ?>"><span class="txt"><?php echo $value['name']; ?></span></a>
                <a href="<?php echo site_url("/user/publish")?>"><span class="fb">发布</span></a>
                <img src="/static/images/section/fb.png" alt="发布"/>
            </div>
        
            <div class="middle">
                <ul>
				<?php 
					$i=0;
					foreach($two_level[$value['id']]['sub'] as $k => $v){ 
						if($i%4==0&&$i<>0)echo "</ul><ul>";
				?>
                    <li><a href="<?php echo site_url('/lista/index/l1/'.$value['id'].'/l2/'.$k)?>"><?php echo $v; ?></a></li>
				<?php  $i++;}?>
                </ul>
            </div>
		</div>	
		<?php 
			} 

		?>
        <!--最新发布start-->
         <div id='new'>
            <div class="head">
                <a href="<?php echo site_url('/lista/index') ?>"><span class="txt">最新发布</span></a>
                <a href="<?php echo site_url("/user/quickpublish")?>"><span class="fb">快速发布</span></a>
                <img src="/static/images/section/ksfb.png" alt="快速发布"/>
            </div>
            <?php 
                if(!empty($new_list)){    //判断最新发布，如果为空则整个模块不显示
            ?>
            <div class="middle">

                <?php foreach($new_list as $k_list => $v_list){ ?>
                <ul class="zxfb">
                    <li>
                        <span class="area"><?php 
                         if($v_list['distname']){
                            echo $v_list['distname'];
                        }else{
                            echo $c_name[0]['name'];
                        }
                         ?></span>
                        <?php if($v_list['flag'] == 1){ //判断审核状态?>
                        <a href="<?php echo site_url('/Home/lgdetail/'.$v_list['id']) ?>" class='txt-a'>
                        <?php 
						//根据数据中信息，标准发布显示红色，快速发布显示为黑色
                            if($v_list['job_code']){
                                echo "<span style='color:red'>".$v_list['info1']."</span>";
                            }else{
                                echo $v_list['info1'];
                            }
                        ?></a>
                        <?php }else if($v_list['flag'] == 0){
                                echo "<a class='txt-a'>";
                                if($v_list['job_code']){
                                    echo "<span style='color:red'>".$v_list['info1']."</span>";
                                }else{
                                    echo $v_list['info1'];
                                } 
                                echo "</a>";
                            } ?>
                        <a href="tel:<?php echo $v_list['mobile']; ?>"><img src="/static/images/section/3-list/tel.png" alt=""/></a>
                        <span class="date">
                        <?php 
                            date_default_timezone_set('PRC');
                            $time = date('m-d',$v_list['addtime']);
                            
                            echo $time;
                        ?>
                        </span>
                    </li>
                </ul>
                <?php } ?>
            </div>
            <?php }else{ ?>
            <div class="nodata">
            <p>
                <img src="/static/images/section/bkx.png" alt=""/>
                <span>暂无数据</span>
            </p>
            <p>
                <a href="<?php echo site_url("/user/publish")?>" class="deepblue">抢沙发</a>
            </p>
            </div>
            <?php } ?>
        </div>
		<!--最新发布 end-->	
			<?php //} ?>
    </div>
</section>