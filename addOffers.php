<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Offers | DownTown Fresh </title>
	<link rel="stylesheet" type="text/css" href="addOffers.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
	<link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
   rel="stylesheet" />
   <!-- <script src="contact.js" async></script> -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<div class ="header">
    <!-- <input type="checkbox" name="" id="toggler" />
    <label for="toggler" class="fas fa-bars"></label> -->
<img src="Images/logo.png" alt="DownTown Fresh" width=6%>
<nav class="navbar">
        <a href="homepage.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="displayForTrader.php">Products</a>
        <a href="traderDashboard.php">Back to dashboard</a>
        <a href="traderRegistration.html">Contact</a>
        <a href="help.php">Help</a>
</nav>

<div class="icons">
    <a href="#" class="fas fa-user" ></a>
        <a href="#" class="fas fa-shopping-cart"></a>
</div>
</div>

<body style="background-color: #cde3f5">

<div class="contact">
					
	<form method="post" action="#" >
		<h2>Add Offers</h2>

		<label for="OfferPrice">Offer Price</label>
	    <input type="text" id="OfferPrice" name="OfferPrice" placeholder="Your product offer..." required="required">

	    <label for="offerDescription">Offer Description</label>
	    				<!-- <input type="text" id="prodDetails" name="prodDetails" placeholder="Your product details..." required="required"> -->
	    <textarea id = "offerDescription" name = "offerDescription" placeholder = "Special occasion?...." rows="4" cols="50"></textarea>
						
		<input type="reset"  value="Reset">&nbsp;
		<input type="submit" value="Submit" name = "btnSubmit">
						
						
	</form>			
</div>

</body>

<?php
include_once('connect.php');
if(isset($_POST['btnSubmit'])){
	$id = $_SESSION['ID'];
	$user_id = $id['USER_ID'];
	$OfferPrice = $_POST['OfferPrice'];
	$offerDescription = $_POST['offerDescription'];
	$prod_id = $_GET['id'];

	$sql = 'INSERT INTO Offer(OFFER_ID,OFFER_RATE,OFFER_DESCRIPTION,FK1_PRODUCT_ID) VALUES(null, :OfferPrice,:offerDescription,:prod_id)';

	$stid = oci_parse($conn,$sql);

	oci_bind_by_name($stid, ':offerDescription', $offerDescription);
	oci_bind_by_name($stid, ':OfferPrice', $OfferPrice);
	oci_bind_by_name($stid, ':prod_id', $prod_id);

	if(oci_execute($stid))
	{
		echo 'Offer Added!';
		header("location:displayForTrader.php");
	}
	

}


?>
</html>