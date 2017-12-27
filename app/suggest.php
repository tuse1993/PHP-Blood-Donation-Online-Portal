<?php
 
	$db         = mysqli_connect('localhost', 'root', '', 'blood');
 
	$company    = $_GET['company'];
 
	$sql        = "SELECT User_Name FROM userinfo WHERE User_Name like '$company%' ORDER BY User_Name";
 
	$res        = $db->query($sql);
 
	if(!$res)
		echo mysqli_error($db);
	else
		while( $row = $res->fetch_object() )
			echo "<option value='".$row->User_Name."'>";
 
?>