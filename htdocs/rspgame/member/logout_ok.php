<?php
	include "../db.php";
	include "../password.php";
	$db = mysqli_connect("localhost", "root", "111111", "memberdata");

	$sql = mq("select * from member where id='".$_SESSION["userid"]."'");
	$member = $sql->fetch_array();

	$member["points"] = $_SESSION["userpoints"] + $_SESSION["betpoints"];
	$sql = "UPDATE member SET points='{$member["points"]}' WHERE id='{$_SESSION["userid"]}';";
	 $result = mysqli_query($db, $sql);
	$sql = "UPDATE member SET loginSts=0 WHERE id='{$_SESSION["userid"]}';";
	 $result = mysqli_query($db, $sql);


	//echo "<script>alert({$_SESSION["betpoints"]});</script>";
	echo "<script>location.href=\"../index.html\";</script>";
?>