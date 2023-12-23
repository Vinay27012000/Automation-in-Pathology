<head><style>
.card{
    margin:10px 0 20px 0 ;
    border-left:3px solid rgb(5, 238, 5);
    height:80%;
  }

</style>
<title>Dashboard</title>
</head>
<div class="container-fluid-0 mt-4 pt-4 pb-5 p-4">
<div class="container-fluid-0 ">
      <h4>Dashboard</h4>
</div>
<div class="container-fluid-0 grids">
<div class="row">
  <div class="col-lg-4 col-md-6">
    <div class="card shadow bg-body rounded ">
      <div class="card-body ">
        <div class="row">
          <div class="col-9">
              <div><h6 class="card-title">Booked Appointments</h6>
              </div>
              <div><p class="card-text">
                <?php 
                  $insertQuery = "SELECT * from `appointment_list` A INNER JOIN `patient` P on P.patient_id=A.patient_id where P.username='$_SESSION[username]'";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);

                  echo $rowcount;
                  ?></p></div>
          </div>
            <div class="col-2">
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
          <div class="col-9">
              <div><h6 class="card-title">pending Appointments</h6>
              </div>
              <div><p class="card-text">
              <?php 
                  $insertQuery = "SELECT * from `appointment_list` A INNER JOIN `patient` P on P.patient_id=A.patient_id where P.username='$_SESSION[username]' and A.status='0'";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);

                  echo $rowcount;
                  ?>
              </p></div>
          </div>
            <div class="col-2">
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
           <div class="col-9">
              <div>
                <h6 class="card-title">Approved Appointments</h6>
              </div>
              <div> <p class="card-text">
              <?php 
                  $insertQuery = "SELECT * from `appointment_list` A INNER JOIN `patient` P on P.patient_id=A.patient_id where P.username='$_SESSION[username]' and A.status='1'";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);

                  echo $rowcount;
                  ?>
              </p></div>
            </div>
              <div class="col-2">
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
          <div class="col-9">
              <div><h6 class="card-title">Cancelled Appointments</h6>
              </div>
              <div><p class="card-text">
              <?php 
                  $insertQuery = "SELECT * from `appointment_list` A INNER JOIN `patient` P on P.patient_id=A.patient_id where P.username='$_SESSION[username]' and A.status='4'";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);

                  echo $rowcount;
                  ?>
              </p></div>
          </div>
            <div class="col-2">
            <i class="fa-solid fa-xmark fa-xl" style="color: #e61919;font-size:30px"></i>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="card shadow bg-body rounded">
    <div class="card-body">
        <div class="row">
          <div class="col-9">
              <div><h6 class="card-title">Report Generated</h6>
              </div>
              <div><p class="card-text">
              <?php 
                  $insertQuery = "SELECT * from `appointment_list` A INNER JOIN `patient` P on P.patient_id=A.patient_id where P.username='$_SESSION[username]' and A.status='3'";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);

                  echo $rowcount;
                  ?>
              </p></div>
          </div>
            <div class="col-2">
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
          <div class="col-9">
              <div><h6 class="card-title">Pending Report</h6>
              </div>
              <div><p class="card-text">
              <?php 
                  $insertQuery = "SELECT * from `appointment_list` A INNER JOIN `patient` P on P.patient_id=A.patient_id where P.username='$_SESSION[username]' and A.status='2'";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);

                  echo $rowcount;
                  ?>
              </p></div>
          </div>
            <div class="col-2">
            <i class="fa-regular fa-pen-to-square" style="color: #ff7b00;font-size:30px"></i>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="card shadow bg-body rounded">
    <div class="card-body ">
        <div class="row">
          <div class="col-11">
              <div><h6 class="card-title">Total Registered patients</h6>
              </div>
              <div><p class="card-text">
              <?php 
                  $insertQuery = "SELECT * from `patient` where username='$_SESSION[username]'";
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