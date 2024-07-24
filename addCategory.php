<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" type="text/css" href="addCategory.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
   rel="stylesheet" />
</head>
<div class ="header">
    <!-- <input type="checkbox" name="" id="toggler" />
    <label for="toggler" class="fas fa-bars"></label> -->
<img src="Images/logo.png" alt="DownTown Fresh" width=6%>
<nav class="navbar">
        <a href="homepage.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="displayForTrader.php">Product</a>
        <a href="traderRegistration.php">Register</a>
        <a href="traderDashboard.php">Dashboard</a>
        <a href="CustomerSetting.php">Trader</a>
        <a href="help.php">Help</a>
</nav>

<div class="icons">
    <a href="#" class="fas fa-user" ></a>
        <a href="#" class="fas fa-shopping-cart"></a>
</div>
</div>

<!-- <body style="background-color: #cde3f5"> -->


<div class="contact">
					
	<form onsubmit = "return ValidateForm()" method="post" action="#" >
		<h2>Open a shop</h2>

		<label for="shopName">Enter your shop name</label>
	    <input type="text" id="shopName" name="shopName" placeholder="Your product name..." required="required">

	    <label for="catName">Category Name</label>
	    <input type="text" id="catName" name="catName" placeholder="Your product name..." required="required">
						
		<input type="reset"  value="Reset">&nbsp;
		<input type="submit" value="Submit" name = "btnSubmit">
						
						
	</form>			
</div>



<?php
include_once('connect.php');
if(isset($_POST['btnSubmit'])){
	$id = $_SESSION['ID'];
	$user_id = $id['USER_ID'];
	$shopName = $_POST['shopName'];
	$catName = $_POST['catName'];

	$sql1 = 'SELECT SHOP_ID FROM SHOP WHERE SHOP_NAME = :shopName';
	$stid1 = oci_parse($conn,$sql1);
	oci_bind_by_name($stid1, ':shopName', $shopName);
	oci_execute($stid1);
	$row = oci_fetch_array($stid1, OCI_ASSOC);
	$shop_ID = $row['SHOP_ID'];

	$sql2 = 'INSERT INTO Category(CAT_ID,CAT_NAME,FK1_SHOP_ID) VALUES(null, :catName,:shop_ID)';

	$stid2 = oci_parse($conn,$sql2);

	// oci_bind_by_name($stid2, ':cat_ID', $cat_ID);
	oci_bind_by_name($stid2, ':catName', $catName);
	oci_bind_by_name($stid2, ':shop_ID', $shop_ID);

	if(oci_execute($stid2))
	{
		echo 'Category Added!';
		header("location:traderDashboard.php");
	}

}


?>
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

<img src="Images/collections.png" width="20">&nbsp;&nbsp;Slot 10 - 13<br>
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