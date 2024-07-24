<?php

session_start();

$sessionid = $_SESSION['ID'];
$user_id = $sessionid['USER_ID'];
echo $user_id;




?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <title>DownTownFresh | Store</title>
        <meta name="description" content="This is the description">

        <link rel="stylesheet" href="displayForCustomer.css" />
        <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
       
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
        <link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
       rel="stylesheet" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a href="logout.php">Log Out</a>

        </nav>
    
        <div class="icons">
            <a href="customerSetting.php" class="fas fa-user"></a>
                <a href="addToOrder.php" class="fas fa-shopping-cart"></a>
        </div>
    </div>
<body style="background-color: #FFF5F4">

    <div id="head">
        <div id="search2">
            <form action="" method="post">
            <fieldset>
                <legend>Search</legend>
            <input type="text" placeholder="Search.." name="search" ><!-- <br> -->

            <select name="txtShop" id= "txtShop"><!-- <br> -->
            <option value="" name = "txtCategory">All Shop</option>
            <option value="1">Pastries</option>
            <option value="2">Sweets</option>
            <option value="3">Meat</option>
            <option value="4">Exotic Meat</option>

            <option value="5">Salads</option>
            <option value="6">Cheese</option>
            <option value="7">Fruits</option>

            <option value="8">Vegetables</option>
            <option value="9">Fish</option>
            <option value="10">Seafood</option>
            
            </select>

            <select name="txtCategory" id= "txtCategory"><!-- <br> -->
            <option value="" name = "txtCategory">All Category</option>
            <option value="Soft White Cheese">Soft White Cheese</option>
            <option value="Semi Soft Cheese">Semi Soft Cheese</option>
            <option value="Hard Cheese">Hard Cheese</option>
            <option value="Stone Fruit">Stone Fruit</option>
            <option value="Berries Fruit">Berries Fruit</option>
            <option value="Citrus Fruit">Citrus Fruit</option>
            <option value="Leafy Green">Leafy Green</option>
            <option value="Cruciferous">Cruciferous</option>
            <option value="Allium">Allium</option>
            <option value="Salmon Fish">Salmon Fish</option>
            <option value="Tuna Fish">Tuna Fish</option>
            <option value="Tilapia Fish">Tilapia Fish</option>
            <option value="Roe Fish">Roe Fish</option>
            <option value="Crustaceans Fish">Crustaceans Fish</option>
            <option value="Filo Pastry">Filo Pastry</option>
            <option value="Flaky Pastry">Flaky Pastry</option>
            <option value="Puff Pastry">Puff Pastry</option>
            <option value="Traditional sweets">Traditional sweets</option>
            <option value="Chewy sweets">Citrus Fruit</option>
            <option value="Boiled sweets">Boiled sweets</option>
            <option value="Entomophagy">Entomophagy</option>
            <option value="Red meat">Red meat</option>
            <option value="Poultry meat">Poultry meat</option>
            <option value="Venison">Venison</option>
            
            </select>

            <input type="radio" name="sort" value="1" id = "sortbyname">
            <label for ="sortbyname" >Name</label><!-- <br> -->
                        
            <input type="radio" id="sortbyprice" name = "sort" value="2">
            <label for ="sortbyprice" >Price</label><!-- <br> -->

        
            <input type="radio" name = "Cendingsort" value="1">
            <label>A-Z↑</label><!-- <br> -->

            <input type="radio" name = "Cendingsort" value="2">
            <label>Z-A↓</label><!-- <br> -->

            <input type="submit" value="Search" name = "btnSubmit" id="btnSubmit"><br>
            
            </fieldset>            

        </form>
        </div>
       
 
    </div>


