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
<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css"/>
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
                
                <a href="npatient.php" id="link"><div class="navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-user centertext"></p>&nbsp New PATIENTS </div></a>
                
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
    echo "<div class='col-md-offset-6'>
			<h3> WELCOME Doctor $row[doc_Fname] $row[doc_Lname] ID: $did </h3></div>";
   
    
    ?>
    
<!--charts-->
    <div class="col-md-7 col-md-offset-3 content" id="content">
        <div id="container"></div>

    </div>
    
    <div class="col-md-7 col-md-offset-3 content" id="content">
        <div id="container1"></div>

    </div>
    
    <div class="col-md-7 col-md-offset-3 content" id="content">
        <div id="container"></div>

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
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Quantity'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Enrollments',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

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
            text: 'Monthly Average Temperature',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: WorldClimate.com',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                    this.x +': '+ this.y +'°C';
            }
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
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: 'New York',
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
        }, {
            name: 'Berlin',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
        }, {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]

});
</script>