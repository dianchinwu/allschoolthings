<?php
	//$servername = "localhost";
	//$username = "owner";  //id7773224_tcnr1608
	//$password = "123456";
	// $dbname = "AllSchoolThings";  //id7773224_allschoolthings

	function create_connect(){
		$link = mysqli_connect("localhost", "id7773224_tcnr1608", "123456") or die("Connect failed".mysqli_connect_error());

		mysqli_query($link , "SET NAMES UTF8");  //用此方法避免亂碼

		return $link;  //要回傳$link
	}

	function execute_sql($link , $dbname , $sql){  //自定義方法execute_sql($link , $dbname , $sql)

		mysqli_select_db($link , $dbname) or die("開啟資料庫失敗".mysqli_error());

		$result = mysqli_query($link , $sql);

		return $result;  // $sql變數用SELECT FROM 會回傳資料庫裡的資料,用INSERT INTO VALUES 會回傳0或1
	}
	

?>