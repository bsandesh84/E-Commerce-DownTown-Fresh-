<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart</title>
        <link rel="stylesheet" href=".css">
</head>
<body>

<?php

include "connect.php";
$verified = "verified";
$sql1 = 'SELECT * FROM Product WHERE PRODUCT_STATUS = :verified';
    $stid1 = oci_parse($conn,$sql1);
    oci_bind_by_name($stid1, ':verified', $verified);
    oci_execute($stid1);
    $row = oci_fetch_array($stid1, OCI_ASSOC);

echo "<table border= 1 cellpadding =10 >";
    echo "<tr>";
        echo "<td width = 100>Product Name</td>";
        echo "<td width = 100>Price</td>";
        echo "<td>Details</td>";
        echo "<td>Images</td>";
        echo "<td>Add Review</td>";
        echo "<td>Add To wishlist</td>";
        echo "<td width = 100>Add To Cart</td>";
        // echo "<td width = 100>Delete</td>";
    echo"</tr>";

    if (oci_execute($stid1)>0){
        while ($row=oci_fetch_array($stid1, OCI_ASSOC)){
            $id = $row['PRODUCT_ID'];
        
    echo "<tr>";
        echo "<td>" .$row['PRODUCT_NAME']. "</td>";
        echo "<td>" .$row['PRICE']. "</td>";
         echo "<td>" .$row['PRODUCT_DETAILS']. "</td>";
        echo "<td><img src ='Images/" . $row['PRODUCT_IMAGE'] . "' height = 100 width = 100></td>";
          echo '<td><a href = "addReview.php?id=' .$row['PRODUCT_ID'].'">Add Review</a></td>';
           echo '<td><a href = "addToWishlist.php?id=' .$row['PRODUCT_ID'].'">Add To wishlist</a></td>';
        echo '<td><a href = "addToCart.php?id=' .$row['PRODUCT_ID'].'">Add To Cart</a></td>';
        // echo '<td><a href="deleteProduct.php?id=' .$row['ProductID'].'">Delete</a></td>';
    echo"</tr>";
        }
    }
    echo "</table>";        
?>

