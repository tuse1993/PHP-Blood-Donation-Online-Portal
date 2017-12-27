
<?php 
	session_start();
	
	if($_SESSION['admin_id']==true){
	
		include "../service/person_service.php"; 

		$users="";
		if(isset($_POST['all_member'])){
			if($_POST['all_member']){
				$users = getAllPersons();
			}
		}
		else if(isset($_POST['all_active_member'])){
			if($_POST['all_active_member']){
				$availability='yes';
				$users = getPersonsByAvailability($availability);
			}
		}
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
                <?php if (count($users) == 0) { ?>
                   <tr style="text-align: center;"><b>NO RECORD FOUND!</b>
                    </tr>
                <?php } ?>

                
					<tr style="background-color: #af0b42;">
					<th> User_Name </th>
					<th> Full_Name </th>
					<th> Age </th>
					<th> Weight </th>
					<th> Blood_Group </th>
					<th> Mobile </th>
					<th> Email </th>
					<th> Address </th>
					<th> Availability </th>
					</tr>
					
					<?php foreach ($users as $person) { ?>
                    <tr>
                        <td><?= $person['User_Name'] ?></td>
						<td><?= $person['Full_Name'] ?></td>
						<td><?= $person['Age'] ?></td>
						<td><?= $person['Weight'] ?></td>
						<td><?= $person['Blood_Group'] ?></td>
						<td><?= $person['Mobile'] ?></td>
						<td><?= $person['Email'] ?></td>
						<td><?= $person['Address'] ?></td>
						<td><?= $person['Availability'] ?></td>
                    </tr>
                <?php }?>
            </table>

</center>

</body>
</html>