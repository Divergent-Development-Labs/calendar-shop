<?php 
session_start();
echo $_SESSION["userId"] = 'none';
echo $userId = null;
session_destroy();
header("Location: index.php");
?>
