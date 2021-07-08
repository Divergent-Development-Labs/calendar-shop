<?php
if(isset($_POST['sendMail'])){
    $to = "ranjithjikumarji@gmailc.com";
    $subject = "My subject";
    $txt = "Hello world!";
    $headers = "From: sgrkranjithkumar@gmail.com";

    mail($to,$subject,$txt,$headers);

    try {
        //code...
        mail("sgrkranjithkumar@gmail.com","My subject",$msg);
    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
    }
    // send email

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

    try {
        //code...
        mail($to,$subject,$message,$headers);
    } catch (\Throwable $th) {
        //throw $th;
        echo 'alert("Failed: Mail Cannot Sent. Try again!!.")';
        echo $th;
    }
}
?>
