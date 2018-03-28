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
$sql="SELECT `doc_Fname`,`doc_Lname`, `doctor_id` FROM doctors WHERE username='$username'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

$_SESSION["doc_id"] = $row["doctor_id"];
$did = $_SESSION["doc_id"];

$sql2="SELECT date_format(orderDate,'%M') AS orderMonth,COUNT(*) AS orderCount FROM orders WHERE 
YEAR(orderDate)=2005 GROUP BY orderMonth ORDER BY MONTH(orderDate)";
$result2=mysqli_query($conn,$sql2);




?>



<html>
<head>
    
<title>UC Med | Charts</title>
<link rel = 'stylesheet' href='css/bootstrap.min.css'>
<link id="css" rel="stylesheet" type="text/css" href="css/homes.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<script src="js/jquery.min.js"></script>    
<link rel=icon href="img/ucmed.png" /> 

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
            <div id = "bb" >
                <a href="#" id="link">
                <div class="active navheight"><span>&nbsp&nbsp</span><p class="glyphicon glyphicon-folder-open centertext"></p> &nbsp CHARTS</div></a>
                
                <a href="patientz.php" id="link"><div class="navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-list-alt centertext"></p>&nbsp PATIENTS </div></a>
                
                <a href="npatient.php" id="link"><div class="navheight"> <span>&nbsp</span> <p class="fa fa-user-plus centertext"></p>&nbsp New PATIENTS </div></a>
                
                <a href="discharge.php" id="link">
                <div class="navheight"><span>&nbsp&nbsp</span><p class="glyphicon glyphicon-export centertext"></p> &nbsp DISCHARGE</div></a>
                
                 <a id="myBtn1" id="link"  ><div class=" navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-log-out centertext"></p>&nbsp LOG OUT</div></a>
        
                     
            </div>        
        </div>
    </div>
</div>
<!--MODAL-->

<div id="myModal" class="modal col-md-5 col-md-offset-4">

  <!-- Modal content -->
    <div class="modal-content  ">
        <span class="close">&times;</span>
    
        <h1 class="text-center">Are you sure you want to logout?</h1>
        
        <a id="login"  href="#" class="btn btn-danger btn-lg" style="margin-left:35%;margin-right:5%;">
            
              <span class="glyphicon glyphicon-log-in"></span>   NO
        </a>

        <a id="logout" href="logout.php" class="btn btn-success btn-lg">
            
              <span class="glyphicon glyphicon-log-out"></span>   YES
        </a>
    
  </div>
    
</div>    

    
    
        <?php
                echo "<div class='col-md-offset-5'>
               <h1> Doctor $row[doc_Fname] $row[doc_Lname] </h1></div>";


         ?>

<!-- high charts-->
    <div class="col-md-7 col-md-offset-3 content" id="content">
        
        <div id="container"></div>

    </div>
      <br><br>
    <div class="col-md-7 col-md-offset-3 content" id="content">
        
        <div id="container1"></div>

    </div>
    <br><br>
    <br><br>
    
    <div class="col-md-7 col-md-offset-3 content" id="content">
        
        <div id="container2"></div>

    </div>
    
    



 
    
</body>
</html>


<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src='code/highcharts.js'></script>
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
    

    /*highcharts JS*/
    Highcharts.chart("container",
{
     chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Patient Visit'
        },
        subtitle: {
            text: ' '
        },
        xAxis: {
            categories: [
                <?php
                
                    $sql= "SELECT date_format(diagnose_date,'%M') AS month, COUNT(*) as patients 
FROM diagnosis
GROUP BY month
ORDER BY month "
;

                    $ret= mysqli_query($conn,$sql);
                
                    while($row = mysqli_fetch_assoc($ret)){
                        echo("'".$row["month"]."'".",");
                    }
                
                ?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: ' '
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Patient Visits per Month',
            data: [<?php
                
                    $sql= "SELECT date_format(diagnose_date,'%M') AS month, COUNT(*) as patients FROM diagnosis   GROUP BY month ORDER BY month";


                    $ret= mysqli_query($conn,$sql);
                
                    while($row = mysqli_fetch_assoc($ret)){
                        echo($row["patients"].",");
                    }
                
                ?>]

        }]

});
    
       
    Highcharts.chart("container1",
{
     chart: {
            
            type: 'line',
            marginRight: 130,
            marginBottom: 25
        },
        title: {
            text: 'Disease Graph',
            x: -20 //center
        },
        xAxis: {
            categories: [<?php
                
                    $sql= "SELECT diseases.disease_name as mostdis, patient_id as patient FROM diagnosis JOIN diseases ON diseases.disease_id = diagnosis.disease_id GROUP BY mostdis"
;

                    $ret= mysqli_query($conn,$sql);
                
                        while($row = mysqli_fetch_assoc($ret)){
                            echo("'".$row["mostdis"]."'".",");
                    }
                
                ?>]
        },
        yAxis: {
            title: {
                text: 'Number of patients'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -10,
            y: 100,
            borderWidth: 0
        },
        series: [{
            name: 'Disease',
            data: [<?php
                
                    $sql= "SELECT diseases.disease_name as mostdis, patient_id as patient FROM diagnosis JOIN diseases ON diseases.disease_id = diagnosis.disease_id GROUP BY mostdis"
;

                    $ret= mysqli_query($conn,$sql);
                
                        while($row = mysqli_fetch_assoc($ret)){
                            echo($row["patient"].",");
                    }
                
                ?>]
        }]

});


    Highcharts.chart("container2",
{
          chart: {
            type: 'column'
        },
        title: {
            text: 'Doctor 2018 profit'
        },
        subtitle: {
            text: ' '
        },
        xAxis: {
            categories: [
                <?php
                
                    $sql= "SELECT date_format(d.diagnose_date,'%M')as month,   SUM(paid_amount) as total FROM diagnosis d GROUP BY month ORDER BY month ASC;"
;

                    $ret= mysqli_query($conn,$sql);
                
                    while($row = mysqli_fetch_assoc($ret)){
                        echo("'".$row["month"]."'".",");
                    }
                
                ?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: ' '
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Year 2018',
            data: [<?php
                
                   $sql= "SELECT date_format(d.diagnose_date,'%M')as month,   SUM(paid_amount) as total FROM diagnosis d GROUP BY month ORDER BY month ASC;"
;

                    $ret= mysqli_query($conn,$sql);
                
                    while($row = mysqli_fetch_assoc($ret)){
                        echo($row["total"].",");
                    }
                
                ?>]

        }]

});
</script>