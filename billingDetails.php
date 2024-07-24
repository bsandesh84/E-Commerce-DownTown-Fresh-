<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>
    <link rel="stylesheet" href="billingDetails.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
   rel="stylesheet" />

</head>

<body>
    <div class="page">
        <p>Cart > Billing Details</p>
    
        <div class="box">
            <div class="box1">
                <p>1. Shopping Cart</p>
            </div>
            <div class="box2">
                <p>2. Billing Details</p>
            </div>
        </div>
    </div>
    <br>
    <div class="page2">

        <div class="block">
            <form method="POST" action="sandbox.php">

            <div class="con">Collection Details
                <hr>
                <div class="form">
                    <input type="text" id ='email' name = 'email' placeholder="Enter you email......" required="required">
                    
                    <input type="text" id='phoneum' name ='phonenum' placeholder="Enter your phone number......." required="required">
                </div>
            </div>

            <hr>
                
            <div class = "collection2">
                <!-- <div class="border"> -->
                <!-- <div class = "collectiona"> -->
                    <!-- <input type="radio" id="nextday" name="nextday" value="0">
                    <label for="nextday">Next Day Collection</label>
                    <section>24 hours after checkout</section> -->
                    <?php
                    $current_time = date("D");
                    // echo $current_time;
                    ?>

                    <select class = "collectiona" name="time_Slot" id="time_Slot" required="required">
                    <?php
                        // if (($current_time == '10') ||($current_time == '11') || ($current_time == '12') || ($current_time == '13')){
                        //     echo"<option value='0'>Select your collection time</option>";
                        //     echo"<option value='13-16'>13-16</option>";
                        //     echo"<option value='16-19'>16-19</option>";
                        // }

                        // if (($current_time == '13') || ($current_time == '14') || ($current_time == '15') || ($current_time == '16')){
                        //     echo"<option value='0'>Select your collection time</option>";
                        //     echo"<option value='10-13'>10-13</option>";
                        //     echo"<option value='16-19'>16-19</option>";
                        // }

                        // if (($current_time == '19') || ($current_time == '20') || ($current_time == '21') || ($current_time == '22')){
                        //     echo"<option value='0'>Select your collection time</option>";
                        //     echo"<option value='10-13'>10-13</option>";
                        //     echo"<option value='13-16'>13-16</option>";
                        // }

                    

                            echo"<option value='0'>Select your collection time</option>";
                            echo"<option value='10-13'>10-13</option>";
                            echo"<option value='13-16'>13-16</option>";
                            echo"<option value='16-19'>16-19</option>";

                        
                    ?>
                                                <br><br>
                    </select>

                 &nbsp;&nbsp;
                <?php

                    // $tomorrow = date('l', strtotime("+1 day"));
                    // echo $tommorow;
                ?>
                <div class = "collectionb">

                    <select class = "collectiona" name="day_Slot" id="day_Slot" required="required">
                        <?php

                        $today = date("D");
                        // $today = "Tue";

                        if ($today = "Tue"){

                        echo"<option value=''>Choose Your Collection Day</option>";
                        echo"<option value='Wednesday'>Wednesday</option>";
                        echo"<option value='Thursday'>Thursday</option>";
                        echo"<option value='Friday'>Friday</option>";

                        }

                        if ($today == 'Wed'){

                        echo"<option value=''>Choose Your Collection Day</option>";
                        echo"<option value='Thursday'>Thursday</option>";
                        echo"<option value='Friday'>Friday</option>";
                        echo"<option value='Next Wednesday'>Next Wednesday</option>";

                        }

                        else if ($today == 'Thu'){

                        echo"<option value=''>Choose Your Collection Day</option>";
                        echo"<option value='Friday'>Friday</option>";
                        echo"<option value='Next Wednesday'>Next Wednesday</option>";
                        echo"<option value='Next Thursday'>Next Thursday</option>";
                        echo"<option value='Next Friday'>Next Friday</option>";

                        }

                        if ($today == 'Fri'){

                        echo"<option value=''>Choose Your Collection Day</option>";
                        echo"<option value='Next Wednesday'>Next Wednesday</option>";
                        echo"<option value='Next Thursday'>Next Thursday</option>";
                        echo"<option value='Next Friday'>Next Friday</option>";

                        }

                        ?>
                       

                        <br><br>
                    </select> &nbsp;
                    <!-- <input type="date" id="collection_date" name="collection_date"> -->

                    <!-- <label for="html">Select your time</label> -->
                </div>

            </div>

            <hr>

            <p>Payment Method</p>

            <hr>

            <div class="payment">
                <div >
                    <input type="radio" id="paymethod" name="paymethod" value="PayPal">
                    <label for="paymethod">PayPal</label>
                    <p>It is an online payments system that support online money transfers, and serves as an electronic alternative to traditional paper methods such as checks and money orders.</p>
                </div>

                <img src="Images/paypal.png" width=70px height=70px>

            </div>
            <hr>

   
        </div>

    <div class="gap"></div>
            
    <div class="block1">Summary<hr>
        <?php
            include "connect.php";
            $sessionid = $_SESSION['ID'];
            $user_id = $sessionid['USER_ID'];

            $sql1 = 'SELECT DISTINCT PRODUCT_IMAGE,PRODUCT_NAME,CART_DETAILS_PRICE FROM PRODUCT,CART_DETAILS,USERS,CART WHERE PRODUCT_ID=FK2_PRODUCT_ID AND CART_ID = FK1_CART_ID AND FK1_USER_ID = :user_id';
            $stid1 = oci_parse($conn,$sql1);
            oci_bind_by_name($stid1, ':user_id', $user_id);

            oci_execute($stid1);
            $row = oci_fetch_array($stid1, OCI_ASSOC);

            

            if (oci_execute($stid1)>0){
            while ($row=oci_fetch_array($stid1, OCI_ASSOC)){
            // $prod_id = $row['PRODUCT_ID'];
            // $price = $row['PRICE'];
   
                echo"<div class='cart-row'>"; 

                    echo"<div class = 'cart-image'><img src ='Images/" . $row['PRODUCT_IMAGE'] . "' height = 100 width = 100>
                    </div>";

                    echo"<div class = 'cart-name'>";
                        echo "<b><div class = 'cart-item'>" .$row['PRODUCT_NAME']. "</div></b>";
                        echo "<div class = 'cart-price'>$".$row['CART_DETAILS_PRICE']. "</div>";
                    echo "</div>";

                echo "</div>";
          
           }

            }

            $sessionid = $_SESSION['ID'];
            $user_id = $sessionid['USER_ID'];

            $sql = 'SELECT TOTAL_PRICE FROM CART WHERE FK1_USER_ID = :user_ID';
            $stid = oci_parse($conn,$sql);
            oci_bind_by_name($stid, ':user_id', $user_id);
            oci_execute($stid);

            $row = oci_fetch_array($stid, OCI_ASSOC);
            $price = $row['TOTAL_PRICE'];
            $tax =13;
            $total = $price+$tax;
            

            if(oci_execute($stid)){

                echo "<div class = 'subtotal'>Summary<div class = 'cartTotal'>$price</div></div>";
                echo "<div class = 'taxes'>Taxes<div class = 'tax'>$13</div></div>";
                echo "<hr>";

                // echo "<div class = 'Order'><p>TOTAL</p>".$total*$tax."</div>";

                echo $total;
                echo"<hr>";

            }

            $_SESSION['pay'] = $total;


            ?>

        <div class='cart-next'>
            <div class="button1">
                <button type='submit' id = 'btnSubmit' name = 'btnSubmit1'> Confirm Details </button>
            </div>
<!--         </form>

        <form method="POST" action="sandbox.php"> -->

            <!-- <div class='cart-next'> -->
                <div class="button1">
                    <button type='submit' id = 'btnSubmit1' name = 'btnSubmit1'> Pay Now </button>
                </div>
                
            </div>
            <?php 
                $_SESSION['pay'] = $total;
            ?>
        </form>

        
    </div>
</div>


</body>
</html>
