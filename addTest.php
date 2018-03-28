 <?php
                                
                               
        require("connect.php");
        session_start();
                                
                
                                
            //$newDis = ($_POST['newDisname'] == "") ? "NULL" : //"'".$_POST['newDisname']."'"; 
           // $newDisdes = ($_POST['newDisdes'] == "") ? "NULL" /: "'".$_POST['newDisdes']."'";  
           // $newDistreat = ($_POST['newDistreat'] == "") ? //"NULL" : "'".$_POST['newDistreat']."'"; 
                    

                       
    $inserttest="INSERT INTO tests VALUES(NULL,'".$_POST['newTestName']."','".$_POST['newTestDesc']."')";
    $resultz = mysqli_query($conn,$inserttest);   
                              
                                
                                
          if($resultz){
              
             $message = "New Test Successfully Added";
             echo "<script type='text/javascript'>alert('".$message."')
             window.location.href = 'npatient.php';</script>";
              
          }else{
              
              echo "<script type='text/javascript'>alert('wala');</script>";
              
          }        
                            
                          
                                
                                
                                
                                
     ?>






 