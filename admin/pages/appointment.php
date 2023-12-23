<?php 
include 'connection.php';
  $patientquery="SELECT * FROM `patient`";
  $patientresult=mysqli_query($conn,$patientquery);

  $query1="SELECT * FROM `test_list`";
  $result1=mysqli_query($conn,$query1);
  
?>
<head>
<title>Appointments</title> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- select2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <!-- select2-bootstrap4-theme -->
  <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet">
<link rel="stylesheet" href="css/index1.css">

</head>
<div class="container-fluid-0 pb-4">
   <div class="row align-items-center justify-content-between">
    <div class="col-auto mr-auto col-lg-5 ">
    <div class="card border-0 ">
      <div class="card-body ">
        <div class="row">
          <div class="col-9">
              <div><h4 class="card-title">Appointments Details</h4>
              </div>
              <div><select class="category" id="status1">
                <option value="">Select Category</option>
                <option>Approved</option>
                <option>Cancelled</option>
                <option value="pending">Pending Approval</option>
                <option value="sample collected">pending Report</option>
                <option>Report Generated</option>
                </select>
              </div>
          </div>
            <!-- <div class="col-2">
              <i class="fa-solid fa-list" style="color: #e61919;font-size:30px"></i>
            </div> -->
        </div>
      </div>
    </div>
  </div>
        <div class="col-auto">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add"><i class="fa-solid fa-plus"></i> Book Appointment</button>
        </div>
   </div>
    <table class="table display" width="100%" id="myTable">
        <thead class="table-info">
            <tr>
                <th scope="col">Appointment_ID</th>
                <th scope="col">Schedule</th>
                <th scope="col">Patient_Name</th>
                <th scope="col">Test_Details</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
                <?php  
                $fetchq="SELECT * from `patient` RIGHT JOIN `appointment_list` on patient.patient_id=appointment_list.patient_id";
                $result=mysqli_query($conn,$fetchq);
                if(mysqli_num_rows($result)){
                    while($row=$result->fetch_assoc()){
                        $q2="SELECT * from appointment_test_list where appointment_id='$row[appointment_id]'";
                        $r2=mysqli_query($conn,$q2); 
                      ?>
                      <tr>
                      <td class="Aid"><?php echo $row["appointment_id"]?></td>
                      <td><?php echo $row["schedule"]?></td>
                      <td><?php echo $row["name"]?></td>
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
                      <td>
                        <a class="btn" href="?page=viewappointment&id=<?php echo $row["appointment_id"]?>"><i class="fa-regular fa-eye" style="color: blue;"></i></a>
                        <a href="" class="btn update" ><i class="fa-solid fa-pen-to-square" style="color: #fad000;"></i></a>
                        <a href="" class="btn delete" ><i class="fa fa-trash-alt" style="color: red;"></i></a>
                      </td>
                  </tr>
                  <?php
                    }
                }
                else{
                  echo "<tr><td colspan='6' class='text-center'>No Data Found</td></tr>";
                }
                ?>        
        </tbody>
    </table>
</div>


<script>
    
</script>


<!--Appointment Schedule Detail-->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Schedule Appointment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  action=""  method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            <div class="form-group">
              <label for="dates" required>Select Date :</label>
              <input type="date" name="date" id="date" class="dates form-control" placeholder="dd-mm-yyyy" value="" min="" max="2025-12-31" required>
            </div>
            <div class="form-group">
              <label for="patientoption">Patient-ID</label>
                <select id="patientoption" name="patientid" placeholder="Choose Patient" class="form-control select2" required>
                    <option value=""></option>
                    <?php if(mysqli_num_rows($patientresult)>0){
                        while($row = $patientresult->fetch_assoc()) {
                    ?>
                  <option value="<?php echo $row["patient_id"]?>"><?php echo $row["patient_id"]?> - <?php echo $row["name"]?></option>
                  <?php 
                    }}
                    else{
                    echo "<option disabled>No Data Found</option>";
                    }?>    
                </select>
            </div>
              <div class="form-group">
                <label for="multiple">Select Tests</label>
                <select name="tests[]" multiple placeholder="Choose Tests" data-allow-clear="1" required>
                    <?php if(mysqli_num_rows($result1)>0){
                    while($row = $result1->fetch_assoc()) {
                      ?>
                    <option class="testlist" value="<?php echo $row["test_id"]?>"><?php echo $row["name"]?></option>
                   <?php 
                      }}
                      else{
                        echo "<option disabled>No Data Found</option>";
                      }
                    ?>
                  </select>
              </div>
              <div class="form-group">
                  <label for="exampleFormControlInput1">Prescription <i>(if any)</i></label>
                  <input type="file" name="pres" accept="application/msword, .doc, .docx, .txt, application/pdf" id="prescription" class="form-control" >
              </div>
            <div class="form-group">
                <label for="remark">Remark</label>
                <textarea class="form-control" name="remark" rows="3"></textarea>
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="book" class="btn btn-primary"><i class="fa-solid fa-plus"></i>Book</button>
              </div>   
        </form>
      </div>
    </div>
  </div>
