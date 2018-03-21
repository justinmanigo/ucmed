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
                       <a href="#"  id="link"><div class="active navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-user centertext"></p>&nbsp NEW PATIENTS</div></a>
                         <a id="myBtn1" id="link"  ><div class=" navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-log-out centertext"></p>&nbsp LOG OUT</div></a>
                        
                        
                        
                    </div>
                    
                </div>
            </div>

            <div class="col-md-10 content" id="content">
             
                
                <?php 
                
                echo "<div>
                 <h2 class='col-md-offset-3' id='name'>Hello Doctor</h2>
                </div>";
                
                ?>
                
              <form method="POST" action="newSave.php" id="formSample">
              <div class="col-md-offset-0 box1">                
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">First Name</span><input name="fname" id="fname" type="text" class="apdesc"  required style="margin-left:40px" autocomplete="off"/>
                     <br><br>
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">Last Name</span><input  name="lname"  id="lname" type="text"  required class="apdesc" style="margin-left:40px" autocomplete="off"/>
                     <br><br>
					 <span class="glyphicon glyphicon-user"></span><span class="aplabel">Contact</span><input name="contact"  id="contact" type="text"  class="apdesc" style="margin-left:60px" autocomplete="off"/>
                     <br><br>
                     <span class="fa fa-birthday-cake"></span><span class = "aplabel">Date of Birth</span>
                  <input name="bday"  id="bday" type="date"  class="apdesc" required  style="margin-left:25px" autocomplete="off"/>
                 
                          
                            
                    <br><br>

                    <span class="fa fa-home"></span><span class="aplabel">Address</span><input id="adress" name="address" type="text" class="apdesc" style="margin-left:57.5px" autocomplete="off"/>
                    <br><br>
					
					<span class="fa fa-user-circle"></span><span class="aplabel">Gender</span>
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
                    
                    <span class="fa fa-file-powerpoint-o"></span><span class = "aplabel">PatientType</span>
                          
                            <select required name="patientType" id="patientType" style="margin-left:25px" >
                              <option value="-1">-choose-</option>
							  <option  value="in">In Patient</option>
							  <option  value="out">Out Patient</option>
							  </select>
                    <br><br>
                   
                  
              </div>
                  
                  
                  
                      
                 
                  
               
                  
                    <!--disease-->
                  
                   <div class="col-md-6 disease">
                      
                        
                
                      <span class=" fa fa-credit-card"></span><span class="aplabel">Disease Name</span><input name="dName" type="text" class="apdesc" style="margin-left:45px"/>
                         <br><br>
                     <span class=" fa fa-bed"></span><span class="aplabel">Disease Status</span><input name="dDesc" type="text" class="apdesc"  style="margin-left:35px;"/>
                     <br><br>
                      <span class=" fa fa-bed"></span><span class="aplabel">Treatment</span><input name="dTreat" type="text" class="apdesc" style="margin-left:45px;"/>
                       
              
                 
                 
              </div>
                    
                   <!--box 1 in -->  
                  
                  <div class="col-md-6 in">
                      
                        <span class="fa fa-calendar"></span><span class = "aplabel">Admission Date</span>
                  <input name="adDate"  id="adDate" type="date"  class="apdesc" style="margin-left:15px" autocomplete="off"/>
               <br><br>
                <span class=" fa fa-bed"></span><span class="aplabel">Room Type</span>
					 
         
            <select id='crType' name="rType" style="margin-left:35px" onchange="checkRoomType(this.value)">
							<option value="-1"></option>
							<option value="Ward">Ward</option>
							<option value="Semi-Private">Semi-Private</option>
							<option value="Private">Private</option>
					  </select>

                              <br><br>

                     
                      <span class=" fa fa-credit-card"></span><span class="aplabel">Paid Amount</span><input  id="pMount" value=0 name="inPaidAmount" type="text" class="apdesc" style="margin-left:45px"/>
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
                      <!-- <?php 
                      session_start();
                      $rum = $_SESSION['name'];
                      $hey = "Private";
                      $queryroom = "SELECT * FROM rooms WHERE room_type='$hey'";
                      
                      $resultroom = mysqli_query($conn,$queryroom);

                     
                     

                      while($row = mysqli_fetch_assoc($resultroom)){


                        echo "<option value='".$row["room_number"]."'>".$row["room_number"]."</option>";
                        

                      }


                      ?> -->
                  
                    </select>
                     <br><br>
                      
                       <span class="fa fa-calendar"></span><span class = "aplabel">Discharge Date</span>
                  <input name="disDate"  id="disDate" type="date"  class="apdesc" style="margin-left:15px" autocomplete="off"/>
                       <br><br>
                       <span class="fa fa-hospital-o"></span><span class="aplabel"> Admission Results </span><input name="adResults" type="text" class="apdesc" style="margin-left:30px;width:300px;" />
                 
                 
              </div>
                  
                  <!--box 1 test -->  
                  
                  <div class="col-md-6 out">
                      
                    <span class="fa fa-calendar"></span><span class = "aplabel">Consultation Date</span>
                    <input name="cDate"  id="contact" type="date"  class="apdesc" style="margin-left:0px" autocomplete="off"/>
                 <br><br>
                       <span class=" fa fa-credit-card"></span><span class="aplabel">Paid Amount</span><input id ="outPaid" name="outPaidAmount" type="text" class="apdesc" placeholder="Specify" style="margin-left:35px"/>
                     <br><br>
                      
                      
                    <span class="fa fa-hospital-o"></span><span class="aplabel">Consultation Results </span><input name="cResult" type="text" class="apdesc" style="margin-left:45px" />
                     <br><br>
                    
                       
                    
              </div>
                  
                  
                   <!--box test-->
               
                   <div class="col-md-6 box2">
               
                    <span class="fa fa-hospital-o"></span><span class="aplabel">Test Name</span><input name="tName" type="text" class="apdesc" style="margin-left:45px" />
                     <br><br>
                     <span class=" fa fa-bed"></span><span class="aplabel">Test Result</span><input name="tResult" type="text" class="apdesc"  style="margin-left:35px"/>
                     <br><br>
                      <span class=" fa fa-calendar"></span><span class="aplabel">Test Date</span><input name="tDate" type="date" class="apdesc" style="margin-left:45px"/>
                 
              </div>
                  
                  
              
                 
                  
                  <!--box out-->
                  
                

              <!-- button submit-->

                <div class="col-md-12 sub" >
                <button class = "btn btn-primary" id="submit" onclick="verify();"  name="create" > SUBMIT</button>
               </div>
              
                
              
                </form>     

            </div>
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
    
    
     $(document).ready(function(){
     
     $(".in").hide();
     $(".out").hide();
         $(".disease").hide();
         $(".box2").hide();
         $("#submit").hide();
         
    
       
         
         $('#patientType').on('change', function() {
             var value = $(this).val();
       
            if(value== "in"){
                $(".in").show(1000);
                $(".disease").show(1000);
                $(".out").hide();
                $("#submit").show();
            }else if(value == "out"){
                $(".out").show();
                $(".disease").show();
                $(".in").hide();
                $("#submit").show();
                document.getElementById("outPaid").value = 500;
                
            }else {
              $(".in").hide();
              $(".out").hide(); 
                $(".disease").hide();
                $("#submit").hide();
            }
        });
         
         
         
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

function checkRoomType(type)
{
	
  document.getElementById("chrt").value =-1;
	if(type==-1){
	
	document.getElementById("pMount").value =0;

	<?php
  echo"
  $('.opward').hide()
  $('.opsemi').hide()
  $('.oppri').hide()
  ";
  ?>
	}else if(type=="Ward"){
	
	document.getElementById("pMount").value =20;
  console.log(document.getElementById("pMount").value);
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
  


	
	document.getElementById("pMount").value =30;
  console.log(document.getElementById("pMount").value);
  $('.opward').hide()
  $('.oppri').hide()

  <?php
  $hey = "Semi-Private";
  $queryroom = "SELECT * FROM rooms WHERE room_type = '$hey' && occupants < 4";
  $resultroom = mysqli_query($conn,$queryroom);
  while($row = mysqli_fetch_assoc($resultroom)){

    echo "

    $('#opsemi'+".$row['room_number'].").show()

    ";
    

  }
  
  ?>
  
	}else if(type=="Private"){
	 
	document.getElementById("pMount").value =40;
  console.log(document.getElementById("pMount").value);
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