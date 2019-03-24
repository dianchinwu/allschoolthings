<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>AST學校管理</title>
  </head>
  
  <body>
    <!-- bs4-ast-navbar -->
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">AST學校管理</a>
          </nav><br>
    <!-- bs4-ast-navbar -->

    <div class="row justify-content-sm-center">
      <div class="col-sm-6 ">
        <div class="input-group">  <!-- mb-3 -->
          <div class="input-group-prepend">
            <span class="input-group-text">帳號</span>  <!-- id="basic-addon1" -->
          </div>
          <input type="text" class="form-control" placeholder="請輸入帳號" aria-label="username" id="username">  <!-- aria-describedby="basic-addon1" -->
        </div>          
      </div>
    </div><br>

    <div class="row justify-content-sm-center">
      <div class="col-sm-6 ">
        <div class="input-group">  <!-- mb-3 -->
          <div class="input-group-prepend">
            <span class="input-group-text">密碼</span>  <!-- id="basic-addon1" -->
          </div>
          <input type="password" class="form-control" placeholder="請輸入密碼" aria-label="password" id="password">  <!-- aria-describedby="basic-addon1" -->
        </div>          
      </div>
    </div><br>

    <div class="row justify-content-sm-center">
      <div class="col-sm-12 ">
        <div class="row">
          <div class="col-sm-6 text-right">
            <button class="btn btn-dark btn" id="login_cancel_btn">取消</button>
          </div>
          <div class="col-sm-6 text-left">
            <button class="btn btn-dark" id="login_ok_btn">登入</button>
          </div>
        </div>          
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <!--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script>
		$(function(){
      $("#login_cancel_btn").bind("click",ck_cancelbtn);

			$("#login_ok_btn").bind("click", function(){
				// confirm("確定要登入?");
				$.ajax({
					type: "POST",
					url: "../php/ast_wb_login_api.php",
					data: {name: $("#username").val(), password: $("#password").val()},
					success: login,
					error:function(){
						alert("api failed");
					}
				}); // end ajax
			});
		});

		function login(data){
			if(data == "1"){
				location.href = "ast_wb_main.php";
			}else{
				alert("帳號密碼輸入錯誤!");
			}
		}

    function ck_cancelbtn(){
      $("#username").val("");
      $("#password").val("");
    }
	</script>
  </body>
</html>