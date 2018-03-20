<!DOCTYPE HTML>
<?php
  $conn = mysqli_connect("localhost", "root","","world");

  if(!$conn){ //if conn === false

  	echo "Fail to connect to database!";
  	exit();


  }

 ?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
</head>

	
     <div class="col-md-10 content" id="content">
                <div class = "tab">
                <div class="row">
                    <div class="col-md-offset-10 topsearch">
                        <a href ="addpatient.php"><button class = "btn btn-primary"> + new patient</button></a>
                        <form id = "ser" method="POST" action="searchresultprod.php" autocomplete="off" required>
                            
                        </form>
                    </div>
                </div>
                <table class=" table table-bordered " id="patienttable">
                    <thead>
                    <th class="tie text-center">city</th>
                    <th class="tie text-center">Ccode</th>
                    <th class="tie text-center">District</th>
                    <th class="tie text-center">population</th>
                    </thead>
                    <tbody>
                    <?php
                        $result = mysqli_query($sql, "SELECT Name, CountryCOde, District, Population FROM city");

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
    
    
</html>


<script src="js/jquery.min.js"></script>
<script src="js/datatables.min.js"></script>

<script>

    $('.caret').dropdown();

</script>