<?php 
	session_start();
	include_once('connect.php');

	if(isset($_GET['email'])){
		$status = "confirmed";
		$email = $_GET['email'];
		$update  = 'UPDATE CUSTOMER_AUDIT SET AUDIT_CONFIRMATION = :status WHERE OLD_EMAIL = :email';
	
	$stid = oci_parse($conn,$update);

	oci_bind_by_name($stid, ':status', $status);
	oci_bind_by_name($stid, ':email', $email);

	if(oci_execute($stid)){
		if (isset($_SESSION['message'])){
			// $_SESSION['message'] = "Account Updated Successfully";
			echo '<script>alert("Account Updated Successfully")</script>';
			header("location:login.php");
		}
	}

	else{
		// $_SESSION['message'] = "Account Not Updated!";
		echo '<script>alert("Account Not Updated")</script>';
			header("location:login.php");
	}
}


?>