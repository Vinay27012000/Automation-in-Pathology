
<style>
.navbar .navbar-nav > li > a:hover {
  border-bottom:1px solid #fff;
} 
.nav-link{
    font-size:20px !important;
}
.navbar-brand{
    font-size: 25px !important;
}

@media (min-width: 1025px) {
.h-custom-2 {
height: 100%;
}
}
</style>

<?php
include 'connection.php';
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $userid="SELECT * from users where username='$username'";
    $query=mysqli_query($conn,$userid);
    
    $userid_count=mysqli_num_rows($query);
    if($userid_count>0){
        $user_data=mysqli_fetch_assoc($query);
        if($user_data['password']==$pass){
            
            $_SESSION['username']=$user_data['username'];
            if($username=='admin')
            header('location:admin/index.php');
            else
            header('location:client/index.php');

        }
        else{
           echo" <script>
            alert('Invalid password');
          </script>";
        }
    }
    else{
        echo" <script>
            alert('Invalid Username');
          </script>";
    }
    
}
?>

<nav class="navbar sticky-top navbar-expand-lg bg-info navbar-dark">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="./"><i class="fa fa-microscope mx-1"></i>PathLab</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <!-- Icons -->
        <div class="collapse navbar-collapse " id="navbarSupportedContent" >
        <ul class="navbar-nav me-auto mb-2 ml-lg-0 ms-auto">
            <li class="nav-item me-3 me-lg-0">
                <a class="nav-link text-white" href="?page=contact"><i class="fas fa-envelope mx-1"></i> Contact</a>
            </li>
            <li class="nav-item me-3 me-lg-0">
                <a class="nav-link text-white" href="?page=downloadreport"><i class="fas fa-search mx-1"></i> Download Report</a>
            </li>
                <!-- Button trigger modal -->
            <li>
                <!-- Button trigger modal -->
                <a href="" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#loginform">
                   <i class="fa fa-user"></i> Login</a>
                   
                
            </li>   
            
        </ul>
    </div>
</div>
   
</nav>
  <!-- Modal -->
    <!-- Container wrapper -->
<div class="modal fade" id="loginform" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
           
                <div class="px-5 ms-xl-4 text-lg-1 modal-header">
                    <h3 class="fw-normal mt-5 pb-2" ><i class="fa fa-microscope mx-1"></i>PathLab</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  
                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form id="myform"  method="post" class="needs-validation" novalidate>
                            
                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log In to your account</h3>
                               <div class="row justify-content-center"><div class="col-12"><span class="bg-danger" id="error"></div></div>
                            <div class="form-outline mb-4">
                                <input type="text" id="id" name="username" class="form-control form-control-lg" value="" placeholder="User_ID..." required/>
                                <div class="invalid-feedback">
                                    Please enter username.
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="pass" name="password" class="form-control form-control-lg" placeholder="Password..." required />
                                <div class="invalid-feedback">
                                    Please enter password.
                                </div>
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-info btn-lg btn-block" name="login" id="login" type="submit">Login</button>
                            </div>

                            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="?page=forgetpassword">Forgot password?</a></p>
                            <p>Don't have an account? <a href="?page=register" class="link-info">Register here</a></p>

                        </form>

                    </div>

                </div>
           
    </div>
</div>
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