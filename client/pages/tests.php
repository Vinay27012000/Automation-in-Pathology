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
  </div>
