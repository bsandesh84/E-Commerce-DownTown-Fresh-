<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            /*background-color: lightgray;*/
        }
        .content-table{
            border-collapse: collapse;
            /* margin: 200px ; */
            font-size: 0.9em;
            min-width: 600px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            margin-left: 310px;
            margin-top: 100px;
        }
        .content-table caption{
            font-style:inherit; font-size: 30px; font-weight: bold; padding:5px;
        }

        .content-table thead tr{
            background-color: gray;
            color: black;
            text-align: left;
            /*font-weight: bold;*/
        }

        .content-table th,
        .content-table td{
            padding: 12px 15px;
        }

        .content-table tbody tr{
            border-bottom: 1px solid black;
        }

        .content-table tbody tr:nth-of-type(even) {
            background-color: lightslategray;
        }

        .content-table tbody tr: last-of-type-{
            border-bottom: 2px solid black;
        }

    </style>
    
        
   
   
</head>

<body>
    <?php
    include "connect.php";

        $sessionid = $_SESSION['ID'];
        $user_id = $sessionid['USER_ID'];
        $sql2 = 'SELECT OD_ID,FIRSTNAME,LASTNAME,PRODUCT_NAME,PRODUCT_STOCK,ORDER_DATE,COLLECTION_DAY,COLLECTION_TIME FROM USERS, PRODUCT, CUSTOMER_ORDER, ORDER_DETAILS, COLLECTION_SLOT 
WHERE FK3_USER_ID = :user_id AND PRODUCT_ID = FK2_PRODUCT_ID AND ORDER_ID = 
FK1_ORDER_ID AND SLOT_ID = FK3_SLOT_ID AND FK5_USER_ID = USER_ID';
        $stid2 = oci_parse($conn,$sql2);
        oci_bind_by_name($stid2, 'user_id', $user_id);
        oci_execute($stid2);
        $row2 = oci_fetch_array($stid2, OCI_ASSOC);

        echo"<table class='content-table'>";
        echo"<caption>Recent Orders</caption>";
        echo"<thead>";
            echo"<tr>";
                echo"<th> Order ID</th>";
                echo"<th>First Name</th>";
                echo"<th>Last Name</th>";
                echo"<th>Product Name</th>";
                echo"<th>Product Stock</th>";
                echo"<th> Ordered Date</th>";
                echo"<th>Collection Day</th>";
                echo"<th>Collection Time</th>";
               
            echo"</tr>";
        echo"</thead>";

        if (oci_execute($stid2)>0){
        while ($row2=oci_fetch_array($stid2, OCI_ASSOC)){
            $PRODUCT_NAME = $row2['PRODUCT_NAME'];
            // $QUANTITY = $row2['QUANTITY'];

        echo"<tbody>";
            echo"<tr>";
                // echo"<th>".$row2['OD_ID']."</th>";
                // echo"<th>".$row2['FIRSTNAME']."</th>";
                // echo"<th>".$row2['LASTNAME']."</th>";
                // echo"<td>".$row2['ORDER_DATE']."</td>";
                // echo"<td>".$row2['PRODUCT_NAME']."</td>";

                echo"<th>".$row2['OD_ID']."</th>";
                echo"<th>".$row2['FIRSTNAME']."</th>";
                echo"<th>".$row2['LASTNAME']."</th>";
                echo"<td>".$row2['PRODUCT_NAME']."</td>";
                echo"<td>".$row2['PRODUCT_STOCK']."</td>";
                echo"<td>".$row2['ORDER_DATE']."</td>";
                echo"<td>".$row2['COLLECTION_DAY']."</td>";
                echo"<td>".$row2['COLLECTION_TIME']."</td>";

             
            echo"</tr>";
            

        echo"</tbody>";
    }
}
       
    echo"</table>";
    ?>
    <br>
    

 
    
</body>

</html>