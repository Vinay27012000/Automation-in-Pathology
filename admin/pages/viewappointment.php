   <style>
    .badge{
      min-width:90px;
      height: 25px;
      font-size:15px;
    }
  </style>
   
   <?php 
    $id=$_GET['id'];
    $total=0;
   $insertQuery = "SELECT * from `patient` RIGHT JOIN `appointment_list` on patient.patient_id=appointment_list.patient_id where appointment_list.appointment_id='$id'";
   $result = $conn->query($insertQuery);
   $date=date('y-m-d H:m:s');
    ?>
<div class="container-fluid pb-4 " >
    <div class="container-fluid p-4 " >
    <h3 class="history mb-4">Appointment Details</h3>
        <table class="table table-bordered">
            <?php 
              if(mysqli_num_rows($result)>0){
                $row=$result->fetch_assoc();?>
            <tr><th>Patient-ID:</th><td><?php echo $row['patient_id']?></td> <th>Appointment-ID:</th><td><?php echo $row['appointment_id']?></td>  </tr>
            <tr><th>patient Name:</th><td><?php echo $row['name']?></td> <th>Gender:</th><td><?php echo $row['gender']?></td></tr>
            <tr><th>Contact No:</th><td><?php echo $row['contact']?></td><th>Date of Birth:</th><td><?php echo $row['dob']?></td></tr>
            <tr><th>Address:</th><td colspan="3"><?php echo $row['address']?></td> </tr>
            <tr><th>Status:</th><td><span id="status"><?php echo $row['status']?></span></td> <th>Prescription</th><td><a href="<?php echo "docs/".$row['prescription_path']?>" download><?php echo $row['prescription_path']?></a></td></tr>
            <?php $_SESSION['status']=$row['status'];}
            else{
              echo "<tr><td><h3>No Data Found</h3></td></tr>";
            }
            ?>
        </table>
    </div>
            <div class="container text-center">
                <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#action">Take Action</button>
            </div>
   
    <div class="container-fluid p-4" >
    <h3 class="history">Tests Details</h3>
        <table class="table table-bordered text-center justify-content-start">
            <tr class="table-primary">
            <th>Test-ID</th>
            <th>Test Name</th>
            <th>Test Price</th> </tr>
           
            <?php
              $query="SELECT * FROM `test_list` RIGHT JOIN `appointment_test_list` on test_list.test_id=appointment_test_list.test_id  where appointment_test_list.appointment_id='$_GET[id]'";
              $result = $conn->query($query);
              if(mysqli_num_rows($result)>0){
                while($row=$result->fetch_assoc()){
                  ?><tr><td><?php echo $row['test_id']?></td><td><?php echo $row['name']?></td><td><?php echo $row['price']?></td></tr>
                  <?php 
                  $total=$total+$row['price'];
                }
              }
              else{
                echo " <tr><td colspan='4' class='text-center'>no record found!</td></tr>";
              }
             ?>
             <tr><th colspan="2">Total :</th><td><?php echo $total?></td></tr>
        </table>
        
    </div>
    <div class="container-fluid p-4" >
        <h3 class="history">Update History</h3>
        <table class="table table-bordered  justify-content-start">
            <tr class="table-primary">
            <th>Date</th>
            <th>Status</th>
            <th>Remark</th></tr>
            <?php
              $query5="SELECT * FROM `update_history` where appointment_id='$_GET[id]'";
              $result5 = $conn->query($query5);
              if(mysqli_num_rows($result5)>0){
                while($row5=$result5->fetch_assoc()){
                  ?><tr>
                    <td><?php echo $row5['date_created']?></td>
                    <td class="text-center"><?php switch($row5['status']){
                            case '0':echo "<span class='badge bg-secondary'> Pending </span>";break;
                            case '1':echo "<span class='badge bg-warning'> Approved </span>";break;
                            case '2':echo "<span class='badge bg-primary'> sample Collected </span>";break;
                            case '3':echo "<span class='badge bg-success'> Report Generated </span>";break;
                            case '4':echo "<span class='badge bg-danger'> Cancelled </span>";break;
                          }
                          ?>
                    </td>
                    <td><?php echo $row5['remarks']?></td></tr>
                  <?php 
                 }
              }
              else{
                echo " <tr><td colspan='3' class='text-center'>no record found!</td></tr>";
              }
             ?>
        </table>
    </div>
    <!-- <div class="container">
    <?php if($_SESSION['status'] == 3) {?>
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-4">
                <button class="btn btn-success">Download Invoice</button>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4">
                <button class="btn btn-success">Download Report</button>
            </div>
        </div><?php }?>
    </div> -->

    <!--Modal for take action-->
    <div class="modal fade" id="action"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Appointment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
      <form action="" method="post">
          <div class="form-group">
              <label for="dates" required>Status:</label>
               <select class="category form-control" style="border-radius:20px;" name="status" placeholder="Select Catogery">
                      <option value="1">Approved</option>
                      <option value="4">Cancelled</option>
                      <option value="0">Pending</option>
                      <option value="2">Sample Collected</option>
                      <option value="3" disabled>Report Generated</option>
                </select>
          </div>
      
          <div class="form-group">
            <label for="exampleFormControlInput1">Remark</label>
            <textarea class="form-control" name="remark" rows="3"></textarea>
          </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="updatestatus" data-bs-dismiss="modal">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
    <?php 
    if(isset($_POST['updatestatus'])){
     $id=$_GET['id'];
     $remark=$_POST['remark'];
     $status=$_POST['status'];
     $date=date('y-m-d H:i:s');
      $q1="INSERT INTO update_history (`appointment_id`,`status`,`remarks`,`date_created`) VALUES ('$id','$status','$remark','$date')";
      $r1=mysqli_query($conn,$q1);
      if($r1){
        $q2="UPDATE appointment_list SET `status`='$status' WHERE appointment_id='$id'";
        $r2=mysqli_query($conn,$q2);
        if($r2){
          echo "<script>alert('Status Updated Successfully')</script>";
        }
        else{
          echo "<script>alert('Status Update Failed')</script>";
        }
    }
    else{
      echo "<script>alert('Status Update Failed')</script>";
    }
  }
    ?>

<script>
        window.onload = function exampleFunction() {
          var data=document.getElementById("status").innerHTML;
            
                switch(data){
                      case '0': document.getElementById("status").setAttribute("class","bg-secondary badge");
                      document.getElementById("status").innerHTML="Pending";break;
                      case '1': document.getElementById("status").setAttribute("class","bg-warning badge");
                      document.getElementById("status").innerHTML="Approved";break;
                      case '2': document.getElementById("status").setAttribute("class","bg-primary badge");
                      document.getElementById("status").innerHTML="Sample Collected";break;
                      case '3': document.getElementById("status").setAttribute("class","bg-success badge");
                      document.getElementById("status").innerHTML="Report Generated";break;
                      case '4': document.getElementById("status").setAttribute("class","bg-danger badge");
                      document.getElementById("status").innerHTML="Cancelled";break;             
            
                  }
        }
    </script>