<?php
	session_start();
	if(isset($_SESSION["username"])){
		// echo '<script>alert("老師您好,歡迎光臨");</script>';
	}else{
		echo '<script>alert("請先登入會員");location.href="signin.php";</script>';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=divice-width,initial-scale=1.0" >
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="css/ast_style.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script>
//支援滑動功能,注意不同頁面要使用時,要改pagename!!!--------
		$( document ).on( "pagecreate", "#absent", function() {  // ===絕對等於, 資料型態也相同
			$( document ).on( "swipeleft swiperight", "#absent", function( e ) {
		        // We check if there is no open panel on the page because otherwise
		        // a swipe to close the left panel would also open the right panel (and v.v.).
		        // We do this by checking the data that the framework stores on the page element (panel: open).
		        if ( $( ".ui-page-active" ).jqmData( "panel" ) !== "open" ) {
		            if ( e.type === "swipeleft" ) {
		                window.location.href="leave.php";
		            } else if ( e.type === "swiperight" ) {
		                $( "#left_panel" ).panel( "open" );
		            }
		        }
		    });
		});
//支援滑動功能結束-----------------------------------------
	</script>
</head>
<body>

	<div data-role="page" id="absent">
		<!-- left_panel -->
		<div data-role="panel" id="left_panel" data-display="push" class="panel">
			<div class="panel_photo_frame">
				<img src="http://fakeimg.pl/100x100/00CED1/FFF/?text=img" class="panel_photo_img">
			</div>
			<div class="panel_photo_text">
				<p></p>
				<h3 class="panel_space">三年愛班</h3>
				<h4>王曉明老師</h4>
			</div>
			
			<ul data-role="listview"> <!-- data-inset="true" -->
				<li data-role="list-divider">校園資訊</li>
				<li><a href="contact.php">聯絡學校</a></li>
				<li><a href="activity.php">親子活動</a></li>
				<li><a href="https://fatraceschool.moe.gov.tw/frontend/search.html">營養午餐</a></li>
				<li><a href="map.php" data-ajax="false">地圖資訊</a></li>
				<div class="ui-grid-a">
					<div class="ui-block-a"><a href="#" data-role="button" data-theme="b">設定</a></div>
					<div class="ui-block-b"><a href="#" data-role="button" data-theme="b">登出</a></div>
				</div>
			</ul>	
		</div>

		<div data-role="header" data-theme="b">
			<a href="#left_panel" data-icon="bars" data-iconpos="notext" data-ajax="false"></a>
			<h1>出勤記錄</h1>
			<a href="leave.php" data-icon="" data-theme="a">請假記錄</a>
		</div>
		
		<!-- 選擇日期 -->
		<div data-role="main" class="ui-content">

				<div data-role="fieldcontain">
					<label for="date">選擇日期</label>
					<input type="date" name="date"id="date">
				</div>
				<ul data-role="listview" data-inset="true"> 
					    <li>01王曉明	  請假</li>
					    <li>02林曉明	  準時</li>
					    <li>03劉曉明	  準時</li>
					    <li>04張曉明	  準時</li>
					    <li>05徐曉明	  請假</li>
				</ul>

			
			<a href="#absent_edit" data-role="button" data-theme="b">編輯</a>
			
		</div>

		<div data-role="footer" data-position="fixed" data-theme="b">
			<div data-role="navbar">
				<ul>
					<!-- data-ajax="false"換頁後panel無法滑動必須重整頁面,解除超連結被佔用情形  -->
					<li><a href="index.php" data-icon="cloud" data-ajax="false">校園公佈</a></li>
					<li><a href="student.php" data-icon="cloud" data-ajax="false">班級成員</a></li>
					<li><a href="class.php" data-icon="cloud" data-ajax="false">班級記事</a></li>
					<li><a href="grade.php" data-icon="cloud" data-ajax="false">學員成績</a></li>
					<li><a href="#absent" data-icon="cloud" class="ui-btn-active">出勤記錄</a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- 出勤登記 -->
	<div data-role="page" id="absent_edit">
		<div data-role="header"  data-theme="b">
			<a href="#" data-theme="b" data-rel="back"  data-icon="back" data-iconpos="notext">back</a>
			<h1>出勤登記</h1>					
		</div>
		<div data-role="main" class="ui-content">
			<div data-role="fieldcontain">
				<label for="date">選擇日期</label>
				<input type="date" name="date"id="date">
			</div>
			<!-- 按鈕寬度最小data-inline="true" -->
			<!-- 下拉式選單 -->
			<form>
				<div class="ui-field-contain">
				    <label for="select-native-1">01王曉明</label>
				    <select name="select-native-1" id="select-native-1">
				        <option value="準時">準時</option>
				        <option value="遲到">遲到</option>
				        <option value="請假">請假</option>
				    </select>
				</div>
				<div class="ui-field-contain">
				    <label for="select-native-2">02林曉明</label>
				    <select name="select-native-2" id="select-native-2">
				        <option value="準時">準時</option>
				        <option value="遲到">遲到</option>
				        <option value="請假">請假</option>
				    </select>
				</div>
				

				<div class="ui-field-contain">
				    <label for="select-native-3">03劉曉明</label>
				    <select name="select-native-3" id="select-native-3">
				        <option value="準時">準時</option>
				        <option value="遲到">遲到</option>
				        <option value="請假">請假</option>
				    </select>
				</div>
				

				<div class="ui-field-contain">
				    <label for="select-native-4">04張曉明</label>
				    <select name="select-native-4" id="select-native-4">
				        <option value="準時">準時</option>
				        <option value="遲到">遲到</option>
				        <option value="請假">請假</option>
				    </select>
				</div>
				

				<div class="ui-field-contain">
				    <label for="selesct-native-5">05徐曉明</label>
				    <select name="select-native-5" id="select-native-5">
				        <option value="準時">準時</option>
				        <option value="遲到">遲到</option>
				        <option value="請假">請假</option>
				    </select>
				</div>
				</form>

				<a href="#absent" data-role="button" data-theme="b">發佈</a>
		</div>

		<!-- <div data-role="footer" data-position="fixed" data-theme="b">
			<h4>footer</h4>
		</div> -->
	</div>
	

	
</body>
</html>

