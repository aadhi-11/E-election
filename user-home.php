<?php
    include('common-head.php');
    include('user-header.php');
    $statusv="";
    $statusr="";
    if (isset($_GET['status']))
    {
        $status = $_GET['status'];
        $CONST_ID=$_GET['CONST_ID'];
        $id=$_GET['id'];
    }
    else{
        header("Location:login.php?status=".$status);
    }
    if($status!="1")
    {
        header("Location:login.php?status=".$status);
    }
    if (isset($_GET['statusv']))
    {
        $statusv = $_GET['statusv'];
    }
    if (isset($_GET['statusr']))
    {
        $statusr = $_GET['statusr'];
    }
?>
 <div class="container rounded-3 d-flex aligns-items-center justify-content-center">
    <br>
    <br>
    <br>
 </div>
<div class="container bg-dark rounded-3 p-5 m-5 d-flex aligns-items-center justify-content-center pt-5">
    <div class="container   d-flex aligns-items-center justify-content-center text-white ">
        <div class="row bg-dark rounded-5 p-5 mt-3"> 
            <div class="col-xl-6">
                <h3>Vote</h3>
                <br>
                <p><i><?php echo "".$statusv."" ?></i></p>
                <a href="voting-validation?CONST_ID=<?php echo $CONST_ID ; ?>&id=<?php echo $id ; ?>" class="btn btn-success"> vote</a>

            </div>
            <div class="col-xl-6">
                <h3>Result</h3>
                <br>
                <p><i><?php echo "".$statusr."" ?></i></p>
                <a href="result-validation.php?CONST_ID=<?php echo $CONST_ID ; ?>&id=<?php echo $id ; ?>" class="btn btn-success" > Result </a>
            </div>
</form>

        </div>
    </div>
</div>

<?php
    include('admin-footer.php');
?>