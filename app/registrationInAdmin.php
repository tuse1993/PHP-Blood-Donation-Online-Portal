<?php include "../service/person_service.php"; ?>


<?php 
      $userNameError="";
	  $fullNameError="";	  
	  $ageError=""; 
	  $weightError="";
	  $mobileError="";
	  $emailError="";  
	  $addressError="";
	  $passwordError="";
	  
	  $userName="";
	  $fullName="";
	  $password="";
	  $age =  "";
	  $weight =  "";
	  $bloodGroup = "";
	  $mobile = "";
	  $email= "";
	  $address = "";
	  $available = "";
	  $gender = "";
	  $district = "";
	  
	  $userin=array();
	  
	  
	  
	 
	  
	  
?>



<?php

	//echo "hidden"; 
	
	if($_SERVER['REQUEST_METHOD']=="POST"){
	
	
		$userin['name'] = $_POST['user_name'];
		$userin['fullName'] = $_POST['full_name'];
		$userin['password'] = $_POST['password'];
		$userin['age'] =  $_POST['age'];
		$userin['weight'] =  $_POST['weight'];
		$userin['bloodGroup'] = $_POST['bloodGroup'];
		$userin['mobile'] = $_POST['mobile'];
		$userin['email']= $_POST['email'];
		$userin['address'] = $_POST['address'];
		$userin['available'] = $_POST['available'];
		$userin['gender'] = $_POST['gender'];
		$userin['district'] = $_POST['district'];
		
		$userName = $_POST['user_name'];//copy korbo 
		$fullName = $_POST['full_name'];
		$password = $_POST['password'];
		$age =  $_POST['age'];
		$weight =  $_POST['weight'];
		$bloodGroup = $_POST['bloodGroup'];
		$mobile = $_POST['mobile'];
		$email= $_POST['email'];
		$address = $_POST['address'];
		$available = $_POST['available'];
		$gender = $_POST['gender'];
		$district = $_POST['district'];
		
		$isUserNameValid = true;
		$isFullNameValid = true;
	    $isPassValid = true;
	    $isAgeValid = true;
	    $isWeightValid= true;
	    $isMobileValid = true;
	    $isEmailValid=true;
	    $isAddressValid = true;	
		
		//User name validation
		if(empty($userName))
		{
			$userNameError = "User name can not be empty";
			$isUserNameValid = false;
		}
		else 
		{
			$guestNew = getPersonsByUserName($userName);
			//var_dump($guestNew);
			if(count($guestNew) != 0)
			{
				$userNameError = "User name already used ";
			    $isUserNameValid = false;
		    }
		}
		
		
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
		if(empty($password))
		{
			$passwordError = "Password can not be empty";
			
			$isPassValid = false;
		}
		else if(strlen($password)<8)
		{
			$passwordError = "Password must be contain more than 7 character";
			$isPassValid = false;
		}
		
		
		
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
		
		
		if($isUserNameValid == true && $isFullNameValid == true && $isPassValid == true &&  $isAgeValid == true && $isWeightValid == true && $isMobileValid == true && $isEmailValid==true && $isAddressValid == true)	
		{
			if(addUser($userin)==true)
			{
			   //if($result==true){
				   addcount($userin['name']);
					  $userNameError="";
					  $fullNameError="";	  
					  $ageError=""; 
					  $weightError="";
					  $mobileError="";
					  $emailError="";  
					  $addressError="";
					  $passwordError="";
					  
					  
					  $userName="";
					  $fullName="";
					  $password="";
					  $age =  "";
					  $weight =  "";
					  $bloodGroup = "";
					  $mobile = "";
					  $email= "";
					  $address = "";
					  $available = "";
					  $gender = "";
					  $district = "";
					  
					  $userin['name']="";
					  $userin['fullName']="";
					  $userin['password']="";
					  $userin['age'] =  "";
					  $userin['weight'] =  "";
					  $userin['bloodGroup'] = "";
					  $userin['mobile']  = "";
					  $userin['email']= "";
					  $userin['address'] = "";
					  $userin['available'] ="";
					  $userin['gender'] = "";//new
					  $userin['district'] = "";
					
				//}
				header("location:admin_home.php");
				die();
				
				
			   }
		
		}
		
		
	}
?>

<html >
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


	<body background="images/reg_bg.jpg" style="background-repeat: no-repeat;background-position: center;" >

	<center>
		<div style="background-color:#d10a46;height:50px">
				<ul style="list-style: none; padding-top: 15px">
				<li style="float: left; padding-left: 50px;color: white"><a href="Home.php" style="text-decoration: none;color: white;">Home</a></li>

				<li style="float: left; padding-left: 50px;color: white"><a href="Login.php"style="text-decoration: none;color: white;">Login</a></li>

				

				
				</ul> <br>
		</div> <br>
			<h1 >Registration</h1>
			
		<form method="post">
			<table >
				<tr>
					<td>User Name :</td>
					<td><input type="text-box" name="user_name" value="<?=$userName?>"/> <?=$userNameError?><br/></td>
				</tr>
				<tr>
					<td>Full Name :</td>
					<td><input type="text-box" name="full_name" value="<?=$fullName?>"/> <?=$fullNameError?><br/></td>
				</tr>
				<tr>
					<td>Gender :</td>
					<td> <select name="gender">
							  <option value="Male">Male</option>
							  <option value="Female">Female</option>
						</select></td>
				</tr>
					
				<tr>
					<td>Password :</td>
					<td><input type="password" name="password"/> <?=$passwordError?><br/> </td>
				</tr>
				<tr>
					<td>Age :</td>
					<td><input type="text-box" name="age" value="<?=$age?>"/> <?=$ageError?></td>
				</tr>
				<tr>
					<td>Weight :</td>
					<td><input type="text-box" name="weight"kg value="<?=$weight?>"/> <?=$weightError?></td>
				</tr>
				<tr>
					<td>Blood group :</td>
					<td> <select name="bloodGroup">
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
					<td><input type="text-box" name="mobile" value="<?=$mobile?>"/> <?=$mobileError?></td>
				</tr>

				<tr>
					<td>Email :</td>
					<td><input type="text-box" name="email" value="<?=$email?>"/> <?=$emailError?></td>
				</tr>

				<tr>
					<td>Address :</td>
					<td><input type="text-box" name="address" value="<?=$address?>"/> <?=$addressError?></td>
					
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
        document.write('<select name="district" id="status"><option value="">Select District</option></select>')
        </script>
        <noscript>
        <select id="status" name="district">
            <option value="">Select District</option>
            <option value="DHAKA">DHAKA</option>
			<option value="FARIDPUR">FARIDPUR</option>
			<option value="GAZIPUR">GAZIPUR</option>
			<option value="GOPALGANJ">GOPALGANJ</option>
			<option value="JAMALPUR">JAMALPUR</option>
        </select>
        </noscript>
    </div></td><br>
	</tr>
				
				</tr>
				<tr>
					<td>Available :</td>
					<td>
						<input type="radio" name="available" value="Yes" checked> Yes
 					 	<input type="radio" name="available" value="No"> No <br>
 					</td>
				</tr>
				<tr>
					<td>
					 <input type="submit" name="registration" value="Registration" style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white ">
					</td>
				</tr>
				
				
	
			</table>
		</form>
	</body>
</html>



