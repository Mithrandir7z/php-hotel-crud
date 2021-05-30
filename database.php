<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "db_hotel";
    $port = 8889;


    $conn = new mysqli($servername, $username, $password, $dbname, $port);


    if($conn && $conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
        die();
        
    }
?>