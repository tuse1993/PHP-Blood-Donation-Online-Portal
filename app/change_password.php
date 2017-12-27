<?php
	session_start();
	if($_SESSION['userName']==true){
		
		$currentPasswordError="";
		$retypePasswordError="";
		$userInfo="";
		
		include "../service/person_service.php"; 
		if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['submit'] == true){
			$userInfo = getPersonByName($_SESSION['userName']);
			if($userInfo['Password'] != $_POST['currentPassword']){
				$currentPasswordError="Invalid Password";
			}
			else{
				if($_POST['newPassword'] != $_POST['retypePassword']){
					$retypePasswordError="Password is not matched";
				}
				else{
					updatePassword($_POST['newPassword'],$_SESSION['userName']);
					header("location:profile.php");
				}
			}	
		}
		else if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Back'] == true){
			header("location: profile.php");
		}
	}
	else{
		header("location:profile.php");
	}
?>



<html>
	<body background="images/acpt_info.jpg" style=" background-size: cover; 	
			background-repeat: no-repeat; margin-top: 8%">
			<center>
		<form method="post">
			<table>
			<tr>
			<td>Current Password:</td>
			<td><input type="password" name="currentPassword"><?=$currentPasswordError?></td>
			</tr>
			
			<tr>
			<td>New Password:</td> 
			<td><input type="password" name="newPassword"><?=$retypePasswordError?></td>
			</tr>
		
			<tr>
			<td>Retype Password:</td>
			<td><input type="password" name="retypePassword"></td>
			</tr>
			</table>
			<br><br>
			<input type="submit" name="submit" value="Confirm" style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white;">
			
			<input type="submit" name="Back" value="Back"  style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white; ">
		</form>
	</body>
</html>