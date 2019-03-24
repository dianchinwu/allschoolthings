<?php
	session_start();  //一定要開啟session_start才能紀錄

	require_once("./ast_connect.php");
	$link = create_connect();

	if(isset($_SESSION["username"])){

		unset($_SESSION["username"]);

		echo '<script>
			  location.href="../WebBack/ast_wb_login.php";
			  </script>';
	}else{
		echo '<script>
			 alert("logout failed");
			 </script>';
	}	
?>