<?php
 session_start();
 if(isset($_SESSION["username"])){
  
 }else{
  echo '<script>
        alert("請先登入會員");
        location.href="ast_wb_login.php";
        </script>';
 }

 $teacher_id = $_GET["id"];

 require_once("../php/ast_connect.php");

 $link = create_connect();

 $sql = "SELECT * 
      From teacher 
      WHERE id = $teacher_id";

 $result = execute_sql($link, "id7773224_allschoolthings", $sql);
 // $id = $_COOKIE['id'];
 // $name = $_COOKIE['name'];
 // $account_name = $_COOKIE['account_name'];
 if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
  }else{
    echo "update fail";
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      .mt10{
        margin-top: 10px;
      }

      .mr5{
        margin-right: 5px;
      }

      a {
          text-decoration:none;
      }
    </style>
    <title>AST學校管理</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">AllSchoolThings</a>
      <!-- Dropdown -->
      <!-- .navbar-toggler 漢堡式選單按鈕 -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <!-- .navbar-toggler-icon 漢堡式選單Icon -->
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <!-- 漢堡式折疊選單 -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li>
            <button type="button" class="btn"><a href="ast_wb_main.php" class="text-light">回首頁</a></button>
          </li>
          <!-- dropdown Navbar選項使用下拉式選單 -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">用戶管理</a>
            <!-- .dropdown-menu 下拉選單內容 -->
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">設定</a>
              <a class="dropdown-item" href="../php/ast_wb_logout_api.php">登出</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
          <div id="accordion" class="mt10 col-md-3 col-lg-2">
            <!-- 會員管理 -->
            <div class="card">
              <div class="card-header bg-dark" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link bg-dark text-danger" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    會員管理
                  </button>
                </h5>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#">教師</a></li>
                    <li class="list-group-item"><a href="#">家長</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- 學生資訊 -->
            <div class="card">
              <div class="card-header bg-dark"" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed bg-dark text-danger" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    學生資訊
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#">健康</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="mt10 col-md-9 col-lg-10">
            <?php
              
            ?>
            <div class="card">
              <div class="card-header bg-dark text-danger">          
                修改資料
              </div>
              <div class="card-body">
                <form>
                  <div class="form-group">
                      <label for="teacher_id">id:</label>
                      <input type="text" class="form-control form-control-sm" id="teacher_id" value="<?php echo $row["id"]?>" readonly>
                  </div>
                  <div class="form-group">
                      <label for="teacher_name">名字:</label>
                      <input type="text" class="form-control form-control-sm" id="teacher_name" value="<?php echo $row["name"]?>">
                  </div>
                  <div class="form-group">
                      <label for="teacher_gender">性別:</label>
                      <select class="form-control form-control-sm" id="teacher_gender">
                        <option value="m">男生</option>
                        <option value="f">女生</option>
                      </select> 
                  </div>
                  <div class="form-group">
                      <label for="teacher_account">帳號:</label>
                      <input type="text" class="form-control form-control-sm" id="teacher_account" value="<?php echo $row["account_name"]?>">
                  </div>
                </form>
                <a href="ast_wb_teacher.php" class="btn btn-sm btn-primary mr5">取消</a>
                <a href="#" class="btn btn-sm btn-danger" onclick="fnUpdate(<?php echo $row["id"]?>)">確認</a>
              </div>
            </div>
            
          </div>   
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
      $(function(){
        $("#teacher_gender").val("<?php echo $row["gender"]?>").change();
      });

      function fnUpdate(id){
        $.ajax({
          type:"POST",
          url:"../php/api.php/u/teacher/id/"+id,
          data:{id: $(this).data("id"), name: $("#teacher_name").val(), gender: $("#teacher_gender").val(), account_name: $("#teacher_account").val()},
          dataType: "json",
          success: function(data){
            if(data.statusCode == 10200){
              location.href = "ast_wb_teacher.php";
            }else{
              alert("update failed!")
            }
          },
          error: function(){
            alert("update failed!");
          }
        });
      }
    </script>
  </body>
</html>