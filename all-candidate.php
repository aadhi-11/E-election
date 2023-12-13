<?php
    require('common-head.php');
    require('admin-header.php');
    require('conn.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $SIDS = $_GET['SIDS'];
        $CID = $_GET['CID'];
        $const_name = $_GET['const_name'];
        $s_querry = "SELECT * FROM candidate  WHERE  CONST_ID = '$id' AND status = 1" ;
        $candidates=mysqli_query($conn,$s_querry);
        if(!$candidates)
        {
            echo("No candidates");
        }
    }
    else{
        echo("id not found");
    }
?>
<div class="container  d-flex aligns-items-center justify-content-center text-white ">
    <div class="row bg-dark rounded-3 mt-5 m-5 p-5">
        <h1 class="h1 text-white text-center" >All Candidate</h1>
       <div class="container">
       <table class="table table-dark ">
            <thead>
                <tr>
                    <th scope="col">First name</th>

                    <th scope="col">Last name</th>
                    <th scope="col">Election id</th>
                    <th scope="col">Partyname</th>
                    <th scope="col">Constitution</th>
                    <th scope="col">Actions</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $candidates->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['fName']; ?></td>

                    <td><?php echo $row['lName']; ?></td>
                    <td><?php echo $row['Election_id']; ?></td>
                    <td><?php echo $row['Partyname']; ?></td>
                    <td> <?php echo $const_name ?> </td>
                    <td>
                        <a href="" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                        
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
       </div>
       <div class="container  d-flex aligns-items-center justify-content-center text-white pt-5 mb-0">
            <a href="candidate_registration.php?CID=<?php echo $CID; ?>&SIDS=<?php echo $SIDS; ?>&CONST_ID=<?php echo $id;?>"class="btn btn-success" >Add-Candidate</a>
       </div>
    </div>
</div>
<?php
    require('admin-footer.php')
?>