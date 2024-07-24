
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: lightgray;
        }
        .content-table{
            border-collapse: collapse;
            /* margin: 200px ; */
            font-size: 0.9em;
            min-width: 600px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            height: 400px;
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
            font-weight: bold;
        }

        .content-table th,
        .content-table td{
            padding: 12px 15px;s
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

        .content-table tbody tr td img{
            width: 60px; height: 60px;

        }
 
         /* .review {
             align-items: right;
            
        }    
         */

    </style>
    
        
   
   
</head>

<body>
    <?php
    session_start();
    include "connect.php";

        $sessionid = $_SESSION['ID'];
        $user_id = $sessionid['USER_ID'];
        echo $user_id;
        //$sql2 = 'SELECT * FROM PRODUCT,ORDER_DETAILS WHERE PRODUCT_ID=FK2_PRODUCT_ID AND FK3_USER_ID = :user_id';
        // $sql2 = 'SELECT * FROM CART_DETAILS INNER JOIN CART ON CART_ID  = FK1_CART_ID  WHERE FK1_USER_ID = USER_ID ORDER BY CD_ID DESC';

        // $sql2 = 'SELECT * FROM CUSTOMER_ORDER INNER JOIN USERS ON FK5_USER_ID = :user_id INNER JOIN ORDER_DETAILS ON ORDER_ID = OD_ID INNER JOIN PRODUCT ON FK2_PRODUCT_ID = PRODUCT_ID';
        $sql2 = 'SELECT DISTINCT PRODUCT_NAME,PRODUCT_IMAGE,ORDER_DATE, ALLERGY_INFORMATION FROM PRODUCT,CUSTOMER_ORDER,USERS,ORDER_DETAILS WHERE FK2_PRODUCT_ID = PRODUCT_ID AND FK1_ORDER_ID = ORDER_ID AND FK5_USER_ID = :user_id';
        $stid2 = oci_parse($conn,$sql2);
        oci_bind_by_name($stid2, ':user_id', $user_id);

        oci_execute($stid2);
        $row2 = oci_fetch_array($stid2, OCI_ASSOC);

        echo"<table class='content-table'>";
        echo"<caption>Recent Orders</caption>";
        echo"<thead>";
            echo"<tr>";
                echo"<th> Image</th>";
                echo"<th> Name</th>";
                echo"<th>Ordered Date</th>";
                echo"<th> Description</th>";
               
            echo"</tr>";
        echo"</thead>";

        if (oci_execute($stid2)>0){
        while ($row2=oci_fetch_array($stid2, OCI_ASSOC)){
            $PRODUCT_NAME = $row2['PRODUCT_NAME'];
            $ORDER_DATE = $row2['ORDER_DATE'];
            $ALLERGY_INFORMATION = $row2['ALLERGY_INFORMATION'];

        echo"<tbody>";
            echo"<tr>";
                echo"<td><img src='Images/".$row2['PRODUCT_IMAGE']."'></td>";
                echo"<td>".$row2['PRODUCT_NAME']."</td>";
                echo"<th>".$row2['ORDER_DATE']."</th>";
                 echo"<th>".$row2['ALLERGY_INFORMATION']."</th>";
             
            echo"</tr>";
            

        echo"</tbody>";
    }
}
       
    echo"</table>";
    ?>
    <br>
    

 
    
</body>

</html>