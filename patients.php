<!DOCTYPE HTML>
<?php

    require("connect.php");
    session_start();

if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }

 //$username = mysqli_real_escape_string($conn,$username);
/*$username = $_SESSION['username'];
$sql="SELECT `firstname` FROM doctor WHERE username='$username'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);*/




?>



<html>
<head>
<link rel = 'stylesheet' href='css/bootstrap.min.css'>
<link id="css" rel="stylesheet" type="text/css" href="css/patient.css">
<script src="js/jquery-3.2.1.min.js"></script> 
<link rel="stylesheet" type="text/css"href="css/datatables.min.css"/>
     <link rel="stylesheet" type="text/css" href="css/style.css"/>
<title>UC Med | Patients</title>
<style>
  .dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 200px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {   
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-size: 25px;
    
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
    
       /*-----------------------------Side Bar-----------------------------*/
.sidebar{
	background: #263648;
	height: 100%;
	padding-top: 1em;
	padding-left: 1em;
    margin-top: 3em;
	position: fixed;
	top:4em;
	box-shadow: 1px 0 0 #1e2c3a;
    width: 22em;
	
}

.sidebar-outer {
    position: relative;
    margin-left: -0.4em;
}

.info{
	margin-top: -4em;
	margin-left: 5.5em;
	text-align: left;
}


#link{
	text-decoration: none;
	
}

#link div{
	padding-top: 1.5em;
	padding-bottom: 1em;
	margin-left: 0.12em;
	width:15em;
	color: white;
}

#link:hover div{
	background-color: #808080;
	transition: 0.5s;
	color: white;	
	opacity: 1.0;
	width: -50em;

}

.active{
	background-color:#ff4d4d!important;
	color: white!important;
}

#bb{
	margin-left: -10px;
	border-style: solid white 0.5px;
}
.navheight{
	height: 150px;
	font-size: 20px;
	font-family: century gothic;
}

.centertext{
	margin-top: 22px;
}
    
    
    </style>
</head>

<body>
    
 <div class="container-fluid header">
        <div class="row">
        
            <div class="  col-sm-offset-0">
                
            <h2> <img src="img/logo.png" id="logo">  
                
     
        
        
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
                        <a href="npatient.php" id="link">
                         <div class="navheight"><span>&nbsp&nbsp</span><p class="glyphicon glyphicon-folder-open centertext"></p> &nbsp NEW PATIENT</div></a>
                       
                       

                    </div>
                    
                </div>
            </div>
    
    
    
</div>
    
    

    <div class="col-md-offset-3 col-md-8 content" id="content">
                <div class = "tab">
                
                <table class=" table table-bordered " id="patienttable">
                    <thead>
                    <th class="tie text-center">ID</th>
                    <th class="tie text-center">Name</th>
                    <th class="tie text-center">Gender</th>
                    <th class="tie text-center">Civil Status</th>
                    </thead>
                    <tbody>
                    <?php
                        
                        $sql="SELECT patient_id,patient_Fname, patient_Lname, gender FROM patients";
                        $result = mysqli_query($conn,$sql);
                      

                        if($result){
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                echo "<td class=' desc text-center'>$row[0]</td>";
                                echo "<td class = ' desc'>$row[2], $row[1]</td>";
                                echo "<td class=' desc text-center'>$row[3]</td>";
                                echo "<td class='desc text-center'>";
                                echo "<a href='updatePatient.php?pid=".$row[0]."'> <button class='btn btn-default neutral' id='butt'> Update </button></a> ";
                                echo "<a href='viewPatient.php?pid=".$row[0]."'><button class='btn btn-default success' id='view'> <p class='glyphicon glyphicon-eye-open' style='font-family:Champagne-&-Limousines;'></p> &nbsp&nbsp&nbsp View </button></a> ";
                                echo "</td>";
                                echo "</tr>";

                            }
                        }
                    ?>
                </tbody>
                </table>
                 </div>



            
            </div>
    
    

 
    
</body>

</html>


<script src="js/jquery.min.js"></script>
<script src="js/datatables.min.js"></script>

<script>


    
    $(document).ready(function(){

      $("#patienttable").DataTable({
       "pagingType": "full_numbers"
      });

    });

</script>