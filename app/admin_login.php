<?php
$userName="";
$password="";
$userNameError="";
$passwordError="";
$AdminError="";
?>

<?php 
	include "../service/admin_service.php";  
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") 
	{
        $userName=$_POST['admin_id'];
		$password=$_POST['admin_password'];
		
		
		
			$personsPassword = getAdminByUserName($userName);
		
			if($password==$personsPassword['password'])
			{
					session_start();
					$_SESSION['admin_id']=$userName;
					header("location: admin_home.php");
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
			  var idTextBox1 = document.getElementsByName("admin_id")[0];
			  var idTextBox2 = document.getElementsByName("admin_password")[0];
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

	<body background="images/adminlogin2.png" style="background-size: cover; background-repeat: no-repeat;">
		<center>
			
			<h1 style="padding-top: 10%;margin-bottom: 0px;">Admin Log in</h1>
			
			<form method="post" onsubmit="return f();">
			<table>
					<tr>
						<td><b>User Name</b></td>
						<td><input style="align-items: right" type="text-box" name="admin_id" value="<?=$userName?>" /></td>
						<td><span id="msg1"></span></td></br></br>
					</tr>

					<tr>
						<td></td>
					</tr>

					<tr>
						<td><b>Password</b></td>
						<td><input type="password" name="admin_password" value="<?=$password?>"/></td>
						<td><span id="msg2"></span></td>
					</tr>
				</table>
				<div><?=$AdminError?></div><br>
						   <input type="submit" name="login" value="Login" style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white ">
						   
			</form>
			</div>
		</center>
	</body>

</html>