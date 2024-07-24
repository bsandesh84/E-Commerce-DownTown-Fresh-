<?php
	session_start();
	include "connect.php";
	$sessionid = $_SESSION['ID'];
	$user_id = $sessionid['USER_ID'];
	$type = "trader";

	$sql2 = 'SELECT EMAIL FROM USERS WHERE USER_ID = :user_id AND USER_TYPE = :type';
	$stid2 = oci_parse($conn,$sql2);
	oci_bind_by_name($stid2, 'user_id', $user_id);
	oci_bind_by_name($stid2, 'type', $type);
	oci_execute($stid2);
	$row2 = oci_fetch_array($stid2, OCI_ASSOC);
	$email = $row2['EMAIL'];

	$token = bin2hex(random_bytes(15));
	$to = $email;

$subject = "Invoice for your products";
$message = "Hi. Click here to check your account http://localhost/oci/TraderInvoice.php?token=$token";
if (mail($to, $subject, $message))
    {
        echo '<script>alert("The invoice has been sent to your email!")</script>';
        header("location:traderDashboard.php");
        
    }

    else{
        echo "Unable to send email!";
    }
?>