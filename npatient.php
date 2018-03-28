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
    <title>Patients | Talamban Health Center</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/npatient.css"/>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
    <link rel=icon href="img/ucmed.png" /> 
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
   
</head>

<body>
        
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
      <div id = "bb">
             <a href="index.php" id="link">
                    <div class="navheight"><span>&nbsp&nbsp</span>
                    <p class="glyphicon glyphicon-folder-open centertext"></p> &nbsp CHARTS</div></a>
             <a href="patientz.php" id="link">
                     <div class="navheight"><span>&nbsp</span> 
                     <p class="glyphicon glyphicon-list-alt centertext"></p>&nbsp PATIENTS </div></a>
             <a href="#"  id="link">
                    <div class="active navheight"> <span>&nbsp</span> 
                    <p class="fa fa-user-plus centertext"></p>&nbsp NEW PATIENTS</div></a>
             <a href="discharge.php" id="link">
                     <div class="navheight"><span>&nbsp&nbsp</span>
                     <p class="glyphicon glyphicon-export centertext"></p> &nbsp DISCHARGE</div></a>
            <a id="myBtn1" id="link" onclick="log();"  >
                 <div class=" navheight"> <span>&nbsp</span>
                     <p class="glyphicon glyphicon-log-out centertext"></p>&nbsp LOG OUT</div></a>

                        
                        
     </div>
  </div>
</div>

