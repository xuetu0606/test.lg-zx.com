$(function(){
    $('.passimg').click(function(){
        var val;
        var unvisiable=$('#unvisiableInput');
        var visiable=$('#visiableInput');
//            alert(pass);
        if(unvisiable.css('display')=='block'){
            val=unvisiable.val();
            unvisiable.css('display','none');
            visiable.css('display','block');
            $('#unvisiableImg').css('display','none');
            $('#visiableImg').css('display','block');
            visiable.val(val);
        }
        else{
            val=visiable.val();
            visiable.css('display','none');
            unvisiable.css('display','block');
            $('#visiableImg').css('display','none');
            $('#unvisiableImg').css('display','block');
            unvisiable.val(val);
        }
    });
    $('.rememberp').click(function(){
        $(this).css('display','none');
        if($(this).prop('class')=='rememberp imgtwo'){
            $('.imgone').css('display','inline-block');
            $('#rememberBox').prop('checked',true);
        }
        else{
            $('.imgtwo').css('display','inline-block');
            $('#rememberBox').prop('checked',false);
        }
    });
})