</div>
          <?php 
            if(isset($_POST['book'])){
              $date=$_POST['date'];
              $p_id=$_POST['patientid'];
              $testarray=$_POST['tests'];
              $remark=$_POST['remark'];
              $d1 = date('Y-m-d H:i:s');

              if (isset($_FILES['pres']['name']))
              {
                $file_name = $_FILES['pres']['name'];
                $file_tmp = $_FILES['pres']['tmp_name'];
      
                move_uploaded_file($file_tmp,"./docs/".$file_name);
      
              }
              else
              {
                echo "<script>alert('Prescription file not uploaded!')</script>";
              }
              $sql="INSERT INTO `appointment_list` (`schedule`, `patient_id`, `prescription_path`, `remark`,`date_created`)
               VALUES ('$date','$p_id','$file_name','$remark','$d1')";
               $result=mysqli_query($conn,$sql);
               $id = mysqli_insert_id($conn); 
             
               if($result){
                foreach($testarray as $data){
                  $sql1="INSERT INTO `appointment_test_list` (`appointment_id`, `test_id`,`date_created`) VALUES ('$id','$data','$d1')";
                  $result1=mysqli_query($conn,$sql1);
                }
                if($result1){
                   $query3="INSERT INTO `update_history` (`appointment_id`,`status`) VALUES ('$id','0')";
                  $res3=mysqli_query($conn,$query3);
                  if(!$res3)
                  {echo "<script>Error in Updating History</script>";}
                echo "<script>alert('Appointment Booked!')</script>";}
            }
            else{
              echo"<script>alert('Error Occured')</script>";
            }}
          ?>

<!--end Schedule appointment-->


    <!--Reschedule Appointment Detail-->
    <div class="modal fade" id="update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Reschedule Appointment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form  action=""  method="post" class="needs-validation"  enctype="multipart/form-data" novalidate>
            <div class="form-group">
                <input type="hidden" id="id" name="a_id">
              <label for="dates" required>Select Date :</label>
              <input type="date" name="date" id="date1" class="dates form-control" placeholder="dd-mm-yyyy" value="" min="" max="2025-12-31" required>
            </div>
            <div class="form-group">
              <label for="patientoption">Patient-ID</label>
              <input type="text" id="pname" class="form-control" disabled>
            </div>
              <div class="form-group">
                <label for="multiple">Select Tests</label>
                <select name="tests[]" multiple placeholder="Choose Tests" data-allow-clear="1" id="t_id" required>
                    <?php
                       $query1="SELECT * FROM `test_list`";
                       $result1=mysqli_query($conn,$query1);
                       if(mysqli_num_rows($result1)>0){
                        while($row = $result1->fetch_assoc()) {
                      ?>
                    <option class="testlist" value="<?php echo $row["test_id"]?>"><?php echo $row["name"]?></option>
                   <?php 
                      }}
                      else{
                        echo "<option disabled>No Data Found</option>";
                      }
                    ?>
                  </select>
              </div>
              <div class="form-group">
                  <label for="exampleFormControlInput1">Prescription <i>(if any)</i></label>
                  <input type="file" name="pres" accept="application/msword, .doc, .docx, .txt, .pdf, application/pdf" id="prescription" class="form-control" >
              </div>
            <div class="form-group">
                <label for="remark">Remark</label>
                <textarea class="form-control" name="remark" rows="3"></textarea>
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="updatebooking" class="btn btn-primary"><i class="fa-solid fa-plus"></i>Update</button>
              </div>   
        </form>
      </div>
    </div>
  </div>
