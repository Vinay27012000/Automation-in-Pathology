<head>
    <title>View Report</title>
    <link rel="stylesheet" src="css/index1.css" type="css/text">
    <style>
     
      </style>
</head>
<div class="container pb-4">
    <div class="header1">
        <h3>View Report</h3><br>
    </div>
    <?php $total=0;
          $aid=0;
      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM report WHERE report_id = '$id'";
        $result = mysqli_query($conn, $query);
        
      } 
      ?>
    <div class="continer-fliud-0 mt-4">
      <div id="printableTable">
      <table class="table"  style="width:100%;">
        <thead><?php if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['paid']=$row['payment'];
            $fetchq="SELECT * from `patient` RIGHT JOIN `appointment_list` on patient.patient_id=appointment_list.patient_id where appointment_list.appointment_id='$row[appointment_id]'";
            $result1=mysqli_query($conn,$fetchq);
            $row1=$result1->fetch_assoc();?>
            <tr><th>Report_ID</th><td><?php echo $row['report_id']?></td><th>Patient_ID</th><td><?php echo $row1['patient_id']?></td></tr>
            <tr><th>Appointment_ID</th><td><?php echo $row['appointment_id']?></td><th>Patient Name</th><td><?php echo $row1['name']?></td></tr>
            <tr><th>Gender</th><td><?php echo $row1['gender']?></td><th>DOB</th><td><?php echo $row1['dob']?></td></tr>
            <tr><th>Address</th><td colspan="3"><?php echo $row1['address']?></td></tr>
          </thead><?php }?>
      </table>
      <br>
      <h4>Tests Values</h4>
    <form action="#" method="post">
      <table class="table table-bordered table-hover table-fixed text-center" >
        <thead class="table-info">
            <tr >
                
                <!-- <th scope="col">Test_ID</th> -->
                <th scope="col">Test_Name</th>
                <th scope="col">Results</th>
                <th scope="col">units</th>
                <th scope="col">Reference Range</th>
            </tr>
        </thead>
        <tbody>
        <?php 
                
                $qry1="SELECT * FROM  report_result R right join test_list T on T.test_id=R.test_id where R.appointment_id='$row[appointment_id]'";
                $res1=mysqli_query($conn,$qry1);
    
                while($r=mysqli_fetch_assoc($res1)){ 
                ?>
                <tr >
                <input type="hidden" name="tid[]" value="<?php echo $r['test_id']?>">
                <input type="hidden" name="aid" value="<?php echo $r['appointment_id']?>">
                <td  style="width:25%;"><?php echo $r['name']?></td>
                  <td  style="width:25%;"><input type="text" name="data[]" class="form-control text-center" style="border:0px solid;background-color:transparent;" value="<?php echo $r['result']?>" required></td>
                  <td style="width:25%;"><?php echo $r['unit']?></td>
                  <td style="width:25%;"><?php echo $r['ref.range']?></td>
                  
                </tr>
                <?php }?>
         </tbody>
     </table>
    </div>
     <div class="row">
        <div class="col-md-1"><a href="pdf.php?id=<?php echo $id;?>" target="_blank" class="btn btn-primary" id="PrintButton" >Print</a></div>
        <div class="col-md-1"><input type="submit" name="updateresult" class="btn btn-primary" value="Update"></div>
    </div>
    </form>
        <div class="container-fluid-0">
            <table class="table  table-bordered mt-5">
            <thead class="table-info">
            <tr>
                <th colspan="2" class="text-center">Test Detailed Price</th></tr>
               <tr> <th scope="col">Test_Name</th><th scope="col">Price</th></tr>
        </thead>
        <tbody>
            <tr><?php
                    $testquery="SELECT * from appointment_test_list A right join test_list T on T.test_id=A.test_id where A.appointment_id='$row[appointment_id]'"; 
                    $testresult=mysqli_query($conn,$testquery);
                   
                  while( $ro=mysqli_fetch_assoc($testresult)){?>
              <td><?php echo $ro['name']?></td>
              <td><?php echo $ro['price']?></td>
            </tr><?php } ?>
            <tr><th>Bill Amount  <i><span id="paid"></span></i></th><td><?php echo $row['bill_amount']?></td></tr>
             </table><form action="" method="post">
          <div class="row">
            <div class="col-md-1">
            <a href="invoice.php?id=<?php echo $id;?>" target="_blank" class="btn btn-primary" id="PrintButton" >Print</a>
            </div>
            <div class="col-md-1">
              <?php  if($_SESSION['paid']=='0') {?>
                <a href class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pay">Payment</a>
              <?php }
              else {echo"<script>document.getElementById('paid').innerHTML='  Paid';</script>";}?>
            </div>
          </div></form>
         </div>
    </div>
    
</div>    

    <!--Payment Modal -->
    <div class="modal fade" id="pay" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4><center>Is payment done ?</center></h4>
      </div>
        <form action="" method="post" >
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-success" type="submit" name="paid">Paid</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!--update result-->
<?php 
if(isset($_POST['updateresult'])){
  $aid=$_POST['aid'];

  for($i=0;$i<count($_POST['tid']);$i++){
    $test_id=$_POST['tid'][$i];
    $data=$_POST['data'][$i];
    $query="UPDATE report_result SET result='$data' where appointment_id='$aid' and test_id='$test_id'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
      echo "<script>alert('Data Updated Successfully!')</script>";
    }else{
      echo mysqli_error($conn);
      }


  }

}
if(isset($_POST['paid'])){

  $Query="UPDATE report SET payment = '1' WHERE report_id='$id'";
  $result=mysqli_query($conn,$Query);
  if($result)
  { 
    ?>
    <script>
      document.getElementById('paid').innerHTML="  Paid";
      alert("Payment Status Updated");
    </script>
    <?php
  }
  else{echo mysqli_error($conn);}
}
  ?>
