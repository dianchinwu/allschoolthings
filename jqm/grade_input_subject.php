<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="device-width,initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
	<div data-role="page" id="grade_input_subject">

		<div data-role="header" data-theme="b">
			<!--左上返回-->
			<a href="#" data-role="button" data-icon="back" data-theme="b" data-iconpos="notext" data-rel="back"></a>
			<h1>輸入考試</h1>
		</div><!-- header end -->

		<div role="main" class="ui-content">
			<!-- date -->
			<div data-role="fieldcontain">
				<label for="date">日期:</label>
				<input type="date" name="date" id="date" value="">
			</div>

			<!-- select選單 -->
            <div data-role="fieldcontain">
            	<label for="subject">科目:</label>
            	<select name="subject" id="subject">
            		<option value="國文">國文</option>
            		<option value="英文">英文</option>
            		<option value="數學">數學</option>
            		<option value="自然">自然</option>
            		<option value="社會">社會</option>
            	</select>
            </div>

            <!-- textarea -->
			<div data-role="fieldcontain">
				<label for="textarea">範圍:</label>
				<textarea name="textarea" id="textarea" cols="30" rows="10"></textarea>
			</div>

			<a href="#" data-role="button" data-theme="b" data-rel="back">確認</a>  <!-- #grade.php or #grade_input_student.php -->
		</div><!-- content end -->

		<!-- <div data-role="footer" data-position="fixed" data-theme="b">
			<h1>頁尾</h1>
		</div> --><!-- footer end -->

	</div><!-- page end -->
</body>
</html>