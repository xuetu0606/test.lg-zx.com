<?php
echo $error;
?>
<link rel="stylesheet" href="/static/css/publish/personal.publish.css"/>
<link rel="stylesheet" href="/static/css/lgb/title.css">

<section>
    <p class="title2">
        <a href="/user/mypublish"><</a>
        <span>填写信息</span>
    </p>
    <?php echo $edit?form_open('user/publish/edit/'.$this->uri->segment(4, 0)):form_open('user/publish'); ?>
        <div>
            <span>标题</span>
            <input type="text" name="title" class="iptlong" placeholder="请输入标题，限20字以内" value="<?php echo $baseinfo?$baseinfo['info1']:set_value('title'); ?>"/>
        </div>
        <div id="custom_data">
            <span>服务工种</span>

            <select class="first select">
                <?php echo $baseinfo?'<option value="'.$baseinfo['job_level_1'].'" selected>'.$three_level[0][$baseinfo['job_level_1']].'</option>':''; ?>
            </select>

            <select class="second select">
                <?php echo $baseinfo?'<option value="'.$baseinfo['job_level_2'].'" selected>'.$three_level[1][$baseinfo['job_level_2']].'</option>':''; ?>
            </select>

            <select name="job_code" class="third select">
                <?php echo $baseinfo?'<option value="'.$baseinfo['job_level_3'].'" selected>'.$three_level[2][$baseinfo['job_level_3']].'</option>':''; ?>
            </select>

        </div>
        <div id="area">
            <input type="hidden" name="city" value="<?php echo $city; ?>">
            <span>服务区域</span><?php echo $city; ?>市
            <select name="districtid" class="districtid">
                <?php echo $qyinfo?('<option value="'.$qyinfo[0]['district_id'].'" selected>'.$dist[$qyinfo[0]['district_id']].'</option>'):set_value('districtid'); ?>

            </select>
            <select name="areaid" class="areaid">
                <?php echo $qyinfo?'<option value="'.$qyinfo[0]['area_id'].'" selected>'.$dist[$qyinfo[0]['area_id']].'</option>':set_value('areaid'); ?>

            </select>
        </div>
        <div>
            <span>大学生零工</span>
            <input type="radio" name="is_student" value="1" <?php echo $baseinfo['is_student']==1?'checked':''; ?>/>是
            <input type="radio" name="is_student" value="no" <?php echo $baseinfo['is_student']==0?'checked':''; ?>/>否
        </div>
        <div>
            <span>涉外零工</span>
            <input type="radio" name="is_for_foreign" value="1" <?php echo $baseinfo['is_for_foreign']==1?'checked':''; ?>/>是
            <input type="radio" name="is_for_foreign" value="no" <?php echo $baseinfo['is_for_foreign']==0?'checked':''; ?>/>否
        </div>
        <div>
            <span>上门服务</span>
            <input type="radio" name="is_onsite_service" value="1" <?php echo $baseinfo['is_onsite_service']==1?'checked':''; ?>/>是
            <input type="radio" name="is_onsite_service" value="no" <?php echo $baseinfo['is_onsite_service']==0?'checked':''; ?>/>否
        </div>
    <?php if($_SESSION['is_co']){ ?>
        <div>
            <span>用户名</span>
                <a href="<?php echo site_url('user/myinfo'); ?>" class="deepblue"><?php echo $user['username']; ?></a>
        </div>
    <?php }else{  ?>
        <div>
            <span>用户名</span>
            <a href="<?php echo site_url('user/myinfo'); ?>" class="deepblue"><?php echo $user['username']; ?></a>
        </div>
    <?php } ?>

        <div>
            <span>联系电话</span>
            <input type="text" name="mobile" value="<?php echo $baseinfo?$baseinfo['mobile']:$user['mobile']; ?>"/>
        </div>
        <div>
            <span>联系地址</span>
            <input type="text" name="address" value="<?php echo $baseinfo?$baseinfo['address']:$user['address']; ?>" class="iptlong"/>
        </div>
        <div>
            <span>自我简介</span>
            <textarea name="zwjj" cols="30" rows="6" class="summaryNum"><?php echo $baseinfo?$baseinfo['info2']:set_value('zwjj'); ?></textarea>
            <span class="number"><span class="currentNum">200</span>/200</span>
        </div>
        <div>
            <span>服务介绍</span>
            <textarea name="fwjs" cols="30" rows="6" class="summaryNum1"><?php echo $baseinfo?$baseinfo['info3']:set_value('fwjs'); ?></textarea>
            <span class="number"><span class="currentNum">200</span>/200</span>
        </div>
        <div>
            <span>联系方式</span>
            <textarea name="lxfs" cols="30" rows="6" class="summaryNum2"><?php echo $baseinfo?$baseinfo['info4']:set_value('lxfs'); ?></textarea>
            <span class="number"><span class="currentNum">200</span>/200</span>
        </div>
    <div class="error">
        <?php echo validation_errors(); ?>
        <?php echo $formerror; ?>
    </div>
        <div style="text-align: center;">
            <input type="submit" value="发布"/>
        </div>
    </form>
</section>
<script src="/static/js/limitNum.js"></script>
<script src="/static/js/jquery.cxselect.min.js"></script>
<script>
    $('#custom_data').cxSelect({
        selects: ['first', 'second', 'third'],
        required: true,
        jsonValue: 'v',
        jsonName: 'n',
        jsonSub: 's',
        data: [
            <?php
                    foreach ($gong[0] as $k1=>$v1) {
                        echo '{\'v\': \''.$k1.'\', \'n\': \''.$v1.'\', \'s\': [';
                        foreach($gong[1][$k1] as $k2=>$v2){
                            echo '{\'v\': \''.$k2.'\', \'n\': \''.$v2.'\', \'s\': [';
                                foreach($gong[2][$k1][$k2] as $k3=>$v3){
                                    echo '{\'v\': \''.$k3.'\', \'n\': \''.$v3.'\'';
                                    if(end($gong[2][$k1][$k2])==$v3){
                                        echo '}';
                                    }else{
                                        echo '},';
                                    }
                                }
                            if(end($gong[1][$k1])==$v2){
                                    echo ']}';
                                }else{
                                    echo ']},';
                            }
                        }
                        if(end($gong[0])==$v1){
                            echo ']}';
                        }else{
                            echo ']},';
                        }
                    }

            ?>

        ]
    });
</script>
<script>
    $('#area').cxSelect({
        selects: ['districtid', 'areaid'],
        required: true,
        jsonValue: 'v',
        jsonName: 'n',
        jsonSub: 's',
        data: [
            {'v':'','n':'全部','s':[
                {'v':'','n':'全部'}
                ]},
            <?php
            foreach ($area[0] as $k1=>$v1) {
                echo '{\'v\': \''.$k1.'\', \'n\': \''.$v1.'\', \'s\': [';
                echo '{\'v\':\'\',\'n\':\'全部\'},';
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

