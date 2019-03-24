<?php
	session_start();  //一定要開啟session_start才能紀錄
	$Username = $_POST["name"];
	$Password = $_POST["password"];

	require_once("./ast_connect.php");
	$link = create_connect();

	$sql = "SELECT * FROM account WHERE name ='$Username' AND password ='$Password'";

	$result = execute_sql($link, "id7773224_allschoolthings", $sql);
	if(mysqli_num_rows($result) == 1){
		$_SESSION["username"] = $_POST["name"];  //寫在echo前才會執行
		echo "1"; //成功
	}else{
		echo "0"; //失敗
	}	
?>