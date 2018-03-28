<?php
	require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }


////////

if(isset($_GET['diagid'])){
    


    $querydiag = "SELECT * FROM diagnosis WHERE diagnosis_id = '".$_GET['diagid']."'";
    $resultdiag = mysqli_query($conn,$querydiag);

    $row = mysqli_fetch_assoc($resultdiag);

    var_dump($row);

    if($row['patient_type']=="in"){

      $querysel = "SELECT * FROM in_patients WHERE diagnosis_id = '".$_GET['diagid']."'";
      $resultsel = mysqli_query($conn,$querysel);
      $rowz = mysqli_fetch_assoc($resultsel);

      $querydelcare = "DELETE FROM cares WHERE in_id = ".$rowz['in_id']."";
      mysqli_query($conn,$querydelcare);

      
      $querydel = "DELETE FROM in_patients WHERE diagnosis_id = '".$_GET['diagid']."'";
      echo $querydel;
      $resultz = mysqli_query($conn,$querydel);
      if($resultz){

        //echo "nadelete in";

      }else{

       // echo " wala nadelete";
      }

      $querydeldiagnosis = "DELETE FROM diagnosis WHERE diagnosis_id = '".$_GET['diagid']."'";

      
    }else{
     // echo "out ko";
      $querydel = "DELETE FROM out_patients WHERE diagnosis_id = '".$_GET['diagid']."'";

    mysqli_query($conn,$querydel);


      $querydeldiagnosis = "DELETE FROM diagnosis WHERE diagnosis_id = '".$_GET['diagid']."'";


    }

    $querydeltest = "DELETE FROM test WHERE diagnosis_id = '".$_GET['diagid']."'";
    mysqli_query($conn,$querydeltest);

    $result = mysqli_query($conn,$querydeldiagnosis);
 
}else{

  echo "wala";

}

if($result){
  $message = "Diagnosis Successfully Deleted";
  echo "<script type='text/javascript'>alert('".$message."')
              window.location.href = 'patientz.php';</script>";

}

?>