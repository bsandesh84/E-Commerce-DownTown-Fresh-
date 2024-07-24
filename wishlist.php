<?php
include_once('connect.php');
$usertype = "customer";
$empty = "";


$sql = 'INSERT INTO WISHLIST (W_ID, NO_OF_ITEMS) VALUES(100, 0)';

$stid = oci_parse($conn,$sql);

if(oci_execute($stid))
{
echo "Added successfully!";

}
else{
echo "Something went wrong tru again!";
}

?>