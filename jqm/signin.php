<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="css/ast_style.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script>
			$(function(){
				$("#name").bind("input propertychange", checkusername);
				$("#password").bind("input propertychange", checkpwd);
				$("#login").bind("click", login);
				
                
			});
			//帳號
		    function checkusername(){
		    	if($("#name").val().length==10){
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


		     function login(){
				$.ajax({
					type: "POST",
					url: "../php/ast_teacher_login.php",
					data: {name: $("#name").val(),password:$("#password").val()},
					success: login_href,
					error:function(){
						alert("帳號");
					}
				}); // end ajax
			}

			function login_href(data){
				if(data==1){
					location.href="index.php";
				}else{
					alert("error3");
				}
			}


	</script>
</head>
<body>
	<div data-role="page" id="signin"><!-- style="background-color:#6b8e23;" -->
	    <!-- <div data-role="header" data-theme="b" data-position="fixed">	                   	     
	    </div>  -->
	    <div data-role="main" class="ui-content"><!-- data-theme="#66cdaa" -->
	    	<div class="signin_logo_div">
				<img src="http://fakeimg.pl/200x200/00CED1/FFF/?text=LOGO" class="signin_logo">
			</div>
			<div data-role="fieldcontain">
				<label for="name"></label>
				<input type="text" name="name" id="name" value="" placeholder="帳號">
			</div>
	      	<div id="error_name"></div>

	      	<div data-role="fieldcontain">
	      		<label for="password"></label>
	      		<input type="password" name="password" id="password" value="" placeholder="密碼">
	      	</div>
	      	<div id="msg_pwd"></div>		

	      	<div class="ui-grid-a">
	      		<div class="ui-block-a">
	      			<a href="registered.php" data-role="button" data-theme="b" id="" data-ajax="false">註冊</a>
	      		</div>
	      		<div class="ui-block-b">		      		
	      			<a href="#" data-role="button" data-theme="b" id="login">登入</a>
	      		</div>
	      			<!--  style="background-color:#ff4500" -->	
	      	</div>
      	</div>

      	<!-- <div data-role="footer" data-position="fixed" data-theme="b" style="background-color:#6b8e23;">
	    	<h4>頁尾</h4>          
    	</div>  -->
	      		
	</div>	  


</body>
</html> 