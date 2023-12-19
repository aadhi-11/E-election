<?php
    include('conn.php');
        $El_id = $_POST['El_id'];
        $phone=$_POST['phone'];
    
    $connection = mysqli_connect($hostname, $username, $password, $databaseName);
    if (!$connection) 
    {
        die(''. mysqli_connect_error());
    }

    $squery="SELECT  EID,CONST_ID,Election_id , contact FROM voter";
    $result=mysqli_query($conn,$squery);
    if($result==null)
    {
        header("Location:login.php");
    }
    else{
        while ($row = $result->fetch_assoc())
        {
            $id=$row['EID'];
            $Election_id = $row['Election_id'];
            $contact = $row['contact'];
            $CONST_ID=$row['CONST_ID'];

            if ($El_id == $Election_id && $phone == $contact)
            {   
                $status="1";
                header("Location:user-home.php?CONST_ID=".urlencode($CONST_ID)."&status=".$status."&id=".$id);
            } 
            else 
            {
                $status= "Login Failed";
                header("Location:login.php?status=".$status);
            }
        }
    }

?>