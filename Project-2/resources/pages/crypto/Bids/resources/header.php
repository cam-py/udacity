<?php 
    session_start(); // on every page in the website the user will be logged into every page on the website
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="login_register/css/login.css">
        <link rel="stylesheet" href="login_register/css/signup.css">
        <link rel="stylesheet" href="https://fonts.google.com/">
        <link rel="stylesheet" href="https://fonts.google.com/specimen/Poppins?sidebar.open=true&query=poppins&selection.family=Poppins:wght@100;500">
        <link rel="stylesheet" type="text/css" href="/vendors/fonts/Montserrat-Regular.ttf">
        <title>Wallet</title>
        <script src="https://kit.fontawesome.com/72b2cccba7.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="login">
            <nav class="main-nav">
               <div class="nav"><a href="#" class="logo">Montey</a></div>
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">ABOUT US</a></li>
                    <?php 
                        if(isset($_SESSION["useruid"])){
                            echo "<li><a href='profile.php'>Profile page</a></li>";
                            echo "<li><a href='logout.php'>Log out</a></li> ";
                        }
                        else {
                            echo "<li><a href='login/signup.php'>SIGN UP</a></li>";
                            echo "<li><a href='login/login.php'>LOGIN</a></li>";
                        }
                    ?>
                    <li><a href="#">Products</a></li>                
                </ul>
                <div class="sign-up"><a href="login/signup.php">Sign-Up</a></div>
                <a href="#"><i class="fas fa-bars"></i></a>
            </nav>
        </div>