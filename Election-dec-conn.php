<?php
    require ('conn.php');


    // Retrieve form data
    $opening_date = $_POST['opening_date'];
    $closing_date = $_POST['closing_date'];
    $election_on = $_POST['election_on'];
    $counting_on = $_POST['counting_on'];
    $CONST_ID=$_POST['id'];
    $CID=$_POST['CID'];
    $SID=$_POST['SID'];
    if (!$conn) {
        die('Could not connect to MySQL: ' . mysqli_connect_error());
    }
    echo $opening_date."  ".$closing_date."  ".$election_on."  ".$counting_on;
    $table='Elections';
    $table_query="CREATE TABLE IF NOT EXISTS $table (
        EL_id INT AUTO_INCREMENT PRIMARY KEY,
        CID INT(5),
        SIDS INT(5),
        CONST_ID int(5),
        opening_date Date,
        closing_date Date,
        election_on Date,
        counting_on Date,
        status int(4)
    )";
if(mysqli_query($conn,$table_query)){
// Insert values into the database
    $insert_query = "INSERT INTO $table (CID,SIDS,CONST_ID,opening_date, closing_date,election_on,counting_on,status) VALUES ('$CID','$SID','$CONST_ID', '$opening_date','$closing_date','$election_on','$counting_on','1')";
    if(mysqli_query($conn,$insert_query)){
        header("Location:all-costituency.php?id=".urlencode($SID)."&scode=".$CONST_ID."&CID=".$CID);
    }
    else{
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}
?>