<div class="col-md-10 content" id="content">
              
    <form method="POST" action="savenewpatient.php" id="formSample">
        
       <div class="col-md-offset-0 box1">                
         <span class="glyphicon glyphicon-user"></span><span class="aplabel">First Name</span><input name="fname" id="fname" type="text" class="apdesc"  required style="margin-left:40px" autocomplete="off"/>
         <br><br>
         <span class="glyphicon glyphicon-user"></span><span class="aplabel">Last Name</span><input  name="lname"  id="lname" type="text"  required class="apdesc" style="margin-left:40px" autocomplete="off"/>
         <br><br>
         <span class="fa fa-phone-square"></span><span class="aplabel">Contact</span><input name="contact"  id="contact" type="text"  class="apdesc" style="margin-left:60px" autocomplete="off"/>
         <br><br>         
         <span class="fa fa-home"></span><span class="aplabel">Address</span><input id="adress" name="address" type="text" class="apdesc" style="margin-left:57.5px" autocomplete="off"/>
         <br><br>

          <span class="fa fa-venus-mars"></span><span class="aplabel">Gender</span>
                  <select name="gender" id="dob-day" required style="margin-left:50px" >
                            <option value="-1">-choose-</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                   </select>

                    <br><br>
          
          
                 <span class="fa fa-birthday-cake"></span><span class = "aplabel">Date of Birth</span>
                  <input name="bday"  id="bday" type="date"  class="apdesc" required  style="margin-left:25px" autocomplete="off"/>
           
                    <br><br>
          

                   <span class="fa fa-heartbeat"></span><span class = "aplabel">Civil Status</span>
                          <select required name="civilStatus" id="civilStatus" style="margin-left:25px" >
                              <option value="-1">-choose-</option>
                              <option value="single">Single</option>
                              <option value="married">Married</option>
                              <option value="widowed">Widowed</option>
                          </select>
                    <br><br>

                    <span class="fa fa-heartbeat"></span><span class = "aplabel">Blood Type</span>
                          <select required name="btype" id="btype" style="margin-left:25px" >
                              <option value="-1">-choose-</option>
                              <option value="O+">O+</option>
                              <option value="O-">O-</option>
                              <option value="A+">A+</option>
                              <option value="A-">A-</option>
                              <option value="B+">B+</option>
                              <option value="B-">B-</option>
                              <option value="AB+">AB+</option>
                              <option value="AB-">AB-</option>
                          </select>
                     <br><br>

                     <span class="fa fa-arrows-v"></span><span class="aplabel">Height in cm</span><input name="height" id="height" type="text" class="apdesc"  required style="margin-left:40px" autocomplete="off"/>
                     <br><br>

                     <span class="fa fa-tachometer"></span><span class="aplabel">Weight in kg</span><input name="weight" id="weight" type="text" class="apdesc"  required style="margin-left:40px" autocomplete="off"/>
                     <br><br>

                     <span class="fa fa-file-powerpoint-o"></span><span class = "aplabel">PatientType</span>
                            <select required name="patientType" id="patientType" style="margin-left:25px" >
                              <option value="-1">-choose-</option>
                              <option  value="in">In Patient</option>
                              <option  value="out">Out Patient</option>
                            </select>
                    <br><br>
                   
                  
    </div>

              

              <div class="col-md-6 in">
                      
                <span class="fa fa-calendar"></span><span class = "aplabel">Admission Date</span>
                    <input name="admissDate"  id="admissDate" type="date"  class="apdesc" style="margin-left:15px" autocomplete="off"/>
                    <br><br>
                  
                <span class=" fa fa-bed"></span><span class="aplabel">Room Type</span>
                  <select id='crType' name="rType" style="margin-left:35px" onchange="checkRoomType(this.value)">
                      <option value="-1"></option>
                      <option value="Ward">Ward</option>
                      <option value="Semi-Private">Semi-Private</option>
                      <option value="Private">Private</option>
                </select>

                    <br><br>

                     
                      
             
             <span class=" fa fa-bed"></span><span class="aplabel">Room number</span>
                 <select id='chrt' name="rNumber" style="margin-left:35px">
                        <option  value="-1"></option>
                        <option class = 'opward' id = 'opward1' hidden value="1">1</option>
                        <option class = 'opward' id = 'opward2' hidden value="2">2</option>
                        <option class = 'opward' id = 'opward3' hidden value="3">3</option>
                        <option class = 'opward' id = 'opward4' hidden value="4">4</option>
                        <option class = 'opward' id = 'opward5' hidden value="5">5</option>
                        <option class = 'opward' id = 'opward6' hidden value="6">6</option>
                        <option class = 'opward' id = 'opward7' hidden value="7">7</option>
                        <option class = 'opward' id = 'opward8' hidden value="8">8</option>
                        <option class = 'opward' id = 'opward9' hidden value="9">9</option>
                        <option class = 'opward' id = 'opward10' hidden value="10">10</option>
                        <option class = 'opward' id = 'opward11' hidden value="11">11</option>
                        <option class = 'opward' id = 'opward12' hidden value="12">12</option>
                        <option class = 'opward' id = 'opward13' hidden value="13">13</option>
                        <option class = 'opward' id = 'opward14' hidden value="14">14</option>
                        <option class = 'opward' id = 'opward15' hidden value="15">15</option>
                        <option class = 'opsemi' id = 'opsemi16' hidden value="16">16</option>
                        <option class = 'opsemi' id = 'opsemi17' hidden value="17">17</option>
                        <option class = 'opsemi' id = 'opsemi18' hidden value="18">18</option>
                        <option class = 'opsemi' id = 'opsemi19' hidden value="19">19</option>
                        <option class = 'opsemi' id = 'opsemi20' hidden value="20">20</option>
                        <option class = 'opsemi' id = 'opsemi21' hidden value="21">21</option>
                        <option class = 'opsemi' id = 'opsemi22' hidden value="22">22</option>
                        <option class = 'opsemi' id = 'opsemi23' hidden value="23">23</option>
                        <option class = 'opsemi' id = 'opsemi24' hidden value="24">24</option>
                        <option class = 'opsemi' id = 'opsemi25' hidden value="25">25</option>
                        <option class = 'oppri' id = 'oppri26' hidden value="26">26</option>
                        <option class = 'oppri' id = 'oppri27' hidden value="27">27</option>
                        <option class = 'oppri' id = 'oppri28' hidden value="28">28</option>
                        <option class = 'oppri' id = 'oppri29' hidden value="29">29</option>
                        <option class = 'oppri' id = 'oppri30' hidden value="30">30</option>
       
                    </select>
                     <br><br>
                      
                       
                 
                 
            </div>


   <div class="col-md-6 out">
                      
                    <span class="fa fa-calendar"></span><span class = "aplabel">Consultation Date</span>
                    <input name="consDate"  id="consDate" type="date"  class="apdesc" style="margin-left:0px" autocomplete="off"/>
                 <br><br>
                       <span class=" fa fa-credit-card"></span><span class="aplabel">Paid Amount</span><input id ="outPaid" name="oPMount" type="text" class="apdesc" placeholder="Specify" style="margin-left:35px"/>
                     <br><br>

                     <span class=" fa fa-bed"></span><span class="aplabel">Prescription</span><input name="prescription" type="text" class="apdesc" style="margin-left:45px;"/>
                          <br><br>
            
                    
    </div>

       <div class="col-md-6 disease">
                      
                        
                
                      <span class="fa fa-wheelchair-alt" aria-hidden="true"></span>
                     <span class="aplabel">Disease Name</span>
                        <select required name="disname" id="disname" style="margin-left:25px">
                      <option value="-1">-choose-</option>
                                         

                      <?php

                        $querydisease = "SELECT disease_id, disease_name FROM diseases";
                        $resultdis = mysqli_query($conn,$querydisease);

                        if($resultdis){
                          while($dis = mysqli_fetch_row($resultdis)){

                            echo "<option  value='".$dis[0]."'>".$dis[1]."</option>";
                            
                            
                          }
                        }
                       
                          echo "</select>";
                      ?>
                         <br><br>
                      
                            </select>

                    <span class=" fa fa-file-text-o"></span>
                    <span class="aplabel">Results</span>
                    <input name="dresults" type="text" class="apdesc" style="margin-left:44px;width:250px;"/>
              
                    <br><br>
           
                   <span class=" fa fa-question-circle-o"></span>
                   <span class="aplabel">Not Found Disease?</span>
                   <a id="addDisease" class="md-col-offset-4 btn btn-default btn-lg" style="margin-left:10;">
                    <span class="glyphicon glyphicon-plus-sign"></span> DISEASE</a>
                  <br><br>
                  
                  <span class=" fa fa-plus-square"></span>
                  <span class="aplabel">Add Patient Test?</span>
                  <a id="addTests" class="md-col-offset-4 btn btn-default btn-lg" style="margin-left:30px;">   
                     <span class="glyphicon glyphicon-plus-sign"></span> TEST 
                 </a>
                  
                  
                                                                      
                     
                       
        </div>
                
                  
                    <div class="col-md-6 test">
               

                  
                <span class=" fa fa-wrench"></span><span class="aplabel">Test Name</span><input name="tName" type="text" class="apdesc"  style="margin-left:35px"/>
                     <br><br>
                 <span class=" fa fa-search"></span><span class="aplabel">Test Interpretation</span><input name="tInt" type="text" class="apdesc"  style="margin-left:10px; width:165px;"/>
                     <br><br>
                  <span class=" fa fa-calendar"></span><span class="aplabel">Test Date</span><input name="tDate" type="date" class="apdesc" style="margin-left:45px"/>
                     <br><br>
                 <span class=" fa fa-clock-o"></span><span class="aplabel">Test Time</span><input name="tTime" type="time" class="apdesc" style="margin-left:45px"/>
                    <br><br> 
                <span class=" fa fa-rouble"></span><span class="aplabel">Test Price</span><input name="tPrice" type="text" class="apdesc"  style="margin-left:35px"/>
                    <br><br>
                  <span class=" fa fa-money"></span><span class="aplabel">Price Paid</span><input name="tPaid" type="text" class="apdesc"  style="margin-left:35px"/>
                    <br><br>
                 
              </div>
                  
                    
                  
                  
              <!-- button submit-->

        <div class="col-md-12 sub" >
                <button class = "btn btn-primary" id="submit" onclick="verify();"  name="create" > SUBMIT</button>
        </div>
          
                </form>  

    <div id="modalDisease" class="modal col-md-6 col-md-offset-4">
           
         <div class="modal-content dismod id=dis">
                <span class="close1">&times;</span>
         
                  <div class="col-md-6 addDis">
                      
                    <form action="addDis.php" method="post">            
                        <span class=" fa fa-credit-card"></span><span class="aplabel">Disease Name</span><input  name="newDisname" id="newDisname" type="text" class="apdesc" style="margin-left:45px"/>
                                <br><br>
                        <span class=" fa fa-bed"></span><span class="aplabel">Disease Desc</span><input name="newDisdes" id="newDisdes" type="text" class="apdesc"  style="margin-left:35px;"/>
                                <br><br>
                        <button class = "btn btn-default" id="disadd" style="margin-left:28%;height:40px;width:100px;"  name="disadd" > ADD</button>
                    </form> 
                 </div>          
       </div>
                          
    </div>


                      

            </div> <!--end of form div-->
 </div>
