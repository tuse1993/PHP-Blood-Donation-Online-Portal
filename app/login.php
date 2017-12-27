<?php include "../service/person_service.php"; ?>


<?php
$userName="";
$password="";
$userNameError="";
$passwordError="";
$AdminError="";
?>




<?php

    $personsPassword = array();
	$personsPassword['Password']="";
 if ($_SERVER['REQUEST_METHOD'] == "POST") 
	{
        $userName=$_POST['userName'];
		$password=$_POST['password'];
		
		
		
			$personsPassword = getUserPasswordByUserName($userName);
			//var_dump($personsPassword);
		
			if($password == $personsPassword['Password'])
			{
					session_start();
					$_SESSION['userName']=$userName;
					header("location: loginsuc.php");
			}
			else
			{
					$AdminError="Invalid User Name or Password";
					$password="";
			}
    } 
   
?>
<html>

<head>
		<script>
			function f(){
				
			  formObj = document.getElementsByTagName("form")[0];
			  //formObj.action = "response.php";
			  var divObj1 = document.getElementById("msg1");   
			  var divObj2 = document.getElementById("msg2"); 			  
			  var idTextBox1 = document.getElementsByName("userName")[0];
			  var idTextBox2 = document.getElementsByName("password")[0];
			  if(idTextBox1.value=="" || idTextBox2.value=="")
			  {
					  if(idTextBox1.value=="")
					  {
						  divObj1.innerHTML = "Name Required"; 
				      } 
					  
					  if(idTextBox2.value=="")
					  {
						  divObj2.innerHTML = "Password Required";
					  }
						 return false;
			  }
			  
			  else{
				  return true;
			  }
			}
		</script>
	</head>
	<body background="images/Login_bg.jpg" style="background-size: cover; background-repeat: no-repeat;">
		<center>
<div style="background-color:#d10a46;height:50px">
		<ul style="list-style: none; padding-top: 15px">
		<li style="float: left; padding-left: 50px;color: white"><a href="Home.php" style="text-decoration: none;color: white;">Home</a></li>

		<li style="float: left; padding-left: 50px;color: white"><a href="registration.php"style="text-decoration: none;color: white;">Registration</a></li>

</div>


			<p style="color:#d10a46" ><i><b>"If you are a blood donor, you are a hero to someone, somewhere, who received your gracious gift of life."</b></i></p>
			
			<h1 style="padding-top: 10%">Log in</h1>
			<form method="post" onsubmit="return f();">
				<table>
					<tr>
						<td>User Name</td>
						<td><input style="align-items: right" type="text-box" name="userName" value="<?=$userName?>" /></td>
						<td><span id="msg1"></span></td></br></br>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" value="<?=$password?>"/></td>
						<td><span id="msg2"></span></td>
					</tr>
				</table>
				
				<div><?=$AdminError?></div><br>
				
				<input type="submit" name="login" value="Login" style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white ">
				<br><br>
				Not Registrated Yet!!!...<a href="registration.php?">Register</a>
			</form>
			</div>
		</center>
	</body>

</html>