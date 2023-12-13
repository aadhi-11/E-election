<?php
    include('conn.php');
    include('common-head.php');
    include('admin-header.php');
    if (isset($_GET['CONST_ID'])) {
        $CONST_ID = $_GET['CONST_ID'];
        $CID=$_GET['CID'];
        $SIDS=$_GET['SIDS'];
    }
    echo $CONST_ID;
 ?>
<div class="container bg-dark rounded-3 p-5 m-5 d-flex aligns-items-center justify-content-center ">
    <div class="container   d-flex aligns-items-center justify-content-center text-white">
        <div class="row bg-dark rounded-4"> 
            <form method="post" action="connect.php"  enctype="multipart/form-data" >
                <h1>CANDIDATE REGISTRATION FORM</h1>
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
                    <input type="text" class="form-control" id="dob" name="dob" placeholder="DD/MM/YYYY" required>
                    <br><br>

                    <label for="gender">GENDER:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="gender" value="male">
            Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </label>
        
        <label>
            <input type="radio" name="gender" value="female">
            Female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </label>
        
        <label>
            <input type="radio" name="gender" value="other">
            Other
        </label>
        <br><br>

        
        <div>
                    <label for="Partyname" class="form-label"><strong>POLITICAL PARTY NAME:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" class="form-control" id="Partyname" name="Partyname" placeholder=" "  required >
                    
                    <br><br>
                    <div>
                    <label for="experience">PRE EXPERIENCE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="experience" value="Yes">
            Yes&nbsp;&nbsp;&nbsp;&nbsp;
        </label>
        
        <label>
            <input type="radio" name="experience" value="No">
            No
        </label>

        
        <br><br>
                    </div>
                    
                
        
        <div>
                <strong>Upload the photo:</strong>
        <input type="file" id="photo" name="photo[]" accept="image/*" required>
        <br><br>

            <strong>Upload the ID proof</strong>
        <input type="file" id="idphoto" name="photo[]" accept="image/*" required>
        <br><br>  


        </div>

        <div>
        <strong>Upload Election Symbol:</strong>
        <input type="file" id="symbolphoto" name="photo[]" accept="image/*" required>
        <br><br>

        
        </div>

        <strong>Upload the Affidavit</strong>
        <input type="file" id="affphoto" name="photo[]" accept="image/*" required>
        <br><br>

        
        <br><br>
        <input type="hidden" name="CID" value="<?php echo $CID?>" >
        <input type="hidden" name="SID" value="<?php echo $SIDS?>" >
        <input type="hidden" name="id" value="<?php echo $CONST_ID?>" >
        <h1><?php echo $CONST_ID?></h1>
                    
                </div>
                <input type="submit" class="btn btn-success" name="submit" value="SUBMIT">

            
            </form>
        </div>
    </div>
</div>

<?php
    include('admin-footer.php');
?>