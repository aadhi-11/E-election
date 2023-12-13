<?php
    include('common-head.php');
    include('admin-header.php');
    if (isset($_GET['data'])) {
        $s_id = $_GET['data']; 
    }
    if (isset($_GET['scode'])) {
        $scode = $_GET['scode']; 
    }
    if (isset($_GET['CID'])) {
        $CID = $_GET['CID']; 
    }
?>
<div class="container   d-flex aligns-items-center justify-content-center text-white">
    <div class="row bg-dark rounded-3 mt-5 d-flex aligns-items-center justify-content-center ">
        <div class="container text-center">
            
        </div>
        <form method="post" action="createCostituency.php">
                <h1>Costituency </h1>
                <div class="mb-3   ">
                    <label for="Costituency_name" class="form-label">Costituency:</label>
                    <input type="text" class="form-control" id="Costituency_name" name="Costituency_name" placeholder="Costituency_name" required>
                </div>
                <div class="mb-3   ">
                    <label for="Costituency_code" class="form-label">Costituency code:</label>
                    <input type="text" class="form-control" id="Costituency_code" name="Costituency_code" placeholder="Costituency_code" required>
                </div>
                <input type="hidden" name="sid" value="<?php echo $s_id ?>" >
                <input type="hidden" name="CID" value="<?php echo $CID?>" >
                <div class=" text-center p-5">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

        </form>
    </div>
</div>

<?php
    include('admin-footer.php');
?>