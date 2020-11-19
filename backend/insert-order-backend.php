<?php
    include '../admin/db/connection.php';
    if(isset($_POST["saveBtn"])) {
        $customer_id = $_POST["customer_id"];
        $products = mysqli_real_escape_string($conn, $_POST['orderData']);
        $totalOrderData = json_decode($_POST['totalOrderData']);

        print_r($totalOrderData->subtotalCost);

        $subtotal = $totalOrderData->subtotalCost;
        $total = $totalOrderData->totalCost;

        $payment_status = 'false';

        $gst = $totalOrderData->gst / 2;

        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        $order_date = date("Y-m-d h:i:s");
        // echo date('d-m-Y');

        $sql = "INSERT INTO `orders` (`customer_id`, `products`, `subtotal`, `gst`, `total`, `payment_status`, `order_date`) VALUES ('$customer_id', '$products', '$subtotal', '$gst', '$total', '$payment_status', '$order_date')";

        if ($conn->query($sql) === TRUE) {
            $order_id = $conn->insert_id;
            echo "New Order created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            header('Location: ../500.php');
        }    

        $arr = null;
        $arr = json_decode($_POST['orderData']);

        foreach($arr as $k1 => $v1){
            echo $k1;
            foreach ($arr[$k1] as $k => $v) {
                switch ($k) {
                    case 'calendar_type':
                        # code...
                        $calendar_type = $v;
                        break;
                    case 'size':
                        # code...
                        $size = $v;
                        break;
                    case 'is_custom_design':
                        # code...
                        $is_custom_design = $v;
                        break;    
                    case 'design':
                        # code...
                        $design = $v;
                        break;
                    case 'rate':
                        # code...
                        $rate = $v;
                        break;
                    case 'quantity':
                        # code...
                        $quantity = $v;
                        break;
                    case 'cost':
                        # code...
                        $cost = $v;
                        break;
                        
                    default:
                        # code...
                        break;
                }
            }    

            $sql2 = "INSERT INTO `products` (`order_id`, `customer`, `calendar_type`, `size`, `is_custom_design`, `design`, `rate`, `quantity`, `cost`) VALUES ('$order_id', '$customer_id', '$calendar_type', '$size', '$is_custom_design', '$design', '$rate', '$quantity', '$cost')";

            if ($conn->query($sql2) === TRUE) {
                $last_id = $conn->insert_id;
                echo "New Order Products created successfully";
            } else {
                echo "Error: " . $sql2 . "<br>" . $conn->error;
                header('Location: ../500.php');
            }    

            echo $sql2;

        }

        $sql3 = "DELETE FROM `carts` WHERE `carts`.`customer` = $customer_id";

        if($conn->query($sql3) === TRUE){
            header('Location: ../cart.php');
        }
        
        echo $sql;
        echo $sql3;
    }
    else{
        session_destroy();
        header('Location: ../index.php');    
    } 
?>
    