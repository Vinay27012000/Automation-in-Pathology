<?php 
$query="SELECT * FROM report";
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
<div class="container-fluid-0 pb-2">
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
        <div class="col-auto">
            <a class="btn btn-success"  href="?page=generateReport"><i class="fa-solid fa-plus"></i>Generate New Report</a>      
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
                          $fetchq="SELECT * from `patient` RIGHT JOIN `appointment_list` on patient.patient_id=appointment_list.patient_id where appointment_list.appointment_id='$row[appointment_id]'";
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
                     <button type="submit" class="btn delete" data-bs-toggle="modal" data-bs-target="#delete"><i class="fa fa-trash-alt" style="color: red;"></i></button></td>
            </tr>
            <?php } }
            else{ echo "<tr class='text-center'><td colspan='6'> No Data Found</td></tr>";}?>
        </tbody>
    </table>
</div>

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
        <form action="" method="post">
          <div class="modal-footer">
            <input type="hidden" id="aid" name="aid">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="delete" class="btn btn-danger">Confirm</button>
          </div>
        </form>
    </div>
  </div>
</div>
<?php
      if(isset($_POST['delete'])){
        
        $aid=$_POST['aid'];
        $query="UPDATE appointment_list SET `status`=2 where appointment_id='$aid'";
        $result1 = mysqli_query($conn,$query);
        $deleteQuery = "DELETE FROM report WHERE `appointment_id` = '$aid'";
        $result = mysqli_query($conn,$deleteQuery);
       
        if ($result) {
          echo "<script>alert('Report deleted!')</script>";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connectQuery);
            }
      }
      ?>
<script>
   $('.delete').click(function(e){
      e.preventDefault();
      $pid = $(this).closest('tr');
      var data=$pid.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);
      $('#delete').modal('show');
      $('#aid').val(data[0]);
      });
</script>