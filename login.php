<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J.F Rubber Phils., Inc</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- CSS Style -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
</head>
<body>
    
<div class="container">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top d-flex justify-content-between">
        <div class="container">
                    <img src="img/company-logo 1.png" width="80px" alt="">
                    <a href="index.php" class="navbar-brand">J.F RUBBER PHILS</a>
                
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul id="main-nav" class="navbar-nav ms-auto">
                    <li class="nav-item nav-login">
                        <a href="login.php" class="nav-link text-white">LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>    
    </nav>
</div>
    <!-- End of Navbar -->
<section class="login-form">
    <img class="login-logo" src="img/company-logo 1.png" alt="">
        <h2 class="login-h2">Admin Login</h2>
        <form class="form-class" action="includes/login.inc.php" method="post">
            <label class="form-label" for="username">Username</label>
            <input type="text" name="username" placeholder="Username...">
            <label class="form-label" for="password">Password</label>
            <input type="password" name="password" placeholder="Password...">

            <?php 
    
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p style='border-radius: 10px;padding:0.5em;margin-bottom:0.2em;background-color:#FCAFAF;color:red;'>Fill in all fields!</p>";
        }
        if($_GET["error"] == "notuser"){
            echo "<p style='border-radius: 10px;padding:0.5em;margin-bottom:0.2em;background-color:#FCAFAF;color:red;'>Incorrect Username and Password!</p>";
        }
        
    }

?>

            <button class="form-btn" type="submit" name="submit">Log In</button>
        </form>

       

</section>
<?php include("footer.php"); ?>