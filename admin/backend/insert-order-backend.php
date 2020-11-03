<?php
    include '../session-checking.php';
    include '../db/connection.php';
    if(isset($_POST["saveBtn"])) {
        $customer_id = mysqli_real_escape_string($conn, $_POST["customer_id"]);
        $products = mysqli_real_escape_string($conn, $_POST['orderData']);
        $subtotal = mysqli_real_escape_string($conn, $_POST["orderSubtotal"]);
        $total = mysqli_real_escape_string($conn, $_POST["orderTotal"]);
        $payment_status = 'false';

        $cgst = mysqli_real_escape_string($conn, $_POST["orderCGST"]);
        $sgst = mysqli_real_escape_string($conn, $_POST["orderSGST"]);

        $gst = $cgst +  $sgst;

        $sql = "INSERT INTO `orders` (`customer_id`, `products`, `subtotal`, `gst`, `total`, `payment_status`) VALUES ('$customer_id', '$products', '$subtotal', '$gst', '$total', '$payment_status')";

        if ($conn->query($sql) === TRUE) {
            $order_id = $conn->insert_id;
            $_SESSION["msg"] = 'Products added Successfull. Order id : ' . $order_id;
            header('Location: ../orders.php');
            echo "New record created successfully";
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
                    case 'size':
                        # code...
                        $size = $v;
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

            $sql2 = "INSERT INTO `products` (`order_id`, `customer`, `size`, `design`, `rate`, `quantity`, `cost`) VALUES ('$order_id', '$customer_id', '$size', '$design', '$rate', '$quantity', '$cost')";

            if ($conn->query($sql2) === TRUE) {
                $last_id = $conn->insert_id;
                $_SESSION["msg"] = 'Products added Successfull. Order id : ' . $last_id;
                header('Location: ../orders.php');
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                header('Location: ../500.php');
            }    
        echo $sql2;

        }

        echo $sql;
    }
    else{
        session_destroy();
        header('Location: ../index.php');    
    } 
?>
    