</div>
          <?php 
            if(isset($_POST['updatebooking'])){
              $id=$_POST['a_id'];
              $date=$_POST['date'];
              $testarray=$_POST['tests'];
              $remark=$_POST['remark'];
              $d1 = date('Y-m-d H:i:s');
              if (isset($_FILES['pres']['name']))
                {
                  $file_name = $_FILES['pres']['name'];
                  $file_tmp = $_FILES['pres']['tmp_name'];
        
                  move_uploaded_file($file_tmp,"./docs/".$file_name);
        
                }
                else
                {
                  echo "<script>alert('Prescription file not uploaded!')</script>";
                }
              $sql="UPDATE `appointment_list` SET `schedule`='$date',`prescription_path`='$file_name',`remark`='$remark',`date_updated`='$d1' where appointment_id='$id'";
               $result=mysqli_query($conn,$sql); 
             
               if($result){
                $deleteQu = "DELETE FROM `appointment_test_list` WHERE `appointment_id` = '$id'";
                $resul = mysqli_query($conn,$deleteQu);
                foreach($testarray as $data){
                  $sql1="INSERT INTO `appointment_test_list` (`appointment_id`, `test_id`,`date_created`) VALUES ('$id','$data','$d1')";
                  $result1=mysqli_query($conn,$sql1);
                }
                if($result1){
                echo "<script>alert('Appointment Rescheduled!')</script>";}
            }
            else{
              echo"<script>alert('Error Occured')</script>";
            }}
          ?>


<!--Delete data form-->
<!-- Modal -->
<div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="staticBackdropLabel">Delete Record</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>Are you sure to delete the record ?</h4>
      </div>
      <form action="" method="POST">
          <input type="hidden" id="pid" name="id">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger" name="delete">Delete</button>
          </div>
      </form>
    </div>
  </div>
</div>
      <?php
      if(isset($_POST['delete'])){
        $id2 = $_POST['id'];
      
        $deleteQuery = "DELETE FROM `appointment_list` WHERE `appointment_id` = '$id2'";
        $result = mysqli_query($conn,$deleteQuery);
        $deleteQuery = "DELETE FROM `appointment_test_list` WHERE `appointment_id` = '$id2'";
        $result = mysqli_query($conn,$deleteQuery);
        if ($result) {
          echo "<script>alert('data deleted!')</script>";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connectQuery);
            }
      }
      ?>

<script>


  $(document).ready(function(){
// <!--update data-->
    $('.update').click(function(e){
      e.preventDefault();
      $('#update').modal('show');

      $pid = $(this).closest('tr');
      var data=$pid.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);
      $('#id').val(data[0]);
      $('#date1').val(data[1]);
      $('#pname').val(data[2]);    
    });
  });

  // <!--Delete data-->
  $('.delete').click(function(e){
      e.preventDefault();
      $pid = $(this).closest('tr');
      var data=$pid.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);
      $('#delete').modal('show');
      $('#pid').val(data[0]);
      });

          // date format of appointment form
        var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1; //January is 0!
      var yyyy = today.getFullYear();
      if (dd < 10) {
        dd = '0' + dd;
      }
      if (mm < 10) {
        mm = '0' + mm;
      } 
      today = yyyy + '-' + mm + '-' + dd;
      document.getElementById("date").setAttribute("min", today);

  //  Example starter JavaScript for disabling form submissions if there are invalid fields
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
<script>
  $(function () {
  $('select').each(function () {
    $(this).select2({
      theme: 'bootstrap4',
      width: 'style',
      placeholder: $(this).attr('placeholder'),
      allowClear: Boolean($(this).data('allow-clear')),
    });
  });
});

// Filter table status
$(document).ready(function(){
  $("#status1").on("change", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>