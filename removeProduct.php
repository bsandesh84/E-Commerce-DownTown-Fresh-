<?php
session_start();
include('connect.php');

	$id = $_SESSION['ID'];
	$user_id = $id['USER_ID'];
	$prod_id = $_GET['id'];

	$sql1 = 'DELETE FROM CART_DETAILS WHERE FK2_PRODUCT_ID = :prod_id';
	$sql2 = 'DELETE FROM OFFER WHERE FK1_PRODUCT_ID = :prod_id';
	$sql3 = 'DELETE FROM ORDER_DETAILS WHERE FK2_PRODUCT_ID = :prod_id';
	$sql4 = 'DELETE FROM REVIEW WHERE FK1_PRODUCT_ID = :prod_id';
	$sql5 = 'DELETE FROM WISHLIST_DETAILS WHERE FK1_PRODUCT_ID = :prod_id';
	$sql6 = 'DELETE FROM PRODUCT WHERE PRODUCT_ID = :prod_id';

    $stid1 = oci_parse($conn,$sql1);
    oci_bind_by_name($stid1, ':prod_id', $prod_id);
    oci_execute($stid1);

	if(oci_execute($stid1))
	{
			echo 'CART_DETAILS Removed!';
	}

    $stid2 = oci_parse($conn,$sql2);
    oci_bind_by_name($stid2, ':prod_id', $prod_id);
    oci_execute($stid2);

	if(oci_execute($stid2))
	{
			echo 'OFFER Removed!';
	}

    $stid3 = oci_parse($conn,$sql3);
    oci_bind_by_name($stid3, ':prod_id', $prod_id);
    oci_execute($stid3);

	if(oci_execute($stid3))
	{
			echo 'ORDER_DETAILS Removed!';
	}

    $stid4 = oci_parse($conn,$sql4);
    oci_bind_by_name($stid4, ':prod_id', $prod_id);
    oci_execute($stid4);

	if(oci_execute($stid4))
	{
			echo 'REVIEW Removed!';
	}

    $stid5 = oci_parse($conn,$sql5);
    oci_bind_by_name($stid5, ':prod_id', $prod_id);
    oci_execute($stid5);

	if(oci_execute($stid5))
	{
			echo 'WISHLIST_DETAILS Removed!';
	}


	
    $stid6 = oci_parse($conn,$sql6);
    oci_bind_by_name($stid6, ':prod_id', $prod_id);
    oci_execute($stid6);

	if(oci_execute($stid6))
	{
		echo 'Product Removed!';
		header("location:displayForTrader");
	}

?>
</html>