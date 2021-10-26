<?php
$db = mysqli_connect("localhost", "root", "111111", "memberdata");
 
$sql='SELECT * FROM member';
$result = mysqli_query($db, $sql);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>회원가입</title>
</head>
<body>
	<form method="post" action="./member_ok.php">
		<h1>회원가입</h1>
			<fieldset>
				<legend>입력사항</legend>
					<table>
						<tr>
							<td>아이디</td>
							<td><input type="text" size="35" name="id" id="uid" placeholder="아이디">
							<input type="button" value="중복검사" onclick="checkid();" />
							<input type="hidden" id="chs" value="0" name="chs" /></td>
						</tr>
						<tr>
							<td>비밀번호</td>
							<td><input type="password" size="35" name="pw" placeholder="비밀번호"></td>
						</tr>
						<tr>
							<td>이름</td>
							<td><input type="text" size="35" name="name" placeholder="이름"></td>
						</tr>
						
						
						<tr>
							<td>이메일</td>
							<td><input type="text" name="email">@<select name="emadress"><option value="naver.com">naver.com</option><option value="nate.com">nate.com</option>
							<option value="hanmail.com">hanmail.com</option></select></td>
						</tr>
					</table>

				<input type="submit" value="가입하기" /><input type="reset" value="다시쓰기" />
			
		</fieldset>
	</form>

	<script>
	function checkid(){
	
	var userid = document.getElementById("uid").value;
	if(userid)
	{
		url = "check.php?userid="+userid;
			window.open(url,"chkid","width=300,height=100");
			

		}else{
			var check_id ='';
			alert("아이디를 입력하세요");
		}
	}

	</script>

</body>
</html>