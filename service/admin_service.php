<?php include("data_access.php"); ?>
<?php
    
    function getAdminByUserName($userName){
        $sql = "SELECT * FROM admin_info WHERE user_name='$userName'";        
        $result = executeSQL($sql);
        
        $adminUserId = mysqli_fetch_assoc($result);
        
        return $adminUserId;
    }
	
	function addAdmin($admininfo){
        $sql = "INSERT INTO admin_info(user_Name,password) VALUES ('$admininfo[user_name]', '$admininfo[password]')";
        $result = executeSQL($sql);
        return $result;
    }
	function removeAdmin($personId){
        $sql = "DELETE FROM admin_info WHERE user_name='$personId'";        
        $result = executeSQL($sql);
        return $result;
    }
	
	function getAllAdmins(){
        $sql = "SELECT * FROM admin_info";        
        $result = executeSQL($sql);
        
        $person = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $person[$i] = $row;
        }
        
        return $person;
    }
	
	function editAdmin($person,$UserName){
        $sql = "UPDATE admin_info SET Full_Name='$person[fullName]', Age=$person[age],Weight=$person[weight],Blood_Group='$person[bloodGroup]',Mobile='$person[mobile]', Email='$person[email]', Address='$person[address]', District='$person[district]' WHERE User_Name='$UserName'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function getAllreports(){
        $sql = "SELECT * FROM reportsinfo";        
        $result = executeSQL($sql);
        
        $person = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $person[$i] = $row;
        }
        
        return $person;
    }
    
?>