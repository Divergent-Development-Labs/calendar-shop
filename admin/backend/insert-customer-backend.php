<?php
    include '../session-checking.php';
    include '../db/connection.php';
    if(isset($_POST["saveBtn"])) {
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $mobile_number = mysqli_real_escape_string($conn, $_POST['mobileNumber']);
        $email = mysqli_real_escape_string($conn, $_POST["eMail"]);
        $address_line = mysqli_real_escape_string($conn, $_POST["addressLine1"]);
        $area = mysqli_real_escape_string($conn, $_POST["area"]);
        $district = mysqli_real_escape_string($conn, $_POST["district"]);
        $state = mysqli_real_escape_string($conn, $_POST["state"]);
        $pincode = mysqli_real_escape_string($conn, $_POST["pinCode"]);
        
        // echo $username, $password;
        $sql = "INSERT INTO `customer` (`name`, `mobile_number`, `email`, `address_line`, `area`, `district`, `state`, `pincode`) VALUES ('$name', '$mobile_number', '$email', '$address_line', '$area', '$district', '$state', '$pincode')";
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            $_SESSION["msg"] = 'Supplier added Successfull. Supplier id : ' . $last_id;
            header('Location: ../customers.php');
            // echo 'last id : ' . $last_id;
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }    
    }
    else{
        session_destroy();
        header('Location: ../index.php');    
    } 
?>
    