<?php
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login | DownTown Fresh </title>
  <style>
    .error{
      float: center;
      margin-bottom: 10px;
      width: auto;
      text-align: center;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
  <link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
   rel="stylesheet" />
</head>
<body style="background-color: #FFF5F4">
  <div class ="header">
        <!-- <input type="checkbox" name="" id="toggler" />
        <label for="toggler" class="fas fa-bars"></label> -->
    <img src="Images/logo.png" alt="DownTown Fresh" width=6%>
    
    <nav class="navbar">
            <a href="homepage.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="displayForCustomer.php">Shop</a>
            <a href="customerRegister.php">Customer</a>
            <a href="traderRegistration.php">Trader</a>
            <a href="help.php">Help</a>
    </nav>

    <div class="icons">
        <a href="#" class="fas fa-user" ></a>
            <a href="#" class="fas fa-shopping-cart"></a>
    </div>
</div>
    <img src="Images/logo.png" alt="" width="100" height="100">
  <div class="login">
    <h2>DownTown Fresh System Login</h2>
  </div>
  <div class="error">
   <?php 
    session_start(); 
    if (isset($_SESSION['message']))
    {
     $error = $_SESSION['message']; 

    }

    else{
      $error = 'Please log in!';
    }

    echo $error;
 

  ?></div>
     
  <form target="_blank" action="" method="post">
    
    <div class="input-group">
        <label for="txtUsername">Username: </label>&nbsp;
        <input type="text" id="txtUsername" name="txtUsername" placeholder=" Your username..." required="required">
    </div>
      <br>
    <div class="input-group">
        <label for="txtPassword">Password: </label>&nbsp;
        <input type="password" id="txtPassword" name="txtPassword" placeholder=" Your password..." required="required">
    </div>
      <br>
      <div class="input-group">
      <label for="Role:">Role: </label>&nbsp;
  <select name="role" id="role" required="required">
    <option selected disabled>Select</option>
    <option value="customer">Customer</option>
    <option value="trader">Trader</option>
   </select><br>
</div>
  <div class="input-group">
    <!-- <button type="submit" class="btn" name="login_user">Login</button> -->
    &nbsp;&nbsp;<input type="submit" name="btnSubmit" value="Login"><br>
</div>
<p><a href ="forgotpassword.php">Forgot Password?</a><br>

<div class="h1">OR</div>
  
<p><a href ="customerRegister.php">Create Account!

  </form>



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
</body>
 
<?php
// session_start(); 
include_once('connect.php');
  if (isset($_POST['btnSubmit']))
  {

    $username = $_POST['txtUsername'];
    // echo $username;
    $role = $_POST['role'];
    // echo $role;
    $pw = md5($_POST['txtPassword']);
    // echo $pw;
    $id = null;
    $status = "active";

   $sql = 'SELECT user_ID FROM Users WHERE USERNAME = :username AND PASSWORD = :pw AND USER_TYPE = :role AND USER_STATUS = :status';

    $stid = oci_parse($conn,$sql);

    oci_bind_by_name($stid, ':username', $username);
    oci_bind_by_name($stid, ':pw', $pw);
    oci_bind_by_name($stid, ':role', $role);
    oci_bind_by_name($stid, ':status', $status);

    oci_execute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC);
//oci_fetch_array returns a row from the db.

 if ($row) {
    $_SESSION['username']=$_POST['txtUsername'];
    $_SESSION['ID'] = $row;
    if ($_POST['role'] == "customer"){
      header("location:homepage.php");
    }

    if ($_POST['role'] == "trader"){
      header("location:traderDashboard.php");
    }

  }
 else {
    echo '<script>alert("The person  is not found. Please check the spelling and try again or check password")</script>';
    exit();
}

oci_free_statement($stid);
oci_close($conn);

}
?>
</html>
