<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Customer Registration | DownTown Fresh </title>
	<link rel="stylesheet" type="text/css" href="addShop.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
	<link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
   rel="stylesheet" />
   <!-- <script src="contact.js" async></script> -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body style="background-color: #cde3f5">


<div class="contact">
					
	<form onsubmit = "return ValidateForm()" method="post" action="#" >
		<h2>Open a shop</h2>

		<label for="shopName">Shop Name</label>
	    <input type="text" id="shopName" name="shopName" placeholder="Your product name..." required="required">

	    <label for="shopDescription">Shop Description</label>
	    				<!-- <input type="text" id="prodDetails" name="prodDetails" placeholder="Your product details..." required="required"> -->
	    <textarea id="shopDescription" name="shopDescription" placeholder="Write something...." rows="4" cols="50"></textarea>

	    <label for="catName">Category Name</label>
	    <input type="text" id="catName" name="catName" placeholder="Your category name..." required="required">

	    <label for="catImage">Category Image</label>
	    <input type="text" id="catImage" name="catImage" placeholder="Your category image..." required="required">
						
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
	$shopName = $_POST['shopName'];
	$shopDescription = $_POST['shopDescription'];
	$catName = $_POST['catName'];
	$catImage = $_POST['catImage'];

	// $query1 = 'SELECT MAX(SHOP_ID) FROM SHOP';
	// $query = oci_parse($conn,$query1);
	// oci_execute($query);
	// $row = oci_fetch_array($query, OCI_ASSOC);
	// echo $row[0];

	// $query2 = 'SELECT MAX(cat_ID) FROM Category';

	// $shopID = intval($row);
	// echo '$shopID:';
	// echo $shopID;
	// echo 'end of shopID';
	// //echo '$shopID';
	// //echo $shopID;
	// $catID = intval($query2);
	// //echo $catID;
	// $shop_ID = $shopID + 1;
	// echo '$shop_ID:';
	// echo $shop_ID;
	// echo 'end of shop_ID';
	// $cat_ID = $catID + 1; 

	$sql = 'INSERT INTO SHOP(SHOP_ID,SHOP_NAME,SHOP_DESCRIPTION,FK1_USER_ID) VALUES(null, :shopName,:shopDescription,:user_id)';

	$stid = oci_parse($conn,$sql);

	oci_bind_by_name($stid, ':shopName', $shopName);
	oci_bind_by_name($stid, ':shopDescription', $shopDescription);
	oci_bind_by_name($stid, ':user_id', $user_id);

	if(oci_execute($stid))
	{
		//echo 'Shop Added!';
		echo '<script>alert("Shop Added!")</script>';
	}
	
	$sql2 = 'INSERT INTO Category(CAT_ID,CAT_NAME,FK1_SHOP_ID,CAT_IMAGE) VALUES(null, :catName,null,:catImage)';

	$stid2 = oci_parse($conn,$sql2);

	// oci_bind_by_name($stid2, ':cat_ID', $cat_ID);
	oci_bind_by_name($stid2, ':catName', $catName);
	oci_bind_by_name($stid2, ':catImage', $catImage);
	// oci_bind_by_name($stid2, ':shopID', $shopID);

	if(oci_execute($stid2))
	{
		//echo 'Category Added!';
		echo '<script>alert("Category Added!")</script>';
	}


}


?>
</html>