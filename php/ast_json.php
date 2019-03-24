<?php
	require_once("ast_connect.php");
	$link = create_connect();
	mysqli_query($link,"SET NAMES UTF8");

	$sql = "SELECT * FROM teacher";
	$result = execute_sql($link,"id7773224_allschoolthings",$sql);
	$row = mysqli_fetch_assoc($result);
	$dataArray = array();
	if(mysqli_num_rows($result)>0){
		do{
			$dataArray[] = $row;
		}while($row = mysqli_fetch_assoc($result));
		echo json_encode($dataArray);
	}else{
		echo "no information";
	}
	mysqli_close($link);
?>