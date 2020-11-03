<?php 
include '../db/connection.php';

if(isset($_POST['orderId']) && isset($_POST['isPaid'])) {

    $orderId = $_POST["orderId"];
    $isPaid = $_POST["isPaid"];
    
    $table = 'orders';
    $field = 'payment_status';

    $sql = "UPDATE `$table` SET `$field` = '$isPaid' WHERE `$table`.`id` = $orderId";

    if ($conn->query($sql) === TRUE) {
        echo '1';
    }
    else{
        echo '2';
    }

}
?>