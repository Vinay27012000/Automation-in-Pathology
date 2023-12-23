<?php 

                $id1=$_GET['id'];
                  $insertQuery = "SELECT * from `test_list` where test_id='$id1'";
                  $result = $conn->query($insertQuery);
                  $rowcount=mysqli_num_rows($result);
                  $row = $result->fetch_assoc();
                  ?>
<div class="container-fluid mt-4 p-3" style="max-width:1000px;">
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
        <div class="col-2">
        </div>
         <!-- Button trigger modal -->
      </div>
    </div>
</div>
                

