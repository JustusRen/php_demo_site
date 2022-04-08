<?php
    $servername = "127.0.0.1";
    $username = "justus";
    $password = "aysxdc09!";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=suppliers_and_parts_db", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>