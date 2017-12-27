<?php
	session_start();
	include "../service/person_service.php"; 
	
	$requestInfo=array();
	//$donnesionInfo=array();
	//$donnesionInfo = getcount($_GET['id']);
	//var_dump($donnesionInfo);
	//$donnesionInfo['count']= $donnesionInfo['count']+1;
	//var_dump($donnesionInfo);
	
	$thedate = date("F d, Y"); 
	//var_dump($thedate);
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){	
		$requestInfo["rev_from"]=$_SESSION["userName"];
		$requestInfo["rev_to"]=$_GET['id'];		
		$requestInfo["rev_comment"]=$_POST["review"];
		$requestInfo["rev_date"]=$thedate;
		addReview($requestInfo);
		removeReview($requestInfo);
		
		$donnesionInfo = getcount($requestInfo["rev_to"]);
		$donnesionInfo['count']= $donnesionInfo['count']+1;
		
		
		updateCount($donnesionInfo,$requestInfo["rev_to"]);
		
		
		
		header("location: profile.php");
	}
		

?>



<html>
	<head>
		
	</head>
	<body background="images/acpt_info.jpg" style=" background-size: cover; 	
			background-repeat: no-repeat;">
			<center>
		<form method="POST">
			<br>
			 <textarea rows="4" cols="50" name="review"> </textarea> 
			<br><br>
			
			<input type="submit" name="submit" value="Send Approval"  style="background-color: #d10a46; color: white;  height: 30px; border-radius: 10px; border-color: white;  ">
		</form>
	</body>
</html>