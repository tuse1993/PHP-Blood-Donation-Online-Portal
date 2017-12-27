<?php include("data_access.php"); ?>
<?php
    function getPersonsByName($personName){
        $sql = "SELECT * FROM userinfo WHERE User_Name LIKE'%$personName%'";
        $result = executeSQL($sql);
        
        $users = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $users[$i] = $row;
        }
        
        return $users;
    }
	//ex...An
	function getPersonByName($personName){
        $sql = "SELECT * FROM userinfo WHERE User_Name = '$personName'";        
        $result = executeSQL($sql);
        
        $person = mysqli_fetch_assoc($result);
        
        return $person;
    }
	
	function editUser($person,$UserName){
        $sql = "UPDATE userinfo SET Full_Name='$person[fullName]', Age=$person[age],Weight=$person[weight],Blood_Group='$person[bloodGroup]',Mobile='$person[mobile]', Email='$person[email]', Address='$person[address]', District='$person[district]' WHERE User_Name='$UserName'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function updatePassword($password,$UserName){
        $sql = "UPDATE userinfo SET Password='$password' WHERE User_Name='$UserName'";
        $result = executeSQL($sql);
        return $result;
    }
	
	 function addUser($userin){
        $sql = "INSERT INTO userinfo(User_Name, Full_Name, Password, Age, Weight, Blood_Group, Mobile, Email, Address, Availability,Gender,District) VALUES ('$userin[name]', '$userin[fullName]', '$userin[password]', $userin[age], $userin[weight] ,'$userin[bloodGroup]','$userin[mobile]','$userin[email]','$userin[address]','$userin[available]','$userin[gender]','$userin[district]' )";
        $result = executeSQL($sql);
        return $result;
    }
	
	function getGuestByMobile($mobile){
        $sql = "SELECT * FROM guestinfo WHERE Mobile='$mobile' ";
        $result = executeSQL($sql);
        
        $users = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $users[$i] = $row;
        }
        
        return $users;
    }
	
	function addGuestUser($guestUser){
        $sql = "INSERT INTO guestinfo(Name,Mobile) VALUES ('$guestUser[guestname]','$guestUser[guestmobile]')";
        $result = executeSQL($sql);
        return $result;
    }
	
	//
	
	
	function getPersonsByUserName($UserName){
        $sql = "SELECT * FROM userinfo WHERE User_Name='$UserName'";
        $result = executeSQL($sql);
        
        $users = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $users[$i] = $row;
        }
        
        return $users;
    }
	
	function getPersonsByBloodAndArea($Blood,$Area){
        $sql = "SELECT * FROM userinfo WHERE Blood_Group='$Blood' AND District='$Area' AND Availability='Yes'";
        $result = executeSQL($sql);
        
        $users = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $users[$i] = $row;
        }
        
        return $users;
    }
	
	function getPersonsByAvailability($availability){
        $sql = "SELECT * FROM userinfo WHERE Availability='$availability'";
        $result = executeSQL($sql);
        
        $users = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $users[$i] = $row;
        }
        
        return $users;
    }
	
	function getAllPersons(){
        $sql = "SELECT * FROM userinfo";        
        $result = executeSQL($sql);
        
        $person = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $person[$i] = $row;
        }
        
        return $person;
    }
	
	function removePerson($personId){
        $sql = "DELETE FROM userinfo WHERE User_Name='$personId'";        
        $result = executeSQL($sql);
        return $result;
    }
	
	function updateAvailability($SelectValue,$userName){
        $sql = "UPDATE userinfo SET Availability='$SelectValue' WHERE User_Name='$userName'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function getUserPasswordByUserName($userName){
        $sql = "SELECT Password FROM userinfo WHERE User_Name='$userName'";        
        $result = executeSQL($sql);
        
        $adminUserId = mysqli_fetch_assoc($result);
        
        return $adminUserId;
    }
	//.................................................................
	
	function addRequest($requestInfo){
        $sql = "INSERT INTO requestinfo(req_from,req_to,req_name,req_area,req_date,accept_mobile,acceptation) VALUES ('$requestInfo[req_from]','$requestInfo[req_to]','$requestInfo[req_name]','$requestInfo[req_area]','$requestInfo[req_date]', 'N/A', 'Pending')";
        $result = executeSQL($sql);
        return $result;
    }
	
	function addResponse($requestInfo){
        $sql = "INSERT INTO responseinfo(req_from,req_to,req_name,req_area,req_date,accept_mobile,acceptation) VALUES ('$requestInfo[req_from]','$requestInfo[req_to]','$requestInfo[req_name]','$requestInfo[req_area]','$requestInfo[req_date]', 'N/A', 'Pending')";
        $result = executeSQL($sql);
        return $result;
    }
	
	function addAcceptance($requestInfo){
        $sql = "INSERT INTO acceptinfo(req_from,req_to,req_name,req_area,req_date,accept_mobile,acceptation) VALUES ('$requestInfo[req_from]','$requestInfo[req_to]','$requestInfo[req_name]','$requestInfo[req_area]','$requestInfo[req_date]', '$requestInfo[accept_mobile]', '$requestInfo[acceptation]')";
        $result = executeSQL($sql);
        return $result;
    }
	
	function getRequest($personName){
        $sql = "SELECT * FROM requestinfo WHERE req_to = '$personName'";        
        $result = executeSQL($sql);
        
        $person = mysqli_fetch_assoc($result);
        
        return $person;
    }
	
	function getRequests($personName){
        $sql = "SELECT * FROM requestinfo WHERE req_to='$personName'";
        $result = executeSQL($sql);
        
        $users = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $users[$i] = $row;
        }
        
        return $users;
    }
	
	function getAcceptanceForDonner($personName){
        $sql = "SELECT * FROM acceptinfo WHERE req_to='$personName'";
        $result = executeSQL($sql);
        
        $users = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $users[$i] = $row;
        }
        
        return $users;
    }
	
	function getAcceptanceForRequester($personName){
        $sql = "SELECT * FROM acceptinfo WHERE req_from='$personName'";
        $result = executeSQL($sql);
        
        $users = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $users[$i] = $row;
        }
        
        return $users;
    }
	
	function getResponse($personName){
        $sql = "SELECT * FROM responseinfo WHERE req_to = '$personName'";        
        $result = executeSQL($sql);
        
        $person = mysqli_fetch_assoc($result);
        
        return $person;
    }
	
	function getResponses($personName){
        $sql = "SELECT * FROM responseinfo WHERE req_from='$personName'";
        $result = executeSQL($sql);
        
        $users = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $users[$i] = $row;
        }
        
        return $users;
    }
	
	
	function updateAcceptationToReject($userName){
        $sql = "UPDATE responseinfo SET acceptation='Rejected' WHERE req_to='$userName'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function updateMobile($userName,$mobile){
        $sql = "UPDATE responseinfo SET accept_mobile='$mobile', acceptation='Accepted' WHERE req_to='$userName'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function updateMobile2($userName,$mobile){
        $sql = "UPDATE requestinfo SET accept_mobile='$mobile', acceptation='Accepted' WHERE req_to='$userName'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function updateAcceptationToReject2($userName){
        $sql = "UPDATE requestinfo SET acceptation='Rejected' WHERE req_to='$userName'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function removeRequest($personId){
        $sql = "DELETE FROM requestinfo WHERE req_to='$personId'";        
        $result = executeSQL($sql);
        return $result;
    }
	
	function removeResponse($personId){
        $sql = "DELETE FROM responseinfo WHERE req_to='$personId'";        
        $result = executeSQL($sql);
        return $result;
    }
	
	function addcount($userName){
        $sql = "INSERT INTO donnesioncount(userName,count) VALUES ('$userName', 0)";
        $result = executeSQL($sql);
        return $result;
    }
	
	function getcount($personName){
        $sql = "SELECT * FROM donnesioncount WHERE userName = '$personName'";        
        $result = executeSQL($sql);
        
        $person = mysqli_fetch_assoc($result);
        
        return $person;
    }
	
	function updateCount($donnesionInfo,$userinfo){
        $sql = "UPDATE donnesioncount SET count=$donnesionInfo[count] WHERE userName='$userinfo'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function addDonnesionInfo($requestInfo){
        $sql = "INSERT INTO donnesionrequest(req_from,req_to,donnesion_date) VALUES ('$requestInfo[req_from]', '$requestInfo[req_to]', '$requestInfo[donnesion_date]')";
        $result = executeSQL($sql);
        return $result;
    }
	
	function getDonnesionInfo($personName){
        $sql = "SELECT * FROM donnesionrequest WHERE req_to='$personName'";
        $result = executeSQL($sql);
        
        $users = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $users[$i] = $row;
        }
        
        return $users;
    }
	
	function addReview($requestInfo){
        $sql = "INSERT INTO review(rev_from,rev_to,review,rev_date) VALUES ('$requestInfo[rev_from]', '$requestInfo[rev_to]', '$requestInfo[rev_comment]', '$requestInfo[rev_date]')";
        $result = executeSQL($sql);
        return $result;
    }
	
	function getReview($personName){
        $sql = "SELECT * FROM review WHERE rev_to='$personName'";
        $result = executeSQL($sql);
        
        $users = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $users[$i] = $row;
        }
        
        return $users;
    }
	
	function removeReview($requestInfo){
        $sql = "DELETE FROM donnesionrequest WHERE req_to='$requestInfo[rev_from]' AND req_from='$requestInfo[rev_to]'";        
        $result = executeSQL($sql);
        return $result;
    }
	
	function addReport($requestInfo){
        $sql = "INSERT INTO reportsinfo(rep_from,rep_to,rep_date,report) VALUES ('$requestInfo[rep_from]', '$requestInfo[rep_to]', '$requestInfo[rep_date]', '$requestInfo[report]' )";
        $result = executeSQL($sql);
        return $result;
    }
	
	function removeReport($requestInfo){
        $sql = "DELETE FROM reportsinfo WHERE rep_to='$requestInfo[rep_to]' AND rep_from='$requestInfo[rep_from]'";        
        $result = executeSQL($sql);
        return $result;
    }
	
?>