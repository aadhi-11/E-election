<?php
    include('conn.php');

    $CONST_ID = $_GET['CONST_ID'];
    $id = $_GET['id'];

    $connection = mysqli_connect($hostname, $username, $password, $databaseName);

    if (!$connection) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    $squery = "SELECT CONST_ID,fName,mName,lName,symbolphoto,EID FROM candidate WHERE status=1 AND CONST_ID = $CONST_ID ";
    $result = mysqli_query($connection, $squery);

    if (!$result || mysqli_num_rows($result) == 0) {
        $status = '1';
        $statusv = "Candidates not found";
        header("Location:user-home.php?status=" . urlencode($status) . "&CONST_ID=" . $CONST_ID . "&statusv=" . $statusv);
        exit();
    }

    include('common-head.php');
?>

<div class="container  d-flex aligns-items-center justify-content-center text-white">
    <div class="row bg-dark rounded-3 mt-5 m-5 p-5">
        <h1 class="h1 text-white text-center mb-2">Candidates</h1>
        <div class="container">
            <form action="" method="post">
                <table class="table table-dark">
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
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?php echo $row['fName']; ?></td>
                                <td><?php echo $row['mName']; ?></td>
                                <td><?php echo $row['lName']; ?></td>
                                <td class="card" style="width: 6rem;height:5rem">
                                    <?php
                                    $symbol = $row['symbolphoto'];
                                    $imagePath = 'images/' . $symbol;
                                    echo '<img src="' . $imagePath . '" alt="Image"><br>';
                                    ?>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <?php
                                        $sql = "SELECT CANDID, COUNT(*) AS valueCount FROM vote GROUP BY CANDID;";
                                        $EID = $row['EID'];
                                        $Eresult = mysqli_query($connection, $sql);
                                        if(!$Eresult)
                                        {
                                            echo "error in it";
                                        }

                                        if ($Eresult && mysqli_num_rows($Eresult) > 0) {
                                            $found = false;
                                            
                                            while ($rows = mysqli_fetch_assoc($Eresult)) {
                                                if ($rows["CANDID"] == $EID) {
                                                    
                                                    echo $rows["valueCount"];
                                                    $found = true;
                                                }
                                            }

                                            if (!$found) {
                                                echo "0";
                                            }
                                        } else {
                                            echo "0";
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
<?php
    mysqli_close($connection);
?>
