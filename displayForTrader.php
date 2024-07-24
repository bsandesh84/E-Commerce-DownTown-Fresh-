<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Products</title>
        <style type="text/css">
            
img {
    width: 75px;
    height: 60px;
    border-radius: 10px;
}

a{
    height: 34px;
      width: 75px;
      color: black;
      background-color: #cbaab2;
      border: none;
      border-radius: .3em;
      font-weight: bold;
      font-family: 'Delius', sans-serif;
      padding-top: 5px;
      padding-bottom: 5px;
      padding-left: 5px;
      padding-right: 3px;
      /*margin-top: 20px;*/
  }
  
  a:hover{
      background-color: #d4a1ad;
  
  }

  td{
      padding: 25px;
  }
            
        </style>
</head>
<body bgcolor="#FFF5F4">

<?php
session_start();
include "connect.php";
 $sessionid = $_SESSION['ID'];
$user_id = $sessionid['USER_ID'];
$sql1 = 'SELECT * FROM Product WHERE FK3_USER_ID = :user_id';
    $stid1 = oci_parse($conn,$sql1);
    oci_bind_by_name($stid1, ':user_id', $user_id);

    oci_execute($stid1);
    $row = oci_fetch_array($stid1, OCI_ASSOC);

echo "<table cellpadding = 10>";
    echo "<tr>";
        echo "<td width = 100>Product Image</td>";
        echo "<td width = 100>Price</td>";
        echo "<td>Details</td>";
        echo "<td>Product Name</td>";
        echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;🗹</td>";
        echo "<td>&nbsp;&nbsp;&nbsp;✎</td>";
        echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;⨯</td>";
        echo "<td>&nbsp;&nbsp;&nbsp;✎</td>";
        // echo "<td width = 100>Delete</td>";
       
    echo"</tr>";
    

    if (oci_execute($stid1)>0){
        while ($row=oci_fetch_array($stid1, OCI_ASSOC)){
            $id = $row['PRODUCT_ID'];
        
    echo "<tr>";
    echo "<td><img src ='Images/" . $row['PRODUCT_IMAGE'] . "' height = 120 width = 120></td>";
        echo "<td>" .$row['PRODUCT_NAME']. "</td>";
        echo "<td>" .$row['PRICE']. "</td>";
         echo "<td>" .$row['PRODUCT_DETAILS']. "</td>";
        
          echo '<td><a href = "addOffers.php?id=' .$row['PRODUCT_ID'].'">Offer</a></td>';
           echo '<td><a href = "updateOffers.php?id=' .$row['PRODUCT_ID'].'">Offer</a></td>';
        echo '<td><a href = "removeProduct.php?id=' .$row['PRODUCT_ID'].'">Product</a></td>';
        echo '<td><a href = "updateProduct.php?id=' .$row['PRODUCT_ID'].'">Product</a></td>';
        // echo '<td><a href="deleteProduct.php?id=' .$row['ProductID'].'">Delete</a></td>';
    echo"</tr>";
        }
    }
    echo "</table>";

    
                
                

            
            
            
?>

