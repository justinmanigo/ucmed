 <?php
                                
                               
              require("connect.php");
        session_start();
                                
                
                                
            //$newDis = ($_POST['newDisname'] == "") ? "NULL" : //"'".$_POST['newDisname']."'"; 
           // $newDisdes = ($_POST['newDisdes'] == "") ? "NULL" /: "'".$_POST['newDisdes']."'";  
           // $newDistreat = ($_POST['newDistreat'] == "") ? //"NULL" : "'".$_POST['newDistreat']."'"; 
                    

                       
    $insertdis="INSERT INTO diseases VALUES(NULL,'".$_POST['newDisname']."','".$_POST['newDisdes']."','".$_POST['newDistreat']."')";
    $resultz = mysqli_query($conn,$insertdis);   
                              
                                
                                
          if($resutz)         {
              
              echo "<script type='text/javascript'>alert('sud');</script>";
              
          }else{
              
              echo "<script type='text/javascript'>alert('wala');</script>";
              
          }        
                            
                          
                                
                                
                                
                                
     ?>






 