<?php

include 'admin/db/connection.php'; 

if (isset($_SESSION["userId"])) {

    
    $id = $_SESSION["userId"];
    $sql="SELECT * FROM `user` WHERE `id`='$id'";
    
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
        while ($row = $result->fetch_assoc()) {

            if(!empty($row["name"])) {
                $displayName = ucwords($row["name"]);
            }
            else {
              $displayName = ucwords($row["userName"]);
            }

                $userId = $row["id"];
                $userName = $displayName;
                $userType = ($row['id'] == 1) ? 'ECM001' : 'ECM002';
        }
    }
    
}
else{
    $userId = null;
    // session_destroy();
    // header("Location: index.php");
}
?>