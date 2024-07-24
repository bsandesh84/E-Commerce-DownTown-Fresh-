<?php
$to = "bibishabishwokarma@gmail.com";
$subject = "Hello!!";
$message = "Is it working???";
if (mail($to, $subject, $message))
{
	echo "email sent";
}

else{
	echo "Unable to send email";
}

?>