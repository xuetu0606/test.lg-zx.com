/**
 * Created by Administrator on 2017/2/28.
 */
$(function(){
    //悬浮出现下拉框
    $('.lgbxl').mouseover(function(){
        $('div.lgb').css('display','block');
    });
    $('div.lgb').hover(function(){
        $('div.lgb a.lgba').mouseover(function(){
            $(this).addClass('a-backcolor').siblings().removeClass('a-backcolor');
        });
    },function(){
        $('div.lgb').css('display','none');

    });
    $('.wxb').hover(function(){
        $('div.wx').css('display','block');
    },function(){
        $('div.wx').css('display','none');

    });
    $('div.wx').hover(function(){
        $(this).css('display','block');
    },function(){
        $(this).css('display','none');

    });
    //判断滚动条，设置下拉框位置
    {
        console.log($(document).height());
        console.log($(document.body).height());
        if($(document).height()<=$(document.body).height()+2)//有滚动条
        {
            $('div.lgb').css('right','322px');
            $('div.wx').css('right','240px');
        }
        else{
            $('div.lgb').css('right','332px');
            $('div.wx').css('right','250px');
        }

    }
});
