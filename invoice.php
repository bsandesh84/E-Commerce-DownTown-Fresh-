<?php 
    session_start();
    include_once('connect.php');

    if(isset($_GET['token'])){
        $token = $_GET['token'];
        $email = $_SESSION['email'];
        $sessionid = $_SESSION['ID'];
        $user_id = $sessionid['USER_ID'];

        

    $sql1  = 'SELECT * FROM PAYMENT WHERE FK2_USER_ID = :user_id';
    
        $stid1 = oci_parse($conn,$sql1);
        oci_bind_by_name($stid1, ':user_id', $user_id);

        oci_execute($stid1);
        $row1 = oci_fetch_array($stid1, OCI_ASSOC);

        if (oci_execute($stid1)>0){

            while ($row1 = oci_fetch_array($stid1, OCI_ASSOC)){
                $TOTAL_PAYMENT = $row1['TOTAL_PAYMENT'];
                $today = date('l');
                $invoice_no = rand(10,100);

        }
    }

    $sql1  = 'SELECT * FROM CART WHERE FK1_USER_ID = :user_id';
    
        $stid1 = oci_parse($conn,$sql1);
        oci_bind_by_name($stid1, ':user_id', $user_id);

        oci_execute($stid1);
        $row1 = oci_fetch_array($stid1, OCI_ASSOC);

        if (oci_execute($stid1)>0){

            while ($row1 = oci_fetch_array($stid1, OCI_ASSOC)){
                $TOTAL_PRICE = $row1['TOTAL_PRICE'];

        }
    }




}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>
    <link rel="stylesheet" type="text/css" href="invoice.css">
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
                    downtownfresh@gmail.com</p>
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
                   echo"<p>Amount: </p>";?>
                </div>
                <div class="text2">
                <?php
                    echo"<p>".$invoice_no."</p>";
                     echo"<p>".$today."</p>";
                     echo"<p>".$TOTAL_PAYMENT."</p>";
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

                    $sql2 = 'SELECT * FROM PRODUCT,CART_DETAILS WHERE PRODUCT_ID=FK2_PRODUCT_ID';
            $stid2 = oci_parse($conn,$sql2);

            oci_execute($stid2);
            $row2 = oci_fetch_array($stid2, OCI_ASSOC);

            

            if (oci_execute($stid2)>0){
        while ($row2=oci_fetch_array($stid2, OCI_ASSOC)){
            $PRODUCT_NAME = $row2['PRODUCT_NAME'];
            $PRODUCT_DETAILS = $row2['PRODUCT_DETAILS'];
            $QUANTITY = $row2['QUANTITY'];
            $PRICE = $row2['PRICE'];
            $CART_DETAILS_PRICE = $row2['CART_DETAILS_PRICE'];
            echo"<tr>";
                    echo"<td>".$PRODUCT_NAME."</td>";
                    echo"<td>".$PRODUCT_DETAILS."</td>";
                    echo"<td>".$QUANTITY."</td>";
                    echo"<td>".$PRICE."</td>";
                    echo"<td>".$CART_DETAILS_PRICE."</td>";
                    
                echo"</tr>";
                    }
}
                

            echo"</table>";
            
            



?>
                
            <br>
            </div>
            <hr>
     
        <div class="block4">
            <div class="con">

                <div class="con1">
                    <p>SUBTOTAL</p>
                    <p>TAX</p>
                    <p>TOTAL</p>
                </div>
                <?php
                echo"<div class='con2'>";
                 echo"<p>".$TOTAL_PRICE."</p>";
                 echo"<p></p>";
                echo"<p>".$TOTAL_PAYMENT."</p>";
                echo"</div>";
                ?>
            </div>
        </div>
        <hr width=1210px;>

        <div class="block5">
            <p>Tax Summary</p>
        </div>
        <hr>
        <div class="block6">
            <div class="des">
                <div class="des1">
                    <p>Rate</p>
                    <p>Goods and Services Tax(GST)</p>

                </div>
                <div class="des2">
                    <p>Tax</p>
                    <p>13</p>

                </div>
                <div class="des3">
                    <p>Net</p>
                    <?php
                    echo"<p>".$TOTAL_PAYMENT."</p>";
                    ?>

                </div>
            </div>
        </div>
    </div>







</body>

</html>