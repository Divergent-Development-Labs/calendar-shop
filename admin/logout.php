<?php 
session_start();
echo $_SESSION["username"] = null;
echo $_SESSION["accessUserKey"] = null;
session_destroy();
header("Location: index.php");
?>
