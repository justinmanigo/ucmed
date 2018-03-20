<?php
    require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }


////////
    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['day'])){
       
       $dob = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
       $date = date("Y-m-d", strtotime($dob));
        $querymom = "INSERT INTO mother VALUES (NULL, '".$_POST['address']."', '".$_POST['husband']."', ".$_POST['height'].", ".$_POST['gravida'].", '".$_POST['fname']."', '".$_POST['lname']."', '".$date."')";
        $result1 = mysqli_query($sql, $querymom);
        
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
        }
    }
?>
<html>
<head>
    <title>Patients | Talamban Health Center</title>
    <link rel="stylesheet" type="text/css" href="cs/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="cs/font-awesome.min.css"/>
    <link rel="icon" href="img/favicon.ico"/>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <style>
        

    </style>
</head>

<body>
    <div id="wrapper">
        <div class="row topbar">
            <div class="col-md-12 bar">
                <div class="col-md-2 logo">
                    <a href="#"><center><img class="bbm" src="img/.png"></center></a>
                </div>
                <div class="col-md-offset-1 toplabel">
                    <p>NEW PATIENT</p>  
                </div>
                <div class="col-md-offset-11 topicons">
                    <a href="#" onclick="goBack()"><span class="glyphicon glyphicon-circle-arrow-left cog"></span></a>
                    <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span></a> 
                </div>      
            </div>
        </div>

        <div class="row whole">
            <div class="col-md-2 sidebar-outer">
                <div class="sidebar col-md-2">
                    <div id = "bb" >
                        <a href="index.php" id="link">
                         <div class="navheight"><span>&nbsp&nbsp</span><p class="glyphicon glyphicon-folder-open centertext"></p> &nbsp CHARTS</div></a>
                        <a href="patients.php" id="link"><div class="active navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-list-alt centertext"></p>&nbsp PATIENTS </div></a>
                       <a href="newpatient.php"  id="link"><div class="navheight"> <span>&nbsp</span> <p class="glyphicon glyphicon-shopping-cart centertext"></p>&nbsp NEW PATIENTS</div></a>
                        
                        
                    </div>
                    
                </div>
            </div>

            <div class="col-md-10 content" id="content">
              <form method="POST" action="addpatient.php">
              <div class="col-md-6 box1">                
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">First Name</span><input name="fname" type="text" class="apdesc" style="margin-left:40px" autocomplete="off"/>
                     <br><br>
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">Last Name</span><input name="lname" type="text" class="apdesc" style="margin-left:40px" autocomplete="off"/>
                     <br><br>
                     <span class="fa fa-birthday-cake"></span><span class = "aplabel">Date of Birth</span>
                          
                            <select name="day" id="dob-day">
                              <option value="">Day</option>
                              <option value="">---</option>
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                              <option value="31">31</option>
                            </select>
                            <select name="month" id="dob-month">
                              <option value="">Month</option>
                              <option value="">-----</option>
                              <option value="01">January</option>
                              <option value="02">February</option>
                              <option value="03">March</option>
                              <option value="04">April</option>
                              <option value="05">May</option>
                              <option value="06">June</option>
                              <option value="07">July</option>
                              <option value="08">August</option>
                              <option value="09">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                            </select>
                            <select name="year" id="dob-year">
                              <option value="">Year</option>
                              <option value="">----</option>
                              <option value="2012">2012</option>
                              <option value="2011">2011</option>
                              <option value="2010">2010</option>
                              <option value="2009">2009</option>
                              <option value="2008">2008</option>
                              <option value="2007">2007</option>
                              <option value="2006">2006</option>
                              <option value="2005">2005</option>
                              <option value="2004">2004</option>
                              <option value="2003">2003</option>
                              <option value="2002">2002</option>
                              <option value="2001">2001</option>
                              <option value="2000">2000</option>
                              <option value="1999">1999</option>
                              <option value="1998">1998</option>
                              <option value="1997">1997</option>
                              <option value="1996">1996</option>
                              <option value="1995">1995</option>
                              <option value="1994">1994</option>
                              <option value="1993">1993</option>
                              <option value="1992">1992</option>
                              <option value="1991">1991</option>
                              <option value="1990">1990</option>
                              <option value="1989">1989</option>
                              <option value="1988">1988</option>
                              <option value="1987">1987</option>
                              <option value="1986">1986</option>
                              <option value="1985">1985</option>
                              <option value="1984">1984</option>
                              <option value="1983">1983</option>
                              <option value="1982">1982</option>
                              <option value="1981">1981</option>
                              <option value="1980">1980</option>
                              <option value="1979">1979</option>
                              <option value="1978">1978</option>
                              <option value="1977">1977</option>
                              <option value="1976">1976</option>
                              <option value="1975">1975</option>
                              <option value="1974">1974</option>
                              <option value="1973">1973</option>
                              <option value="1972">1972</option>
                              <option value="1971">1971</option>
                              <option value="1970">1970</option>
                              <option value="1969">1969</option>
                              <option value="1968">1968</option>
                              <option value="1967">1967</option>
                              <option value="1966">1966</option>
                              <option value="1965">1965</option>
                              <option value="1964">1964</option>
                              <option value="1963">1963</option>
                              <option value="1962">1962</option>
                              <option value="1961">1961</option>
                              <option value="1960">1960</option>
                              <option value="1959">1959</option>
                              <option value="1958">1958</option>
                              <option value="1957">1957</option>
                              <option value="1956">1956</option>
                              <option value="1955">1955</option>
                              <option value="1954">1954</option>
                              <option value="1953">1953</option>
                              <option value="1952">1952</option>
                              <option value="1951">1951</option>
                              <option value="1950">1950</option>
                              <option value="1949">1949</option>
                              <option value="1948">1948</option>
                              <option value="1947">1947</option>
                              <option value="1946">1946</option>
                              <option value="1945">1945</option>
                              <option value="1944">1944</option>
                              <option value="1943">1943</option>
                              <option value="1942">1942</option>
                              <option value="1941">1941</option>
                              <option value="1940">1940</option>
                              <option value="1939">1939</option>
                              <option value="1938">1938</option>
                              <option value="1937">1937</option>
                              <option value="1936">1936</option>
                              <option value="1935">1935</option>
                              <option value="1934">1934</option>
                              <option value="1933">1933</option>
                              <option value="1932">1932</option>
                              <option value="1931">1931</option>
                              <option value="1930">1930</option>
                              <option value="1929">1929</option>
                              <option value="1928">1928</option>
                              <option value="1927">1927</option>
                              <option value="1926">1926</option>
                              <option value="1925">1925</option>
                              <option value="1924">1924</option>
                              <option value="1923">1923</option>
                              <option value="1922">1922</option>
                              <option value="1921">1921</option>
                              <option value="1920">1920</option>
                              <option value="1919">1919</option>
                              <option value="1918">1918</option>
                              <option value="1917">1917</option>
                              <option value="1916">1916</option>
                              <option value="1915">1915</option>
                              <option value="1914">1914</option>
                              <option value="1913">1913</option>
                              <option value="1912">1912</option>
                              <option value="1911">1911</option>
                              <option value="1910">1910</option>
                              <option value="1909">1909</option>
                              <option value="1908">1908</option>
                              <option value="1907">1907</option>
                              <option value="1906">1906</option>
                              <option value="1905">1905</option>
                              <option value="1904">1904</option>
                              <option value="1903">1903</option>
                              <option value="1901">1901</option>
                              <option value="1900">1900</option>
                            </select>
                    <br><br>

                    <span class="fa fa-home"></span><span class="aplabel">Address</span><input name="address" type="text" class="apdesc" style="margin-left:57.5px" autocomplete="off"/>
                    <br><br>
					
					<span class="fa fa-home"></span><span class="aplabel">Gender</span><input name="Gender" type="text" class="apdesc" style="margin-left:57.5px" autocomplete="off"/>
                    <br><br>
					
					<span class="fa fa-birthday-cake"></span><span class = "aplabel">PatientType</span>
                          
                            <select name="CivilStatus" id="dob-day">
                              <option value="">Civil Status</option>
							  <option value="">Single</option>
							  <option value="">Married</option>
							  <option value="">Widowed</option>
							  </select>
                    <br><br>	
                    
                    <span class="fa fa-birthday-cake"></span><span class = "aplabel">PatientType</span>
                          
                            <select name="PatientType" id="dob-day">
                              <option value="">Patient Type</option>
							  <option value="">In Patient</option>
							  <option value="">Out Patient</option>
							  </select>
                    <br><br>
                   
                  
              </div>

              <div class="col-md-6 box3">
                
                  <span class="fa fa-child"></span><span class="aplabel">number of children born alive</span><input name="alivechildren" type="number" class="apdesc2" value='0' style="margin-left:62px"/>
                  <br><br>
                  <span class="fa fa-group"></span><span class="aplabel">number of living children</span><input type="number" name="livingchildren" class="apdesc2" value='0' style="margin-left:84px"/>
                  <br><br>
                  <span class="glyphicon glyphicon-remove"></span><span class="aplabel">number of abortions</span><input type="number" name="abortions" class="apdesc2" value='0' style="margin-left:115px"/>
                  <br><br>
                  <span class="fa fa-heart"></span><span class="aplabel">number of fatal deaths</span><input type="number" name="fataldeaths" class="apdesc2"  value='0'style="margin-left:100px"/>
                  <br><br>
                  <span class="fa fa-h-square"></span><span class="aplabel">last delivery type</span>
                  <select id='op1' name="deliverytype">
                    <option value=""></option>
                    <option value="Cesarian">Cesarian</option>
                    <option value="Normal">Normal</option>
                  </select>

                  <br><br>
                  <span class="fa fa-qq"></span><span class="aplabel">large baby history(8lbs)</span><input name="largebaby" type="number" class="apdesc2" value='0' style="margin-left:100px"/>
                  <br><br>
                  <span class="fa fa-stethoscope"></span><span class="aplabel">diabetes history</span>
                  <select id="op" name="diabetes">
                    <option value="None">None</option>
                    <option value="Yes">Yes</option>
                  </select>
                  <br><br>
                
              </div>
              
              <div class="col-md-5 box2">
                 
                    <span class="fa fa-hospital-o"></span><span class="aplabel">Previous hospitilization</span><input name="hospitalization" type="text" class="apdesc" style="margin-left:45px" />
                     <br><br>
                     <span class=" fa fa-bed"></span><span class="aplabel">Previous preg complication</span><input name="complication" type="text" class="apdesc" placeholder="Specify" style="margin-left:35px"/>
                     <br><br>
                      <span class=" fa fa-thermometer"></span><span class="aplabel">Previous illness</span><input name="illness" type="text" class="apdesc" style="margin-left:35px"/>
                 
              </div>

              <div class="col-md-5 box4">
                <h3>PREGNANCY TERMINATION</h3> 
                    <span class="fa fa-hospital-o" ></span><span class="aplabel">Time</span><input type="time" name="time" class="apdesc" style="margin-left:90px;width:100px;"/>
                    <span class="fa fa-hospital-o"></span><span class="aplabel" style="margin-left:10px">Date</span><input type="date" name="dateterm" class="apdesc" style="margin-left:10px;width:140px;"/>
                      <br><br>
                     <span class=" fa fa-bed"></span><span class="aplabel">Birthweight</span><input type="number" class="apdesc2" name="weight" style="margin-left:44px"/>&nbsp g
                      <br><br>
                      <span class=" fa fa-thermometer"></span><span class="aplabel">Place of Delivery</span><input name="deliveryplace" type="text" class="apdesc" style="margin-left:20px"/>
                      <br><br>S
                       <span class=" fa fa-thermometer"></span><span class="aplabel">Delivered by</span><input name="deliveredby" type="text" class="apdesc" style="margin-left:48px"/>
              </div>

                <div class="col-md-8 sub">
                <button class = "btn btn-primary" style="float:right;height:47px;width:20%;margin-top:-15px !important;margin-bottom:15px;margin-right: 190;" > SUBMIT</button>
               </div>
              
              
                </form>     

            </div>
        </div>

    </div>
</body>
</html>

<script>
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
</script>