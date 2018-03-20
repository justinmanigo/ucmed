<!DOCTYPE HTML>
<?php

    require("connect.php");


?>




<html>
<head>
<link rel = 'stylesheet' href='css/bootstrap.min.css'>
<link  rel="stylesheet" type="text/css" href="css/inx.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<link id="css" rel="stylesheet" type="text/css" href="">
 <link rel=icon href="img/ucmed.png" /> 
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<title> UC MED HOSPITAL</title>
</head>

<body onload="main();">
    <div class="row" id="fadetrans" hidden>
    <div class="container">
        <div class="row">
        
            <div class="col-md-offset-4  col-sm-offset-4">
                
            <img src="img/ucmed.png" id="logo">
            
            </div>
        </div>
    <div id="box">  </div>
    
    </div>
    
    <div class="container login">
        <div class="row">
        
            <div class="col-md-4 col-md-offset-4 col-sm-offset-4">
                
            <div class="login-block">
    <form  method="POST"  autocomplete="off" >
    <span class="glyphicon glyphicon-user"></span>
    <input type="text" placeholder="Username" id="username" name="username"  required/><br><br>
    <span class="glyphicon glyphicon-lock" ></span>
    <input type="password"  name="password" id="password" placeholder="Password" required/>
    <p id="create">Dont have account?<a id="su" onclick="reg()"> 
        Click here! </a></p> 
         <div class="col-md-4 col-md-offset-1 col-sm-offset-4">
    <button id="submit" type="submit" onclick="login();" class="btn btn-danger">Login</button>
        </div>
        
        <?php
        
			session_start();
                    
   /*     $var="justin";
                
        
        printf("%s",$var);*/
        
			if (isset($_POST['username'])){
    
			        // removes backslashes
				$username = stripslashes($_REQUEST['username']);  
			        //escapes special characters in a string
				$username = mysqli_real_escape_string($conn,$username);
				$password = stripslashes($_REQUEST['password']);
				$password = mysqli_real_escape_string($conn,$password);
				//Checking is user existing in the database or not
			        $query = "SELECT * FROM doctors WHERE username='$username'
			and password='$password'";
				$result = mysqli_query($conn,$query) or die(mysql_error());
				$rows = mysqli_num_rows($result);
             
            
                
                
			        if($rows==1){
				    $_SESSION['username'] = $username;
			            // Redirect user to index.php
				    header("Location:index.php");
                        $username = $_SESSION['username'];
			         }else{
				echo "<div class='form text-center'>
			<h3>Username/password is incorrect.</h3></div>";
				}
		    }?>
        </form>
    </div>
                
                      
            
            </div>
        </div>
    
    </div>
       
    
    
    
    
    <div class="container register" id="register">
        <div class="row">
        
            <div class="col-md-4 col-md-offset-4 reg">
            <h1 style="display:text-center">    Register</h1>
                
            <form method="POST" action="login.php">
              <div class="col-md-6 box1">                
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">First Name</span><input name="fname" type="text" class="apdesc" style="margin-left:40px" id="fname" autocomplete="off"/ required>
                     <br><br>
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">Last Name</span><input name="lname" type="text" class="apdesc" style="margin-left:40px"  id="lname" autocomplete="off"/ required>
                     <br><br>
                     
                 

                    <span class="fa fa-envelope"></span><span class="aplabel">EMAIL</span><input name="email" id="email" type="text" class="apdesc" style="margin-left:57.5px" autocomplete="off"/ required>
                    <br><br>
					
                  <span class="fa fa-address-card"></span><span class="aplabel">User Name</span><input name="uname" id="uname" type="text" class="apdesc" style="margin-left:57.5px" autocomplete="off"/ required>
                    <br><br>
                  
                  <span class="fa fa-lock"></span><span class="aplabel">Password</span><input name="pass" type="password" class="apdesc"  id="pass" style="margin-left:57.5px" autocomplete="off"/ required>
                    <br><br>
                  <span class="fa fa-lock"></span><span class="aplabel">Verify Password</span><input name="pass-repeat" id="rpass" type="password" class="apdesc" style="margin-left:57.5px" autocomplete="off"/ required>
                    <br><br>
					
                   
                  
              </div>

          
              
         

              

                <div class="col-md-8 col-md-offset-1 sub">
<button class = "btn btn-primary" style="height:47px;width:40%;margin-top:-10px !important;margin-bottom:15px;margin-left: 50%;" name="create" onclick="verify();"> SUBMIT</button>
               </div>
              
              
                
                <?php
                
                
                if(isset($_POST['create'])){
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        
        $user = mysqli_real_escape_string($conn, $_POST['uname']);
             
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        
        $rpass = mysqli_real_escape_string($conn, $_POST['pass-repeat']);
        /*$pass = md5(mysqli_real_escape_string($conn, $_POST['pass']));*/
        
    //        $sql  = "INSERT INTO doctor(`firstname`)
    //        VALUES('".$fname."')";
        
                   

        
        $sql  = " INSERT INTO doctors(`doc_Fname`, `doc_Lname`, `email`, `username`, `password`) VALUES ('{$fname}','{$lname}','{$email}','{$user}','{$pass}')";
            mysqli_query($conn,$sql);
                }

                
               
                ?>
    
</form>
            
            </div>
        </div>
    
    </div>
    
    
    

    
    
</body>
</html>




<script src="js/jquery-3.2.1.min.js"></script>
<script>
    
    

    
    

function reg()
{

document.getElementById("css").href="css/inx.css";
	
}
    
 $(document).ready(function(){
     
     $(".register").hide();
     
    
       $("#su").click(function(){  
           
         $(".login").hide();
           $("#logo").hide();    
         $(".register").show();
     });
    
 });
    
function login(){
         var username=document.getElementById("username").value;
     var password=document.getElementById("password").value;
    
 if(username == " " || password == " "){
     alert("please enter text");
     //document.getElementById(username).style.boxShadow="red";
 }
    }
function verify()
{
    var fname=document.getElementById("fname").value;
    var lname=document.getElementById("lname").value;
    var uname=document.getElementById("uname").value;
    var email=document.getElementById("email").value;
    var pass=document.getElementById("pass").value;
    var rpass=document.getElementById("rpass").value;
    var username=document.getElementById("username").value;
     var password=document.getElementById("password").value;

   
    
 if(fname == " "){
    
      alert("Please enter  first name");
 }else if(lname == " "){
     alert("Please enter  last name");
 }else if(uname == " "){
     alert("Please enter  user name");
 }else if(pass == " "){
     alert("Please enter  password");
 }else if(rpass == " "){
     alert("Please confirm password");
 }else if(email.indexOf('@')== -1 ){
		 alert("email must valid! ");
		 retval=false;
 }else 
    
    return true;
    
}

function main()
{
	$("#fadetrans").fadeIn(2000);
}
    
</script>