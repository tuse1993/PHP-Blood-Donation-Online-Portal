<?php 
	include "../service/admin_service.php";  
?>

<?php

	$userNameError="";
	$passwordError="";
	$userName="";
	
	$adminInfo=array();
	
	$isUserNameValid = true;
	$isFullNameValid = true;
	$isPassValid = true;
	$isAgeValid = true;
	$isWeightValid= true;
	$isMobileValid = true;
	$isEmailValid=true;
	$isAddressValid = true;	
	
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$adminInfo['user_name'] = $_POST['username'];
		$adminInfo['password'] = $_POST['password'];
		$userName = $_POST['username'];
		
		//User name validation
		if(empty($adminInfo['user_name']))
		{
			$userNameError = "User name can not be empty";
			$isFullNameValid = false;
		}
		else 
		{
			$guestNew = getAdminByUserName($adminInfo['user_name']);
			//var_dump($guestNew);
			if(count($guestNew) != 0)
			{
				$userNameError = "User name already used ";
				$isFullNameValid = false;
		    }
		}
		
		//Password validation for registration
		if(empty($adminInfo['password']))
		{
			$passwordError = "Password can not be empty";
			$isPassValid = false;
		}
		else if(strlen($adminInfo['password'])<5)
		{
			$passwordError = "Password must be contain more than 4 character";
			$isPassValid = false;
		}
		
		if($isUserNameValid == true && $isPassValid == true)	
		{
			if(addAdmin($adminInfo)==true)
			{
				$userNameError="";
				$passwordError="";		  
				$userName="";		  
				$password="";		  		
				header("location:admin_home.php");
				die();								
			}
			
		}
	}
?>


<html>
	<body background="images/acpt_info.jpg" style=" background-size: cover; 	
			background-repeat: no-repeat; margin-top:8%">
		<center>

			<form method="post">
			User Name:<input type="text" name="username" value="<?=$userName?>"><?=$userNameError?>
			<br><br>
			Password:<input type="password" name="password"><?=$passwordError?>
			<br><br>
			<input type="submit" name="Submit" value="Submit" style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white; margin-top: 10px; ">
		</form>
	</body>
</html>
