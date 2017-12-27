<?php
	session_start();
	include "../service/person_service.php"; 
	$rep_to=$_GET['id'];
	$rep_from=$_SESSION['rep_from'];
	
	$reportInfo=array();
	$reportInfo['rep_to']=$rep_to;
	$reportInfo['rep_from']=$rep_from;
	
	removeReport($reportInfo);
	header("location: reportLists.php");
?>