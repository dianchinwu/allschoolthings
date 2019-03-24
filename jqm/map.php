<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" href="css/ast_style.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSnyMTQAIeclcmF-1y1ufEj3mzZb6sPx4&"type="text/javascript"></script>
    <!-- 顯示地圖 -->
    <script>
     	$(function(){
     		// 設定地圖的中心點
     		var map_div=document.getElementById("map_div");
     		// 取得經緯度 可改變數據
     		var lat=24.171901;
     		var lng=120.610742;      
     		// 把上面三個放進方法
     		var latlng=new google.maps.LatLng(lat,lng);
     		var gmap= new google.maps.Map(map_div,{
            zoom:17,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            // 設一個icon在地圖點上
     	    var marker = new google.maps.Marker({
                 position:latlng,
                 icon:"",
                 map:gmap,
                 title:"MY Company"
     	    });
     	    //監聽上方的marker 讓他執行下面的方法 放在icon會出現
     	    //google.maps.InfoWindow:彈出的訊息視窗
     	    //infowindow.open():在google map開啟訊息視窗
     	    google.maps.event.addListener(marker,"click",function(event){var infowindow = new google.maps.InfoWindow({
     	   	content:"彈性、多變的多元教學環境運用，創造學習空間新的組合。 校園環境設計採自然、流通、開放為原則並注重校園永續經營，生態、環保與節能的實踐。"//字串""//'<img1 src="images/as.png">'
            });
     	   	infowindow.open(gmap,marker);
     	   });
     	});
  
    </script>

</head>
<body>
<!-- New Page -->
    <div data-role="page" id="map"><!-- style="background-color:#6b8e23;" jqm-btn -->
    	<!-- Header -->
    	<div data-role="header" data-theme="b" data-position="fixed"><!-- style="background-color:#6b8e23;" -->
            <a href="#" data-rel="back" data-icon="back" data-iconpos="notext"></a> 
            <h1>地圖資訊</h1>	                   	     
    	</div> 
    	<!-- Content -->
    	<div data-role="main" class="ui-content" >
            <!-- <input type="button" value="附近的交通" id="btn">
            <input type="button" value="校園導覽" id="btnn"> -->
    		<div class="map_div" id="map_div"></div>	    
    	</div> 
    	<!-- Footer -->

    	<!-- <div data-role="footer" data-position="fixed" data-theme="b"> --><!-- style="background-color:#6b8e23;" -->
            
        <!-- </div>  -->
    </div> 

</body>
</html> 