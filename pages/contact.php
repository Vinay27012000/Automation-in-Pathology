<!--Section: Contact v.2-->
<head><style>
p{
    font-family:times new roman;
    font-size:23px;
}
.form-control{
    border:none;
    border-bottom:1.5px solid #DCDCDC;
    outline: none;
    
}
@media screen and (min-width:700px){
    .contact{
    width:900px;
    }
}
</style>
<title>Contact Us</title>
</head>
<div class="container mt-5 contact">

    <!--Section heading-->
    <h1 class="h1-responsive font-weight-bold text-center ">Contact us</h1>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form action="" method="post" class="needs-validation"  novalidate>
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6 mt-4">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required>
                            
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6 mt-4">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control" placeholder="Your Email" required>
                            
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12 mt-4">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" placeholder="Your Message" required></textarea>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            <div class="text-center text-md-left m-2">
                <button class="btn btn-primary" name="send"  type="submit">Send</button>
            </div>
            
            </form>

            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mt-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p class="text-center">Ghaziabad, Uttar Pradesh, India </p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                <p class="text-center">+ 91-2345 5678 89</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                <p class="text-center">contact@pathlab.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</div>
<!--Section: Contact v.2-->

<?php 
if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    $query="INSERT INTO contactform (`name`,`email`,`subject`,`message`) VALUES ('$name','$email','$subject','$message')";
    $result = mysqli_query($conn,$query);
    if($result){
        echo "<script>alert('Your Message Has Been Sent Successfully')</script>";
    }
    else{
        echo "<script>alert('Something went wrong')</script>";
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