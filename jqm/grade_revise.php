<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="device-width,initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script>
		$(function(){});//分數0~100	
	</script>
</head>
<body>
	<div data-role="page" id="home">

		<div data-role="header" data-theme="b">
			<a href="#" data-role="button" data-icon="back" data-theme="b" data-iconpos="notext" data-rel="back"></a>
			<h1>輸入成績</h1>
		</div><!-- header end -->

		<div role="main" class="ui-content">
			<!-- select選單 -->
            <div data-role="fieldcontain">
            	<label for="school">1. 王曉明:</label>
            	<select name="school" id="school">
            		<option value="100" id="sss">100</option>
            	</select>
            </div>

            <div data-role="fieldcontain">
            	<label for="school2">2. 陳曉明:</label>
            	<select name="school2" id="school2">
            		<option value="70">70</option>
            	</select>
            </div>

			<a href="#" data-role="button"data-theme="b">確認</a>
		</div><!-- content end -->

		<!-- <div data-role="footer" data-position="fixed" data-theme="b">
			<p></p>
		</div> --><!-- footer end -->

	</div><!-- page end -->
</body>
</html>