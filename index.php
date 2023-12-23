<?php include 'pages/connection.php'?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./css/index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" rel="stylesheet" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/f991540242.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/index.js"></script>
<title>PathLab</title>
</head>
<body>
      <!-- Navbar -->
      <?php include 'pages/topnav.php'?>
      
      <!-- Navbar -->  

      <div class="container-fluid-0">
             <!--php page load dynamically--> 
            <?php $page = isset($_GET['page']) ? $_GET['page'] : 'about';  ?>
            
              <?php 
              if(!file_exists('pages/'.$page.".php")){
                  include 'pages/404.html';
              }
              else{
                  include 'pages/'.$page.'.php';
              }
              ?>
            
      </div>
    <footer class="mt-auto navbar-dark bg-info">
      <!-- Copyright -->
      <div class="text-center text-white p-1" style="background-color:  rgba(0, 0, 0, 0.2);">
    <span>© 2023 Copyright: PathLab<span>
  </div>
    </footer> 
    <script>
       if(window.history.replaceState){ window.history.replaceState(null,null,location.href);}
      </script>
  </body>
</html>