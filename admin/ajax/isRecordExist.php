<?php 
include '../db/connection.php';

if(isset($_POST['searchTxt'])) {
    $searchTxt = $_POST["searchTxt"];
    $table = $_POST["table"];
    $field = $_POST["field"];

    $sql="SELECT `$field` FROM `$table` WHERE `$field`='$searchTxt'";

    $result = mysqli_query($conn,$sql);
    
    if (mysqli_num_rows($result) > 0) 
    {
        echo '1';
    }
    else{
        echo '2';
    }
}
?>