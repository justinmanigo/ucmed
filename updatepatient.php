<?php
    require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }

        if(isset($_GET['pid'])){
            $querypatient = "SELECT  patient_Fname, patient_Lname, patient_contact, address, gender, birthdate, civil_status, patient_type FROM patients WHERE patient_id =".$_GET['pid'];
            
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
    <link rel="stylesheet" type="text/css" href="css/npatient.css"/>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
    <link rel=icon href="img/ucmed.png"/> 
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
                   <b> <span style="margin-left:60px;font-size:15px;"> <?php echo $row['patient_contact'];?></span></b>
             <br> <br> 
              <span class="fa fa-birthday-cake"></span><span class = "aplabel">Date of Birth</span><b>
                      <span style="margin-left:30px;font-size:15px;"> <?php echo $dob;?></span></b>
                     <br><br>
              <span class="glyphicon glyphicon-user"></span><span class="aplabel">Adress</span>
                   <b> <span style="margin-left:60px;font-size:15px;"> <?php echo $row['address'];?></span></b>
             <br> <br> 
             <span class="glyphicon glyphicon-user"></span><span class="aplabel">Gender</span>
                   <b> <span style="margin-left:60px;font-size:15px;"> <?php echo $row['gender'];?></span></b>
             <br> <br>
              <span class="glyphicon glyphicon-user"></span><span class="aplabel">Civil Status</span>
                   <b> <span style="margin-left:60px;font-size:15px;"> <?php echo $row['civil_status'];?></span></b>
             <br> <br>
               <span class="glyphicon glyphicon-user"></span><span class="aplabel">Patient Type</span>
                   <b> <span style="margin-left:60px;font-size:15px;"> <?php echo $row['patient_type'];?></span></b>
             <br> <br>
             
             
                 <!--    <br><br>
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">Last Name</span><input name="lname"  id="lname" type="text"  required class="apdesc" style="margin-left:40px" autocomplete="off"/>
                     <br><br>
					 <span class="glyphicon glyphicon-user"></span><span class="aplabel">Contact</span><input name="contact"  id="contact" type="text"  class="apdesc" style="margin-left:60px" autocomplete="off"/>
                     <br><br>
                     <span class="fa fa-birthday-cake"></span><span class = "aplabel">Date of Birth</span>
                  <input name="contact"  id="contact" type="date"  class="apdesc" style="margin-left:25px" autocomplete="off"/>
                 
                          
                            
                    <br><br>

                    <span class="fa fa-home"></span><span class="aplabel">Address</span><input required id="adress" name="address" type="text" class="apdesc" style="margin-left:57.5px" autocomplete="off"/>
                    <br><br>
					
					<span class="fa fa-user-circle"></span><span class="aplabel">Gender</span>
                  <select  required name="gender" id="dob-day" style="margin-left:50px" >
                              <option value="-1">-choose-</option>
							  <option value="male">Male</option>
							  <option value="female">Female</option>
							  <option value="others">Others</option>
							  </select>
                    <br><br>
					
					<span class="fa fa-heartbeat"></span><span class = "aplabel">Civil Status</span>
                          
                            <select  required name="civilStatus" id="civilStatus" style="margin-left:25px" >
                              <option value="-1">-choose-</option>
							  <option value="single">Single</option>
							  <option value="married">Married</option>
							  <option value="widowed">Widowed</option>
							  </select>
                    <br><br>	
                    
                    <span class="fa fa-file-powerpoint-o"></span><span class = "aplabel">PatientType</span>
                          
                            <select required name="patientType" id="patientType" style="margin-left:25px" >
                              <option value="-1">-choose-</option>
							  <option  value="in">In Patient</option>
							  <option  value="out">Out Patient</option>
							  </select>
                    <br><br>
                   
                  -->
              </div>   
            </div>
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
    
    
    

  
</script>