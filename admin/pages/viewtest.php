<?php 

                $id1=$_GET['id'];
                  $insertQuery = "SELECT * from `test_list` where test_id='$id1'";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);
                  $row = $result->fetch_assoc();
                  ?>
<div class="container-fluid p-3" style="max-width:1000px;">
    <div class="container">
       <h3 class="text-center">Test Details</h3>
    </div>
    <div class="container-fluid pb-4" style="float:left;">
        <table class="table table-responsive table-lg m-4 ">
            <tr><th>Test-ID:</th><td><?php echo $row['test_id']?></td></tr>
            <tr><th>Test-Name:</th><td><?php echo $row['name']?></td></tr>
            <tr><th>Description:</th><td><?php echo $row['description']?></td></tr>
            <tr><th>Ref. Range:</th><td><?php echo $row['ref.range']?></td></tr>
            <tr><th>SI unit:</th><td><?php echo $row['unit']?></td></tr>
            <tr><th>Price:</th><td><?php echo $row['price']?></td></tr>
        </table>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-2"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update"><i class='fa-solid fa-pen-to-square' style='color: #FFF;'></i> Update</button>
        </div>
         <!-- Button trigger modal -->
      </div>
    </div>
</div>
                
<!-- Modal update test details-->
<div class="modal fade" id="update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Test Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
      <form id="myform" action=""  method="post" class="needs-validation" novalidate>
  <div class="form-group">
    <label for="exampleFormControlInput1">Test_ID</label>
    <input type="text" class="form-control" name="id" value="<?php echo $row['test_id']?>" disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Test Name</label>
    <input type="text" class="form-control" name="name"  value="<?php echo $row['name']?>" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Description</label>
    <textarea class="form-control" name="desc" rows="3" value="" required><?php echo $row['description']?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Reference Range</label>
    <input type="text" class="form-control" name="ref"  value="<?php echo $row['ref.range']?>" required>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Test Unit</label>
    <select class="form-control" name="unit"  value="<?php echo $row['unit']?>" required>
      <option> mg/dL</option>
      <option>µg/dL</option>
      <option>g/dL</option>
      <option>units/L</option>
      <option>%</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Test Price</label>
    <input type="number" class="form-control" name="price"  value="<?php echo $row['price']?>" required>
  </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update"><i class="fa-solid fa-pen-to-square" style="color: #FFF;"></i> Update</button>
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
$desc = $_POST['desc'];
$ref = $_POST['ref'];
$unit = $_POST['unit'];
$price = $_POST['price'];
$date = date('Y-m-d H:i:s');

    $insertQuery = "UPDATE `test_list` SET `name`='$name',`description`='$desc',`ref.range`='$ref',`unit`='$unit',`price`='$price',`date_updated`='$date' WHERE test_id='$id1'";
    $result = mysqli_query($conn,$insertQuery);
    if (mysqli_query($conn,$insertQuery)) {
     echo "<script>alert('data updated successfully')</script>";
      } else {
      echo "<script>alert('Error ocurred !');</script>";
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