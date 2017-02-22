<?php if($flag == 1){//如果来源非本站或无来源则跳转到指定城市首页?>
<script src="/static/js/jquery.js"></script>
<script src="/static/js/jquery.cookie.js"></script>
<script src="http://api.map.baidu.com/api?ak=o5MUaFvndY1ua85QVEWTHktkAE2FnLRG&v=2.0&services=false"></script>
<script>
//	var cookies = $.cookie('city');
//	if(cookies){
//		var str = new String(window.location);
//		var str2 = str.slice(7);
//		window.location='http://' + cookies + '-' + str2;//拼接URL地址
//	}else{
		navigator.geolocation.getCurrentPosition(function (position) {
          var lat = position.coords.latitude;
          var lon = position.coords.longitude;
          var point = new BMap.Point(lon, lat);  // 创建坐标点
          // 根据坐标得到地址描述
          var myGeo = new BMap.Geocoder();
          myGeo.getLocation(point, function (result) {
          var city = result.addressComponents.city;

		  var city = city.substring(0,2);
		  //alert(city);
		//console.log(typeof(city));
		var json_city = JSON.parse('<?php echo $citylist_json?>');
		//console.log(json_city);
		for(var i in json_city){
			if(city == i){
				var str = new String(window.location);
				var str2 = str.slice(7);
				window.location='http://' + json_city[i] + '-' + str2;
			}
		}
		
         });

    });
//	}
//	window.location='http://qd-m.lg-zx.com';//若不跳转则默认到青岛
 </script>
<?php }else{?>
<script src="/static/js/jquery.cookie.js"></script>
<link rel="stylesheet" href="/static/css/city.css"/>
<div class="main">
    <!--<div id="square">-->
        <!--A-->
    <!--</div>-->
    <div id="letter">
        <p>按字母排序</p>
        <div class="l">
            <ul>
			<?php foreach($getCityGroup as $key => $value){ ?>
                <li><a href="#<?php echo strtoupper($value['py']); ?>"><?php echo strtoupper($value['py']); ?></a></li>
			<?php } ?>
            </ul>
        </div>
    </div>
	<?php foreach($grouplist as $key => $value){ ?>
    <div class="demo">
        <p id="<?php echo strtoupper($key); ?>"><?php echo strtoupper($key); ?></p>
        <div class="ul">
            <ul id="city_group">
			<?php foreach($value as $k => $v){ ?>
                <li data="<?php echo $k; ?>" ><a href="javascript:void(0);"><?php echo $v; ?></a></li>
			<?php } ?>
            </ul>
        </div>
    </div>
	<?php } ?>
</div>
<script type="text/javascript">
	function setCookie(name,value)
		{
		  var Days = 30;
		  var exp = new Date();
		  exp.setTime(exp.getTime() + Days*24*60*60*1000);
		  document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+";path=/;domain=lg-zx.com;";
		}
	
	$(document).ready(function(){
	    $('#city_group li').on('click', function (e){
		    var city = $(this).attr('data');
		    //alert(city);获取到城市的拼音
		    setCookie('city',city);
			var str = new String(window.location);
			var str_arr = str.split('#');
			var str2 = str_arr[0].slice(7);
			//alert(city);
			//alert(str2);
		    window.location='http://' + city + '-' + str2;//拼接URL地址
			
		    //alert(window.location);
	    });
	});
</script>
<?php } ?>