<head>
<title>Patient</title>
</head>
<div class="container-fluid-0 mt-4 pb-4">
   <div class="row align-items-center justify-content-between">
    <div class="col-auto mr-auto col-lg-5">
    <div class="card border-0 ">
      <div class="card-body ">
        <div class="row">
          <div class="col-9">
              <div><h4 class="card-title">Total Registered Patients</h4>
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
        </div>
      </div>
    </div>
  </div>
        <div class="col-auto">
            <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#addpatient"><i class="fa-solid fa-plus"></i> Add Patient</button>
        </div>
   </div>
   <div class="conainer-fluid-0">
  
    <table class="table display" id="myTable">
        <thead class="table-info">
            <tr>
                <th scope="col">Patient_ID</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">DOB</th>
                <th scope="col">Contact</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php 
      
            if ($rowcount > 0) {
          // output data of each row
              while($row = $result->fetch_assoc()) {
                ?>
           <tr>
              <td class="ptid"><?php echo $row["patient_id"]?></td>
              <td><?php echo $row["name"]?></td>
              <td><?php echo $row["gender"]?></td>
              <td><?php echo $row["dob"]?></td>
              <td><?php echo $row["contact"]?></td>
              <td>
                <a class="btn" href="?page=viewpatient&id=<?php echo $row["patient_id"]?>"><i class="fa-regular fa-eye" style="color: blue;"></i></a>
                <a href="" class="btn update" ><i class="fa-solid fa-pen-to-square" style="color: #fad000;"></i></a>
                <a href="" class="btn delete" ><i class="fa fa-trash-alt" style="color: red;"></i></a>
              </td>
           </tr>
           <?php
           }
          } else {
           echo "<tr><td colspan='6' class='text-center'>no record found!</td></tr>";
            }
          ?> 
        </tbody>
    </table>
   </div>
</div>


<script>
  $(document).ready(function(){
// <!--update data-->
    $('.update').click(function(e){
      e.preventDefault();
      $('#editpatient').modal('show');

      $pid = $(this).closest('tr');
      var data=$pid.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);
      $('#id').val(data[0]);
      $('#name').val(data[1]);
      $('#gender').val(data[2]);
      $('#dob').val(data[3]);
      $('#contact').val(data[4]);
    });
  });

  // <!--Delete data-->
  $('.delete').click(function(e){
      e.preventDefault();
      $('#delete').modal('show');
      $pid = $(this).closest('tr');
      var data=$pid.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);
      $('#pid').val(data[0]);
      });

</script>

<!--Edit Pateint Details-->
<div class="modal fade" id="editpatient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
    <input type="text" class="form-control" id="id" name="pid" readonly>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Patient-Name</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Gender</label>
    <select class="form-control" id="gender" name="gender" required>
      <option>select</option>
      <option>Male</option>
      <option>Female</option>
      <option>Others</option>
     
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">DOB</label>
    <input type="date" class="form-control" id="dob" name="dob" required>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Mobile</label>
    <input type="number" class="form-control" id="contact" name="contact" required>
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
$id1=$_POST['pid'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$cont = $_POST['contact'];
$date = date('Y-m-d H:i:s');
$insertQuery = "UPDATE `patient` SET `name`='$name',`gender`='$gender',`contact`='$cont',`dob`='$dob',`date_updated`='$date' WHERE patient_id='$id1'";
    $result = $conn->query($insertQuery);
    
    if ($result === true) {
     ?><script>alert("data Updated successfully")</script>
     <?php   } else {
      echo "<script>alert('Error Occured!')</script>";

    }
    
  }
?>


<!--Add Pateint Details-->
<div class="modal fade" id="addpatient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add New Patient Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action=""  method="post" class="needs-validation" novalidate>
 
  <div class="form-group">
    <label for="exampleFormControlInput1">Patient-Name</label>
    <input type="text" class="form-control" name="name" required>
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
    <input type="date" class="form-control" name="dob" required>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Mobile</label>
    <input type="number" class="form-control" name="contact" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Address</label>
    <textarea class="form-control" name="adds" rows="3" required></textarea>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add" class="btn btn-primary"><i class="fa-solid fa-pen-to-plus" style="color: #FFF;"></i> Add</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<?php

if(isset($_POST['add']))
{
$user=$_SESSION['username'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$cont = $_POST['contact'];
$add = $_POST['adds'];
$date = date('Y-m-d H:i:s');
    $insertQuery = "INSERT INTO `patient` (`username`,`name`, `gender`, `contact`,`dob`, `address`,`date_created`) VALUES ('$user','$name','$gender','$cont','$dob','$add','$date')";
    $result = mysqli_query($conn,$insertQuery);
    if ($result) {
      echo "<script>alert('Patient Added Successfully');</script>";
       } else {
      echo "<script>alert('Error Occured!')</script>";

    }
    ?>
     <?php $conn -> close();
     
  }
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
 
  $deleteQuery = "DELETE FROM `patient` WHERE `patient_id` = '$id2'";
  $result = mysqli_query($conn,$deleteQuery);
  if ($result) {
    echo "<script>alert('data deleted!')</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connectQuery);
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