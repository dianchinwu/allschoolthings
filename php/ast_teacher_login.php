<?php
	header("Access-Control-Allow-Origin:*");
	session_start();  //一定要開啟session_start才能紀錄

	$Name = $_POST["name"];
	$Password = $_POST["password"];

	require_once("ast_connect.php");
	$link = create_connect();

	$sql = "SELECT * FROM account WHERE name = '$Name' && password = '$Password' ";  //欄位名稱大小寫需全對否則sql語法不正確
	$result = execute_sql($link ,"id7773224_allschoolthings" ,$sql);  //allschoolthings

	if(mysqli_num_rows($result)==1){
		$_SESSION["username"] = $_POST["name"];  //寫在echo前才會執行
		// echo '<script>location.href="#";</script>';
		echo 1;
	}else{
		echo 0;
	}
?>
