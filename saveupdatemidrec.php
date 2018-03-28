<?php

	require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }

    if(isset($_POST['update'])){

    	$ptype = $_POST['patientType'];
    	$disname = $_POST['disname'];
    	echo $disname;
    	$ddesc = $_POST['ddesc'];
    	echo $ddesc;
    	$diaid = $_POST['diaid'];
    	echo $diaid;
    	$addate = $_POST['addate'];
    	echo $addate;
    	$ipmount = $_POST['ipmount'];
    	echo $ipmount;
    	$rtype = $_POST['rtype'];
    	echo $rtype;
    	$rnum = $_POST['rnum'];
    	echo $rnum;
    	$disdate = $_POST['disdate'];
    	echo $disdate;
    	$opmount = $_POST['opmount'];
    	echo $opmount;
    	$condate = $_POST['condate'];
    	echo $condate;
    	$result = $_POST['result'];
    	echo $result;
    	$treat = $_POST['treat'];
    	echo $treat;
    	if($ptype=="in"){

    		echo "in";


    	}else{


    	}


    }else{


    	echo "waiclick";
    }

?>