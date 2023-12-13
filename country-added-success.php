<?php
        include('conn.php');
        include('common-head.php');
        include('admin-header.php');
        if (isset($_GET['data'])) {
            $c_code = $_GET['data'];
            // Now, $receivedData contains the value passed from the source.php
            $select_id_querry="SELECT id FROM countries WHERE Country_code = '$c_code' AND status > 0";
            $CID=mysqli_query($conn,$select_id_querry);
            if($CID)
            {
                while ($row = mysqli_fetch_assoc($CID)) {
                    // Access the column_name value from the row
                    $_cid= $row['id'];
                    // Do something with the value, like echo or manipulate it.
                }
            }
        }
?>

<div class="container   d-flex aligns-items-center justify-content-center text-white">
    <div class="row bg-dark rounded-3 mt-5 d-flex aligns-items-center justify-content-center ">
        <div class="container text-center">
            <p><i><?php echo $c_code;?> Country Created Successfully</i></p>
        </div>
        <form method="post" action="createState.php">
                <h1>State  </h1>
                <div class="mb-3   ">
                    <label for="State_name" class="form-label">State:</label>
                    <input type="text" class="form-control" id="State_name" name="State_name" placeholder="State_name" required>
                </div>
                <div class="mb-3   ">
                    <label for="State_code" class="form-label">State Code:</label>
                    <input type="text" class="form-control" id="State_code" name="State_code" placeholder="State_code" required>
                </div>
                <div class="mb-3   ">
                    <label for="Major_election" class="form-label">Major Election:</label>
                    <input type="text" class="form-control" id="Major_election" name="Major_election" placeholder="Major_election" required>
                </div>
                <input type="hidden" name="CID" value="<?php echo $_cid ?>" >
                <div class=" text-center p-5">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

        </form>
    </div>
</div>


<?php
    
    
    include('admin-footer.php');
?>