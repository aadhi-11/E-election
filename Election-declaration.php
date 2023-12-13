<?php
    include('conn.php');
    include('common-head.php');
    include('admin-header.php');
    if (isset($_GET['id'])) {
        $CONST_ID = $_GET['id'];
        $SIDS = $_GET['SIDS'];
        $CID = $_GET['CID'];
        $s_querry = "SELECT * FROM candidate  WHERE  CONST_ID = '$CONST_ID' AND status = 1" ;
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
 <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container bg-dark rounded-3 p-5 m-5 d-flex aligns-items-center justify-content-center ">
    <div class="container   d-flex aligns-items-center justify-content-center text-white">
        <div class="row bg-dark rounded-4"> 
            <form method="post" action="Election-dec-conn.php">
                <h1>ELECTION DECLARATION</h1>
                <div class="mb-3   ">
                    <label for="opening_date" class="form-label">Nomination Accepted from:</label>
                    <input type="date" class="form-control" id="opening_date" name="opening_date" placeholder="opening_date"  required >
                </div>
                <div class="mb-3   ">
                    <label for="closing_date" class="form-label">Nomination Closing from:</label>
                    <input type="date" class="form-control" id="" name="closing_date" placeholder="closing_date" required>
                </div>
                <div class="mb-3   ">
                    <label for="election_on" class="form-label">Election will be held on:</label>
                    <input type="date" class="form-control" id="election_on" name="election_on" placeholder="election_on" required>
                </div>
                <div class="mb-3   ">
                    <label for="counting_on" class="form-label">Counting on:</label>
                    <input type="date" class="form-control" id="counting_on" name="counting_on" placeholder="counting_on" required>
                </div>

                <input type="hidden" name="CID" value="<?php echo $CID?>" >
                <input type="hidden" name="SID" value="<?php echo $SIDS?>" >
                <input type="hidden" name="id" value="<?php echo $CONST_ID?>" >
                        
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