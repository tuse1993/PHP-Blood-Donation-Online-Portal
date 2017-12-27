<?php
	session_start();
	include "../service/person_service.php"; 
	
	$userName=$_SESSION['userName'];
	//var_dump($userName);
	$donnerinfo=array();
	$requesterinfo=array();
	
	$donnerinfo = getAcceptanceForDonner($userName);
	$requesterinfo = getAcceptanceForRequester($userName);
	
	
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		header("location: profile.php");
	}
?>







<html>
	<head>
	
	</head>
	
	<body background="images/acpt_info.jpg" style=" background-size: cover; 	
			background-repeat: no-repeat;">
		<center>
		<table style="margin-top: 8%">
			<td>
				<div>Accepted Request(Requester) </div>
				<table style="margin-top: 50px; background-color: #d10a46;color: white;" cellspacing="0" cellpadding="5">
                <?php if (count($requesterinfo) == 0) { ?>
                     <tr style="text-align: center;"><b>NO RECORD FOUND!</b>
                    </tr>
                <?php } ?>

                
					<tr style="background-color: #af0b42;">		
					<th> Request To </th>				
					<th> Area </th>
					<th> Blood Group </th>
					<th> Date </th>	
					<th></th>				
					</tr>
					
					<?php foreach ($requesterinfo as $person) { ?>
                    <tr >
						<?php
							$bloodinfo=$person['req_to'];
							$bloodGroup = getPersonByName($bloodinfo);
						?>
                        <td><?= $person['req_to'] ?></td>
						<td><?= $person['req_area'] ?></td>
						<td><?= $bloodGroup['Blood_Group'] ?></td>
						<td><?= $person['req_date'] ?></td>
						<td><a href="sendReport.php?id=<?= $person['req_to'] ?>" style="text-decoration: none; color: black">Report</a></td>
                    </tr>
                <?php }?>
				</table>
			</td>
			
			<td style="padding-left: 100px">
				<div >Accepted Request(Donner) </div>
				<table style="margin-top: 50px; background-color: #d10a46;color: white;" cellspacing="0" cellpadding="5">
                <?php if (count($donnerinfo) == 0) { ?>
                    <tr style="text-align: center;"><b>NO RECORD FOUND!</b>
                    </tr>
                <?php } ?>

                
					<tr style="background-color: #af0b42;">		
					<th> Request From </th>
					<th> Full Name </th>					
					<th> Area </th>					
					<th> Date </th>					
					</tr>
					
					<?php foreach ($donnerinfo as $person) { ?>
                    <tr style="background-color: #af0b42;">
                        <td><?= $person['req_from'] ?></td>
						<td><?= $person['req_name'] ?></td>
						<td><?= $person['req_area'] ?></td>
						<td><?= $person['req_date'] ?></td>
                    </tr>
                <?php }?>
				</table>
			
			</td>
		</table>
		<form method="post">
		<input type="submit" name="submit" value="Back" style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white; margin-top: 50px; ">
		</form>
	</body>
</html>