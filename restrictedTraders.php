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

            echo "<hr>";

            echo"<div class='cart-title'>"; 
             echo"<span class='cart-quantity'>Trader</span>";                       
          echo"<span class='cart-quantity'>User ID</span>";
          echo"<span class='cart-quantity'>Trader ID</span>";
          echo"<span class='cart-quantity'>Trader Type</span>";
          echo"<span class='cart-quantity'>Trader Entry Date</span>";
          // echo"<span class='cart-quantity'>Warning given</span>";    

      echo"</div>"; 

            $sql1 = 'SELECT * FROM TRADER WHERE WARNING_COUNT = -2';
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

                    echo "<div class = 'cart-price'><img src ='Images/Profile.jpg' height = 100 width = 100></div>";
                    echo "<div class = 'cart-price'>" .$row['USER_ID']. "</div>";
                    echo "<div class = 'cart-price'>" .$row['TRADER_ID']. "</div>";
                
                    echo "<div class = 'cart-price'>" .$row['TYPE']. "</div>";
                    echo "<div class = 'cart-price'>" .$row['TENTRY_DATE']. "</div>";
                    // echo "<div class = 'cart-price'>" .$row['WARNING_COUNT']. "</div>";
                    

            echo "</div>";
            
echo"</form>";

           }

            }

            echo "<hr>";
            
            ?>

            <div class='admin-back'><button type='submit' onclick="window.location.href='adminDashboard.php';"> Back To Dashboard </button>

           </body>

           
</html>