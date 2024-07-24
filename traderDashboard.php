
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="traderDashboard.css">
     <link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
        rel="stylesheet" />
     
    
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

   
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <i class="uil uil-user"></i>
            </div>
            <?php
            session_start();
            include "connect.php";

            $sessionid = $_SESSION['ID'];
            $user_id = $sessionid['USER_ID'];

            $sessionid = $_SESSION['ID'];
            $user_id = $sessionid['USER_ID'];

            $sql2 = 'SELECT USERNAME FROM USERS WHERE USER_ID = :user_id';
            $stid2 = oci_parse($conn,$sql2);
            oci_bind_by_name($stid2, 'user_id', $user_id);
            oci_execute($stid2);

            $row2 = oci_fetch_array($stid2, OCI_ASSOC);

            echo"<span class='logo_name'>".$row2['USERNAME']."</span>";

            ?>
        </div>

        <div class="menu-items">
           
           <!--  <div class="search-box">
                <input type="text" placeholder="Search here...">
            </div> -->
        
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-dashboard"></i>
                    <span class="link-name">Product</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-file-medical-alt"></i>
                    <span class="link-name">Shop</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name">Display Products</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-shop"></i>
                    <span class="link-name">See Orders</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-shopping-cart"></i>
                    <span class="link-name">Product</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-tag-alt"></i>
                    <span class="link-name">Order</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <!-- <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li> -->
            </ul>
        </div>
    </nav>

    <section class="dashboard">

        <div class="dash-content">
            <div class="overview">
                <!-- <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div> -->

                <div class="boxes">
                    
                    <div class="box box1">
                        <a href="addProduct.php"><i class="uil uil-dashboard"></i></a>
                        <hr>
                        <span class="text">Add Product</span>
                    </div>

                    <div class="box box2">
                        <a href="addShop.php"><i class="uil uil-file-medical-alt"></i></a>
                        <hr>
                        <span class="text">Add Shop</span>
                    </div>

                    <div class="box box3">
                        <a href="addCategory.php"><i class="uil uil-users-alt"></i></a>
                        <hr>
                        <span class="text">Add Category</span>
                    </div>

                    <div class="box box4">
                        <a href="displayForTrader.php"><i class="uil uil-shop"></i></a>
                        <hr>
                        <span class="text">Update Offers</span>
                    </div>

                    <div class="box box5">
                        <a href="displayForTrader.php"><i class="uil uil-shopping-cart"></i></a>
                        <hr>
                        <span class="text">Add Offers</span>
                    </div>

                    <div class="box box6">
                        <a href="displayForTrader.php"><i class="uil uil-tag-alt"></i></a>
                        <hr>
                        <span class="text">View All Products</span>
                    </div>

                    <div class="box box6">
                        <a href="updateProduct.php"><i class="uil uil-tag-alt"></i></a>
                        <hr>
                        <span class="text">Update Product</span>
                    </div>

                     <div class="box box6">
                        <a href="TraderRecentOrders.php"><i class="uil uil-tag-alt"></i></a>
                        <hr>
                        <span class="text">View Orders</span>
                    </div>

                    <div class="box box6">
                        <a href="ViewInvoiceTrader.php"><i class="uil uil-tag-alt"></i></a>
                        <hr>
                        <span class="text">View Invoice</span>
                    </div>

                </div>
            </div>

           
            </div>
        </div>
    </section>

    <!-- <script src="script.js"></script> -->
</body>
</html>
