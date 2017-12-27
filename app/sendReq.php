<?php
	session_start();
	include "../service/person_service.php"; 
	
	$requestInfo=array();
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		for($i = 0; $i < count($_SESSION["userInfo"]); $i++) {
			$requestInfo["req_from"]=$_SESSION["userName"];
			$requestInfo["req_to"]=$_SESSION["userInfo"][$i];
			$requestInfo["req_name"]=$_POST["userFullName"];
			$requestInfo["req_area"]=$_POST["userArea"];
			$requestInfo["req_date"]=$_POST["date"];
			addRequest($requestInfo);
			addResponse($requestInfo);
			
		}
		$_SESSION["userInfo"]="";
		$_SESSION['blood'] = "";
		$_SESSION['district'] = "";
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
			background-repeat: no-repeat;  ">
		<form method="POST">
		<center>
			<br>
			<table>
			<tr>
			<td>Name:</td> 
			<td><input type="text" name="userFullName"></td></tr>
			<br><br>
			</tr><td>Area: </td>
			<td><input type="text" name="userArea"></td></tr>
			<br><br>
		
			<td> Hospital Name:</td> 
			<td><select name="hospital">
				<option value="None">None</option>
				<option value="Dhaka Medical College">Dhaka Medical College</option>
				<option value="Khulna Medical College">Khulna Medical College</option>
				<option value="Rajshahi Medical College">Rajshahi Medical College</option>
				<option value="Chittagong Medical College">Chittagong Medical College</option>
			
				
			</select>
			</td>
			</tr>
			<br><br>
			<tr>
			<td>Calendar:</td> 
			<td><input type="text" name="date" id="calendar"></td>
			</tr>
				
			</table>
			<br><br>
			<input type="submit" name="submit" value="Send Request" style="background-color: #d10a46; color: white;  height: 30px; border-radius: 10px; border-color: white;">
		</form>
	</body>
</html>