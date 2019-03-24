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
      .slidecontainer {
        width: 100%;
      }

      .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 25px;
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
      }

      .slider:hover {
        opacity: 1;
      }

      .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        background: #4CAF50;
        cursor: pointer;
      }

      .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        background: #4CAF50;
        cursor: pointer;
      }

            #canvas-holder {
      width: 100%;
      margin-top: 50px;
      text-align: center;
      }
      #chartjs-tooltip {
        opacity: 1;
        position: absolute;
        background: rgba(0, 0, 0, .7);
        color: white;
        border-radius: 3px;
        -webkit-transition: all .1s ease;
        transition: all .1s ease;
        pointer-events: none;
        -webkit-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
      }
      .chartjs-tooltip-key {
        display: inline-block;
        width: 10px;
        height: 10px;
        margin-right: 10px;
      }

      .frame{
        margin-top: 0;
        margin-bottom: 0;
        margin-left: auto;
        margin-right: auto;
      }

    </style>
    <title>AllSchoolThings_backend</title>
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
            <button type="button" class="btn"><a href="https://tcnr1608.000webhostapp.com/allschoolthings/WebBack/allshcoolthings_webback_main.html" class="text-light">回首頁</a></button>
          </li>
          <!-- dropdown Navbar選項使用下拉式選單 -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">用戶管理</a>
            <!-- .dropdown-menu 下拉選單內容 -->
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">設定</a>
              <a class="dropdown-item" href="ast_wb_login.php">登出</a>
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
                    <li class="list-group-item"><a href="#">健康</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>


          <div class="mt10 col-md-9 col-lg-10">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">新增</button>
            <div class="card mt10">
              <div class="card-header bg-dark text-danger">          
                學生健康列表
                <button type="button" class="btn btn-outline-warning float-right" data-toggle="modal" data-target="#myModal_pie">圓餅圖</button>
              </div>
              <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                        <td>id</td>
                        <td>學期</td>
                        <td>身高(cm)</td>
                        <td>體重(kg)</td>
                        <td>BMI</td>
                        <td>左眼視力</td>
                        <td>右眼視力</td>
                        <td>學生id</td>
                        <td>備註</td>
                        <td>修改</td>
                    </tr>
                  </thead>
                  <tbody id="health_list">
                    <!-- <tr>
                        <td>1</td>
                        <td>老子</td>
                        <td>m</td>
                        <td>NULL</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>孔子</td>
                        <td>m</td>
                        <td>NULL</td>
                        <td>1</td>
                        <td>1</td>
                    </tr> -->
                  </tbody>
              </table>
            </div> 
          </div>   
        </div>  <!-- row end -->



<!-- The Modal -->
        <div class="modal" id="myModal_pie">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">BMI圓餅統計圖</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
<!-- chart pie -->
                <div id="canvas-holder" style="width: 400px;" class="frame">
                  <canvas id="chart-area" width="500" height="600"></canvas>
                  <div id="chartjs-tooltip">
                    <table></table>
                  </div>
                </div>
<!-- chart pie -->
              </div>

              <!-- Modal footer -->
<!--               <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div> -->

            </div>
          </div>
        </div>






  <!-- The Modal -->
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">新增記錄</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body">

