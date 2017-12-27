<?php 
	session_start();
	include "../service/admin_service.php"; 
	
	if($_SESSION['admin_id']==true){
		$adminInfo=array();	
		$adminInfo = getAllAdmins();	
	}
	else{
		header("location: admin_login.php");
	}
?>





<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-repeat: no-repeat;" background="images/memberall.png">
<ul style="list-style: none; background-color: #d10a46"">
		<li style="float: right; padding-right: 50px;""><a href="logout.php" style="text-decoration: none;color: white;">Logout</a></li>

		<li style="float: right; padding-right: 50px;""><a href="admin_home.php" style="text-decoration: none;color: white;">Home</a></li>
	
	</ul>	
 
	<div style="background-color: #d10a46;color: white;text-align:center;"> 
		<h3 style="margin-left: 15%">Members Lists</h3>
		
	</div>
<center>
	<table style="margin-top: 50px; background-color: #d10a46;color: white;" cellspacing="0" cellpadding="5">
                <?php if (count($adminInfo) == 0) { ?>
                    <tr style="text-align: center;"><b>NO RECORD FOUND!</b>
                    </tr>
                <?php } ?>

                
					<tr style="background-color: #af0b42;">
					<th> User Name </th>
					<th> Password </th>
					</tr>
					
					<?php foreach ($adminInfo as $person) { ?>
                    <tr>
						<?php
							if($person['user_name'] == $_SESSION['admin_id']){
								continue;
							}
						?>
                        <td><?= $person['user_name'] ?></td>
						<td><?= $person['password'] ?></td>
                    </tr>
                <?php }?>
            </table>

</center>

</body>
</html>