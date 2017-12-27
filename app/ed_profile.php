<?php 
session_start();
	if($_SESSION['userName']==true){
		include "../service/person_service.php"; 

		$UserName =$_SESSION['userName']; // add korte hbe id
		  
		  $fullNameError="";	  
		  $ageError=""; 
		  $weightError="";
		  $mobileError="";
		  $emailError="";  
		  $addressError="";
		  //$passwordError="";
		  
		$person = array();
		$person = getPersonByName($UserName);
		$error = "";
		if($_SERVER['REQUEST_METHOD']=="POST"){
			
			$person['fullName']=$_POST['fullName'];
			//$person['password'] = $_POST['password'];
			$person['age']=$_POST['age'];
			$person['weight']=$_POST['weight'];
			$person['bloodGroup']=$_POST['bloodGroup'];
			$person['mobile']=$_POST['mobile'];
			$person['email']=$_POST['email'];
			$person['address']=$_POST['address'];
			$person['district']=$_POST['district'];
			
			
			
			
			$isFullNameValid = true;
			//$isPassValid = true;
			$isAgeValid = true;
			$isWeightValid= true;
			$isMobileValid = true;
			$isEmailValid=true;
			$isAddressValid = true;	
			
			
			
			$fullName = $_POST['fullName'];
			//$password = $_POST['password'];
			$age =  $_POST['age'];
			$weight =  $_POST['weight'];
			$bloodGroup = $_POST['bloodGroup'];
			$mobile = $_POST['mobile'];
			$email= $_POST['email'];
			$address = $_POST['address'];
			//$available = $_POST['available'];
			$district = $_POST['district'];
			
			//var_dump($person);
			
			//Full name validation
		
			if(empty($fullName)){
				$fullNameError = "Full name can not be empty";
				$isFullNameValid = false;
			}
			if( str_word_count($fullName)<2)//check
			{
				$fullNameError = "Full name should contain at least two word";
				$isFullNameValid = false;
			}
			
			else
			{
				
				for($i=0;$i<strlen($fullName); ++$i)
					 {
									
						if($fullName[$i]>= 'A' && $fullName[$i] <= 'Z'  || $fullName[$i]>= 'a' && $fullName[$i] <= 'z' ||  $fullName[$i]== " " )
						{
								
								continue;
						}
						else
						{
								$fullNameError = "Special Characters not allowed";
								
								$isFullNameValid = false;
								break;
								
						}						
				   }
				 
				  
			}
			
			//Password validation for registration
			/*if(empty($password))
			{
				$passwordError = "Password can not be empty";
				
				$isPassValid = false;
			}
			else if(strlen($password)<8)
			{
				$passwordError = "Password must be contain more than 7 character";
				$isPassValid = false;
			}*/
			
			//age  validation
			if(empty($age))
			{
				$ageError = "Age can not be empty";
				$isAgeValid = false;
			}
			else if(strlen($age)>3)
			{
				$ageError = "Age is invalid";
				$isAgeValid = false;
			}
			
			
			//weight  validation
			if(empty($weight))
			{
				$weightError = "Weight can not be empty";
				$isWeightValid= false;
			}
			else if(strlen($weight)>3)
			{
				$weightError = "Weight is invalid";
				$isWeightValid= false;
			}
			
			
			//Mobile  validation
			if(empty($mobile))
			{
				$mobileError = "Mobile number can not be empty";
				$isMobileValid = false;
			}
			else if(strlen($mobile)>20)
			{
				$mobileError = "Mobile number is invalid";
				$isMobileValid = false;
			}
			
			
			//email validation
			if(empty($email)){
				$emailError="Empty";
				$isEmailValid=false;
			}
			else{
				$a=sizeof(explode("@",$email));	
				if( $a== 2 ){
					$b=sizeof(explode(".",$email));
						if($b>= 1){
							$isEmailValid=true;
						}
						else{
							$emailError ="Invalid Email Address";
							$isEmailValid=false;
						}
				}
				else{
					$emailError ="Invalid Email Address";
					$isEmailValid=false;
				}
			}
			
			
			//Address  validation
			if(empty($address))
			{
				$addressError = "Address can not be empty";
				$isAddressValid = false;
			}
			else if(strlen($address)>512)
			{
				$addressError = "Invalid Address";
				$isAddressValid = false;
			}
			
			
			if( $isFullNameValid == true &&  $isAgeValid == true && $isWeightValid == true && $isMobileValid == true && $isEmailValid==true && $isAddressValid == true)	
			{
				if(editUser($person,$UserName)==true)
				{
				   //if($result==true){
						  
					header("location:profile.php");
					die();
					
				}
				else
				{
					$error = "Something missing or empty ";
				}
				
			
			}
				

			
		}
	
	}
	else{
		header("location:login.php");
	}
	
    
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script language="javascript" type="text/javascript">
    function dynamicdropdown(listindex)
    {
        switch (listindex)
        {
        case "DHAKA" :
            document.getElementById("status").options[0]=new Option("Select District","");
            document.getElementById("status").options[1]=new Option("DHAKA","DHAKA");
            document.getElementById("status").options[2]=new Option("FARIDPUR","FARIDPUR");
			document.getElementById("status").options[3]=new Option("GAZIPUR","GAZIPUR");
			document.getElementById("status").options[4]=new Option("GOPALGANJ","GOPALGANJ");
			document.getElementById("status").options[5]=new Option("JAMALPUR","JAMALPUR");
            break;
        case "KHULNA" :
            document.getElementById("status").options[0]=new Option("Select District","");
            document.getElementById("status").options[1]=new Option("BAGERHAT","BAGERHAT");
            document.getElementById("status").options[2]=new Option("CHUADANGA","CHUADANGA");
            document.getElementById("status").options[3]=new Option("KUSHTIA","KUSHTIA");
			document.getElementById("status").options[4]=new Option("KHULNA","KHULNA");
			document.getElementById("status").options[5]=new Option("JESSORE","JESSORE");
            break;
		case "CHITTAGONG" :
            document.getElementById("status").options[0]=new Option("Select District","");
            document.getElementById("status").options[1]=new Option("CHITTAGONG","CHITTAGONG");
            document.getElementById("status").options[2]=new Option("BANDARBAN","BANDARBAN");
            document.getElementById("status").options[3]=new Option("BRAHMANBARIA","BRAHMANBARIA");
			document.getElementById("status").options[4]=new Option("CHANDPUR","CHANDPUR");
			document.getElementById("status").options[5]=new Option("COX'S BAZAR","COX'S BAZAR");
            break;
		case "BARISAL" :
            document.getElementById("status").options[0]=new Option("Select District","");
            document.getElementById("status").options[1]=new Option("BARISAL","BARISAL");
            document.getElementById("status").options[2]=new Option("BARGUNA","BARGUNA");
            document.getElementById("status").options[3]=new Option("BHOLA","BHOLA");
			document.getElementById("status").options[4]=new Option("JHALOKATI","JHALOKATI");
			document.getElementById("status").options[5]=new Option("PIROJPUR","PIROJPUR");
            break;
		case "RAJSHAHI" :
            document.getElementById("status").options[0]=new Option("Select District","");
            document.getElementById("status").options[1]=new Option("RAJSHAHI","RAJSHAHI");
            document.getElementById("status").options[2]=new Option("BOGRA","BOGRA");
            document.getElementById("status").options[3]=new Option("CHAPAINABABGANJ","CHAPAINABABGANJ");
			document.getElementById("status").options[4]=new Option("JOYPURHAT","JOYPURHAT");
			document.getElementById("status").options[5]=new Option("PABNA","PABNA");
            break;
		case "RANGPUR" :
            document.getElementById("status").options[0]=new Option("Select District","");
            document.getElementById("status").options[1]=new Option("RANGPUR","RANGPUR");
            document.getElementById("status").options[2]=new Option("DINAJPUR","DINAJPUR");
            document.getElementById("status").options[3]=new Option("GAIBANDHA","GAIBANDHA");
			document.getElementById("status").options[4]=new Option("LALMONIRHAT","LALMONIRHAT");
			//document.getElementById("status").options[5]=new Option("RANGPUR","RANGPUR");
            break;
		case "SYLHET" :
            document.getElementById("status").options[0]=new Option("Select District","");
            document.getElementById("status").options[1]=new Option("SYLHET","SYLHET");
            document.getElementById("status").options[2]=new Option("HABIGANJ","HABIGANJ");
            document.getElementById("status").options[3]=new Option("MAULVIBAZAR","MAULVIBAZAR");
			document.getElementById("status").options[4]=new Option("SUNAMGANJ","SUNAMGANJ");
            break;
        }
		
        return true;
    }
    </script>
    </head>
	<body background="images/profile_background.jpg" >
	<center>
