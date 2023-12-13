<?php
    include('conn.php');
    include('common-head.php');
    include('admin-header.php');
?>
<div class="container bg-dark rounded-3 p-5 m-5 d-flex aligns-items-center justify-content-center ">
    <div class="container   d-flex aligns-items-center justify-content-center text-white">
        <div class="row bg-dark rounded-4"> 
            <form method="post" action="createCountry.php">
                <h1>Register Country</h1>
                <div class="mb-3   ">
                    <label for="country_name" class="form-label">Country:</label>
                    <input type="text" class="form-control" id="country_name" name="country_name" placeholder="country_name"  required >
                </div>
                <div class="mb-3   ">
                    <label for="country_code" class="form-label">Country Code:</label>
                    <input type="text" class="form-control" id="" name="country_code" placeholder="country_code" required>
                </div>
                <div class="mb-3   ">
                    <label for="national_election_committee" class="form-label">National Election Committee:</label>
                    <input type="text" class="form-control" id="national_election_committee" name="national_election_committee" placeholder="national_election_committee" required>
                </div>
                <div class="text-center p-5">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include('admin-footer.php');
?>