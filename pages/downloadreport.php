<style>
    .container1{
        position:relative;
        width:100%;
        height:554px;
       
        background-image:url('https://dc-mkt-prod.cloud.bosch.tech/xrm/media/global/industries_1/healthcare/stage-healthcare-industry.jpg');
    }
    .con{
        position:absolute;
        top:25%;        
    }
    .note{
        font-family:Times New Romen;
        font-size:25px;
        color:#009933;
    }
    .dow{
        margin:5px;border:2px solid #C0C0C0;border-radius:10px;width:300px;
    }
    @media screen and (min-width:700px) {
       .con{
         position:absolute;
        top:35%;
        left:100px;
       } 
    }
</style>

<div class="container1 container-fluid-0">
    <div class="container con text-center">
        <form action="" method="POST">
             
                 <div class="col text-center">
                       <p class="note">Please enter Report_id / Mobile Number for report</p>
                       <form action="" method="post">
                           <div><input type="number" class="dow" name="data" min='1' max="9999999999"></div>
                            <div><button type="submit" class="btn btn-primary" name="download">Download</button></div>
                       </form>
                        
                    </div>
                </div>
            </form> 
        </div>  
    </div>

   <?php 
   if(isset($_POST['download'])){
    $data=$_POST['data'];
    $query="SELECT * from report r inner join appointment_list a on a.appointment_id=r.appointment_id where r.report_id='$data' or a.patient_id =(SELECT patient_id from patient where contact='$data')";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost:8080/AIP/admin/pdf.php?id=<?php echo $row['report_id'];?>';
        </script>
        <?php
   }
   else{
    echo "<script>alert('No Record Found');</script>";
   }
}
   ?> 
