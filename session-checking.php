<?php 
    session_start();
    if(isset($_SESSION["userId"])){
    }
    else{
        header('Location: index.php');    
    }
?>