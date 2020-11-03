<?php
    include '../session-checking.php';
    include '../db/connection.php';
    if(isset($_POST["saveBtn"])) {
        $name = mysqli_real_escape_string($conn, $_POST["newDesignName"]);

        $design_link = mysqli_real_escape_string($conn, $_POST['newDesignLink']);
        
        function get_string_between($string, $start, $end){
            $string = ' ' . $string;
            $ini = strpos($string, $start);
            if ($ini == 0) return '';
            $ini += strlen($start);
            $len = strpos($string, $end, $ini) - $ini;
            return substr($string, $ini, $len);
        }
        

        $fullstring = $design_link;

        $parsed_design_link = get_string_between($fullstring, 'file/d/', '/view?');
        
        // echo $username, $password;
        $sql = "INSERT INTO `design` (`name`, `design_link`) VALUES ('$name', '$parsed_design_link')";
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            header('Location: ../designs.php');
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }    
    }
    else{
        session_destroy();
        header('Location: ../index.php');    
    } 
?>
