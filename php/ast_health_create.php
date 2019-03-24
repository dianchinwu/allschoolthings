<?php
	header("Access-Control-Allow-Origin:*");
	// $Id = $_POST["id"];
	// $Semester = $_POST["semester"];
	$Height = $_POST["height"];
	$Weight = $_POST["weight"];
	$Eye_l = $_POST["eye_l"];
	$Eye_r = $_POST["eye_r"];
	$Student_id = $_POST["student_id"];
	$Remark = $_POST["remark"];

	$h = $Height*$Height/10000;
	$Bmi = $Weight/$h;

	require_once("ast_connect.php");

	$link = create_connect();

	$sql = "INSERT INTO health(`id`, `semester`, `height`, `weight`, `bmi`, `eye_l`, `eye_r`, `student_id`, `remark`) 
			VALUES(NULL, '107-2', '$Height', '$Weight', '$Bmi', '$Eye_l', '$Eye_r', '$Student_id', '$Remark')";  //不能加LIMIT 1

	$result = execute_sql($link ,"id7773224_allschoolthings", $sql);

	if($result){
		echo 1;
	}else{
		echo 0;
	}
?>