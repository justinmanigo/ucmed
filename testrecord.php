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
  
</head>

<body>
 
    
    
    
 <div class="container-fluid header">
    <div class="row">
        <div class="col-sm-offset-0">
            <h2> <img src="img/logos.png" id="logo"></h2>  
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
            <a href="npatient.php"  id="link"><div class=" navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-user centertext"></p>&nbsp NEW PATIENTS</div></a>

            <a href="discharge.php" id="link"><div class="navheight"><span>&nbsp&nbsp</span>
             <p class="glyphicon glyphicon-export centertext"></p> &nbsp DISCHARGE</div></a>

             <a id="myBtn1" id="link"  ><div class=" navheight"> <span>&nbsp</span> 
             <p class="glyphicon glyphicon-log-out centertext"></p>&nbsp LOG OUT</div></a>

        </div>
      </div>
    </div>

  <div class="col-md-10 content321" id="content">
             
     
      <form method="POST" action="savetestrecord.php" id="formSample">
              
             
                  
                    <!--disease-->
                  
                  
                   
                  
       <div class="col-md-6 test123">
                      
                <h3 class="text-center">TEST FORM</h3>
               
           <span class="fa fa-user"></span><span class = "aplabel">Test Name: </span>
           <input name="testname" required id="testname" type="text"  class="apdesc" style="margin-left:2px" autocomplete="off"/>

           <br><br>
           <span class=" fa fa-search"></span><span class="aplabel">Test Interpretation</span>
            <input  id="testint"  name="testint" type="text" class="apdesc" style="margin-left:0px"/>
             <br><br>   
            <span class=" fa fa-calendar"></span><span class="aplabel">Test Date</span>
           <input  id="testdate"  name="testdate" type="date" class="apdesc" style="margin-left:0px"/>
                       <br><br>          
             <span class=" fa fa-clock-o"></span><span class="aplabel">Test Time</span>
             <input  id="testtime"  name="testtime" type="time" class="apdesc" style="margin-left:2px"/>
              <br><br> 

           <span class=" fa fa-money"></span><span class="aplabel">Test Price</span>
           <input  id="testprice" required name="testprice" type="text" class="apdesc" style="margin-left:5px;width:150px;"/>
           <br><br>
           <span class=" fa fa-money" style="margin-left:5px;"></span><span class="aplabel" >Test Paid</span>

           <input  id="testpaid"  name="testpaid" type="text" class="apdesc" style="margin-left:4px;width:150px;"/>
              <br><br>  

               <input type ="hidden" name="diagid" value = "<?php echo $diagid?>">
                     
      </div>
                    
                

              <!-- button submit-->

        <div class="col-md-12 sub" >
        <button class = "btn btn-primary" id="submit"   name="addtest" > SUBMIT</button></div>

                
                  
    </form>     

    </div> <!--form div-->
</div>
    
    
     <!-- Modal content --> 
 <div id="myModal" class="modal col-md-5 col-md-offset-4">

   <div class="modal-content">
        <span class="close">&times;</span>

          <h1 class="text-center">Are you sure you want to logout?</h1>
        <a id="login"  href="#" class="btn btn-danger btn-lg " style="margin-left:35%;margin-right:5%;">
          <span class="glyphicon glyphicon-log-in"></span> NO </a>
            <a id="logout" href="logout.php" class="btn btn-success btn-lg ">
          <span class="glyphicon glyphicon-log-out"></span> YES</a>

  </div>
  
</div>   
</body>
</html>
<script src="js/jquery-3.2.1.min.js"></script>
<script>
  
    
    
    
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