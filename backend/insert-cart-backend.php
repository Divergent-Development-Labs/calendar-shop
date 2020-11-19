<?php

include '../admin/db/connection.php'; 
session_start();

if (($_SESSION["userId"]) && ($_SESSION["userId"] != null)) {
    $userId = $_SESSION["userId"];
    
    if(isset($_POST["design_name"]) && isset($_POST["is_custom_design"]) && isset($_POST["design_link"]) && isset($_POST["type"]) && isset($_POST["size"]) && isset($_POST["rate"])) {
        $design_name = mysqli_real_escape_string($conn, $_POST["design_name"]);
        $is_custom_design = mysqli_real_escape_string($conn, $_POST["is_custom_design"]);
        $design_link = mysqli_real_escape_string($conn, $_POST["design_link"]);
        $calendar_type = mysqli_real_escape_string($conn, $_POST["type"]);
        $size = mysqli_real_escape_string($conn, $_POST["size"]);
        $rate = mysqli_real_escape_string($conn, $_POST["rate"]);
        $quantity = '1';
        $cost = mysqli_real_escape_string($conn, $_POST["rate"]);

        $sql2 = "INSERT INTO `carts` (`customer`, `calendar_type`, `size`, `is_custom_design`, `design`, `rate`, `quantity`, `cost`) VALUES ('$userId', '$calendar_type', '$size', '$is_custom_design', '$design_link', '$rate', '$quantity', '$cost')";

        if ($conn->query($sql2) === TRUE) {
            $last_id = $conn->insert_id;
            echo "1";
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
            header('Location: ../500.php');
        }    
    }
    else{
        echo 'Something went Wrong!!';
        session_destroy();
        // header('Location: ../index.php');    
    } 
    
}
else{
    echo '2';
}

?>
    