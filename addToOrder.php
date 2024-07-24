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

        <div class ="header">
        <!-- <input type="checkbox" name="" id="toggler" />
        <label for="toggler" class="fas fa-bars"></label> -->
    <img src="Images/logo.png" alt="DownTown Fresh" width=6%>
    <nav class="navbar">
            <a href="homepage.php">Home</a>
                <a href="about.php">About Us</a>
                <a href="displayForCustomer.php">Shop</a>
                <a href="help.php">Help</a>
                <a href="recentOrders.php">Recent Orders</a>
    </nav>

    <div class="icons">
        <a href="#" class="fas fa-user" ></a>
            <a href="#" class="fas fa-shopping-cart"></a>
    </div>
</div>

<body bgcolor="#FFF5F4">
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

        <section id="cart" class="section-p1">
            <?php
            include "connect.php";

            

            echo"<div class='cart-title'>";
    echo"<span class='cart-image'>Item</span>";            
     echo"<span class='cart-name'>Item Description</span>";           
      // echo"<span class='cart-category'>Category</span>";          
          echo"<span class='cart-price-title'>Price</span>";      
          echo"<span class='cart-quantity'>Quantity</span>";
          echo"<span class='cart-remove'>Confirm Order</span>";      
         echo"<span class='cart-remove'>Cancel Order</span>";       

      echo"</div>"; 
      echo "<hr>";
      $sessionid = $_SESSION['ID'];
        $user_id = $sessionid['USER_ID'];

            $sql1 = 'SELECT * FROM PRODUCT,CART_DETAILS,CART WHERE PRODUCT_ID=FK2_PRODUCT_ID AND FK1_CART_ID = CART_ID AND FK1_USER_ID= :user_id';
            $stid1 = oci_parse($conn,$sql1);
            oci_bind_by_name($stid1, ':user_id', $user_id);

            oci_execute($stid1);
            $row = oci_fetch_array($stid1, OCI_ASSOC);

            

            if (oci_execute($stid1)>0){
        while ($row=oci_fetch_array($stid1, OCI_ASSOC)){
            $prod_id = $row['PRODUCT_ID'];
            $cart_id = $row['FK1_CART_ID'];

            
                
            ?>
            <form action = '#' method = 'POST'>
            <?php    
                    echo"<div class='cart-row'>"; 

                    echo"<div><input type='hidden' id = 'Prod_id' name = 'Prod_id' value = '$prod_id'></div>";
                
                echo"<div><input type='hidden' id = 'Cart_id' name = 'Cart_id' value = '$cart_id'></div>";
                    echo"<div class = 'cart-image'><img src ='Images/" . $row['PRODUCT_IMAGE'] . "' height = 100 width = 100></div>";
                    echo"<div class = 'cart-name'>";
                        echo "<b><div class = 'cart-item'>" .$row['PRODUCT_NAME']. "</div></b>";
                        echo "<div class = 'cart-description'>" .$row['PRODUCT_DETAILS']. "</div>";
                        echo "</div>";
                    // echo "<div class = 'cart-category'>" .$row['FK1_CAT_ID']. "</div>";
                    echo "<div class = 'cart-price'>" .$row['CART_DETAILS_PRICE']. "</div>";
                    
                    
                    echo"<div class = 'cart-quantity'><input type='text' id = 'Prodquantity' name = 'Prodquantity' value = '".$row['QUANTITY']."'></div>";

                    echo"<div class='cart-remove'> <button  type='submit' id = 'btnConfirm' name='btnConfirm'>Confirm</button></div>";
                    
                    echo"<div class='cart-remove'> <button  type='submit' id = 'btnRemove' name='btnRemove'>Cancel</button></div>";

            echo "</div>";
            echo"</form>";


           }

            }

            echo "<hr>";
            
            ?>

        <div class='cart-next'><button type='reset' onclick="window.location.href='#';"> Cancel </button>
            <button type='submit' onclick="window.location.href='billingDetails.php';"> Next </button></div>
        
        

            <!-- echo"<input type='submit' value='Next' name = 'btnSubmit'>";
            echo"<input type='reset' value='Cancel' name = 'btnReset'>  ";
            echo "</form>"; -->

            
            

           

           <?php
           include"connect.php";
           

                if (isset($_POST['btnConfirm'])){

                    $quantity = $_POST['Prodquantity'];
                    $Prod_id = $_POST['Prod_id'];
                    $Cart_id = $_POST['Cart_id'];

                    $sql = 'UPDATE CART_DETAILS SET QUANTITY = :quantity WHERE FK2_PRODUCT_ID = :Prod_id AND FK1_CART_ID = :Cart_id';

                    $stid = oci_parse($conn,$sql);
                    oci_bind_by_name($stid, ':quantity', $quantity);
                    oci_bind_by_name($stid, ':Prod_id', $Prod_id);
                    oci_bind_by_name($stid, ':Cart_id', $Cart_id);

                    oci_execute($stid);

                    //$query = 'SELECT NO_OF_ITEMS FROM CART WHERE CART_ID = :Cart_id';
                    $query = 'SELECT * FROM CART_DETAILS, CART WHERE FK1_CART_ID = :Cart_id AND CART_ID = :Cart_id';
                    $stid1 = oci_parse($conn,$query);
                    oci_bind_by_name($stid1, ':Cart_id', $Cart_id);
                    oci_execute($stid1);
                    $row = oci_fetch_array($stid1, OCI_ASSOC);
                    $total_quantity_of_cart = 0;
                    if (oci_execute($stid1)>0){

                        while ($row=oci_fetch_array($stid1, OCI_ASSOC)){

                            $total_quantity = oci_result($stid1, 'QUANTITY');
                            $total_quantity_of_cart = $total_quantity + $total_quantity_of_cart;

                        }

                    }

                    $query2 = 'SELECT * FROM CART_DETAILS, CART WHERE FK1_CART_ID = :Cart_id AND CART_ID = :Cart_id';
                    $stid3 = oci_parse($conn,$query2);
                    oci_bind_by_name($stid3, ':Cart_id', $Cart_id);
                    oci_execute($stid3);
                    $row = oci_fetch_array($stid3, OCI_ASSOC);
                    $total_price_of_cart = 0;
                    if (oci_execute($stid3)>0){

                        while ($row=oci_fetch_array($stid3, OCI_ASSOC)){

                        // $total_price_of_cart = $row['TOTAL_PRICE'];

                        $total_quantity = oci_result($stid3, 'QUANTITY');
                        $individual_price = oci_result($stid3, 'CART_DETAILS_PRICE');

                        $total_price = $total_quantity * $individual_price;
                        $total_price_of_cart = $total_price + $total_price_of_cart;

                        }
                        
                        

                    }

                    $sql2 = 'UPDATE CART SET NO_OF_ITEMS = :total_quantity_of_cart WHERE CART_ID = :Cart_id';

                    $stid2 = oci_parse($conn,$sql2);
                    oci_bind_by_name($stid2, ':total_quantity_of_cart', $total_quantity_of_cart);
                    oci_bind_by_name($stid2, ':Cart_id', $Cart_id);

                    oci_execute($stid2);

                    $sql4 = 'UPDATE CART SET TOTAL_PRICE = :total_price_of_cart WHERE CART_ID = :Cart_id';

                    $stid4 = oci_parse($conn,$sql4);
                    oci_bind_by_name($stid4, ':total_price_of_cart', $total_price_of_cart);
                    oci_bind_by_name($stid4, ':Cart_id', $Cart_id);

                    if(oci_execute($stid4)){

                        echo '<script>alert("Cart Updated!")</script>';

                    }


                }

                if (isset($_POST['btnRemove'])){

                    $quantity = $_POST['Prodquantity'];
                    $Prod_id = $_POST['Prod_id'];
                    $Cart_id = $_POST['Cart_id'];

                    $sql = 'DELETE FROM CART_DETAILS WHERE FK2_PRODUCT_ID = :Prod_id AND FK1_CART_ID = :Cart_id';

                    $stid = oci_parse($conn,$sql);
                    oci_bind_by_name($stid, ':Prod_id', $Prod_id);
                    oci_bind_by_name($stid, ':Cart_id', $Cart_id);

                    if(oci_execute($stid)){

                        echo "Item Deleted!";

                    }




                }

                
           ?>





           </body>
</html>