<?php

    include "connect.php";

    $sql = 'SELECT * FROM Product, OFFER WHERE FK1_PRODUCT_ID = PRODUCT_ID';

    if (isset($_POST['btnSubmit'])){


            if(!empty($_POST['txtCategory'])){

                    $cat=$_POST['txtCategory'];
                    $sql = "SELECT DISTINCT * FROM CATEGORY,PRODUCT INNER JOIN OFFER ON PRODUCT_ID = FK1_PRODUCT_ID WHERE CAT_NAME = $cat";
                    $stid1 = oci_parse($conn,$sql);
                    // oci_execute($stid1);
                    oci_bind_by_name($stid1, ':cat', $cat);

                    
                }

                if(!empty($_POST['txtShop'])){

                    $cat=$_POST['txtShop'];
                    // $sql = "SELECT DISTINCT * FROM SHOP,PRODUCT INNER JOIN OFFER ON PRODUCT_ID = FK1_PRODUCT_ID WHERE SHOP_ID = $cat";
                    $sql = "SELECT DISTINCT PRICE,OFFER_RATE,PRODUCT_IMAGE,PRODUCT_NAME,PRODUCT_DETAILS,PRODUCT_ID FROM SHOP, PRODUCT, OFFER WHERE PRODUCT_ID = FK1_PRODUCT_ID AND FK2_SHOP_ID = $cat";
                    
                }

                if(!empty($_POST['search'])){
                    
                    if (!empty($_POST['txtCategory'])) {
                        $sql= " AND PRODUCT_NAME LIKE '%".$_POST['search']."%'";
                    } 
                    else {
                        $sql= "SELECT * FROM Product,OFFER WHERE FK1_PRODUCT_ID = PRODUCT_ID AND PRODUCT_NAME LIKE '%".$_POST['search']."%'";
                    }

                }

                if(!empty($_POST['sort']) && empty($_POST['Cendingsort'])) {
                    echo '<script>alert("Please select the order first.")</script>';
                }
                
                else if(!empty($_POST['sort'])){
                    $sort = $_POST['sort'];

                    if (($sort == '1') && ( $_POST['Cendingsort'] == '2')){
                        
                        $sql = "SELECT * FROM Product,OFFER WHERE FK1_PRODUCT_ID = PRODUCT_ID Order by PRODUCT_NAME DESC";

                    }

                    else if (($sort == '2') && ($_POST['Cendingsort'] == '2')){
                         $sql = "SELECT * FROM Product,OFFER WHERE FK1_PRODUCT_ID = PRODUCT_ID Order by PRICE DESC";
                    }

                    else if (($_POST['sort'] == "1") && ($_POST['Cendingsort'] == "1")){
                        
                        $sql = "SELECT * FROM Product,OFFER WHERE FK1_PRODUCT_ID = PRODUCT_ID Order by PRODUCT_NAME";

                    }

                    else if (($sort == "2") && ($_POST['Cendingsort'] == "1")){
                        $sql = "SELECT * FROM Product,OFFER WHERE FK1_PRODUCT_ID = PRODUCT_ID Order by Price";
                    }

                }

                if ((!empty($_POST['search'])) && (!empty($_POST['sort'])) && (!empty($_POST['Cendingsort']))){

                    $sort = $_POST['sort'];
                    $cat = $_POST['txtCategory'];

                    if (($sort == '1') && ( $_POST['Cendingsort'] == '2')){
                        
                        // $sql = "SELECT * FROM product WHERE Name LIKE '%".$_POST['search']."%' Order by Name DESC ";
                        $sql = "SELECT * FROM Product,OFFER WHERE FK1_PRODUCT_ID = PRODUCT_ID AND PRODUCT_NAME LIKE '%".$_POST['search']."%' ORDER BY PRODUCT_NAME DESC";

                    }

                    else if (($sort == '2') && ($_POST['Cendingsort'] == '2')){
                        // $sql = "SELECT * FROM product  WHERE Name LIKE '%".$_POST['search']."%' Order by Price DESC";
                        $sql = "SELECT * FROM Product,OFFER WHERE FK1_PRODUCT_ID = PRODUCT_ID AND PRODUCT_NAME LIKE '%".$_POST['search']."%' ORDER BY Price DESC";
                    }

                    else if (($_POST['sort'] == "1") && ($_POST['Cendingsort'] == "1")){
                        
                        // $sql = "SELECT * FROM product  WHERE Name LIKE '%".$_POST['search']."%' Order by Name ";
                        $sql = "SELECT * FROM Product,OFFER WHERE FK1_PRODUCT_ID = PRODUCT_ID AND PRODUCT_NAME LIKE '%".$_POST['search']."%' ORDER BY PRODUCT_NAME";

                    }

                    else if (($sort == "2") && ($_POST['Cendingsort'] == "1")){
                        // $sql = "SELECT * FROM product WHERE Name LIKE '%".$_POST['search']."%' Order by Price ";
                         $sql = "SELECT * FROM Product,OFFER WHERE FK1_PRODUCT_ID = PRODUCT_ID AND PRODUCT_NAME LIKE '%".$_POST['search']."%' ORDER BY PRICE";
                    }

                }

                



                if(!empty($_POST['txtCategory']) && !empty($_POST['sort']) && !empty($_POST['Cendingsort'])){
                    
                    if (($sort == '1') && ( $_POST['Cendingsort'] == '2')){
                        
                        // $sql = "SELECT * FROM product WHERE Category = '$cat' Order by Name DESC";
                        $sql = "SELECT * FROM Product,OFFER WHERE FK1_PRODUCT_ID = PRODUCT_ID AND FK1_CAT_ID = $cat ORDER BY PRODUCT_NAME DESC";

                    }

                    else if (($sort == '2') && ($_POST['Cendingsort'] == '2')){
                        // $sql = "SELECT * FROM product WHERE Category = '$cat' Order by Price DESC ";
                        $sql = "SELECT * FROM Product,OFFER WHERE FK1_PRODUCT_ID = PRODUCT_ID AND FK1_CAT_ID = $cat ORDER BY Price DESC";
                    }

                    else if (($_POST['sort'] == "1") && ($_POST['Cendingsort'] == "1")){
                        
                        // $sql = "SELECT * FROM product WHERE Category = '$cat' Order by Name ";
                        $sql ="SELECT * FROM Product,OFFER WHERE FK1_PRODUCT_ID = PRODUCT_ID AND FK1_CAT_ID = $cat ORDER BY PRODUCT_NAME";

                    }

                    else if (($sort == "2") && ($_POST['Cendingsort'] == "1")){
                        // $sql = "SELECT * FROM product WHERE Category = '$cat' Order by Price ";
                       $sql = "SELECT * FROM Product,OFFER WHERE FK1_PRODUCT_ID = PRODUCT_ID AND FK1_CAT_ID = $cat ORDER BY PRICE";
                    }

                }


    }
    // $sql = "SELECT * FROM SHOP, PRODUCT INNER JOIN OFFER ON PRODUCT_ID = FK1_PRODUCT_ID WHERE SHOP_ID = 9";
    $stid1 = oci_parse($conn,$sql);
    // echo $sql;
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
        echo"</div>";
