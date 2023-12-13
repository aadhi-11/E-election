<?php
require('conn.php');
?>
<?php

      
      $extension = array('jpeg','jpg','png','gif');
      $finalimg=array();
      foreach ($_FILES['photo']['tmp_name'] as $key => $value) {
          echo $filename = $_FILES['photo']['name'][$key];
          $filename_tmp = $_FILES['photo']['tmp_name'][$key];
          echo '<br>';
          echo $ext = pathinfo($filename,PATHINFO_EXTENSION);
          
          if(in_array($ext,$extension))
          {   
              if(!file_exists('images/'.$filename))
              {
                  move_uploaded_file($filename_tmp,'images/'.$filename);
                  array_push($finalimg,$filename);
              }else{
                  $filename=str_replace('.','_',basename($filename,$ext));
                  $newfilename = $filename.time().".".$ext;
                  move_uploaded_file($filename_tmp,'images/'.$newfilename);
                  //$finalimg[]=$newfilename;
                  array_push($finalimg,$newfilename);
              }
              
          }
      }foreach ($finalimg as $key => $value) {
        echo "<br>".$value;

      }
      
      // Now $finalimg contains the names of the uploaded files.
      

    

    // $image_name=$_FILES['photo']['name'];
    // $idphoto=$_FILES['idphoto']['name'];
    // $symbolphoto=$_FILES['symbolphoto']['name'];
    // $affphoto=$_FILES['affphoto']['name'];

    // $image_size=$_FILES['photo']['size'];
    // $idphoto_size=$_FILES['idphoto']['size'];
    // $symbolphoto_size=$_FILES['symbolphoto']['size'];
    // $affphoto_size=$_FILES['affphoto']['size'];

    // $image_tmp=$_FILES['photo']['tmp_name'];
    // $idphoto_tmp=$_FILES['idphoto']['tmp_name'];
    // $symbolphoto_tmp=$_FILES['symbolphoto']['tmp_name'];
    // $affphoto_tmp=$_FILES['affphoto']['tmp_name'];

    // $validImageExtension = ['jpg','jpeg','png'];
    // $imageExtension = explode('.',$fileName);
    // $imageExtension = strtolower(end($imageExtension));


    // $phot_sql="INSERT INTO upload(photo)VALUES('$image_name,$idphoto','$symbolphoto','$affphoto')";
    // mysqli_query($conn,$phot_sql);

    
    // move_uploaded_file($image_tmp,$image_name);
    


$fName=$_POST['fName'];
$mName=$_POST['mName'];
$lName=$_POST['lName'];
$nationality=$_POST['nationality'];
$Election_id=$_POST['Election_id'];
$addresses=$_POST['addresses'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$Partyname=$_POST['Partyname'];
$experience=$_POST['experience'];
$CID=$_POST['CID'];
$SIDS=$_POST['SID'];
$CONST_ID=$_POST['id'];

// $idphoto=$_POST['idphoto'];
// $symbolphoto=$_POST['symbolphoto'];
// $affphoto=$_POST['affphoto'];

echo "The const id :".$CONST_ID;

//Database connection

$connection = mysqli_connect($hostname, $username, $password, $databaseName);
   
    $table='Candidate';
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
            Partyname VARCHAR(50),
            experience VARCHAR(10),
            photo VARCHAR(50),
            idphoto VARCHAR(50),
            symbolphoto VARCHAR(50),
            affphoto VARCHAR(50),
            status Int(2)

    )";
    
    
    // $table_query="CREATE TABLE IF NOT EXISTS $table(
    //      EID INT AUTO_INCREMENT PRIMARY KEY
    //     --  fName VARCHAR(20),
    //     --  mName VARCHAR(20),
    //     --  lName VARCHAR(20),
    //     --  nationality VARCHAR(20),
    //     --  Election_id INT(25),
    //     --  addresses VARCHAR(50),
    //     --  email VARCHAR(30),
    //     --  contact INT(25),
    //     --  dob DATE,
    //     --  gender VARCHAR(10),
    //     --  Partyname VARCHAR(50),
    //     --  experience VARCHAR(10),
    //     --  photo VARCHAR(50),
    //     --  symbolphoto VARCHAR(50),
    //     --  affphoto VARCHAR(50),
    //     --  status Int(2),

    //     )";
    if(mysqli_query($conn,$table_query)){
        // Insert values into the database
       $insert_query = "INSERT INTO $table (CID,SIDS,CONST_ID,fName,mName,lName,nationality,Election_id,addresses,email,contact,dob,gender,Partyname,experience,photo,idphoto, symbolphoto,affphoto,status) VALUES ('$CID','$SIDS','$CONST_ID','$fName','$mName','$lName','$nationality','$Election_id','$addresses','$email','$contact','$dob','$gender','$Partyname','$experience','$finalimg[0]','$finalimg[1]','$finalimg[2]','$finalimg[3]','1')";
       if(mysqli_query($conn, $insert_query)) {
        $sel_const_query="SELECT  Costituency_name FROM costituency WHERE status=1 AND id='$CONST_ID' ";
        $const_name=mysqli_query($conn, $sel_const_query);
        while ($row = $const_name->fetch_assoc())
        {
            $c_name=$row['Costituency_name'];
        }
        echo "constname".$c_name;
        header("Location:all-candidate.php?id=".urlencode($CONST_ID)."&CID=".$CID."&SIDS=".$SIDS."&const_name=".$c_name);
    } else {
        // Error in the insertion query
        echo "Error: " . mysqli_error($conn);
    }
    }

//     ?>

         

         


         

         
         




        





