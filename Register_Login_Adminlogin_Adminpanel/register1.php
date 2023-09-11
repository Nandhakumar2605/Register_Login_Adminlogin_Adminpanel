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

// Form validation and registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate form inputs
    $errors = array();
    if (strlen($username) < 8) {
        $errors[] = '<script>alert("must have 8 character username");  window.location.href = "register.html";</script>'; 
    }
    if (empty($email)) {
        $errors[] = '<script>alert("Email is required"); window.location.href = "register.html";</script>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = '<script>alert("Invalid email format"); window.location.href = "register.html";</script>';
    }
    if (strlen($password)<5) {
        $errors[] = '<script>alert("must password 5 characters");window.location.href = "register.html";</script>';
    } elseif ($password != $confirmPassword) {
        $errors[] = '<script>alert("Password do not match"); window.location.href = "register.html";</script>';
    }
    if (empty($errors)) {
              
        // Check if the user already exists
        $sql = "SELECT * FROM registration WHERE name='$username' OR email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo'<script>alert("username and email already exit"); window.location.href = "register.html";</script>' ;
        } else {
         // Insert user into the database
            $sql = "INSERT INTO registration (name, email, password) VALUES ('$username', '$email', '$password')";
            if ($conn->query($sql) === TRUE) { 
                echo "<script>alert('Hello ' + '$username' + '!');</script>";
                echo '
                window.location.href = "login.php"; 
                </script>';             
                } else {  
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
}
}
// Close the database connection
$conn->close();
?>