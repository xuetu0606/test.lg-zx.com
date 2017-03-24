<div class="content">
    <div class="rzgl scxx fbgz">
        <table>
            <thead>
            <tr>
                <th>认证信息</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php if($user){?>
            <tr>
                <td><img src="./images/lgb/dh.png" alt=""/><span class="rz">手机已认证</span></td>
                <td>1566****4568 <a href="#">更换</a></td>
            </tr>
            <?php }?>
            <tr>
                <td><img src="./images/lgb/dh.png" alt=""/><span class="rz">邮箱已认证</span></td>
                <td>2654564@qq.com <a href="#">更换</a></td>
            </tr>
            <tr>
                <td><img src="./images/lgb/dh.png" alt=""/><span class="rz">实名已认证</span></td>
                <td>认证之后提高账户的信用等级和安全性 <a href="#">查看</a></td>
            </tr>
            <tr>
                <td><img src="./images/lgb/dh.png" alt=""/><span class="rz">营业执照已认证</span></td>
                <td>认证之后提高账户的信用等级和安全性 <a href="#">查看</a></td>
            </tr>
            <tr>
                <td><img src="./images/lgb/wrz.png" alt=""/><span class="wrz">手机未认证</span></td>
                <td>绑定手机可提高信息真实性，也可通过手机找回密码 <a href="#">绑定</a></td>
            </tr>
            <tr>
                <td><img src="./images/lgb/wrz.png" alt=""/><span class="wrz">邮箱未认证</span></td>
                <td>绑定邮箱可提高账户的安全性，也可通过邮箱找回密码 <a href="#">绑定</a></td>
            </tr>
            <tr>
                <td><img src="./images/lgb/wrz.png" alt=""/><span class="wrz">实名未认证</span></td>
                <td>认证之后提高账户的信用等级和安全性 <a href="#">认证</a></td>
            </tr>
            <tr>
                <td><img src="./images/lgb/wrz.png" alt=""/><span class="wrz">营业执照未认证</span></td>
                <td>认证之后提高账户的信用等级和安全性 <a href="#">认证</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</section>

<link rel="stylesheet" href="/static/css/lgb/title.css"/>
<link rel="stylesheet" href="/static/css/lgb/identify.css"/>
<section>
    <p class="title">
        <a href="/user/center"><</a>
        <span>实名认证</span>
    </p>
    <?php echo form_open_multipart('user/identify')?>

    <?php
if($this->session->is_co){
?>
    <div class="caution">
            <h3>营业执照注意事项</h3>
            <ul>
                <li>
                    (1) 营业执照需为加盖公司公章的副本复印件或扫描件；
                </li>
                <li>
                    (2) 证件要求完整、清晰；
                </li>
                <li>
                    (3) 证件上必须有工商部门的有效盖章；
                </li>
                <li>
                    (4) 证件必须在有效期内
                </li>
            </ul>
        </div>
    <div class="license company">
            <div>
                <span class="red">*</span><span>营业执照号</span>
                <input type="text" name="idno" value="<?php set_value('idno'); ?>"/>
                <span class="blue remind">请填写营业执照注册号</span>
            </div>
            <div class="id">
                <span class="red">*</span><span>营业执照扫描件</span>
                <input type="file" name="idno_img" value="<?php set_value('idno_img'); ?>" />
                <span class="blue remind">图片格式为gif、jpg、jpeg、png,大小不超过2M</span>
            </div>
            <div>
                <span class="red">*</span><span>公司名称</span>
                <input type="text" name="coname" value="<?php set_value('coname'); ?>"/>
                <span class="blue remind">需与营业执照一致</span>
            </div>
        </div>
<?php
}else{
?>
    <div class="license">
        <div>
            <span class="red">*</span><span>姓名</span>
            <input type="text" name="realname" value="<?php set_value('realname'); ?>"/>
            <span class="blue remind">请输入真实姓名</span>
        </div>
        <div>
            <span class="red">*</span><span>身份证号</span>
            <input type="text" name="idno" value="<?php set_value('idno'); ?>"/>
            <span class="blue remind">请输入18位身份证号码</span>
        </div>
        <div class="id">
            <span class="red">*</span><span>身份证扫描件</span>
            <input type="file" name="idno_img" value="<?php set_value('idno_img'); ?>" />
            <span class="blue remind">图片格式为gif、jpg、jpeg、png,大小不超过2M</span>
        </div>

    </div>
<?php
}
?>

    <div class="error"><?php validation_errors();?><?php echo $error;?></div>
    <input type="submit" value="提交" class="submit"/>
    </form>
    <div class="right">
        <span class="red">注 *</span>
        <span>为必填项</span>
    </div>
</section>
