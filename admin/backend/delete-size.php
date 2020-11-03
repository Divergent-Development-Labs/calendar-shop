<?php
    include '../session-checking.php';
    include '../db/connection.php';

        $id = $q = intval($_GET['id']);
        
        if(!$id || $id == '' || $id == null){
            $_SESSION["msg"] = 'Something went wrong. Size ID required';
        }

        $sql = "DELETE FROM `size` WHERE `size`.`id` = $id";

        if ($conn->query($sql) === TRUE) {
            $_SESSION["msg"] = 'Size "' . $name . '" is deleted Successfully';
            header('Location: ../sizes.php');
            // echo 'last id : ' . $last_id;
            echo "Record deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }    

?>
