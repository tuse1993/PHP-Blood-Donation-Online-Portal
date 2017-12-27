<?php
	session_start();
	include "../service/person_service.php"; 
	$userId=$_GET["id"];
	//$availability="Yes";
	$userinfo = getResponse($userId);
	var_dump($userinfo);
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$userName=$_SESSION['userName'];
		//var_dump($userName);
		$mobile = $_POST['userMobile'];
		$users = updateMobile($userName,$mobile);
		updateMobile2($userName,$mobile);
		
		addAcceptance($userinfo);
		
		removeRequest($userName);
		header("location: profile.php");
	}
	
?>

<html>
	<head>
	
	</head>
	
	<body background="images/acpt_info.jpg" style=" background-size: cover; 	
			background-repeat: no-repeat; margin-top: 10%">
		<center>
		<form method="POST">
			<br>
			Mobile: <input type="text" name="userMobile">
			<br><br>
			
			<input type="submit" name="submit" value="Send Request" style="background-color: #d10a46; color: white; width: 120px; height: 30px; border-radius: 10px; border-color: white; margin-top: 10px; ">
		</form>
	</body>
</html>