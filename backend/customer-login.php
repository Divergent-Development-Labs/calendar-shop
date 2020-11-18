<?php
    include '../admin/db/connection.php';

    session_start();
    $_SESSION['userId'] = null;
 
    if(isset($_POST["loginBtn"])) {
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $password = filter_var(($_POST['password']), FILTER_SANITIZE_STRING);
        echo $username, $password;

        $sql="SELECT * FROM `customer` WHERE `name`='$username' AND `mobile_number`='$password'";
    
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
                
                $_SESSION["userId"] = $row['id'];
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);                        
            // header('location: ../shop.php');
        }
        else{
            echo $_SESSION["msg"] = "Invalid Credentials";  
            echo "Error: " . $sql . "<br>" . $conn->error;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }
    else{
        session_destroy();
        header('Location: ../404.php');    
    } 
?>
