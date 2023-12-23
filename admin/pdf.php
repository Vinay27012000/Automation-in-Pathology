<?php require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
include 'connection.php';

if(isset($_GET['id'])){
  $id=$_GET['id'];
$query = "SELECT * FROM report WHERE report_id = '$id'";
$result = mysqli_query($conn, $query);
}
if(mysqli_num_rows($result) > 0){
  $row = mysqli_fetch_assoc($result);

  $fetchq="SELECT * from `patient` RIGHT JOIN `appointment_list` on patient.patient_id=appointment_list.patient_id where appointment_list.appointment_id='$row[appointment_id]'";
  $result1=mysqli_query($conn,$fetchq);
  $row1=$result1->fetch_assoc();}

$html='<head>
<title>Report</title>
<style>

h3, h1, h5{
text-align: center;
font-family: Verdana, Geneva, Tahoma, sans-serif;
margin:2px;
}
.cc{
border: 1px solid black;

}
th ,td{
  text-align:left;
  padding:5px;
  width:100%;
}
h6{
text-align: center;
font-family: Verdana, Geneva, Tahoma, sans-serif;
border-top: 1px solid black;
margin-top:50px;
}
h1{
font-size: 50px;
font-family: Times New Roman, Times, serif;
}
table{
  width:100%;
}
.row1{
  border-bottom: 1px solid black;
}
</style>
</head>
<div class="container p-3">
  <div class="container ">
    <h1>PathLab</h1>
    <h5>30-D, Vashant Kunj, Phase -II, Ghaziabad - 201002</h5>
    <h5>M. no. 7503722404, 8859785456</h5>
  </div>
  <br>
  <div class="header1">
    <h3>REPORT</h3>
  </div>

  <div class="container cc p-3">
    <table>
      <thead>
        <tr><th>Report_ID</th><td>'.$row['report_id'].'</td><th>Report Date</th><td>'.$row1['date_updated'].'</td></tr>
        <tr><th>Appointment_ID</th><td>'.$row['appointment_id'].'</td><th>Patient Name</th><td>'.$row1['name'].'</td></tr>
        <tr><th>Gender</th><td>'.$row1['gender'].'</td><th>DOB</th><td>'.$row1['dob'].'</td></tr>
        <tr><th>Address</th><td colspan="3">'.$row1['address'].'</td></tr>
      </thead>>
    </table>
  </div>
  <br>
  <div class="container">
    <h4>Tests Results</h4>
    <table class="table" >
      <thead class="row1">
        <tr > 
            <th>Test_Name</th>
            <th>Results</th>
            <th>units</th>
            <th>Reference Range</th>
        </tr>
      </thead>
      <tbody>';
  
            
            $qry1="SELECT * FROM  report_result R right join test_list T on T.test_id=R.test_id where R.appointment_id='$row[appointment_id]'";
            $res1=mysqli_query($conn,$qry1);

            while($r=mysqli_fetch_assoc($res1)){ 
            
            $html .='<tr>
              <td>'.$r['name'].'</td>
              <td>'.$r['result'].'</td>
              <td>'.$r['unit'].'</td>
              <td>'.$r['ref.range'].'</td>
            </tr>';
           }
           $html .='</tbody>
    </table>
           <h6>**End of Report**</h6>
  </div>
    <footer>
    
    </footer>
</div>';

$dompdf = new Dompdf;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('report.pdf', array("Attachment" => false));
?>
