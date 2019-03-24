<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSnyMTQAIeclcmF-1y1ufEj3mzZb6sPx4" type="text/javascript"></script>  <!--  async同步 , initMap是google預設的function名稱 , &callback=initMap -->
	<script>
		//參考資料https://www.oxxostudio.tw/articles/201802/google-maps-7-geocoding.html
		//使用geocoder.geocode({'address': address}, callback(results, status))對地址進行地理編碼，在擷取到地理編碼時會依序傳遞兩個參數 results 和 status，results 包含以下的結果物件，而最常使用的應該就是geometry.location，因為這回傳的就是地圖常用的經緯度 LatLng。
		//status 回傳的是成功與否的狀態，如果回傳 OK 表示順利剖析地址並且已至少傳回一個地理編碼，以下面的範例來說，就可以透過地址編碼，將地圖標記放在「總統府」的地址上。
		//補充資料https://medium.com/@icelandcheng/%E4%BD%BF%E7%94%A8google-map-api-geocoding-api-%E5%BE%97%E5%88%B0%E9%BB%9E%E4%BD%8D%E7%B8%A3%E5%B8%82%E9%84%89%E9%8E%AE%E8%B3%87%E6%96%99-25bf5f0e4a21
		//https://developers.google.com/maps/documentation/javascript/geocoding
		$(function(){
			$.ajax({
				type: "GET",
				url: "https://cloud.culture.tw/frontsite/trans/SearchShowAction.do?method=doFindTypeJ&category=4" ,
				//http://192.168.60.108/mobileWEB/select_data.php
				dataType: "json" ,
				success: activity_showlist ,
				error:function(){
					alert("error!");
				}
			});
		});

		function activity_showlist(data){
			$("#activity_listview").empty();  //清空listview畫面

			for(var i=0;i<data.length;i++){

				for(var j=0;j<data[i].showInfo.length;j++){
					var address = (data[i].showInfo[j].location).replace(" ","");  //在傳過去之前先處理掉空格,jqm的popup和dialog對這些字元處理有預設
					var title = (data[i].title).replace(" ","");
					var locationName = (data[i].showInfo[j].locationName).replace(" ","");
					var sourceWebPromote = (data[i].sourceWebPromote).replace(" ","");
					var time = (data[i].showInfo[j].time).replace(" ","時間:");
					var endDate = (data[i].endDate).replace(" ","");
					//用抓到的data產生listview內容,並在<a>標籤中隱藏值
					var str = '<li><a href="#kid_pop'+i+'" data-rel="popup" num='+i+' address='+address+' title='+title+' locationName='+locationName+' sourceWebPromote='+sourceWebPromote+' time='+time+' endDate='+endDate+'><h2>'+title+'</h2><p>'+address+'</p></a></li>';  //' startDate='+data[i].startDate  	

				}//end for j
				
				$("#activity_listview").append(str);  //疊加內容產生listview
				
			}//end for i
			// console.log();
			$("#activity_listview").listview("refresh");  //重整listview畫面
			//listview的<a>標籤被點擊時,將被點擊項目中<a>標籤隱藏的值傳到activity_showmap()
			$("a",$("#activity_listview")).bind("click",function(){
				activity_showmap($(this).attr("num"), $(this).attr("address"), $(this).attr("title"),
								 $(this).attr("locationName"), $(this).attr("sourceWebPromote"),
								 $(this).attr("time"),$(this).attr("endDate")	);
			});

			// console.log(str);

		}

		function activity_showmap(num, address, title, locationName, sourceWebPromote, time, endDate){
			console.log(num);
			console.log(address);
			console.log(title);
			console.log(locationName);
			console.log(sourceWebPromote);
			console.log(time);
			console.log(endDate);
			
			// var popup = '<div data-role="popup" id="kid_pop0" data-dismissible="false"><a href="#" data-role="button" data-theme="b" data-icon="delete" data-iconpos="notext" class="ui-btn-right" data-rel="back">close</a></div><h3>'+title+'</h3><p>地點:'+locationName+'</p><p>網址:'+sourceWebPromote+'</p><p>開始日期:'+time+'</p><p>結束日期:'+endDate+'</p></div>';
			// $("#activity_popup").html(popup);
			if(title==undefined){title="親子活動";}  //如果沒接收到title欄位資訊,顯示親子活動
			if(locationName==undefined){locationName="暫無資訊";}  //如果沒接收到locationName欄位資訊,顯示暫無資訊
			if(sourceWebPromote==undefined){
				// $("#sourceWebPromote").html('<p>其他:<a href="#" id="sourceWebPromote" onclick="activity_undefined()">詳細資訊網址請點我</a></p>');
			}
			if(time==undefined){time="暫無資訊";}  //如果沒接收到time欄位資訊,顯示暫無資訊
			if(endDate==undefined){endDate="暫無資訊";}  //如果沒接收到endDate欄位資訊,顯示暫無資訊
			$(".activity_popup").attr("id","kid_pop"+num).trigger("create");  //將activity_popup class位置的id替換成"kid_pop"+num
			//.trigger("create")的函數適用在popup,類似listview的refresh功能
			$("#title").html(title);
			$("#locationName").html("地點:"+locationName);
			$("#sourceWebPromote").attr("href",sourceWebPromote);
			$("#time").html("開始日期:"+time);			
			$("#endDate").html("結束日期:"+endDate);

			// $.ajax({
			// 	type:'GET',
			// 	url: sourceWebPromote,
			// 	success: function(response) { 
			// 		if(response.status == 200) { 
			// 		alert('有效'); 
			// 		} else { 
			// 		alert('無效'); 
			// 		} 
			// 	} 
			// });

			//用google api將地址轉換成地點在map_frame上畫圖
			var geocoder = new google.maps.Geocoder();
			var map_frame = document.getElementById("map_frame");
			var gmap = new google.maps.Map(map_frame, {  //將googlemap置於哪個框架,{放大倍率,中心點,顯示的地圖類型(有4種)}
				zoom:16
			});
			// var address = "總統府";
			//var address = "台北101";

			geocoder.geocode( {"address":address}, function(results, status) {
			    if(status == "OK"){
			    	gmap.setCenter(results[0].geometry.location);
			    	var marker = new google.maps.Marker({
			        	map: gmap,
			        	position: results[0].geometry.location
			    	});
				}else{
					console.log(results[0].geometry.location);
				    console.log(status);
				}
			});
		}

		// function activity_undefined(){
		// 	alert("Sorry暫無連結");
		// }
	</script>
	<style>
		.map_frame{
			width: 90vw;
			height: 60vh;
			margin-top: 0;
			margin-bottom: 0;
			margin-left: auto;
			margin-right: auto;
			border-radius: 10px;
			/*box-shadow: 5px 5px 5px 5px #aaa ;*/
		}
		.ui-listview>li h2{
			white-space:normal;
		}/*若字數超過一行的話可以自動換行*/
	</style>
