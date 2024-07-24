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
        <link rel="stylesheet" href="displayUnverifiedProducts.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
   rel="stylesheet" />
    </head>

<body>

        <section id="cart" class="section-p1">
            <?php
            include "connect.php";

            

            echo"<div class='cart-header'>";                        
          echo"<span class='cart-image'>Item</span>";
          echo"<span class='cart-title'>Item Name</span>";
          echo"<span class='cart-details'>Item description</span>";
          echo"<span class='cart-price'>Price</span>";
          echo"<span class='cart-remove'>Confirm</span>";      
         echo"<span class='cart-remove'>Restrict</span>";       

      echo"</div>"; 
      echo "<hr>";
      $status = "not verified";

            $sql1 = 'SELECT * FROM PRODUCT WHERE PRODUCT_STATUS =:status';
            $stid1 = oci_parse($conn,$sql1);
            oci_bind_by_name($stid1, ':status', $status);

            oci_execute($stid1);
            $row = oci_fetch_array($stid1, OCI_ASSOC);
            
            if (oci_execute($stid1)>0){
        while ($row=oci_fetch_array($stid1, OCI_ASSOC)){

            $PRODUCT_ID = $row['PRODUCT_ID'];


            ?>
            <form action = '' method = 'POST'>
            <?php    
                    echo"<div class='cart-row'>"; 

                    echo"<div><input type = 'hidden' id = 'PRODUCT_ID' name = 'PRODUCT_ID' value = '$PRODUCT_ID'></div>";
                    echo"<div class = 'cart-image'><img src ='Images/" . $row['PRODUCT_IMAGE'] . "' height = 100 width = 100></div>";
                    echo "<div class = 'cart-title'>" .$row['PRODUCT_NAME']. "</div>";
                    echo "<div class = 'cart-details'>" .$row['PRODUCT_DETAILS']. "</div>";
                    echo "<div class = 'cart-price'>" .$row['PRICE']. "</div>";
                    
                    echo"<div class='cart-remove'> <button  type='submit' id = 'btnConfirm' name='btnConfirm'>Confirm</button></div>";
                    
                    echo"<div class='cart-remove'> <button  type='submit' id = 'btnRemove' name='btnRemove'>Restrict</button></div>";

            echo "</div>";
            
echo"</form>";

           }

            }

            echo "<hr>";
            
            ?>

           </body>

           <?php

                if (isset($_POST['btnConfirm'])){

                    $PRODUCT_ID = $_POST['PRODUCT_ID'];
                    $update_status = "verified";

                    $sql = 'UPDATE PRODUCT SET PRODUCT_STATUS = :update_status WHERE PRODUCT_ID = :PRODUCT_ID';

                    $stid = oci_parse($conn,$sql);
                    oci_bind_by_name($stid, ':PRODUCT_ID', $PRODUCT_ID);
                    oci_bind_by_name($stid, ':update_status', $update_status);

                    if(oci_execute($stid)){

                        echo '<script>alert("Product Approved!")</script>';
                        echo '<script>alert("Shop Approved!")</script>';
                        echo '<script>alert("Category Approved!")</script>';


                    }
                }

                if (isset($_POST['btnRemove'])){

                    $PRODUCT_ID = $_POST['PRODUCT_ID'];
                    $update_status = "disapproved";

                    $sql = 'UPDATE PRODUCT SET PRODUCT_STATUS = :update_status WHERE PRODUCT_ID = :PRODUCT_ID';

                    $stid = oci_parse($conn,$sql);
                    oci_bind_by_name($stid, ':PRODUCT_ID', $PRODUCT_ID);
                    oci_bind_by_name($stid, ':update_status', $update_status);

                    if(oci_execute($stid)){

                        echo '<script>alert("Product Disapproved!")</script>';



                    }
                }


           ?>
           <div class='admin-back'><button type='submit' onclick="window.location.href='adminDashboard.php';"> Back To Dashboard </button>
</html>