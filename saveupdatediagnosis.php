<?php

	require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }


	if(isset($_POST['update'])){
			 echo "sod";
	
	}else{

		echo "wala";
	}
?>