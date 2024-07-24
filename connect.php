<?php $conn = oci_connect('DownTownFreshS', 'DownTownFreshS', '//localhost/XE'); 
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit; } else {
   // print "Connected to Oracle!"; 
   } 
    // oci_close($conn); 
    ?>