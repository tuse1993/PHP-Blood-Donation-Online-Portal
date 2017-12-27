<?php
	session_start();
	include "../service/person_service.php"; 
	$userName=$_SESSION['userName'];
	//var_dump($userName);
	$requests=array();
	$myReject = updateAcceptationToReject($userName);
	updateAcceptationToReject2($userName);
	
	$requests = getRequest($userName);
	//var_dump($requests);
	
	if($myReject == true && $requests['acceptation'] == "Rejected"){
		removeRequest($userName);
		header("location: profile.php");
	}else{
	}
?>