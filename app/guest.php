<?php include "../service/person_service.php"; ?>

<?php 
      $guestNameError="";
	  $mobileError="";	  
	  
	  
	  $guestName="";
	  $mobile="";
	  
?>




<?php
	$users=array();
	$guestUser = array();
	$guestNew = array();
	
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
        $bloodGroup = $_POST['Blood'];
		$District = $_POST['District'];
		
		$guestUser['guestname'] = $_POST['guest_name'];
		$guestUser['guestmobile'] = $_POST['guest_mobile'];
		
	    $guestName = $_POST['guest_name'];
		$mobile = $_POST['guest_mobile'];
		
		$isGuestNameValid = true;
		$isGuestMobileValid = true;
		
		//var_dump($guestUser);
		
		if(empty($guestName) || empty($mobile))
		{
			if(empty($guestName))
			{
			$guestNameError = "Name can not be empty";
			$isGuestNameValid = false;
			}
		
		   //Mobile  validation
			if(empty($mobile))
			{
				$mobileError = "Mobile number can not be empty";
				$isGuestMobileValid = false;
			}
			
		}
		else if(strlen($mobile)>20)
			{
				$mobileError = "Mobile number is invalid";
				$isGuestMobileValid = false;
			}
		
		
			
		
			
		
		if($isGuestMobileValid == true )
		 {
			$guestNew = getGuestByMobile($mobile);
			//var_dump($guestNew);
			if(count($guestNew) != 0)
			{
				//akta loop diya show korbo j registration kore hobey ....
				header("location:failedguest.php");
				die();
		    }
			
			 if(addGuestUser($guestUser)==true)
			{
			   //if($result==true){
				$guestNameError="";
				$mobileError="";	  
					  
					  
				$guestName="";
				$mobile="";
					  
					  
					  
				$guestUser['guest_name'] = "";
				$guestUser['guest_mobile'] = "";
					  
					
				
				
				$users = getPersonsByBloodAndArea($bloodGroup,$District);
			}
		 }
		// $users = getPersonsByBloodAndArea($bloodGroup,$District);
		 
		
		
		
		
        
		
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

<body background="images/Search.jpg" style=" background-size: cover; 	
			background-repeat: no-repeat;">
		<center>
<div style="background-color:#d10a46;height:50px">
		<ul style="list-style: none; padding-top: 15px">
		<li style="float: left; padding-left: 50px;color: white"><a href="Home.php" style="text-decoration: none;color: white;">Home</a></li>

		<li style="float: left; padding-left: 50px;color: white"><a href="registration.php"style="text-decoration: none;color: white;">Registration</a></li>
		
		<li style="float: left; padding-left: 50px;color: white"><a href="login.php"style="text-decoration: none;color: white;">Login</a></li>

		</ul> <br>
</div> <br>
			<p style="color:red"><i><b>"To give blood you need neither extra strength nor extra food,and you will save a life."</b></i></p><br><br>

			<h1>Search </h1>
		
<form  method="POST">

				Your Name <input type="text-box" name="guest_name" style="margin-right: 20px" value="<?=$guestName?>"/> <?=$guestNameError?>
				Mobile Number <input type="text-box" name="guest_mobile" value="<?=$mobile?>"/> <?=$mobileError?><br><br>

<div>Blood Group <select name="Blood">
		  <option value="A+">A+</option>
		  <option value="A-">A-</option>
		  <option value="B+">B+</option>
		  <option value="B-">B-</option>
		  <option value="AB+">AB+</option>
		  <option value="AB-">AB-</option>
		  <option value="O+">O+</option>
		  <option value="O-">O-</option>
		  </select>
</div>

<br> <div class="category_div" id="category_div">Division:
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
    </div><br>
 <div class="sub_category_div" id="sub_category_div">District:
        <script type="text/javascript" language="JavaScript">
        document.write('<select name="District" id="status"><option value="">Select District</option></select>')
        </script>
        <noscript>
        <select id="status" name="District">
            <option value="">Select District</option>
            <option value="DHAKA">DHAKA</option>
			<option value="FARIDPUR">FARIDPUR</option>
			<option value="GAZIPUR">GAZIPUR</option>
			<option value="GOPALGANJ">GOPALGANJ</option>
			<option value="JAMALPUR">JAMALPUR</option>
        </select>
        </noscript>
    </div> <br>

		  <input type="submit" name="search" value="Search" style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white "><br><br><br><br>

	</form>

	<table style="margin-top: 50px; background-color: #d10a46;color: white;" cellspacing="0" cellpadding="5">
                <?php if (count($users) == 0) { ?>
                    <tr style="text-align: center;"><b>NO RECORD FOUND!</b>
                    </tr>
                <?php } ?>

                
					<tr style="background-color: #af0b42;">
					<th> User_Name </th>
					<th> User_Name </th>
					<th> Full_Name </th>
					<th> Age </th>
					<th> Weight </th>
					<th> Blood_Group </th>
					<th> Mobile </th>
					<th> Email </th>
					<th> Address </th>
					<th> District </th>
					</tr>
					
					<?php foreach ($users as $person) { ?>
                    <tr>
                        <td><?= $person['User_Name'] ?></td>
						<td><?= $person['Full_Name'] ?></td>
						<td><?= $person['Age'] ?></td>
						<td><?= $person['Weight'] ?></td>
						<td><?= $person['Blood_Group'] ?></td>
						<td><?= $person['Mobile'] ?></td>
						<td><?= $person['Email'] ?></td>
						<td><?= $person['Address'] ?></td>
						<td><?= $person['District'] ?></td>
                    </tr>
                <?php }?>
            </table>


		</center>



</body>

</html>