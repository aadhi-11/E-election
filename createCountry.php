<?php
    require ('conn.php');


    // Retrieve form data
    $country_name = $_POST['country_name'];
    $country_code = $_POST['country_code'];
    $national_election_committee = $_POST['national_election_committee'];

    $conn = mysqli_connect($hostname, $username, $password, $databaseName);
    if (!$conn) {
        die('Could not connect to MySQL: ' . mysqli_connect_error());
    }
    $table='countries';

    // Check if the table exists
    // $table_query = "SELECT COUNT(*) as count FROM information_schema.tables WHERE table_schema = '$databaseName' AND table_name = '$table'";
    // $result = mysqli_query($conn, $table_query);

    // if ($result) {
    //     $row = mysqli_fetch_assoc($result);
    //     $tableExists = $row['count'] > 0;

    //     if ($tableExists) {
    //         echo "The table '$table' exists in the database.";
    //         // Retrieve form values
    //         $country_name = $_POST['country_name'];
    //         $country_code = $_POST['country_code'];
    //         $national_election_committee = $_POST['national_election_committee'];

    //         // Insert values into the database
    //         $query = "INSERT INTO $table (Country_name, Country_code,Election_committee,status) VALUES ('$country_name', '$country_code','$national_election_committee','1')";

    //         if (mysqli_query($conn, $query)) {
    //             echo "Values inserted successfully.";
    //         } else {
    //             echo "Error inserting values: " . mysqli_error($conn);
    //         }
    //     } else {
    //          // CREATE TABLE query
    //         $query = "CREATE TABLE $table (
    //             id INT AUTO_INCREMENT PRIMARY KEY,
    //             Country_name VARCHAR(50),
    //             Country_code VARCHAR(10),
    //             Election_committee VARCHAR(100),
    //             status Int(2),
    //             created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    //         )";
    //         // Execute the CREATE TABLE query
    //         if (mysqli_query($conn, $query)) {
    //             echo "Table created successfully.";
    //         } else {
    //             echo "Error creating table: " . mysqli_error($conn);
    //         }
    //     }
    // } else {
    //     echo "Error executing query: " . mysqli_error($conn);
    // }
    $table_query="CREATE TABLE IF NOT EXISTS $table (
                     id INT AUTO_INCREMENT PRIMARY KEY,
                     Country_name VARCHAR(50),
                     Country_code VARCHAR(10),
                     Election_committee VARCHAR(100),
                     status Int(2),
                     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                 )";
    if(mysqli_query($conn,$table_query)){
         // Insert values into the database
        $insert_query = "INSERT INTO $table (Country_name, Country_code,Election_committee,status) VALUES ('$country_name', '$country_code','$national_election_committee','1')";
        if(mysqli_query($conn,$insert_query)){
            // $select_id_querry="SELECT id FROM $table WHERE Country_name = '$country_name' AND status > 0";
            // $CID=mysqli_query($conn,$select_id_querry);
            // $_cid=$CID;
            // if($CID){
                header("Location: country-added-success.php?data=".urlencode($country_code));
                include('country-added-success.php');
            // }
            
        }
        else{
            include('common-head.php');
            include('admin-header.php');
            echo "An error occured on insertion";
        }
    }
    else{
        include('common-head.php');
        include('admin-header.php');
        echo "An error occured";
    }
?>