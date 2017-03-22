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
    <div class="main">
        <div class="middle">
            <div class="buzhou">
                <span class="step step1"><?php echo $hang[$this->uri->segment(3, 0)];?> <a href="/pub/selest">重写</a></span>
                <span class="step b"> > </span>
                <span class="step step2"><?php echo $zhi[$this->uri->segment(4, 0)];?> <a href="/pub/selest/<?php echo $this->uri->segment(3, 0);?>">重写</a></span>
                <span class="step b"> > </span>
                <span class="step step3 stress"> 填写信息 </span>
                <span class="step b"> > </span>
                <span class="step step4"> 完成发布 </span>
            </div>
        </div>
        <div class="infor">
            <h1>填写信息</h1>

            <form method="post" action="<?php echo base_url();?>pub/index/<?php echo $this->uri->segment(3, 0);?>/<?php echo $this->uri->segment(4, 0);?>" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-control">
                        <label><span class="xing">*</span>标题：</label>
                        <input name="title" type="text" class="input-normal" value="<?php echo $baseinfo?$baseinfo['info1']:set_value('title'); ?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-control wrap">
                        <label><span class="xing">*</span>服务内容：</label>
                        <div class="check">
                            <?php foreach ($gong as $k => $v):?>
                            <div class="marginr">
                                <input type="checkbox" name="job_code[]" value="<?php echo $k;?>"/><span><?php echo $v;?></span>
                            </div>
                            <?php endforeach;?>
                            <div class="margin-right">
                                <span class="allcheck allcheck1">全选</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control wrap">
                        <label><span class="xing">*</span>服务区域：</label>
                        <div class="check">
                            <?php foreach ($area[0] as $k => $v):?>
                            <div class="marginr">
                                <input type="checkbox" name="districtid[]" value="<?php echo $k;?>"/><span><?php echo $v;?></span>
                            </div>
                            <?php endforeach;?>

                            <div class="margin-right">
                                <span class="allcheck allcheck2" id="quanxuan">全选</span>
                            </div>
                        </div>

                    </div>
                    <?php foreach ($area[0] as $k => $v):?>
                    <div class="form-control wrap jiedao" id="jiedao<?php echo $k?>" style="display: none;">
                        <label><span class="xing">*</span><?php echo $v?>：</label>
                        <div class="check">
                            <?php foreach ($area[1][$k] as $k => $v):?>
                                <div class="marginr">
                                    <input type="checkbox" name="areaid[]" value="<?php echo $k;?>"/><span><?php echo $v;?></span>
                                </div>
                            <?php endforeach;?>

                            <div class="margin-right">
                                <span class="allcheck allcheck2">全选</span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="form-group">
                    <div class="form-control wrap">
                        <label>服务介绍：</label>
                        <textarea name="fwjs"><?php echo $baseinfo?$baseinfo['info3']:set_value('fwjs'); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="upload_box form-control wrap">
                        <label>上传图片：</label>
                        <div class="upload_main imgs">
                            <div id="preview" class="upload_preview"></div>

                            <div class="upload_choose">
                                <label for="fileImage" style="display: block"> <img src="/static/images/publish/xz.png" alt="" class="sctp"/></label>
                                <input type="file" id="fileImage" name="fileselect[]" style="display: none;" multiple="multiple"/>
                                <p style="margin-top: 20px;color: #888888;font-size: 14px">最多可上传8张图片，每张不超过5M(按住Ctrl键进行多选)</p>
                            </div>

                        </div>

                        <input type="hidden" name="delfile" id="delfile">
                    </div>
                </div>
                <?php if($_SESSION['is_co']==1):?>
                <div class="form-group">
                    <div class="form-control wrap">
                        <label>公司名称：</label>
                        <span><?php echo $user['coname']?></span>

                    </div>
                </div>
                <?php endif;?>
                <div class="form-group">
                    <div class="form-control wrap">
                        <label><?php echo $user['is_co']==1?'公司地址':'联系地址'?>：</label>
                        <input type="text" name="address" class="input-normal" value="<?php echo $user['address']?>"/>
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

                <div class="form-group">
                    <div class="form-control wrap">
                        <label><span class="xing">*</span> 联系人：</label>
                        <input type="text" class="input-normal" value=""/>
                    </div>
                </div>
                -->
                <div class="form-group">
                    <div class="form-control wrap">
                        <label><span class="xing">*</span> 联系电话：</label>
                        <input type="text" name="mobile" class="input-normal" value="<?php echo $user['mobile']?>"/>
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