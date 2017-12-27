<?php
	include "../service/person_service.php"; 
	$name=$_GET['id'];
	$userinfo = getResponse($name);
	
	removeResponse($name);
	header("location: profile.php");
?>