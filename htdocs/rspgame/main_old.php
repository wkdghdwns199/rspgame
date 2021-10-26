<!DOCTYPE html>
<html lang="ko">

  <head>
    <meta charset="UTF-8">
    <title>가위 바위 보 게임</title>
  </head>
  <style>
    #computer {
      height: 250px;
      width: 140px;
    }
  </style>

  <body>
   
<html>
    <head>
        <meta charset="utf-8" />
        <title>PHP Session Login Test</title>
    </head>
    <body>
        <h1>가위 바위 보!</h1>
        <?php
        session_start();
            if(!isset($_SESSION['userid']) || !isset($_SESSION['userpw'])) {
                echo "<p>로그인을 해 주세요. <a href=\"./index.html\">[로그인]</a></p>";
                
            } else {
                $user_id = $_SESSION['userid'];
                $user_points = $_SESSION['userpoints'];
                $bet_points = $_SESSION['betpoints'];
                
                echo "<p><strong>{$user_id}</strong></label>님 환영합니다. 포인트 : {$user_points}
                    <a href=\"#\" onclick=\"askLogout();\">[로그아웃]</a></p>
                
                    <script>
                      function askLogout(){
                          var result = confirm(\"로그아웃 하시겠습니까?\");
                          if (result == true) {location.href=\"./index.html\";}
                          else {location.href=\"./main.php\";};
                      }
                    </script>
                    ";

                  echo "<p><form method=\"post\" action=\"./bet/betPrg.php\">투자 금액 : <input type=\"text\"; name=\"betPoints\"; width=\"30px\";>  
                <input type=\"submit\" value=\"BET\"></form></p>";

                  echo "<p>배팅 금액 : {$bet_points}</p>";
                
                  
            }
        ?>

        
        <p>투명한 유리구슬처럼 보이지만 그렇게 쉽게 깨지진 않을 거야</p>
    </body>
</html>
    <div id="computer"></div>
    <div>
      <button id="바위" class="btn">바위</button>
      <button id="가위" class="btn">가위</button>
      <button id="보" class="btn">보</button>
    </div>
    <div id="resultShow"></div>
    <script>
      const computer = document.querySelector('#computer');
      let left = 0;
      let computerPosition = {
        바위: '0',
        가위: '-100px',
        보: '-270px',
      }

      function computerChoice(value) {
        return Object.entries(computerPosition).find(function(el) {
          return el[1] === value;
          console.log(el[0])
        })[0];
      }
      
      let timeControl;

      function timeControlFn() {
        timeControl = setInterval(function() {
          if (left === computerPosition.바위) {
            left = computerPosition.가위;
          } else if (left === computerPosition.가위) {
            left = computerPosition.보;
          } else {
            left = computerPosition.바위;
          }
          computer.style.background = 'url(https://blog.kakaocdn.net/dn/dEfPIp/btqRxZvIwfQ/ZxcvaXl4f4TG4S08igTeak/img.jpg)' + left + ' 0 no-repeat'; //0 앞에 한자리 띄우기
        }, 10);
      }

      timeControlFn();

      const score = {
        바위: 1,
        가위: 0,
        보: -1,
      }

      let btnActive = false;

      document.querySelectorAll('.btn').forEach(function(el) {
        el.addEventListener('click', function() {

          if (btnActive) {
            return false;
          }
          btnActive = true;
          clearInterval(timeControl); 
          
          setTimeout(function() {
            timeControlFn();
            btnActive = false;
          }, 4000);

          let myChoice = this.textContent;
          console.log(`나의 결과: ${myChoice} / 컴퓨터의 결과: ` + computerChoice(left));

          let myScore = score[myChoice];
          let computerScore = score[computerChoice(left)];
          let scoreDifference = myScore - computerScore;
          resultShow = document.querySelector('#resultShow');

          if (scoreDifference === 0) {
            resultShow.textContent = '비겼습니다.';
            var resultKey=0 ;
          } else if ([1, -2].includes(scoreDifference)) {
            resultShow.textContent = '이겼습니다.';
            var resultKey=1 ;
          } else {
            resultShow.textContent = '졌습니다.ㅠ';
            var resultKey=-1 ;
          }
        });
      });
    </script>

    <?php

      echo "<script>document.write(resultKey);</script>";
      
    ?>




  </body>
</html>