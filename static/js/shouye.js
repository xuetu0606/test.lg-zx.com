$(function(){
    //下拉出现头部
    if($(document).scrollTop()>=210){
        $('.hiddenHeader').css('display','block');
    }else{
        $('.hiddenHeader').css('display','none');
    };
    $(window).scroll(function(){
        if($(document).scrollTop()>=210){
            $('.hiddenHeader').css('display','block');
        }else{
            $('.hiddenHeader').css('display','none');
        }
    });
    //点击导航栏变颜色
    $('.head nav ul li a').click(function(){
        $(this).addClass('active');
        $(this).parent().siblings().find('a').removeClass('active');
    });
    $('input.sousuo').focus(function(){
        $(this).attr('placeholder','');
    });

    //设置广告位的高度
    {
        var mainH=$('.main1').css('height');
        var demoH=$('.main2').children('.demo').css('height');
        var adsH=parseFloat(mainH)-parseFloat(demoH)+'px';
        var h=parseFloat(adsH)+parseFloat(demoH)+'px';
        $('.ads').css('height',adsH);
        $('.main2').css('height',h);
        console.log(mainH);
        console.log(demoH);
        console.log(adsH);
    }
});