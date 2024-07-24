<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shopping Cart</title>
        <link rel="stylesheet" href="addToCart.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
   rel="stylesheet" />
    </head>
    <body>
        <section id="cart" class="section-p1">
            <?php
            include "connect.php";
            $sessionid = $_SESSION['ID'];
            $user_id = $sessionid['USER_ID'];

            $sql = 'SELECT CART_ID FROM CART WHERE FK1_USER_ID =:user_id';
            $stid = oci_parse($conn,$sql);
            oci_bind_by_name($stid, ':user_id', $user_id);
            oci_execute($stid);
            $row1 = oci_fetch_array($stid, OCI_ASSOC);
            $cart_ID = $row1['CART_ID'];


            $id = $_GET['id'];
            $sql1 = 'SELECT * FROM Product WHERE PRODUCT_ID = :id';
            $stid1 = oci_parse($conn,$sql1);
            oci_bind_by_name($stid1, ':id', $id);
            oci_execute($stid1);
            $row = oci_fetch_array($stid1, OCI_ASSOC);

            $PRODUCT_DETAILS = $row['PRODUCT_DETAILS'];
            $PRODUCT_IMAGE = $row['PRODUCT_IMAGE'];
            $pname = $row['PRODUCT_NAME'];
            $PRICE = $row['PRICE'];

            $sql3 = 'SELECT * FROM OFFER WHERE FK1_PRODUCT_ID = :id';
            $stid3 = oci_parse($conn,$sql3);
            oci_bind_by_name($stid3, ':id', $id);
            oci_execute($stid3);
            $row2 = oci_fetch_array($stid3, OCI_ASSOC);

            $offer = $row2['OFFER_RATE'];
            $discount_price = $PRICE - $offer;


            $res = false;
            $sql3 = 'SELECT * FROM CART_DETAILS WHERE FK2_PRODUCT_ID = :id';
            $stid3 = oci_parse($conn,$sql3);
            oci_bind_by_name($stid3, ':id', $id);
            oci_execute($stid3);
            // $row2 = oci_fetch_array($stid3, OCI_ASSOC);
            $numrows = oci_fetch_all($stid3, $res);

                 
            $sql2 = 'INSERT INTO CART_DETAILS(CD_ID,QUANTITY,CART_DETAILS_PRICE,FK1_CART_ID,FK2_PRODUCT_ID) VALUES (null,1,:discount_price,:cart_ID,:id)  ';
            $stid2 = oci_parse($conn,$sql2);
            oci_bind_by_name($stid2, ':discount_price', $discount_price);
            // oci_bind_by_name($stid2, ':product_status', $product_status);
            oci_bind_by_name($stid2, ':cart_ID', $cart_ID);
            oci_bind_by_name($stid2, ':id', $id);
            if(oci_execute($stid2)){
                
                // echo '<td><a href = "addToOrder.php?id=' .$row['PRODUCT_ID'].'">Go to Cart</a></td>';
                header("addToOrder.php?id=$id");
                echo '<script>alert("Product Added!")</script>';
                header("location:displayForCustomer.php");
                

        }

            ?>
        </section></body></html>
             
           

    