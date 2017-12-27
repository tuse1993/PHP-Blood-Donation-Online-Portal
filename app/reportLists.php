
<?php 
	session_start();
	
	if($_SESSION['admin_id']==true){
		include "../service/admin_service.php"; 
		$users="";	
		$users = getAllreports();
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
		<h3>Report Lists</h3>
		
	</div>
<center>
	<table style="margin-top: 50px; background-color: #d10a46;color: white;" cellspacing="0" cellpadding="5">
                <?php if (count($users) == 0) { ?>
                    <tr style="text-align: center;"><b>NO RECORD FOUND!</b>
                    </tr>
                <?php } ?>

                
					<tr style="background-color: #af0b42;">>
					<th> Report From </th>
					<th> Report To </th>
					<th> Reporting Date </th>
					<th> Comment </th>
					<th></th>
					</tr>
					
					<?php foreach ($users as $person) { ?>
                    <tr>
					<?php
						$_SESSION['rep_from']= $person['rep_from'];
					?>
                        <td><?= $person['rep_from'] ?></td>
						<td><?= $person['rep_to'] ?></td>
						<td><?= $person['rep_date'] ?></td>
						<td><?= $person['report'] ?></td>
						<td><a href="removeReport.php?id=<?= $person['rep_to'] ?>"  style="text-decoration: none; color: black;">Remove</a></td>
                    </tr>
                <?php }?>
            </table>

</center>

</body>
</html>