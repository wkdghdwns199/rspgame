<?php

	include "../db.php";
	$uid = $_GET["userid"];
	$sql = mq("select * from member where id='".$uid."'");
	$member = $sql->fetch_array();
	if($member==0)
	{

	echo "<div style=\"font-family:\"malgun gothic\"\";>{$uid} 는 사용가능한 아이디입니다.</div>";
 	echo "<script>opener.document.getElementById(\"chs\").value = 1 </script>";
 	echo "<script>opener.document.getElementById(\"uid\").value = {$uid} </script>";
	}else{

	echo "<div style=\"font-family:\"malgun gothic\"; color:red;\">{$uid} : 중복된 아이디입니다.<div>";
	echo "<script>opener.document.getElementById(\"chs\").value = 0 </script>";
	echo "<script>opener.document.getElementById(\"uid\").value = \"\" </script>";
	}

	 
?>

<button value="닫기" onclick="window.close()">닫기</button>
<script>
	

</script>