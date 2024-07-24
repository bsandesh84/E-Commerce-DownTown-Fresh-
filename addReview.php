<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Review</title>
        <!-- <link rel="stylesheet" href="addToCart.css"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
   rel="stylesheet" />
    <link rel="stylesheet" href="review.css">
   <script src="review.js" async></script>
    </head>
    <body>
        <div class="content">
            <div class="content1">
        <img src="Images/reviewpic.jpg" alt="reviewpic" width="100%" height="100%"></div>
        <div class="content2">
            <?php

             include"connect.php";
                $sessionid = $_SESSION['ID'];
                $user_id = $sessionid['USER_ID'];
                $prod_ID = $_GET['id'];

                $sql = 'SELECT * FROM PRODUCT WHERE PRODUCT_ID = :prod_ID';

                $stid1 = oci_parse($conn,$sql);
                oci_bind_by_name($stid1, ':prod_ID', $prod_ID);
                oci_execute($stid1);
                $row = oci_fetch_array($stid1, OCI_ASSOC);
                if (oci_execute($stid1)>0){
                    while ($row=oci_fetch_array($stid1, OCI_ASSOC)){
                    $PRODUCT_NAME = $row['PRODUCT_NAME'];
                    $PRODUCT_DETAILS = $row['PRODUCT_DETAILS'];
                    $PRICE = $row['PRICE'];

                    echo "Product Name: ".$PRODUCT_NAME;
                    echo"<br>";
                    echo "Product Details: " .$PRODUCT_DETAILS;
                    echo"<br>";
                    echo "Price: ".$PRICE;
                }
            }

            ?>
            <p>Tell us about your experience.</p><br>
             <div class="rate">
                <h3>Ratings:</h3>
                <div class="stars">
        <form method = "POST" action="">
            <input class="star star-5" id="star5" type="radio" name="star" value="5">
            <label class="star star-5" for="star5"></label>
            <input class="star star-4" id="star4" type="radio" name="star"  value="4">
            <label class="star star-4" for="star4"></label>
            <input class="star star-3" id="star3" type="radio" name="star" value="3">
            <label class="star star-3" for="star3"></label>
            <input class="star star-2" id="star2" type="radio" name="star" value="2">
            <label class="star star-2" for="star2"></label>
            <input class="star star-1" id="star1" type="radio" name="star" value="1">
            <label class="star star-1" for="star1"></label>
            
            
            
            </div>
        </div>
            
            <textarea id="txt_message" name="message" placeholder="Write something...." rows="4" cols="50"></textarea>

        

            <input type="submit" value="Submit" name = "btnSubmit">

         </form>
     </div>
 </div>

        <?php

            include"connect.php";
            $sessionid = $_SESSION['ID'];
            $user_id = $sessionid['USER_ID'];
            $prod_ID = $_GET['id'];

            if(isset($_POST['btnSubmit'])){

                $rating = $_POST['star'];
                $message = $_POST['message'];

                $sql = 'INSERT INTO REVIEW (REVIEW_ID,RATING,DESCRIPTION,FK1_PRODUCT_ID,FK2_USER_ID) VALUES (null,:rating,:message,:prod_ID,:user_id)';
                $stid = oci_parse($conn,$sql);

                oci_bind_by_name($stid, ':rating', $rating);
                oci_bind_by_name($stid, ':message', $message);
                oci_bind_by_name($stid, ':prod_ID', $prod_ID);
                oci_bind_by_name($stid, ':user_id', $user_id);


                if(oci_execute($stid)){

                    echo 'Review Added!';
                    header("location:displayForCustomer.php");

                }


            }

        ?>


            

    </body>
</html>
             
           

    