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
            <tr>
                <td><img src="/static/images/lgb/dh.png" alt=""/><span class="rz">手机已认证</span></td>
                <td><?php echo strlen($info['mobile'])==11?substr_replace($info['mobile'],"****",4,4):"";?> <a href="#">更换</a></td>
            </tr>
            <?php if($user['is_real']==1){?>
                <?php if($user['is_co']==1){?>
                    <tr>
                        <td><img src="/static/images/lgb/wrz.png" alt=""/><span class="wrz">营业执照未认证</span></td>
                        <td>认证之后提高账户的信用等级和安全性 <a href="/rz">查看</a></td>
                    </tr>
                <?php }else{?>
                    <tr>
                        <td><img src="/static/images/lgb/dh.png" alt=""/><span class="rz">实名已认证</span></td>
                        <td>认证之后提高账户的信用等级和安全性 <a href="/rz">查看</a></td>
                    </tr>
                <?php }?>
            <?php }else{?>
                <?php if($user['is_co']==1){?>
                    <tr>
                        <td><img src="/static/images/lgb/dh.png" alt=""/><span class="rz">营业执照已认证</span></td>
                        <td>认证之后提高账户的信用等级和安全性 <a href="/rz/app">认证</a></td>
                    </tr>
                <?php }else{?>
                    <tr>
                        <td><img src="/static/images/lgb/wrz.png" alt=""/><span class="wrz">实名未认证</span></td>
                        <td>认证之后提高账户的信用等级和安全性 <a href="/rz/app">认证</a></td>
                    </tr>
                <?php }?>

            <?php }?>
            <!--
            <tr>
                <td><img src="/static/images/lgb/dh.png" alt=""/><span class="rz">邮箱已认证</span></td>
                <td>2654564@qq.com <a href="#">更换</a></td>
            </tr>

            <tr>
                <td><img src="/static/images/lgb/wrz.png" alt=""/><span class="wrz">邮箱未认证</span></td>
                <td>绑定邮箱可提高账户的安全性，也可通过邮箱找回密码 <a href="#">绑定</a></td>
            </tr>
-->

            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</section>