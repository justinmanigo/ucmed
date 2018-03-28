<!DOCTYPE HTML>
<?php

    require("connect.php");
    session_start();

if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }
$did = $_SESSION["doc_id"];
 //$username = mysqli_real_escape_string($conn,$username);
/*$username = $_SESSION['username'];
$sql="SELECT `firstname` FROM doctor WHERE username='$username'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);*/


if(isset($_GET['pid'])){
            $querypatient = "SELECT  patient_Fname, patient_Lname, patient_contact, address, gender, birthdate, civil_status,patient_BloodType,patient_height,patient_weight FROM patients WHERE patient_id =".$_GET['pid'];
            
            $result=mysqli_query($conn,$querypatient);
           // echo $querypatient;
            $row=mysqli_fetch_array($result);
               
           
            
            $date = strtotime($row[5]);
            $dob = date("F d, Y", $date); 
        }




?>



<html>
<head>
<link rel = 'stylesheet' href='css/bootstrap.min.css'>
<link id="css" rel="stylesheet" type="text/css" href="css/vp.css">
<script src="js/jquery-3.2.1.min.js"></script> 
<link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel=icon href="img/ucmed.png"/> 
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<title>UC Med | Patients</title>
<style>
    .tab{
        margin-top: 20%;
        margin-left: 5%;
        border: solid 1px #6CE3AD;
        border-radius: 8px;
        padding: 2em;
        position: fixed;
    }
    </style>
</head>

<body>
	<?php
	$did = $_SESSION["doc_id"];
	//echo "<script type='text/javascript'>alert('$did');</script>";
	?>
     <div class="container-fluid header">
            <div class="row">

                <div class=" col-sm-offset-0">

                <h2> <img src="img/logos.png" id="logo">  




                    </h2>




                </div>
            </div>

        </div>
    
    
   <div class="row whole">
    	<div class="col-md-2 sidebar-outer">
                <div class="sidebar col-md-2">
                    <div id = "bb" >
                        <a href="index.php" id="link">
                         <div class="navheight"><span>&nbsp&nbsp</span><p class="glyphicon glyphicon-folder-open centertext"></p> &nbsp CHARTS</div></a>
                        <a href="patientz.php" id="link"><div class="active navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-list-alt centertext"></p>&nbsp PATIENTS </div></a>
                        <a href="npatient.php" id="link">
                         <div class="navheight"><span>&nbsp&nbsp</span><p class="glyphicon glyphicon-user centertext"></p> &nbsp NEW PATIENT</div></a>
                    
                        <a href="discharge.php" id="link">
                         <div class="navheight"><span>&nbsp&nbsp</span><p class="glyphicon glyphicon-export centertext"></p> &nbsp DISCHARGE</div></a>
                        <a id="myBtn1" id="link"  ><div class=" navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-log-out centertext"></p>&nbsp LOG OUT</div></a>
                       
                       

                    </div>
                    
                </div>
            </div>
    
    
    
