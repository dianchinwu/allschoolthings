<?php
require_once("api-function.php");

errorHandle();

// $DEBUG = true;

$ServerUrl = "localhost";
// $DBName = "id7769330_android";
$DBName = "id7773224_allschoolthings";
// $DBAccount = "id7769330_androiduser";
$DBAccount = "id7773224_tcnr1608";
$DBPassword = "123456";


/*
statua code:
10200 success
10501 input parameter handling error
10502 response handling error 
10504 sql connecting error
10505 sql query error
10506 sql error
*/
try{
  header('Access-Control-Allow-Origin:*');
  header('Content-type: application/json');


  // connect to the mysql formdatabase
  $link = connectDB($ServerUrl, $DBAccount, $DBPassword, $DBName);
  mysqli_select_db($link,$DBName);
}catch(Exception $e){
  showError(10504,$e);
}
try{
  // get the HTTP method, path and body of the request
  $method = $_SERVER['REQUEST_METHOD'];

  $request = explode('/', trim($_SERVER['PATH_INFO'],'/'));

  $returnArray = array();

  $contents = getContent($method);

  $pathFirst = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
  // echo "first:".$pathFirst."\n";
  if($pathFirst=="debug"){
    $DEBUG = true;
    $pathCRUD = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
  }
  else{
    $pathCRUD = $pathFirst;
  }
  // echo "crud:".$pathCRUD."\n";

  // retrieve the table and key from the path
  $pathCommand = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
  // echo "command:".$pathCommand."\n";

  $pathKey = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
  $pathValue = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));

  $condition = array();
  if(strlen($pathKey)>0 && strlen($pathKey)>0){
    $condition[$pathKey] = $pathValue;
  }
  // echo "dump condition";
  // var_dump($condition);
  // echo "\n";
  // var_dump($contents);
  // echo "\n";

  switch ($pathCommand) {
    default:
      // echo 
      // echo
        $sql = sqlFromMethod($pathCRUD,$pathCommand,$condition,$contents);

      // echo "\n";
      break;
  }
}catch(Exception $e){
  showError(10501,$e);
}

try{
  // /*
  // excecute SQL statement
  $result = mysqli_query($link,$sql);
}catch(Exception $e){
  showError(10505,$e);
}

try{

if(isset($DEBUG) && $DEBUG==true){
  $returnArray["sql"]=$sql;
}
// die if SQL statement failed
if (!$result) {

  $returnArray["statusCode"]=10506;
  $returnArray["message"]=mysqli_error($link);


  die(json_encode($returnArray));
}
$returnArray["statusCode"]=10200;
$returnArray["message"]="success";

  switch ($pathCRUD) {
    case 'R':
    case 'r':
      $dataArray = array();
      while($row =mysqli_fetch_assoc($result))
      {
          $dataArray[] = $row;
      }
      $returnArray["data"]=$dataArray;

      break;
    default:
      
      break;
  }
  //sql array => array()

  // echo "result\n";
  // var_dump($returnArray);
  // echo "\n";
  echo 
    json_encode($returnArray);

  // close mysql connection
  mysqli_close($link);
  // */
}catch(Exception $e){
  die('{"statusCode":10503,"message":"'.$e->getMessage().'"}');
  showError(10503,$e);
}

?>