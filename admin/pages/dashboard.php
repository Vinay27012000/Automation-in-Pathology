<head><style>
.card{
    margin:15px 2px 30px 2px ;
    border-left:3px solid rgb(5, 238, 5);
    height:80%;
  }

</style>
<title>DashBoard</title>
</head>
<?php  include 'connection.php';


?>
<div class="container-fluid-0 pt-4 pb-5">
<div class="container-fluid-0 ">
      <h4>Dashboard</h4>
</div>
<div class="container-fluid-0 grids p-3">
<div class="row">
  <div class="col-lg-4 col-md-6">
    <div class="card shadow bg-body rounded ">
      <div class="card-body " >
        <div class="row">
          <div class="col-9 col-md-10">
              <div><h6 class="card-title">Today's Appointments</h6>
              </div>
              <div>
                <p class="card-text"> 
                  <?php $currentDate = date('Y-m-d');
                  $insertQuery = "SELECT * from `appointment_list` where schedule='$currentDate '";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);

                  echo $rowcount;
                  ?>
                  </p></div>
          </div>
            <div class="col-1">
              <i class="fa-solid fa-list" style="color: #e61919;font-size:30px"></i>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="card shadow bg-body rounded">
    <div class="card-body">
        <div class="row">
          <div class="col-9 col-md-10">
              <div><h6 class="card-title">Total Appointments</h6>
              </div>
              <div><p class="card-text">
              <?php 
                  $insertQuery = "SELECT * from `appointment_list`";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);

                  echo $rowcount;
                  ?>
              </p></div>
          </div>
            <div class="col-1">
              <i class="fa-solid fa-list" style="color: #e61919;font-size:30px"></i>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="card shadow bg-body rounded">
      <div class="card-body">
          <div class="row">
           <div class="col-9 col-md-10">
              <div>
                <h6 class="card-title">Approved Appointments</h6>
              </div>
              <div> <p class="card-text">
              <?php 
                  $insertQuery = "SELECT * from `appointment_list` where status=1";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);

                  echo $rowcount;
                  ?>                
              </p></div>
            </div>
              <div class="col-1">
                <i class="fa-solid fa-check-double" style="color: #00ff11;font-size:30px"></i>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 col-md-6">
    <div class="card shadow bg-body rounded">
    <div class="card-body">
        <div class="row">
          <div class="col-9 col-md-10">
              <div><h6 class="card-title">Pending Appointments</h6>
              </div>
              <div><p class="card-text"><?php 
                  $insertQuery = "SELECT * from `appointment_list` where status=0";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);

                  echo $rowcount;
                  ?> </p></div>
          </div>
            <div class="col-1">
            <i class="fa-regular fa-pen-to-square" style="color: #ff7b00;font-size:30px"></i>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-6">
    <div class="card shadow bg-body rounded">
    <div class="card-body">
        <div class="row">
          <div class="col-9 col-md-10">
              <div><h6 class="card-title">Report Generated</h6>
              </div>
              <div><p class="card-text">
              <?php 
                  $insertQuery = "SELECT * from `appointment_list` where status=3";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);

                  echo $rowcount;
                  ?> 
              </p></div>
          </div>
            <div class="col-1">
            <i class="fa-regular fa-newspaper" style="color: #286adb;font-size:30px"></i>
            </div>
        </div>
      </div>
    </div>
  </div>


  <div class="col-lg-4 col-md-6">
    <div class="card shadow bg-body rounded">
    <div class="card-body">
        <div class="row">
          <div class="col-9 col-md-10">
              <div><h6 class="card-title">Pending Report</h6>
              </div>
              <div><p class="card-text">
              <?php 
                  $insertQuery = "SELECT * from `appointment_list` where status in (1,2)";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);

                  echo $rowcount;
                  ?> 
              </p></div>
          </div>
            <div class="col-1">
            <i class="fa-regular fa-pen-to-square" style="color: #ff7b00;font-size:30px"></i>
            </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="row">
  <div class="col-lg-4 col-md-6">
    <div class="card shadow bg-body rounded">
    <div class="card-body">
        <div class="row">
          <div class="col-9 col-md-10">
              <div><h6 class="card-title">Total Active Tests</h6>
              </div>
              <div><p class="card-text"><?php 
                  $insertQuery = "SELECT * from `test_list` where status=1";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);

                  echo $rowcount;
                  ?> </p></div>
          </div>
            <div class="col-1">
              <i class="fa-solid fa-list" style="color: #e61919;font-size:30px"></i>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 ">
    <div class="card shadow bg-body rounded">
    <div class="card-body ">
        <div class="row">
          <div class="col-9 col-md-10">
              <div><h6 class="card-title">Total Registered patients</h6>
              </div>
              <div><p class="card-text"><?php 
                  $insertQuery = "SELECT * from `patient`";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);

                  echo $rowcount;
                  ?> </p></div>
          </div>
            <div class="col-1">
              <i class="fa fa-user" style="color: #e61919;font-size:30px"></i>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 ">
    <div class="card shadow bg-body rounded">
    <div class="card-body ">
        <div class="row">
          <div class="col-9 col-md-10">
              <div><h6 class="card-title">Total Users</h6>
              </div>
              <div><p class="card-text">
              <?php 
                  $insertQuery = "SELECT * from `users`";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);

                  echo $rowcount;
                  ?> 
              </p></div>
          </div>
            <div class="col-1">
              <i class="fa fa-user" style="color: #e61919;font-size:30px"></i>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
</div>
</div>