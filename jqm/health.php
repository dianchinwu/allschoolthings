<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Document</title>
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
</head>
<body>
	<div data-role="page" id="health">
		<div data-role="header" data-theme="b" data-position="fixed">
			<h1>健康記錄</h1>
		</div>
		<div role="main" class="ui-content">
			
			<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="請輸入座號或姓名">
				<li><a href="#health_table01">王曉明</a><span class="ui-li-count">1</span></li>
				<li><a href="#">陳曉明</a><span class="ui-li-count">2</span></li>
				<li><a href="#">林曉明</a><span class="ui-li-count">3</span></li>
				<li><a href="#">李曉明</a><span class="ui-li-count">4</span></li>
				<li><a href="#">黃曉明</a><span class="ui-li-count">5</span></li>
				<li><a href="#">王曉明</a><span class="ui-li-count">6</span></li>
				<li><a href="#">陳曉明</a><span class="ui-li-count">7</span></li>
				<li><a href="#">林曉明</a><span class="ui-li-count">8</span></li>
				<li><a href="#">李曉明</a><span class="ui-li-count">9</span></li>
				<li><a href="#">黃曉明</a><span class="ui-li-count">10</span></li>
			</ul>

		</div>
		<!-- <div data-role="footer" data-theme="b" data-position="fixed">
			<h4>footer</h4>
		</div> -->
	</div>

	<!-- #health_form01 -->
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
			<span class="text">可按Columns...選擇要看的欄位</span>
		    <table data-role="table" data-mode="columntoggle"  class="ui-responsive ui-shadow table-stroke" id="myTable"> <!-- 預設data-mode="reflow" data-mode="columntoggle" data-filter="true" data-input="#filterTable-input" -->
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