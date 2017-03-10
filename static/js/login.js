/**
 * Created by Administrator on 2017/3/3.
 */
$(function(){
   $('span.type').click(function(){
       $(this).css('background-color','#c6c6c6');
       $(this).siblings().css('background-color','#ffffff');
   })
});