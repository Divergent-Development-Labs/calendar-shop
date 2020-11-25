
<?php

include '../admin/db/connection.php'; 

session_start();
    
if(isset($_POST["removeItem"])) {
    $cart_id = mysqli_real_escape_string($conn, $_POST["removeItem"]);
    
    $sql2 = "DELETE FROM `carts` WHERE `carts`.`id` = $cart_id";

    if ($conn->query($sql2) === TRUE) {        
        header('Location: ../index.php');
        echo "1";
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
        header('Location: ../500.php');
    }    
}
else{
    session_destroy();
    echo 'cart id required';
    header('Location: ../index.php');    
} 
    


?>
    