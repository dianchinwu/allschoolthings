<?php
	header("Access-Control-Allow-Origin:*");

	$Name = $_POST["name"];
	$Password = $_POST["password"];
	// $Identity_id = $_POST["identity_id"];
	$Email = $_POST["email"];



	require_once("ast_connect.php");
	$link = create_connect();
	// $sql = "INSERT INTO account(id ,name ,password ,identity_id ,email, create_time) 
	// 		VALUES('11','0987654321','123456', '4', 'a@test.com','2019-02-23 00:00:22')";  //不能加LIMIT 1
	$sql = "INSERT INTO account(name, password, identity_id, email) VALUES('$Name', '$Password', '4', '$Email')";

	$result = execute_sql($link ,"id7773224_allschoolthings", $sql);

	if($result){
		echo 1;
	}else{
		echo 0;
	}
?>