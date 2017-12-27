<?php
	session_start();
	include "../service/person_service.php"; 
	$name=$_GET['id'];
	
	$accepter=array();
	
	$respons=array();
	
	$accepter = getPersonByName($name);
	
	$respons = getResponse($name);
	
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		header("location: profile.php");
	}
	
?>

<html>
	<head>
	
	</head>
	
	<body background="images/profile_background.jpg" >
	<center>
<div style="background-color:#d10a46;height:50px">
		<ul style="list-style: none; padding-top: 15px">


		<li style="float: left; padding-left: 50px;color: white"><a href="profile.php" style="text-decoration: none;color: white;">Profile</a></li>

		<li style="float: left; padding-left: 50px;color: white"><a href="blood_search.php" style="text-decoration: none;color: white;">Blood Search</a></li>
		<li style="float: right; padding-right: 50px;color: white"><a href="user_logout.php" style="text-decoration: none;color: white;"><b>Logout</b></a></li> 
		<li style="float: right; padding-right: 50px;color: white"><a href="profile.php" style="text-decoration: none;color: white;">Welcome <?=$_SESSION['userName']?></a></li>
		<li style="float: right; padding-right: 50px;color: white"><a href="accept_info.php" style="text-decoration: none;color: white;">Accept History</a></li>
		
		
		</ul> 
		</div>
		</center><br>
		<table style="margin-top: 50px;margin-left: 40%">
					<tr>
						<td>User Name :</td>
						<td><?= $accepter['User_Name'] ?></td>
					</tr>
					
					<tr>
						<td>Name :</td>
						<td><?= $accepter['Full_Name'] ?></td>
					</tr>
					
					<tr>
						<td>Blood group :</td>
						<td><?= $accepter['Blood_Group'] ?></td>
					</tr>
					
					<tr>
						<td>Mobile Number :</td>
						<td><?= $respons['accept_mobile'] ?></td>
					</tr>
					
					<tr>
						<td>Email :</td>
						<td><?= $accepter['Email'] ?></td>
					</tr>

					<tr>
						<td>Address :</td>
						<td><?= $accepter['Address'] ?></td>
					</tr>
					
					<tr>
						<td>Status :</td>
						<td><?= $respons['acceptation'] ?></td>
					</tr>
					
		
				</table >
				
				<form method="post" style="margin-left: 40%; margin-top:10px">
					<input type="submit" name="save" value="Back"  style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white ">
				</form>
	</body>
</html>