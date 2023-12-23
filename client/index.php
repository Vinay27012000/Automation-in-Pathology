<?php 
session_start();
if(!isset($_SESSION['username']))
{header("location:http://localhost:8080/AIP/index.php");}
date_default_timezone_set('Asia/Kolkata');
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <script src="https://kit.fontawesome.com/f991540242.js" crossorigin="anonymous"></script>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/f991540242.js" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <script type="text/javascript" src="js/index.js"></script>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
     <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
</head>
<body>
  
  <?php include 'connection.php'?>
  <?php include_once 'pages/navigation.php'?>
   
  <div class="container-fluid mt-4 pt-4">
  <div class="container-fluid  shadow bg-body rounded">
             <!--php page load dynamically--> 
        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';  ?>
            
        <?php 
            if(!file_exists('pages/'.$page.".php") && !is_dir($page)){
              include 'pages/404.html';
              }
            else{
              if(is_dir($page))
                include $page.'/index.php';
              else
                include 'pages/'.$page.'.php';
              }
         ?>
            
      </div>
      </div>
       
  <script>
       var page;
    $(document).ready(function(){
     page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
    })
    if(window.history.replaceState){ window.history.replaceState(null,null,location.href);}

    // Table Jquery
    $(document).ready(function () {
        $('#myTable').DataTable();
        
    });
  </script>
</body>
</html>