<div style="background-color:#d10a46;height:50px">
		<ul style="list-style: none; padding-top: 15px">
		

		<li style="float: left; padding-left: 50px;color: white"><a href="profile.php"style="text-decoration: none;color: white;">Profile</a></li>

		<li style="float: left; padding-left: 50px;color: white"><a href="blood_search.php"style="text-decoration: none;color: white;">Blood Search</a></li>

		<li style="float: right; padding-right: 50px;color: white"><a href="user_logout.php"style="text-decoration: none;color: white;"><b>Logout</b></a></li>
		<li style="float: right; padding-right: 50px;color: white"><a href="profile.php"style="text-decoration: none;color: white;">Welcome <?=$_SESSION['userName']?></a></li>
		</ul> <br>
</div> <br>
			<h1>Profile</h1>
			
         
			<table >
			<form method ="POST">
				<tr>
					<td>Full Name :</td>
					<td><input type="text-box" name="fullName" value="<?= $person['Full_Name'] ?>" /> <?=$fullNameError?><br/></td>
				</tr>
				<tr>
					<td>Age :</td>
					<td><input type="text-box" name="age" value="<?= $person['Age'] ?>"/> <?=$ageError?><br/></td>
				</tr>
				<tr>
					<td>Weight :</td>
					<td><input type="text-box" name="weight" value="<?= $person['Weight'] ?>"/> <?=$weightError?><br/></td>
				</tr>
				<tr>
					<td>Blood group :</td>
					<td> <select name="bloodGroup">
							  <option ><?= $person['Blood_Group'] ?></option>
							  <option value="A+">A+</option>
							  <option value="A-">A-</option>
							  <option value="B+">B+</option>
							  <option value="B-">B-</option>
							  <option value="AB+">AB+</option>
							  <option value="AB-">AB-</option>
							  <option value="O+">O+</option>
							  <option value="O-">O-</option>
						</select></td>
				</tr>
				<tr>
					<td>Mobile Number :</td>
					<td><input type="text-box" name="mobile" value="<?= $person['Mobile'] ?>"/> <?=$mobileError?><br/></td>
				</tr>

				<tr>
					<td>Email :</td>
					<td> <input type="text-box" name="email" value="<?= $person['Email'] ?>" /> <?=$emailError?><br/></td>
				</tr>

				<tr>
					<td>Address :</td>
					<td><input type="text-box" name="address" value="<?= $person['Address'] ?>"/> <?=$addressError?><br/></td>
				</tr>
				
				<tr>
				<td>
				Division:
				</td>
				<td> <div class="category_div" id="category_div">
        <select id="source" name="Division" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">
        <option value="">Select Division</option>
        <option value="DHAKA">DHAKA</option>
        <option value="KHULNA">KHULNA</option>
		<option value="CHITTAGONG">CHITTAGONG</option>
		<option value="BARISAL">BARISAL</option>
		<option value="RAJSHAHI">RAJSHAHI</option>
		<option value="RANGPUR">RANGPUR</option>
		<option value="SYLHET">SYLHET</option>
        </select>
    </div></td>
				</tr>
				<tr>
				<td>
				District:
				</td>
 <td><div class="sub_category_div" id="sub_category_div">
        <script type="text/javascript" language="JavaScript">
        document.write('<select name="district" id="status"><option value=""><?= $person['District'] ?></option></select>')
        </script>
        <noscript>
        <select id="status" name="district">
            <option value="<?= $person['District'] ?>"><?= $person['District'] ?></option>
            <option value="DHAKA">DHAKA</option>
			<option value="FARIDPUR">FARIDPUR</option>
			<option value="GAZIPUR">GAZIPUR</option>
			<option value="GOPALGANJ">GOPALGANJ</option>
			<option value="JAMALPUR">JAMALPUR</option>
        </select>
        </noscript>
    </div></td><br>
	</tr>
	
	     
				
				<tr>
					<td>
					 <input type="submit" name="update" value="Update" style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white ">
					</td>
				</tr>
			
	        </form>
			</table>
			
	</body>
</html>