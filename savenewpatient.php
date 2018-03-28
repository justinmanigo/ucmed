<?php
  require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }


////////

if(isset($_POST['create'])){
    

    
    $did = $_SESSION["doc_id"];
       /* $date = $_POST['bday'];*/
    $querypatient = "INSERT INTO patients VALUES (NULL,'".$_POST['fname']."','".$_POST['lname']."','".$_POST['contact']."','".$_POST['address']."','".$_POST['gender']."','".$_POST['bday']."','".$_POST['civilStatus']."','".$_POST['btype']."','".$_POST['height']."','".$_POST['weight']."')";
      
          
    $resultpatient = mysqli_query($conn, $querypatient);


    $getPID="SELECT patient_id FROM patients ORDER BY patient_id DESC LIMIT 1";
        
    $result=mysqli_query($conn,$getPID);
    $row = mysqli_fetch_row($result);
    $pid= $row[0];

    $amount = ($_POST['patientType']=="in") ? 0: $_POST['oPMount'];


    $visitdate = ($_POST['patientType']=="in") ? "'".$_POST['admissDate']."'": "'".$_POST['consDate']."'"; ;

    //echo $visitdate;


    $querydiag = "INSERT INTO diagnosis VALUES(NULL,".$pid.",".$did.",'".$_POST['disname']."',".$visitdate.",'".$_POST['dresults']."',
    ".$amount.",'".$_POST['patientType']."')";

    //echo $querydiag;


    $resultdiag = mysqli_query($conn, $querydiag);

    $getdiagID = "SELECT diagnosis_id FROM diagnosis ORDER BY diagnosis_id DESC LIMIT 1";
    $resultdiaID = mysqli_query($conn,$getdiagID);
    $row2 = mysqli_fetch_row($resultdiaID);
    $diagID = $row2[0];


    $querynumoccu = "SELECT occupants FROM rooms WHERE room_id = '".$_POST['rNumber']."'";
    $resultnumoccu = mysqli_query($conn,$querynumoccu);
    $row3 = mysqli_fetch_row($resultnumoccu);
    $occu = (int)$row3[0] +(int)1;




    if($_POST['patientType']=="in"){

        $queryin = "INSERT INTO in_patients(`in_id`, `room_id`, `diagnosis_id`) VALUES (NULL,'".$_POST['rNumber']."',".$diagID.")";
        
        mysqli_query($conn,$queryin);

        $queryupoccu = "UPDATE rooms SET occupants = ".$occu." WHERE room_id = '".$_POST['rNumber']."' ";

        
        mysqli_query($conn,$queryupoccu);

    }else{

        $queryout = "INSERT INTO out_patients VALUES (NULL,".$diagID.",'".$_POST['prescription']."')";
        
        mysqli_query($conn,$queryout);

    }

    $check = ($_POST['tName'] =="") ? "": $_POST['tName'];

    if($check){
    
        $querytestpatient = "INSERT INTO test VALUES(NULL,".$diagID.",'".$_POST['tName']."','".$_POST['tInt']."','".$_POST['tDate']."','".$_POST['tTime']."','".$_POST['tPrice']."','".$_POST['tPaid']."')";

    

        mysqli_query($conn,$querytestpatient);
   
    }

    
    
}else{

  echo "<script type ='text/javascript'>alert('piste');</script>";

}


if($resultpatient){
  $message = "Patient Successfully Added";
  echo "<script type='text/javascript'>alert('".$message."')
              window.location.href = 'patientz.php';</script>";

}


?>