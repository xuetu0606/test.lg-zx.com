<div class="content">
    <p style="background-color: #ededed;">
        <span style="margin-left: 20px;height: 24px;line-height: 24px;">认证信息</span>
    </p>
    <?php if($user['is_real']==0){?>
    <div class="ghyx">
        <p class="buzhou">
            <span>填写信息</span>
            <span> > </span>
            <span class="stress">等待审核</span>
            <span> >  </span>
            <span>完成</span>
        </p>
        <div class="success" style="margin-top: 60px;">
            <p style="color: #ff3c5a;">上传成功！</p>
            <p>请在24小时之后查看结果</p>
        </div>

    </div>
    <?php }else{?>
    <div class="ghyx" style="margin:40px 0;">
        <p class="buzhou">
            <span class="stress">填写信息</span>
            <span> > </span>
            <span>等待审核</span>
            <span> >  </span>
            <span>完成</span>
        </p>
        <?php if($this->session->is_co==1){?>
            <form action="/rz/app" style="margin-left: 30px;" method="post" enctype="multipart/form-data">
                <!--<div class="form-group">
                    <label>选择单位类型</label>
                    <div class="select">
                        <div class="fuji">
                            <div class="option"></div>
                            <span class="xl"><img src="/static/images/form/xl.png" alt=""/></span>
                            <ul class="list-group">
                                <a href="#" class="list-group-item">企业</a>
                                <a href="#" class="list-group-item">个体工商户</a>
                                <a href="#" class="list-group-item">民办非企业单位</a>
                                <a href="#" class="list-group-item">事业单位</a>
                                <a href="#" class="list-group-item">社会团体</a>
                                <a href="#" class="list-group-item">外国（地区）企业常驻代表机构</a>
                            </ul>
                        </div>
                    </div>
                </div>-->
                <div class="form-group">
                    <label>企业名称</label>
                    <input type="text" class="input-normal" name="coname" placeholder="与营业执照一致"/>
                </div>
                <!--
                <div class="form-group">
                    <label>企业简称</label>
                    <input type="text" class="input-normal" placeholder="如：零工在线"/>
                </div>
                -->
                <div class="form-group">
                    <label>注册号</label>
                    <input type="text" name="idno" class="input-normal"/>
                </div>
                <!--
                <div class="form-group">
                    <label>法人姓名</label>
                    <input type="text" class="input-normal"/>
                </div>
                <div class="form-group">
                    <label>营业执照期限</label>
                    <input type="text" id="c4" class="input-short input" placeholder="2015-02-12" style="color: #999;"/>
                    <img align="absmiddle" src="images/lgb/rq_hui.png" onclick="J.calendar.get({id:'c4'});" style="vertical-align: middle;margin-top: -2px;"/>
                    <span style="vertical-align: middle;margin: 0 10px;">至：</span>
                    <input type="text" id="enddate" class="input-short input" placeholder="2018-02-12" style="color: #999;"/>
                    <img align="absmiddle" src="images/lgb/rq_hui.png" onclick="J.calendar.get({id:'enddate'});"style="vertical-align: middle;margin-top: -2px;"/>
                </div>
                <div class="form-group">
                    <label></label>
                    <div class="radio">
                        <input type="radio"/><span>长期</span>
                    </div>
                    <span>（若无营业期限则选择长期）</span>
                </div>
                <div class="form-group">
                    <label>验证码</label>
                    <input type="text" class="input-short input"/>
                    <img src="/static/images/yzm.png" style="vertical-align: middle;margin: -2px 10px;"/>
                    <a href="#" style="color: #2f2aff;font-size: 12px;">看不清？换个验证码</a>
                </div>
                -->
                <div class="form-group wrap">
                    <label>上传照片</label>
                    <div id="localImag" style="display: inline-block"><img id="preview" width=-1 height=-1 style="diplay:none" /></div>

                    <label for="sc" style="display: block;margin-left: 120px;"> <img src="/static/images/publish/xz.png" style="margin-left: 25px;margin-top: 10px;"/>
                    </label>
                    <input type="file" id="sc" name="idno_img" style="display: none;" onchange="javascript:setImagePreview()"/>
                </div>
                <div class="form-group wrap" style="margin-top: 30px;">
                    <label></label>
                    <div style="display: inline-block"><p style="color: #ff3c5a;font-size: 13px;">注意：图片必须为清晰原件照片：注册号、企业名称、法人代表，年检章等清晰可辨。</p>
                        <span style="color: #ff3c5a;font-size: 13px;">支持.jpg .jpeg .png .gif 的图片格式，图片大小不超过12M</span></div>
                </div>
                <div class="form-group" <?php echo $error?'':'style="display: none"'?>>
                    <label></label>
                    <span style="color: #ff3c5a;font-size: 13px;"><?php echo $error?></span>
                </div>
                <div class="form-group" style="height: auto;margin-top: 30px;">
                    <label></label>
                    <input type="submit" class="btn btn-primary" value="提交"/>
                </div>
            </form>
        <?php }else{?>
            <form action="/rz/app" method="post" style="margin-left: 30px;" enctype="multipart/form-data">
                <div class="form-group">
                    <label>真实姓名</label>
                    <input type="text" name="realname" value="<?php echo set_value('is_co')?set_value('is_co'):$user['realname']?>" class="input-normal"/>
                </div>
                <div class="form-group">
                    <label>身份证号码</label>
                    <input type="text" name="idno" value="<?php echo set_value('is_co')?>" class="input-normal"/>
                </div>
                <div class="form-group" style="height: auto;">
                    <label>上传证件</label>
                    <!--<div class="zm" style="display:inline-block;margin-right: 40px;vertical-align:top">
                        <img src="/static/images/lgb/fl.png" alt="" style="vertical-align:top;width: 235px;height: 140px;"/>
                        <p style="margin-top: 10px;text-align: center;">身份证正面照</p>
                    </div>-->
                    <div class="zm" style="display:inline-block;vertical-align:top">

                        <div id="localImag" style="display: inline-block"><img id="preview" src="/static/images/lgb/fanl.png" alt="" style="vertical-align:top;width: 235px;height: 140px;"/></div>
                        <p style="margin-top: 10px;text-align: center;">手持身份证照</p>
                    </div>
                </div>
                <div class="form-group scsfz" style="height: auto;margin-top: 30px;">
                    <label></label>
                    <!--<div>
                        <p class="p1">
                            上传手持身份证照
                        </p>
                        <label for="sc"> <img src="/static/images/publish/xz.png" style="margin-left: 25px;margin-top: 10px;"/>
                        </label>
                        <input type="file" id="sc" style="display: none;"/>
                    </div>-->
                    <div>
                        <p class="p1">
                            上传身份证正面照
                        </p>
                        <label for="sc"> <img src="/static/images/publish/xz.png" style="margin-left: 25px;margin-top: 10px;"/>
                        </label>

                        <input type="file" name="idno_img" id="sc" style="display: none;" onchange="javascript:setImagePreview()"/>
                    </div>
                </div>
                <div class="form-group" style="height: auto;margin-top: 30px;">
                    <label></label>
                    <span style="color: #ff3c5a;font-size: 13px;">注意：请按样图上传图片，证件需清晰有效且为原件数码照，支持.jpg .jpeg .png .gif 的图片格式，图片大小不超过4M</span>
                </div>
                <div class="form-group" <?php echo $error?'':'style="display: none"'?>>
                    <label></label>
                    <span style="color: #ff3c5a;font-size: 13px;"><?php echo $error?></span>
                </div>
                <div class="form-group" style="height: auto;margin-top: 30px;">
                    <label></label>
                    <input type="submit" class="btn btn-primary" value="确定"/>
                </div>
            </form>
        <?php }?>
    </div>
    <?php }?>
    <!--
    <div class="ghyx">
        <p class="buzhou">
            <span>填写信息</span>
            <span> > </span>
            <span class="stress">等待审核</span>
            <span> >  </span>
            <span>完成</span>
        </p>
        <div class="success" style="margin-top: 100px;">
            <img src="/static/images/lgb/dih.png" alt=""/><span>认证成功！</span>
        </div>

    </div>
    -->
</div>
</div>
</div>
</section>

<script>
    function setImagePreview() {
        var docObj=document.getElementById("sc");

        var imgObjPreview=document.getElementById("preview");
        if(docObj.files &&    docObj.files[0]){
            //火狐下，直接设img属性
            imgObjPreview.style.display = 'block';
            imgObjPreview.style.width = '300px';
            imgObjPreview.style.height = '120px';
            //imgObjPreview.src = docObj.files[0].getAsDataURL();

            //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
            imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);

        }else{
            //IE下，使用滤镜
            docObj.select();
            var imgSrc = document.selection.createRange().text;
            var localImagId = document.getElementById("localImag");
            //必须设置初始大小
            localImagId.style.width = "300px";
            localImagId.style.height = "120px";
            //图片异常的捕捉，防止用户修改后缀来伪造图片
            try{
                localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
            }catch(e){
                alert("您上传的图片格式不正确，请重新选择!");
                return false;
            }
            imgObjPreview.style.display = 'none';
            document.selection.empty();
        }
        return true;
    }
</script>