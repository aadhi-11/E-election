<?php
    include('conn.php');
    $CONST_ID=$_GET['CONST_ID'];

    
    $connection = mysqli_connect($hostname, $username, $password, $databaseName);
    if (!$connection) 
    {
        die(''. mysqli_connect_error());
    }

    $squery=" SELECT fName,mName,lName,symbolphoto,EID FROM candidate WHERE status= 1 AND CONST_ID = $CONST_ID ";
    $result=mysqli_query($conn,$squery);
    if($result==null)
    {
        $status='1';
        $statusv="Candidates not found";
        header("Location:user-home.php?status=".urlencode($status)."&CONST_ID=".$CONST_ID."&statusv=".$statusv);
    }
    
    include('common-head.php');
?>
<div class="container  d-flex aligns-items-center justify-content-center text-white">
    <div class="row bg-dark rounded-3 mt-5 m-5 p-5">
        <h1 class="h1 text-white text-center mb-2" >Candidates</h1>
       <div class="container">
       <table class="table table-dark ">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Second Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Symbol</th>
                    <th scope="col">Vote</th>
                </tr>
            </thead>
            <tbody>
                <form action="" method="post">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['fName']; ?></td>
                    <td><?php echo $row['mName']; ?></td>
                    <td><?php echo $row['lName']; ?></td>
                    <td class="card" style="width: 6rem;height:5rem"><?php $symbol= $row['symbolphoto']; ?>
                                        <?php
                    
                        $imagePath = 'images/' . $symbol;
                        echo '<img src="' . $imagePath . '" alt="Image">';
                        echo '<br>';
                    
                    ?></td>

<td>

    <div class="form-check">
  <input class="form-check-input" type="radio" value="<?php echo $row['EID']?>" name="vote" id="flexCheckDefault">
  
</div></td>

                </tr>
            <?php endwhile; ?>
            </form>
            </tbody>
        </table>
       </div>
       <div class="container  d-flex aligns-items-center justify-content-center text-white pt-5 mb-0">
            <a href="country-regs.php" class="btn btn-lg btn-success text-white">Vote</a>
       </div>
    </div>
</div>