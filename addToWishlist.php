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

            $sql = 'SELECT * FROM WISHLIST WHERE FK1_USER_ID =:user_id';
            $stid = oci_parse($conn,$sql);
            oci_bind_by_name($stid, ':user_id', $user_id);
            oci_execute($stid);
            $row1 = oci_fetch_array($stid, OCI_ASSOC);
            $wishlist_ID = $row1['W_ID'];


            $id = $_GET['id'];

            $sql2 = 'INSERT INTO WISHLIST_DETAILS(PW_ID,QUANTITY,FK1_PRODUCT_ID,FK2_W_ID) VALUES (null,1,:id,:wishlist_ID)  ';
            $stid2 = oci_parse($conn,$sql2);
            oci_bind_by_name($stid2, ':wishlist_ID', $wishlist_ID);
            oci_bind_by_name($stid2, ':id', $id);
            if(oci_execute($stid2)){

                // echo 'Wishlist Added!';
                echo '<script>alert("Wishlist Added!")</script>';

                $query = 'SELECT * FROM WISHLIST_DETAILS, WISHLIST WHERE FK2_W_ID = W_ID AND FK1_USER_ID = :user_id';
                    $stid1 = oci_parse($conn,$query);
                    oci_bind_by_name($stid1, ':user_id', $user_id);
                    oci_execute($stid1);
                    $row = oci_fetch_array($stid1, OCI_ASSOC);
                    $total_quantity_of_wishlist = 0;
                    if (oci_execute($stid1)>0){

                        while ($row=oci_fetch_array($stid1, OCI_ASSOC)){

                            $total_quantity = oci_result($stid1, 'QUANTITY');
                            $total_quantity_of_wishlist = $total_quantity + $total_quantity_of_wishlist;

                        }

                    }


                    $sql2 = 'UPDATE WISHLIST SET NO_OF_ITEMS = :total_quantity_of_wishlist WHERE FK1_USER_ID = :user_id';

                    $stid2 = oci_parse($conn,$sql2);
                    oci_bind_by_name($stid2, ':total_quantity_of_wishlist', $total_quantity_of_wishlist);
                    oci_bind_by_name($stid2, ':user_id', $user_id);

                    if(oci_execute($stid2)){
                        
                        header("location:displayForCustomer.php");
                        echo '<script>alert("Wishlist quantity updated!")</script>';

                    }

    
            }
           
            ?>
        </section></body></html>
             
           

    