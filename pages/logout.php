<?php 
echo "<script>alert('Log Out Successfully');</script>";
session_start();
session_unset();
session_destroy();

header("location:http://localhost:8080/AIP/index.php");
?>