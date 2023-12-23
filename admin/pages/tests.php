<head><title>Test Details</title></head>
<div class="container-fluid-0 mt-4 pb-5">
   <div class="row align-items-center justify-content-between">
    <div class="col-auto mr-auto col-lg-5">
    <div class="card border-0 ">
      <div class="card-body ">
        <div class="row">
          <div class="col-9">
              <div><h4 class="card-title">Total Active Tests</h4>
              </div>
              <div><p class="card-text">
              <?php 
                  $insertQuery = "SELECT * from `test_list`";
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
  <!-- Add patient Form-->
         <!-- Modal -->
   <!-- Button trigger modal -->
        <div class="col-auto">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addtest"><i class="fa-solid fa-plus"></i> Add New Test</button>
        </div>
       
   </div>
  
    <div class="container-fluid-0">   
    <table class="table display" id="myTable">
        <thead class="table-info">
            <tr> 
                <th scope="col">Test_ID</th>
                <th scope="col">Test_Name</th>
                <th scope="col">Test_Description</th>
                <th scope="col">Price</th>
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
              <td class="testid"><?php echo $row["test_id"]?></td>
              <td><?php echo $row["name"]?></td>
              <td style='max-width:350px;overflow: hidden;'><?php echo $row["description"]?></td>
              <td><?php echo $row["price"]?></td>
              <td>
                <a class="btn" href="?page=viewtest&id=<?php echo $row["test_id"]?>"><i class="fa-regular fa-eye" style="color: blue;"></i></a>
                <a href="" class="btn update" ><i class="fa-solid fa-pen-to-square" style="color: #fad000;"></i></a>
                <a href="" class="btn delete" ><i class="fa fa-trash-alt" style="color: red;"></i></a>
              </td>
           </tr>
           <?php
           }
          } else {
           echo "<tr><td colspan='5' class='text-center'>no record found!</td></tr>";
            }
          ?>
        </tbody>
    </table>
    </div>
  </div>
<script>
  $(document).ready(function(){

    $('.update').click(function(e){
      e.preventDefault();
      $('#updatetest').modal('show');
     
      $tid = $(this).closest('tr');
      var data=$tid.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);
      $('#tid').val(data[0]);
      $('#tname').val(data[1]);
      $('#tdesc').val(data[2]);
      $('#tprice').val(data[3]);
    });
  });
// <!--Delete data-->
  $('.delete').click(function(e){
      e.preventDefault();
      $('#delete').modal('show');
      var tid = $(this).closest('tr').find('.testid').text();
      $('#t1id').val(tid);
 
      });
  
</script>

<!-- Modal update test details-->
<div class="modal fade" id="updatetest" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updatetestLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="test_datails">Test Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<div class="modal-body">
<form id="myform" action=""  method="post" class="needs-validation" novalidate>
  <div class="form-group">
    <label for="exampleFormControlInput1">Test_ID</label>
    <input type="text" class="form-control" id="tid" name="id" readonly>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Test Name</label>
    <input type="text" class="form-control" id="tname" name="name"   required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Description</label>
    <textarea class="form-control" name="desc" id="tdesc" rows="3"  required></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Reference Range</label>
    <input type="text" class="form-control"  id="tref" name="ref"  required>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Test Unit</label>
    <select class="form-control" name="unit" id="tunit" required>
      <option> mg/dL</option>
      <option>µg/dL</option>
      <option>g/dL</option>
      <option>units/L</option>
      <option>%</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Test Price</label>
    <input type="number" class="form-control" name="price" id="tprice"  required>
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
$id = $_POST['id'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$ref = $_POST['ref'];
$unit = $_POST['unit'];
$price = $_POST['price'];
$date = date('Y-m-d H:i:s');

    $insertQuery = "UPDATE `test_list` SET `name`='$name',`description`='$desc',`ref.range`='$ref',`unit`='$unit',`price`='$price',`date_updated`='$date' where test_id='$id'";
    $result = mysqli_query($conn,$insertQuery);
    if ($result) {
     echo "<script>alert('data updated successfully')</script>";
      } else {
      echo "<script>alert('Error ocurred !');</script>";
    }
  }
?>
<!--end edit Test Detail-->

<!--Add Test Detail-->
<div class="modal fade" id="addtest" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Test Description</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="myform" action="" method="post" class="needs-validation" novalidate>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Test Name</label>
    <input type="text" class="form-control" name="tname" id="exampleFormControlInput1" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Description</label>
    <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3" required></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Reference Range</label>
    <input type="text" name="range" class="form-control" id="exampleFormControlInput1" required>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Test Unit</label>
    <select class="form-control" name="unit" id="exampleFormControlSelect1" required>
      <option> mg/dL</option>
      <option>µg/dL</option>
      <option>g/dL</option>
      <option>units/L</option>
      <option>%</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Test Price</label>
    <input type="number" name="price" class="form-control" id="exampleFormControlInput1" required>
  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit"><i class="fa-solid fa-plus"></i>Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php

if(isset($_POST['submit']))
{

$name = $_POST['tname'];
$desc = $_POST['desc'];
$range = $_POST['range'];
$unit = $_POST['unit'];
$cost = $_POST['price'];
$date = date('Y-m-d H:i:s');
    $insertQuery = "INSERT INTO `test_list`(`name`, `description`, `ref.range`, `unit`, `price`, `date_created`) VALUES ('$name','$desc','$range','$unit','$cost','$date')";
    $result = mysqli_query($conn,$insertQuery);
    if ($result) {
     ?><script>alert("data inserted")</script>
     <?php   } else {
      // echo "Error: " . $sql . "<br>" . mysqli_error($connectQuery);
      ?><script>alert("Error Occured")</script><?php
    }
  }

   

?>
 <!--end Add data form-->

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
      <input type="hidden" id="t1id" name="id1">
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
  $id= $_POST['id1'];
  $deleteQuery = "DELETE FROM `test_list` WHERE `test_id` = '$id'";
  $result = mysqli_query($conn,$deleteQuery);
  if ($result) {
    echo "<script>alert('data deleted')</script>";
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