<?php
    include '../session-checking.php';
    include '../db/connection.php';

        $id = $q = intval($_GET['id']);
        
        if(!$id || $id == '' || $id == null){
            $_SESSION["msg"] = 'Something went wrong. Design ID required';
        }

        $sql = "DELETE FROM `orders` WHERE `orders`.`id` = $id";
        $sql2 = "DELETE FROM `products` WHERE `products`.`order_id` = $id";

        if (($conn->query($sql) === TRUE) && ($conn->query($sql2) === TRUE)) {
            header('Location: ../orders.php');
            echo "Record deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }    

?>
