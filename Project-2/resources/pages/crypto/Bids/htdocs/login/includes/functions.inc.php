<?php

function emptyInputSignup($name, $email, $phone, $username, $pwd, $pwdRepeat) {
    $result;

    //empty() default php function
    if(empty($name) || empty($email) || empty($phone) || empty($username) || empty($pwd)  || empty($pwdRepeat)) {
        $result = true;
    }

    else {
        $result = false;
    }

    return $result;
}

function invalidUid($username) {
    $result;

    //preg_match() default php function 
    //write a search parameter and if string doesn't match search paramater, throw error
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true; // if there is a mistake, result is true and send back to signup page
    }

    else {
        $result = false;
    }

   

    return $result;
}

function invalidEmail($email) {
    $result;
   //FILTER_VALIDATE_EMAIL built in php function that validates emails
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $result = true; // if there is a mistake, result is true and send back to signup page
    }

    else {
        $result = false;
    }
    return $result;
}

    function pwdMatch($pwd, $pwdRepeat) {
        $result;
       //verify if both passwords are identical
        if($pwd !== $pwdRepeat) { 
            $result = true; // if there is a mistake, result is true and send back to signup page
        }
    
        else {
            $result = false;
        }
        return $result;
    }

        //verifies if userid or email already exists
        function uidExists($conn, $username, $email) {
            $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;"; //first semicolon closes sql statement, second closes php code
            $stmt = mysqli_stmt_init($conn); //create prepared statement to prevent users from inputing code in signup page and doing sql injections
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header ("location: ../signup.php?error=stmtfailed");
                exit(); 
            }

            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt);

            //fetching data as an associate to the array
            if($row = mysqli_fetch_assoc($resultData )) {
                return $row; //returns all data from database if user exists within database
            }
            else {
                $result = false;
                return $result;
            }

            mysqli_stmt_close($stmt);
        }

        
        //Function to create user
        function createUSer($conn, $name, $email, $phone, $username, $pwd) {
            $sql = "INSERT INTO users (usersName, usersEmail, usersPhone, usersUid, usersPwd ) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn); //initialize a prepared statement using the connection to the database
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header ("location: ../signup.php?error=stmtfailed"); //check if it's going to fail given information above
                exit(); 
            }

            $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $username, $hashedPWD); //replace $pwd with the hashed pwd
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header ("location: ../login.php?error=none"); //once successfully created account, send back to login account
            exit();
        }

        function emptyInputLogin($username, $pwd) {
            $result;
        
            //empty() default php function
            if(empty($username) || empty($pwd)) {
                $result = true;
            }
        
            else {
                $result = false;
            }
        
            return $result;
        }

        //LOGIN FUNCTION
        function loginUser($conn, $username, $pwd) {
            uidExists($conn, $username, $username); // from the uidExists function that allows for both username or email to be validated, as long as one returns true

            if ($uidExists === false){
                header("location: ../login.php?error=wronglogin");
                exit();
            }

            $pwdHashed = $uidExists["usersPwd"]; //grab the password from the db and make sure it matches the variable for login
            $checkPwd = password_verify($pwd, $pwdHashed);

            if ($checkPwd === false) {
                header("location: ../login.php?error=wronglogin");
                exit();
            }
            else if ($checkPwd === true) {
                session_start();
                $_SESSION["userid"] = $uidExists["usersID"];
                $_SESSION["userid"] = $uidExists["usersUid"];
                header("location: ../wallet.html");
                exit();
            }
        }
