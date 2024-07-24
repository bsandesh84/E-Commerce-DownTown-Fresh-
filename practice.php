 <?php

 include "connect.php";

  $sql = "SELECT DISTINCT PRICE,OFFER_RATE,PRODUCT_IMAGE,PRODUCT_NAME,PRODUCT_DETAILS,PRODUCT_ID FROM SHOP, PRODUCT, OFFER WHERE PRODUCT_ID = FK1_PRODUCT_ID AND FK2_SHOP_ID = 1";
 // $sql = "SELECT * FROM SHOP, PRODUCT WHERE SHOP_ID = 10";
    $stid1 = oci_parse($conn,$sql);
    echo $sql;
    oci_execute($stid1);
    
    $row = oci_fetch_array($stid1, OCI_ASSOC);
        
        echo"<section>";
            echo"<div class='shop-items'>";

        if (oci_execute($stid1)>0){
        while ($row=oci_fetch_array($stid1, OCI_ASSOC)){
            $price = $row['PRICE'];
            $discount = $row['OFFER_RATE'];

            $actual_price = $price - $discount;


                echo"<div class='shop-item'>";
                    
                    // echo"<img class='shop-item-image' src='images/cake1.jpg' alt='overload'>";
                    echo"<img class='shop-item-image' src ='Images/" . $row['PRODUCT_IMAGE'] . "' height = 50% width = 50%>";
                    echo"<span class='shop-item-title'>".$row['PRODUCT_NAME']."</span>";
                    echo"<div class='shop-description'>".$row['PRODUCT_DETAILS']."</div>";
                    echo '<td><a class ="details" href = "displaySingleProduct.php?id=' .$row['PRODUCT_ID'].'">Details</a></td>';
                     
                    echo"<div class='shop-item-details'>";
                        echo"Original Price: $<span class='shop-item-price'>".$row['PRICE']."</span>";
                        echo "<span class='shop-discount'>Price: $".$actual_price."</span>";

                        
                    echo"</div>";
                    
                    echo '<td><a class = "fcc-btn" href = "addToWishlist.php?id=' .$row['PRODUCT_ID'].'">+ Wishlist</a></td>';
                    echo '<td><a class = "fcc-btn" href = "addToCart.php?id=' .$row['PRODUCT_ID'].'">+ Cart</a></td>';
                    echo '<td><a class = "fcc-btn" href = "addReview.php?id=' .$row['PRODUCT_ID'].'">+ Review</a></td>';
                    // echo"<button class='btn btn-primary shop-item-button' type='button'>Add To Cart</button>";
                    // echo"<button class='btn btn-primary shop-item-button' type='button'>Add To Wishlist</button>";
                    // echo"<button class='btn btn-primary shop-item-button' type='button'>Add Review</button>";
                echo"</div>";
                

            

                                
            }
        }

        ?>