<?php
    require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }


////////


if(isset($_POST['create'])){
    
        $did = $_SESSION["doc_id"];
       
       $date = date("Y-m-d", strtotime($_POST['bday']));
     
		  $query = "INSERT INTO patients VALUES (NULL,'".$_POST['fname']."','".$_POST['lname']."','".$_POST['contact']."','".$_POST['address']."','".$_POST['gender']."','".$date."','".$_POST['civilStatus']."','".$_POST['patientType']."')";
		  
		  mysqli_query($conn, $query);
		//  $querynum = "UPDATE obstetrical_history SET no_of_fatal_deaths = '".$num."' WHERE mother_id = ".$_GET['pid'];
                 // $updateterm = mysqli_query($sql, $querynum);
    
        
       $getPID="SELECT patient_id FROM patients ORDER BY patient_id DESC LIMIT 1";
        
        $result=mysqli_query($conn,$getPID);
        $row = mysqli_fetch_row($result);
        $pid= $row[0];
    
    //echo "<script type='text/javascript'>alert('$pid');</script>";
    
        /*TEST*/
        $tstName =( $_POST['tName'] == "") ? "NULL" : "'".$_POST['tName']."'";
        $tstResult = ($_POST['tResult'] == "") ? "NULL" : "'".$_POST['tResult']."'";
    
        //insert values from form
        $queryTest="INSERT INTO tests VALUES (NULL,".$tstName.",".$tstResult.")";
         mysqli_query($conn, $queryTest);
    
        //fetch test ID
        $getTestID= "SELECT test_id FROM tests ORDER BY test_id DESC LIMIT 1";
        $result5=  mysqli_query($conn, $getTestID);
        $row5= mysqli_fetch_row($result5);
        $tid= $row5[0];
        
        
        /*room*/
        $rmNumber = ($_POST['rNumber'] == "") ? "NULL" : "'".$_POST['rNumber']."'";
        $rmType = ($_POST['rType'] == "") ? "NULL" : "'".$_POST['rType']."'";
        $queryRoom="INSERT INTO rooms VALUES(NULL,".$rmType.",".$rmNumber.")";
        mysqli_query($conn,$queryRoom);
    
    
        $tstDate =( $_POST['tDate'] == "") ? "NULL" : "'".$_POST['tDate']."'";
        /*inpaitent*/
        $admDate = ($_POST['adDate'] == "") ? "NULL" : "'".$_POST['adDate']."'";
        $iPaidAmt = ($_POST['inPaidAmount'] == "") ? "NULL" : "'".$_POST['inPaidAmount']."'";
        $dischDate = ($_POST['disDate'] == "") ? "NULL" : "'".$_POST['disDate']."'";
        $admResults = ($_POST['adResults'] == "") ? "NULL" : "'".$_POST['adResults']."'";
        
        
        /*disease*/
        $dName =( $_POST['dName'] == "") ? "NULL" : "'".$_POST['dName']."'";
        $dDesc =( $_POST['dDesc'] == "") ? "NULL" : "'".$_POST['dDesc']."'";
        $dTreat =( $_POST['dTreat'] == "") ? "NULL" : "'".$_POST['dTreat']."'";
        
    
        //insert disease ID
        $querydis="INSERT INTO diseases VALUES(NULL,".$dName.",".$dDesc.",".$dTreat.")";
        mysqli_query($conn, $querydis);
    
        //fetch disease ID
        $getDisId= "SELECT disease_id FROM diseases ORDER BY disease_id DESC LIMIT 1";
        $result3= mysqli_query($conn, $getDisId);
        $row3= mysqli_fetch_row($result3);
        $disid= $row3[0];
    
//echo "<script type='text/javascript'>alert('$disid');</script>";
        /*out-consultation*/
    
        $conResult = ($_POST['cResult'] == "") ? "NULL" : "'".$_POST['cResult']."'";
        $oPaidAmount = ($_POST['outPaidAmount'] == "") ? "NULL" : "'".$_POST['outPaidAmount']."'";
        $conDate = ($_POST['cDate'] == "") ? "NULL" : "'".$_POST['cDate']."'";
        
        $queryOut="INSERT INTO out_patients VALUES(NULL,".$conDate.",".$conResult.",".$oPaidAmount.",".$pid.")";
        mysqli_query($conn,$queryOut);
        $getOutId= "SELECT out_id FROM out_patients ORDER BY out_id DESC LIMIT 1";
    
        $result4=mysqli_query($conn,$getOutId);
        $row4 = mysqli_fetch_row($result4);
        $oid= $row4[0];
    
        $querydiagnosis= "INSERT INTO diagnosis VALUES(NULL,".$pid.",".$did.",".$disid.",".$dTreat.")";
        mysqli_query($conn,$querydiagnosis);
        
    /*    $queryIn = "INSERT INTO in_patients VALUES (NULL, ".$admResults.", ".$admDate.", ".$dischDate.",".$iPaidAmt.", "..", ".$deliverytype.", ".$largebaby.", ".$diabetes.")";*/
        /*
        inserting obs history
           
           $queryobs = "INSERT INTO obstetrical_history VALUES (NULL, ".$id.", ".$alivechildren.", ".$livingchildren.",".$abortions.", ".$fataldeaths.", ".$deliverytype.", ".$largebaby.", ".$diabetes.")";
            $result3 = mysqli_query($sql, $queryobs);
           
            $alivechildren = ($_POST['alivechildren'] == "") ? "NULL" : "'".$_POST['alivechildren']."'";
            $livingchildren = ($_POST['livingchildren'] == "") ? "NULL" : "'".$_POST['livingchildren']."'";
            $abortions = ($_POST['abortions'] == "") ? "NULL" : "'".$_POST['abortions']."'"; 
            $fataldeaths = ($_POST['fataldeaths'] == "") ? "NULL" : "'".$_POST['fataldeaths']."'";
            $deliverytype = ($_POST['deliverytype'] == "") ? "NULL" : "'".$_POST['deliverytype']."'";
            $largebaby = ($_POST['largebaby'] == "") ? "NULL" : "'".$_POST['largebaby']."'";
            $diabetes = ($_POST['diabetes'] == "") ? "NULL" : "'".$_POST['diabetes']."'";
            */
       // $queryDiagnosis= "INSER INTO diagnosis VALUES (NULL,'".$result."','".$did."','""','""')";
           // mysqli_query($conn,$queryDiagnosis);
    
}
    
