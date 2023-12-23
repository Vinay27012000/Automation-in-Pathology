<head><title>Change Password</title>
</head>

<section class="section profile mt-4 pb-5">
    <h3 class="p-2">Change Password</h3>
<div class="container-sm px-5 mt-4">
       
    <div class="row justify-content-center">
       
        <div class="col-xl-4">
            <!-- Account details card-->
            <div class="card ">
                <div class="card-header">Password Details</div>
                <div class="card-body">
                <form action="" method="post" class="needs-validation"  novalidate>
                        <!-- Form Group (username)-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (name)-->
                            <div class="col-md-10">
                            <label class="small mb-1" for="old">Old Pasword</label>
                            <input class="form-control" name="old" type="password" placeholder="Enter your old password" >
                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (name)-->
                            <div class="col-md-10">
                                <label class="small mb-1" for="new">New Password</label>
                                <input class="form-control" name="new" type="password" placeholder="Enter new password" >
                            </div>
                           
                        </div>
                        
                       
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-10">
                                <label class="small mb-1" for="re">Re-enter New password</label>
                                <input class="form-control" name="re" type="tel" placeholder="Re-enter New password" >
                            </div>
                           
                        </div>
                       
                        <!-- Save changes button-->
                        <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php 
if(isset($_POST['submit'])){
    $old = $_POST['old'];
    $new = $_POST['new'];
    $re = $_POST['re'];
    if($new == $re)
    {$query="UPDATE users SET `password`='$new' where username='$_SESSION[username]'";
    $result = mysqli_query($conn,$query);
    if($result){
        echo "<script>alert('Password Changed Successfully')</script>";
    }
    else{
        echo "<script>alert('Something went wrong')</script>";
    }}
    else{
        echo "<script>alert('New Passowrd Not Correct')</script>";
    }
}
?>
<script>
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