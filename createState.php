<?php
    require ('conn.php');

    $State_name = $_POST['State_name'];
    $State_code = $_POST['State_code'];
    $Major_election = $_POST['Major_election'];
    $CID = $_POST['CID'];
    
     
    $conn = mysqli_connect($hostname, $username, $password, $databaseName);
    if (!$conn) {
        die('Could not connect to MySQL: ' . mysqli_connect_error());
    }
    $table='states';
    $table_query="CREATE TABLE IF NOT EXISTS $table (
        SIDS INT AUTO_INCREMENT PRIMARY KEY,
        State_name VARCHAR(50),
        State_code VARCHAR(10),
        Major_election VARCHAR(100),
        CID INT(4),
        status Int(2),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (CID) REFERENCES countries(id)
    )";
    if(mysqli_query($conn,$table_query)){
        // Insert values into the database
       $insert_query = "INSERT INTO $table (State_name, State_code,Major_election,CID,status) VALUES ('$State_name', '$State_code','$Major_election','$CID','1')";
       if(mysqli_query($conn,$insert_query)){
           // $select_id_querry="SELECT id FROM $table WHERE Country_name = '$country_name' AND status > 0";
           // $CID=mysqli_query($conn,$select_id_querry);
           // $_cid=$CID;
           // if($CID){
            // Now, $receivedData contains the value passed from the createState.php
            $select_id_querry="SELECT SIDS FROM states WHERE State_code = '$State_code' AND status = 1";
            $SID=mysqli_query($conn,$select_id_querry);
            if($SID){
                while ($row = mysqli_fetch_assoc($SID)) {
                    // Access the column_name value from the row
                    $_sid= $row['SIDS'];
                    // Do something with the value, like echo or manipulate it.
                }
            
                header("Location:addCostistuency.php?data=".urlencode($_sid)."&scode=".$State_code."&CID=".$CID);
                include('addCostistuency.php');
            }
            
           // }
           
       }
       else{
           include('common-head.php');
           include('admin-header.php');
           echo $conn->error;
       }
   }
   else{
       include('common-head.php');
       include('admin-header.php');
       echo "Error creating child table: " . mysqli_error($connection);
   }
    
?>