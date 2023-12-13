<?php
    include('common-head.php');
    $status="";
    if (isset($_GET['status']))
    {
        $status = $_GET['status'];
    }
 ?>
<div class="container bg-dark rounded-3 p-5 m-5 d-flex aligns-items-center justify-content-center ">
    <div class="container   d-flex aligns-items-center justify-content-center text-white">
        <div class="row bg-dark rounded-5 p-5"> 
            <form method="post" action="login-backend.php"  >
                <h1>Login</h1>
                <p class="text-danger"> <i><?php echo "!".$status."" ?></i> </p>
                <div class="mb-3">
                    <label for="El_id" class="form-label">Election id Number</label>
                    <input type="text" class="form-control" id="El_id" name="El_id" required>
                    
                </div>
                <div class="mb-3">
                    <label for="Phone" class="form-label">Phone</label>
                    <input type="Number" class="form-control" id="Phone" name="phone" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
</form>

        </div>
    </div>
</div>

<?php
    include('admin-footer.php');
?>