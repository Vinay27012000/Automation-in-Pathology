<?php 
$query="SELECT * FROM report where appointment_id IN (SELECT appointment_list.appointment_id from `patient` INNER JOIN `appointment_list` on patient.patient_id=appointment_list.patient_id where patient.username='$_SESSION[username]')";
$result=mysqli_query($conn,$query);
if($result)
{$row=mysqli_num_rows($result);}
else{ $row=0;}

?>
<head>
<title>Tests Reports</title>
<style>
  .t1{
    text-align: center;
  }
  .b1{
    min-width:90px;
    height: 25px;
    font-size:15px;
  }
</style>
</head>
<div class="container-fluid-0 mt-4 pb-2">
   <div class="row align-items-center justify-content-between">
    <div class="col-auto mr-auto col-lg-5">
    <div class="card border-0 ">
      <div class="card-body ">
        <div class="row">
          <div class="col-9">
              <div><h4 class="card-title">Total Reports Generated</h4>
              </div>
              <div><p class="card-text"><?php echo $row?></p></div>
          </div>
        </div>
      </div>
    </div>
  </div>
   </div>
   <table class="table display" id="myTable">
        <thead class="table-info">
            <tr>
                <th scope="col">Report_ID</th>
                <th scope="col">Appointment_ID</th>
                <th scope="col" >patient Name</th>
                <th scope="col" class="t1">Bill Amount</th>
                <th scope="col" class="t1">Payment</th>
                <th scope="col" class="t1">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr> <?php  
                    if(mysqli_num_rows($result)>0){
                        while($row=$result->fetch_assoc()){
                          $fetchq="SELECT * from `patient` INNER JOIN `appointment_list` on patient.patient_id=appointment_list.patient_id where appointment_list.appointment_id='$row[appointment_id]'";
                          $result1=mysqli_query($conn,$fetchq);
                          $row1=$result1->fetch_assoc();
                    ?>
                <th scope="row"><?php echo $row['report_id']?></th>
                <td><?php echo $row['appointment_id']?></td>
                <td><?php echo $row1['name']?></td>
                 <td class="t1"><?php echo $row['bill_amount']?></td>
                 <td class="t1"><?php switch($row['payment']){
                            case '1':echo "<span class='badge b1 bg-success'> Paid </span>";break;
                            case '0':echo "<span class='badge b1 bg-warning'> Unpaid </span>";break;
                            }?> </td>
                 <td class="t1"><a class="btn" href="?page=viewreport&id=<?php echo $row['report_id']?>"><i class="fa-regular fa-eye" style="color: blue;"></i></a>
                  </tr>
            <?php } }
            else{ echo "<td colspan='6'class='text-center'> No Data Found</td>";}?>
        </tbody>
    </table>
</div>
