<?php
    header("Access-Control-Allow-Origin:*");
	require_once("../php/ast_connect.php");
	$link = create_connect();

	mysqli_query($link , "SET NAMES UTF8");  //在select時將亂碼轉換成使用者看得懂的文字,在insert時不管是否亂碼,資料庫也不一定是utf8

	$sql = "SELECT bmi FROM health";
	// $sql = "SELECT count(bmi) AS bmi_record,bmi FROM health GROUP BY bmi";

	$result = execute_sql($link,"id7773224_allschoolthings",$sql);
	$row = mysqli_fetch_assoc($result);
	// $dataArray = array();
	$count_a = 0;
	$count_b = 0;
	$count_c = 0;
	$count_d = 0;
	if(mysqli_num_rows($result)>0){

		do{
			// $dataArray[] = $row;
		    if($row["bmi"]<=14.15){
                // bmi_sug = "您的小孩體重過輕，建議多補充營養";
                $count_a++;
            }else if($row["bmi"]>14.15&&$row["bmi"]<=19.3){
                // bmi_sug = "您的小孩體重正常，繼續健康成長吧！";
                $count_b++;
            }else if($row["bmi"]>19.3&&$row["bmi"]<=21.8){
                // bmi_sug = "您的小孩體重過重，建議調整飲食多運動";
                $count_c++;
            }else if($row["bmi"]>21.8){
                // bmi_sug = "您的小孩屬於肥胖，建議讓小孩養成良好飲食及運動習慣";
                $count_d++;
            }

		}while($row = mysqli_fetch_assoc($result));
		// echo json_encode($dataArray);
		echo $count_a."#".$count_b."#".$count_c."#".$count_d;

	}else{
		echo "查無資料";
	}
?>