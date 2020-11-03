<?php 
    session_start();
    if(isset($_SESSION["username"])){
        if($_SESSION["username"] != 'Admin'){
            header('Location: index.php');
        }
    }
    else{
        header('Location: index.php');    
    }
?>