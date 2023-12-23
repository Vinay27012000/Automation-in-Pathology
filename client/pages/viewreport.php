<head>
    <title>View Report</title>
    <link rel="stylesheet" src="css/index1.css" type="css/text">
    <style>
     
    </style>
</head>
<div class="container mt-4 pb-4">
    <div class="header1">
        <h3>View Report</h3><br>
    </div>
    <?php $total=0;
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
                  <td  style="width:25%;"><?php echo $r['result']?></td>
                  <td style="width:25%;"><?php echo $r['unit']?></td>
                  <td style="width:25%;"><?php echo $r['ref.range']?></td>
                  
                </tr>
                <?php }?>
         </tbody>
     </table>
     <div>
     <a href="http://localhost:8080/AIP/admin/pdf.php?id=<?php echo $id;?>" target="_blank" class="btn btn-primary" id="PrintButton" >Print</a>
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
            <tr><th>Bill Amount</th><td><?php echo $row['bill_amount']?></td></tr>
             </table>
          <div>
          <a href="http://localhost:8080/AIP/admin/invoice.php?id=<?php echo $id;?>" target="_blank" class="btn btn-primary" id="PrintButton" >Print</a>
            </div>
         </div>
    </div>
   
</div>    
