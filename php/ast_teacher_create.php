<?php
	header("Access-Control-Allow-Origin:*");
	// $Id = $_POST["id"];
	$Name = $_POST["name"];
	$Gender = $_POST["gender"];
	// $Avatar = $_POST["avatar"];
	// $Class_id = $_POST["class_id"];
	$Account_name = $_POST["account_name"];

	require_once("ast_connect.php");

	$link = create_connect();

	$sql = "INSERT INTO teacher(id ,name ,gender ,avatar ,class_id ,account_name) 
			VALUES(NULL,'$Name','$Gender','', '1','$Account_name')";  //不能加LIMIT 1

	$result = execute_sql($link ,"id7773224_allschoolthings", $sql);

	if($result){
		echo 1;
	}else{
		echo 0;
	}
?>