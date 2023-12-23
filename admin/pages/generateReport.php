<?php 
$Aid="";
$pid="";
$status="";
$name="";
$total=0;
if(isset($_POST['search'])){
  $id=$_POST['id'];
$insertQuery = "SELECT * from`patient` RIGHT JOIN `appointment_list` on patient.patient_id=appointment_list.patient_id where appointment_list.appointment_id='$id'";
$result = $conn->query($insertQuery);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $name=$row['name'];
  $Aid=$row['appointment_id'];
  $_SESSION['aid']=$Aid;
  $pid=$row['patient_id'];
  $status=$row['status'];
}

}
?>
<head>
    <title>Generate Report</title>
    <link rel="stylesheet" href="css/index1.css">
</head>
<div class="container pt-4 pb-1">
    <div class="header1">
        <h3>Generate New Report</h3><br>
    </div>
    <div class="container-fluid-0 mb-5">
        <form action="" method="post"  class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-4">
                <input type="text" class="form-control" name="id" placeholder="Enter Appointment_ID..." required/>
                </div>
                <div class="col-md-2">
                <input type="submit" name="search" class="btn btn-success" value="Search" />
                </div>
        </form>

    </div>
   <?php if($result->num_rows < 1) echo "<span class='text-white mt-2 form-control bg-danger'>No Record Found </span>"; ?>
    <div class="continer-fliud-0 mt-4">
      <table class="table table-striped  table1">
        <thead>
            <tr><th>Appointment_ID</th><td><?php echo $Aid?></td></tr>
            <tr><th>Patient_ID</th><td><?php echo $pid?></td></tr>
            <tr><th>Patient Name</th><td><?php echo $name?></td></tr>
            <tr><th>Appointment_Status</th>
                    <td><?php switch($status){
                            case '0':echo "<span class='badge bg-secondary'> Pending </span>";break;
                            case '1':echo "<span class='badge bg-warning'> Approved </span>";break;
                            case '2':echo "<span class='badge bg-primary'> Sample Collected </span>";break;
                            case '3':echo "<span class='badge bg-success'> Report Generated </span>";break;
                            case '4':echo "<span class='badge bg-danger'> Cancelled </span>";break;
                            }?>
                    </td></tr>
        </thead>
      </table>
      <br>
      <?php if($status == 3){ echo "<span class='text-white mt-2 form-control bg-success'>Report Already Generated ! </span>";}
        elseif ($status == 2){?>
          <h4>Tests Values</h4>
        <form action="" method="post"  class="needs-validation" novalidate>
          <table class="table table-striped table-bordered table-fixed">
            <thead class="table-info">
                <tr>
                    
                    <th scope="col">Test_ID</th>
                    <th scope="col">Test_Name</th>
                    <th scope="col">Results</th>
                    <th scope="col">units</th>
                    <th scope="col">Reference Range</th>
                   
                </tr>
            </thead>
            <tbody>
              <?php 
                $qry="SELECT * FROM  appointment_test_list A left join test_list T ON A.test_id=T.test_id where appointment_id='$Aid'";
                $res=mysqli_query($conn,$qry);
                while($r=mysqli_fetch_assoc($res)){ 
                  $total+=$r['price'];
                ?>
                <tr>
                <td><input type="hidden" name="id[]" value="<?php echo $r['test_id']?>"><?php echo $r['test_id']?></td>
                <td><?php echo $r['name']?></td>
                  <td><input type="text" name="data[]" class="form-control mp-0" style="max-width:200px;" required></td>
                  <td><?php echo $r['unit']?></td>
                  <td><?php echo $r['ref.range']?></td>
                  
                </tr>
                <?php }?>
            </tbody>
        </table>
        <div class="row">
          <div class="col-md-2"><button class="btn btn-primary" type="submit" id="save" name="save"><i class="fa-solid fa-upload"></i> Upload</button></div>
        </div>
        </form>
            <div class="container-fluid-0">
                <table class="table  table-bordered mt-5">
                <tr><th>Bill Amount</th><td><?php $_SESSION['total']=$total; echo $total?></td></tr>
                </table>
            </div>
        </div>
    </div> 
    <?php }
    ?>  

      <?php 
      if(isset($_POST['save'])){
        $st=3;
        $date=date('y-m-d H:m:s');
        $aid=$_SESSION['aid'];
          $total=$_SESSION['total'];
    
          $query1="UPDATE appointment_list SET `status`='$st' where appointment_id='$aid'";
          $res1=mysqli_query($conn,$query1);
          
          $query2="INSERT INTO report (`appointment_id`,`status`,`bill_amount`) VALUES ('$aid','$st','$total')";
          $res2=mysqli_query($conn,$query2);
          if($res2){
              $query3="INSERT INTO `update_history` (`appointment_id`,`status`) VALUES ('$aid','3')";
              $res3=mysqli_query($conn,$query3);
            if(!$res3)
            echo "<script>Error in Updating History</script>";
          }
         
        if($res2){
        for($i=0;$i<count($_POST['id']);$i++){
          $data=$_POST['data'][$i];
        $id=$_POST['id'][$i];
        $q="INSERT INTO `report_result` (`appointment_id`,`test_id`,`result`) VALUES ('$aid','$id','$data')";
        $res=mysqli_query($conn,$q);
        }
          if($res){
          echo "<script>alert('Report Generated Successfully')</script>";
        }
        else{
          echo "<script>alert('Error Occured Duplicate Value')</script>";
        }
      }

      }
      ?>

<script>


//Calling a function during form submission.
form.addEventListener('submit', submitForm);
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