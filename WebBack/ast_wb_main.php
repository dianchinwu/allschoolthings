<?php
 session_start();
 if(isset($_SESSION["username"])){
  // echo '<script>
  //       alert("老師您好,歡迎光臨");
  //       </script>';
 }else{
  echo '<script>
        alert("請先登入會員");
        location.href="ast_wb_login.php";
        </script>';
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
                    <li class="list-group-item"><a href="ast_wb_teacher.php">教師</a></li>
                    <li class="list-group-item"><a href="ast_wb_parent.php">家長</a></li>
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
                    <li class="list-group-item"><a href="ast_wb_health.php">健康</a></li>
                  </ul>
                </div>
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
  </body>
</html>