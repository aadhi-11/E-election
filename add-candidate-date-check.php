<?php
    include("conn.php");
    if (isset($_GET['id'])) {
        $CONST_ID = $_GET['id'];
        $CID=$_GET['CID'];
        $SIDS=$_GET['SIDS'];
    }
    $connection = mysqli_connect($hostname, $username, $password, $databaseName);
    if (!$connection) 
    {
        die(''. mysqli_connect_error());
    }
    $currentDate = date('Y-m-d');
    //$table='elections';
    $s_querry="SELECT opening_date, closing_date FROM elections WHERE status= 1 AND CONST_ID = $CONST_ID ";
    $dates=mysqli_query($conn,$s_querry);//we need to compare these dates with on current date
    if($dates==null)
    {
        echo "Election Declaration is not occured~!";
    }
    else{
        while ($row = $dates->fetch_assoc())
        {
            echo $row['opening_date'];
            echo $row['closing_date'];
            echo $currentDate;
            $dateToCheck = $currentDate;
            $startDate = $row['opening_date'];
            $endDate = $row['closing_date'];

            if ($dateToCheck >= $startDate && $dateToCheck <= $endDate) {
                header("Location:candidate_registration.php?CONST_ID=".urlencode($CONST_ID)."&SIDS=".$SIDS."&CID=".$CID);
            } else {
                echo "Cannot add candidate......The election registration has been closed!";
            }
        }
    }

?>