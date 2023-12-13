<?php
include("conn.php");


$fName = $_POST['fName'];
$mName = $_POST['mName'];
$lName = $_POST['lName'];
$nationality = $_POST['nationality'];
$Election_id = $_POST['Election_id'];
$addresses = $_POST['addresses'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$CID = $_POST['CID'];
$SID = $_POST['SID'];
$Id= $_POST['id'];

$image_path = "images/" . basename($_FILES["photo"]["name"]);

if (move_uploaded_file($_FILES["photo"]["tmp_name"], $image_path)) {
    $connection = mysqli_connect($hostname, $username, $password, $databaseName);
   
    $table='Voter';
    $table_query="CREATE TABLE IF NOT EXISTS $table (
        EID INT AUTO_INCREMENT PRIMARY KEY,
            CID INT(4),
            SIDS INT(5),
            CONST_ID INT(6),
            fName VARCHAR(20),
            mName VARCHAR(20),
            lName VARCHAR(20),
            nationality VARCHAR(20),
            Election_id INT(25),
            addresses VARCHAR(50),
            email VARCHAR(30),
            contact INT(25),
            dob DATE,
            gender VARCHAR(10),
            
            photo VARCHAR(50),
           
            status Int(2)

    )";
    if(mysqli_query($conn,$table_query)){
        // Insert values into the database
       $insert_query = "INSERT INTO $table (CID,SIDS,CONST_ID,fName,mName,lName,nationality,Election_id,addresses,email,contact,dob,gender,photo,status) VALUES ('$CID','$SID','$Id','$fName','$mName','$lName','$nationality','$Election_id','$addresses','$email','$contact','$dob','$gender','$image_path','1')";
       if(mysqli_query($conn, $insert_query)) {
        header("Location:all-voters.php?id=".urlencode($Id)."&CID=".$CID."&SIDS=".$SID);
    } else {
        // Error in the insertion query
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Error uploading image";
}

}
?>