</div>
    
    

    <div class="col-md-10 content" id="content">
        
         <div class="col-md-1 box1">                
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">Name</span>
                   <b> <span style="margin-left:60px;font-size:15px;"> <?php echo $row['patient_Lname'].", ".$row['patient_Fname'];?></span></b>
             
                <br> <br>   
                      <span class="glyphicon glyphicon-user"></span><span class="aplabel">Contact:</span>
                   <b> <span style="margin-left:60px;font-size:15px;"> <?php echo $row['patient_contact'];?></span></b>
             <br> <br> 
              <span class="fa fa-birthday-cake"></span><span class="aplabel">Date of Birth:</span><b>
                      <span style="margin-left:30px;font-size:15px;"> <?php echo $dob;?></span></b>
                     <br><br>
              <span class="fa fa-home"></span><span class="aplabel">Adress:</span>
                   <b> <span style="margin-left:60px;font-size:15px;"> <?php echo $row['address'];?></span></b>
             
             <span style="margin-left:40px" class="fa fa-arrows-v"></span><span class="aplabel">Height in cm:</span>
                   <b> <span style="margin-left:40px;font-size:15px;"> <?php echo $row['patient_height'];?></span></b>
             <br> <br> 
             <span class="fa fa-venus-mars"></span><span class="aplabel">Gender:</span>
                   <b> <span style="margin-left:60px;font-size:15px;"> <?php echo $row['gender'];?></span></b>
             
             <span style="margin-left:120px" class="fa fa-tachometer"></span><span class="aplabel">Weight in kg:</span>
                   <b> <span style="margin-left:40px;font-size:15px;"> <?php echo $row['patient_weight'];?></span></b>
             <br> <br>
              <span class="fa fa-heartbeat"></span><span class="aplabel">Civil Status:</span>
                   <b> <span style="margin-left:40px;font-size:15px;"> <?php echo $row['civil_status'];?></span></b>
             
             <span style="margin-left:110px" class="fa fa-tint" aria-hidden="true"></span><span class="aplabel">Blood Type:</span>
                   <b> <span style="margin-left:40px;font-size:15px;"> <?php echo $row['patient_BloodType'];?></span></b>
             <br> <br>
        
             
        
        </div>
        
        
        
        
        
        
        
                <div class ="col-md-8 tab">
                <h5 class="text-center">  MEDICAL RECORDS </h5>
                <table class=" table table-bordered " id="patienttable">
                    <thead>
                    
                    <th class="tie text-center">Patient In</th>
                    <th class="tie text-center">Patient Out</th>
                    <th class="tie text-center">Disease Name</th>
                    <th class="tie text-center">Patient Type</th>
                    <th class="tie text-center">Actions</th>
                    </thead>
                    <tbody>
                    <?php
                        
               $viewpatient = "SELECT diagnosis.diagnose_date,disease_name,patient_type,diagnosis.diagnosis_id,in_patients.discharge_date
                        FROM diagnosis 
                        LEFT JOIN in_patients ON in_patients.diagnosis_id = diagnosis.diagnosis_id
                        JOIN patients  ON diagnosis.patient_id= patients.patient_id
                        JOIN diseases  ON diagnosis.disease_id=diseases.disease_id
                        WHERE  patients.patient_id=".$_GET['pid'];
                         $resultpre = mysqli_query($conn, $viewpatient);
                       
                        

                        if($resultpre){
                            while($row = mysqli_fetch_array($resultpre)){
                                echo "<tr>";
                                $date = strtotime($row[0]);
                                $doI = date("F d, Y", $date);
                                echo "<td class=' desc text-center'>$doI</td>";
                                $pout=($row[2]=="out")? $row[0] : $row[4];
                                if($pout== "0000-00-00"){
                                    $doo = "N/A";
                                }else{
                                $date = strtotime($pout);
                                $doo = date("F d, Y", $date); 
                                }
                                 echo "<td class=' desc text-center'>$doo</td>";
                                echo "<td class = ' desc'>$row[1]</td>";
                                echo "<td class=' desc text-center'>$row[2]</td>";
                               // echo "<td class=' desc text-center'>$row[4]-patient</td>";
                                
                                echo "<td class='desc text-center'>";
                                
                                echo "<a href='deletediagnosis.php?diagid=".$row[3]."'> <button class='btn btn-danger'  id='butt'> Delete </button></a> ";
                                echo "<a href='viewspecpatientz.php?diagid=".$row[3]."'><button class='btn btn-default success' style='margin-right:30px;' id='view' > <p x class='glyphicon glyphicon-eye-open' style='font-family:Champagne-&-Limousines;'></p> &nbsp&nbsp&nbsp View </button></a> ";
                             
                               
                                echo "</td>";
                                echo "</tr>";

                            }
                        }
                    ?>
                </tbody>
                </table>
                 </div>


        
       
        

            
</div>
    
    
<div id="myModal" class="modal col-md-5 col-md-offset-4">

  <!-- Modal content -->
  <div class="modal-content">
<span class="close">&times;</span>
    
	<h1 class="text-center"  style="margin-top:30px;">Are you sure you want to logout?</h1>
    <a id="login"  href="#" class="btn btn-danger btn-lg" style="margin-left:35%;margin-right:5%;">
          <span class="glyphicon glyphicon-log-in"></span> NO
        </a>
    <a id="logout" href="logout.php" class="btn btn-success btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> YES
        </a>
	
  </div>
	
  </div>
 
    
</body>

</html>


<script src="js/jquery.min.js"></script>
<script src="js/datatables.min.js"></script>

<script>
    
var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn1");
var span = document.getElementsByClassName("close")[0];
    
btn.onclick = function() {
    modal.style.display = "block";
    
}
    
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
   
function goBack() {
        window.history.back();
    } 

    
    $(document).ready(function(){

      $("#patienttable").DataTable({
       "pagingType": "full_numbers",
       "pageLength":3

      });
        
        
        $("#login").click(function(){  
           
         $(".modal").hide();
         
     });
         

    });
    
   
</script>