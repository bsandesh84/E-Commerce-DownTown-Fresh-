<?php
include"connect.php";
session_start();
	$sessionid = $_SESSION['ID'];
	$id = $sessionid['USER_ID'];
	$pay = $_SESSION['pay'];
	$_SESSION['email'] = $_POST['email'];

	$_SESSION['day_Slot'] = $_POST['day_Slot'];
	$_SESSION['time_Slot'] = $_POST['time_Slot'];
	
	// if (isset($_POST['nextday'])){
	// 	$_SESSION['collection_date'] = $_POST['nextday'];
	// 	echo 'next day selected';
	// }
	// else{
	// 	$_SESSION['collection_date'] = $_POST['collection_date'];
	// 	echo 'a day selected';
	// }

?>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST" id="buyCredits" name="buyCredits">

<input type="hidden" name="business" value="sb-pwyji15947175@business.example.com"/>

<input type="hidden" name="cmd" value="_xclick" />

<input type="hidden" name="amount" value="<?php echo $pay?>"/>

<input type="hidden" name="currency_code" value="USD" />

<input type="hidden" name="return" value="http://localhost/oci/paymentsuccess.php"/>

</form>

<script>
document.getElementById("buyCredits").submit();
</script>