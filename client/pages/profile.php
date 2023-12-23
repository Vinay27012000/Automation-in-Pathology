<head>
    <title>Profile</title>
   

</head>

<?php 
$query="SELECT * from users where username='$_SESSION[username]'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

?>
<section class="section profile mb-5 mt-4 ">
    <div class="mt-2">
    <h3 class="p-2">Profile</h3></div>
<div class="container-xl px-4 ">
<div class="row justify-content-center">
    <div class="col-xl-8">    
    <div class="row align-items-center">
        <!-- Profile picture image-->
        <div class="col-md-3 m-2">
            <img class="img-account-profile rounded-circle mb-2" src="<?php echo "img/".$row['avatar']?>" alt="" width="160px" style="border-radius:50%;">
        </div>
        <div class="col-md-8">
            <div class="name1">
                <h2><?php echo $row['name'];?></h2>
                <div class="container-fluid-0">
                    <span class="text-primary"><?php echo $row['email'];?> </span>
                    <span class="h5">- Administrator</span>
                </div>                
        </div>
    </div> 
    </div>
            <div class="container">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editphoto">Change Image</button>
            </div>     
    
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username</label>
                            <input class="form-control bg-white" id="inputUsername" type="text" placeholder="Enter your username" value="<?php echo $row['username']?>" disabled>
                        </div>
                        <!-- Row-->
                        <div class="row gx-3 mb-3">
                            <!--  (name)-->
                            <div class="col-md-12">
                                <label class="small mb-1" for="inputFirstName">Name</label>
                                <input class="form-control bg-white" id="inputFirstName" type="text" placeholder="Enter yourname" value="<?php echo $row['name']?>" disabled>
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <!--  (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Contact number</label>
                                <input class="form-control bg-white" id="inputPhone" type="tel" placeholder="Enter your phone number" value="<?php echo $row['contact']?>" disabled>
                            </div>
                            <!-- (email)-->
                            <div class="col-md-6">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control bg-white" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="<?php echo $row['email']?>" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                             <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editprofile">edit</button>
                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
    
</section><!--Edit photo-->
<div class="modal fade" id="editphoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="px-5 ms-xl-4 text-lg-1 modal-header">
                <h4 class="fw-normal mt-3 pb-2" >Update Profile Photo</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                <form action="" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    <div class="input-group mb-3">
                        <input type="file" name="photo" accept=".jpg, .png" id="photo" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="upload">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <?php
        if(isset($_POST['upload'])){
         if (isset($_FILES['photo']['name']))
         {
           $file_name = $_FILES['photo']['name'];
           $file_tmp = $_FILES['photo']['tmp_name'];
           move_uploaded_file($file_tmp,"./img/".$file_name);
         }
         else
         {
           echo "<script>alert('Photo not uploaded!')</script>";
         }
            $sql = "UPDATE `users` SET `avatar`='$file_name' WHERE username='$_SESSION[username]'";
            
            // Execute query
            $query=mysqli_query($conn, $sql);
            
            // Now let's move the uploaded image into the folder: image
            if ($query) {
                echo "<script>alert(' Image uploaded successfully!');</script>";
            } else {
                echo "<script>alert(' Fail to uploaded successfully!');</script>";
            }
        }
        ?>

<!-- Edit profile-->
<div class="modal fade" id="editprofile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
           
                <div class="px-5 ms-xl-4 text-lg-1 modal-header">
                    <h3 class="fw-normal mt-5 pb-2" >Update Profile Details</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  
                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form id="myform" action=""  method="post" class="needs-validation" novalidate>
                               
                            <div class="form-outline mb-4">
                                <input type="text"  name="name" class="form-control form-control-lg" placeholder="Enter your name"  value="<?php echo $row['name']?>"  required/>
                                <div class="invalid-feedback">
                                    Please enter name.
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                            <input type="tel" id="contact" name="contact"  class="form-control" pattern="[0-9]{10}" maxlength="9999999999"placeholder="Enter your contact no."  value="<?php echo $row['contact']?>" required/>
                                <div class="invalid-feedback">
                                    Please enter contact no.
                                </div>
                            </div>
                            <div class="form-outline mb-4">
                            <input class="form-control bg-white" name="email" type="email" placeholder="Enter your email address" value="<?php echo $row['email']?>" required/>
                                <div class="invalid-feedback">
                                    Please enter email.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary" name="update">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
</div>
<?php
if(isset($_POST['update']))
{

$name = $_POST['name'];
$cont = $_POST['contact'];
$email = $_POST['email'];

    $insertQuery = "UPDATE `users` set `name`='$name',`contact`='$cont',`email`='$email' where username='$row[username]'";
    $result = mysqli_query($conn,$insertQuery);
    if ($result) {
     echo "<script>alert('data updated successfully')</script>";
      } else {
      echo "<script>alert('Error ocurred !');</script>";
    }
  }
  mysqli_close($conn); 
   

?>

<script>
   
   // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
 'use strict'

 // Fetch all the forms we want to apply custom Bootstrap validation styles to
 var forms = document.querySelectorAll('.needs-validation')

 // Loop over them and prevent submission
 Array.prototype.slice.call(forms)
   .forEach(function (form) {
     form.addEventListener('submit', function (event) {
       if (!form.checkValidity()) {
         event.preventDefault()
         event.stopPropagation()
       }

       form.classList.add('was-validated')
     }, false)
   })
})()
</script>  
