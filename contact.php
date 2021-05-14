<?php

$fname = $lname = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"=="POST"]){
    $fname = test_input($_POST["fname"]);
    $lname = test_input($_POST["lname"]);
    $email = test_input($_POST["email"]);
    $message = test_input($_POST["message"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $to = $email;
  $subject = "Response recieved";
  $msg = file_get_contents("emailmsg.html");
  $header = 'Content-type: text/html; charset=utf-8' . "\r\n";
  $header .= "From: benson@kejetia.online";

  mail($to,$subject,$msg,$header);

  $sendTo = "benson@kejetia.online";
  $subj = "Contact Form";
  $messg = "Name: ".$lname." ".$fname."\r\n"."Message: \r\n". $message;
  $head = "From: ".$email;



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="benson.css">
    <script src="benson.js"></script>
    <title>Contact</title>
    <link href='https://fonts.googleapis.com/css?family=Alata' rel='stylesheet'>
</head>
<body>
    <div class="header">
        <h1><a href="index.html">Benson</a></h1>
        <div id="nice">
            <h2>Programming Masterclass</h2>
        </div>
        <div id="nice2">
            <h3>Contact Form</h3>
        </div>   
    </div>

    <div class="intro">
        <p>Fill the form below for any enquiries. We will respond as soon as 
            possible, thank you.
        </p>
    </div>

    <div class="bars" id="bars" onclick="openNav()">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>

    <div class="sideNav" id="sideNav">
        <a href="javascript:void(0)" onclick="closeNav()" class="close">&times;</a>
        <a href="index.html">Home</a>
        <a href="about.html">About</a>
        <a href="contact.html">Contact</a>
    </div>

    <div class="formContainer">
        <p style = "text-align:center"><?php
        if (mail($sendTo,$subj,$messg,$head)){
            echo "Your message has been send successfully";
        } else {
            echo "Message failed to send, please try again";
        }
        ?>
        </p>

        <p>Go to <a href="index.html">Homepage</a></p>
    </div>




    <div class="footer">
        <p>Created by <i>Benson</i></p>
    </div>
    
</body>
</html>