<?php
session_start();
if(!isset($_SESSION['email'])){
    echo '<script type="text/javascript">
    window.alert("Login here!");
    window.location.href = "login.php";</script>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #333;
            color: #fff;
        }

        .jumbotron {
            background-image: url('your-background-image.jpg'); /* Replace with your background image path */
            background-size: cover;
            color: #fff;
            text-align: center;
            padding: 200px 0;
        }

        .project {
            margin-bottom: 30px;
        }

        .project img {
            max-width: 100%;
            height: auto;
        }

        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
    </style>
</head>

<body>
  
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">My Portfolio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron">
        <h1>Welcome to My Portfolio</h1>
        <p>I am a web developer with a passion for creating beautiful and functional websites.</p>
    </div>

    <!-- About Section -->
    <section id="about" class="container">
        <h2>About Me</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Nulla eu ipsum id dolor venenatis
            hendrerit. Nullam vel quam nec tortor fermentum dapibus. Nunc bibendum pharetra dui, nec posuere justo
            euismod ac. Phasellus vel tortor rhoncus, blandit lectus ac, mattis dolor.</p>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="container">
        <h2>My Projects</h2>
        <div class="row">
            <div class="col-md-4 project">
                <img src="project1.jpg" alt="Project 1">
                <h4>Project 1</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="col-md-4 project">
                <img src="project2.jpg" alt="Project 2">
                <h4>Project 2</h4>
                <p>Nulla eu ipsum id dolor venenatis hendrerit.</p>
            </div>
            <div class="col-md-4 project">
                <img src="project3.jpg" alt="Project 3">
                <h4>Project 3</h4>
                <p>Nunc bibendum pharetra dui, nec posuere justo euismod ac.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container">
        <h2>Contact Me</h2>
        <p>If you have any questions or would like to work together, feel free to contact me:</p>
        <ul>
            <li>Email: your.email@example.com</li>
            <li>Phone: (123) 456-7890</li>
        </ul>
        <?php
    if(isset($_GET["mes"])){
        echo $_GET["mes"];
    }
    ?>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2023 My Portfolio. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
