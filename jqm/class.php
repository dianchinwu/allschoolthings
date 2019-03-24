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
	<meta name="viewport" content="device-width,initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="css/ast_style.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script>
	//支援滑動功能,注意不同頁面要使用時,要改pagename!!!--------
		$( document ).on( "pagecreate", "#class", function() {  // ===絕對等於, 資料型態也相同
			$( document ).on( "swipeleft swiperight", "#class", function( e ) {
		        // We check if there is no open panel on the page because otherwise
		        // a swipe to close the left panel would also open the right panel (and v.v.).
		        // We do this by checking the data that the framework stores on the page element (panel: open).
		        if ( $( ".ui-page-active" ).jqmData( "panel" ) !== "open" ) {
		            if ( e.type === "swipeleft" ) {
		                $( "#right_panel" ).panel( "open" );
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
	<div data-role="page" id="class">
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
			<a href="#left_panel" data-theme="b" data-icon="bars" data-iconpos="notext"></a>
			<h1>班聯絡簿</h1>
		</div><!-- header end -->

		<div role="main" class="ui-content">
			<ul data-role="listview" data-inset="true">
				<li data-role="list-divider" data-theme="b">
					今日事項
				</li>
				
				<!--聯絡簿細項-->
				<li><a href="#class_dialog" data-rel="dialog">帶色鉛筆</a></li>
				<li><a href="#class_dialog" data-rel="dialog">完成作業一</a></li>
				<li><a href="#class_dialog" data-rel="dialog">考第六章全</a></li>
			</ul>
		</div><!-- content end -->

		<div data-role="footer" data-position="fixed" data-theme="b">
			<div data-role="navbar">
				<ul>
					<!-- data-ajax="false"換頁後panel無法滑動必須重整頁面,解除超連結被佔用情形  -->
					<li><a href="index.php" data-icon="cloud" data-ajax="false">校園公佈</a></li>
					<li><a href="student.php" data-icon="cloud" data-ajax="false">班級成員</a></li>
					<li><a href="#class" data-icon="cloud" class="ui-btn-active">班級記事</a></li>
					<li><a href="grade.php" data-icon="cloud" data-ajax="false">學員成績</a></li>
					<li><a href="absent.php" data-icon="cloud" data-ajax="false">出勤記錄</a></li>
				</ul>
			</div>
		</div><!-- footer end -->

	</div><!-- page end -->


	<div data-role="page" id="class_dialog">

		<div data-role="header" data-theme="b">
			<!-- dialog有預設delete icon,所以不用自己寫 -->
			<h1>01/03</h1><!--日期-->
		</div>

		<div role="main" class="ui-content">
			<!-- textarea -->
			<div data-role="fieldcontain">
				<label for="textarea">1.</label>
				<textarea name="textarea" id="textarea" cols="30" rows="10">帶色鉛筆</textarea>
			</div>

			<div data-role="fieldcontain">
				<label for="textarea">2.</label>
				<textarea name="textarea" id="textarea" cols="30" rows="10">完成作業一</textarea>
			</div>

			<div data-role="fieldcontain">
				<label for="textarea">3.</label>
				<textarea name="textarea" id="textarea" cols="30" rows="10">考第六章全</textarea>
			</div>

			<a href="#" data-role="button" data-icon="plus" data-theme="a" id="grade_menu_btn" data-iconpos="top">新增</a>
			<a href="#back" data-role="button" data-theme="b" id="grade_menu_btn" >發佈</a>
		</div>

	</div><!-- dialog end -->
</body>
</html>