<div id="myModal" class="modal col-md-5 col-md-offset-4">

  <!-- Modal content -->
  <div class="modal-content">
<span class="close">&times;</span>
    
	<h1 class="text-center" style="margin-top:30px;">Are you sure you want to logout?</h1>
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
     
         $(".in").hide();
         $(".out").hide();
         $(".disease").hide();
         $(".test").hide();
         $(".newdis").hide();
    
        modDis();//modal of discharge
     
         
     $('#patientType').on('change', function() {
         
             var value = $(this).val();
             $(".in").hide();
             $(".out").hide();
             $(".disease").show(1000);
             $("#submit").hide();
         
                if(value== "in"){
                    $(".in").show(1000);

                    $(".out").hide();
                    $("#submit").show();
                }else if(value == "out"){
                    $(".out").show(1000);

                    $(".in").hide();
                    $("#submit").show();
                    document.getElementById("outPaid").value = 500;

                }else{
                  $(".in").hide();
                  $(".out").hide(); 
                  $(".disease").hide();
                  $("#submit").hide();

                }

             
             
             
             
        });
         
         
     $("#addTests").click(function(){  
           
         $(".test").show(1000);
         
    }); 
          
         
         
         
     $("#addbot").click(function(){  
           
         $(".newdis").show(1000);
         
      }); 
                            
 
         
 $(document).ready(function(){
     
    $("#login").click(function(){  
           
        $(".modal").hide();
         
   });
         
      
});
      
      
    
});
    
    

    
   
    
    
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

    var dat1 = document.getElementById('admissDate').value;
                var date1 = new Date(dat1)//converts string to date object
               
                var dat2 = document.getElementById('disDate').value;
                var date2 = new Date(dat2)
                
                var x = document.getElementById('disDate').value;
                console.log(x); 

                var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                var diffDays = Math.abs((date1.getTime() - date2.getTime()) / (oneDay));
               
                console.log(diffDays);
                document.getElementById("pMount").value *= diffDays;

}

