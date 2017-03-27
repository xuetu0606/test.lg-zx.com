    <link rel="stylesheet" href="/static/css/workInfor.css"/>
    <link rel="stylesheet" href="/static/css/form.css"/>
    <link rel="stylesheet" href="/static/css/detail.css"/>
    <script src="/static/js/jquery.js"></script>
    <script src="/static/js/head-foot.js"></script>
    <script src="/static/js/detail.js"></script>
    <script src="/static/js/star.js"></script>
<div class="full">
    <div class="main">
        <img src="/static/images/LOGOa.png" alt="" class="logo"/>
        <form action="<?php echo site_url('Listlg/lgsearch'); ?>" method="POST" >
            <input type="text" class="input-normal" name="search" />
            <input type="submit" value="" class="fdj"/>
        </form>
        <a href="#">免费发布信息</a>
    </div>
</div>
<section><?php  
// var_dump($person); 
// var_dump($pl);
//  var_dump($firms);
?>
    <div class="position">
        <a style="color:#000;" href="<?php echo site_url('home/index'); ?>"><span><?php echo $cityname?$cityname:$city; ?>零工在线</span></a>
        <span> > </span>
        <a style="color:#000;" href="<?php echo site_url('listlg/index/l1/'.$job_name[0]['id']); ?>"><span><?php echo $job_name['name1']; ?></span></a>
        <span> > </span>
        <span><?php echo $job_name['name2']; ?></span>
    </div>
    <div class="main">
        <div class="title">
            <div class="line1">
                <span class="name"><?php echo $person['info1']; ?></span>
                <span class="vip">
                <?php if($vip_endtime){ ?>
                <img src="/static/images/vip/vip1.png" alt=""/>
                <?php } ?></span>
                <?php if($person['is_real']){ //判断是否已经认证
                        if($person['is_co'] == 1){ //判断是公司类型
                ?>
                <span class="identify"><img src="/static/images/renzheng/yingyezhiz.png" alt=""/></span>
                <?php }else{ //判断是个人类型?>
                <span class="identify"><img src="/static/images/renzheng/person.png" alt=""/></span>
                <?php }} ?>
            </div>
            <div class="line2">
            <?php //判断奖牌规则
                if($person['is_real']){//是实名认证
                    $imgpath = 'jin';      
                }elseif($person['credit3']>=17){
                    $imgpath = 'jin';  
                }elseif($person['credit3']>=9){
                    $imgpath = 'yin';
                }elseif($person['credit3']>=4){ 
                    $imgpath = 'tong';
                }else{
                    $imgpath = 'wdj';
                }
            ?>
            <span>信用等级</span><img src="/static/images/section/3-list/<?php echo $imgpath; ?>.png" alt=""/>
                <img src="/static/images/vip/sj.png" alt="" class="clock"/>
                <span class="time"><?php date_default_timezone_set("PRC"); echo date("Y-m-d H:i",$person['addtime']); ?></span>
                <span>|</span>
                <span class="pageview"><?php echo $person['pv']; ?>次浏览</span>
            </div>
        </div>
        <div class="infor">
            <div class="scale">
                <?php if($person['is_co'] == 1){ ?>
                <p>
                    <span class="name">公司名称：</span>
                    <span class="content"><?php echo $firms['coname']; ?></span>
                </p>
                <?php }else{ ?>
                <p>
                    <span class="name">用 户 名：</span>
                    <span class="content"><?php echo $person['username']; ?></span>
                </p>
                <?php } ?>
                 <p>
                     <span class="name">服务内容：</span>
                     <span class="content"><?php foreach($person['job_name'] as $k => $value){ echo $value.'　'; } ?></span>
                 </p>
                <p>
                     <span class="name">服务范围：</span>
                     <span class="content">
                     <?php 
                        foreach($person['service_addr'] as $addr_k => $addr_v){
                            if($addr_v['areaname']){
                                echo $addr_v['areaname'].'　';
                            }else{
                                echo $addr_v['distname'].'　';
                            }
                        }
                     ?></span>
                 </p>
                <p>
                    <span class="name">联系地址：</span>
                    <span class="content"><?php echo $person['address']; ?></span>
                </p>