</head>
<body>
<!-- 	<div data-role="page" id="home">
		<div data-role="header" data-theme="b" data-position="fixed">
			<h1>Home</h1>
		</div>
		<div role="main" class="ui-content">
			<div id="map_frame">
				
			</div>
		</div>
		<div data-role="footer" data-theme="b" data-position="fixed">
			<h4>footer</h4>
		</div>
	</div> -->



	<div data-role="page" id="activity">

		<div data-role="header" data-theme="b">
			<a href="#" data-rel="back" data-icon="back" data-iconpos="notext"></a>
			<h1>親子活動</h1>	
		</div>
		
		<div data-role="main" class="ui-content">
			<ul data-role="listview" data-inset="true" id="activity_listview" data-filter="true" data-filter-placeholder="請輸入關鍵字">
			    <!-- <li><a href="#kid_pop1" data-rel="popup">
			        	<div id="msg"></div>
					    <h2>title</h2>
					    <h3>location</h3> 
					</a>
				</li> -->
				<!-- <div id="activity_popup"></div> -->
				<div data-role="popup" class="activity_popup" data-dismissible="false">
			    	<a href="#" data-role="button" data-theme="b" data-icon="delete" data-iconpos="notext" 
			    	class="ui-btn-right" data-rel="back">close</a>
			    		<div id="map_frame" class="map_frame"></div>
						<h4 id="title">title</h4>
				    	<p id="locationName">地點:locationName</p>
				    	<p id="time">開始日期:time</p>
				    	<p id="endDate">結束日期:endDate</p>
				    	<p>其他:<a href="#" id="sourceWebPromote">詳細資訊網址請點我</a></p><!-- sourceWebPromote -->
				</div>
			    <!-- <div data-role="popup" id="kid_pop0" data-dismissible="false">
			    	<a href="#" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" 
			    	class="ui-btn-right" data-rel="back">close</a>
			    		<div id="map_frame"></div>
						<h3>title</h3>
				    	<p>地點:locationName</p>
				    	<p>網址:sourceWebPromote</p>
				    	<p>開始日期:time</p>
				    	<p>結束日期:endDate</p>
				</div> -->					    
			</ul>
		</div>
	</div>


</body>
</html>