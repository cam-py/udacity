<?php

//declare variables
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "monteylogin01"; //Name it anything

//opens up db connections  
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName  );  //mysqli(updated version to MySQL because it wasn't secure) is for procedural php projects

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());   //error handler for connection errors
}
