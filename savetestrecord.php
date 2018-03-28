<?php
require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }
		if(isset($_POST['addtest'])){


			$querynewtest = "INSERT INTO test VALUES(NULL,'".$_POST['diagid']."','".$_POST['testname']."','".$_POST['testint']."','".$_POST['testdate']."',
			'".$_POST['testtime']."','".$_POST['testprice']."','".$_POST['testpaid']."')";

			$resultnewtest = mysqli_query($conn,$querynewtest);

                if($resultnewtest){

				$message = "New Test Record Successfully Added!";
  				echo "<script type='text/javascript'>alert('".$message."')
              	window.location.href = 'viewspecpatientz.php?diagid=".$_POST['diagid']."';</script>";

			}
			

		}else{

		

		}
?>