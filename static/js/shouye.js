$(function(){
    //��������ͷ��
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
    //�������������ɫ
    $('.head nav ul li a').click(function(){
        $(this).addClass('active');
        $(this).parent().siblings().find('a').removeClass('active');
    });
    $('.head nav ul li a').hover(function(){
        $(this).css('background-color','#ff3c5a').css('color','#fff');
    },function(){
        $(this).css('background-color','#fff').css('color','#ff3c5a');

    });
    $('input.sousuo').focus(function(){
        $(this).attr('placeholder','');
    });

    //���ù��λ�ĸ߶�
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
    //����΢��div
$('.gwwx').hover(function(){
    $('.gwwxdiv').show();
},function(){
    $('.gwwxdiv').hide();

});
});