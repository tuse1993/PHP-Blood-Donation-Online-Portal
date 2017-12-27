<?php 	
		include "../service/person_service.php"; 
		$users=array();
		$userNames=array();
		$counter="";
		$text="";
		$text2="";
		
		
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

	<body>
	<center>

<div style="background-color:#d10a46;height:50px">
		<ul style="list-style: none; padding-top: 15px">
		<li style="float: left; padding-left: 50px;color: white"><a href="Home.php" style="text-decoration: none;color: white;">Home</a></li>

		<li style="float: left; padding-left: 50px;color: white"><a href="registration.php"style="text-decoration: none;color: white;">Registration</a></li>

		<li style="float: left; padding-left: 50px;color: white"><a href="login.php"style="text-decoration: none;color: white;">Login</a></li>


		</ul>
		</div>

<form  method="POST">

<table> <tr><td>Blood Group</td> 
			
		   <td><select name="Blood">
		  <option value="A+">A+</option>
		  <option value="A-">A-</option>
		  <option value="B+">B+</option>
		  <option value="B-">B-</option>
		  <option value="AB+">AB+</option>
		  <option value="AB-">AB-</option>
		  <option value="O+">O+</option>
		  <option value="O-">O-</option>
		  </select>
		  <td>
		 <td class="category_div" id="category_div">Division:</td>
        <td><select id="source" name="Division" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">
        <option value="">Select Division</option>
        <option value="DHAKA">DHAKA</option>
        <option value="KHULNA">KHULNA</option>
		<option value="CHITTAGONG">CHITTAGONG</option>
		<option value="BARISAL">BARISAL</option>
		<option value="RAJSHAHI">RAJSHAHI</option>
		<option value="RANGPUR">RANGPUR</option>
		<option value="SYLHET">SYLHET</option>
        </select>
    </td>
 <td class="sub_category_div" id="sub_category_div">District:
        <script type="text/javascript" language="JavaScript">
        document.write('<select name="District" id="status"><option value="">Select District</option></select>')
        </script>
        <noscript></td>
        <td><select id="status" name="District">
            <option value="">Select District</option>
            <option value="DHAKA">DHAKA</option>
			<option value="FARIDPUR">FARIDPUR</option>
			<option value="GAZIPUR">GAZIPUR</option>
			<option value="GOPALGANJ">GOPALGANJ</option>
			<option value="JAMALPUR">JAMALPUR</option>
        </select>
        </noscript>
    </td> <br>

		 <td> <input type="submit" name="Search" value="Search" style="background-color: #d10a46; color: white; width: 80px; height: 30px; border-radius: 10px; border-color: white "></td><br>
</table>
	</form>

	<form method="post">
	<table  style="margin-top: 50px; font-size:20px; " cellspacing="0" cellpadding="5">
                <?php if (count($users) == 0) { ?>
                    <tr style="text-align: center;"><b>NO RECORD FOUND!</b>
                    </tr>
                <?php } 
					else{
						$counter=count($users);
						$text="Available Number Of Donner In Your Area Is";
						$text2="For Further Search Please Log In...";
					}
				?>
				<tr>
                    <td><?=$text?> <?=$counter?></td>
                </tr>
				<tr>
                    <td><?=$text2?></td>
                </tr>
                
					
            </table>

		</center>
			
		</form>


		<img src="images/home01.jpg">
		<h1 style="color:#d10a46 ">About Blood Donation</h1>
		<p style="padding: 0px 50px">Today in the developed world, most blood donors are unpaid volunteers who donate blood for a community supply. In poorer countries, established supplies are limited and donors usually give blood when family or friends need a transfusion (directed donation). Many donors donate as an act of charity, but in countries that allow paid donation some donors are paid, and in some cases there are incentives other than money such as paid time off from work. Donors can also have blood drawn for their own future use (autologous donation). Donating is relatively safe, but some donors have bruising where the needle is inserted or may feel faint.</p>

		<table>
			<tr>
				<td><img src="images/home02.jpg" width="500px"></td>
				<td><h2 style="color:#d10a46 ">Benefits of Donating</h2>
				<h3>1. It feels great to donate!<br>
					2. You get free juice and delicious cookies.<br>
					3. It's something you can spare that most people have blood to spare... yet, there <br>is still not enough to go around.<br>
					4. You will help ensure blood is on the shelf when needed most people don't think <br>they'll ever need blood, but many do.<br>
					5. You will be someone's hero,in fact, you could help save more than one life with <br>just one donation.</h3></td>
			</tr>
			<tr>
				<td><img src="images/donation.png" height="500px" ="500px"></td>
				<td><H2>Your Donation Card </H2>
				<h3>Within a few weeks of donating, you'll receive a blood donor card via E-mail. This card is important as it provides a personal donor identification number that will help to identify you when you come back to donate. Your donor card is also available through the BD Blood Service Donor App.</h3>
				</td>
			</tr>
		</table>
		
			<div style="background-color:#d10a46;height:50px">
			<p style="color: white;padding-top: 15px">Copyright | 2017</p>
			</div>
	</center>



	</body>