<?php
	
	function connectDB($ServerUrl, $DBAccount, $DBPassword, $DBName){
		$link = mysqli_connect($ServerUrl, $DBAccount, $DBPassword, $DBName);
		mysqli_set_charset($link,'utf8');
		return $link;
	}

	function getContent($method){
		//x-www-form-urlencoded
		if($method=="GET"){
			return $_GET;
		}else
		if($method!="POST"){
		   return getContentFromFormUrlEncoded();
		}
		else
		if(isset($_SERVER["CONTENT_TYPE"]))
		{
			$type = $_SERVER["CONTENT_TYPE"];
			if($type=="application/json"){
				return getContentFromJSON();
			}
			else
			{
				return $_POST;
			}
		}
		return array();
	}
	function getContentFromFormUrlEncoded(){
		// echo "urlencoded\n";
		// echo 
		$urlencoded = file_get_contents("php://input",true);
		// echo "\n";
		if(strlen($urlencoded)>0){
			// echo "parse_str\n";
		    parse_str($urlencoded,$arrayFromUrlencoded);
		    if(count($arrayFromUrlencoded) > 0 )
		    {
		    	// echo "contents = contentString\n";
				// echo
				return $arrayFromUrlencoded;
				// echo "\n";
		    }
		}
		return array();
	}

	function getContentFromJSON(){
		$jsonString = file_get_contents("php://input",true);
		// echo "\n";

		$arrayFromJSON = json_decode($jsonString);
		if(count($arrayFromJSON) > 0 )
		{
			// echo "contents = json\n";
			// echo 
			$contents = $arrayFromJSON;
			// echo "\n";
		}
		return $contents;
	}
 	function getWhere($param){
 		// echo "$param\n";
 		// var_dump($param);
 		// echo "\n";
 		
 		if($param == NULL) return "";
 		if(is_string($param)) return $param;

 		$paramStrings = array();
	    foreach ($param as $key => $value) {
	      $paramString = $key."='".$value."'";
	    }
	    return (strlen($paramString)>0?" WHERE $paramString":'');
 	}
 	function getInsertValue($param){
 		// echo "$param\n";
 		// var_dump($param);
 		// echo "\n";

 		if($param == NULL) return "";

 		if(is_string($param)){
		    return (strlen($param)>0?" $param":'');
 		}
 		else{
	 		 $keys = array();
	 		 $values = array();
		    foreach ($param as $key => $value) {
		      array_push($keys, $key);
		      array_push($values, $value);
		    }
		    $keyString = join(",",$keys);
		    $valueString = join("','",$values);
		    $valueString = "'".$valueString."'";
		    return (strlen($keyString)>0?" ($keyString) VALUES ($valueString)":'');
		}
 	}
	function getUpdateValue($param){
 		// echo "$param\n";
 		// var_dump($param);
 		// echo "\n";

 		if($param == NULL) return "";

 		if(is_string($param)){
		    return (strlen($param)>0?" $param":'');
 		}
 		else{
 			$keyValueArray = array();
		    foreach ($param as $key => $value) {
		      $keyValueString = $key."='".$value."'";
		      array_push($keyValueArray, $keyValueString);
		    }
		    $keyValueStrings = join(",",$keyValueArray);
		    return (strlen($keyValueStrings)>0?" SET ".$keyValueStrings:'');
		}
 	}
	function sqlFromMethod($crud,$table,$condition,$contents){
	  $sql = "";
	
	  switch ($crud) {
			case 'R':
			case 'r':
	      $sql = "SELECT * FROM `$table`".getWhere($condition);
	      break;
			case 'U':
			case 'u':
	      $sql = "UPDATE `$table`".getUpdateValue($contents).getWhere($condition); 
	      break;
			case 'C':
			case 'c':
	      $sql = "INSERT INTO `$table`".getInsertValue($contents); 
	      break;
			case 'D':
			case 'd':
	      $sql = "DELETE FROM `$table`".getWhere($condition); 
	      break;
	  }
	   return $sql;
	}
	function errorHandle(){
		set_error_handler(function($errno, $errstr, $errfile, $errline, array $errcontext) {
			// error was suppressed with the @-operator
			if (0 === error_reporting()) {
					return false;
			}
			throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
		});
	}
	function showError($statusCode,$exception){
		die('{"statusCode":'.$statusCode.',"message":"'.$exception->getMessage().'"}');
	}
?>