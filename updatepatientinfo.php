<?php
    require("connect.php");
    session_start();

        if(!isset($_SESSION['username'])){
            header("location:login.php");
            exit();
         }

    if(isset($_GET['pid'])){

        	$pid = $_GET['pid'];
            $querypatient = "SELECT * FROM patients WHERE patient_id =".$_GET['pid'];
            $result=mysqli_query($conn,$querypatient);
            $row=mysqli_fetch_assoc($result);  
            $date = strtotime($row['birthdate']);
            $dob = date("F d, Y", $date); 

        } 
?>


<html>
    
<head>
    <title>UpdateInfo | Talamban Health Center</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/npatient.css"/>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
    <link rel=icon href="img/ucmed.png"/> 
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  
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
                        <a href="patientz.php" id="link"><div class="active navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-list-alt centertext"></p>&nbsp PATIENTS </div></a>
                       <a href="npatient.php"  id="link"><div class="navheight"> <span>&nbsp</span> <p class="fa fa-user-plus centertext"></p>&nbsp NEW PATIENTS</div></a>
                        <a href="discharge.php" id="link">
                         <div class="navheight"><span>&nbsp&nbsp</span><p class="glyphicon glyphicon-export centertext"></p> &nbsp DISCHARGE</div></a>
                         <a id="myBtn1" id="link"  ><div class=" navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-log-out centertext"></p>&nbsp LOG OUT</div></a>
                        
                        
                        
                    </div>
                    
                </div>
            </div>

            <div class="col-md-10 content123" id="content">
             
                
             
                
              <form method="post" action="saveupdateptinfo.php">
             <div class="col-md-1 box11">                
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">Last Name</span>
      
                   <input name="lname"  id="lname" type="text"  class="apdesc" value=" <?php echo $row['patient_Lname']?> " style="margin-left:20px" autocomplete="off"/>
             
                <br> <br>   
                <span class="glyphicon glyphicon-user"></span><span class="aplabel">First Name</span>
      
                   <input name="fname"  id="fname" type="text"  class="apdesc" value=" <?php echo $row['patient_Fname']?> " style="margin-left:20px" autocomplete="off"/>
                   <br><br>
                      <span class="fa fa-phone-square"></span><span class="aplabel">Contact:</span>
                   <input name="contact"  id="contact" type="text"  class="apdesc" value=" <?php echo $row['patient_contact']?> " style="margin-left:35px" autocomplete="off"/>
             <br> <br> 
              <span class="fa fa-birthday-cake"></span><span class = "aplabel">Date of Birth:</span>
              <input name="birthdate"  id="birthdate" type="date"  class="apdesc" value=" <?php echo $row['birthdate']?> " style="margin-left:10px" autocomplete="off"/>
                     <br><br>
              <span class="fa fa-home"></span><span class="aplabel">Adress:</span>
                   <input name="address"  id="address" type="text"  class="apdesc" value=" <?php echo $row['address']?> " style="margin-left:45px" autocomplete="off"/>
             <br> <br> 
             <span class="fa fa-venus-mars"></span><span class="aplabel">Gender</span>
                  <select name="gender" id="dob-day" required style="margin-left:50px" >
                <option value="-1">-choose-</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
                </select>

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
             <span class="fa fa-arrows-v"></span><span class="aplabel">Height(cm):</span>
           <input name="height"  id="height" type="text"  class="apdesc" value=" <?php echo $row['patient_height']?> " style="margin-left:30px" autocomplete="off"/>
             <br> <br>
             <span class="fa fa-tachometer"></span><span class="aplabel">Weight(kg):</span>
                 <input name="weight"  id="weight" type="text"  class="apdesc" value=" <?php echo $row['patient_weight']?> " style="margin-left:30px" autocomplete="off"/>
             <br> <br>   
             <input name = "pid" type="hidden" value ="<?php echo $pid ?>"

             <div class="col-md-7 col-md-offset-6 subb">
                <button class = "btn btn-success" id="submits" name="update" >UPDATE </button>
               </div>
          
              </form>

              </div>
              
            

                

                      

            </div> <!--form div-->
        </div>
    
 <div id="myModal" class="modal col-md-5 col-md-offset-4">

  <!-- Modal content -->
  <div class="modal-content">
<span class="close">&times;</span>
    
  <h1 class="text-center"  style="margin-top:30px;">Are you sure you want to logout?</h1>
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
     
     $(".in").hide();
     $(".out").hide();
         
         $(".test").hide();
   
         $(".newdis").hide();
    
  modDis();
        
         
         $('#patientType').on('change', function() {
             var value = $(this).val();
         $(".in").hide();
     $(".out").hide();
    
         
         $("#submit").hide();
            if(value== "in"){
                $(".in").show(1000);
                
                $(".out").hide();
                //$(".test").show(1000);
                $("#submit").show();
            }else if(value == "out"){
                $(".out").show(1000);
            
                $(".in").hide();
                //$(".test").show(1000);
                $("#submit").show();
                document.getElementById("outPaid").value = 500;
                
            }else {
              $(".in").hide();
              $(".out").hide(); 
           
                $("#submit").hide();
              
            }
             
             
             
             
             
        });
         $("#addTest").click(function(){  
           
         $(".test").show(1000);
         
          }
                            
    ); 
         
         
         
         
          $("#addbot").click(function(){  
           
         $(".newdis").show(1000);
         
          }
                            
    ); 
         
      
      
    
    });



    
$(document).ready(function(){
     
         $("#login").click(function(){  
           
         $(".modal").hide();
        

         
     });


         
      
    
});

function checkRoomType(type)
{
  
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

    $('#opward'+".$row['room_number'].").show()

    ";
    

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
    
    /*modal button function*/   


  

   
    

  
</script>