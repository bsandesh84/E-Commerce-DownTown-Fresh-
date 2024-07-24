<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Product</title>
    <link rel = "stylesheet" href = "singleproduct.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="background-color: #cde3f5">
    <div class ="header">
        <!-- <input type="checkbox" name="" id="toggler" />
        <label for="toggler" class="fas fa-bars"></label> -->
    <img src="Images/logo.png" alt="DownTown Fresh" width=5%>
    <nav class="navbar">
            <a href="Home.html">Home</a>
            <a href="About Us.html">About Us</a>
            <a href="Shop.html">Shop</a>
            <a href="Cart.html">Cart</a>
            <a href="Contact.html">Contact</a>
            <a href="Help.html">Help</a>
    </nav>

    <div class="icons">
        <a href="#" class="fas fa-user" ></a>
            <a href="#" class="fas fa-shopping-cart"></a>
    </div>
  </div>
    <div class = "main-wrapper">
        <div class = "container">
            <div class = "product-div">
                <div class = "product-div-left">
                    <div class = "img-container">
                        <?php
                            include "connect.php";
                            $sessionid = $_SESSION['ID'];
                            $user_id = $sessionid['USER_ID'];
                            $prod_id = $_GET['id'];

                            $sql = 'SELECT * FROM PRODUCT, OFFER WHERE PRODUCT_ID =:prod_id AND FK1_PRODUCT_ID =:prod_id';
                            $stid = oci_parse($conn,$sql);
                            oci_bind_by_name($stid, ':prod_id', $prod_id);
                            oci_execute($stid);
                            $row1 = oci_fetch_array($stid, OCI_ASSOC);
                    
                            if (oci_execute($stid)>0){

                                while ($row=oci_fetch_array($stid, OCI_ASSOC)){


                                    // echo"<img src = "Ribeye Steak_Lip-on.jpg" alt = "Meat">";
                                    echo"<img src ='Images/" . $row['PRODUCT_IMAGE'] . "' height = 100% width = 100%>";

                                

                        
                        

                        
                    echo"</div>";
                   
                echo"</div>";
                echo"<div class = 'product-div-right'>";
                    echo"<span class = 'product-name'>".$row['PRODUCT_NAME']."</span>";
                    echo"<span class = 'product-price'>$".$row['PRICE']."</span>";
                    echo"<div class = 'product-rating'>";
                        echo"<p class = 'product-offer'>$".$row['OFFER_RATE']." off </p>";
                        echo"<p class = 'product-offer'> &nbsp;(".$row['OFFER_DESCRIPTION'].")</p>";
                    echo"</div>";
                    echo"<p class = 'product-description'>".$row['PRODUCT_DETAILS']."</p>";
                    echo"<p class = 'product-description'>".$row['ALLERGY_INFORMATION']."</p>";
                    }

                }

                ?>
                    <div class = "btn-groups">
                        <button type = "btnSubmit" class = "add-cart-btn"><i class = "fas fa-shopping-cart"></i>add to cart</button>
                        <?php

                            if(isset($POST['submit'])){

                                header("location:addToCart.php?id=");

                            }
                        ?>

                        <button type = "button" class = "wish-list-btn"><i class = "fas fa-list"></i>add to wish</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="testimonials">
    
        <div class="testimonial-heading">
            <span>Customer</span>
            <h1>DownTown Fresh</h1>
        </div>
            
          
            <div class="testimonial-box">
                
                <div class="box-top">
                    
                    <div class="profile">
                        <div class="profile-img">
                        <?php 

                        include "connect.php";
                        $prod_id = $_GET['id'];

                            // $sql = "SELECT * FROM PRODUCT INNER JOIN REVIEW ON FK1_PRODUCT_ID = :prod_id INNER JOIN Users ON FK2_USER_ID = USER_ID";
                        $sql = 'SELECT * FROM REVIEW, Users WHERE FK2_USER_ID = USER_ID AND FK1_PRODUCT_ID = :prod_id';
                            $stid = oci_parse($conn,$sql);
                            oci_bind_by_name($stid, ':prod_id', $prod_id);
                            oci_execute($stid);
                            $row1 = oci_fetch_array($stid, OCI_ASSOC);
                    
                            if (oci_execute($stid)>0){

                                while ($row=oci_fetch_array($stid, OCI_ASSOC)){
                                    $rating = $row['RATING'];
                                    $firstname = $row['FIRSTNAME'];
                                    $lastname = $row['LASTNAME'];
                                    $review = $row['DESCRIPTION'];

                          // echo"<img src ='Images/profile.jpg'>";
                        echo"</div>";
                       
                        echo"<div class='name-user'>";
                            echo"<strong>".$firstname ."</strong>";
                            echo"<span>".$lastname ."</span>";
                        echo"</div>";
                    echo"</div>";

                    if($rating == 5){
                   
                    echo"<div class='rating'>";
  
                      echo"<input type='radio' name='rating' value='5' id='5'><label for='5'>☆</label>";
                      echo"<input type='radio' name='rating' value='5' id='4'><label for='4'>☆</label>";
                      echo"<input type='radio' name='rating' value='5' id='3'><label for='3'>☆</label>";
                      echo"<input type='radio' name='rating' value='5' id='2'><label for='2'>☆</label>";
                      echo"<input type='radio' name='rating' value='5' id='1'><label for='1'>☆</label>";
                    
                    echo"</div>";
                }

                if($rating == 4){
                   
                    echo"<div class='rating'>";
  
                      echo"<input type='radio' name='rating' value='5' id='4'><label for='4'>☆</label>";
                      echo"<input type='radio' name='rating' value='5' id='3'><label for='3'>☆</label>";
                      echo"<input type='radio' name='rating' value='5' id='2'><label for='2'>☆</label>";
                      echo"<input type='radio' name='rating' value='5' id='1'><label for='1'>☆</label>";
                    
                    echo"</div>";
                }

                if($rating == 3){
                   
                    echo"<div class='rating'>";
  
                      echo"<input type='radio' name='rating' value='5' id='3'><label for='3'>☆</label>";
                      echo"<input type='radio' name='rating' value='5' id='2'><label for='2'>☆</label>";
                      echo"<input type='radio' name='rating' value='5' id='1'><label for='1'>☆</label>";
                    
                    echo"</div>";
                }

                if($rating == 2){
                   
                    echo"<div class='rating'>";
  
                      echo"<input type='radio' name='rating' value='5' id='2'><label for='2'>☆</label>";
                      echo"<input type='radio' name='rating' value='5' id='1'><label for='1'>☆</label>";
                    
                    echo"</div>";
                }

                if($rating == 1){
                   
                    echo"<div class='rating'>";
  
                      echo"<input type='radio' name='rating' value='5' id='1'><label for='1'>☆</label>";
                    
                    echo"</div>";
                }

                echo"</div>";
                                echo"<div class='client-comment'>";
                    echo"<p>".$row['DESCRIPTION']."</p>";
                echo"</div>";
                


                       
                    }
                }

                 ?>
                          

            </div>
          
            
            <script>
                 const reviews = document.querySelectorAll('.reviews');
                 
                 // console.log(starts);

                   for(x=0; x<review,length; x++){
                      reviews[x].reviewValue = (x+1);
                            // fars[x].addEventListener('click',function(){
                           //console.log("I am clicked");
 
                         ["click", "mouseover", "mouseout"].forEach(function(e){
                             reviews[x].addEventListener(e, showRating);
                 })
    
                }
                               function showRating(e){
                               let type =e.type;
                                    // console.log(type);
                               let reviewValue =this.reviewValue;
                                //console.log(starValue);
                               reviews.forEach(function(elem,ind){
                                   if(type ==='click'){
                                        if(ind < reviewValue){
                                   elem.classList.add("orange");
                                       }else{
                                    elem.classList.remove("orange");
                
                }

         }
    })


     }
    
</script>
    <script src = "singleproduct.js"></script>
</body>



</html>