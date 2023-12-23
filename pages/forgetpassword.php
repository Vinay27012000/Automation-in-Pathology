<head><title>Reset password</title>
<style>
   label{
    font-size:20px;
   }
       
     .form1{
        font-family:'Times New Roman', Times, serif;
        max-width:400px;
        height:510px;
    color:#0f2027;
    
     }
 </style>
</head>
<div class="container form1 mt-5">
        <form id="form" action="" method="post">
        <h2 align="center">Reset password</h2>
        
        <div class="input-control">
            <label for="email">Email-id:</label>
            <input id="email" name="email" class="form-control" type="email" required>
        </div>
        <div class="input-control">
            <label for="password">Password:</label>
            <input id="password" name="password" class="form-control" type="password" required>
            
        </div>
        <br>
        <div>
            <button type="submit" class="btn btn-primary" name="save" href="">Submit</button>
            <a type="cancel" class="btn btn-danger"  href="./">Cancel</a>
        </div>
    </form>
    </div>

    <?php 
    if(isset($_POST['save'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `users` WHERE email = '$email'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            $sql = "UPDATE `users` SET `password`='$password' WHERE email = '$email'";
            $result = mysqli_query($conn,$sql);
            if($result){
                echo "<script>alert('Password Changes Successful')</script>";
             
                }
                else{echo "<script>alert('Some Error Occured')</script>";}
            }
    else{
        echo "<script>alert('Email id is not registered')</script>";
    }
}
    ?>