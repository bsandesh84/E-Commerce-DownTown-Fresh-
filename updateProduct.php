<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update Product | DownTown Fresh </title>
	<link rel="stylesheet" type="text/css" href="addProduct.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
	<link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
   rel="stylesheet" />
   <!-- <script src="contact.js" async></script> -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body style="background-color: #cde3f5">


<div class="contact">
					
	<form onsubmit = "return ValidateForm()" method="post" action="#" >
		<h2>Edit your product</h2>
					
		<label for="prodName">Product Name</label>
	    <input type="text" id="prodName" name="prodName" placeholder="Your product name..." required="required">

	    <label for="prodPrice">Product Price</label>
	    <input type="text" id="prodPrice" name="prodPrice" placeholder="Your product price..." required="required">


	    <label for="prodImage">Product Image</label>
	    <input type="text" id="prodImage" name="prodImage" placeholder="Your Image..." required="required">

	    <label for="prodDetails">Product Details</label>
	    				<!-- <input type="text" id="prodDetails" name="prodDetails" placeholder="Your product details..." required="required"> -->
	    <textarea id="prodDetails" name="prodDetails" placeholder="Write something...." rows="4" cols="50"></textarea>

						
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
	$prodName = $_POST['prodName'];
	$prodPrice = $_POST['prodPrice'];
	$prodImage = $_POST['prodImage'];
	$prodDetails = $_POST['prodDetails'];
	$prodStatus = "not verified";
	$prod_ID = $_GET['id'];

	$sql1 = 'SELECT * FROM PRODUCT WHERE PRODUCT_ID = :prod_ID';
    $stid1 = oci_parse($conn,$sql1);
    oci_bind_by_name($stid1, ':prod_id', $prod_id);
    oci_execute($stid1);
    $row1 = oci_fetch_array($stid1, OCI_ASSOC);

   	if(oci_execute($stid1)){

		$sql = 'UPDATE Product SET PRODUCT_NAME = :prodName,  PRICE = :prodPrice, PRODUCT_DETAILS = :prodDetails, PRODUCT_IMAGE = :prodImage, PRODUCT_STATUS = :prodStatus WHERE PRODUCT_ID = :prod_ID';

		$stid = oci_parse($conn,$sql);

		oci_bind_by_name($stid, ':prodName', $prodName);
		oci_bind_by_name($stid, ':prodPrice', $prodPrice);
		oci_bind_by_name($stid, ':prodDetails', $prodDetails);
		oci_bind_by_name($stid, ':prodImage', $prodImage);
		oci_bind_by_name($stid, ':prodStatus', $prodStatus);
		oci_bind_by_name($stid, ':prod_ID', $prod_ID);

		if(oci_execute($stid))
		{
			echo 'Product Updated!';
			header("location:displayForTrader.php");
		}

	}


}
?>
</html>