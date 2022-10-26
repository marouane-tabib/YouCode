<?php
    
    //CONNECT TO MYSQL DATABASE USING MYSQLI
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "youcode_tableauscrumbackend";

    // Create connection
    $conn = new mysqli($servername, $username, $password , $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected successfully";
?>