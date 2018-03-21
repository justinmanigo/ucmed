<?php

require("connect.php");


session_start();


if(isset($_GET['buttondelete'])){
    $delid = mysqli_real_escape_string($conn, $_POST['delname']);
   }




$querydelete= "DELETE * FROM diagnosis WHERE diagnosis_id = ".$delid;

echo $querydelete;

$del= mysqli_query($conn,$querydelete);






?>