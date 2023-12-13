<?php
    require ('conn.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $Costituency_name = $_POST['Costituency_name'];
        $Costituency_code = $_POST['Costituency_code'];
        $sid = $_POST['sid'];
        $CID = $_POST['CID'];
    
    }
    $conn = mysqli_connect($hostname, $username, $password, $databaseName);
    if (!$conn) {
        die('Could not connect to MySQL: ' . mysqli_connect_error());
    }
    $table='Costituency';
    $table_query="CREATE TABLE IF NOT EXISTS $table (
        id INT AUTO_INCREMENT PRIMARY KEY,
        Costituency_name VARCHAR(50),
        Costituency_code VARCHAR(10),
        SIDS INT(4),
        CID INT(4),
        status Int(2),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (SIDS) REFERENCES states(SIDS)
    )";
    if(mysqli_query($conn,$table_query)){
        // Insert values into the database
       $insert_query = "INSERT INTO $table (Costituency_name,Costituency_code,SIDS,CID,status) VALUES ('$Costituency_name', '$Costituency_code','$sid ','$CID','1')";
       if(mysqli_query($conn,$insert_query)){
        $select_scode_querry="SELECT State_code FROM states WHERE SIDS = '$sid' AND status = 1";
        $SCODE=mysqli_query($conn,$select_scode_querry);
        if($SCODE){
            while ($row = mysqli_fetch_assoc($SCODE)) {
                $_SCODE= $row['State_code'];

            }
            header("Location:all-costituency.php?id=".urlencode($sid)."&scode=".$_SCODE."&CID=".$CID);
            include('all-costituency.php');
        

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