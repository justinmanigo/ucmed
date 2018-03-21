<?php
	require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }


////////

if(isset($_POST['create'])){
    

      echo "<script type ='text/javascript'>alert('".$_POST["rNumber"]."');</script>";
      echo "<script type ='text/javascript'>alert('".$_POST["oPMount"]."');</script>";
      echo "<script type ='text/javascript'>alert('".$_POST["iPMount"]."');</script>";
        $did = $_SESSION["doc_id"];
       
       	$date = date("Y-m-d", strtotime($_POST['bday']));
     
		$query = "INSERT INTO patients VALUES (NULL,'".$_POST['fname']."','".$_POST['lname']."','".$_POST['contact']."','".$_POST['address']."','".$_POST['gender']."','".$date."','".$_POST['civilStatus']."')";
		  
		$resultz = mysqli_query($conn, $query);
        

      
       $getPID="SELECT patient_id FROM patients ORDER BY patient_id DESC LIMIT 1";
        
        $result=mysqli_query($conn,$getPID);
        $row = mysqli_fetch_row($result);
        $pid= $row[0];

        //var_dump($pid);

        $getrmID = "SELECT room_id FROM rooms WHERE room_number ='".$_POST["rNumber"]."'";
        $resultrm = mysqli_query($conn,$getrmID);
        $rmrow = mysqli_fetch_row($resultrm);
        $rmID = $rmrow[0];

       // var_dump($_POST['patientType']);
    
    
        $dName =( $_POST['dName'] == "") ? "NULL" : "'".$_POST['dName']."'";
        $dDesc =( $_POST['dDesc'] == "") ? "NULL" : "'".$_POST['dDesc']."'";
        //insert disease ID
    $querydis="INSERT INTO diseases VALUES(NULL,".$dName.",".$dDesc.")";
        mysqli_query($conn, $querydis);
    
        //fetch disease ID
        $getDisId= "SELECT disease_id FROM diseases ORDER BY disease_id DESC LIMIT 1";
        $result3= mysqli_query($conn, $getDisId);
        $row3= mysqli_fetch_row($result3);
        $disid= $row3[0];
    
    
    
    
    
    
    
    $dTreat =( $_POST['diagTreat'] == "") ? "NULL" : "'".$_POST['diagTreat']."'";
    $damount = ( $_POST['oPMount'] == "") ? (float)$_POST['iPMount'] : (float)$_POST['oPMount'];
    //var_dump($damount);
   // $diagDate = ( $_POST['date'] == "") ? "NULL" : "'".$_POST['date']."'";
    
    
    //var_dump($_POST['date']);
    /*insert diagnosis*/
    
    
        /* $querydiagnosis= "INSERT INTO diagnosis VALUES(NULL,".$pid.",".$did.",".$disid.",".$diagDate.",".$dTreat."".$damount.",'".$_POST['patientType']."')";
        mysqli_query($conn,$querydiagnosis);*/
    
    
        $diagDate = ( $_POST['consDate'] == "") ? $_POST['admissDate'] : $_POST['consDate'];
        $printme = $_POST['patientType'];
        /*var_dump($pid);
        var_dump($did);
        var_dump($disid);

        var_dump($diagDate);
        var_dump($dTreat);
        var_dump($damount);
        var_dump($printme);*/
        echo $_POST['patientType'];
        $querydiagnosis= "INSERT INTO diagnosis VALUES(NULL, ".$pid.",".$did.",".$disid." ,'".$diagDate."',".$dTreat.",
        ".$damount.",'".$_POST['patientType']."')";

        $resultwe = mysqli_query($conn,$querydiagnosis);    



        echo $querydiagnosis;

       
        
        /*echo $querydiagnosis;*/
        /*if($resultwe){
            echo" naai sud";
        }else{

            echo "wai sud";
            echo $querydiagnosis;
        }*/
    
        $getdiagnoseid= "SELECT diagnosis_id FROM diagnosis ORDER BY diagnosis_id DESC LIMIT 1";
        $result5=mysqli_query($conn,$getdiagnoseid);
        $row5 = mysqli_fetch_row($result5);
        $diagnoseid= $row5[0];
    
    
    

            /*$conDate = ($_POST['cDate'] == "") ? "NULL" : "'".$_POST['cDate']."'";*/
    
            
    

    if($_POST['patientType'] == "in"){

            $admResults = ($_POST['adResults'] == "") ? "NULL" : "'".$_POST['adResults']."'";
            $dischDate = ($_POST['disDate'] == "") ? "NULL" : "'".$_POST['disDate']."'";
            $queryAdmit="INSERT INTO in_patients VALUES(NULL,".$admResults.",".$dischDate.",".$rmID.",".$diagnoseid.")";

           /* echo $queryAdmit;*/
            //$iPaidAmt = (float)$_POST['inPaidAmount'];
            
            
           

            //var_dump($iPaidAmt);
            
/*            $querydiagnosis= "INSERT INTO diagnosis VALUES(NULL,".$pid.",".$did.",".$disid.",'".$_POST['admissDate']."',".$dTreat."".$damount.",'".$_POST['patientType']."')";
            mysqli_query($conn,$querydiagnosis);*/
            
            /*var_dump( sprintf("%.2f",$iPaidAmt));
            $samfloat = 20;
            var_dump($samfloat);
            $floatsamf = (float)$samfloat;
            var_dump($floatsamf);*/
            
            $resultin = mysqli_query($conn,$queryAdmit);

            /*if($resultin){

                echo "naai sud in";
            }else{

                echo "wai sud in";
            }*/



        }else{

            $conResult = ($_POST['cResult'] == "") ? "NULL" : "'".$_POST['cResult']."'";
            //$oPaidAmount = (float)$_POST['outPaidAmount'];
            //var_dump($oPaidAmount);
            $queryOut="INSERT INTO out_patients VALUES(NULL,".$diagnoseid.",".$conResult.")";
            $resultout = mysqli_query($conn,$queryOut);

            /*echo $queryOut;*/

            /*if($resultout){

                echo"naai sud out";
            }else{

                echo "wai sud out";
            }*/
        
/*            $querydiagnosis= "INSERT INTO diagnosis VALUES(NULL,".$pid.",".$did.",".$disid.",'".$_POST['consDate']."',".$dTreat."".$damount.",'".$_POST['patientType']."')";
            mysqli_query($conn,$querydiagnosis);*/
            
        }
    
    //echo "<script type='text/javascript'>alert('$pid');</script>";
    
        /*TEST*/

        $querytest_id = "SELECT * FROM tests WHERE test_name = '".$_POST['tName']."'";
        $ptid= mysqli_query($conn,$querytest_id);
        $asptid = mysqli_fetch_assoc($ptid);
        $finptid = $asptid['test_id'];
        /*$tstName =( $_POST['tName'] == "") ? "NULL" : "'".$_POST['tName']."'";*/
        $tstResult = ($_POST['tResult'] == "") ? "NULL" : $_POST['tResult'];
        $ptDate = ($_POST['tResult'] == "") ? "NULL" : $_POST['tDate'];
        /*var_dump($tstResult);
        var_dump($finptid);
        var_dump($ptDate);
        var_dump($finptid);*/
        
        

        $queryPtTest = "INSERT INTO patients_tests VALUES(NULL,'".$tstResult."',".$pid.",'".$ptDate."',".$finptid.")";
        $resultPtTest = mysqli_query($conn,$queryPtTest);
     
        /*echo $queryPtTest;

        if($resultPtTest){

            echo "naai sud pt";
        }else{

            echo "wai sud pt";
        }*/
        //insert values from form
        /*$queryTest="INSERT INTO tests VALUES (NULL,".$tstName.",".$tstResult.")";
         mysqli_query($conn, $queryTest);*/
    
        //fetch test ID
        /*$getTestID= "SELECT test_id FROM tests ORDER BY test_id DESC LIMIT 1";
        $result5=  mysqli_query($conn, $getTestID);
        $row5= mysqli_fetch_row($result5);
        $tid= $row5[0];
        
        
        $tstDate =( $_POST['tDate'] == "") ? "NULL" : "'".$_POST['tDate']."'";*/
        /*inpaitent*/
        
        
        


        
          

        /*rooom */
        $rmNumber = ($_POST['rNumber'] == "-1") ? "NULL" : "'".$_POST['rNumber']."'";
        $rmRes = "SELECT * FROM rooms WHERE room_number ='".$_POST["rNumber"]."'";

       // var_dump($rmNumber);
        $resRoom = mysqli_query($conn,$rmRes);
        
        $row6= mysqli_fetch_assoc($resRoom);
        
       // var_dump($row6);

        $occu = $row6['occupants'];

        //var_dump($occu);

        $introw = (int)$occu;

        //var_dump($introw);
       
        /*var_dump($row6[0]);*/
        
          

        
        if($rmNumber!="NULL"){

        	$introw += 1;
        	$queryRum = "UPDATE rooms SET occupants = '".$introw. "+1' WHERE room_number = $rmNumber";
        	mysqli_query($conn,$queryRum);

        }
        /*$rmType = ($_POST['rType'] == "") ? "NULL" : "'".$_POST['rType']."'";*/
        
        /*UPDATE rooms SET occupants=5 WHERE room_number = 7;*/
        /*$querynum = "UPDATE obstetrical_history SET no_of_fatal_deaths = '".$num."' WHERE mother_id = ".$_GET['pid'];
                  $updateterm = mysqli_query($sql, $querynum);*/
         


        /*disease*/
        
        //$dTreat =( $_POST['dTreat'] == "") ? "NULL" : "'".$_POST['dTreat']."'";
        
    
//echo "<script type='text/javascript'>alert('$disid');</script>";
        /*out-consultation*/
    
        
        $getOutId= "SELECT out_id FROM out_patients ORDER BY out_id DESC LIMIT 1";
    
        $result4=mysqli_query($conn,$getOutId);
        $row4 = mysqli_fetch_row($result4);
        $oid= $row4[0];
    
       
        

    
    
}else{

  echo "<script type ='text/javascript'>alert('piste');</script>";

}

/*
if($resultz){
	$message = "Successfull";
	echo "<script type='text/javascript'>alert('".$message."')
              window.location.href = 'index.php';</script>";

}
*/

?>