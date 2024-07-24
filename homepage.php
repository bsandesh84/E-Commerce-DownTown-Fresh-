<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home page</title>
        <link rel="stylesheet" type="text/css" href="home.Css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
        <link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
       rel="stylesheet" />
       <script src="home.js" async></script>
    
        <!-- <link rel="stylesheet" href="Style.css"> -->


        
        <style type ="text/css">
            h1{
                max-width: 500px;
                text-align: center;
                margin: auto;
                position: relative;
            }
            h1::before{
                content: " ";
                width:130px ;
                height: 2px;
                display: block;
                background-color: black;
                position: absolute;
                top: 50%;
                left: 0%;
            }
            h1::after{
                content: " ";
                width:130px ;
                height: 2px;
                display: block;
                background-color: black;
                position: absolute;
                top: 50%;
                right: 0%;
            }
        </style>
    </head>

       
    <body bgcolor=white>  

            <!-- Header starts -->

        <div class ="header">
            <!-- <input type="checkbox" name="" id="toggler" />
            <label for="toggler" class="fas fa-bars"></label> -->
        <img src="Images/logo.png" alt="DownTown Fresh" width=6%>
        <nav class="navbar">
                <a href="Home.html">Home</a>
                <a href="About Us.html">About Us</a>
                <a href="Shop.html">Shop</a>
                <a href="Cart.html">Cart</a>
                <a href="Contact.html">Contact</a>
                <a href="CustomerSetting.php">Help</a>
        </nav>
    
        <div class="icons">
            <a href="#" class="fas fa-user" ></a>
                <a href="#" class="fas fa-shopping-cart"></a>
        </div>
    </div>

    <div><img src="BakeryS.jpg" alt="" width="100%"></div>
    <!-- <div class="slider">
        <div class ="slides">

            <div class="mySlides fade">
                <img src="BakeryS.jpg" alt="">
            </div>

            <div class="mySlides fade">
                <img src="fishS.jpg" alt="">
            </div>

            <div class="mySlides fade">
                <img src="VegetablesS.jpg" alt="">
            </div>

            <div class="mySlides fade">
                <img src="ButcherS.jpg" alt="">
            </div>
    
        </div>
    </div> -->

            <h1>Our Collection</h1>

            <div class="section1"> 
                <div class="Cards">
                    <div class="image">
                        <img src="Cards\Bakery.jpg">
                    </div> 
                        
                    <div class="title">
                        <h2>Bakery Shop</h2>
                    </div>

                    <div class="des">
                        <p>The quality of bread is in the details.</p>
                        <button>Read More</button>
                    </div>
                </div>
            
                <div class="Cards">
                    <div class="image">
                        <img src="Cards\Butcher.jpg">
                    </div> 
                    
                    <div class="title">
                        <h2>Butcher Shop</h2>
                    </div>

                    <div class="des">
                        <p>We Meat The Highest Standards.</p>
                        <button>Read More</button>
                    </div>
                </div>

                <div class="Cards">
                    <div class="image">
                        <img src="Cards\Fish.jpg">
                    </div> 
                
                    <div class="title">
                         <h2>Fish Shop</h2>
                    </div>

                     <div class="des">
                        <p>The only Seafood heaven on earth.</p>
                        <button>Read More</button>
                    </div>
                </div>

                <div class="Cards">
                    <div class="image">
                        <img src="Cards\delicatessen.jpg">
                    </div> 
                
                    <div class="title">
                         <h2>Delicatessen Shop</h2>
                    </div>

                     <div class="des">
                        <p>A Moments of Fresh Treat for you.</p>
                        <button>Read More</button>
                    </div>
                </div>
                
                <div class="Cards">
                    <div class="image">
                         <img src="Cards\Vegetables.gif">
                    </div> 
                
                    <div class="title">
                         <h2>Vegetables Shop</h2>
                    </div>

                     <div class="des">
                        <p>Freshly gathered vegetables.</p>
                        <button>Read More</button>
                    </div>
                </div>     
            

    </div>

    <div class ="background" >
        <!-- <img src="Images\Background.jpg"> -->
        <h2>Stay healthy, go fresh!</h2>
                
    </div> 


        <h1> Top Products </h1>

        <!-- Top products first card -->
    <div class="section1">
        <div class="Cards">
            <div class="image">
                 <img src="Cards\bread2.jpg">
             </div> 
        
             <div class="des">
                <p>Best Breads In Town</p>
                
            </div>
        </div>

        <div class="Cards">
            <div class="image">
                 <img src="Cards\chicken2.jpg">
             </div> 
        
             <div class="des">
                <p>Fresh Chicken </p>
                
            </div>
        </div>

        <!-- Third Card -->

        <div class="Cards">
            <div class="image">
                 <img src="Cards\delicatessen2.jpg">
             </div> 
        
             <div class="des">
                <p>Delicatessen of your choice </p>
                
            </div>
        </div>
        <!-- fourth Card -->
        
        <div class="Cards">
            <div class="image">
                 <img src="Cards\fish2.jpg">
             </div> 
        
             <div class="des">
                <p>Fish from local farm </p>
                
            </div>
        </div>

        <!-- Fifth card -->

        <div class="Cards">
            <div class="image">
                 <img src="Cards\vegetables2.jpg">
             </div> 
        
             <div class="des">
                <p>Fresh Veggis from farm </p>
                
            </div>
        </div>
    </div>

    <h1> New Collection </h1>

        <!-- Third Row of Cards -->
        <div class="section1">
        <div class="Cards">
            <div class="image">
                 <img src="Cards\bakery3.jpg">
             </div> 
        
             <div class="des">
                <p>Butter Cake </p>
                
            </div>
        </div>

        <!--  second Card -->

        <div class="Cards">
            <div class="image">
                 <img src="Cards\delicatessen3.jpg">
             </div> 
        
             <div class="des">
                <p>Pastery </p>
                
            </div>
        </div>

        <!--  Third Card  -->

        <div class="Cards">
            <div class="image">
                 <img src="Cards\fish3.jpg">
             </div> 
        
             <div class="des">
                <p>Finn </p>
                
            </div>
        </div>

        <!-- Fourth card -->

        <div class="Cards">
            <div class="image">
                 <img src="Cards\vegetables3.jpg">
             </div> 
        
             <div class="des">
                <p>Capsicum  </p>
                
            </div>
        </div>

        <!--  Fifth Cards -->

        <div class="Cards">
            <div class="image">
                 <img src="Cards\meat3.jpg">
             </div> 
        
             <div class="des">
                <p>Chicken </p>
                
            </div>
        </div>
    </div>
    </body>
    </html>