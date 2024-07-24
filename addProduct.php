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
    <link rel="stylesheet" type="text/css" href="addProduct.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
   rel="stylesheet" />  

</head>
<div class ="header">
<img src="Images/logo.png" alt="DownTown Fresh" width=6%>
<nav class="navbar">
        <a href="Home.html">Home</a>
        <a href="About Us.html">About Us</a>
        <a href="Shop.html">Shop</a>
        <a href="Cart.html">Cart</a>
        <a href="Contact.html">Contact</a>
        <a href=".html">Customer</a>
        <a href=".html">Trader</a>
        <a href="Help.html">Help</a>
</nav>

<div class="icons">
    <a href="#" class="fas fa-user" ></a>
        <a href="#" class="fas fa-shopping-cart"></a>
</div>
</div>
<br><br><br><br><br><br><br><br>
<body style="background-color: #FFF5F4">


<div class="contact">
					
	<form onsubmit = "return ValidateForm()" method="post" action="#" >
		<h2>Add a Product to your shop</h2>

		<label for="prodShop">Product Shop</label>
	    <input type="text" id="prodShop" name="prodShop" placeholder="Your product name..." required="required">

	    <label for="prodCategory">Product Category</label>
	    <input type="text" id="prodCategory" name="prodCategory" placeholder="Your product name..." required="required">
					
		<label for="prodName">Product Name</label>
	    <input type="text" id="prodName" name="prodName" placeholder="Your product name..." required="required">

	    <label for="prodPrice">Product Price</label>
	    <input type="text" id="prodPrice" name="prodPrice" placeholder="Your product price..." required="required">


	    <label for="prodImage">Product Image</label>
	    <input type="text" id="prodImage" name="prodImage" placeholder="Your Image..." required="required">

	    <label for="allery_info">Allergy Information</label>
	    <input type="text" id="allery_info" name="allery_info" placeholder="Your Image..." required="required">

	    <label for="prod_Stock">Product Stock</label>
	    <input type="text" id="prod_Stock" name="prod_Stock" placeholder="Your Image..." required="required">

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
	$prodShop = $_POST['prodShop'];
	$prodCategory = $_POST['prodCategory'];
	$prodName = $_POST['prodName'];
	$prodPrice = $_POST['prodPrice'];
	$prodImage = $_POST['prodImage'];
	$prodDetails = $_POST['prodDetails'];
	$prodStatus = "not verified";
	$allery_info = $_POST['allery_info'];
	$prod_Stock = $_POST['prod_Stock'];
	

	$sql1 = 'SELECT SHOP_ID FROM SHOP WHERE SHOP_NAME = :prodShop';
	$stid1 = oci_parse($conn,$sql1);
	oci_bind_by_name($stid1, ':prodShop', $prodShop);
	oci_execute($stid1);
	$row = oci_fetch_array($stid1, OCI_ASSOC);
	$shop_ID = $row['SHOP_ID'];

	$sql2 = 'SELECT CAT_ID FROM CATEGORY WHERE CAT_NAME = :prodCategory';
	$stid2 = oci_parse($conn,$sql2);
	oci_bind_by_name($stid2, ':prodCategory', $prodCategory);
	oci_execute($stid2);
	$row = oci_fetch_array($stid2, OCI_ASSOC);
	$category_ID = $row['CAT_ID'];

	$sql3 = 'INSERT INTO Product(PRODUCT_ID,PRODUCT_NAME,PRICE,PRODUCT_DETAILS,PRODUCT_IMAGE,PRODUCT_STATUS,FK1_CAT_ID,FK2_SHOP_ID,FK3_USER_ID,ALLERGY_INFORMATION,PRODUCT_STOCK) VALUES(null,:prodName,:prodPrice,:prodDetails,:prodImage, :prodStatus,:category_ID,:shop_ID,:user_id,:allery_info,:prod_Stock)';

	$stid3 = oci_parse($conn,$sql3);

	// oci_bind_by_name($stid2, ':cat_ID', $cat_ID);
	oci_bind_by_name($stid3, ':prodName', $prodName);
	oci_bind_by_name($stid3, ':prodPrice', $prodPrice);
	oci_bind_by_name($stid3, ':prodDetails', $prodDetails);
	oci_bind_by_name($stid3, ':prodImage', $prodImage);
	oci_bind_by_name($stid3, ':prodStatus', $prodStatus);
	oci_bind_by_name($stid3, ':category_ID', $category_ID);
	oci_bind_by_name($stid3, ':shop_ID', $shop_ID);
	oci_bind_by_name($stid3, ':user_id', $user_id);
	oci_bind_by_name($stid3, ':allery_info', $allery_info);
	oci_bind_by_name($stid3, ':prod_Stock', $prod_Stock);

	if(oci_execute($stid3))
	{
		// echo 'Product Added!';
		echo '<script>alert("Product Added!")</script>';
	}



}
?>
</html>