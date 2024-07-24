<?php
session_start();
// if (isset($_SESSION['username'])) {
//     echo "Welcome, " . $_SESSION['username'];

// }
        
// else{
//     echo 'You can not accesss';
// }

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Profile setting</title>
    <link rel="stylesheet" href="TraderSetting.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
   rel="stylesheet" />
    <script src ="customerSetting.js" async></script>


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
    

<div class="wrapper">
    <div class="left">
        <h2> User Profile</h2><br>
        <img src="Images/profile.jpg" 
        alt="user" width="100">
        <h3>User Profile</h3>
        <?php

         echo"<p>".$_SESSION['username']."</p>";
         ?>
    </div>
    <div class="right">
        <div class="info">
            
            <div class="info_data">

                <div class="data">
                    <a href="#" onclick="myFunction()">Account Information</a>
                                <div id="myDIV">
                                    <div class="contact">
                                    <form method="post" action="#" >
                                        
                                        <label for="fname">First Name</label>
                                        <input type="text" id="fname" name="fname" placeholder="Your name..." required="required"><br>
                                    

                                        <label for="lname">Last Name</label>
                                         <input type="text" id="lname" name="lname" placeholder="Your last name..." required="required"><br>
                                    

                                        <label for="address">Address</label>
                                        <input type="text" id="address" name="address" placeholder="Your address..." required="required"><br>

                                        <label for="oldemail">Old Email</label>
                                        <input type="text" id="oldemail" name="oldemail" placeholder="Your old email..." required="required"><br>
                                        <label for="email">Email</label>
                                        <input type="text" id="email" name="email" placeholder="Your email..." required="required"><br>

                                        <label for="phone">Phone No.</label>
                                        <input type="text" id="phone" name="phone" placeholder="Your phone number..." required="required"><br>

                                        <input type="submit" value="Submit" name = "btnSubmit">
                                
                            
                                    </form>

                                </div>
                            </div>
                    
                
                    
                    
                    
                      
                   <a href="#" onclick="myFunction2()">Password And security</a>
                   <div id="myDIV2">  
                        <div class="sub-menu-2">
                            <form method="post" action="#">

                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" placeholder="Your email..." required="required"><br>
                                

                            <label for="password">Old Password</label>
                        <input type="password" id="oldpassword" name="oldpassword" placeholder="Your password..." required="required"><br>

                        <label for="confirmpassword">New Password</label>
                        <input type="password" id="password" name="password" placeholder="Re-enter password..." required="required"><br>

                        <input type="submit" value="Submit" name = "btnSubmit2">
                    </form>

                        </div>
                    
                    
                </div>


                    <a href="#" onclick="myFunction3()">Ownership Information</a>
                    <div id="myDIV3">
                        <div class="sub-menu-3">
                           <form method="post" action="#">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" placeholder="Your email..." required="required"><br>
                            <input type= "hidden" name="terms" id="terms" value="value2">
                            <input type="checkbox" name="terms" id="terms" value="value1">&nbsp;

                            <label for="terms">I want to deactivate my account!</label>
                            <input type="submit" value="Deactivate" name = "btnSubmit3">
                          

                        </div>
                    
                </div>
            </div>
        </div>
    </form>
      
      <!-- <div class="projects">
            <h3>Recent Orders</h3>
            <div class="projects_data">
              
                <table>
                    <thead>
                        <tr>
                            <th>Order No</th>
                            <th>Placed no</th>
                            <th>items</th>
                            <th>Total</th>
                            <th>Review</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>2022/5/10</td>
                            <td>meat</td>
                            <td>RS250</td>
                            <td>review</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>2022/6/5</td>
                            <td>cake</td>
                            <td>RS 150</td>
                            <td>review</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>2022/4/30</td>
                            <td>fish</td>
                            <td>RS 300</td>
                            <td>review</td>
                        </tr>

                        



                    </tbody>

                </table>
            </div> 
        </div> -->
      </div></div></div></div></div></div></div>



<?php

include_once('connect.php');
if(isset($_POST['btnSubmit'])){
$id = $_SESSION['ID'];
$user_id = $id['USER_ID'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$oldemail = $_POST['oldemail'];
$email = $_POST['email'];
$phone = $_POST['phone'];


$sql = 'UPDATE Users SET Firstname = :fname, Lastname = :lname, ADDRESS = :address, EMAIL = :email, PHONENUM = :phone WHERE user_ID = :user_id';
$stid = oci_parse($conn,$sql);

oci_bind_by_name($stid, ':fname', $fname);
oci_bind_by_name($stid, ':lname', $lname);
oci_bind_by_name($stid, ':address', $address);
oci_bind_by_name($stid, ':email', $email);
oci_bind_by_name($stid, ':phone', $phone);
oci_bind_by_name($stid, ':user_id', $user_id);


    if(oci_execute($stid)){
        $to = $oldemail;
        $subject = "Account Update Confirmation";
        $message = "Hi, $fname. Click here to confirm your account update http://localhost/oci/updateconfirm.php?email=$oldemail";
        if (mail($to, $subject, $message))
        {
            $_SESSION['message'] = "Check your mail to update your account";
            header("location:homepage.php");
        }

        else{
            echo "Unable to send email!";
        }
    }

}
if(isset($_POST['btnSubmit2'])){
    $id = $_SESSION['ID'];
    $user_id = $id['USER_ID'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $sql = 'UPDATE Users SET Password = :pass WHERE user_ID = :user_id';
    $stid2 = oci_parse($conn,$sql);

    oci_bind_by_name($stid2, ':user_id', $user_id);
    oci_bind_by_name($stid2, ':pass', $pass);

    if(oci_execute($stid2)){
        $to = $email;
        $subject = "Account Update Confirmation";
        $message = "Hi. Click here to confirm your account update http://localhost/oci/updateconfirm.php?email=$email";
        if (mail($to, $subject, $message))
        {
            $_SESSION['message'] = "Check your mail to update your account";
            header("location:homepage.php");
        }

        else{
            echo "Unable to send email!";
        }
    }
}

if(isset($_POST['btnSubmit3'])){
    $email = $_POST['email'];
    $status = "Pending";
    $sql = 'UPDATE Users SET USER_STATUS = :status WHERE EMAIL = :email';
    $stid = oci_parse($conn,$sql);

    oci_bind_by_name($stid, ':email', $email);
    oci_bind_by_name($stid, ':status', $status);

    if(oci_execute($stid)){
    $to = $email;
    $subject = "Account deactivate Confirmation!!";
    $message = "Click here to confirm account deactivate http://localhost/oci/deactivateconfirm.php?email=$email";
    if (mail($to, $subject, $message))
    {
        $_SESSION['message'] = "check your mail to deactivate";
        header("location:CustomerSetting.php");
    }

    else{
        echo "Unable to send email";
    }

}
}
?> 


</body>

</body>
</html>