<link rel="stylesheet" href="/static/css/publish.css"/>
<link rel="stylesheet" href="/static/css/form.css"/>
<style>
    .gb {
        position: relative;
        top: -85px;
        right: -130px;
    }
</style>

<section>
    <div class="position">
        <span>青岛零工在线</span>
        <span> > </span>
        <span>发布信息</span>
        <span> > </span>
        <span><?php echo $title;?></span>
    </div>
    </div>
    <div class="main">
        <div class="middle">
            <div class="buzhou">
                <span class="step step1"><?php echo $hang[$zlg['job_level_1']];?></span>
                <span class="step b"> > </span>
                <span class="step step2"><?php echo $zhi[$zlg['job_level_2']];?></span>
                <span class="step b"> > </span>
                <span class="step step3 stress"> 填写信息 </span>
                <span class="step b"> > </span>
                <span class="step step4"> 完成发布 </span>
            </div>
        </div>
        <div class="infor">
            <h1>填写信息</h1>

            <form method="post" action="<?php echo base_url();?>pub/zlg/<?php echo $this->uri->segment(3, 0);?>/<?php echo $this->uri->segment(4, 0);?>" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-control">
                        <label><span class="xing">*</span>标题：</label>
                        <input name="title" type="text" class="input-normal" value="<?php echo $zlg?$zlg['title']:set_value('title'); ?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-control wrap">
                        <label><span class="xing">*</span>职业类别：</label>
                        <div class="check">
                            <?php foreach ($gong as $k => $v):?>
                                <div class="marginr">
                                    <input type="<?php echo $this->uri->segment(3, 0)=='edit'?'radio':'checkbox';?>" name="job_code[]" value="<?php echo $k;?>" <?php echo $k==$zlg['job_level_3']?'checked':'';?>/><span><?php echo $v;?></span>
                                </div>
                            <?php endforeach;?>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control wrap">
                        <label><span class="xing">*</span>工作区域：</label>
                        <div class="check">
                            <?php foreach ($area[0] as $k => $v):?>
                                <div class="marginr">
                                    <input type="radio" name="districtid" value="<?php echo $k;?>" <?php echo $k==$zlg['district_id']?'checked':'';?>/><span><?php echo $v;?></span>
                                </div>
                            <?php endforeach;?>
                        </div>

                    </div>
                </div>
                <!--
                <div class="form-group">
                    <div class="form-control">
                        <label><span class="xing">*</span>工作经验：</label>
                        <div class="select">
                            <div id="experience" class="fuji">
                                <span class="option">不限</span>
                                <span class="xl"><img src="/static/images/form/xl.png" alt="" class="timejt"/></span>
                                <ul class="list-group">
                                    <a href='javascript:void(0);' class='list-group-item'>不限</a>
                                    <a href='javascript:void(0);' class='list-group-item'>应届生</a>
                                    <a href='javascript:void(0);' class='list-group-item'>1年以下</a>
                                    <a href='javascript:void(0);' class='list-group-item'>1-3年</a>
                                    <a href='javascript:void(0);' class='list-group-item'>3-5年</a>
                                    <a href='javascript:void(0);' class='list-group-item'>5-10年</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="form-control">
                        <label><span class="xing">*</span>学历：</label>
                        <div class="select">
                            <div class="fuji">
                                <span class="option">不限</span>
                                <span class="xl"><img src="/static/images/form/xl.png" alt="" class="timejt"/></span>
                                <ul class="list-group">
                                    <a href='javascript:void(0);' class='list-group-item'>不限</a>
                                    <a href='javascript:void(0);' class='list-group-item'>初中及以下</a>
                                    <a href='javascript:void(0);' class='list-group-item'>高中</a>
                                    <a href='javascript:void(0);' class='list-group-item'>中专</a>
                                    <a href='javascript:void(0);' class='list-group-item'>大专</a>
                                    <a href='javascript:void(0);' class='list-group-item'>本科</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                -->
                <div class="form-group">
                    <div class="form-control">
                        <label><span class="xing">*</span>薪资：</label>
                        <input type="text" name="pay" class="input-normal" value="<?php echo $zlg?$zlg['pay']:set_value('pay'); ?>" style="width: 120px;"/>
                        <input type="hidden" name="unit" id="unit" value="<?php echo $zlg?$zlg['pay_unit']:(set_value('unit')?set_value('unit'):1); ?>">
                        <div class="select">
                            <div class="fuji">
                                <span class="option">元/次</span>
                                <span class="xl"><img src="/static/images/form/xl.png" alt="" class="timejt"/></span>
                                <ul class="list-group">
                                    <?php
                                    foreach ($unit as $k=>$v){
                                        if($k==$zlg['unit']){
                                            echo '<a href=\'javascript:void(0);\' class=\'list-group-item\' data-unit="'.$k.'">'.$v.'</a>';
                                        }
                                        echo '<a href=\'javascript:void(0);\' class=\'list-group-item\' data-unit="'.$k.'">'.$v.'</a>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="form-control">
                        <label><span class="xing">*</span>薪资结算：</label>
                        <div class="select">
                            <div class="fuji">
                                <span class="option">日结</span>
                                <span class="xl"><img src="/static/images/form/xl.png" alt="" class="timejt"/></span>
                                <ul class="list-group">
                                    <?php
                                    foreach ($pay_circle as $k=>$v){
                                        if($k==$zlg['$pay_circle']){
                                            echo '<a href=\'javascript:void(0);\' class=\'list-group-item\' data-circle="'.$k.'">'.$v.'</a>';
                                        }
                                        echo '<a href=\'javascript:void(0);\' class=\'list-group-item\' data-circle="'.$k.'">'.$v.'</a>';
                                    }
                                    ?>
                                </ul>
                                <input type="hidden" name="pay_circle" id="pay_circle" value="<?php echo $zlg?$zlg['pay_circle']:(set_value('pay_circle')?set_value('pay_circle'):1); ?>">
                            </div>
                        </div>
                    </div>

                </div>
                <!--
                <div class="form-group">
                    <div class="form-control">
                        <label><span class="xing">*</span>雇佣类型：</label>
                        <div class="check">
                            <div class="marginr">
                                <input type="checkbox"/><span>普通零工</span>
                            </div>
                            <div class="marginr">
                                <input type="checkbox"/><span>大学生零工</span>
                            </div>
                        </div>
                    </div>
                </div>
                -->
                <div class="form-group">
                    <div class="form-control">
                        <label><span class="xing">*</span>招聘人数：</label>
                        <input type="text" name="sum" class="input-normal" value="<?php echo $zlg?$zlg['sum']:set_value('sum'); ?>" style="width: 120px"/>人
                    </div>

                </div>

                <div class="form-group">
                    <div class="form-control wrap">
                        <label><span class="xing">*</span>工作内容：</label></label>
                        <textarea name="info"><?php echo $zlg?$zlg['info']:set_value('info'); ?></textarea>
                    </div>
                </div>
                <!--
                <div class="form-group">
                    <div class="form-control">
                        <label><span class="xing">*</span>性别：</label>
                        <div class="select">
                            <div class="fuji">
                                <span class="option">不限</span>
                                <span class="xl"><img src="/static/images/form/xl.png" alt="" class="timejt"/></span>
                                <ul class="list-group">
                                    <a href='javascript:void(0);' class='list-group-item'>不限</a>
                                    <a href='javascript:void(0);' class='list-group-item'>男</a>
                                    <a href='javascript:void(0);' class='list-group-item'>女</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                -->
                <div class="form-group">
                    <div class="form-control wrap">
                        <label>公司名称：</label>
                        <span><?php echo $user['coname']?></span>

                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control wrap">
                        <label>公司地址：</label>
                        <input type="text" name="address" value="<?php echo $zlg?$zlg['address']:set_value('address'); ?>" class="input-normal"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control wrap">
                        <label><span class="xing">*</span> 联系人：</label>
                        <input type="text" name="contacts" class="input-normal" value="<?php echo $zlg?$zlg['contacts']:set_value('contacts'); ?>"/>
                    </div>
                </div>

                <!--
                <div class="form-group">
                    <div class="form-control wrap">
                        <label>微信号：</label>
                        <input type="text" name="wechat" class="input-normal" value="<?php echo $user['wechat']?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control wrap">
                        <label>QQ号：</label>
                        <input type="text" name="wechat" class="input-normal" value="<?php echo $user['qq']?>"/>
                    </div>
                </div>


                -->
                <div class="form-group">
                    <div class="form-control wrap">
                        <label><span class="xing">*</span> 联系电话：</label>
                        <input type="text" name="mobile" class="input-normal" value="<?php echo $zlg?$zlg['mobile']:($user['mobile']?$user['mobile']:set_value('mobile'));?>"/>
                    </div>
                </div>

                <div class="form-group" style="text-align: center;  "><?php echo validation_errors()?validation_errors():($formerror?$formerror:''); ?></div>

                <div class="form-group">
                    <div class="form-control wrap">
                        <label></label>
                        <input type="submit" class="btn btn-main" id="fileSubmit" value="发布" style="font-size: 16px"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>