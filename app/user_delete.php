<?php 
	session_start();
	if($_SESSION['admin_id']==true){
		include "../service/person_service.php"; 
		$personId =$_GET['id'];
	}
	else{
		header("location: admin_login.php");
	}
?>
<html>

		<h1 style="color:#d10a46;margin-top: 15%;margin-left:40%">Sucessfully Deleted !</h1>
		<?php
			if(removePerson($personId)==true){
				echo "Record Deleted";
			}
		?>

	
	<?php
		//header("location: admin_home.php");
	?>
	
	<meta http-equiv="refresh" content="1;url=admin_home.php" />
	

</html>