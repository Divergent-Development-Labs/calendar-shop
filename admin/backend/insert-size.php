<?php
    include '../session-checking.php';
    include '../db/connection.php';

    if(isset($_POST["newSizeSaveBtn"])) {
        $width = mysqli_real_escape_string($conn, $_POST["newSizeWidth"]);
        $height = mysqli_real_escape_string($conn, $_POST["newSizeHeight"]);
        $size_label = mysqli_real_escape_string($conn, $_POST["newSizeLabel"]);
        $rate = mysqli_real_escape_string($conn, $_POST["newSizeRate"]);

        $sql = "INSERT INTO `size` (`width`, `height`, `size_label`, `rate`) VALUES ('$width', '$height', '$size_label', '$rate')";
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            header('Location: ../sizes.php');
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
