<?php 
	session_start();
	include_once('connect.php');

	if(isset($_GET['token'])){
		$status = "active";
		$token = $_GET['token'];
		$update  = 'UPDATE Users SET USER_STATUS = :status WHERE TOKEN = :token';
	
	$stid = oci_parse($conn,$update);

	oci_bind_by_name($stid, ':status', $status);
	oci_bind_by_name($stid, ':token', $token);

	if(oci_execute($stid)){
		if (isset($_SESSION['message'])){
			$_SESSION['message'] = "Account Updated Successfully";
			header("location:login.php");
		}
		else{
			$_SESSION['message'] = "You are logged out";
			header("location:login.php");
		}
	}

	else{
		$_SESSION['message'] = "Account Not Updated!";
			header("location:customerRegister.php");
	}
}

?>