<?php
	include"connect.php";
	session_start();

    $day_Slot = $_SESSION['day_Slot'];

    $time_Slot = $_SESSION['time_Slot'];


    $sql2 = 'INSERT INTO COLLECTION_SLOT VALUES(null,:day_Slot,:time_Slot) ';
    $stid2 = oci_parse($conn,$sql2);
    oci_bind_by_name($stid2, ':day_Slot', $day_Slot);
    oci_bind_by_name($stid2, ':time_Slot', $time_Slot);
    oci_execute($stid2);
	
	$id = $_SESSION['ID'];
	$user_id = $id['USER_ID'];
	$default_input = "weekly";

	$sql = 'SELECT * FROM PRODUCT,CART_DETAILS WHERE PRODUCT_ID=FK2_PRODUCT_ID';
	$stid = oci_parse($conn,$sql);

            oci_execute($stid);
            $row = oci_fetch_array($stid, OCI_ASSOC);

            if (oci_execute($stid)>0){
        while ($row=oci_fetch_array($stid, OCI_ASSOC)){

        	$trader_id = $row['FK3_USER_ID'];

        }
    }

	$query1 = 'INSERT INTO REPORT(REPORT_ID,REPORT_TYPE,NO_OF_ORDERS,INCOME_PER_PRODUCT,ORDER_PER_PRODUCT,FK1_USER_ID) VALUES(null,:default_input,0,0,0,:trader_id)';
    $stid1 = oci_parse($conn,$query1);
   	oci_bind_by_name($stid1, ':default_input', $default_input);
    oci_bind_by_name($stid1, ':trader_id', $trader_id);
    oci_execute($stid1);


    $payment_type = "paypal";
    $total_pay = $_SESSION['pay'];

    $query2 = 'INSERT INTO PAYMENT(PAYMENT_ID,PAYMENT_TYPE,PAYMENT_DATE,TOTAL_PAYMENT,FK1_REPORT_ID,FK2_USER_ID) VALUES(null,:payment_type,sysdate,:total_pay,null,:user_id)';
    $stid2 = oci_parse($conn,$query2);
   	oci_bind_by_name($stid2, ':payment_type', $payment_type);
   	oci_bind_by_name($stid2, ':total_pay', $total_pay);
    oci_bind_by_name($stid2, ':user_id', $user_id);
    oci_execute($stid2);

    $sql = 'SELECT CART_ID FROM CART WHERE FK1_USER_ID =:user_id';
    $stid = oci_parse($conn,$sql);
    oci_bind_by_name($stid, ':user_id', $user_id);
    oci_execute($stid);
    $row = oci_fetch_array($stid, OCI_ASSOC);
    $cart_ID = $row['CART_ID'];

    $sql1 = 'SELECT * FROM CART,CART_DETAILS WHERE CART_ID = :cart_ID AND FK1_USER_ID = :user_id and FK1_CART_ID = :cart_ID';
    $parse1 = oci_parse($conn,$sql1);
    oci_bind_by_name($parse1, ':cart_ID', $cart_ID);
    oci_bind_by_name($parse1, ':user_id', $user_id);
    oci_execute($parse1);
    $row1 = oci_fetch_array($parse1, OCI_ASSOC);

    if (oci_execute($parse1)>0){

       while ($row1 = oci_fetch_array($parse1, OCI_ASSOC)){

        	$cart_quantity = $row1['QUANTITY'];
        	$prod_ID = $row1['FK2_PRODUCT_ID'];
    
            $order_quantity = oci_result($parse1, 'NO_OF_ITEMS');
            
        } 

        }      

	$query3 = 'INSERT INTO CUSTOMER_ORDER(ORDER_ID,ORDER_DATE,QUANTITY,FK1_CART_ID,FK2_PAYMENT_ID,FK3_SLOT_ID,FK4_REPORT_ID,FK5_USER_ID) VALUES (null,sysdate,:order_quantity,:cart_ID,null,null,null,:user_id)';
    $stid3= oci_parse($conn,$query3);
    oci_bind_by_name($stid3, ':cart_ID', $cart_ID);
    oci_bind_by_name($stid3, ':user_id', $user_id);
    oci_bind_by_name($stid3, ':order_quantity', $order_quantity);
	oci_execute($stid3);
	    

	if (oci_execute($parse1)>0){

       while ($row1 = oci_fetch_array($parse1, OCI_ASSOC)){

        	$cart_quantity = $row1['QUANTITY'];
        	$prod_ID = $row1['FK2_PRODUCT_ID'];

            $query4 = 'INSERT INTO ORDER_DETAILS VALUES (null,:cart_quantity,null,:prod_ID)';
    		$stid4= oci_parse($conn,$query4);
    		oci_bind_by_name($stid4, ':cart_quantity', $cart_quantity);
    		oci_bind_by_name($stid4, ':prod_ID', $prod_ID);

    		if(oci_execute($stid4)){
                header("location:goToInvoice.php");
                $token = bin2hex(random_bytes(15));
                $to = $_SESSION['email'];
                $subject = "Email Activation";
                $message = "Hi. Click here to check your account http://localhost/oci/invoice.php?token=$token";
                if (mail($to, $subject, $message))
                {
                    header("location:goToInvoice.php");
                }

                else{
                    echo "Unable to send email!";
                }
            }
        } 

    }  

?>