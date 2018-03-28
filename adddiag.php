<?php
	require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }


////////

if(isset($_POST['add'])){
    
        $patientid = $_POST['ptntid'];

        echo "<script type ='text/javascript'>alert('$patientid');</script>";
        
        $disid = $_POST['disname'];
        $did = $_SESSION["doc_id"];
        $diagdate = ($_POST['admissDate'] == NULL) ? $_POST['consDate'] : $_POST['admissDate'];
        $dtreat = ($_POST['diagTreat'] == NULL) ? "NULL" : $_POST['diagTreat'];
        $damount = ( $_POST['oPMount'] == "") ? (float)$_POST['iPMount'] : (float)$_POST['oPMount'];
        $ptype = $_POST['patientType'];

        $querydiag = "INSERT INTO diagnosis VALUES(NULL,'".$patientid."','".$did."','".$disid."','".$diagdate."','".$dtreat."','".$damount."','".$ptype."')";
        mysqli_query($conn,$querydiag);
        $getdiagnoseid= "SELECT diagnosis_id FROM diagnosis ORDER BY diagnosis_id DESC LIMIT 1";
        $result5=mysqli_query($conn,$getdiagnoseid);
        $row5 = mysqli_fetch_row($result5);
        $diagnoseid= $row5[0];

        



        $tResult = ( $_POST['tResult']==NULL) ? "NULL": $_POST['tResult'];

        $tDate = ( $_POST['tDate']==NULL) ? "NULL": $_POST['tDate'];
        $tName = ( $_POST['tName']==0) ? "NULL": $_POST['tName'];

        

        $disDate = ($_POST['disDate'] == NULL) ? "NULL" : $_POST['disDate'];
       
        
        $dtreat = ($_POST['diagTreat'] == NULL) ? "NULL" : $_POST['diagTreat'];
       
        $rtype = ($_POST['rType']==-1) ? "NULL" : $_POST['rType'];
        
        $rNumber = ($_POST['rNumber']==-1) ? "NULL" : $_POST['rNumber'];
       
    
        
        $adr = ($_POST['adResults']==NULL) ? "NULL": $_POST['adResults'];

        $cresult = ( $_POST['cResult']==NULL) ? "NULL": $_POST['cResult'];
        
        
        
     
        
     
        


        if($ptype=="in"){

            $queryRmid = "SELECT room_id FROM rooms WHERE room_number='".$rNumber."'";
            echo $queryRmid;
            $rmid = mysqli_query($conn,$queryRmid);
            $frmid = mysqli_fetch_row($rmid);
            $finid = $frmid[0];
            echo $finid;

            $queryin= "INSERT INTO in_patients VALUES(NULL,'".$adr."','".$disDate."','".$finid."','".$diagnoseid."')";
            
            mysqli_query($conn,$queryin);
            echo $queryin; 

            $queryptest = "INSERT INTO patients_tests VALUES(NULL,'".$tResult."','".$patientid."','".$tDate."','".$tName."')";
            mysqli_query($conn,$queryptest);

        }else{

            $queryout = "INSERT INTO out_patients VALUES(NULL,'".$diagnoseid."','".$cresult."')";
            echo $queryout; 
            mysqli_query($conn,$queryout);

        }
        
       
}else{

  echo "<script type ='text/javascript'>alert('addiag bitch');</script>";

}

/*
if($resultz){
	$message = "Successfull";
	echo "<script type='text/javascript'>alert('".$message."')
              window.location.href = 'index.php';</script>";

}
*/

?>