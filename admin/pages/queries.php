<head><title>Queries</title></head>
<div class="container-fluid mt-1 pb-2">
    <div class="row text-center">
        <div class="col-12 m-3">
            <h3>External Queries</h3>
        </div>
    </div>
    <table class="table table-striped table-fixed">
        <tr>
        <th>#</th><th>Name</th><th>Email</th><th>Subject</th><th>Message</th>
        </tr>
         <tr><?php 
        include 'connection.php';
        $query="SELECT * from contactform";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0)
            { while($row=mysqli_fetch_array($result))
                {
                   ?>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['subject'];?></td>
                    <td><?php echo $row['message'];?></td>
                </tr><?php
                }
            }
            else{ 
                echo "<tr><td colspan='5'>No Data Found</td></tr>";
            }    
        ?>
    </table>
</div>