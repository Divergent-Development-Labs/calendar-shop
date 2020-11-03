<?php
    include '../db/connection.php';

    session_start();
    $_SESSION['username'] = null;
 
    if(isset($_POST["loginBtn"])) {
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $password = filter_var(base64_encode($_POST['password']), FILTER_SANITIZE_STRING);
        echo $username, $password;

        $sql="SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'";
    
        $result = mysqli_query($conn,$sql);
        
        if (mysqli_num_rows($result) > 0) 
        {
            while ($row = $result->fetch_assoc()) {
                if(!empty($row["name"])) {
                    echo $displayName = ucwords($row["name"]);
                }
                else {
                    echo $displayName = ucwords($row["username"]);
                }                    
            }
            
            $_SESSION["username"] = $displayName;

            header('location: ../dashboard.php');
        }
        else{
            echo $_SESSION["msg"] = "Invalid Credentials";  
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }
    else{
        session_destroy();
        header('Location: ../index.php');    
    } 
?>
