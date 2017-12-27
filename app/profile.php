<?php 
	session_start();
	if($_SESSION['userName']==true){
		include "../service/person_service.php"; 

		$checkYes="";
		$checkNo="";
		
		$requests=array();

		$userName=$_SESSION['userName'];
		$response = getResponses($userName);
		$requests = getRequests($userName);
		$users = getPersonsByUserName($userName);
		$donnesionCount = getcount($userName);
		$donnesionInfo = getDonnesionInfo($userName);
		
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$SelectValue=$_POST['available'];
			if(updateAvailability($SelectValue,$userName)){
				header("location: profile.php");
			}
		}
	}
	else{
		header("location: login.php");
	}
?>

<html>
	<body background="images/profile_background.jpg" >
	<center>
<div style="background-color:#d10a46;height:50px">
		<ul style="list-style: none; padding-top: 15px">


		<li style="float: left; padding-left: 50px;color: white"><a href="profile.php"style="text-decoration: none;color: white;">Profile</a></li>

		<li style="float: left; padding-left: 50px;color: white"><a href="blood_search.php"style="text-decoration: none;color: white;">Blood Search</a></li>
		<li style="float: right; padding-right: 50px;color: white"><a href="user_logout.php"style="text-decoration: none;color: white;"><b>Logout</b></a></li>
		<li style="float: right; padding-right: 50px;color: white"><a href="profile.php"style="text-decoration: none;color: white;">Welcome <?=$_SESSION['userName']?></a></li>
		<li style="float: right; padding-right: 50px;color: white"><a href="accept_info.php"style="text-decoration: none;color: white;">Accept History</a></li>
		<li style="float: right; padding-right: 50px;color: white"><a href="donnesion_approval_request.php"style="text-decoration: none;color: white;">Donnesion Approval</a></li>
		<li style="float: right; padding-right: 50px;color: white"><a href="my_review.php"style="text-decoration: none;color: white;">My Review</a></li>
		<li style="float: right; padding-right: 50px;color: white"><a href="change_password.php"style="text-decoration: none;color: white;">Change Password</a></li>
		
		
		</ul> <br>
</div> <br>
			<h1>Profile</h1>
		
			<a href="ed_profile.php" style="text-decoration: none;color: white;"><button style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: #d10a46 ">Edit</button></a><br><br><br>
			</center>
			<div style="width: 50%;float: left">
			
				<div>Request Table </div>
				<table style="margin-top: 50px; background-color: #d10a46;color: white;" cellspacing="0" cellpadding="5">
                <?php if (count($requests) == 0) { ?>
                   <tr style="text-align: center;"><b>NO RECORD FOUND!</b>
                    </tr>
                <?php } ?>

                
					<tr style="background-color: #af0b42; color: white;">		
					<th> Request From </th>
					<th> Full Name </th>					
					<th> Area </th>					
					<th> Date </th>		
					<th>  </th>
					<th>  </th>			
					</tr>
					
					<?php foreach ($requests as $person) { ?>
                    <tr style="background-color: #af0b42; color: white;">
                        <td><?= $person['req_from'] ?></td>
						<td><?= $person['req_name'] ?></td>
						<td><?= $person['req_area'] ?></td>
						<td><?= $person['req_date'] ?></td>
         
                        <td><a href="acceptReq.php?id=<?= $person['req_to'] ?>" style="text-decoration: none; color: white;" >Accept</a></td>
						<td><a href="rejectReq.php" style="text-decoration: none; color: white;" >Reject</a></td>
                    </tr>
                <?php }?>
				</table>
			</div>
			
				<div style="width: 50%; float: left"><table >
					<?php foreach ($users as $person) { ?>
					<tr>
						<td>User Name :</td>
						<td><?= $person['User_Name'] ?></td>
					</tr>
					<tr>
						<td>Name :</td>
						<td><?= $person['Full_Name'] ?></td>
					</tr>
					<tr>
						<td>Age :</td>
						<td><?= $person['Age'] ?></td>
					</tr>
						<tr>
						<td>Gender :</td>
						<td><?= $person['Gender'] ?></td>
					</tr>
					<tr>
						<td>Weight :</td>
						<td><?= $person['Weight'] ?></td>
					</tr>
					<tr>
						<td>Blood group :</td>
						<td><?= $person['Blood_Group'] ?></td>
					</tr>

					<tr>
						<td>Email :</td>
						<td><?= $person['Email'] ?></td>
					</tr>

					<tr>
						<td>Address :</td>
						<td><?= $person['Address'] ?></td>
					</tr>
					
					<tr>
						<td>District :</td>
						<td><?= $person['District'] ?></td>
					</tr>
					
					<?php }?>
					<tr>
					<?php
						$available=$person['Availability'];
						//var_dump($available);
						if($available=='Yes'){
							$checkYes="checked";
							$checkNo="";
							//var_dump($checkYes);
						}
						else if($available=="No"){
							$checkYes="";
							$checkNo="checked";
						}
					?>
					<form method="post">
						<td>Available :</td>
						<td>
							<input type="radio" name="available" value="Yes" <?= $checkYes ?>>Yes
							<input type="radio" name="available" value="No" <?= $checkNo ?>> No<br>
						</td>
					</tr>
					<tr>
						<td>
						 <input type="submit" name="save" value="Save" style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white;margin-bottom: 50px ">
						</td>
					</form>
					</tr>
		
				</table>
			</div>
			<center>			
			<div style="width: 100%;">
		
				<table style="margin-top: 50px; background-color: #d10a46;color: white;" cellspacing="0" cellpadding="5" border="0">

				<tr><h3>Response Table</h3></tr>
                <?php if (count($response) == 0) { ?>
                    <tr style="text-align: center;"><b>NO RECORD FOUND!</b>
                    </tr>
                <?php } ?>

                
					<tr style="background-color: #af0b42;">		
					<th> User Name </th>					
					<th> Details </th>					
					<th> Accepted/Rejected </th>	
					<th></th>				
					</tr>
					
					<?php foreach ($response as $person) { ?>
                    <tr>
						<td><?= $person['req_to'] ?></td>
         
                        <td><a href="responseDetails.php?id=<?= $person['req_to'] ?>" style="text-decoration: none;color: black;"> Details</a></td>
						<td><?= $person['acceptation'] ?></td>
						<td><a href="removeResponse.php?id=<?= $person['req_to'] ?>" style="text-decoration: none;color: black;">Remove</a></td>
                    </tr>
                <?php }?>
				</table>
			</div>
			</center>
	
			
	</body>
</html>