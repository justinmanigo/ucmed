<!DOCTYPE HTML>
<?php

    require("connect.php");
    session_start();

if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }

 //$username = mysqli_real_escape_string($conn,$username);
$username = $_SESSION['username'];
$sql="SELECT `doc_Fname` FROM doctors WHERE username='$username'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);


$sql2="SELECT date_format(orderDate,'%M') AS orderMonth,COUNT(*) AS orderCount FROM orders WHERE 
YEAR(orderDate)=2005 GROUP BY orderMonth ORDER BY MONTH(orderDate)";
$result2=mysqli_query($conn,$sql2);




?>



<html>
<head>
<title>UC Med | Charts</title>
<link rel = 'stylesheet' href='css/bootstrap.min.css'>

<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery-3.2.1.min.js"></script> 
<title> HOME </title>
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
	background: #000000;
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

    
    
<div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


 

    
    




 
    
</body>

</html>



<script src='code/highcharts.js'></script>
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
    
} 
</script>