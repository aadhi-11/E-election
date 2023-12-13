<?php
    include('conn.php');
    include('common-head.php');
    include('admin-header.php');
    if (isset($_GET['CONST_ID'])) {
        $CONST_ID = $_GET['CONST_ID'];
        $CID=$_GET['CID'];
        $SIDS=$_GET['SIDS'];
    }
?>

<div class="container bg-dark rounded-3 p-5 m-5 d-flex aligns-items-center justify-content-center ">
    <div class="container   d-flex aligns-items-center justify-content-center text-white">
        <div class="row bg-dark rounded-4"> 
            <form method="post"  action="add-voter-backend.php" enctype="multipart/form-data"  >
                <h1>Voter REGISTRATION FORM</h1>
                <br><br>
                <div >
                    <label for="fName" class="form-label"><strong>NAME:</strong></label>
                    <input type="text" class="form-control" id="fName" name="fName" placeholder="First name"  required >
                    <label for="mName" class="form-label"></label>
                    <input type="text" class="form-control" id="mName" name="mName" placeholder="Middle name"  required >
                    <label for="lName" class="form-label"></label>
                    <input type="text" class="form-control" id="lName" name="lName" placeholder="Last name"  required >
                    <br><br>
                    <label for="Nationality" class="form-label"><strong>NATIONALITY:</strong></label>
                    <input type="text" class="form-control" id="nationality" name="nationality" placeholder=" " required>
                    <br><br>
                    <label for="election_id" class="form-label"><strong>ELECTION ID NO:</srong>&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" class="form-control" id="Election_id" name="Election_id" placeholder="Election id" required>
                    <br><br>
                </div>
                
                <div >
                    <label for="Address" class="form-label">RESIDENTIAL ADDRESS:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="textarea" class="form-control" id="addresses" name="addresses" placeholder="Address" required>
                    <br><br>
                </div>
                <div class="mb-3   ">
                    <label for="Email" class="form-label">EMAIL ADDRESS:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="email" class="form-control" id="email_id" name="email" placeholder="eg:abc@gmail.com" required>
                    <br><br>
                </div>
                <div class="mb-3   ">
                    <label for="Contact" class="form-label">CONTACT NO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="10-digit phone no:" required>
                    <br><br>

                    <label for="dob" class="form-label">DATE OF BIRTH:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" class="form-control" id="dob" name="dob" placeholder="YYYY/MM/DD" required>
                    <br><br>

                    <label for="gender">GENDER:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="gender" value="male" id='male'>
                        Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    
                    <label>
                        <input type="radio" name="gender" value="female" id='female'>
                        Female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    
                    <label>
                        <input type="radio" name="gender" value="other" id='others'>
                        Other
                    </label>
                    <div class="mb-3">
                            <strong>Upload the photo &nbsp; &nbsp; :</strong>
                    <input type="file" id="photo" name="photo" accept="image/*" required>
                    </div>

                    <br><br>
                    <input type="hidden" name="CID" value="<?php echo $CID?>" >
                    <input type="hidden" name="SID" value="<?php echo $SIDS?>" >
                    <input type="hidden" name="id" value="<?php echo $CONST_ID?>" >
                    
                    
                    
                </div>
                <div class="mb-3">
                  <input type="submit" value="submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>


<?php
    include('admin-footer.php');
?>