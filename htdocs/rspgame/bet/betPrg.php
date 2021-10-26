<?php
	include "../db.php";
	include "../password.php";

	//echo "<script>alert('{$_POST["betPoints"]}');</script>";
	if($_POST["betPoints"] == "" || $_POST["betPoints"] == 0){
	       echo '<script> alert("배팅 금액을 입력해주세요"); history.back(); </script>'; 
	    }
	 else if ($_POST["betPoints"] > $_SESSION['userpoints']){
	       echo '<script> alert("포인트가 부족합니다. 충전을 요청해주세요");  history.back(); </script>';
        }

	  else {
	    	
	       	 
	       	 $db = mysqli_connect("localhost", "root", "111111", "memberdata");

	       	 	$sql = mq("select * from member where id='".$_SESSION["userid"]."'");
	       	 	$member = $sql->fetch_array();
	       	 	$member["points"] = $_SESSION['userpoints'] - $_POST["betPoints"];
			//echo "<script>alert('{$member["points"]}');</script>";
	       	 	$sql = "UPDATE member SET points='{$member["points"]}' WHERE id='{$_SESSION["userid"]}';";

	  $result = mysqli_query($db, $sql);
	  $_SESSION["userpoints"] = $member["points"];
	  $_SESSION["betpoints"] = $_POST["betPoints"];
	  $_SESSION['resetkeyPlayer'] = "questionmark";
		//$_SESSION['resetkeyComputer'] = "questionmark";
	      }
			

?>

<meta http-equiv="refresh" content="0 url=../main.php">