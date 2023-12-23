<head><title>Registeration</title>
<style>
   label{
    font-size:20px;
   }
       
     .form1{
        font-family:'Times New Roman', Times, serif;
        max-width:400px;
    color:#0f2027;
    
     }
 </style>
</head>
<div class="container form1 mt-5 mb-5">
        <form id="form" action="" method="POST"  class="needs-validation" novalidate>
        <h2 align="center">User Registration</h2>
        <div class="input-control mt-5">
            <label for="username">UserName:</label>
            <input id="username" name="username" class="form-control" type="text" required>
            <div class="error"></div> 
        </div>
        <div class="input-control">
            <label for="name">Name:</label>
            <input id="name" name="name" class="form-control" type="text" required>
        </div>
        <div class="input-control">
            <label for="email">Email-id:</label>
            <input id="email" name="email" class="form-control" type="email" required>
        </div>
        <div class="input-control">
            <label for="contact">Contact Number:</label>
             <input type="number" id="contact" name="contact"  class="form-control" min="1000000000" max="9999999999" required>
        </div>
        <div class="input-control">
            <label for="password">Password:</label>
            <input id="password" name="password" class="form-control" type="password" required>
            <div class="error"></div>
        </div>
        <br>
        <div>
            <button class="btn btn-primary" type="submit" name="submit" >Submit</button>
            <a type="submit" class="btn btn-secondary" href="./">Close</a>
        </div>
    </form>
    </div>

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
<?php
    if(isset($_POST['submit']))
{

$name = $_POST['name'];
$user = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];
$cont = $_POST['contact'];

    $insertQuery = "INSERT INTO `users`(`name`, `email`, `contact`, `username`, `password`) VALUES ('$name ','$email','$cont','$user','$pass')";
    $result = mysqli_query($conn,$insertQuery);
    if ($result) {
     ?><script>alert("data inserted")</script>
     <?php   } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connectQuery);
    }
  }
  mysqli_close($conn); 
   

?>