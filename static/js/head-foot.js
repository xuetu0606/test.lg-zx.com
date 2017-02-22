/**
 * Created by Administrator on 2016/12/30.
 */
$(function(){
    //$('#sousuo').click(function(){
    //    alert("这是一个button按钮");
    //});
    var id=$('#inputWidth');
    var iwidth=id.css('width');
    var padding=id.css('padding-left');
    var left=parseFloat(iwidth.substring(0,iwidth.length-2))+parseFloat(padding.substring(0,padding.length-2));
    left=left+8+'px';
    $('#sousuo').css('left',left);


    $('#inputWidth').focusin(function(){
        //var height=$(window).height()+'px';
        var height;
        if(document.body.clientHeight>=window.screen.height)
            height=document.body.clientHeight+20+"px";
        else
            height=window.screen.height+20+"px";
        $('#searchbg').css('display','block').css('height',height);
        $('#hideSearch').css('display','block');
        $('#shurukuang').focus();
    });
    $('#clear').click(function(){
        $('#shurukuang').val('');
        $(".find").html('');
    });
    $('#cancel').click(function(){
    	$('#shurukuang').val('');
        $(".find").html('');
        $('#searchbg').css('display','none');
        $('#hideSearch').css('display','none');
        
    });
});
