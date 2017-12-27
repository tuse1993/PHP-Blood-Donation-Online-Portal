<?php 
	session_start();
	if($_SESSION['admin_id']==true){
		include "../service/person_service.php"; 
		//include "../service/admin_service.php"; 

		$userName="";
		$users=array();
		$User_Name="";
		$Full_Name="";
		$Age="";
		$Weight="";
		$Blood_Group="";
		$Mobile="";
		$Email="";
		$Address="";
		$Availability="";

		if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['search'] == true) {
			$userName = $_POST['user_name'];
			if(empty($userName)){
				
			}
			else{
				$users = getPersonsByName($userName);
			}
		}
		else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['create_admin'] == true) {
			header("Location: addAdmin.php");
		}
		else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['delete_admin'] == true) {
			header("Location: deleteAdmin.php");
		}
		else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['show_admin'] == true) {
			header("Location: showAdmin.php");
		}
		else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['create_user'] == true) {
			header("Location: registrationInAdmin.php");
		}
	}
	else{
		header("location: admin_login.php");
	}	
?>





<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<script src="jQuery.js"></script>
	<script src="myScript.js"></script>
</head>
<body style="background-repeat: no-repeat;" background="images/member.jpg">
	<ul style="list-style: none; background-color: #d10a46"">
		<li style="float: right; padding-right: 50px;"><a href="logout.php" style="text-decoration: none;color: white;">Logout</a></li>
		
	</ul>	
 
	<div style="background-color: #d10a46;color: white;text-align:center;"> 
		<h3>Welcome To Admin Panel</h3>
		
	</div>
<center>
	<table>

		<td style="background-color: #d10a46;color: white;text-align: center;padding: 10px;width: 40%">
		<h4>Find Member</h4>
		<form method="post">
			User Name  <input type="text-box" name="user_name" list="userNameList" id="suggest"><br><br>
			<input type="submit" name="search" value="Search" style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white ">
			<datalist id="userNameList">
 
	</datalist>
	</form>
		</td>
		<td style="background-color: #d10a46;color: white;text-align: center;padding: 10px;width: 40%">
			<h4>Members</h4>
			
		<form method="post" action="admin_members.php">
		<input type="submit" name="all_member" value="All " style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white;margin-bottom: 10px ">
		</form>
		
		<form method="post" action="admin_members.php">
		<input type="submit" name="all_active_member" value="Active" style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white;margin-bottom: 10px ">
		</form>
		
		<form method="post" action="reportLists.php">
		<input type="submit" name="all_report" value="Report List" style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white;margin-bottom: 10px ">
		</form>
		</td>
		
		<td style="background-color: #d10a46;color: white;text-align: center;padding: 10px;width: 40%">
			<h4>Admin Control Panel</h4>
			
			<form method="post" >
				<input type="submit" name="create_admin" value="Create Admin " style="background-color: #d10a46; color: white; width: 110px; height: 30px; border-radius: 10px; border-color: white; margin-bottom: 10px ">
			</form>
			
			<form method="post">
				<input type="submit" name="show_admin" value="Show Admin List " style="background-color: #d10a46; color: white; width: 110px; height: 30px; border-radius: 10px; border-color: white;margin-bottom: 10px ">
			</form>
			
			<form method="post">
				<input type="submit" name="delete_admin" value="Delete Admin " style="background-color: #d10a46; color: white; width: 110px; height: 30px; border-radius: 10px; border-color: white;margin-bottom: 10px ">
			</form>
		</td>
		<td style="background-color: #d10a46;color: white;text-align: center;padding: 10px;width: 40%">
			<h4>User Control Panel</h4>
			
			<form method="post">
				<input type="submit" name="create_user" value="Create User " style="background-color: #d10a46; color: white; width: 110px; height: 30px; border-radius: 10px; border-color: white;margin-bottom: 10px ">
			</form>
		</td>
		</td>
		

	</table>
	

		<table style="margin-top: 50px; background-color: #d10a46;color: white;" cellspacing="0" cellpadding="5">
                <?php if (count($users) == 0) { ?>
                    <tr style="text-align: center;"><b>NO RECORD FOUND!</b>
                    </tr>
                <?php } ?>

                
					<tr style="background-color: #af0b42;">
					<th> User Name </th>
					<th> Full Name </th>
					<th> Age </th>
					<th> Weight </th>
					<th> Blood Group </th>
					<th> Mobile </th>
					<th> Email </th>
					<th> Address </th>
					<th> Availability </th>
					<th></th>
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
         
                        <td><a href="user_delete.php?id=<?= $person['User_Name'] ?>" style="text-decoration: none;color: black">Delete</a></td>
                    </tr>
                <?php }?>
            </table>

</center>

</body>
</html>