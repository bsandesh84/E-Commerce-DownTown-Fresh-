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

            echo "<hr>";

            echo"<div class='cart-header'>";                        
          echo"<span class='cart-image'>Image</span>";
          echo"<span class='cart-title'>Type</span>";
          echo"<span class='cart-title'>Trader Entry Date</span>";
          echo"<span class='cart-remove'>Confirm Trader</span>";      
         echo"<span class='cart-remove'>Restrict Trader</span>"; 

         // echo"<div class='cart-header'>";                        
         //  echo"<span class='cart-image'>Item</span>";
         //  echo"<span class='cart-title'>Item Name</span>";
         //  echo"<span class='cart-details'>Item description</span>";
         //  echo"<span class='cart-price'>Price</span>";
         //  echo"<span class='cart-remove'>Confirm</span>";      
         // echo"<span class='cart-remove'>Restrict</span>";       

      echo"</div>"; 

            $sql1 = 'SELECT * FROM TRADER WHERE WARNING_COUNT > 3';
            $stid1 = oci_parse($conn,$sql1);

            oci_execute($stid1);
            $row = oci_fetch_array($stid1, OCI_ASSOC);
            
            if (oci_execute($stid1)>0){
        while ($row=oci_fetch_array($stid1, OCI_ASSOC)){
            $TRADER_ID = $row['TRADER_ID'];
            $USER_ID = $row['USER_ID'];


            ?>
            <form action = '' method = 'POST'>
            <?php    
                    echo"<div class='cart-row'>"; 

                    echo"<div><input type = 'hidden' id = 'TRADER_ID' name = 'TRADER_ID' value = '$TRADER_ID'></div>";
                
                echo"<div><input type = 'hidden' id = 'USER_ID' name = 'USER_ID' value = '$USER_ID'></div>";
                echo "<div class = 'cart-image'><img src ='Images/" . $row['TPROFILEIMAGE'] . "' height = 100 width = 100></div></div>";
                    echo "<div class = 'cart-title'>" .$row['TYPE']. "</div>";
                    echo "<div class = 'cart-details'>" .$row['TENTRY_DATE']. "</div>";
                    
                    
                    echo"<div class='cart-remove'> <button  type='submit' id = 'btnConfirm' name='btnConfirm'>Deactivate</button></div>";

            echo "</div>";
            
echo"</form>";

           }

            }

            echo "<hr>";
            
            ?>

           </body>

           <?php

                if (isset($_POST['btnConfirm'])){

                    $trader_id = $_POST['TRADER_ID'];
                    $USER_ID = $_POST['USER_ID'];
                    $status = "deactivated";

                    $sql = 'UPDATE Users SET USER_STATUS = :status WHERE USER_ID = :USER_ID';

                    $stid = oci_parse($conn,$sql);
                    oci_bind_by_name($stid, ':USER_ID', $USER_ID);
                    oci_bind_by_name($stid, ':status', $status);

                    if(oci_execute($stid)){

                        echo '<script>alert("Trader Deactivated!")</script>';


                    }
                }


           ?>
           <div class='admin-back'><button type='submit' onclick="window.location.href='adminDashboard.php';"> Back To Dashboard </button>
</html>