<!--                 <p>
    <span class="name">联系人：</span>
    <span class="content">王经理</span>
</p> -->
                <p>
                    <span class="name">联系电话：</span>
                    <span class="content stress"><?php echo $person['mobile']; ?></span>
                </p>
            </div>

        </div>
        <div class="introduce">
            <p class="line">
                <span class="active">服务介绍</span>
                <?php if($person['is_co'] == 1){ ?>
                <span>公司详情</span>
                <?php }else{ ?>
                <span>自我介绍</span>
                <?php } ?>
                <span>服务评价</span>
            </p>
            <div class="fwjs">
                <pre>
                    <?php echo $person['info3']; ?>
                </pre>
            </div>
            <div class="gsxq">
            <?php if($person['is_co'] == 1){ ?>
                <p>
                    <span class="name">公司名称：</span>
                    <span class="content"><?php echo $firms['coname']; ?></span>
                </p>
                <p>
                    <span class="name">公司规模：</span>
                    <span class="content"><?php echo $firms['name']; ?></span>
                </p>
                <p>
                    <span class="name">公司地址：</span>
                    <span class="content"><?php echo $person['address']; ?></span>
                </p>
                <p>
                    <span class="name">公司简介：</span>
                    <span class="content">
                        <?php echo $firms['info']; ?>
                    </span>
                </p>
            <?php }else{ ?>
                <p>
                    <span class="name">自我介绍：</span>
                    <span class="content"><?php echo $person['info2']; ?></span>
                </p>
            <?php } ?>
            </div>
            <div class="fwpj">
    <?php 
        if($_SESSION['uid']){ //判断是否登录
            if($flag){ //在控制器里定义了一个开关，查看是否评论过?>
                <p class="evaluate1">您已评价过该服务！</p>
    <?php   }else{ ?>
                <div class="evaluate3">
                    <form action="<?php echo site_url('listlg/evaluate'); ?>" method="POST" onsubmit=" return starsubmit()">
                    <div class="xingxing">
                        <div class="star">
                            <span>专业技能</span>
                            <div class="stardiv">
                                <div class="back"></div>
                                <img src="/static/images/star/xx.png" alt="" class="xing"/>
                            </div>
                            <div class="stardiv">
                                <div class="back"></div>
                                <img src="/static/images/star/xx.png" alt="" class="xing"/>
                            </div>
                            <div class="stardiv">
                                <div class="back"></div>
                                <img src="/static/images/star/xx.png" alt="" class="xing"/>
                            </div>
                            <div class="stardiv">
                                <div class="back"></div>
                                <img src="/static/images/star/xx.png" alt="" class="xing"/>
                            </div>
                            <div class="stardiv">
                                <div class="back"></div>
                                <img src="/static/images/star/xx.png" alt="" class="xing"/>
                            </div>
                            <!--<span class="txt">一般</span>-->
                            <input type="number" value="0" class='score' style="visibility: hidden" name='eva1'/>
                        </div>
                        <div class="star">
                            <span>服务及时</span>
                            <div class="stardiv">
                                <div class="back"></div>
                                <img src="/static/images/star/xx.png" alt="" class="xing"/>
                            </div>
                            <div class="stardiv">
                                <div class="back"></div>
                                <img src="/static/images/star/xx.png" alt="" class="xing"/>
                            </div>
                            <div class="stardiv">
                                <div class="back"></div>
                                <img src="/static/images/star/xx.png" alt="" class="xing"/>
                            </div>
                            <div class="stardiv">
                                <div class="back"></div>
                                <img src="/static/images/star/xx.png" alt="" class="xing"/>
                            </div>
                            <div class="stardiv">
                                <div class="back"></div>
                                <img src="/static/images/star/xx.png" alt="" class="xing"/>
   