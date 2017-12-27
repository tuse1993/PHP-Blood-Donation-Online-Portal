<?php
	session_start();
	include "../service/person_service.php"; 
	
	$requestInfo=array();
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		
		$requestInfo["req_from"]=$_SESSION["userName"];
		$requestInfo["req_to"]=$_POST["requester"];
		$requestInfo["donnesion_date"]=$_POST["date"];
		addDonnesionInfo($requestInfo);
				
		header("location: profile.php");
	}
	
	if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['back'] == true){
		header("location: profile.php");
	}		

?>


<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="jquery-ui.css">
			<script src="jquery-1.12.4.js"></script>
			<script src="jquery-ui.js"></script>
		<script>   
			$(function() {
				$( "#calendar" ).datepicker();   
			}); 
		</script>
	
	</head>
	<body background="images/acpt_info.jpg" style=" background-size: cover; 	
			background-repeat: no-repeat; margin-top: 8%">
		<center>
		<form method="post">
			<tr><td>User Name:</td>
			<td><input type="text" name="requester"></td>
			</tr>
			
			<tr><td>Donnesion Date:</td>
			<td><input type="text" name="date" id="calendar" ></td>
			</tr>
			<br><br>
			<input type="submit" name="submit" value="Request For Approval"  style="background-color: #d10a46; color: white; height: 30px; border-radius: 10px; border-color: white;  ">
			<input type="submit" name="back" value="Back"  style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white;  ">
			
		</form>
	</body>
</html>