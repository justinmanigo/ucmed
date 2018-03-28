<?php
    require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }

        if(isset($_GET['diagid'])){

          $diagid = $_GET['diagid'];
   $querypatient = "SELECT ds.disease_name,d.results, d.patient_type,d.diagnose_date,d.paid_amount,r.room_type,r.room_number,ip.discharge_date,
   op.doctors_prescription 
    FROM diagnosis d
    JOIN patients p ON p.patient_id=d.patient_id
    JOIN diseases ds ON d.disease_id=ds.disease_id
    LEFT JOIN out_patients op ON op.diagnosis_id=d.diagnosis_id
    LEFT JOIN in_patients ip ON ip.diagnosis_id=d.diagnosis_id
    LEFT JOIN rooms r ON r.room_id = ip.room_id
    WHERE d.diagnosis_id =".$_GET['diagid'];
            
            $result=mysqli_query($conn,$querypatient);

            $row=mysqli_fetch_assoc($result);
                $res1 = $row["disease_name"];
               /* $res2  = $row["disease_desc"];*/
                $res3 = $row["patient_type"];                               
                $res4   = $row["diagnose_date"];
                $res5   = $row["paid_amount"];
                $res6   = $row["room_type"];
                $res7   = $row["room_number"];
                $res8 = $row["discharge_date"];
            //    $res9 = $row["result"];
               // $res10 = $row["consultation_result"];
                // $res11 = $row["treatment"];
            
             //echo $querypatient;
            
            
            $date = strtotime($row["diagnose_date"]);
            $dob = date("F d, Y", $date); 

            $date2 = strtotime($row["discharge_date"]);
            $dob2 = date("F d, Y", $date2); 

        }
  




    
?>
<html>
<head>
    <title>Patients | Talamban Health Center</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/view.css"/>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
    <link rel=icon href="img/ucmed.png" > 
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" type="text/css"href="css/datatables.min.css"/>
   
</head>
    <style>
   
     
    
    </style>

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
                       
                        <a href="discharge.php" id="link">
                            <div class="navheight"><span>&nbsp&nbsp</span><p class="glyphicon glyphicon-export centertext"></p> &nbsp DISCHARGE</div></a>
                        <a id="myBtn1" id="link"  ><div class=" navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-log-out centertext"></p>&nbsp LOG OUT</div></a>
                        
                        
                    </div>
                    
                </div>
            </div>
            
  <form method="post" action="saveupdatediagnosis.php?diagid=.$diagid.'">
        
            <div class="col-md-10 contentup" id="content">
            
     
 
         <div class="col-md-1 dis1">                
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">Disease Name:</span>
                   <b> <span style="margin-left:30px;font-size:15px;"> 
                    <input name="contact"  id="contact" type="text"  class="apdesc" value=" <?php echo $row["disease_name"];?> " style="margin-left:60px" autocomplete="off"/>
                  
                       </span></b>
             
                <br> <br>   
                      <span class="glyphicon glyphicon-user"></span><span class="aplabel"> Diagnosis Results: </span>
                   <b> <span style="margin-left:30px;font-size:15px;"> 
                    <input name="contact"  id="contact" type="text"  class="apdesc" value="<?php echo $row["results"];?>    " style="margin-left:60px" autocomplete="off"/>
                   
    
                       
                       </span></b>
             <br> <br> 
              
             <span class="glyphicon glyphicon-user"></span><span class="aplabel">Patient Type:</span>
                   <b> <span style="margin-left:40px;font-size:15px;">
<input name="contact"  id="contact" type="text"  class="apdesc" value="<?php echo $row["patient_type"];?>" style="margin-left:60px" autocomplete="off"/>
                     </span></b>
             <br> <br> 
             <span class="fa fa-birthday-cake"></span><span class = "aplabel">Admission Date:</span><b>
                      <span style="margin-left:20px;font-size:15px;"> 
                        <input name="contact"  id="contact" type="text"  class="apdesc" value="<?php echo $dob;?>" style="margin-left:60px" autocomplete="off"/>
                         
                    </span></b>
             
             <br> <br> 
            
             
              </div> 
                
           
            <div class="col-md-3  inview">                
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel"> Paid Amount:</span>
                   <b> <span style="margin-left:50px;font-size:15px;"> 
                    <input name="contact"  id="contact" type="text"  class="apdesc" value="<?php echo $row["paid_amount"];?>  " style="margin-left:60px" autocomplete="off"/>
                    
                       </span></b>
             
                <br> <br>   
                 
              <span class="fa fa-birthday-cake"></span><span class = "aplabel">Room Type:</span><b>
                      <span style="margin-left:20px;font-size:15px;"> 
                        <input name="contact"  id="contact" type="text"  class="apdesc" value="<?php echo $row["room_type"];?> " style="margin-left:60px" autocomplete="off"/>
                      
                    </span></b>
             
             <br> <br> 
             <span class="glyphicon glyphicon-user"></span><span class="aplabel">Room Number:</span>
                   <b> <span style="margin-left:55px;font-size:15px;"> 
                    <input name="contact"  id="contact" type="text"  class="apdesc" value="<?php echo $row["room_number"];?>" style="margin-left:60px" autocomplete="off"/></span></b>
             <br> <br> 
              <span class="fa fa-birthday-cake"></span><span class = "aplabel">Discharge Date:</span><b>
                      <span style="margin-left:20px;font-size:15px;"> 
                        <input name="contact"  id="contact" type="text"  class="apdesc" value="<?php echo $dob2;?>" style="margin-left:60px" autocomplete="off"/>
                            
                    </span></b>
             
             <br> <br> 
             
              </div> 
           
               
                <div class="col-md-3 col-md-offset-4 outview">                
                     
                      <span class="glyphicon glyphicon-user"></span><span class="aplabel"> Paid Amount:</span>
                   <b> <span style="margin-left:50px;font-size:15px;"> 
                   <input name="contact"  id="contact" type="text"  class="apdesc" value="<?php echo $res5;?> " style="margin-left:60px" autocomplete="off"/>
                   
    
                       
                       </span></b>
             <br> <br> 
              <span class="fa fa-birthday-cake"></span><span class = "aplabel">Consultation Date:</span><b>
                      <span style="margin-left:20px;font-size:15px;"> 
                        <input name="contact"  id="contact" type="text"  class="apdesc" value="<?php echo $dob;?>" style="margin-left:60px" autocomplete="off"/>
                         
                    </span></b>
             
              <br><br>

              <span class="fa fa-birthday-cake"></span><span class = "aplabel">Prescription:</span><b>
                      <span style="margin-left:20px;font-size:15px;"> 
                        <input name="contact"  id="contact" type="text"  class="apdesc" value="<?php echo $row["doctors_prescription"];?>" style="margin-left:60px" autocomplete="off"/>
                        
                    </span></b>
            </div>
            

             <div class="col-md-7 col-md-offset-4 subb" >
                <button class = "btn btn-default" id="submit" name="update" > SUBMIT</button>
               </div>
          
              </form>

            
           
            
            
            
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
     
      
    
    
    
    
   
   <?php 
      
   if($res3=="in"){
        
        echo"$('.outview').hide()";
   }else if($res3=="out"){
       echo"$('.inview').hide()";
    }
    
    
    ?>
         
      
    
    
    
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