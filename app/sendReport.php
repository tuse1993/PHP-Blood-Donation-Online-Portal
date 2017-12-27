<?php
	session_start();
	include "../service/person_service.php"; 
	
	$reportInfo=array();
	$thedate = date("F d, Y"); 
	
	if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["report"] == true){	
		$reportInfo["rep_from"]=$_SESSION["userName"];
		$reportInfo["rep_to"]=$_GET['id'];		
		$reportInfo["report"]=$_POST["report"];
		$reportInfo["rep_date"]=$thedate;
		addReport($reportInfo);
		//removeReview($requestInfo);
		
		//$donnesionInfo = getcount($requestInfo["rev_to"]);
		//$donnesionInfo['count']= $donnesionInfo['count']+1;
		
		
		//updateCount($donnesionInfo,$requestInfo["rev_to"]);
		
		
		
		header("location: profile.php");
	}
		

?>

<html>
	<body background="images/acpt_info.jpg" style=" background-size: cover; 	
			background-repeat: no-repeat; margin-top:8%; ">
		<center>
		<form method="post">
			Report:<br> <textarea rows="4" cols="50" name="report"> </textarea> 
			<br><br>
			<input type="submit" name="submit" value="Send Report"  style="background-color: #d10a46; color: white; height: 30px; border-radius: 10px; border-color: white; margin-top: 50px; ">

			<input type="submit" name="back" value="Back"  style="background-color: #d10a46; color: white;  height: 30px; border-radius: 10px; border-color: white; margin-top: 50px; ">
		</form>
	</body>
</html>