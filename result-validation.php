<?php
    include('conn.php');
    $CONST_ID=$_GET['CONST_ID'] ;
    $ID=$_GET['id'];
    $connection = mysqli_connect($hostname, $username, $password, $databaseName);
    if (!$connection) 
    {
        die(''. mysqli_connect_error());
    }

    $squery="SELECT counting_on FROM elections WHERE status= 1 AND CONST_ID = $CONST_ID ";
    $result=mysqli_query($conn,$squery);
    if(!$result)
    {   
        $status='1';
        header("Location:user-header.php?status=".$status);
    }
    else{
        while ($row = $result->fetch_assoc())
        {   
            $currentDate = date('Y-m-d');
            $counting_on = $row['counting_on'];

            if ($currentDate == $counting_on)
            {   
                $status="1";
                header("Location:result.php?CONST_ID=".urlencode($CONST_ID)."&status=".$status."&id=".$ID);
                
            } 
            else 
            {
                $status= "1";
                $statusr="Today is not the result day!";
                header("Location:user-home.php?status=".$status."&statusr=".$statusr."&CONST_ID=".$CONST_ID."&id=".$ID);
            }
        }
    }

?>