<script src="/static/js/jquery-ui.js"></script>
<div class="header-bottom">

    <div class="search">
        <form >
            <input placeholder="<?php if(!$k){echo "请输入要搜索的工种";} ;?>" id="inputWidth" type="text" value='<?php echo $k;?>' >
            <!--<a href="./search.html" id="sousuo"></a>-->
            <!--<input type="button" id="sousuo" value="搜索"/>-->
            <!--<div id="sousuo"></div>-->
        </form> 
    </div>
    <div class="hot">
        <span>热门搜索：</span>
        <a href="<?php echo site_url("/lista/index/l1/1/l2/2/l3/3")?>"><span>月嫂</span></a>
        <a href="<?php echo site_url("/lista/index/l1/33/l2/75")?>"><span>搬家</span></a>
        <a href="<?php echo site_url("/lista/index/l2/329/l1/328")?>"><span>维修</span></a>
    </div>
    <div id="searchbg" style="display: none; height: 854px;"></div>
    <div id="hideSearch" style="display: none;">
    <form action="/lista/searchlist" method="POST">
        <div class="shuru">
            <input id="shurukuang" type="text" name='k'>
            <img src="/static/images/header/clear.gif" alt="清除" id="clear">
            <a href="javascript:void(0);" id="cancel">取消</a>
        </div>
        <div class="find">
           
        </div>
     </form>    
    </div>
   
</div>
<script>

/*数据库*/
  $("#shurukuang").autocomplete({
   source: function( request, response ) {
    var name=$.ui.autocomplete.escapeRegex( request.term );
    response( $.grep( DataSouce2(name), function( item ){
     return  item;
    }) );
   }
  });
 
 
  
    //利用ajax根据输入的到数据库查找 相当于
  function DataSouce2(name)
  {
	var mycars=new Array()
	$.ajax({
			url: '<?php echo site_url("lista/ajaxsearch")?>',
			type: "POST", 
//			dataType: 'json',
			data: {key:$("#shurukuang").val()},
			async: false,
			error: function(){
				alert('检测失败，请重试');
			},
			success: function(data){
//				var time = '<?php // echo time();?>';
				$(".find").html(data);
				//alert(data);
			}
		});
  

  }
  </script>