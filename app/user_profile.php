<?php
	session_start();
	if($_SESSION['userName']==true){
		include "../service/person_service.php"; 
		$userInfo = $_GET['id'];
		$review=array();
		$usersInfo=array();
		
		$usersInfo = getPersonByName($userInfo);
		//var_dump($usersInfo);
		$donnesionCount = getcount($userInfo);
		$review = getReview($userInfo);
		
		if ($_SERVER['REQUEST_METHOD'] == "POST") {		
			header("location: blood_search.php");
		}
	}
	else{
		header("location: login.php");
	}

?>

<html>
	<body style="background-repeat: no-repeat;" background="images/acpt_info.jpg">
	<center>
		<table>
			<td>
				<table style="margin-top: 50px; background-color: #d10a46;color: white;" cellspacing="0" cellpadding="5">
					<tr>
						<td>User Name :</td>
						<td><?= $usersInfo['User_Name'] ?></td>
					</tr>
					<tr>
						<td>Name :</td>
						<td><?= $usersInfo['Full_Name'] ?></td>
					</tr>
					<tr>
						<td>Age :</td>
						<td><?= $usersInfo['Age'] ?></td>
					</tr>
					<tr>
						<td>Gender :</td>
						<td><?= $usersInfo['Gender'] ?></td>
					</tr>
					<tr>
						<td>Weight :</td>
						<td><?= $usersInfo['Weight'] ?></td>
					</tr>
					<tr>
						<td>Blood group :</td>
						<td><?= $usersInfo['Blood_Group'] ?></td>
					</tr>
					<tr>
						<td>Email :</td>
						<td><?= $usersInfo['Email'] ?></td>
					</tr>
					<tr>
						<td>Address :</td>
						<td><?= $usersInfo['Address'] ?></td>
					</tr>	
					<tr>
						<td>District :</td>
						<td><?= $usersInfo['District'] ?></td>
					</tr>	
					<tr>
						<td>Donnesion Count :</td>
						<td><?= $donnesionCount['count'] ?></td>
					</tr>
				</table>
			</td>
		
			<td style="padding-left: 100px;">
				<div>Review Table </div>
				<table  style="margin-top: 50px; background-color: #d10a46;color: white; " cellspacing="0" cellpadding="5";>
                <?php if (count($review) == 0) { ?>
                    <tr style="text-align: center;"><b>NO RECORD FOUND!</b>
                    </tr
                <?php } ?>

                
					<tr  style="background-color: #af0b42;">		
					<th> Review From </th>				
					<th> Date </th>					
					<th> Comment </th>					
					</tr>
					
					<?php foreach ($review as $person) { ?>
                    <tr>
                        <td><?= $person['rev_from'] ?></td>
						<td><?= $person['rev_date'] ?></td>
						<td><?= $person['review'] ?></td>
                    </tr>
                <?php }?>
				</table>
			</td>
		</table>
		
		<form method="POST">
			<br><br>
			<input type="submit" name="Back" value="Back" style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white ">
		</form>
	
	</body>
</html>