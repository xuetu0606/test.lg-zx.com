<section>
    <div class="main">
        <p>恭喜您发布成功！</p>
        <p>本次扣除<?PHP echo $isvip?'0':'2'; ?>个零工币，您的零工币余额为<?php echo $credit1; ?>个。</p>
        <p><a href="/user/publish">继续发布</a>  <a href="/user">零工宝</a> <span id="show"></span> </p>
    </div>
</section>

<style>
    div.main{
        margin-top: 50%;
    }
    p{
        margin: 1rem 0;
        font-size: 1.2rem;
        text-align: center;
        color: #ff3c5a;
    }
</style>
<script type="text/javascript">
    var t=5;//设定跳转的时间
    setInterval("refer()",1000); //启动1秒定时
    function refer(){
        if(t==0){
            location="http://<?php echo $localhost;?>/user"; //#设定跳转的链接地址
        }
        document.getElementById('show').innerHTML=""+t+"秒后跳转到零工宝"; // 显示倒计时
        t--; // 计数器递减
        //本文转自：
    }
</script>