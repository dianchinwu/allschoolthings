<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="device-width,initial-scale=1">
	<title>校園大小事AllSchoolThings</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="css/style.css"><!--   type="text/css" -->
	<link rel="stylesheet" href="css/ast_style.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script src="js/jquery.slidizle.js"></script>
	<script>
	//幻燈片
		jQuery(function($) {

			// setup slidizle
			$('[data-slidizle]').slidizle({
				beforeChange : function(api) {
					// console.log('previous', api.getPreviousSlide().index());
					// console.log('current', api.getCurrentSlide().index());
					// console.log('next', api.getNextSlide().index());
					// console.log('previous active', api.getPreviousActiveSlide().index());
				}
			});

		});
	</script>
	<script>
	//支援滑動功能,注意不同頁面要使用時,要改pagename!!!--------
		$( document ).on( "pagecreate", "#index", function() {  // ===絕對等於, 資料型態也相同
			$( document ).on( "swipeleft swiperight", "#index", function( e ) {
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
	<div data-role="page" id="index">
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
				<li><a href="map.php">地圖資訊</a></li>
					<!-- <a href="map.php" data-ajax="false">地圖資訊</a></li> -->
					
				<div class="ui-grid-a">
					<div class="ui-block-a"><a href="#" data-role="button" data-theme="b">設定</a></div>
					<div class="ui-block-b"><a href="#" data-role="button" data-theme="b">登出</a></div>
				</div>
			</ul>	
		</div>

		<div data-role="header" data-theme="b">
			<a href="#left_panel" data-theme="b" data-icon="bars" data-iconpos="notext"></a>
			<h1>校園公佈</h1>
		</div><!-- header end -->

		<div role="main" class="ui-content">

			<div class="container">
			<!-- animated -->
			<section class="sample slider--animated" data-slidizle>

				<ul class="slider-content" data-slidizle-content>
			
					<li class="slider-item" style="background-image:url('img/01.jpg')">
					</li>

					<li class="slider-item" style="background-image:url('img/02.jpg')">
					</li>

					<li class="slider-item" style="background-image:url('img/03.jpg')">	
					</li>

				</ul>

				<!--浮在投影片上的文字
				<header>
					<h2>Simple animation</h2>
					<h3>I'm an animated slider. Animation are made by css using the <strong>.active</strong> class</h3>
				</header> -->
				
				<!-- 圓點 -->
				<ul class="slider-navigation" data-slidizle-navigation></ul>
			</section>
			</div>

		</div><!-- content end -->

		<div data-role="footer" data-position="fixed" data-theme="b">
			<div data-role="navbar">
				<ul>
					<!-- data-ajax="false"換頁後panel無法滑動必須重整頁面,解除超連結被佔用情形  -->
					<li><a href="#index" data-icon="cloud" class="ui-btn-active">校園公佈</a></li>
					<li><a href="student.php" data-icon="cloud" data-ajax="false">班級成員</a></li>
					<li><a href="class.php" data-icon="cloud" data-ajax="false">班級記事</a></li>
					<li><a href="grade.php" data-icon="cloud" data-ajax="false">學員成績</a></li>
					<li><a href="absent.php" data-icon="cloud" data-ajax="false">出勤記錄</a></li>
				</ul>
			</div>
		</div><!-- footer end -->

	</div><!-- page end -->
</body>
</html>