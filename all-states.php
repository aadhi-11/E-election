<?php
    require('common-head.php');
    require('admin-header.php');
    require('conn.php');
    if (isset($_GET['id'])) {
        $c_code = $_GET['id'];
        $con_code=$_GET['Ccode'];
        $_ccode = intval($c_code);
        // Now, $receivedData contains the value passed from the source.php
        // $select_id_querry="SELECT id FROM countries WHERE Country_code = '$c_code' AND status > 0";
        // $CID=mysqli_query($conn,$select_id_querry);
        $s_querry = "SELECT * FROM states WHERE CID = '$_ccode' AND status = 1 ";
        $state=mysqli_query($conn,$s_querry);
        if(!$state)
        {
            echo("No State");
        }
    }
    else{
        echo("Not get");
    }
?>
<div class="container  d-flex aligns-items-center justify-content-center text-white ">
    <div class="row bg-dark rounded-3 mt-5 m-5 p-5">
        <h1 class="h1 text-white text-center" >All States Under <?php echo $con_code;?> </h1>
       <div class="container">
       <table class="table table-dark ">
            <thead>
                <tr>
                    <th scope="col">State Name</th>
                    <th scope="col">State Code</th>
                    <th scope="col">Major Election</th>
                    <th scope="col">constituency</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $state->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['State_name']; ?></td>
                    <td><?php echo $row['State_code']; ?></td>
                    <td><?php echo $row['Major_election']; ?></td>
                    <td><a href="all-costituency.php?id=<?php echo $row['SIDS']; ?>&scode=<?php echo $row['State_code']; ?>&CID=<?php echo $row['CID']; ?>" class="btn btn-info">constituency</a></td>
                    <td>
                        <a href="" class="btn btn-success">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
       </div>
       <div class="container  d-flex aligns-items-center justify-content-center text-white pt-5 mb-0">
            <a href="country-added-success.php?data=<?php echo $con_code ; ?>" class="btn btn-lg btn-success text-white">+Add State</a>
       </div>
    </div>
</div>
<?php
    require('admin-footer.php')
?>