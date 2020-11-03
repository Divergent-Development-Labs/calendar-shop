<?php
    include '../session-checking.php';
    include '../db/connection.php';

        $id = $q = intval($_GET['id']);
        
        if(!$id || $id == '' || $id == null){
            $_SESSION["msg"] = 'Something went wrong. Project ID required';
        }

        $sql = "DELETE FROM `project` WHERE `project`.`id` = $id";

        if ($conn->query($sql) === TRUE) {
            $_SESSION["msg"] = 'Project "' . $name . '" is deleted Successfully';
            header('Location: ../project.php');
            // echo 'last id : ' . $last_id;
            echo "Record deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }    

?>
