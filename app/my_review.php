<?php
	session_start();
	include "../service/person_service.php"; 
	
	$reviewInfo=array();
	
	$userName = $_SESSION["userName"];
	$reviewInfo = getReview($userName);
		
		
		
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){	
		header("location: profile.php");
	}
		

?>




<html>
	<body background="images/acpt_info.jpg" style=" background-size: cover; 	
			background-repeat: no-repeat;">
		<center>
		<table style="margin-top: 8%;">
			<tr>
				<td>
				<div >My Review Table </div>
				<table  style="margin-top: 50px; background-color: #d10a46;color: white;" cellspacing="0" cellpadding="5">
                <?php if (count($reviewInfo) == 0) { ?>
                     <tr style="text-align: center;"><b>NO RECORD FOUND!</b>
                    </tr>
                <?php } ?>

                
					<tr style="background-color: #af0b42;">		
					<th> Review From </th>				
					<th> Date </th>					
					<th> Comment </th>					
					</tr>
					
					<?php foreach ($reviewInfo as $person) { ?>
                    <tr>
                        <td><?= $person['rev_from'] ?></td>
						<td><?= $person['rev_date'] ?></td>
						<td><?= $person['review'] ?></td>
                    </tr>
                <?php }?>
				</table>
				</td>
			</tr>
		</table>
		
		<form method="POST">
			<br><br>
			<input type="submit" name="Back" value="Back"  style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white; ">
		</form>
	</body>
</html>