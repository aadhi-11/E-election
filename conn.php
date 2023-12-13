<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    
    $conn = mysqli_connect($hostname, $username, $password);
    
    if (!$conn) {
        die('Could not connect to MySQL: ' . mysqli_connect_error());
    }
    $databaseName = 'voting2_db';

    $createDbQuery = "CREATE DATABASE IF NOT EXISTS  $databaseName";

    if (mysqli_query($conn, $createDbQuery)) {
        $use = "USE $databaseName";
        mysqli_query($conn,$use);
    }

?>