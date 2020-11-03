<?php
    include '../session-checking.php';
    include '../db/connection.php';
    if(isset($_POST["saveBtn"])) {
        $project_name = mysqli_real_escape_string($conn, $_POST["projectName"]);
        $project_type = mysqli_real_escape_string($conn, $_POST["projectType"]);
        $project_status = mysqli_real_escape_string($conn, $_POST["projectStatus"]);
        $bhk_or_sqft = mysqli_real_escape_string($conn, $_POST["bhkOrSqftType"]);

        $img_link = mysqli_real_escape_string($conn, $_POST['imgLink']);
        $pdf_link = mysqli_real_escape_string($conn, $_POST["pdfLink"]);
        $sitemap_link = mysqli_real_escape_string($conn, $_POST["sitemapLink"]);
        $youtube_link = mysqli_real_escape_string($conn, $_POST["youtubeLink"]);

        $address_line_1 = mysqli_real_escape_string($conn, $_POST["addressLine1"]);
        $address_line_2 = mysqli_real_escape_string($conn, $_POST["addressLine2"]);
        $district = mysqli_real_escape_string($conn, $_POST["district"]);
        $state = mysqli_real_escape_string($conn, $_POST["state"]);
        $pin_code = mysqli_real_escape_string($conn, $_POST["pinCode"]);
        
        $anamatics = mysqli_real_escape_string($conn, $_POST["anamatics"]);
        $sirena_features = mysqli_real_escape_string($conn, $_POST["sirena_features"]);

        function get_string_between($string, $start, $end){
            $string = ' ' . $string;
            $ini = strpos($string, $start);
            if ($ini == 0) return '';
            $ini += strlen($start);
            $len = strpos($string, $end, $ini) - $ini;
            return substr($string, $ini, $len);
        }
        
        function get_string($string, $start){
            $string = ' ' . $string;
            $ini = strpos($string, $start);
            if ($ini == 0) return '';
            $ini += strlen($start);
            // $len = strpos($string, $ini);
            return substr($string, $ini);
        }

        $fullstring = $img_link;

        $parsed_img_link = get_string_between($fullstring, 'file/d/', '/view?');

        $parsed_sitemap_link = get_string_between($sitemap_link, 'file/d/', '/view?');

        $parsed_youtube_link = get_string($youtube_link, 'youtu.be/', '');

        echo $parsed_youtube_link;
        
        // echo $username, $password;
        $sql = "INSERT INTO `project` (`project_name`, `project_type`, `bhk_or_sqft`, `project_status`, `img_link`, `pdf_link`, `sitemap_link`, `youtube_link`, `anamatics`, `sirena_features`, `address_line_1`, `address_line_2`, `district`, `state`, `pin_code`) VALUES ('$project_name', '$project_type', '$bhk_or_sqft', '$project_status', '$parsed_img_link', '$pdf_link', '$parsed_sitemap_link', '$parsed_youtube_link', '$anamatics', '$sirena_features','$address_line_1', '$address_line_2', '$district', '$state', '$pin_code')";
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            $_SESSION["msg"] = 'Project added Successfull. Project id : ' . $last_id;
            header('Location: ../project.php');
            // echo 'last id : ' . $last_id;
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