function checkRoomType(type){
  
  document.getElementById("chrt").value =-1;
    
          if(type==-1){

          <?php
          echo"
          $('.opward').hide()
          $('.opsemi').hide()
          $('.oppri').hide()
          ";
          ?>
          }else if(type=="Ward"){

          $('.opsemi').hide()
          $('.oppri').hide()

          <?php
                  $hey = "Ward";  
                  $queryroom = "SELECT * FROM rooms WHERE room_type = '$hey' && occupants < 8";
                  $resultroom = mysqli_query($conn,$queryroom);
                  while($row = mysqli_fetch_assoc($resultroom)){

                    echo "

                    $('#opward'+".$row['room_number'].").show() ";


                  }

          ?>

          }else if(type=="Semi-Private"){




          $('.opward').hide()
          $('.oppri').hide()

          <?php
                  $hey = "semi private";
                  $queryroom = "SELECT * FROM rooms WHERE room_type = '$hey' && occupants < 4";
                  $resultroom = mysqli_query($conn,$queryroom);
                  while($row = mysqli_fetch_assoc($resultroom)){

                    echo "


                    $('#opsemi'+".$row['room_number'].").show()
                    ";


                    }

          ?>

          }else if(type=="Private"){


          $('.opsemi').hide()
          $('.opward').hide()

          <?php
                  $hey = "Private";
                  $queryroom = "SELECT * FROM rooms WHERE room_type = '$hey' && occupants < 1";
                  $resultroom = mysqli_query($conn,$queryroom);
                  while($row = mysqli_fetch_assoc($resultroom)){

                    echo "

                    $('#oppri'+".$row['room_number'].").show()

                    ";


                  }

          ?>

     }
}

    
function modDis(){
    
        var modaldis = document.getElementById('modalDisease');
        var btndis = document.getElementById("addDisease");
        var spandis = document.getElementsByClassName("close1")[0];

        btndis.onclick = function() {
            modaldis.style.display = "block";

        }

        spandis.onclick = function() {
            modaldis.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modaldis) {
                modaldis.style.display = "none";
            }
        }
}



   
  
</script>