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
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="css/ast_style.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script>
	//支援滑動功能,注意不同頁面要使用時,要改pagename!!!--------
		$( document ).on( "pagecreate", "#student", function() {  // ===絕對等於, 資料型態也相同
			$( document ).on( "swipeleft swiperight", "#student", function( e ) {
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
	<style>


</style>
</head>
<body>
	<div data-role="page" id="student">
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

		<div data-role="header" data-theme="b" data-position="fixed">
			<a href="#left_panel" data-role="button" data-theme="b" data-icon="bars" data-iconpos="notext"></a>
			<h1>班級成員</h1>
		</div>
		<div role="main" class="ui-content">
			<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="請輸入座號或姓名">
				<li><a href="#health_table01">王曉明
					<p>家長:王大明/電話:0912345678</p>
					</a><span class="ui-li-count">1</span>
				</li>
				<li><a href="#">陳曉明
					<h3>家長:陳大明/電話:0912345678</h3>
					</a><span class="ui-li-count">2</span>
				</li>
				<li><a href="#">林曉明
					</a><span class="ui-li-count">3</span>
				</li>
				<li><a href="#">李曉明</a><span class="ui-li-count">4</span></li>
				<li><a href="#">黃曉明</a><span class="ui-li-count">5</span></li>
				<li><a href="#">王曉明</a><span class="ui-li-count">6</span></li>
				<li><a href="#">陳曉明</a><span class="ui-li-count">7</span></li>
				<li><a href="#">林曉明</a><span class="ui-li-count">8</span></li>
				<li><a href="#">李曉明</a><span class="ui-li-count">9</span></li>
				<li><a href="#">黃曉明</a><span class="ui-li-count">10</span></li>
			</ul>

		</div>
		<div data-role="footer" data-position="fixed" data-theme="b">
			<div data-role="navbar">
				<ul>
					<!-- data-ajax="false"換頁後panel無法滑動必須重整頁面,解除超連結被佔用情形  --> 
					<li><a href="index.php" data-icon="cloud" data-ajax="false">校園公佈</a></li>
					<li><a href="#student" data-icon="cloud" class="ui-btn-active">班級成員</a></li>
					<li><a href="class.php" data-icon="cloud" data-ajax="false">班級記事</a></li>
					<li><a href="grade.php" data-icon="cloud" data-ajax="false">學員成績</a></li>
					<li><a href="absent.php" data-icon="cloud" data-ajax="false">出勤記錄</a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- #health_form -->
	<div data-role="page" id="health_table01">
		<div data-role="header" data-position="fixed" data-theme="b">
			<a href="#" data-rel="back" data-role="button" data-icon="back" data-iconpos="notext"></a>
			<h1>王曉明</h1>
		</div>
		<div role="main" class="ui-content">
			<!-- 搜尋欄
		    <form>
		      <input id="filterTable-input" data-type="search" placeholder="Search For Customers...">
		    </form> -->
			<span class="health_table_text">可按Columns...選擇要看的欄位</span>
		    <table data-role="table" data-mode="columntoggle"  class="ui-responsive ui-shadow table-stroke health_table" id="myTable"> <!-- 預設data-mode="reflow" data-mode="columntoggle" data-filter="true" data-input="#filterTable-input" -->
		      <thead>
		        <tr>
		          <th>學期</th>
		          <th data-priority="1">身高(cm)</th>
		          <th data-priority="1">體重(kg)</th>
		          <th data-priority="1">BMI值</th>
		          <th data-priority="2">視力L</th>
		          <th data-priority="2">視力R</th>
		          <!-- data-priority="1" 最高到6,影響一開始出現選項 -->
		        </tr>
		      </thead>
		      <tbody>
		      	<!-- 學期1-1 -->
		        <tr>
		          <td><p>1-1</p></td>
		          <td><p>110</p></td>
		          <td><p>30</p></td>
		          <td><p>20.5</p></td>
		          <td><p>1.0</p></td>
		          <td><p>1.0</p></td>
		        </tr>
		        <!-- 學期1-2 -->
		        <tr>
		          <td><p>1-2</p></td>
		          <td><p>110</p></td>
		          <td><p>35</p></td>
		          <td><p>20.5</p></td>
		          <td><p>1.0</p></td>
		          <td><p>1.0</p></td>
		        </tr>
		        <!-- 學期2-1 -->
		        <tr>
		          <td><p>2-1</p></td>
		          <td><p>120</p></td>
		          <td><p>40</p></td>
		          <td><p>20.5</p></td>
		          <td><p>1.0</p></td>
		          <td><p>1.0</p></td>
		        </tr>
		        <!-- 學期2-2 -->
		        <tr>
		          <td><p>2-2</p></td>
		          <td><p>120</p></td>
		          <td><p>40</p></td>
		          <td><p>20.5</p></td>
		          <td><p>1.0</p></td>
		          <td><p>1.0</p></td>
		        </tr>
		        <!-- 學期3-1 -->
		        <tr>
		          <td><p>3-1</p></td>
		          <td><p>130</p></td>
		          <td><p>40</p></td>
		          <td><p>20.5</p></td>
		          <td><p>1.0</p></td>
		          <td><p>1.0</p></td>
		        </tr>
		        <!-- 學期3-2 -->
		        <tr>
		          <td><p>3-2</p></td>
		          <td><p>130</p></td>
		          <td><p>40</p></td>
		          <td><p>20.5</p></td>
		          <td><p>1.0</p></td>
		          <td><p>1.0</p></td>
		        </tr>

		      </tbody>
		    </table>

		</div>
<!-- 		<div data-role="footer" data-position="fixed" data-theme="b">
			<h4>footer</h4>
		</div> -->
	</div>

</body>
</html>