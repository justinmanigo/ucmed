<?php
    require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }

    if(isset($_GET['testid'])){

          $tid = $_GET['testid'];
            $querypatient = "SELECT * FROM test WHERE test_id=".$tid;
            $result=mysqli_query($conn,$querypatient);

           


              

            $row=mysqli_fetch_assoc($result);

             $date = strtotime($row['test_date']);
            $db = date("F d, Y", $date); 
            $time =$row['test_time'];

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
                <a href="index.php" id="link">
                 <div class="navheight"><span>&nbsp&nbsp</span>
                 <p class="glyphicon glyphicon-folder-open centertext">  </p> &nbsp CHARTS</div></a>
                
                <a href="patientz.php" id="link"><div class=" active navheight"> <span>&nbsp</span> 
                    <p class="glyphicon glyphicon-list-alt centertext"></p>&nbsp PATIENTS </div></a>
                
               <a href="npatient.php"  id="link"><div class=" navheight"> <span>&nbsp</span> 
                   <p class="glyphicon glyphicon-user centertext"></p>&nbsp NEW PATIENTS</div></a>

                <a href="discharge.php" id="link">
                    <div class="navheight"><span>&nbsp&nbsp</span>
                    <p class="glyphicon glyphicon-export centertext"></p> &nbsp DISCHARGE</div></a>
                <a id="myBtn1" id="link"  ><div class=" navheight"> <span>&nbsp</span>
                    <p class="glyphicon glyphicon-log-out centertext"></p>&nbsp LOG OUT</div></a>
                        
                        
            </div>
                    
        </div>
    </div>
            

    
    <div class="col-md-10 content" id="content">
            

         <div class="col-md-3  inviewz">                
                 <span class="glyphicon glyphicon-user"></span><span class="aplabel"> Test Name:</span>
                        <b> <span style="margin-left:50px;font-size:15px;"> 
                          <?php echo $row['test_name'];?>
                           </span></b>

                    <br> <br>   

                  <span class="fa fa-file-text-o"></span><span class = "aplabel">Test Interpretation:</span><b>
                      <span style="margin-left:55px;font-size:15px;"> 
                             <?php echo $row['test_interpretation'];?>
                    </span></b>

                 <br> <br> 
                 <span class="fa fa-calendar"></span><span class="aplabel">Test Date:</span>
                       <b> <span style="margin-left:50px;font-size:15px;"> <?php echo $db;?></span></b>
                 <br> <br> 
                  <span class="fa fa-clock-o"></span><span class = "aplabel">Test Time:</span><b>
                          <span style="margin-left:20px;font-size:15px;"> 
                                <?php echo date('h:i:s a', strtotime($time));?>
                        </span></b>

                 <br> <br> 
                 <span class="fa fa-money"></span><span class = "aplabel">Test Price:</span><b>
                          <span style="margin-left:20px;font-size:15px;"> 
                                <?php echo $row['test_price'];?>
                        </span></b>


                        <br> <br> 
                 <span class="fa fa-money"></span><span class = "aplabel">Test Paid:</span><b>
                          <span style="margin-left:20px;font-size:15px;"> 
                                <?php echo $row['test_paid'];?>
                        </span></b>

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
     
    $("#login").click(function(){  
           
        $(".modal").hide();
         
   });
         
      
});
    

  
</script>