 <?php
                                
                               
              require("connect.php");
        session_start();
                                
                
                                
            //$newDis = ($_POST['newDisname'] == "") ? "NULL" : //"'".$_POST['newDisname']."'"; 
           // $newDisdes = ($_POST['newDisdes'] == "") ? "NULL" /: "'".$_POST['newDisdes']."'";  
           // $newDistreat = ($_POST['newDistreat'] == "") ? //"NULL" : "'".$_POST['newDistreat']."'"; 
                    

                       
    $insertdis="INSERT INTO diseases VALUES(NULL,'".$_POST['newDisname']."','".$_POST['newDisdes']."')";
    $resultz = mysqli_query($conn,$insertdis);   
                              
                                
                                
          if($resultz){
              
              $message = "New Disease Successfully Added";
             echo "<script type='text/javascript'>alert('".$message."')
             window.location.href = 'index.php';</script>";
              
          }else{
              
              echo "<script type='text/javascript'>alert('wala');</script>";
              
          }        
                            
                          
                                
                                
                                
                                
     ?>






 