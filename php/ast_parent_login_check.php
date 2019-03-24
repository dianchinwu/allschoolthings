<?php
	header("Access-Control-Allow-Origin:*");

	$account_name = $_POST["name"];
	// $Password = $_POST["password"];

	require_once("ast_connect.php");
	$link = create_connect();

	$sql = "SELECT * FROM account WHERE name = ".$account_name;  //欄位名稱大小寫需全對否則sql語法不正確
	$result = execute_sql($link ,"id7773224_allschoolthings" ,$sql);

	if(mysqli_num_rows($result)==0){
		echo "0";
	}else{
		echo "1";
	}
?>