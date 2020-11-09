<?php
    include '../admin/db/connection.php';

    if(isset($_POST["update_cart"])) {
        $carts = mysqli_real_escape_string($conn, $_POST['cartData']);

        $arr = null;
        $arr = json_decode($_POST['cartData']);
        
        print_r($arr);

        foreach($arr as $k1 => $v1){
            // echo $k1;
            foreach ($arr[$k1] as $k => $v) {
                switch ($k) {
                    case 'cart_id':
                        # code...
                        $cart_id = $v;
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

            echo '<br>'.$cart_id;

            $sql2 = "UPDATE `carts` SET `rate` = '$rate', `quantity` = '$quantity', `cost` = '$cost' WHERE `carts`.`id` = '$cart_id'";

            if ($conn->query($sql2) === TRUE) {
                $last_id = $conn->insert_id;
                $_SESSION["msg"] = '<br> Carts updated Successfully. cart id : ' . $cart_id;
                header('Location: ../cart.php');
            } else {
                echo "Error: " . $sql2 . "<br>" . $conn->error;
                header('Location: ../500.php');
            }    

            echo $sql2;

        }
    }
    else{
        session_destroy();
        header('Location: ../index.php');    
    } 
?>
    