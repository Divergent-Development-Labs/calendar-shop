<?php
if(isset($_POST['submit'])){
    $to = "jemibalamkt2010@gmail.com"; // this is your Email address
    $from = $_POST['form_email']; // this is the sender's Email address

    $name = $_POST['form_name'];
    $subject = $_POST["form_subject"];

    $message = $name . " "  . " wrote the following:" . "\n\n" . $_POST['form_message'];
   $name . "\n\n" . $_POST['form_message'];

    $headers = "From:" . $from;

    mail($to,$subject,$message,$headers);
    // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
    header('Location: /index.php');
    }
?>
