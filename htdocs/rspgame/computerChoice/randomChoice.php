<html>
<head>
	<style>
		#computer { 
	margin:0 auto;
	width:100%;
	height:100%;
	background-repeat:no-repeat;
	background-position:0 0;
	background-size:100% 100%;
}
</style>


</head>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">

<?php
	$computerChoice = mt_rand(0,2);
	$db = mysqli_connect("localhost", "root", "111111", "result");

	$sql = "INSERT INTO resultBoard
      (result) 
   VALUES(
        '{$computerChoice}'
      )";

      $result = mysqli_query($db, $sql);

echo "
<div id=\"computerChoice\" style=\"width:100%; height:100%;\"><img id=\"computer\" src=\"../images/questionmark.JPG\"/></div>


<script>   
			
		setInterval(function(){
                          sendData({$computerChoice});
                            }, 5000);

          setInterval(function(){
                          reset();
                            }, 10000);
                            

                         function sendData(computerChoice){
                         	document.getElementById(\"computer\").src = \"../images/\" + computerChoice + \".jpg\";	
                         }

                         function reset(){
                         	location.reload();
                         }
      
      
</script>";
?>
</body>
</html>

	

