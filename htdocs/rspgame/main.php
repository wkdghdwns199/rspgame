<!DOCTYPE html>
<html lang="ko">

  <head>
    <meta charset="UTF-8">
    <title>가위 바위 보 !</title>
    <script type="text/javascript">
  document.oncontextmenu = function(){return false;}



</script>

  </head>
  <style>
    #computer {
      height: 250px;
      width: 140px;
    }
  </style>

  <body  oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
   
<html>
    <head>
        <meta charset="utf-8" />
        <title>가위 바위 보 !</title>
        <!--<script-x language="JavaScript-x">
              function StatusText() {
              window.status = "나타낼 문구";
              setTimeout("StatusText()", 0);
              }
              StatusText();
          </script-x> -->


    </head>
    <body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
        <h1>가위 바위 보!</h1>
        <?php
        include "./db.php";
        
            if(!isset($_SESSION['userid']) || !isset($_SESSION['userpw'])) {
                echo "<p>로그인을 해 주세요. <a href=\"./index.html\">[로그인]</a></p>";
                
            } else {
                $user_id = $_SESSION['userid'];
                $user_points = $_SESSION['userpoints'];
                $bet_points = $_SESSION['betpoints'];
                $resetkeyPlayer = $_SESSION['resetkeyPlayer'];
                $resetkeyComputer = $_SESSION['resetkeyComputer'];
              
                $db = mysqli_connect("localhost", "root", "111111", "result");
                $sql = mq("SELECT * FROM resultBoard ORDER BY gameNum DESC LIMIT 1");
                $computerChoice = $sql->fetch_array();"";
                

                echo "
                
                <fieldset><p><strong>{$user_id}</strong></label>님 환영합니다. 포인트 : {$user_points}
                    <a href=\"#\" onclick=\"askLogout();\">[로그아웃]</a></p>
                
                    <script>
                      function askLogout(){
                          var result = confirm(\"로그아웃 하시겠습니까?\");
                          if (result == true) {location.href=\"./member/logout_ok.php\";}
                          
                      }
                    </script>
                    ";

                  echo "<p><form method=\"post\" action=\"./bet/betPrg.php\" style = \"float:left; margin-right:10px;\">투자 금액 : <input type=\"text\" name = \"betPoints\" id = \"betPoints\" value=\"0\" width=\"30px\">  
                <input type=\"submit\" id=\"betButton\" value=\"BET\"></form>
                <button class=\"btn\" onclick=\"reset_Value();\">초기화</button></p>
                  
                  <div>
                    <button id=\"100원\" class=\"btn\" onclick=\"text_Value(100);\">100원</button>
                    <button id=\"500원\" class=\"btn\" onclick=\"text_Value(500);\">500원</button>
                    <button id=\"1000원\" class=\"btn\" onclick=\"text_Value(1000);\">1000원</button>
                    <button id=\"5000원\" class=\"btn\" onclick=\"text_Value(5000);\">5000원</button>
                    <button id=\"10000원\" class=\"btn\" onclick=\"text_Value(10000);\">10000원</button>
                  </div> </fieldset>
                  <br><br>
                  
                  <fieldset><p>배팅 금액 : {$bet_points}</p>

                  
                  
                  ";

                
                  echo " 
                     <div>
                    <button id=\"가위\" class=\"btn\" onclick=\"button_click(0);\">가위</button>
                    <button id=\"바위\" class=\"btn\"onclick=\"button_click(1);\">바위</button>
                    <button id=\"보\" class=\"btn\"onclick=\"button_click(2);\">보</button>
                  </div> <br><br><br>
                  
                  <div style=\"font-size : 20px; font-weight: bold ;float:left; margin-left:120px;\">나</div>
                  <div style=\"font-size : 20px; font-weight: bold ;float:left; margin-left:220px;\">플레이어</div>
                 <br><br>
                  <p>
                  <div style=\"width:250px; height:300px;  border: 2px solid green; float:left; margin-right:30px;\"><img id=\"player\" src=\"./images/{$resetkeyPlayer}.JPG\"/></div>

                  <div style=\"margin-top : 115px; margin-right:25px; float:left; font-size: 40px; text-align:center; \"><strong>vs</strong></div>

                  <div id=\"computer\" style=\"width:250px; height:300px; border: 2px solid red; background-repeat:no-repeat; float:left;\"><iframe id\"computer_iframe\" style=\" width:100%; height: 100%\"  src=\"http://192.168.1.28:8080\" scrolling=\"no\" frameborder=0 framespacing=0 marginheight=0 marginwidth=0 vspace=0></iframe></div></p> 
                 
                  <div id=\"resultShow\"></div> </fieldset>


                <script>
                var choice = \"questionmark\"
                
                var user_id_temp = '<?$user_id?>';
                  var user_id_temp = user_id_temp.replace(\"<?\", \"\");
                  var user_id = user_id_temp.replace(\"?>\", \"\");

                var user_points_temp = '<?$user_points?>';
                  var user_points_temp = user_points_temp.replace(\"<?\", \"\");
                  var user_points = user_points_temp.replace(\"?>\", \"\");

                var bet_points_temp = '<?$bet_points?>';
                  var bet_points_temp = bet_points_temp.replace(\"<?\", \"\");
                  var bet_points = bet_points_temp.replace(\"?>\", \"\");


                  var url = \"./bet/betResult.php?user_id=\"+user_id + \"&user_points=\" + user_points + \"&bet_points=\" + bet_points;

                  if (bet_points > 0){
                          const target = document.getElementById(\"betButton\");
                          target.disabled = true;
       
                  }

                    function text_Value(betP){
                      var bPoints = document.getElementById(\"betPoints\");
                      bPoints.value = parseInt(bPoints.value) + betP;  
                  }

                  function reset_Value(){
                    var bPoints = document.getElementById(\"betPoints\");
                      bPoints.value = \"0\"; 
                  }


                  function button_click(pC_background){
                       document.getElementById(\"player\").src = \"./images/\" + pC_background + \".jpg\";
                      choice = pC_background;
                  }

                  setInterval(function(){
                          sendData(choice);
                            }, 500000);
                    


                  function sendData(playerChoice){
                     
                      
                      var url = \"./bet/betResult.php?user_id=\"+user_id + \"&user_points=\" + user_points + \"&bet_points=\" + bet_points + \"&resetKeyP=\" + playerChoice;
                     
                
                      
                       
            

                    url = url + \"&resetKeyC=\" + {$computerChoice['result']};

                    if (playerChoice)
                      if (playerChoice - {$computerChoice['result']} == 0){
                        url = url + \"&resultKey=\" + 0;
                      }
                      else if (playerChoice - {$computerChoice['result']} == 1 || playerChoice - {$computerChoice['result']} == -2){
                        url = url + \"&resultKey=\" + 1;
                      }
                      else if (playerChoice == \"questionmark\"){
                        url = url + \"&resultKey=\" + 999;
                      }
                      else {
                        url = url + \"&resultKey=\" + -1;
                      }

                      location.href= url;
                  }

                
                </script>
                  
                  ";


            }
           
        ?>

      
    </body>
</html>
   
    

  </body>
</html>

