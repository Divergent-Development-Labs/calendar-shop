<?php
if(isset($_POST['sendMail'])){
    // $to = "sgrkranjithkumar@gmail.com"; // this is your Email address
    $to = "ranjithjikumarji@gmail.com"; // this is your Email address
    $from = $_POST['your-email']; // this is the sender's Email address

    $name = $_POST['your-name'];
    $subject = $_POST["your-subject"];

    // $mobile_number = $_POST['form_mnumber'];

    $message = $name . " "  . " wrote the following:" . "\n\n" . $_POST['your-message'];
    // $message .= "\r\n \r\n". "Contact Number: ".$mobile_number;

    $headers = "From:" . $from;

    echo $name;
    echo $subject;
    echo $from;
    echo $to;
    echo $_POST['your-message'];

    if(mail($to,$subject,$message,$headers)){
        // sends a copy of the message to the sender
        echo '<script language="javascript">';
        echo 'alert("Mail Sent. Thank you ' . $name . ', we will contact you shortly.")';
        echo '</script>';
        // header('Location: ./contact-us.php');        
    }
    else{
        echo 'alert("Failed: Mail Cannot Sent. Try again!!.")';
    }
    }
?>
