<?php
	session_start();
	include_once('connect.php');
	if(isset($_GET['email'])){
		$status = "confirm";
		$status2 = "Deactivated";
		$mail = $_GET['email'];
		$update  = 'UPDATE CUSTOMER_AUDIT SET AUDIT_CONFIRMATION = :status WHERE NEW_EMAIL = :mail';

		$stid = oci_parse($conn,$update);
		oci_bind_by_name($stid, ':status', $status);
		oci_bind_by_name($stid, ':mail', $mail);

		if(oci_execute($stid)){

			if (isset($_SESSION['message'])){
					echo "Account Deactivated Successfully";
					header("location:logout.php");
			}

			else{
				echo "Account Not Updated!";
			}

	
	}


		$update2 = 'UPDATE Users SET USER_STATUS = :status2 WHERE EMAIL = :mail';
		$stid2 = oci_parse($conn,$update2);
		oci_bind_by_name($stid2, ':status2', $status2);
		oci_bind_by_name($stid2, ':mail', $mail);
	
	oci_execute($stid2);
}

?>
