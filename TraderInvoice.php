<?php 
    session_start();
    include_once('connect.php');

    if(isset($_GET['token'])){
        $token = $_GET['token'];
        // $email = $_SESSION['email'];
        $sessionid = $_SESSION['ID'];
        $user_id = $sessionid['USER_ID'];


}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>
    <link rel="stylesheet" type="text/css" href="traderInvoice.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
   rel="stylesheet" />



</head>

<body>
    <div class="block">
        <div class="block1">
            <div>
                <h3>Bill From:</h3>
                <p>DownTown Fresh<br>
                    Jorpati-4, Kathmandu<br>
                    Nepal<br>
                    downtownfresh01@gmail.com</p>
            </div>
            <div class="image">
                <img src="Images/logo.png" width=180px height=180px>
            </div>
        </div>
        <hr>

        <div class="block2">
            <div class="bill">
                <?php


                $sql  = 'SELECT * FROM Users WHERE USER_ID = :user_id';
    
        $stid = oci_parse($conn,$sql);
        oci_bind_by_name($stid, ':user_id', $user_id);

        oci_execute($stid);
        $row = oci_fetch_array($stid, OCI_ASSOC);

        if (oci_execute($stid)>0){

            while ($row = oci_fetch_array($stid, OCI_ASSOC)){
                $FIRSTNAME = $row['FIRSTNAME'];
                $LASTNAME = $row['LASTNAME'];
                $ADDRESS = $row['ADDRESS'];
                $LASTNAME = $row['LASTNAME'];
                $EMAIL = $row['EMAIL'];
                echo"<h3>Bill To:</h3>";
                echo"<p>".$row['FIRSTNAME'].$row['LASTNAME']."<br>";
                echo $row['ADDRESS'];
                echo "<br>";
                echo $row['EMAIL'];
                echo"</p>";

        }
    }
                
                ?>
            </div>
            <div class="text">
                <div class="text1">
                    <?php
                   echo"<p>Invoice No</p>";
                   echo"<p>Invoice Date</p>";
                   ?>
                </div>
                <div class="text2">
                <?php

                $today = date('m/d/Y');
                // $invoice_no = rand(10,100);
                    echo"<p>".$user_id."</p>";
                     echo"<p>".$today."</p>";
                    ?>
                </div>
            </div>
        </div>
        <hr>
        <div class="block3">
            <?php

            echo"<table id='customers'>";
                echo"<tr>";
                    echo"<td>Item</td>";
                    echo"<td>Item Description</td>";
                    echo"<td>Quantity</td>";
                    echo"<td>Product Price</td>";
                    echo"<td>Discount Price </td>";
                    
                echo"</tr>";

            $sql2 = 'SELECT * FROM CART_DETAILS, PRODUCT WHERE FK2_PRODUCT_ID = PRODUCT_ID  AND FK3_USER_ID = :user_id';
            $stid2 = oci_parse($conn,$sql2);
oci_bind_by_name($stid2, 'user_id', $user_id);
            oci_execute($stid2);
            $row2 = oci_fetch_array($stid2, OCI_ASSOC);
            

            $PRICE = 0;

            if (oci_execute($stid2)>0){
        while ($row2=oci_fetch_array($stid2, OCI_ASSOC)){
            $PRODUCT_NAME = $row2['PRODUCT_NAME'];
            $PRODUCT_DETAILS = $row2['PRODUCT_DETAILS'];
            $CART_DETAILS_PRICE = $row2['CART_DETAILS_PRICE'];
            $QUANTITY = $row2['QUANTITY'];
            $PRICE = $PRICE + $CART_DETAILS_PRICE * $QUANTITY;
            echo"<tr>";
                echo"<th>".$row2['PRODUCT_NAME']."</th>";
                echo"<th>".$row2['PRODUCT_DETAILS']."</th>";
                echo"<th>".$row2['CART_DETAILS_PRICE']."</th>";
                echo"<td>".$row2['QUANTITY']."</td>";
                echo"<td>".$PRICE."</td>";
                // echo"<th>".$row2['QUANTITY']."</th>";
             
            echo"</tr>";
                    }
}
                

            echo"</table>";
            
            



?>
                
            <br>
            </div>
            <hr>
    
    </div>

</body>

</html>