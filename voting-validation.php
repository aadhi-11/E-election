<?php
    include('conn.php');
    $CONST_ID=$_GET['CONST_ID'] ;
    $connection = mysqli_connect($hostname, $username, $password, $databaseName);
    if (!$connection) 
    {
        die(''. mysqli_connect_error());
    }

    $squery="SELECT election_on FROM elections WHERE status= 1 AND CONST_ID = $CONST_ID ";
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
            $election_on = $row['election_on'];

            if ($currentDate == $election_on)
            {   
                $status="1";
                header("Location:voting.php?CONST_ID=".urlencode($CONST_ID)."&status=".$status);
            } 
            else 
            {
                $status= "1";
                $statusv="Voting is not available now!";
                header("Location:user-home.php?status=".$status."&statusv=".$statusv);
            }
        }
    }

?>