<?php

//Local
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "eakmartc_cal_proj";

//Production
$servername = "localhost";
$username = "eakmartc_cal_proj";
$password = "@Calproj2020";
$dbname = "eakmartc_cal_proj";

// Create connection

// var_dump(mysqli_connect($servername, $username, $password, $dbname));
$conn =mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection  failed: " . $conn->connect_error);
}

ini_set('precision', 10);
ini_set('serialize_precision', 10);

?>
