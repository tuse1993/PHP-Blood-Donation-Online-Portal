<?php
	session_start();
	include "../service/person_service.php"; 
	
	$requestInfo=array();
	
	$requestInfo["rev_from"]=$_SESSION["userName"];
	$requestInfo["rev_to"]=$_GET['id'];
	
	removeReview($requestInfo);	
	
	header("location: profile.php");
		

?>