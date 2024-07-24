<?php
ob_start(); 
include_once('connect.php');
$first_name_error = $last_name_error = $address_error = $username_error = $email_error = $phone_error = $terms_error = $email_error = $username_error = $password_error = $phone_error = $gender_error = $shoptype_error = "";

$firstnameerror = $lastnameerror = $addresserror = $usernameerror = $emailerror = $phoneerror = $termserror = $emailerror = $usernameerror = $passworderror = $phoneerror = $dateerror = 0;

$error = 0;

if(isset($_POST['btnSubmit'])){

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = md5($_POST['password']);
	$gender = $_POST['gender'];
	$Shoptype = $_POST['Shoptype'];
	$usernamelength= strlen($_POST['username']);
	$cpassword = md5($_POST['confirmpassword']);
	$pregmatch = (preg_match("/^[9]{1}[8]{1}[0-9]{8}$/", $_POST['phone']));
	$uppercase = preg_match('@[A-Z]@', $_POST['password']);
	$lowercase = preg_match('@[a-z]@', $_POST['password']);
	$number    = preg_match('@[0-9]@', $_POST['password']);

	if (empty($_POST['fname'])) {
    	$first_name_error = "First name is required";
    	$error = $error +1;
    	$firstnameerror = $firstnameerror + 1;
  	} 

  	if((strlen(trim($_POST['fname'])) != strlen($_POST['fname']))) {
	   
	    $first_name_error = "You can not input space as a first name";
    	$error = $error +1;

    	$firstnameerror  = $firstnameerror +1;
	   						
	}

	if (empty($_POST['Shoptype'])) {
    	$shoptype_error = "Shop type is required";
    	$error = $error +1;
    	$firstnameerror = $firstnameerror + 1;
  	} 

  	if((strlen(trim($_POST['Shoptype'])) != strlen($_POST['Shoptype']))) {
	   
	    $shoptype_error = "You can not input space as a shop type";
    	$error = $error +1;

    	$firstnameerror  = $firstnameerror +1;
	   						
	}

	if(strlen(trim($_POST['lname'])) != strlen($_POST['lname'])) {
	   
	    $last_name_error = "You can not input space as a last name";
    	$error = $error +1;
    	$lastnameerror = $lastnameerror +1;

	   						
	}

	if(strlen(trim($_POST['address'])) != strlen($_POST['address'])) {
	   
	    $address_error = "You can not input space as a address";
    	$error = $error +1;
    	$addresserror = $addresserror + 1;
	   						
	}

	if(strlen(trim($_POST['email'])) != strlen($_POST['email'])) {
	   
	    $email_error = "You can not input space as a email";
    	$error = $error +1;
    	$emailerror = $emailerror +1;
	   						
	}

	if(strlen(trim($_POST['phone'])) != strlen($_POST['phone'])) {
	   
	    $phone_error = "You can not input space as a phone";
    	$error = $error +1;
    	$phoneerror = $phoneerror +1;
	   						
	}

	if(strlen(trim($_POST['username'])) != strlen($_POST['username'])) {
	   
	    $username_error = "You can not input space as a username";
    	$error = $error +1;
    	$usernameerror  = $usernameerror +1;
	   						
	}

	if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['fname'])) {
      	$first_name_error = "Only letters and white space allowed";
      	$error = $error +1;
      	$firstnameerror = $firstnameerror +1;
    }


  	if (empty($_POST['lname'])) {
    	$last_name_error = "Last name is required";
    	$error = $error +1;
    	$lastnameerror  = $lastnameerror +1;
  	} 


    if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['lname'])) {
      	$last_name_error = "Only letters and white space allowed";
      	$error = $error +1;
      	$lastnameerror  = $lastnameerror  + 1;
    }
  	

  	if (empty($_POST['address'])) {
    	$address_error = "address name is required";
    	$error = $error +1;
    	$addresserror = $addresserror +1;
  	} 

    // if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['address'])) {
    //   	$address_error = "Only letters and white space allowed";
    //   	$error = $error +1;
    //   	$addresserror = $addresserror +1;
    // }

  	if (empty($_POST['username'])) {
    	$username_error = "username name is required";
    	$error = $error +1;
    	$usernameerror = $usernameerror +1;
  	} 

    if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['username'])) {
      	$username_error = "Only letters and white space allowed";
      	$error = $error +1;
      	$usernameerror  = $usernameerror +1;
    }

  	if (empty($_POST['email'])) {
    	$email_error = 'address name is required';
    	$error = $error +1;
    	$emailerror  = $emailerror +1;
  	} 

  	if (empty($_POST['phone'])) {
    	$phone_error = "address name is required";
    	$error = $error +1;
    	$phoneerror = $phoneerror +1;
  	} 

  	if ($_POST['terms'] == 'value2'){
		$terms_error = "You have not agreed to our terms and conditions!";
		$error = $error +1;
		$termserror = $termserror  +1;
	}

	if ($_POST['gender'] == '0'){
		$gender_error = "Select a gender!";
		$error = $error +1;
		$termserror = $termserror  +1;
	}

	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  			$email_error = "Invalid email!";
  			$error = $error +1;
  			$emailerror  = $emailerror + 1;
	}

	

	if ($usernamelength < 6){
		$username_error = "Invalid username. Username must be at least 6 characters!";
		$error = $error +1;
		$usernameerror = $usernameerror +1;
	}

	if(!$uppercase) {
   		$password_error = "Password should include at least one upper case letter.";
   		$error = $error +1;
   		$passworderror = $passworderror +1;
	}

	if(!$lowercase) {
   		$password_error = "Password should include at least one lower case letter.";
   		$error = $error +1;
   		$passworderror = $passworderror +1;
	}

	if(!$number) {
   		$password_error = "Password should include at least one number.";
   		$error = $error +1;
   		$passworderror = $passworderror +1;
	}

	if(strlen($_POST['password']) < 8) {
   		$password_error = "Password should be at least 8 characters in length.";
   		$error = $error +1;
   		$passworderror = $passworderror +1;
	}

	if(md5($_POST['password']) != md5($_POST['confirmpassword'])){
		$password_error = "Passwords dont match.";
		$error = $error +1;
		$passworderror =$passworderror +1;
	}

	if (!$pregmatch){
		$phone_error = "Phone number is not valid. Please enter a valid phone number";
		$error = $error +1;
		$phoneerror = $phoneerror +1;
	}

	if($error == 0){

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = md5($_POST['password']);
	$gender = $_POST['gender'];
	$Shoptype = $_POST['Shoptype'];
	$usertype = "trader";
	$ProfileImage = $_POST['ProfileImage'];
	$token = bin2hex(random_bytes(15));
	$status = "inactive";

$sql = 'INSERT INTO Users (User_ID, Username, EMAIL,PHONENUM,PASSWORD,FIRSTNAME,LASTNAME,ADDRESS,USER_TYPE, Token, USER_STATUS) VALUES(:user_id, :username, :email, :phone,:password,:fname,:lname,:address,:usertype,:token, :status)';

$stid = oci_parse($conn,$sql);

oci_bind_by_name($stid, ':user_id', $user_id);
oci_bind_by_name($stid, ':username', $username);
oci_bind_by_name($stid, ':email', $email);
oci_bind_by_name($stid, ':phone', $phone);
oci_bind_by_name($stid, ':password', $password);
oci_bind_by_name($stid, ':fname', $fname);
oci_bind_by_name($stid, ':lname', $lname);
oci_bind_by_name($stid, ':address', $address);
oci_bind_by_name($stid, ':usertype', $usertype);
oci_bind_by_name($stid, ':token', $token);
oci_bind_by_name($stid, ':status', $status);

	if(oci_execute($stid))
	{
		echo "User Added successfully!";
		$to = $email;
	    $subject = "Email Activation";
	    $message = "Hi, $username. Click here to activate your account http://localhost/oci/activate.php?token=$token";
	    if (mail($to, $subject, $message))
	    {
	        $_SESSION['message'] = "Check your mail to activate your account";
	        header("location:login.php");
	    }

	    else{
	        echo "Unable to send email!";
	    }

	}

// $entryd = 'SELECT TO_CHAR(SYSDATE) FROM DUAL';
// $entryd = date("m/d/Y" , strtotime(SYSDATE));
// echo $entryd;

// $sql2 = "INSERT INTO Trader (USER_ID,TRADER_ID,TENTRY_DATE, TYPE,GENDER,WARNING_COUNT,TPROFILEIMAGE) VALUES (:user_id, :trader_id, to_date(:entryd,'MM/DD/YYYY'), :Shoptype, :gender, null,:ProfileImage)";

$sql2 = "INSERT INTO Trader (USER_ID,TRADER_ID,TENTRY_DATE, TYPE,GENDER,WARNING_COUNT,TPROFILEIMAGE) VALUES (:user_id, :trader_id, SYSDATE , :Shoptype, :gender, -1,:ProfileImage)";

$stid2 = oci_parse($conn,$sql2);

oci_bind_by_name($stid2, ':user_id', $user_id);
oci_bind_by_name($stid2, ':trader_id', $trader_id);
oci_bind_by_name($stid2, ':Shoptype', $Shoptype);
oci_bind_by_name($stid2, ':gender', $gender);
oci_bind_by_name($stid2, ':ProfileImage', $ProfileImage);

if(oci_execute($stid2))
{
echo "Trader Added successfully!";

}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Trader Registration | DownTown Fresh </title>
	<style>
.error {color: black;
	background-color: #ac9fc5;
font-family: 'Delius', sans-serif;}
</style>
	<link rel="stylesheet" type="text/css" href="traderRegistration.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
	<link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
   rel="stylesheet" />
   <script src="contact.js" async></script>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body style="background-color: #FFF5F4">

    <div class ="header">
        <!-- <input type="checkbox" name="" id="toggler" />
        <label for="toggler" class="fas fa-bars"></label> -->
    <img src="Images/logo.png" alt="DownTown Fresh" width=6%>
    <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="DisplayForCustomer.php">Products</a>
            <a href="traderRegistration.php">Contact</a>
            <a href="help.php">Help</a>
    </nav>

    <div class="icons">
        <a href="#" class="fas fa-user" ></a>
            <a href="#" class="fas fa-shopping-cart"></a>
    </div>
</div>

  <div class="nav2">
  	<a href="#">Contact/</a><a href="#">Trader Registration</a>
  </div>

	<div class="division">

		<div class="containers">
			<div class="parent container1">
				
			</div>

			<div class="parent container2">
				<div class="contact">
					
					<form onsubmit = "return ValidateForm()" method="post" action="#" >
						<h2>Registration</h2>
					
						<label for="fname">First Name</label><span class="error"> <?php echo $first_name_error;?></span>
	    				<input type="text" id="fname" name="fname" placeholder="Your name..." required="required">

	    				<label for="lname">Last Name</label><span class="error"> <?php echo $last_name_error;?></span>
	    				<input type="text" id="lname" name="lname" placeholder="Your last name..." required="required">

	    				<label for="gender">Gender</label><span class="error"> <?php echo $gender_error;?></span><br>
	    				<select name="gender" id= "gender">
	    				<option value="0">Your gender....</option>
						<option value="M">Male</option>
						<option value="F">Female</option>
						<option value = "O">Others</option>
					    </select>

	    				<label for="address">Address</label><span class="error"> <?php echo $address_error;?></span>
	    				<input type="text" id="address" name="address" placeholder="Your address..." required="required">

	    				<label for="email">Email</label><span class="error"> <?php echo $email_error;?></span>
	    				<input type="text" id="email" name="email" placeholder="Your email..." required="required">

	    				<label for="phone">Contact Number</label><span class="error"> <?php echo $phone_error;?></span>
	    				<input type="text" id="phone" name="phone" placeholder="Your phone number..." required="required">

	    				<label for="Shoptype">Type of Shop</label><span class="error"> <?php echo $shoptype_error;?></span>
	    				<input type="text" id="Shoptype" name="Shoptype" placeholder="Your shop type..." required="required">

	    				<label for="ProfileImage"> Your profile pic</label>
        				<input type="text" id="ProfileImage" name="ProfileImage" placeholder="Your profile image..." required="required">

	    				<label for="username">Username</label><span class="error"> <?php echo $username_error;?></span>
	    				<input type="text" id="username" name="username" placeholder="Your username..." required="required">

	    				<label for="password">Password</label><span class="error"> <?php echo $password_error;?></span>
	    				<input type="password" id="password" name="password" placeholder="Your password..." required="required">

	    				<label for="confirmpassword">Confirm Password</label><span class="error"> <?php echo $password_error;?></span>
	    				<input type="password" id="confirmpassword" name="confirmpassword" placeholder="Re-enter password..." required="required"><br>

						<input type= "hidden" name="terms" id="terms" value="value2">
						<input type="checkbox" name="terms" id="terms" value="value1">&nbsp;

						<label for="terms">I agree to all the <u>terms and conditions</u> of DownTown Fresh.</label><span class="error"> <?php echo $terms_error;?></span>
						
						<input type="reset"  value="Reset">&nbsp;
						<input type="submit" value="Submit" name = "btnSubmit">
						
						
					</form>			
				</div>
			</div>
		</div>
	</div>

	

<footer>

	<div id="footercontainer">

	<div class="flex1">
	<p>Informations</p><br>
	<nav id="navigation2">
	         <a href="home.html" target="blank">About Us</a><br>
	         <a href="contact.html" target="blank">Contact Us</a><br>
	         <a href="order.html" target="blank">Terms & Conditions</a><br>
	         <a href="about.html" target="blank">Privacy Policy</a><br>
	         <a href="review.html" target="blank">Make money with us</a><br>
  	</nav>
    </div>

    <div class="flex2">
    	<p>NEED HELP?</p><br>
    	We are available 9am-5pm PT. Our primary mode of support is via email. Please don’t think this means we don’t want to speak to you — quite the opposite, actually!<br><br>
    		✉ hi@downtownfresh.com<br>☎ 206-709-5001<br><br>

    	Join our newsletter
    	<div class="newsletter">
    	<input type="text" id="email2" name="email2" placeholder="Your email..." required="required">
    	<input type="submit" value="Submit">
    </div>


    </div>
    <div class="flex3">
    	<p>Visit Us</p><br>
<img src="Images/collections.png" width="20">&nbsp;&nbsp;Slot 10 - 13<br>
<img src="Images/location.png" width="20">&nbsp;&nbsp;Woodhouse, Bradford<br>
<img src="Images/phone.png" width="20">&nbsp;&nbsp;789-709-8889<br>
<!-- <hr size="2" width="250px" color="black">  -->
<hr />

<img src="Images/collections.png" width="20">&nbsp;&nbsp;Slot 13 - 16<br>
<img src="Images/location.png" width="20">&nbsp;&nbsp;West Bretton, Wakefield<br>
<img src="Images/phone.png" width="20">&nbsp;&nbsp;206-456-5001<br>
<!-- <hr size="2" width="250px" color="black"> -->
  <hr />

<img src="Images/collections.png" width="20">&nbsp;&nbsp;Slot 16 - 19<br>
<img src="Images/location.png" width="20">&nbsp;&nbsp;Allerton Bywater, Leeds<br>
<img src="Images/phone.png" width="20">&nbsp;&nbsp;234-709-5001<br>
<!-- <hr size="2" width="250px" color="black">   -->
<hr />

    </div>

    <div class="flex4">

    	<div>

    	<br><a target="blank" href="http://nationalkoshersupervision.com/"><img src="Images/kosher.png" alt="kosherpic"></a><br><br></div>
    	All of our cakes, cupcakes, and pies are Kosher. We are under strict National Kosher supervision. 
    </div>
 
	</div>

	<div class="symbols">
		<a href="https://www.instagram.com/" target="_blank"><img src="Images/instagram.png" alt="instagram" title="Instagram" width="30"></a>&nbsp;
		<a href="https://www.youtube.com/" target="_blank"><img src="Images/youtube.png" alt="youtube" title="Youtube" width="30"></a>&nbsp;
		<a href="https://twitter.com/" target="_blank"><img src="Images/twitter.png" alt="twitter" title="Twitter" width="30"></a>
	</div> 

	<div class="copyright">
		<p>© Copyright 2020 DownTownFresh | All Rights Reserved</p>
	</div>


</footer>
</body>
</html>