echo"</section>";
         
                       
   ?>
</body>

 <footer>

  <div id="footercontainer">

  <div class="flex1">
  <p>Informations</p><br>
  <nav id="navigation2">
           <a href="home.html" target="blank">About Us</a><br>
           <a href="contact.html" target="blank">Contact Us</a><br>
           <a href="order.html" target="blank">Terms & Conditions</a><br>
           <a href="about.html" target="blank">Privacy Policy</a><br>
           <a href="review.html" target="blank">Make money with us</a><br>
    </nav>
    </div>

    <div class="flex2">
      <p>NEED HELP?</p><br>
      We are available 9am-5pm PT. Our primary mode of support is via email. Please don’t think this means we don’t want to speak to you — quite the opposite, actually!<br><br>
        ✉ hi@downtownfresh.com<br>☎ 206-709-5001<br><br>

      Join our newsletter
      <div class="newsletter">
      <input type="text" id="email2" name="email2" placeholder="Your email..." required="required">
      <input type="submit" value="Submit">
    </div>


    </div>
    <div class="flex3">
      <p>Visit Us</p><br>
<img src="Images/collections.png" width="20">&nbsp;&nbsp;Slot 10 - 13<br>
<img src="Images/location.png" width="20">&nbsp;&nbsp;Woodhouse, Bradford<br>
<img src="Images/phone.png" width="20">&nbsp;&nbsp;789-709-8889<br>
<!-- <hr size="2" width="250px" color="black">  -->
<hr />

<img src="Images/collections.png" width="20">&nbsp;&nbsp;Slot 13 - 16<br>
<img src="Images/location.png" width="20">&nbsp;&nbsp;West Bretton, Wakefield<br>
<img src="Images/phone.png" width="20">&nbsp;&nbsp;206-456-5001<br>
<!-- <hr size="2" width="250px" color="black"> -->
  <hr />

<img src="Images/collections.png" width="20">&nbsp;&nbsp;Slot 10 - 13<br>
<img src="Images/location.png" width="20">&nbsp;&nbsp;Allerton Bywater, Leeds<br>
<img src="Images/phone.png" width="20">&nbsp;&nbsp;234-709-5001<br>
<!-- <hr size="2" width="250px" color="black">   -->
<hr />

    </div>

    <div class="flex4">

      <div>

      <br><a target="blank" href="http://nationalkoshersupervision.com/"><img src="Images/kosher.png" alt="kosherpic"></a><br><br></div>
      All of our cakes, cupcakes, and pies are Kosher. We are under strict National Kosher supervision. 
    </div>
 
  </div>

  <div class="symbols">
    <a href="https://www.instagram.com/" target="_blank"><img src="Images/instagram.png" alt="instagram" title="Instagram" width="30"></a>&nbsp;
    <a href="https://www.youtube.com/" target="_blank"><img src="Images/youtube.png" alt="youtube" title="Youtube" width="30"></a>&nbsp;
    <a href="https://twitter.com/" target="_blank"><img src="Images/twitter.png" alt="twitter" title="Twitter" width="30"></a>
  </div> 

  <div class="copyright">
    <p>© Copyright 2020 DownTownFresh | All Rights Reserved</p>
  </div>


</footer>
</html>


 