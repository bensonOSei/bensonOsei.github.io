<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = $class = "";
$totalClassSize = 0;
$webClassSize = 0;
$cppClassSize = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = test_input($_POST["fname"]);
  $lname = test_input($_POST["lname"]);
  $email = test_input($_POST["email"]);
  $phnumber = test_input($_POST["pnumber"]);
  $city = test_input($_POST["city"]);
  $class = test_input($_POST["class"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($class == "Programming(C++)"){
  $totalClassSize += 1;
  $cppClassSize += 1;
} elseif ($class == "Web Development"){
    $totalClassSize += 1;
    $webClassSize += 1;
}

$sendTo = $email;
$subj = "Response recieved";
$htmlContent = file_get_contents("emailmsg.html");
$head = "From: benson@kejetia.online";

mail($sendTo,$subj,$htmlContent,$head);

$to = "benson@kejetia.online";
$subject = "Web Development Masterclass";
$message = "Name: ".$fname." ".$lname. "\r\n"."City = ".$city. "\r\n". "Phone Number = ". $pnumber. "\r\n";
$message .= "Class: ".$class;
$headers = "From: ".$email;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="benson.css">
    <script src="benson.js"></script>
    <title>Benson's Web Masterclass</title>
</head>
<body>
    <div class="header">
        <h1>Benson</h1>
        <div id="nice">
            <h2>Web Development Masterclass</h2>
        </div>
        <div id="nice2">
            <h3>Beginner to Advanced</h3>
        </div>   
    </div>

    <div class="bars" id="bars" onclick="openNav()">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>

    <div class="sideNav" id="sideNav">
        <a href="javascript:void(0)" onclick="closeNav()" class="close">&times;</a>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </div>

    <div class="parallax">
        <div class="content" >
            <h3 id="cont">Scroll Down To Begin</h3>
        </div>
    </div>


    <div class="formContainer">
        <h2>Fill this Form to begin</h2>
        <h3 class="error">* Required</h3>
        <p>
          <?php
            if (mail($to,$subject,$message,$headers)){
              echo "Response has been sent successfully";
            } else {
              echo "Response failed to send, please  try again later";
            }

          ?>
        </p>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="myForm" onsubmit="return formValidate();">
            <div class="name">
                <div>
                    <label for="fname">First Name</label><span class = "error">*</span>
                    <input type="text" name="fname" id="fname" placeholder="Enter your first name" >
                </div>

                <div>
                    <label for="lname">Last Name</label><span class = "error">*</span>
                    <input type="text" name="lname" id="lname" placeholder="Enter your last name" >    
                </div>
            </div>
            <label for="email">Email</label><span class = "error">*</span>
            <input type="email" name="email" id="email" placeholder="example@email.com">
            <label for="pnumber">Phone Number</label><span class = "error">*</span>
            <input type="tel" name="pnumber" id="pnumber" placeholder="Enter your phone number" >
            <label for="City">City</label><span class = "error">*</span>
            <input type="text" name="city" id="city" placeholder="Enter your city of residence" > 
            

            <input type="submit" value="Send">

            <input type="reset" value="Clear">
        </form>
    </div>

    <div class="footer">
        <p>Created by <i>Benson</i></p>
    </div>
    
</body>
</html>