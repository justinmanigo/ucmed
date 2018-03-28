<?php
    require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }

    if(isset($_GET['did'])){

            $querypatient = "SELECT  patient_Fname, patient_Lname, patient_contact, address, gender, birthdate, civil_status, patient_BloodType,patient_height, patient_weight,diagnosis.diagnosis_id FROM diagnosis JOIN patients ON diagnosis.patient_id = patients.patient_id WHERE diagnosis.diagnosis_id = ".$_GET['did'];

            
            
      

            $result=mysqli_query($conn,$querypatient);

            
            $row=mysqli_fetch_array($result);
            
            
            $date = strtotime($row[6]);
            $dob = date("F d, Y", $date); 

            $queryrmid = "SELECT room_id from in_patients WHERE  diagnosis_id = ".$row['diagnosis_id']."";
            $resultrm = mysqli_query($conn,$queryrmid);

            $rowz=mysqli_fetch_array($resultrm);

            $querydDate = "SELECT diagnose_date from diagnosis WHERE  diagnosis_id = ".$row['diagnosis_id']."";
            $resultdate = mysqli_query($conn,$querydDate);

            $rowDate = mysqli_fetch_array($resultdate);


        }
    

    $did = $_SESSION["doc_id"];

?>
<html>
<head>
    <title>Patients | Talamban Health Center</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/dischargeme.css"/>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
  <link rel=icon href="img/ucmed.png" /> 
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <style>
       
    </style>
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
                        <a href="patientz.php" id="link"><div class="navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-list-alt centertext"></p>&nbsp PATIENTS </div></a>
                       <a href="npatient.php"  id="link"><div class=" navheight"> <span>&nbsp</span> <p class="fa fa-user-plus centertext"></p>&nbsp NEW PATIENTS</div></a>
                        <a href="discharge.php" id="link">
                <div class="active navheight"><span>&nbsp&nbsp</span><p class="glyphicon glyphicon-export centertext"></p> &nbsp DISCHARGE</div></a>
                       
                         <a id="myBtn1" id="link"  ><div class=" navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-log-out centertext"></p>&nbsp LOG OUT</div></a>
                        
                        
                        
                    </div>
                    
                </div>
            </div>

            <div class="col-md-10 content" id="content">
             
                <div class="col-md-1 box1">                
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">Name</span>
                   <b> <span style="margin-left:60px;font-size:15px;"> <?php echo $row['patient_Lname'].", ".$row['patient_Fname'];?></span></b>
             
                <br> <br>   
                      <span class="glyphicon glyphicon-user"></span><span class="aplabel">Contact:</span>
                   <b> <span style="margin-left:50px;font-size:15px;"> <?php echo $row['patient_contact'];?></span></b>
             <br> <br> 
              <span class="fa fa-birthday-cake"></span><span class = "aplabel">Date of Birth:</span><b>
                      <span style="margin-left:20px;font-size:15px;"> <?php echo $dob;?></span></b>
                     <br><br>
              <span class="glyphicon glyphicon-user"></span><span class="aplabel">Adress:</span>
                   <b> <span style="margin-left:55px;font-size:15px;"> <?php echo $row['address'];?></span></b>
             <br> <br> 
             <span class="glyphicon glyphicon-user"></span><span class="aplabel">Gender:</span>
                   <b> <span style="margin-left:55px;font-size:15px;"> <?php echo $row['gender'];?></span></b>
             <br> <br>
              <span class="glyphicon glyphicon-user"></span><span class="aplabel">Civil Status:</span>
                   <b> <span style="margin-left:30px;font-size:15px;"> <?php echo $row['civil_status'];?></span></b>
             <br> <br>
             <span class="glyphicon glyphicon-user"></span><span class="aplabel">Blood Type:</span>
                   <b> <span style="margin-left:30px;font-size:15px;"> <?php echo $row['patient_BloodType'];?></span></b>
             <br> <br>
             <span class="glyphicon glyphicon-user"></span><span class="aplabel">Height:</span>
                   <b> <span style="margin-left:60px;font-size:15px;"> <?php echo $row['patient_height'];?>cm</span></b>
             <br> <br>
             <span class="glyphicon glyphicon-user"></span><span class="aplabel">Weight:</span>
                   <b> <span style="margin-left:60px;font-size:15px;"> <?php echo $row['patient_weight'];?>kg<keygen></keygen></span></b>
             <br> <br>
             
             <span class="glyphicon glyphicon-user"></span><span class="aplabel">Diag ID:</span>
                   <b> <span style="margin-left:60px;font-size:15px;"> <?php echo $row['diagnosis_id'];?><keygen></keygen></span></b>
             <br> <br>
             
              </div>
             
                
              <form method="POST" action="dischargep.php" id="formSample">
              
             
                  
                    <!--disease-->
                  
                   <div class="col-md-6 disease">
                      
                        <h3>DISCHARGE</h3>
                       <span class="fa fa-calendar"></span><span class = "aplabel">Discharge Date</span>
                    <input name="dischdate"  id="dischdate" type="date"  class="apdesc" style="margin-left:0px" autocomplete="off" 
                    onchange="days_between(this.value)"/>
                 <br><br>
                       
                     <span class=" fa fa-credit-card"></span><span class="aplabel">Paid Amount</span><input  id="pMount" value=0 name="iPMount" type="text" class="apdesc" style="margin-left:45px"/>
                         <br><br>   
                       
                       <input type="hidden" id="diagid" value= " <?php echo $row['diagnosis_id'];?> " name="diagid" type="text" class="apdesc" style="margin-left:45px"/>
                         <br><br>


                        <input type="hidden" id="rmid" value= " <?php echo $rowz[0];?> " name="rmid" type="text" class="apdesc" style="margin-left:45px"/>
                         <br><br>   

                         <input type = "hidden" id="javadate" value= " <?php echo $rowDate[0];?> " type="text" class="apdesc" style="margin-left:45px"/>
                         <br><br>  
                     
              </div>
                    
                   
                

              <!-- button submit-->

                <div class="col-md-12 sub" >
                <button class = "btn btn-primary" id="submit" onclick="verify();"  name="set" > SUBMIT</button>
               </div>
              
                
                  
                </form>     

            </div> <!--form div-->
        </div>
    
 <div id="myModal" class="modal col-md-5 col-md-offset-4">

  <!-- Modal content -->
  <div class="modal-content">
