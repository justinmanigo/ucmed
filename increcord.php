<?php
        require("connect.php");
        session_start();
    if(!isset($_SESSION['username'])){
            header("location:login.php");
            exit();
    }


        $did = $_SESSION["doc_id"];
        $diagid = $_GET['diagid'];

?>
<html>
<head>
    <title>Patients | Talamban Health Center</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/addDisease.css"/>
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
                <h2> <img src="img/logos.png" id="logo"> </h2>  
        </div>
    </div>
</div>
        

<div class="row whole">
    <div class="col-md-2 sidebar-outer">
        <div class="sidebar col-md-2">
            <div id = "bb" >
                
                <a href="index.php" id="link"><div class="navheight"><span>&nbsp&nbsp</span>
                <p class="glyphicon glyphicon-folder-open centertext"></p> &nbsp CHARTS</div></a>
                
                <a href="patientz.php" id="link"><div class="active navheight"> <span>&nbsp</span> 
                <p class="glyphicon glyphicon-list-alt centertext"></p>&nbsp PATIENTS </div></a>
                
               <a href="npatient.php"  id="link"><div class=" navheight"> <span>&nbsp</span> 
               <p class="glyphicon glyphicon-user centertext"></p>&nbsp NEW PATIENTS</div></a>

                <a href="discharge.php" id="link"><div class="navheight"><span>&nbsp&nbsp</span>
                <p class="glyphicon glyphicon-export centertext"></p> &nbsp DISCHARGE</div></a>
                
                 <a id="myBtn1" id="link"  ><div class=" navheight"> <span>&nbsp</span> 
                 <p class="glyphicon glyphicon-log-out centertext"></p>&nbsp LOG OUT</div></a>

          
            </div>
                    
        </div>
  </div>

<div class="col-md-10 content321" id="content">
              
              <form method="POST" action="savecarerecord.php" id="formSample">
              
                <!--disease-->
           <div class="col-md-6 nurse">

                <h3 class="text-center">CARE BY</h3>
               
               <span class="fa fa-user"></span><span class = "aplabel">NURSE: </span>
                <input name="nursename"  id="nursename" type="text"  class="apdesc" style="margin-left:40px" autocomplete="off"/>
               
                <br><br>

               <span class=" fa fa-calendar"></span><span class="aplabel">CARE DATE</span>
               <input  id="cdate" value=0 name="cdate" type="date" class="apdesc" style="margin-left:40px"/>
                     <br><br>   
                <span class=" fa fa-calendar"></span><span class="aplabel">CARE TIME</span>
                <input  id="ctime" value=0 name="ctime" type="time" class="apdesc" style="margin-left:40px"/>


          </div>
                    
                   
                  
            <div class="col-md-6 care">
                      
                        <h3 class="text-center">CARE</h3>
                   <span class="fa fa-user"></span><span class = "aplabel">BLOODPRESSURE: </span>
                   <input name="bp"  id="bp" type="text"  class="apdesc" style="margin-left:2px" autocomplete="off"/>
                 
                       
                  <span class=" fa fa-thermometer-1"></span><span class="aplabel">TEMPERATURE</span>
                    <input  id="temp"  name="temp" type="text" class="apdesc" style="margin-left:0px"/>
                         <br><br> <br>  
                
                   <span class=" fa fa-heartbeat"></span><span class="aplabel">RESPIRATORY RATE</span>
                    <input  id="resrate"  name="resrate" type="text" class="apdesc" style="margin-left:0px"/>
                                             
                   <span class=" fa fa-hand-paper-o"></span><span class="aplabel">PULSE RATE</span>
                    <input  id="pulserate"  name="pulserate" type="text" class="apdesc" style="margin-left:4px"/>
                          <br><br><br> 
                       

                   <span class=" fa fa-file-word-o"></span><span class="aplabel">CONCERN</span>
                   <input  id="concern"  name="concern" type="text" class="apdesc" style="margin-left:4px;width:300px;"/>
                
                          <br><br>  <br> 

                   <input type ="hidden" name="diagid" value = "<?php echo $diagid?>">
                     
          </div>
                    
                

              <!-- button submit-->

        <div class="col-md-12 sub" >
            <button class = "btn btn-primary" id="submit" onclick="verify();"  name="addcare" > SUBMIT</button>
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
          <span class="glyphicon glyphicon-log-in"></span> NO </a>
        
    <a id="logout" href="logout.php" class="btn btn-success btn-lg ">
          <span class="glyphicon glyphicon-log-out"></span> YES </a>
         
  
</div>
  
  </div>   
</body>
</html>
<script src="js/jquery-3.2.1.min.js"></script>
<script>
    
    $("#dis").hide();
     $("#test").hide();
    
    
    
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