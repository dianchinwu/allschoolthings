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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet">
    <!-- datatables CSS -->
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
      table.dataTable{
        border-collapse:collapse !important;
      }

      .mt10{
        margin-top: 10px;
      }

      .mb10{
        margin-bottom: 10px;
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
                    <li class="list-group-item"><a href="ast_wb_teacher.php">教師</a></li>
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
                    <li class="list-group-item"><a href="ast_wb_health.php">健康</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="mt10 col-md-9 col-lg-10">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                <!-- <a href="http://192.168.60.108/mobileWEB/jqm/registered.php" class="text-light">新增</a> -->
                新增
              </button>      
              <!-- The Modal -->
              <div class="modal" id="myModal">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">新增會員</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      
                      <!-- Modal body -->
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="account_name">帳號:</label>
                            <input type="text" class="form-control" id="account_name" value="" placeholder="請輸入手機號碼">
                          </div>
                          <div class="form-group">
                            <label for="password">密碼:</label>
                            <input type="password" class="form-control" id="password" value="">
                          </div>
                          <div class="form-group">
                            <label for="parents_name">姓名:</label>
                            <input type="text" class="form-control" id="parents_name" value="">
                          </div>
                          <div class="form-group">
                            <label for="parents_gender">性別:</label>
                            <select class="form-control" id="parents_gender">
                              <option value="m">男生</option>
                              <option value="f">女生</option>
                            </select> 
                          </div>
                          <div class="form-group">
                            <label for="account_email">E-mail:</label>
                            <input type="email" class="form-control" id="account_email" value="">
                          </div>
                          <div class="form-group">
                            <label for="child_id">學生代號:</label>
                            <input type="text" class="form-control" id="child_id" value="">
                          </div>
                        </form>
                      </div>
                      
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="btnCreate" data-dismiss="modal">送出</button>
                      </div>
                      
                    </div>
                  </div>
              </div>
            <div class="card mt10">
              <div class="card-header bg-dark text-danger mb10">          
                家長列表
              </div>
              <table id="example" class="table table-striped table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                        <td>id</td>
                        <td>姓名</td>
                        <td>性別</td>
                        <!-- <td>頭像路徑</td>
                        <td>班級代號</td> -->
                        <td>帳號</td>
                        <td>修改</td>
                    </tr>
                  </thead>
                  <tbody id="parents_list">
                   
                  </tbody>
                  <!-- <tfoot>
                    <tr>
                      <td>id</td>
                      <td>姓名</td>
                      <td>性別</td>
                      <td>頭像路徑</td>
                      <td>學生代號</td>
                      <td>帳號</td>
                      <td>修改</td>
                    </tr>
                </tfoot> -->
              </table>
            </div> 
          </div>   
        </div>
    </div>

    <!-- Optional JavaScript -->

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- dataTables -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
      $(function(){
        $("#btnCreate").bind("click", fnCreateCheck);

        $.ajax({
          type: "GET",
          url: "../php/api.php/r/parent",
          dataType: "json",
          success: showList,
          error:function(){
            alert("api failed");
          }
        });
      });

      // $(document).ready(function(){
      //   $('#example').DataTable();
      // } );

      function fnCreateCheck(){
        $.ajax({
          type: "POST",
          url: "../php/ast_parent_login_check.php",
          data: {name: $("#account_name").val()},
          success: fnCreate,
          error:function(){
            alert("check api failed");
          }
        });
      }

      function fnCreate(data){
        console.log("data"+data);
        if(data==0){      
          $.ajax({
            type: "POST",
            url: "../php/api.php/c/account/",
            data: {name: $("#account_name").val(),password: $("#password").val(),identity_id: 3,email: $("#account_email").val()},
            success: function(data){
              if(data.statusCode==10200){
                alert("create account success");
              }else{
                alert("create account failed");
              }
            },
            error:function(){
              alert("create account api failed");
            }
          });

          $.ajax({
            type: "POST",
            url: "../php/api.php/c/parent/",
            data: {account_name: $("#account_name").val(),name: $("#parents_name").val(),gender: $("#parents_gender").val(),student_id: $("#child_id").val()},
            success: function(data){
              if(data.statusCode==10200){
                // alert("create parents success");
                history.go(0);  //重整頁面
              }else{
                alert("create parents failed");
              }
            },
            error:function(){
              alert("create parents api failed");
            }
          });
        }else{
            alert("帳號已被註冊,請重新填寫!");
        }
      }

      function showList(result){
        data = result['data'];
        for(i=0; i<data.length; i++){
          strHTML = "";
          strHTML = '\
          <tr>\
            <td>'+data[i].id+'</td>\
            <td>'+data[i].name+'</td>\
            <td>'+data[i].gender+'</td>\
            <td>'+data[i].account_name+'</td>\
            <td>\
              <a href="ast_wb_parent_update.php?id='+data[i].id+'" class="btn btn-sm btn-primary mr5">更新</a>\
              <a href="#" class="btn btn-sm btn-danger" onclick="fnDelete('+data[i].id+')">刪除</a>\
            </td>\
          </tr>';
          //console.log(data[i]);
          //console.log("html:"+strHTML);
          $("#parents_list").append(strHTML);
        }   
        $('#example').DataTable();   
      }
      function goUpdate(){
        // var params = [];
        // for(var key in data){
        //   params.push(key+"="+data[key]);
        // }
        // var paramString = params.join("&");
        //document.location.href="ast_wb_teacher_update.php";
      }
      function fnDelete(id){
        if(confirm("確認刪除?")){
          $.ajax({
            type: "POST",
            url: "../php/api.php/d/parent/id/"+id,
            dataType: "json",
            success: function(data){
              if(data.statusCode==10200){
                alert("delete success");
              }else{
                alert("delete failed");
              }
             history.go(0);
            },
            error:function(){
              alert("api failed");
            }
          });
        }
      }
    </script>
  </body>
</html>