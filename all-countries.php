<?php
    require('common-head.php');
    require('admin-header.php');
    require('conn.php');
    $c_querry = 'SELECT * FROM countries WHERE status > 0';
    $country=mysqli_query($conn,$c_querry);
?>
<div class="container  d-flex aligns-items-center justify-content-center text-white">
    <div class="row bg-dark rounded-3 mt-5 m-5 p-5">
        <h1 class="h1 text-white text-center mb-2" >All Countries Registered</h1>
       <div class="container">
       <table class="table table-dark ">
            <thead>
                <tr>
                    <th scope="col">Country Name</th>
                    <th scope="col">Country Code</th>
                    <th scope="col">National Election Committee</th>
                    <th scope="col">States</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $country->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['Country_name']; ?></td>
                    <td><?php echo $row['Country_code']; ?></td>
                    <td><?php echo $row['Election_committee']; ?></td>
                    <td><a href="all-states.php?id=<?php echo $row['id']; ?>&Ccode=<?php echo $row['Country_code']; ?>" class="btn btn-info">State</a></td>
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
            <a href="country-regs.php" class="btn btn-lg btn-success text-white">+Add Country</a>
       </div>
    </div>
</div>
<?php
    require('admin-footer.php')
?>