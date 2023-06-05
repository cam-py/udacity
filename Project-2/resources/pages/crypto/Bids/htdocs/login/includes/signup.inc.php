<?php

if(isset($_POST["Submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php'; //

    //error handling
    //if it's anything besides false, throw an error
    if(emptyInputSignup($name, $email, $phone, $username, $pwd, $pwdRepeat) !== false) {
        header ("location: ../signup.php?error=emptyinput");//if error is equal to empty user input
        exit();
    }

    if(invalidUid($username) !== false) {
        header ("location: ../signup.php?error=invaliduid");//if username is invalid
        exit();
    }

    if(invalidEmail($email) !== false) {
        header ("location: ../signup.php?error=invalidemail");//if email is invalid
        exit();
    }

    if(pwdMatch($pwd, $pwdRepeat) !== false) {
        header ("location: ../signup.php?error=passwordsdontmatch");//if error is equal to empty user input
        exit();
    }

    if(uidExists($conn, $username, $email) !== false) {
        header ("location: ../signup.php?error=usernameexists");//if error is equal to empty user input
        exit();
    }

    createUSer($conn, $name, $email, $phone, $username, $pwd);
}

else {
    header ("location: ../signup.php"); // if signup incorrect, redirected back to signup page
    exit();
}