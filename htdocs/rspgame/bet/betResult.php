<?php
	include "../db.php";
	include "../password.php";

	
	    $db = mysqli_connect("localhost", "root", "111111", "memberdata");

		$user_points = $_GET["user_points"];
		$bet_points = $_GET["bet_points"];
		$resultKey = $_GET["resultKey"];

		$sql = mq("select * from member where id='".$_GET["user_id"]."'");
	       	 	$member = $sql->fetch_array();

	       	 if ($resultKey == 0 || $resultKey == 999){$member["points"] = $user_points + $bet_points;}
	       	 else if ($resultKey == 1) {$member["points"] = $user_points + ($bet_points*2);}
			//echo "<script>alert('{$member["points"]}');</script>";
	       	 	$sql = "UPDATE member SET points='{$member["points"]}' WHERE id='{$_GET["user_id"]}';";

	  $result = mysqli_query($db, $sql);

	  $_SESSION['userid'] = $_GET["user_id"];
	  $_SESSION["userpoints"] = $member["points"];
	  $_SESSION["betpoints"] = 0;
		$_SESSION['resetkeyPlayer'] = $_GET["resetKeyP"];
		$_SESSION['resetkeyComputer'] = $_GET["resetKeyC"];
	  echo "<script>location.href=\"../main.php\";</script>";
?>

