<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Customer Registration | DownTown Fresh </title>
	<link rel="stylesheet" type="text/css" href="addOffers.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
	<link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
   rel="stylesheet" />
   <!-- <script src="contact.js" async></script> -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body style="background-color: #cde3f5">


<div class="contact">
					
	<form method="post" action="#" >
		<h2>Edit Offers</h2>

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
include('connect.php');
if(isset($_POST['btnSubmit'])){
	$id = $_SESSION['ID'];
	$user_id = $id['USER_ID'];
	//echo $user_id;
	$OfferPrice = $_POST['OfferPrice'];
	$offerDescription = $_POST['offerDescription'];
	$prod_id = $_GET['id'];
	//echo $prod_id;

	$sql3 = 'SELECT * FROM OFFER WHERE FK1_PRODUCT_ID = :prod_id';
    $stid3 = oci_parse($conn,$sql3);
    oci_bind_by_name($stid3, ':prod_id', $prod_id);
    oci_execute($stid3);
    $row2 = oci_fetch_array($stid3, OCI_ASSOC);

    	$offer_ID = $row2['OFFER_ID'];

		$sql = 'UPDATE Offer SET OFFER_RATE = :OfferPrice, OFFER_DESCRIPTION = :offerDescription WHERE OFFER_ID = :offer_ID';

		$stid = oci_parse($conn,$sql);

		oci_bind_by_name($stid, ':offerDescription', $offerDescription);
		oci_bind_by_name($stid, ':OfferPrice', $OfferPrice);
		oci_bind_by_name($stid, ':offer_ID', $offer_ID);

		if(oci_execute($stid))
		{
			echo 'Offer Updated!';
		}

	

}


?>
</html>