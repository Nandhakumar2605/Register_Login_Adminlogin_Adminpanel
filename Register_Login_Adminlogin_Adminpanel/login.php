<?php
session_start();
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_connect";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form validation and login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    // Validate form inputs
    $errors = array();
    if (empty($email)) {
        $errors[] = '<script>alert("Email is required"); window.location.href = "login.php";</script>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = '<script>alert("Invalid email format"); window.location.href = "login.php";</script>';
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {
        
        $sql = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION["email"]=$email;
            echo '<script type="text/javascript">
            window.alert("Login successfully!");
            window.location.href = "index.php";</script>';
           
           
        } else {
            echo "Invalid email or password.";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>Own Project Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<style>
    * {
box-sizing: border-box;
color: #0c0d1f;
font: 400 15px 'Didact Gothic', sans-serif;
}
*::after, *::before {
box-sizing: inherit;
}
html, body {
font: 400 15px 'Didact Gothic', sans-serif;
height: 100%;
margin: 0;
overflow: hidden;
padding: 0;
width: 100%;
}
body {
background-attachment: fixed;
background-image: url(https://static.pexels.com/photos/4827/nature-forest-trees-fog.jpeg);
background-position: center;
background-repeat: no-repeat;
background-size: cover;
color: #0c0d1f;
position: relative;
}
a {
color: blue;
text-decoration: none;
}
a:hover {
text-decoration: underline;
}
label {
display: block;
}
input {
background: transparent;
border: none;
border-bottom: 1px solid rgba(0, 0, 0, 0.2);
display: block;
outline: none;
padding: 0 8px 8px 30px;
position: relative;
-webkit-transition: all 0.2s ease-in-out;
transition: all 0.2s ease-in-out;
width: 100%;
}
input:focus {
border-bottom-color: #0c0d1f;
}
.row::after {
clear: both;
content: '';
display: block;
width: 100%;
}
.col {
border-radius: inherit;
float: left;
margin: 0;
padding: 30px 50px;
position: relative;
}
.col.col-6 {
width: calc(((100% - calc(((12 / 6) - 1) * 0px)) / 12) * 6);
}
.col.col-6:not(:last-child) {
margin: 0 0px 0 0;
}
.login-box {
-webkit-backface-visibility: hidden;
backface-visibility: hidden;
background: rgba(255, 255, 255, 0.05);
border-radius: 1px;
box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.4), 0 0 0 2000px rgba(12, 13, 31, 0.3);
left: 50%;
position: absolute;
top: 50%;
-webkit-transform: translate3d(-50%, -50%, 0) scale(1, 1);
transform: translate3d(-50%, -50%, 0) scale(1, 1);
width: 90%;
max-width: 1000px;
}
.login-title {
background: transparent;
text-shadow: 0 0 15px white;
width: 60%;
}
h1 {
font: 400 48px 'Lobster', cursive;
text-transform: uppercase;
}
.small-text {
font-size: 22px;
}
.login-form {
background: #f9f0ea;
text-align: center;
width: 40%;
}
.login-form > form > *:not(:last-child) {
margin: 0 0 20px;
}
.avatar {
background: white;
border-radius: 50%;
box-shadow: none;
cursor: pointer;
height: 100px;
margin: 0 auto 30px;
position: relative;
-webkit-transition: all 0.3s ease-in-out;
transition: all 0.3s ease-in-out;
width: 100px;
}
.avatar:hover {
box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}
.avatar::after, .avatar::before {
border-radius: 50%;
color: #ae9a51;
content: '';
left: 50%;
position: absolute;
-webkit-transform: translate3d(-50%, -50%, 0) rotate(-45deg);
transform: translate3d(-50%, -50%, 0) rotate(-45deg);
z-index: 1;
}
.avatar::after {
border: 3px solid;
height: 32px;
top: 36%;
width: 32px;
}
.avatar::before {
border: 3px solid transparent;
border-top: 3px solid;
border-right: 3px solid;
height: 48px;
top: 73%;
width: 48px;
}
.avatar img {
border-radius: inherit;
height: 100%;
-o-object-fit: cover;
object-fit: cover;
position: relative;
width: 100%;
z-index: 2;
}
.registration {
margin: 0 0 20px;
}
.login, .passwd {
position: relative;
}
.login::after, .passwd::after {
-webkit-backface-visibility: hidden;
backface-visibility: hidden;
color: rgba(0, 0, 0, 0.2);
display: block;
font: 400 16px 'FontAwesome', sans-serif;
left: 14px;
position: absolute;
top: 35%;
-webkit-transform: translate3d(-50%, -50%, 0) scale(1);
transform: translate3d(-50%, -50%, 0) scale(1);
z-index: 1;
}
.login::after {
content: '\f2be';
}
.passwd::after {
content: '\f084';
}
.button {
border: none;
background: #ae9a51;
color: #f9f0ea;
cursor: pointer;
display: block;
padding: 12px;
width: 100%;
}
.lost-passwd {
margin: 30px 0 0;
}
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container row login-box">
<div class="col login-title">
<h1>
What will you build today?
</h1>
<span class="small-text">Let's get started!</span>
</div>
<div class="col login-form">
<div class="avatar">
<!-- <img src="https://68.media.tumblr.com/avatar_8671f0f36a5f_128.png" alt="" /> -->
</div>
<div class="registration">
Need an Account? <a href="register.html">Register here</a>.
</div>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<label for="login" class="login">
<input id="login" type="text" name="email" placeholder="Email" />
</label>
<label for="passwd" class="passwd">
<input id="passwd" type="password" name="password" placeholder="Password" />
</label>
<button class="button" type="submit">Sign In</button>
</form>
<div class="lost-passwd">
<a href="Adminlogin.php">you are Admin?</a>
</div>
</div>
</div>

</body>
</html>
