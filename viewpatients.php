<?php
    require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }

        if(isset($_GET['pid'])){
            $querypatient = "SELECT  patient_Fname, patient_Lname, patient_contact, address, gender, birthdate, civil_status FROM patients WHERE patient_id =".$_GET['pid'];
            
            $result=mysqli_query($conn,$querypatient);
            $row=mysqli_fetch_array($result);
            
            
            $date = strtotime($row[6]);
            $dob = date("F d, Y", $date); 
        }
    





    
?>
<html>
<head>
    <title>Patients | Talamban Health Center</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/viewpatient.css"/>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
    <link rel=icon href="img/ucmed.png" > 
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" type="text/css"href="css/datatables.min.css"/>
   
</head>

<body>
 
    
    
    
     <div class="container-fluid header">
            <div class="row">

                <div class="  col-sm-offset-0">

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
                        <a href="patientz.php" id="link"><div class=" active navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-list-alt centertext"></p>&nbsp PATIENTS </div></a>
                       <a href="npatient.php"  id="link"><div class=" navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-user centertext"></p>&nbsp NEW PATIENTS</div></a>
                        <a id="myBtn1" id="link"  ><div class=" navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-log-out centertext"></p>&nbsp LOG OUT</div></a>
                        
                        
                    </div>
                    
                </div>
            </div>
            

        
            <div class="col-md-10 content" id="content">
            
         <div class="col-md-1 box1">                
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">Name</span>
                   <b> <span style="margin-left:60px;font-size:15px;"> <?php echo $row['patient_Lname'].", ".$row['patient_Fname'];?></span></b>
             
                <br> <br>   
                      <span class="glyphicon glyphicon-user"></span><span class="aplabel">Contact</span>
                   <b> <span style="margin-left:50px;font-size:15px;"> <?php echo $row['patient_contact'];?></span></b>
             <br> <br> 
              <span class="fa fa-birthday-cake"></span><span class = "aplabel">Date of Birth</span><b>
                      <span style="margin-left:20px;font-size:15px;"> <?php echo $dob;?></span></b>
                     <br><br>
              <span class="glyphicon glyphicon-user"></span><span class="aplabel">Adress</span>
                   <b> <span style="margin-left:55px;font-size:15px;"> <?php echo $row['address'];?></span></b>
             <br> <br> 
             <span class="glyphicon glyphicon-user"></span><span class="aplabel">Gender</span>
                   <b> <span style="margin-left:55px;font-size:15px;"> <?php echo $row['gender'];?></span></b>
             <br> <br>
              <span class="glyphicon glyphicon-user"></span><span class="aplabel">Civil Status</span>
                   <b> <span style="margin-left:30px;font-size:15px;"> <?php echo $row['civil_status'];?></span></b>
             <br> <br>
             
             
              </div>  
                <!--dataset-->
                 <div class="col-md-6  col-md-offset-5 prebox " style="margin-top:30px;text-align: center;">
                            MEDICAL RECORDS
                
                <table class=" table table-bordered" id="record" style="border-radius:5em;">
                      <th class="text-center" id="preid">Date</th>
                      <th class="text-center" id="preid">Disease</th>
                    <th class="text-center" id="preid">Patient Type</th>
                      <th class="text-center" id="preid">Actions</th>
                      <tbody>
                      <?php 
                        
                    
                          
            $viewpatient = "SELECT diagnosis.diagnose_date,disease_name,patient_type,diagnosis.diagnosis_id
                        FROM diagnosis 
                        JOIN patients  ON diagnosis.patient_id= patients.patient_id
                        JOIN diseases  ON diagnosis.disease_id=diseases.disease_id
                        WHERE  patients.patient_id=".$_GET['pid'];
                         $resultpre = mysqli_query($conn, $viewpatient);
                          echo mysqli_error($conn);
                          
                          //var_dump($resultpre);
                        if($resultpre){
                            while($pre = mysqli_fetch_row($resultpre)){
                                echo "<tr>";
                               echo "<td class=' desc text-center'>".$pre[0]."</td>";
                                echo "<td class=' desc text-center'>".$pre[1]."</td>";
                    echo "<td class=' desc text-center'>".$pre[2]."</td>";
                                
                      echo "<td class=' desc text-center'>";
                                
                      echo "<a href='updatespecifipatient.php?diagid=".$pre[3]."'><button id='buttonadd' class='btn btn-default neutral action'>edit</button></a>";          
                      echo "<a href='viewspecpatient.php?diagid=".$pre[3]."'><button id='buttonadd' class='btn btn-default neutral 
                      action'> View</button></a>";
                        
                        echo    "<form method = 'POST' action = 'viewpatients.php'> <button id='buttondelete' class='btn btn-default neutral action' type = 'submit'> Del</button></form>";  
                                echo "</td>";
                                echo "</tr>";
                                

                            }
                        }
                        
                          
                          if(isset($_POST['buttondelete'])){
                              
                              $querydelete= "ALTER TABLE diagnosis
   DROP CONSTRAINT disease_diagnosis ALTER TABLE diagnosis
   ADD CONSTRAINT FK_T1_T2_Cascade
   FOREIGN KEY (EmployeeID) REFERENCES dbo.T1(EmployeeID) ON DELETE CASCADE";
                              
                              $del= mysqli_query($conn,$querydelete);
                              
                              $querydelete= "DELETE * FROM diagnosis WHERE diagnosis_id = ".$pre[3];
                              
                              $del= mysqli_query($conn,$querydelete);
                              
                              echo $querydelete;
                              
                              header("patientz.php");
                              
                           }
                        
                          
                          
                    ?>
                    </tbody>
                </table>
              </div>
            </div>
            <!--DATA SET-->
            
            

            
            
            
            
            
            
            
        </div>
            		
<div id="myModal" class="modal col-md-5 col-md-offset-4">

  <!-- Modal content -->
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
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/datatables.min.js"></script> 
<script>
    

    /*modal button function*/   

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
   
    
    
    

$(document).ready(function(){
     
      
    
    
    $("#record").DataTable({
         "pagingType": "full_numbers",
        
      });
         
      
    
    
    
});
    
    
    
    $(function times(){

    var valueElement = $('#value');
    function incrementValue(e){
        valueElement.text(Math.max(parseInt(valueElement.text()) + e.data.increment, 0));
        return false;
    }

    $('#plus').bind('click', {increment: 1}, incrementValue);

    $('#minus').bind('click', {increment: -1}, incrementValue);

    });
    
   
    
    
    

  
</script>