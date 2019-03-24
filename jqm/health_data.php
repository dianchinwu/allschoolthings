<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>健康記錄</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
<style>
	th{
	    border-bottom: 1px solid #d6d6d6;
	}

	tr:nth-child(even) {
	    background: #e9e9e9;
	}
	.text{
		font-family: "Microsoft YaHei";
		color: red;
	}
</style>
<script>
	//模擬從ajax取回Api的資料
	var	health =
			[
				{name:"陳曉明",season:[
					{peroid:"1-1",data:{height:110,weight:30,eye_l:1.0,eye_r:1.0}},
					{peroid:"1-2",data:{height:110,weight:30,eye_l:1.0,eye_r:1.0}},
					{peroid:"2-1",data:{height:110,weight:30,eye_l:1.0,eye_r:1.0}},
					{peroid:"2-2",data:{height:110,weight:30,eye_l:1.0,eye_r:1.0}},
					{peroid:"3-1",data:{height:110,weight:30,eye_l:1.0,eye_r:1.0}},
					{peroid:"3-2",data:{height:110,weight:30,eye_l:1.0,eye_r:1.0}}
				]},
				{name:"林曉明",season:[
					{peroid:"1-1",data:{height:110,weight:30,eye_l:1.0,eye_r:1.0}},
					{peroid:"1-2",data:{height:110,weight:30,eye_l:1.0,eye_r:1.0}},
					{peroid:"2-1",data:{height:110,weight:30,eye_l:1.0,eye_r:1.0}},
					{peroid:"2-2",data:{height:110,weight:30,eye_l:1.0,eye_r:1.0}},
					{peroid:"3-1",data:{height:110,weight:30,eye_l:1.0,eye_r:1.0}},
					{peroid:"3-2",data:{height:110,weight:30,eye_l:1.0,eye_r:1.0}}
				]}
			];


	$(function(){
	 	///* 
	 		//要插入name_list的資料
		var name_list = "";
	
		//要插入main_body的資料
		var main_body = "";
		
		for(i=0;i<health.length;i++){

			name_list += '<li><a href="#health_table_'+i+'"">'+health[i].name+'</a><span class="ui-li-count">'+i+'</span></li>';

			main_body += 
			'<div data-role="page" id="health_table_'+i+'">\
				<div data-role="header" data-position="fixed" data-theme="b">\
					<a href="#" data-rel="back" data-role="button" data-icon="back" data-iconpos="notext"></a>\
					<h1>'+health[i].name+'</h1>\
				</div>\
			<div role="main" class="ui-content">\
			<span class="text">可按Columns...選擇要看的欄位</span>\
		  	<table data-role="table" data-mode="columntoggle"  class="ui-responsive ui-shadow table-stroke" id="myTable'+i+'">';

			main_body+=
			'<thead>\
				<tr>\
					<th>學期</th>\
					<th data-priority="1">身高(cm)</th>\
					<th data-priority="1">體重(kg)</th>\
					<th data-priority="1">BMI值</th>\
					<th data-priority="1">視力L</th>\
					<th data-priority="1">視力R</th>\
				</tr>\
			</thead>\
			<tbody>';

			season = health[i].season;
			for(j=0;j<season.length;j++){

				weight = season[j]["data"]["weight"];
				height = season[j]["data"]["height"];

				bmi = weight/height/height*10000;
			
				eye_l = season[j]["data"]["eye_l"];
				eye_r = season[j]["data"]["eye_r"];

				main_body+=
					'<tr>\
			          <td><p>'+ season[j]["peroid"] +'</p></td>\
			          <td><p>'+ height +'</p></td>\
			          <td><p>'+ weight +'</p></td>\
			          <td><p>'+ bmi +'</p></td>\
			          <td><p>'+ season[j]["data"]["eye_l"] +'</p></td>\
			          <td><p>'+ season[j]["data"]["eye_r"] +'</p></td>\
			        </tr>';
			}
			main_body+=
			'</tbody></table></div></div>';
		}

		// console.log("list:=====\n"+name_list);
		$("#name-list").append(name_list);
		// console.log("body:=====\n"+main_body);
		$("#main_body").append(main_body);
		$( "#name-list" ).listview( "refresh" );

	});
</script>
</head>
<body id="main_body">
	<div data-role="page" id="health">
		<div data-role="header" data-theme="b" data-position="fixed">
			<h1>健康記錄</h1>
		</div>
		<div role="main" class="ui-content">
			
			<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="請輸入座號或姓名" id="name-list">

			</ul>

		</div>

	</div>




</body>
</html>