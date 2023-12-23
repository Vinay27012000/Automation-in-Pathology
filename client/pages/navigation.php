<?php 

$insertQuery = "SELECT * from `users` where username='$_SESSION[username]'";
$result = $conn->query($insertQuery);
$row = $result->fetch_assoc();
 
?>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle mr-5"> <i class='bx bx-menu' id="header-toggle"></i> 
        <span class="wel ml-4">Welcome <i><?php echo $row['name']; ?></i></span>
        
        </div>
        <div class="notification" > 
            <div class="row">
              <div class="col-4 mt-2"> <a href=""  onclick="location.reload();" ><i class="fa fa-refresh" aria-hidden="true"></i></a>
              </div>
               <div class="col-8">
                        
                 <img class="mg1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" src="<?php echo "img/".$row['avatar']?>" alt="">
                 </button>
                 <div class="dropdown-menu  dropdown-menu-center" style="border-radius:10px;" aria-labelledby="dropdownMenuButton">
                   <a class="dropdown-item" href="?page=profile">My Profile</a>
                   <a class="dropdown-item" href="?page=changepassword">Change Password</a>
                   
                </div>            
               </div> 
            </div>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar" style="min-width:72px">
        <nav class="nav dark-navbar">
            <div> 
                <div class="nav_logo text-white"><h3> <i class='fa fa-microscope mx-1'></i></h3> 
                <span class="nav_logo-name"><h3>PathLab</h3></span> </div>
                <div class="nav_list"> 
                    <a href="./" class="nav_link" style="text-decoration:none;">
                    <i class='bx bx-grid-alt nav_icon'></i>
                    <span class="nav_name">Dashboard</span> </a>
                    <a href="?page=appointment" class="nav_link" style="text-decoration:none;"> 
                      <i class='bx bx-message-square-detail nav_icon'></i>
                       <span class="nav_name">Appointments</span> </a>
                    <a href="?page=tests" class="nav_link" style="text-decoration:none;">
                    <i class="fa-solid fa-notes-medical"></i>
                    <span class="nav_name">Test Details</span> </a>
                    <a href="?page=patient" class="nav_link" style="text-decoration:none;"> 
                    <i class='bx bx-user nav_icon'></i>
                     <span class="nav_name">Patients</span> </a>
                      
                        <a href="?page=report" class="nav_link" style="text-decoration:none;">
                         <i class='bx bx-bookmark nav_icon'></i> 
                        <span class="nav_name">Reports & Bill</span> </a> 

                </div>
            </div>                <a href class="nav_link" style="text-decoration:none;" data-bs-toggle="modal" data-bs-target="#logout"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sign Out</span>
                </a>
        </nav>
    </div>
    
    <!--logout Modal -->
<div class="modal fade" id="logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>Are you sure to logout ?</h4>
      </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="http://localhost:8080/AIP/pages/logout.php" class="btn btn-primary">logout</a>
            </div>
    </div>
  </div>
</div>
    <!--Container Main end-->
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
    

    document.addEventListener("DOMContentLoaded", function(event) {
   const showNavbar = (toggleId, navId, bodyId, headerId) =>{
   const toggle = document.getElementById(toggleId),
   nav = document.getElementById(navId),
   bodypd = document.getElementById(bodyId),
   headerpd = document.getElementById(headerId)
   
   // Validate that all variables exist
   if(toggle && nav && bodypd && headerpd){
   toggle.addEventListener('click', ()=>{
   // show navbar
   nav.classList.toggle('show')
   // change icon
   toggle.classList.toggle('bx-menu-alt-right')
   // add padding to body
   bodypd.classList.toggle('body-pd')
   // add padding to header
   headerpd.classList.toggle('body-pd')
   })
   }
   }
   
   showNavbar('header-toggle','nav-bar','body-pd','header')
   
   /*===== LINK ACTIVE =====*/
   const linkColor = document.querySelectorAll('.nav_link')
   
   function colorLink(){
   if(linkColor){
   linkColor.forEach(l=> l.classList.remove('active'))
   this.classList.add('active')
   }
   }
   linkColor.forEach(l=> l.addEventListener('click', colorLink))
   
    // Your code to run since DOM is loaded and ready
   });
   </script>
   </body>