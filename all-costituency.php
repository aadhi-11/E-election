<?php
    require('common-head.php');
    require('admin-header.php');
    require('conn.php');
    if (isset($_GET['id'])) {
        $SIDS = $_GET['id'];
        $scode=$_GET['scode'];
        $CID = $_GET['CID'];
        $_SIDS = intval($SIDS);
        $s_querry = "SELECT * FROM Costituency WHERE SIDS = '$_SIDS' AND status = 1 ";
        $costituency=mysqli_query($conn,$s_querry);
        if(!$costituency)
        {
            echo("No costituency");
        }
    }
    else{
        echo("Not get");
    }
?>
<div class="container  d-flex aligns-items-center justify-content-center text-white ">
    <div class="row bg-dark rounded-3 mt-5 m-5 p-5">
        <h1 class="h1 text-white text-center" >All costituencys Under </h1>
       <div class="container">
       <table class="table table-dark ">
            <thead>
                <tr>
                    <th scope="col">costituency Name</th>
                    <th scope="col">constituency code</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $costituency->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['Costituency_name']; ?></td>
                    <td><?php echo $row['Costituency_code']; ?></td>
                    <td>
                        <a href="" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                        <a href="add-candidate-date-check.php?CID=<?php echo $row['CID']; ?>&SIDS=<?php echo $row['SIDS']; ?>&id=<?php echo $row['id'];?>"class="btn btn-success" >Add-Candidate</a>
                        <a href="all-candidate.php?CID=<?php echo $row['CID']; ?>&SIDS=<?php echo $row['SIDS']; ?>&id=<?php echo $row['id'];?>&const_name=<?php echo $row['Costituency_name'];?>"class="btn btn-info" >All-Candidates</a>
                        <a href="Election-declaration.php?CID=<?php echo $row['CID']; ?>&SIDS=<?php echo $row['SIDS']; ?>&id=<?php echo $row['id'];?>"class="btn btn-light text-black" >Declare Election</a>
                        <a href="add-voter.php?CID=<?php echo $row['CID']; ?>&SIDS=<?php echo $row['SIDS']; ?>&CONST_ID=<?php echo $row['id'];?>"class="btn btn-light text-black" >Add-voter</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
       </div>
       <div class="container  d-flex aligns-items-center justify-content-center text-white pt-5 mb-0">
            <a href="addCostistuency.php?data=<?php echo $_SIDS ; ?>&scode=<?php echo $scode ?>&CID=<?php echo $CID ?>" class="btn btn-lg btn-success text-white">+Add costituency</a>
       </div>
    </div>
</div>
<?php
    require('admin-footer.php')
?>