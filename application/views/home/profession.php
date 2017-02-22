<link rel="stylesheet" href="/static/css/2-demo.css"/>
<script src="/static/js/setheight.js"></script>

<section>
    <div class="community">
        <p class="big-title"><b><?php echo $get_one; ?></b></p>
		<?php 
			//根据一级分类，调用不同样式
/*			if($get_one == '家政服务'){
				$num = 3;
			}else if($get_one == '社区便民'){
				$num = 2;
			}else if($get_one == '文教艺体'){
				$num = 3;
			}else if($get_one == '商务服务'){
				$num = 2;
			}else if($get_one == '安装维修'){
				$num = 2;
			}else if($get_one == '计算机网络'){
				$num = 2;
			}else if($get_one == '劳务工务'){
				$num = 2;
			}*/
		?>
        
		<?php //print_r($list);echo "<hr/>"; print_r($list_hot);
			//定义一个规定的颜色类。循环遍历
			$color = array('lv','cheng','qianlv','lan','huang','chenghong','hong','qianlv','lv','lan','chenghong'); 
			$i=$j=0; 
			$c = floor((count($list_hot)-1)/2);
			$c_flag = (count($list_hot)-1)%2;
			// var_dump($c);
			foreach($list_hot as $key => $value){ 
			//var_dump(count($list_hot));
			$count = count($list_hot);
			if($value['name'] != '其他'){ //当分类查出来是其他的时候不显示
				if($c_flag==0 && $i==0){
					echo '<div class="lists typesetting2">';
				}elseif($c_flag==1 && $i==0 && $c==1){
					echo '<div class="lists typesetting3">';
				}elseif($c_flag==1 && $i==0 && $c>1){
					echo '<div class="lists typesetting2">';
				}elseif($c_flag==1 && $i<>0 && $c>1 && (($j+1) == ($c)) && $i%2==0){
					echo '</div><div class="lists typesetting3">';
				}
		?>

            <div class="list <?php echo $color[$i]?>">
                <div class="txt">
                    <p class="title">
					<?php 
					//根据一级分类，使用分类下相对应的图片
						if($get_one == '家政服务'){
							$path = 'jzfw/'.$key;
						}else if($get_one == '社区便民'){
							$path = 'sqbm/'.$key;
						}else if($get_one == '文教艺体'){
							$path = 'wjyt/'.$key;
						}else if($get_one == '商务服务'){
							$path = 'swfw/'.$key;
						}else if($get_one == '安装维修'){
							$path = 'azwx/'.$key;
						}else if($get_one == '计算机网络'){
							$path = 'jsjwl/'.$key;
						}else if($get_one == '劳务工务'){
							$path = 'lwgw/'.$key;
						}
					?>
                        <img src="/static/images/section/shouye-2/<?php echo $path; ?>.png" alt="<?php echo $get_one; ?>"/>
                        <a href="<?php echo site_url('/lista/index/l1/'.$l1.'/l2/'.$key)?>"><?php echo $value['name']; ?></a></p>
					<!--  查询出热门，并遍历 -->
					<?php 
						foreach($value['sub'] as $k => $v){ 
						//var_dump(count($value['sub']));
					?>
                    <a href="<?php echo site_url('/lista/index/l1/'.$l1.'/l2/'.$key.'/l3/'.$k)?>"><span class="type"><?php echo $v; ?></span></a>
					<?php } ?>
                </div>
            </div>
			<?php $i++; if($i%2==0){$j++;}} } ?>
        </div>
    </div>
    <div class="detail-list">
		<?php $j=0; foreach($list as $key => $value){ ?>
        <div class="detail <?php if($value['name'] == '其他'){echo 'hui';}else{echo $color[$j];} ?>2">
            <div class="title szheight1">
                <p><?php echo $value['name']; ?></p>
            </div>
            <div class="profession szheight2">
                <ul>
					<?php $i = 1 ; foreach($value['sub'] as $k => $v){ ?>
                    <li><a href="<?php echo site_url('/lista/index/l1/'.$l1.'/l2/'.$key.'/l3/'.$k)?>"><?php echo $v; ?></a></li>
					<?php if($i%2==0)echo "</ul><ul>"; $i++;}?>
                </ul>
            </div>
        </div>
		<?php $j++; } ?>
    </div>
</section>
