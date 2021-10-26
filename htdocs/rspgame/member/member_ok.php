


<?php

      if ($_POST['id'] ==""){echo "<script>alert('아이디를 입력하세요!'); document.location.href=history.back();</script>";}
      if ($_POST['pw'] ==""){echo "<script>alert('비밀번호를 입력하세요!'); document.location.href=history.back();</script>";}
      if ($_POST['name'] ==""){echo "<script>alert('이름을 입력하세요!'); document.location.href=history.back();</script>";}
      if ($_POST['email'] ==""){echo "<script>alert('이메일을 입력하세요!'); 
        document.location.href=history.back();</script>";}
      if ($_POST['chs'] ==0){echo "<script>alert('아이디 중복 검사를 해주세요!'); 
        document.location.href=history.back();</script>";}
       else {
        $db = mysqli_connect("localhost", "root", "111111", "memberdata");
/*
        if ($db) {echo "<script>alert('CHECKED');</script>";}
        else {
       	echo "<script>alert('!');</script>";
       }
 */
$filtered=array(
  'id'=> mysqli_real_escape_string($db, $_POST['id']), 
  'pw'=> mysqli_real_escape_string($db, $_POST['pw']), 
  'name'=> mysqli_real_escape_string($db, $_POST['name']),
  'email'=> mysqli_real_escape_string($db, $_POST['email']),
  'emadress'=> mysqli_real_escape_string($db, $_POST['emadress']));

   $sql = "INSERT INTO member 
      (id, pw, name, email,points) 
   VALUES(
        '{$filtered['id']}',
        '{$filtered['pw']}',
        '{$filtered['name']}',
        '{$filtered['email']}@{$filtered['emadress']}',
        10000
      )";

  $result = mysqli_query($db, $sql);
  if($result === false){
    echo "<script>alert ('ERROR. PROBLEM WITH THE ORDER'); document.location.href=history.back();</script>";}
  }
?>


<meta charset="utf-8" />
<script type="text/javascript">alert('회원가입이 완료되었습니다.');</script>
<meta http-equiv="refresh" content="0 url=../index.html">