<?php

include './admin/db/connection.php';

// Check if image file is a actual image or fake image
if(isset($_POST["submit"]) && isset($_POST["userId"])) {
  
  $user_id =  mysqli_real_escape_string($conn, $_POST["userId"]);
  
  $target_dir = "public/".$user_id."/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $isUploaded = false;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if folder already exists
if( !is_dir($target_dir) ) {
    mkdir($target_dir, 0755, true);
}
  
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {      
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    echo $target_dir+$target_file;
    $isUploaded = true;
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

if($isUploaded){
    $file_name =  mysqli_real_escape_string($conn, htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])));
    $design_link =  mysqli_real_escape_string($conn, $target_file);
    
    $is_custom_design =  mysqli_real_escape_string($conn, 'true');
    
    $arr = explode(".", $file_name, 2);
    $name = $arr[0];
    
    // echo $username, $password;
    $sql = "INSERT INTO `design` (`name`, `design_link`, `is_custom_design`, `user_id`) VALUES ('$name', '$design_link', '$is_custom_design', '$user_id')";
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        header('Location: shop.php');
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }    
}
?>