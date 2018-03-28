<?php
	require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }


////////

if(isset($_POST['create'])){
    

     /* echo "<script type ='text/javascript'>alert('".$_POST["rNumber"]."');</script>";
      echo "<script type ='text/javascript'>alert('".$_POST["oPMount"]."');</script>";
      echo "<script type ='text/javascript'>alert('".$_POST["iPMount"]."');</script>";*/
        $did = $_SESSION["doc_id"];
       /*	$date = $_POST['bday'];*/
		$query = "INSERT INTO patients VALUES (NULL,'".$_POST['fname']."','".$_POST['lname']."','".$_POST['contact']."','".$_POST['address']."','".$_POST['gender']."','".$_POST['bday']."','".$_POST['civilStatus']."','".$_POST['btype']."','".$_POST['height']."','".$_POST['weight']."')";
		  
          echo $query;
		$result = mysqli_query($conn, $query);
    
    
}else{

  echo "<script type ='text/javascript'>alert('piste');</script>";

}


if($result){
	$message = "Patient Successfully Added";
	echo "<script type='text/javascript'>alert('".$message."')
              window.location.href = 'patientz.php';</script>";

}
*

?>