<!--                 <div class="form-group">
                  <label for="semester">學期:</label>
                  <input type="text" class="form-control" placeholder="例如:107-1" id="semester">
                </div> -->
                <div class="slidecontainer">
                  <span>身高(cm):<span id="demo"></span></span>
                  <input type="range" min="50" max="200" value="120" class="slider" id="height">
                </div>
                <div class="slidecontainer">
                  <span>體重(kg):<span id="demo1"></span></span>
                  <input type="range" min="10" max="100" value="20" class="slider" id="weight">
                </div>

                <div class="form-group">
                  <label for="eye_l">左眼視力:</label>
                  <input type="text" class="form-control" placeholder="例如:1.0" id="eye_l">
                </div>
                <div class="form-group">
                  <label for="eye_r">右眼視力:</label>
                  <input type="text" class="form-control" placeholder="例如:1.0" id="eye_r">
                </div>

                <div class="form-group">
                  <label for="student_id">學生id:</label>
                  <input type="text" class="form-control" placeholder="學生id欄位不可為空"" id="student_id">
                </div>
                <div class="form-group">
                  <label for="remark">備註:</label>
                  <input type="text" class="form-control" id="remark">
                </div>


              </div>
              
              <!-- Modal footer -->
              <div class="modal-footer">
              	<div id="msg_insert"></div>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="h_insert">送出</button>
              </div>
              
            </div>
          </div>
        </div>





    </div>  <!-- container end -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="js/utils.js"></script>
    <script>

      $(function(){
        //繪製圖表
          Chart.defaults.global.tooltips.custom = function(tooltip) {
          // Tooltip Element
          var tooltipEl = document.getElementById('chartjs-tooltip');

          // Hide if no tooltip
          if (tooltip.opacity === 0) {
            tooltipEl.style.opacity = 0;
            return;
          }

          // Set caret Position
          tooltipEl.classList.remove('above', 'below', 'no-transform');
          if (tooltip.yAlign) {
            tooltipEl.classList.add(tooltip.yAlign);
          } else {
            tooltipEl.classList.add('no-transform');
          }

          function getBody(bodyItem) {
            return bodyItem.lines;
          }

          // Set Text
          if (tooltip.body) {
            var titleLines = tooltip.title || [];
            var bodyLines = tooltip.body.map(getBody);

            var innerHtml = '<thead>';

            titleLines.forEach(function(title) {
              innerHtml += '<tr><th>' + title + '</th></tr>';
            });
            innerHtml += '</thead><tbody>';

            bodyLines.forEach(function(body, i) {
              var colors = tooltip.labelColors[i];
              var style = 'background:' + colors.backgroundColor;
              style += '; border-color:' + colors.borderColor;
              style += '; border-width: 2px';
              var span = '<span class="chartjs-tooltip-key" style="' + style + '"></span>';
              innerHtml += '<tr><td>' + span + body + '</td></tr>';
            });
            innerHtml += '</tbody>';

            var tableRoot = tooltipEl.querySelector('table');
            tableRoot.innerHTML = innerHtml;
          }

          var positionY = this._chart.canvas.offsetTop;
          var positionX = this._chart.canvas.offsetLeft;

          // Display, position, and set styles for font
          tooltipEl.style.opacity = 1;
          tooltipEl.style.left = positionX + tooltip.caretX + 'px';
          tooltipEl.style.top = positionY + tooltip.caretY + 'px';
          tooltipEl.style.fontFamily = tooltip._bodyFontFamily;
          tooltipEl.style.fontSize = tooltip.bodyFontSize;
          tooltipEl.style.fontStyle = tooltip._bodyFontStyle;
          tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
        };

        var config = {
          type: 'pie',
          data: {
            datasets: [{
              data: [300, 50, 100, 40, 10],
              backgroundColor: [  //顏色不足要自己補
                window.chartColors.purple,
                window.chartColors.green,
                window.chartColors.orange,
                window.chartColors.red,
                window.chartColors.yellow,
                window.chartColors.blue,
              ],
            }],
            labels: [
              'Red',
              'Orange',
              'Yellow',
              'Green',
              'Blue'
            ]
          },
          options: {
            responsive: true,
            legend: {  //上方顏色對應標籤 false
              display: true
            },
            tooltips: {  //雙重標籤 false
              enabled: false,
            }
          }
        };

        //pie update!!!
        // window.onload = function() {
        //  var ctx = document.getElementById('chart-area').getContext('2d');
        //  window.myPie = new Chart(ctx, config);
        // };
        //繪製圖表end---------------------------------------------------------

        $.ajax({
          type:"GET",
          url:"https://tcnr1608.000webhostapp.com/allschoolthings/php/ast_wb_health_api.php",
          //allschoolthings_webback_health_api.php
          dataType:"text",
          success:chart,
          error:function(){
            alert("health_api接收失敗");
          }
        });

        function chart(data){
          // console.log(data);
          var dataArray = [];
          dataArray = data.split("#");
          bmisug = ["過輕","正常","過重","肥胖"]
          // console.log(dataArray);
          // console.log(dataArray[0]);
          // console.log(dataArray[1]);
          // console.log(dataArray[2]);
          // console.log(dataArray[3]);

          config.data.labels=[];  //先清空標籤
          config.data.datasets[0].data=[];  //清空數值
          for(var i=0;i<dataArray.length;i++){
            config.data.labels.push(bmisug[i]);  //標籤
            config.data.datasets[0].data.push(dataArray[i]);
          }
          // console.log(config.data.datasets[0].data);
          // config.update();
          //ajax完成後再畫圖
          var ctx = document.getElementById('chart-area').getContext('2d');
          window.myPie = new Chart(ctx, config);

        }
        //繪製圖表資料end-------------------------------------------------


        //slidecontainer身高
        var slider = document.getElementById("height");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;

        slider.oninput = function() {
          output.innerHTML = this.value;
        }

        var slider1 = document.getElementById("weight");
        var output1 = document.getElementById("demo1");
        output1.innerHTML = slider1.value;

        slider1.oninput = function() {
          output1.innerHTML = this.value;
        }


        $.ajax({
          type: "GET",
          url: "https://tcnr1608.000webhostapp.com/allschoolthings/php/api.php/r/health",
          //https://tcnr1608.000webhostapp.com/allschoolthings/php/api.php/r/health
          dataType: "json",
          success: showList,
          error:function(){
            alert("會員列表api回傳失敗");
          }
        });//ajax end


      //   $("#student_id").bind("input propertychange",function(){
    		// if($("#student_id").val().length<3){
    		// 	$("#msg_insert").css("color","red");
    		// 	$("#msg_insert").text("學生id欄位不可為空");
      //       	alert("學生id欄位不可為空");
      //       	flag_student_id=false;
    		// }else{
    		// 	flag_student_id=true;
    		// }
      //   });



      });



      function showList(data){
        // data = result['data'];
        // console.log(data.data[0].id);
        for(i=0; i<data.data.length; i++){
          strHTML = "";
          strHTML = '<tr><td>'+data.data[i].id+'</td><td>'+data.data[i].semester+'</td><td>'+data.data[i].height+'</td><td>'+data.data[i].weight+'</td><td>'+data.data[i].bmi+'</td><td>'+data.data[i].eye_l+'</td><td>'+data.data[i].eye_r+'</td><td>'+data.data[i].student_id+'</td><td>'+data.data[i].remark+'</td><td><a href="ast_wb_health_update.php?id='+data.data[i].id+'" data-id='+data.data[i].id+' class="btn btn-sm btn-primary mr5">更新</a><a href="#" class="btn btn-sm btn-danger" onclick="delete_ok('+data.data[i].id+')">刪除</a></td></tr>';
          $("#health_list").append(strHTML);
        }        
      }



      $("#h_insert").bind("click",function(){
          if($("#student_id").val().length==0){
          	alert("學生id欄位不可為空");
          }else{

            $.ajax({
              type:"POST",
              url:"https://tcnr1608.000webhostapp.com/allschoolthings/php/ast_health_create.php",  //ast_health_update.php
              //https://tcnr1608.000webhostapp.com/allschoolthings/php/ast_health_create.php
              data:{height:$("#height").val() , weight:$("#weight").val() , eye_l:$("#eye_l").val() , eye_r:$("#eye_r").val() , student_id:$("#student_id").val() , remark:$("#remark").val() },  //id:$(this).data("id")
              success:h_create,
              error:function(){
                alert("health create api回傳失敗");
              }
            });//ajax end

          }//else end
      });


      function h_create(data){
        // console.log(data);
        if(data==1){
          // location.href="ast_wb_health.php";
          history.go(0);  //重整頁面
        }else{
          alert("資料寫入失敗");
        }
      }




      function delete_ok(id){
        if(confirm("確認刪除?")){
          $.ajax({
            type: "POST",
            url: "https://tcnr1608.000webhostapp.com/allschoolthings/php/api.php/d/health/id/"+id,
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