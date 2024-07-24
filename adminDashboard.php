
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


            <span class="logo_name">Admin</span>
        </div>

        <div class="menu-items">
        
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
                    <span class="link-name">Dashboard</span>
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
                        <a href="displayUnverifiedTraders.php"><i class="uil uil-dashboard"></i></a>
                        <hr>
                        <span class="text">See Unverified Traders</span>
                    </div>

                    <div class="box box2">
                        <a href="displayUnverifiedProducts.php"><i class="uil uil-file-medical-alt"></i></a>
                        <hr>
                        <span class="text">See Unverified Products</span>
                    </div>

                    <div class="box box3">
                        <a href="restrictedTraders.php"><i class="uil uil-users-alt"></i></a>
                        <hr>
                        <span class="text">See Restrict Traders</span>
                    </div>

                    <div class="box box4">
                        <a href="displayUnverifiedProducts.php"><i class="uil uil-shop"></i></a>
                        <hr>
                        <span class="text">Restrict Products</span>
                    </div>

                    <div class="box box4">
                        <a href="RemoveTradersWithWarnings.php"><i class="uil uil-shop"></i></a>
                        <hr>
                        <span class="text">Deactivate Traders</span>
                    </div>

                    <div class="box box4">
                        <a href="displayCustomers.php"><i class="uil uil-shop"></i></a>
                        <hr>
                        <span class="text">Display Customers</span>
                    </div>

                    <div class="box box4">
                        <a href="displayTraders.php"><i class="uil uil-shop"></i></a>
                        <hr>
                        <span class="text">Display Traders</span>
                    </div>

                    <div class="box box4">
                        <a href="displayAllProducts.php"><i class="uil uil-shop"></i></a>
                        <hr>
                        <span class="text">Display Products</span>
                    </div>


                </div>
            </div>

           
            </div>
        </div>
    </section>

    <!-- <script src="script.js"></script> -->
</body>
</html>