<span class="close">&times;</span>
    
  <h1 class="text-center">Are you sure you want to logout?</h1>
    <a id="login"  href="#" class="btn btn-danger btn-lg " style="margin-left:35%;margin-right:5%;">
          <span class="glyphicon glyphicon-log-in"></span> NO
        </a>
    <a id="logout" href="logout.php" class="btn btn-success btn-lg ">
          <span class="glyphicon glyphicon-log-out"></span> YES
        </a>
  
  </div>
  
  </div>   
</body>
</html>
<script src="js/jquery-3.2.1.min.js"></script>
<script>
    
    $("#dis").hide();
     $("#test").hide();
    
    
    
    
    
    
     $(document).ready(function(){
     
      changeval();
  
    
    });

     function changeval()
     {
        var x = <?php echo $rowz[0]?>;
        
        if(x<=15){

        console.log("ward");
        document.getElementById("pMount").value = 20;

        }else if(x>15 && x<=25){

        console.log("semi private");  
        document.getElementById("pMount").value = 30;

        }else if(x>25){

        console.log("private");
        document.getElementById("pMount").value = 40;

        }

     }
    
    
    function goBack() {
        window.history.back();
    }   

    $(function times(){

    var valueElement = $('#value');
    function incrementValue(e){
        valueElement.text(Math.max(parseInt(valueElement.text()) + e.data.increment, 0));
        return false;
    }

    $('#plus').bind('click', {increment: 1}, incrementValue);

    $('#minus').bind('click', {increment: -1}, incrementValue);

    });
    
    function log()
    {
        alert("Are you sure?");
    }
    
    
    
function verify()
{
    var fname=document.getElementById("fname");
    var lname=document.getElementById("lname").value;
    var day=document.getElementById("day").value;
    var month=document.getElementById("month").value;
    var year=document.getElementById("year").value;
    var address=document.getElementById("address").value;
    var civilStatus=document.getElementById("civilStatus").values;
    var patientType=document.getElementById("patientType").values;

    
    
 if(fname == " "){
     
     alert("Please enter  first name");
 }else if(lname  == " "){
     
     alert("Please enter ");
 }else if( day == -1 && month == -1 && year == -1 ){
     
     alert("Please enter birthdate");
 }else if(address == " "){
     alert("Please enter address");
 }else if(civilStatus == -1){
     alert("Please enter address");
 }else if(patientType == -1){
     alert("Please enter patient Type");
 }
    
    
}

function days_between() {

    changeval();
    var dat1 = document.getElementById('javadate').value;; 
                var date1 = new Date(dat1)//converts string to date object
               
                var dat2 = document.getElementById('dischdate').value;
                var date2 = new Date(dat2)
                console.log(dat1);
                console.log(dat2);
                console.log(document.getElementById("pMount").value);
                var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                var diffDays = Math.abs((date1.getTime() - date2.getTime()) / (oneDay));
               
                console.log(diffDays);
                var x = document.getElementById("pMount").value;
                var y = parseInt(x);
                var z = parseInt(diffDays);
                console.log(y);
                console.log(z);
                document.getElementById("pMount").value = y*z;
               

}
  
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
   
  
</script>