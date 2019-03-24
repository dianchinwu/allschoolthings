<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script>
//支援滑動功能,注意不同頁面要使用時,要改pagename!!!--------
		$( document ).on( "pagecreate", "#leave", function() {  // ===絕對等於, 資料型態也相同
			$( document ).on( "swipeleft swiperight", "#leave", function( e ) {
		        // We check if there is no open panel on the page because otherwise
		        // a swipe to close the left panel would also open the right panel (and v.v.).
		        // We do this by checking the data that the framework stores on the page element (panel: open).
		        if ( $( ".ui-page-active" ).jqmData( "panel" ) !== "open" ) {
		            if ( e.type === "swipeleft" ) {
		                $( "#right_panel" ).panel( "open" );
		            } else if ( e.type === "swiperight" ) {
		                window.location.href="absent.php";
		            }
		        }
		    });
		});
//支援滑動功能結束-----------------------------------------
	</script>
</head>
<body>
	<div data-role="page" id="leave"><!-- style="background-color:#6b8e23;" -->
	    <div data-role="header" data-theme="b" data-position="fixed">
	    	<a href="absent.php" data-icon="" data-theme="a" data-ajax="false">出勤記錄</a>
	      	<h1>請假記錄</h1>
		</div> 

		<div role="main" class="ui-content"><!--  style="background-color:#6b8e23;" -->
			<ul data-role="listview" data-inset="true">
				<li data-role="divider">2019-01-04</li>
				<li><a href="#leave_popup_demo" data-rel="popup">王曉明</a></li>
				<li><a href="#">黃曉明</a></li>
				<li><a href="#">張曉明</a></li>
			
				<li data-role="divider">2019-01-03</li>
				<li><a href="#">王曉明</a></li>
				<li><a href="#">林曉明</a></li>
				<li><a href="#">李曉明</a></li>
			
				<li data-role="divider">2019-01-02</li>
				<li><a href="#">吳曉明</a></li>
				<li><a href="#">陳曉明</a></li>
				<li><a href="#">呂曉明</a></li>
			</ul>
		</div>	

		<!-- leave_popup  	 -->
		<div data-role="popup" id="leave_popup_demo">
			<div data-role="header">
				<h1>請假明細</h1>
				<a href="#" data-icon="delete" data-iconpos="notext" data-rel="back" class="ui-btn-right"></a>
			</div>
			<div role="main" class="ui-content">
				<h3>姓名:王曉明</h3>
				<h4>開始請假時間: 2019-01-04第1節</h4>
				<h4>結束請假時間: 2019-01-04第7節</h4>
				<h4>假別:病假</h4>
				<h4>事由:感冒看醫生</h4>
			</div>
			<!-- <div data-role="footer">
				<h4>footer</h4>
			</div> -->
		</div>

		<!-- <div data-role="footer" data-position="fixed" data-theme="b" style="background-color:#6b8e23;">
           <h4>頁尾</h4>
       </div> -->
    </div>

</body>
</html>
