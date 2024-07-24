<?php 
include "connect.php";

if(isset($_POST['btnSubmit']))
    {
        $sql1 = 'SELECT * FROM PRODUCT,CART_DETAILS WHERE PRODUCT_ID=FK2_PRODUCT_ID';
                        $stid1 = oci_parse($conn,$sql1);

                        oci_execute($stid1);
                        while (($row = oci_fetch_assoc($stid1)) != false){
        $prod_id = $row['FK2_PRODUCT_ID'];

        $quantity = $_POST['Prodquantity'];
        echo $quantity;
        $sql3 = 'INSERT INTO ORDER_DETAILS(OD_ID,quantity,FK1_ORDER_ID,FK2_PRODUCT_ID) VALUES (NULL,:quantity,null,:prod_id)';
                                $stid3 = oci_parse($conn,$sql3);
                                oci_bind_by_name($stid3, ':quantity', $quantity);
                                oci_bind_by_name($stid3, ':prod_id', $prod_id);
                                if(oci_execute($stid3)){
                                    echo $prod_id;
                                    echo "order details created";

                                }
    }
}
    //echo "<script>window.location.href='addToOrder.php';</script>";
   // echo '<a href= "crud.php">Go to List Page</a>';

    
?>