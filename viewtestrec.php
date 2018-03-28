<?php
    require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }

        if(isset($_GET['diagid'])){

          $cid = $_GET['diagid'];
   $querypatient = "SELECT * FROM test WHERE diagnosis=".$_GET['diagid'];
            
            $result=mysqli_query($conn,$querypatient);

           

/*echo "<script type ='text/javascript'>alert('wew');</script>";*/
              

            $row=mysqli_fetch_assoc($result);

            $date = strtotime($row['care_date']);
            $dob = date("F d, Y", $date); 
            
     /*       var_dump($row['care_time']);*/
            $time = $row['care_time'];
          /*  var_dump($time);*/


            /*echo date('h:i:s a', strtotime($time));*/
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
                        <a href="addDisease.php" id="link">
                <div class=" navheight"><span>&nbsp&nbsp</span><p class="glyphicon glyphicon-plus-sign centertext"></p> &nbsp ADD DISEASE</div></a>
                        <a href="discharge.php" id="link">
                            <div class="navheight"><span>&nbsp&nbsp</span><p class="glyphicon glyphicon-export centertext"></p> &nbsp DISCHARGE</div></a>
                        <a id="myBtn1" id="link"  ><div class=" navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-log-out centertext"></p>&nbsp LOG OUT</div></a>
                        
                        
                    </div>
                    
                </div>
            </div>
            

        
            <div class="col-md-10 content" id="content">
            
       

         <div class="col-md-1 dis1">                
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">Nurse In Charge:</span>
                   <b> <span style="margin-left:30px;font-size:15px;"> 
                   <?php echo $row['test_name'];?>
                       </span></b>
             
                <br> <br>   
                      <span class="glyphicon glyphicon-user"></span><span class="aplabel"> Visit Day: </span>
                   <b> <span style="margin-left:60px;font-size:15px;"> 
                   <?php echo $dob;?>
    
                       
                       </span></b>
             <br> <br> 
              
             <span class="glyphicon glyphicon-user"></span><span class="aplabel">Visit Time:</span>
                   <b> <span style="margin-left:60px;font-size:15px;">  <?php echo date('h:i:s a', strtotime($time));?></span></b>
             <br> <br> 
            
            
             
              </div> 
                
           
             <div class="col-md-3  inview">                
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel"> Blood Pressure:</span>
                   <b> <span style="margin-left:50px;font-size:15px;"> 
                      <?php echo $row['blood_pressure'];?>
                       </span></b>
             
                <br> <br>   
                 
              <span class="fa fa-birthday-cake"></span><span class = "aplabel">Temperature:</span><b>
                      <span style="margin-left:55px;font-size:15px;"> 
                             <?php echo $row['temperature'];?>
                    </span></b>
             
             <br> <br> 
             <span class="glyphicon glyphicon-user"></span><span class="aplabel">Respiratory rate:</span>
                   <b> <span style="margin-left:50px;font-size:15px;"> <?php echo $row['respiratory_rate'];?></span></b>
             <br> <br> 
              <span class="fa fa-birthday-cake"></span><span class = "aplabel">Pulse rate:</span><b>
                      <span style="margin-left:20px;font-size:15px;"> 
                            <?php echo $row['pulse_rate'];?>
                    </span></b>
             
             <br> <br> 
             <span class="fa fa-birthday-cake"></span><span class = "aplabel">Concern:</span><b>
                      <span style="margin-left:20px;font-size:15px;"> 
                            <?php echo $row['concern'];?>
                    </span></b>
              </div>  
           <!-- 
               
                <div class="col-md-3 col-md-offset-4 outview">                
                     
                      <span class="glyphicon glyphicon-user"></span><span class="aplabel"> Paid Amount:</span>
                   <b> <span style="margin-left:50px;font-size:15px;"> 
                   
                     <?php echo $res5;?>
    
                       
                       </span></b>
             <br> <br> 
              <span class="fa fa-birthday-cake"></span><span class = "aplabel">Consultation Date:</span><b>
                      <span style="margin-left:20px;font-size:15px;"> 
                            <?php echo $res4;?>
                    </span></b>
             
 
            </div>
             -->
            
            
                <!-- <div class="col-md-3  res">                
                     
                      <span class="glyphicon glyphicon-user"></span><span class="aplabel"> Results:</span>
                   <b> <span style="margin-left:50px;font-size:15px;"> 
                   
                     <?php echo $res9;?>
    
                       
                       </span></b>
             <br> <br> 
                     <br> <br> 
                     <br> <br> 
              <span class="fa fa-birthday-cake"></span><span class = "aplabel">Treatment:</span><b>
                      <span style="margin-left:20px;font-size:15px;"> 
                        <?php echo $res11;?>
                    </span></b>
             
 
            </div>
 -->
       
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

      $("#predatatab").DataTable({
        "bLengthChange": false,
        "pageLength":2,
        "scrollCollapse": true,
        "scrollY": "300px"
      });
      $('.dataTables_filter').addClass('pull-left');

    });
    
    

$(document).ready(function(){
     
      
    
    
    $("#record").DataTable({
       "pagingType": "full_numbers",
        "pageLength":2,
        "searching": true
      });
    
   
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