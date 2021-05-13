<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = $class = "";
$totalClassSize = 0;
$webClassSize = 0;
$cppClassSize = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])){
      echo "<script>alert('first name is required')</script>";
  } elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST["fname"])) {
    echo "<script>alert('First name should contain only letters and white space')</script>";
  } else {
    $fname = test_input($_POST["fname"]);
  }

  if (empty($_POST["lname"])){
      echo "<script>alert('Last name is required')</script>";
  }elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST["lname"])) {
    echo "<script>alert('Last name should contain only letters and white space')</script>";
  }else {
    $lname = test_input($_POST["lname"]);
  }


  if (empty($_POST["email"])){
      echo "<script>alert('Email required')</script>";
  }else {
    $email = test_input($_POST["email"]);
  }
  if (empty($_POST["city"])){
      echo "<script>alert('City is required')</script>";
  }else {
    $city = test_input($_POST["city"]);
  }
  if (empty($_POST["pnumber"])){
      echo "<script>alert('Phone number is required')</script>";
  }else {
    $phnumber = test_input($_POST["pnumber"]);
  }
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
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
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
    <link href='https://fonts.googleapis.com/css?family=Alata' rel='stylesheet'>
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
        <a href="index.php">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </div>

    <div class="parallax">
        <div class="content" >
            <h3 id="cont">Scroll Down To Begin</h3>
        </div>
    </div>
    <div class="choice" id="choice">
        <h3>What do you want to learn?</h3>
        <div class="sector">
            <a href="javascript:void(0)" onclick="cppForm()">Programming(C++)</a>
        </div>
        <div class="sector">
            <a href="javascript:void(0)" onclick="webDev()">Web Development</a>
        </div>
    </div>

    <div class="formContainer">
        <button class="back" id="back" onclick="backToLearn()" title="Close form">&times;</button>
        <h2 id="head">Fill this Form to begin</h2>
        <p class="error" id="head2">All fields are required</p>
        <p>
          <?php
            if (mail($to,$subject,$message,$headers)){
              echo "Response has been sent successfully";
            } else {
              echo "Response failed to send, please  try again later";
            }

          ?>
        </p>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="myForm" onsubmit="return formValidate();" id="cpp">
            <label for="class">Class</label>
            <input type="text" name="class" id="class" value="Programming(C++)" readonly>
            <div class="name">
                <div>
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" placeholder="Enter your first name" >
                </div>

                <div>
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" placeholder="Enter your last name" >    
                </div>
            </div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="example@email.com">
            <label for="pnumber">Phone Number</label>
            <input type="tel" name="pnumber" id="pnumber" placeholder="Enter your phone number" >
            <label for="City">City</label>
            <input type="text" name="city" id="city" placeholder="Enter your city of residence" > 
            

            <input type="submit" value="Send">

            <input type="reset" value="Clear">

        </form>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="myForm" onsubmit="return formValidate();" id="web">
            <label for="class">Class</label>
            <input type="text" name="class" id="class" value="Web Development" readonly>
            <div class="name">
                <div>
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" placeholder="Enter your first name" >
                </div>

                <div>
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" placeholder="Enter your last name" >    
                </div>
            </div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="example@email.com">
            <label for="pnumber">Phone Number</label>
            <input type="tel" name="pnumber" id="pnumber" placeholder="Enter your phone number" >
            <label for="City">City</label>
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