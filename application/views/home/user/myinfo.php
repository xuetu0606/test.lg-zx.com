

            <div class="content">
                <p class="title">
                    <span class="gz-zlg">基本资料</span>
                    <span>修改密码</span>
                </p>
                <div class="wdzl fbgz">
                    <form action="/user/myInfo" method="post" id="infoform" enctype="multipart/form-data">
                        <div class="tx">
                            <img src="/static/images/tx.png" alt=""/>
                            <label for="ghtx" class="file">更换头像</label>
                            <input type="file" name="infoimg" id="ghtx" style="visibility: hidden"/>
                        </div>
                        <div class="form-group">
                            <label>用户名：</label>
                            <span><?php echo $_SESSION['username']?></span>
                        </div>
                        <div class="form-group">
                            <label>注册地：</label>
                            <span><?php echo $info['province'].' '.$info['city'];?></span>
                        </div>
                        <div class="form-group">
                            <label><span class="xing">*</span>手机：</label>
                            <input type="tel" name="mobile" value="<?php echo $info?$info['mobile']:set_value('mobile');?>" class="input-normal"/>
                            <a href="#">更换手机</a>
                        </div>
                        <div class="form-group">
                            <label><span class="xing">*</span>邮箱：</label>
                            <input type="email" name="email" value="<?php echo $info?$info['email']:set_value('email');?>" class="input-normal"/>
                            <a href="#">绑定邮箱</a>
                        </div>
                        <div class="form-group">
                            <label>微信：</label>
                            <input type="text" name="wechat" value="<?php echo $info?$info['wechat']:set_value('wechat');?>" class="input-normal"/>

                        </div>
                        <div class="form-group">
                            <label>QQ：</label>
                            <input type="text" name="qq" value="<?php echo $info?$info['qq']:set_value('qq');?>" class="input-normal"/>

                        </div>
                        <div class="form-group">
                            <label>联系地址：</label>
                            <input type="text" name="address" value="<?php echo $info?$info['address']:set_value('address');?>" class="input-normal"/>

                        </div>
                        <?php if($_SESSION['is_co'] == 1){ ?>
                            <div class="form-group">
                                <label>公司名称：</label>
                                <input type="text" name="coname" class="input-normal" value="<?php echo $info?$info['coname']:set_value('coname');?>"/>
                            </div>
                            <div class="form-group">
                                <label>公司规模：</label>
                                <select name="scale">
                                    <?php foreach($scale as $key => $value){ ?>
                                        <option value="<?php echo $key + 1; ?>"><?php echo $value['name']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        <?php }else{ ?>
                            <div class="form-group">
                                <label>昵称：</label>
                                <input type="text" name="nickname" class="input-normal" value="<?php echo $info?$info['nickname']:set_value('nickname');?>"/>
                            </div>

                            <div class="form-group">
                                <label>姓名：</label>
                                <input type="text" name="realname" class="input-normal" value="<?php echo $info?$info['realname']:set_value('realname');?>"/>
                            </div>

                            <div class="form-group">
                                <label><span class="xing">*</span>性别：</label>
                                <div class="radio">
                                    <input type="radio" name="sex" value="1" <?php echo $info['sex']==1?'checked':''?>/><span>男</span>
                                </div>
                                <div class="radio">
                                    <input type="radio" name="sex" value="2" <?php echo $info['sex']==2?'checked':''?>/><span>女</span>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label><?php echo $_SESSION['is_co'] == 1?'公司简介':'我的简介'?>：</label>
                            <textarea name="info"><?php echo $info['info']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label></label>
                            <span><?php echo $error;?></span>
                        </div>

                        <div class="form-group">
                            <label></label>
                            <input type="submit" value="保存" class="btn btn-primary"/>
                        </div>
                    </form>


                </div>
                <div class="wdzl zlg">
                    <form action="">
                        <div class="form-group">
                            <label>旧密码：</label>
                            <input type="text" class="input-normal"/>
                        </div>
                        <div class="form-group">
                            <label>新密码：</label>
                            <input type="text" class="input-normal"/>
                        </div>
                        <div class="form-group">
                            <label>确认密码：</label>
                            <input type="text" class="input-normal"/>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input type="submit" value="修改" class="btn btn-primary"/>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    </div>
</section>