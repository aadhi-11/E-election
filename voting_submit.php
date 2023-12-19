<?php
    include('conn.php');
    $connection = mysqli_connect($hostname, $username, $password, $databaseName);
    if (!$connection) 
    {
        die(''. mysqli_connect_error());
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $CONST_ID=$_POST['CONST_ID'];
        $EID=$_POST['EID'];
        $id=$_POST['id'];
        $CANDID=$_POST['CANDID'];
    }
    
    $table_query="CREATE TABLE IF NOT EXISTS vote (
        VID INT AUTO_INCREMENT PRIMARY KEY,
            EID INT(7),
            CANDID int(6),
            CONST_ID INT(6),
            UIDS INT(7) UNIQUE,
            status INT(1)
        
    )";
    if(mysqli_query($conn,$table_query)){
        // Insert values into the database
       $insert_query = "INSERT INTO vote (VID,EID,CANDID,CONST_ID,UIDS,status) VALUES ('$VID','$EID','$CANDID,'$CONST_ID','$UIDS','1')";
       if(mysqli_query($conn, $insert_query)) {
                $status= "You have voted successfully";
                header("Location:login.php?status=".$status);  
       }
       else{
        $status= "You have already voted";
        header("Location:login.php?status=".$status);  
       }
    }
?>