<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Customer Registration | DownTown Fresh </title>
	<link rel="stylesheet" type="text/css" href="addShop.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
	<link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" 
   rel="stylesheet" />
   <!-- <script src="contact.js" async></script> -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body style="background-color: #cde3f5">


<div class="contact">
					
	<form onsubmit = "return ValidateForm()" method="post" action="#" >
		<h2>Update your password</h2>

		<label for="email">Email</label>
	    <input type="text" id="email" name="email" placeholder="Your email..." required="required">

	    <label for="password">Password</label>
	    <input type="password" id="password" name="password" placeholder="Your password..." required="required">

	    <label for="cpassword">Update Password</label>
	    <input type="password" id="cpassword" name="cpassword" placeholder="Your password..." required="required">
						
		<input type="reset"  value="Reset">&nbsp;
		<input type="submit" value="Submit" name = "btnSubmit">
						
						
	</form>			
</div>
<?php
if(isset($_POST['btnSubmit'])){

    include "connect.php";
    // $id = $_SESSION['ID'];
    // $user_id = $id['USER_ID'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $sql = 'UPDATE Users SET Password = :pass WHERE EMAIL = :email';
    $stid2 = oci_parse($conn,$sql);

    oci_bind_by_name($stid2, ':email', $email);
    oci_bind_by_name($stid2, ':pass', $pass);

    if(oci_execute($stid2)){
        $to = $email;
        $subject = "Account Update Confirmation";
        $message = "Hi. Click here to confirm your account update http://localhost/oci/updatePasswordconfirm.php?email=$email";
        if (mail($to, $subject, $message))
        {
            $_SESSION['message'] = "Check your mail to update your account";
            header("location:login.php");
        }

        else{
            echo "Unable to send email!";
        }
    }
}
?>

</body>
</html>