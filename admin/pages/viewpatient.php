<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-auto mr-auto col-lg-10"><h3 class="text-center">Patient Details</h3></div>        
     </div>
     <?php 
      $id1=$_GET['id'];
      $insertQuery = "SELECT * from `patient` where patient_id='$id1'";
      $result = $conn->query($insertQuery);
      $rowcount=mysqli_num_rows($result);
      $row = $result->fetch_assoc();
     ?>
    <div class="container-fluid p-4">
        <table class="table ">
            <tr><th>Patient-ID:</th><td><?php echo $row['patient_id']?></td></tr>
            <tr><th>Patient-Name:</th><td><?php echo $row['name']?></td></tr>
            <tr><th>Gender:</th><td><?php echo $row['gender']?></td></tr>
            <tr><th>Date of Birth:</th><td><?php echo $row['dob']?></td></tr>
            <tr><th>Mobile:</th><td><?php echo $row['contact']?></td></tr>
            <tr><th>Address:</th><td><?php echo $row['address']?></td></tr>
        </table>
        <div class="container">
      <div class="row">
        <div class="col-2"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update"><i class='fa-solid fa-pen-to-square' style='color: #FFF;'></i> Update</button>
        </div>
         <!-- Button trigger modal -->
      </div>
    </div>
    </div>
    
    <div class="container-fluid p-4" >
    <h3 class="history">Appointment History</h3>
        <table class="table table-bordered  justify-content-start">
            <tr class="table-primary">
              <th>Appointment-ID</th>
              <th>Schedule Date</th>
              <th>Tests</th>
              <th>Status</th> 
            </tr>

            <?php  
                $fetchq="SELECT * from `appointment_list` where patient_id='$_GET[id]'";
                $result=mysqli_query($conn,$fetchq);
                if(mysqli_num_rows($result)){
                    while($row=$result->fetch_assoc()){
                        $q2="SELECT * from appointment_test_list where appointment_id='$row[appointment_id]'";
                        $r2=mysqli_query($conn,$q2); 
                      ?>
                      <tr>
                      <td><?php echo $row["appointment_id"]?></td>
                      <td><?php echo $row["schedule"]?></td>
                      <td><?php 
                          while($row2=$r2->fetch_assoc()){
                            $q3="SELECT * from test_list where test_id='$row2[test_id]'";
                             $r3=mysqli_query($conn,$q3);
                            $row3=$r3->fetch_assoc();
                            echo $row3["name"].", ";
                          }
                        ?></td>
                      <td class="text-center"><?php switch($row['status']){
                            case '0':echo "<span class='badge bg-secondary'> Pending </span>";break;
                            case '1':echo "<span class='badge bg-warning'> Approved </span>";break;
                            case '2':echo "<span class='badge bg-primary'> Sample Collected </span>";break;
                            case '3':echo "<span class='badge bg-success'> Report Generated </span>";break;
                            case '4':echo "<span class='badge bg-danger'> Cancelled </span>";break;
                            }?>
                    </td>
                  </tr>
                  <?php
                    }
                }
                else{
                  echo "<tr><td colspan='4' class='text-center'>No Data Found</td></tr>";
                }
              ?>                        
        </table>
    </div>
</div>
<!-- Modal update test details-->
<div class="modal fade" id="update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Patient Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action=""  method="post" class="needs-validation" novalidate>
  <div class="form-group">
    <label for="exampleFormControlInput1">Patient_ID</label>
    <input type="text" class="form-control" name="id" value="<?php echo $row['patient_id']?>" readonly>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Patient-Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $row['name']?>" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Gender</label>
    <select class="form-control" name="gender" required>
      <option disabled>select</option>
      <option>Male</option>
      <option>Female</option>
      <option>Others</option>
     
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">DOB</label>
    <input type="date" class="form-control" name="dob" value="<?php echo $row['dob']?>" required>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Mobile</label>
    <input type="number" class="form-control" name="contact" value="<?php echo $row['contact']?>" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Address</label>
    <textarea class="form-control" name="adds" rows="3" required><?php echo $row['address']?></textarea>
  </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary"><i class="fa-solid fa-pen-to-square" style="color: #FFF;"></i> Update</button>
      </div>

    </form>
      </div>
    </div>
  </div>
</div>
<?php

if(isset($_POST['update']))
{

$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$cont = $_POST['contact'];
$add = $_POST['adds'];
$date = date('Y-m-d H:i:s');
    $insertQuery = "UPDATE `patient` SET `name`='$name',`gender`='$gender',`contact`='$cont',`dob`='$dob',`address`='$add',`date_updated`='$date' WHERE patient_id='$id1'";
    $result = mysqli_query($conn,$insertQuery);
    if ($result) {
     ?><script>alert("data Updated successfully")</script>
     <?php   } else {
      echo "<script>alert('Error Occured')</script>";

    }
  }

   

?>

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