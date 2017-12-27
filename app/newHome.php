<?php 	
		include "../service/person_service.php"; 
		$users=array();
		$userNames=array();
		$counter="";
		
		
		if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["Search"]==true) {
			
			$bloodGroup = $_POST['Blood'];
			$District = $_POST['District'];
			
			$users = getPersonsByBloodAndArea($bloodGroup,$District);	
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
		

		<li style="float: left; padding-left: 50px;color: white"><a href="profile.php"style="text-decoration: none;color: white;">Profile</a></li>

		<li style="float: left; padding-left: 50px;color: white"><a href="blood_search.php"style="text-decoration: none;color: white;">Blood Search</a></li>

		<li style="float: right; padding-right: 50px;color: white"><a href="user_logout.php"style="text-decoration: none;color: white;"><b>Logout</b></a></li>
		
		</ul> <br>
</div> <br>
			<p style="color:red"><i><b>"To give blood you need neither extra strength nor extra food,and you will save a life."</b></i></p><br><br>

			<h1>Search </h1>
		
<form  method="POST">
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

		  <input type="submit" name="Search" value="Search" style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white "><br><br><br><br>

	</form>

	<form method="post">
	<table style="margin-top: 50px;" border="5" cellspacing="0" cellpadding="5">
                <?php if (count($users) == 0) { ?>
                    <tr>
                        <td>NO RECORD FOUND</td>
                    </tr>
                <?php } 
					else{
						$counter=count($users);
					}
				?>
				<tr>
                    <td>Available Number Of Donner In Your Area Is <?=$counter?></td>
                </tr>
                
					
            </table>
					<input type="submit" name="request" value="Request" >

		</center>
			
		</form>



</body>

</html>