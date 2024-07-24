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
          echo"<span class='cart-title'>First Name</span>";
          echo"<span class='cart-title'>Last Name</span>";
          echo"<span class='cart-title'>Address</span>";
          echo"<span class='cart-title'>Username</span>";
          echo"<span class='cart-title'>Email</span>";      
         echo"<span class='cart-title'>Phone Number</span>";       

      echo"</div>"; 

      echo "<hr>";
        $type = "trader";

            $sql1 = 'SELECT * FROM Users WHERE USER_TYPE = :type';
            $stid1 = oci_parse($conn,$sql1);
            oci_bind_by_name($stid1, ':type', $type);

            oci_execute($stid1);
            $row = oci_fetch_array($stid1, OCI_ASSOC);
            
            if (oci_execute($stid1)>0){
        while ($row=oci_fetch_array($stid1, OCI_ASSOC)){
            $USERNAME = $row['USERNAME'];
            $EMAIL = $row['EMAIL'];
            $PHONENUM = $row['PHONENUM'];
            $FIRSTNAME= $row['FIRSTNAME'];
            $LASTNAME = $row['LASTNAME'];
            $ADDRESS = $row['ADDRESS'];


            ?>
            <form action = '' method = 'POST'>
            <?php    
                    echo"<div class='cart-row'>"; 
                
                // echo"<div><input type = 'hidden' id = 'USER_ID' name = 'USER_ID' value = '$USER_ID'></div>";
                echo "<div class = 'cart-title'>" .$row['FIRSTNAME']. "</div>";
                echo "<div class = 'cart-title'>" .$row['LASTNAME']. "</div>";
                echo "<div class = 'cart-title'>" .$row['ADDRESS']. "</div>";

                    echo "<div class = 'cart-title'>" .$row['USERNAME']. "</div>";
                    echo "<div class = 'cart-title'>" .$row['EMAIL']. "</div>";
                    echo "<div class = 'cart-title'>" .$row['PHONENUM']. "</div>";
                    
                    // echo"<div class='cart-remove'> <button  type='submit' id = 'btnConfirm' name='btnConfirm'>Confirm</button></div>";
                    
                    // echo"<div class='cart-remove'> <button  type='submit' id = 'btnRemove' name='btnRemove'>Cancel</button></div>";

            echo "</div>";
            
echo"</form>";

           }

            }

            echo "<hr>";
            
            ?>

           </body>

           <div class='admin-back'><button type='submit' onclick="window.location.href='adminDashboard.php';"> Back To Dashboard </button>
</html>