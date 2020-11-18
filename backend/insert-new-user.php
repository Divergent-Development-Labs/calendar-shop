<?php

include '../admin/db/connection.php'; 
session_start();

if(isset($_POST["register_btn"])) {
    $name = mysqli_real_escape_string($conn, $_POST["user_name"]);        
    $mobile_number = mysqli_real_escape_string($conn, $_POST["user_phone"]);
    $email = mysqli_real_escape_string($conn, $_POST["user_email"]);
    $address_line = mysqli_real_escape_string($conn, $_POST["user_address_1"]);
    $area = mysqli_real_escape_string($conn, $_POST["user_address_2"]);
    $district = mysqli_real_escape_string($conn, $_POST["user_city"]);
    $state = mysqli_real_escape_string($conn, $_POST["user_state"]);
    $pincode = mysqli_real_escape_string($conn, $_POST["user_postcode"]);

    $sql = "INSERT INTO `customer` (`name`, `mobile_number`, `email`, `address_line`, `area`, `district`, `state`, `pincode`) VALUES ('$name', '$mobile_number', '$email', '$address_line', '$area', '$district', '$state', '$pincode')";
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        header('Location: ../my-account.php');
        $_SESSION["msg"] = 'New User Details registered Successfully!!';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header('Location: ../500.php');
    }    
}
else{
    session_destroy();
    header('Location: ../404.php');
} 
