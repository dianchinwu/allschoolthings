<?php
	header("Access-Control-Allow-Origin:*");
	$Id = $_POST["id"];
	$Semester = $_POST["semester"];
	$Height = $_POST["height"];
	$Weight = $_POST["weight"];
	$Eye_l = $_POST["eye_l"];
	$Eye_r = $_POST["eye_r"];
	$Student_id = $_POST["student_id"];
	$Remark = $_POST["remark"];

	$h = $Height*$Height/10000;
	$Bmi = $Weight/$h;

	if($Remark==""){
		$Remark=NULL;
	}

	require_once("ast_connect.php");

	$link = create_connect();

	$sql = "UPDATE health SET `semester`='$Semester', `height`='$Height', `weight`='$Weight', `bmi`='$Bmi', `eye_l`='$Eye_l', `eye_r`='$Eye_r', `student_id`='$Student_id', `remark`='$Remark' WHERE `id`=$Id";  //不能加LIMIT 1?

	// echo $Id;

	$result = execute_sql($link ,"id7773224_allschoolthings", $sql);

	if($result){
		echo 1;
	}else{
		echo 0;
	}
?>