/*
     if(isset($_POST['fname']) && isset($_POST['lname'])){
       
       $dob = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
       $date = date("Y-m-d", strtotime($dob));
        $querypatient = "INSERT INTO patients VALUES (NULL, '".$_POST['fname']."', '".$_POST['lname']."', ".$_POST['contact'].", ".$_POST['gender'].", '".$dob."', '".$_POST['civilStatus']."', '".$_POST['patientType']."')";
        mysqli_query($conn, $querypatient);
     }*/
        /*
        if($result1){
          //getting id
            $queryid = "SELECT MAX(mother_id) FROM mother";
            $res = mysqli_query(  $sql, $queryid);
            $row = mysqli_fetch_row($res);
            $id = $row[0];

             //inserting med history
            $hospitalization = ($_POST['hospitalization'] == "") ? "NULL" : "'".$_POST['hospitalization']."'";
            $complication = ($_POST['complication'] == "") ? "NULL" : "'".$_POST['complication']."'";
            $illness = ($_POST['illness'] == "") ? "NULL" : "'".$_POST['illness']."'";
           
              $querymed = "INSERT INTO medical_history VALUES (NULL, ".$hospitalization.", ".$complication.", ".$id.",".$illness.")";
              $result2 = mysqli_query($sql, $querymed);     
           
           //inserting obs history
           
            $alivechildren = ($_POST['alivechildren'] == "") ? "NULL" : "'".$_POST['alivechildren']."'";
            $livingchildren = ($_POST['livingchildren'] == "") ? "NULL" : "'".$_POST['livingchildren']."'";
            $abortions = ($_POST['abortions'] == "") ? "NULL" : "'".$_POST['abortions']."'"; 
            $fataldeaths = ($_POST['fataldeaths'] == "") ? "NULL" : "'".$_POST['fataldeaths']."'";
            $deliverytype = ($_POST['deliverytype'] == "") ? "NULL" : "'".$_POST['deliverytype']."'";
            $largebaby = ($_POST['largebaby'] == "") ? "NULL" : "'".$_POST['largebaby']."'";
            $diabetes = ($_POST['diabetes'] == "") ? "NULL" : "'".$_POST['diabetes']."'";


           
            $queryobs = "INSERT INTO obstetrical_history VALUES (NULL, ".$id.", ".$alivechildren.", ".$livingchildren.",".$abortions.", ".$fataldeaths.", ".$deliverytype.", ".$largebaby.", ".$diabetes.")";
            $result3 = mysqli_query($sql, $queryobs);  
            //inserting pregnanancy termination
            if(isset($_POST['time'])){
                $dateterm = date("Y-m-d", strtotime($_POST['dateterm']));
                $dateterm = "'".$dateterm."'";
                //$time = date("H:i", strtotime($_POST['time']));
                $time = "'".$_POST['time']."'";
                $weight = $_POST['weight'];
                $deliveryplace = "'".$_POST['deliveryplace']."'";
                $deliveredby = "'".$_POST['deliveredby']."'";

                $queryterm = "INSERT INTO pregnancy_termination VALUES (NULL, ".$dateterm.",".$time.",".$weight.",".$deliveryplace.",".$deliveredby.", ".$id.")";
                $result4 = mysqli_query($sql, $queryterm); 
                 $querynum = "UPDATE obstetrical_history SET no_of_fatal_deaths = '".$num."' WHERE mother_id = ".$_GET['pid'];
                  $updateterm = mysqli_query($sql, $querynum);
            }

           if($result3 || $result4){
            $message = "Successfully added patient!";
           echo "<script type='text/javascript'>alert('".$message."')
              window.location.href = 'patients.php';</script>";
          }
        }*/
    
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
                
              <form method="POST" action="npatient.php">
              <div class="col-md-offset-0 box1">                
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">First Name</span><input name="fname" id="fname" type="text" class="apdesc"  style="margin-left:40px" autocomplete="off"/>
                     <br><br>
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">Last Name</span><input  name="lname"  id="lname" type="text"   class="apdesc" style="margin-left:40px" autocomplete="off"/>
                     <br><br>
					 <span class="glyphicon glyphicon-user"></span><span class="aplabel">Contact</span><input name="contact"  id="contact" type="text"  class="apdesc" style="margin-left:60px" autocomplete="off"/>
                     <br><br>
                     <span class="fa fa-birthday-cake"></span><span class = "aplabel">Date of Birth</span>
                  <input name="bday"  id="bday" type="date"  class="apdesc" style="margin-left:25px" autocomplete="off"/>
                 
                          
                            
                    <br><br>

                    <span class="fa fa-home"></span><span class="aplabel">Address</span><input  id="adress" name="address" type="text" class="apdesc" style="margin-left:57.5px" autocomplete="off"/>
                    <br><br>
					
					<span class="fa fa-user-circle"></span><span class="aplabel">Gender</span>
                  <select   name="gender" id="dob-day" style="margin-left:50px" >
                              <option value="-1">-choose-</option>
							  <option value="male">Male</option>
							  <option value="female">Female</option>
							  <option value="others">Others</option>
							  </select>
                    <br><br>
					
					<span class="fa fa-heartbeat"></span><span class = "aplabel">Civil Status</span>
                          
                            <select   name="civilStatus" id="civilStatus" style="margin-left:25px" >
                              <option value="-1">-choose-</option>
							  <option value="single">Single</option>
							  <option value="married">Married</option>
							  <option value="widowed">Widowed</option>
							  </select>
                    <br><br>	
                    
                    <span class="fa fa-file-powerpoint-o"></span><span class = "aplabel">PatientType</span>
                          
                            <select  name="patientType" id="patientType" style="margin-left:25px" >
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
                       
                       <br><br>
                       <a id="addDisease" class="btn btn-default btn-lg">
                           <span class="glyphicon glyphicon-plus-sign"></span> DISEASE
                       </a>
                       
                       
                       <div id="modalDisease" class="modal col-md-6 col-md-offset-4">

                      <!-- Modal content -->
                      <div class="modal-content dis id=addis">
                    <span class="close">&times;</span>
                        
                          
                            <div class="col-md-6 addDis">
                      <!--new disease form-->
                            <form action="addDis.php" method="post">            
                            <span class=" fa fa-credit-card"></span><span class="aplabel">Disease Name</span><input  name="newDisname" id="newDisname" type="text" class="apdesc" style="margin-left:45px"/>
                         <br><br>
                     <span class=" fa fa-bed"></span><span class="aplabel">Disease Desc</span><input name="newDisdes" id="newDisdes" type="text" class="apdesc"  style="margin-left:35px;"/>
                     <br><br>
                      <span class=" fa fa-bed"></span><span class="aplabel">Treatment</span><input name="newDistreat" id="newDistreat" type="text" class="apdesc" style="margin-left:45px;"/>
                            
                    
                        <span id="add" onclick=adddis()  name="add" style="margin-left:80px;margin-top:20px;" class="btn btn-default btn-lg">
                           <span class="glyphicon glyphicon-plus-sign"></span> ADD
                       </span>  
                            
                       
                        
                                
                               </form> 
                          </div>
                        
                      </div>
                          
                      </div>
                       
              
                 
                 
              </div>
                    
                   <!--box 1 in -->  
                  
                  <div class="col-md-6 in">
                      
                        <span class="fa fa-calendar"></span><span class = "aplabel">Admission Date</span>
                  <input name="adDate"  id="adDate" type="date"  class="apdesc" style="margin-left:15px" autocomplete="off"/>
               <br><br>
                
                      
                     
                      <span class=" fa fa-bed"></span><span class="aplabel">Room Type</span>
                      
                      
                      <select id='op1' name="rType" style="margin-left:35px" onchange="checkRoomType(this.value)">
							<option value="-1"></option>
							<option value="Ward">Ward</option>
							<option value="Semi-Private">Semi-Private</option>
							<option value="Private">Private</option>
					  </select>
                        
                              
                         <br><br>
                      
                      <form action="save.php" method="POST" id="formRoomResult">
      
                      <input type="hidden" id="roomResult2" name="roomResult2" value="Semi-Private">
    
                      </form>
                      
                      
                      
                      
                      
                      <span class=" fa fa-credit-card"></span><span class="aplabel">Paid Amount</span><input id="pMount" value=0 disabled name="inPaidAmount" type="text" class="apdesc" style="margin-left:45px"/>
                         <br><br>
                      
                      
                      
                      
                      <span class=" fa fa-bed"></span><span class="aplabel">Room number</span>
                      <select id='op1' name="rType" style="margin-left:35px">
                          <?php 
                      session_start();
                      $rum = $_SESSION["rumRes"];
                      $queryroom = "SELECT * FROM rooms WHERE room_type = 'semi private'";
                      
                      $resultroom = mysqli_query($conn,$queryroom);
                       "<script type='text/javascript'>alert('$queryroom');</script>";
                      if(isset($resultroom)){

                        echo "<script type='text/javascript'>alert(naai sud);</script>";

                      }else{

                        echo "<script type='text/javascript'>alert(wa sud);</script>";
                      }
                      while($row = mysqli_fetch_assoc($resultroom)){

                        echo "<option value='".$row["room_number"]."'>".$row["room_number"]."</option>";
                        
                      }

                      ?>
                   <!-- <option value="Ward">Ward</option>
                      <option value="Semi-Private">Semi-Private</option>
                      <option value="Private">Private</option> -->
                    </select>
                      
                      
                      
                      <br><br>
                      
                      
                      
                       <span class="fa fa-calendar"></span><span class = "aplabel">Discharge Date</span>
                  <input name="disDate"  id="disDate" type="date"  class="apdesc" style="margin-left:25px" autocomplete="off"/>
                       <br><br>
                       <span class="fa fa-hospital-o"></span><span class="aplabel"> Admission Results </span><input name="adResults" type="text" class="apdesc" style="margin-left:30px;width:300px;" />
                 
                 
              </div>
                  
                  <!--box 1 test -->  
                  
                  <div class="col-md-6 out">
                      
                    <span class="fa fa-calendar"></span><span class = "aplabel">Consultation Date</span>
                    <input name="cDate"  id="contact" type="date"  class="apdesc" style="margin-left:0px" autocomplete="off"/>
                 <br><br>
                       <span class=" fa fa-credit-card"></span><span class="aplabel">Paid Amount</span><input name="outPaidAmount" type="text" class="apdesc" placeholder="Specify" style="margin-left:35px"/>
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
         
         modex();
         modDis();
     
     $(".in").hide();
     $(".out").hide();
       //  $(".disease").hide();
         //$(".box2").hide();
         $("#submit").hide();
         
    
       
         
         $('#patientType').on('change', function() {
             var value = $(this).val();
       
            if(value== "in"){
                $(".in").show();
                $(".disease").show();
                $(".out").hide();
                $("#submit").show();
            }else if(value == "out"){
                $(".out").show();
                $(".disease").show();
                $(".in").hide();
                $("#submit").show();
                
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
    
    
    
    function adddis(){
        
        
        
        var adddisname=document.getElementById("newDisname");
        var adddisdesc=document.getElementById("newDisdes");
        var adddistreat=document.getElementById("newDistreat");
        var add=document.getElementById("add");
        add.submit();
     //document.getElementById('add').style.display='none';
        
       /* $("#add").click(function(){
            $("#modalDisease").hide;
            
        }*/
        
         //$("#modalDisease").hide;
        
        
        alert("hellow");
        
        
        
        
        
        
        
        
        
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
function modDis(){
var modaldis = document.getElementById('modalDisease');
var btndis = document.getElementById("addDisease");
var spandis = document.getElementsByClassName("close")[0];

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
    
    /*modal logout button function*/   
function modex()
{
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
}

    function checkRoomType(type)
{
	var data = 20;
  console.log(data);
	if(type==-1){
	
	document.getElementById("pMount").value = " ";
	
	}else if(type=="Ward"){
	
	document.getElementById("pMount").value = 20;
	
	}else if(type=="Semi-Private"){
	
	document.getElementById("pMount").value = 30;
	
	}else if(type=="Private"){
	
	document.getElementById("pMount").value = 40;
	
	}

  console.log("asd");
  document.getElementById("roomResult2").value = type;  
  var check =  document.getElementById("roomResult2").value;
  console.log(check);
  $("#formRoomResult").submit();
  


}

  
</script>