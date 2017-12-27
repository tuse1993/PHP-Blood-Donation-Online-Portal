<?php

	session_start();
	include "../service/admin_service.php"; 
	
	$adminInfo = $_GET['id'];
	removeAdmin($adminInfo);
	header("location: admin_home.php");

?>