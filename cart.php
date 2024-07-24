<?php
include_once('connect.php');
$usertype = "customer";
$empty = "";


$sql = 'INSERT INTO CART (CART_ID, NO_OF_ITEMS,TOTAL_PRICE) VALUES(001, 0, 0)';

$stid = oci_parse($conn,$sql);

if(oci_execute($stid))
{
echo "Added successfully!";

}
else{
echo "Something went wrong tru again!";
}

?>