<?php 
	session_start();
	include "../service/admin_service.php"; 
	//$users=array();
	$usersinfo=array();
	$usersinfo['user_name']="";
	
	if($_SESSION['admin_id']==true){
		if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['search'] == true) {
			$userName = $_POST['user_name'];
			if(empty($userName)){
				
			}
			else{
				$usersinfo = getAdminByUserName($userName);
				//var_dump($usersinfo);
			}
		}
	}
	else{
		header("location: admin_login.php");
	}
?>
<html>
<head>
</head>

<body style="background-repeat: no-repeat; margin-top: 8%;" background="images/memberall.png">
<center>
		<form method="post">
			User Name  <input type="text-box" name="user_name"><br><br>
			<input type="submit" name="search" value="Search" style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white ">
	</form>
	
	
	<table style="margin-top: 50px; background-color: #d10a46;color: white;" cellspacing="0" cellpadding="5">
                <?php if (count($usersinfo) == 0) { ?>
                    <tr style="text-align: center;"><b>NO RECORD FOUND!</b>
                    </tr>
                <?php } ?>

                
					<tr style="background-color: #af0b42;">
					<th> User Name </th>
					<th></th>
					</tr>
					
					
                    <tr>
                        <td><?= $usersinfo['user_name'] ?></td>
         
                        <td><a href="admin_delete.php?id=<?= $usersinfo['user_name'] ?>" style="text-decoration: none; color: white">Delete</a></td>
                    </tr>
            </table>
</body>
</html>