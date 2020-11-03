<?php 
include '../db/connection.php';

if(isset($_POST['retriveTxt'])) {
    $retriveTxt = $_POST["retriveTxt"];
    $table = $_POST["table"];
    $field = $_POST["field"];
    $retrieveFields = $_POST["retrieveFields"];

    $stmt = $conn->prepare("SELECT `$retrieveFields` FROM `$table` WHERE `$field` LIKE '%$retriveTxt%'");
    
    // $stmt->bind_param("?", 5);
    $stmt->execute();
    $result = $stmt->get_result();
    $outp = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($outp);
    // echo ' ji';
}
?>