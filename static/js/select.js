$(function(){
    $('span.xl').click(function(){
        var ul=$(this).siblings('ul.list-group');
        if(ul.css('display')=='none'){
            ul.show();
        }else{
            ul.hide();
        }
    });
    $('.list-group-item').click(function(){
        $(this).parent().parent().children('.option').text($(this).text());
        $(this).parent().hide();
        if($(this).data('unit')){
            $("#unit").val($(this).data('unit'))
        }
        if($(this).data('circle')){
            $("#pay_circle").val($(this).data('circle'))
        }

    });
    $(document).bind("click", function (e) {
        var target = $(e.target);
        if(target.closest(".fuji").length == 0){
            //进入if则表明点击的不是#province,#proDiv元素中的一个
            $("ul.list-group").hide();
        }
        e.stopPropagation();
    });
});
