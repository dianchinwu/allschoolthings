<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=divice-width,initial-scale=1.0" >
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script>
		$(function(){
				$("#account_name").bind("input propertychange", checkusername);
				$("#password").bind("input propertychange", checkpwd);
				$("#reg_ok").bind("click", reg_ok);
                
			});
			//帳號
		    function checkusername(){
		    	if($("#account_name").val().length==10){
		    		$("#error_name").html("");
		    		
		    	}else{
		    		$("#error_name").html("請輸入手機號碼!!!(10個字數)");
		    		$("#error_name").css("background-color","red");		    		
		    	}
		    }
		    //密碼
            function checkpwd(){
		    	if($("#password").val().length<6){
		    		$("#msg_pwd").text("密碼不得少於6個字數!!!");
		    		$("#msg_pwd").css("background-color","red");
		    	}else if ($("#password").val().length>=6){
		    		$("#msg_pwd").text("");		    		
		    	}
		    }

		     function reg_ok(){
				$.ajax({
					type: "POST",
					url: "../php/ast_teacher_login_check.php",
					data: {name: $("#account_name").val()},
					success: reg,
					error:function(){
						alert("檢查帳號api回傳失敗");
					}
				}); // end ajax
			}

		    function reg(data){
		    	if(data==1){			
					$.ajax({
						type: "POST",
						url: "../php/ast_account_create.php",
						data: {name: $("#account_name").val(),password: $("#password").val()},
						success: reg_account,
						error:function(){
							alert("註冊account api回傳失敗");
						}
					}); // end ajax

		    	}else{
		    		alert("帳號已被註冊,請確認是否填寫正確");
		    	}

			}


			function reg_account(data){
				if(data==1){
					// location.href="signin.php";
			    	$.ajax({
						type: "POST",
						url: "../php/ast_teacher_create.php",
						data: {account_name: $("#account_name").val(),name: $("#name").val(),gender: $("#gender").val()},
						success: reg_teacher,
						error:function(){
							alert("註冊teacher api回傳失敗");
						}
					}); // end ajax
				}else{
					alert("註冊teacher api回傳失敗2");
				}
			}



			function reg_teacher(data){
				if(data==1){
					location.href="signin.php";
				}else{
					alert("reg_error");
				}
			}


	</script>

</head>
<body>
	<div data-role="page" id="home">
		<div data-role="header" data-position="fixed" id="home" data-theme="b">
			<h1>會員註冊</h1>
		</div>
		<div role="main" class="ui-content">
			<div data-role="fieldcontain">
				<label for="account_name">帳號</label>
				<input type="text" name="account_name" id="account_name">
			</div>
			<div id="error_name"></div>
			<div data-role="fieldcontain">
				<label for="password">密碼</label>
				<input type="password" name="password" id="password">
			</div>
			<div id="msg_pwd"></div>
			<div data-role="fieldcontain">
				<label for="name">名字</label>
				<input type="text" name="name" id="name">
			</div>
			<div data-role="fieldcontain">
				<label for="gender">性別</label>
				<select name="sex" id="gender" data-role="slider">
					<option value="m">男生</option>
					<option value="f">女生</option>
				</select>	
			</div>
			<div class="ui-grid-a">
				<div class="ui-block-a">
					<a href="#" data-role="button" data-theme="b">取消</a>		
				</div>
				<div class="ui-block-b">
					<a href="#" data-role="button" data-theme="b" id="reg_ok">註冊</a>		
				</div>
			</div>
		</div>
		<div data-role="footer" data-position="fixed" data-theme="b">
			<h1>footer</h1>
		</div>
	</div>

	
</body>
</html>

