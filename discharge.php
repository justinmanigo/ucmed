<!DOCTYPE HTML>
<?php

    require("connect.php");
    session_start();

if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
}


$did = $_SESSION["doc_id"];
?>



<html>
<head>
<link rel = 'stylesheet' href='css/bootstrap.min.css'>
<link id="css" rel="stylesheet" type="text/css" href="css/in.css">
<script src="js/jquery-3.2.1.min.js"></script> 
<link rel="stylesheet" type="text/css"href="css/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel=icon href="img/ucmed.png"/> 
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<title>UC Med | Patients</title>
    <style>
        .tab{
            margin-top: 5%;
            margin-left: 2%;
        }
    </style>
</head>

<body>
	<?php
	$did = $_SESSION["doc_id"];
	
	?>
<div class="container-fluid header">
    <div class="row">
         <div class="  col-sm-offset-0">

             <h2> <img src="img/logos.png" id="logo"></h2>
             
         </div>
    </div>
</div>
    
    
<div class="row whole">
    <div class="col-md-2 sidebar-outer">
        <div class="sidebar col-md-2">
             <div id = "bb" >
                <a href="index.php" id="link">
                     <div class="navheight"><span>&nbsp&nbsp</span>
                     <p class="glyphicon glyphicon-folder-open centertext"></p> &nbsp CHARTS</div></a>
                <a href="patientz.php" id="link"><div class=" navheight"> 
                    <span>&nbsp</span> <p class="glyphicon glyphicon-list-alt centertext">
                    </p>&nbsp PATIENTS </div></a>
                <a href="npatient.php" id="link">
                 <div class="navheight"><span>&nbsp&nbsp</span>
                    <p class="fa fa-user-plus centertext"></p> &nbsp NEW PATIENT</div></a>
                <a href="#" id="link">
                 <div class="active navheight"><span>&nbsp&nbsp</span>
                    <p class="glyphicon glyphicon-export centertext"></p> &nbsp DISCHARGE</div></a>
                <a id="myBtn1" id="link"  ><div class=" navheight"> <span>&nbsp</span> 
                   <p class="glyphicon glyphicon-log-out centertext"></p>&nbsp LOG OUT</div></a>
             </div>     
        </div>
    </div>
</div>
    
    

<div class="col-md-10 content" id="content">
    <div class ="tab">
                
        <table class=" table table-bordered " id="patienttable">
            <thead>
                    
                    <th class="tie text-center">Patient ID</th>
                    <th class="tie text-center">Patient Name</th>
                    <th class="tie text-center">Diagnose Date</th>
                    <th class="tie text-center">Actions</th>
                
             </thead>
        <tbody>
             <?php
            $nul = "0000-00-00";
                $sql= "SELECT * FROM patients 
                JOIN diagnosis ON patients.patient_id = diagnosis.patient_id 
                JOIN in_patients ON diagnosis.diagnosis_id = in_patients.diagnosis_id
                WHERE diagnosis.doctor_id = $did AND diagnosis.patient_type= 'in' AND in_patients.discharge_date = $nul
                GROUP BY diagnosis.patient_id";
                          
                $result = mysqli_query($conn,$sql);
                        
                        if($result){
                            while($row = mysqli_fetch_array($result)){

                                $date = strtotime($row[15]);
                                $dob = date("F d, Y", $date);

                                echo "<tr>";
                                echo "<td class=' desc text-center'>$row[0]</td>";
                                echo "<td class = ' desc'>$row[2], $row[1]</td>";
                                echo "<td class=' desc text-center'>$dob</td>";
                              
                                echo "<td class='desc text-center'>";                                                           
                                echo "<a href='dischargeme.php?did=".$row[11]."'><button class='btn btn-danger dis' style='margin-right:30px;' id='view' > <p  class='glyphicon glyphicon-remove' style='font-family:Champagne-&-Limousines;'></p> &nbsp&nbsp&nbsp DISCHARGE</button></a> ";
                            
                                echo "</td>";
                                echo "</tr>";

                            }
                        }
                    ?>
         </tbody>
     </table>
  </div>
         
</div>
    
    
    
    <!-- Modal content -->
<div id="myModal" class="modal col-md-5 col-md-offset-4">
      <div class="modal-content">
            <span class="close">&times;</span>
        <h1 class="text-center">Are you sure you want to logout?</h1>
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
       "pagingType": "full_numbers"
      });
        
        
        $("#login").click(function(){  
           
         $(".modal").hide();
         
     });
         

});
    
   
</script>