  <div class="col-md-10 content" id="content">
              <form method="POST" action="npatient.php">
              <div class="col-md-1 box1">                
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">First Name</span><input name="fname" id="fname" type="text" class="apdesc"  required style="margin-left:40px" autocomplete="off"/>
                     <br><br>
                     <span class="glyphicon glyphicon-user"></span><span class="aplabel">Last Name</span><input name="lname"  id="lname" type="text"  required class="apdesc" style="margin-left:40px" autocomplete="off"/>
                     <br><br>
					 <span class="glyphicon glyphicon-user"></span><span class="aplabel">Contact</span><input name="contact"  id="contact" type="text"  class="apdesc" style="margin-left:60px" autocomplete="off"/>
                     <br><br>
                     <span class="fa fa-birthday-cake"></span><span class = "aplabel">Date of Birth</span>
                  <input name="bday"  id="bday" type="date"  class="apdesc" style="margin-left:25px" autocomplete="off"/>
                 
                          
                            
                    <br><br>

                    <span class="fa fa-home"></span><span class="aplabel">Address</span><input required id="adress" name="address" type="text" class="apdesc" style="margin-left:57.5px" autocomplete="off"/>
                    <br><br>
					
					<span class="fa fa-user-circle"></span><span class="aplabel">Gender</span>
                  <select  required name="gender" id="dob-day" style="margin-left:50px" >
                              <option value="-1">-choose-</option>
							  <option value="male">Male</option>
							  <option value="female">Female</option>
							  <option value="others">Others</option>
							  </select>
                    <br><br>
					
					<span class="fa fa-heartbeat"></span><span class = "aplabel">Civil Status</span>
                          
                            <select  required name="civilStatus" id="civilStatus" style="margin-left:25px" >
                              <option value="-1">-choose-</option>
							  <option value="single">Single</option>
							  <option value="married">Married</option>
							  <option value="widowed">Widowed</option>
							  </select>
                    <br><br>	
                    
                    <span class="fa fa-file-powerpoint-o"></span><span class = "aplabel">PatientType</span>
                          
                            <select required name="patientType" id="patientType" style="margin-left:25px" >
                              <option value="-1">-choose-</option>
							  <option  value="in">In Patient</option>
							  <option  value="out">Out Patient</option>
							  </select>
                    <br><br>
                   
                  
              </div>
                  
                  
                  
                      
                  <!--box test-->
               
                   <div class="col-md-6 box2">
               
                    <span class="fa fa-hospital-o"></span><span class="aplabel">Test Name</span><input name="tName" type="text" class="apdesc" style="margin-left:45px" />
                     <br><br>
                     <span class=" fa fa-bed"></span><span class="aplabel">Test Result</span><input name="tResult" type="text" class="apdesc"  style="margin-left:35px"/>
                     <br><br>
                      <span class=" fa fa-calendar"></span><span class="aplabel">Test Date</span><input name="tDate" type="date" class="apdesc" style="margin-left:45px"/>
                 
              </div>
                  
                <!--box 1 in -->  
                  
                  <div class="col-md-6 in">
                      
                        <span class="fa fa-calendar"></span><span class = "aplabel">Admission Date</span>
                  <input name="adDate"  id="adDate" type="date"  class="apdesc" style="margin-left:15px" autocomplete="off"/>
               <br><br>
                
                      <span class=" fa fa-credit-card"></span><span class="aplabel">Paid Amount</span><input name="inPaidAmount" type="text" class="apdesc" style="margin-left:45px"/>
                         <br><br>
                     <span class=" fa fa-bed"></span><span class="aplabel">Room number</span><input name="rNumber" type="text" class="apdesc" placeholder="Specify" style="margin-left:35px"/>
                     <br><br>
                      <span class=" fa fa-bed"></span><span class="aplabel">Room Type</span><input name="rType" type="text" class="apdesc" style="margin-left:45px"/>
                         <br><br>
                       <span class="fa fa-calendar"></span><span class = "aplabel">Discharge Date</span>
                  <input name="disDate"  id="disDate" type="date"  class="apdesc" style="margin-left:15px" autocomplete="off"/>
                       <br><br>
                       <span class="fa fa-hospital-o"></span><span class="aplabel"> Admission Results </span><input name="adResults" type="text" class="apdesc" style="margin-left:30px;width:300px;" />
                 
                 
              </div>
                  
                    <!--disease-->
                  
                   <div class="col-md-6 disease">
                      
                        
                
                      <span class=" fa fa-credit-card"></span><span class="aplabel">Disease Name</span><input name="dName" type="text" class="apdesc" style="margin-left:45px"/>
                         <br><br>
                     <span class=" fa fa-bed"></span><span class="aplabel">Disease Desc</span><input name="dDesc" type="text" class="apdesc"  style="margin-left:35px;height:50px;"/>
                     <br><br>
                      <span class=" fa fa-bed"></span><span class="aplabel">Treatment</span><input name="dTreat" type="text" class="apdesc" style="margin-left:45px;height:50px;"/>
                       
              
                 
                 
              </div>
                  
                  <!--box 1 test -->  
                  
                  <div class="col-md-6 out">
                      
                    <span class="fa fa-calendar"></span><span class = "aplabel">Consultation Date</span>
                    <input name="cDate"  id="contact" type="date"  class="apdesc" style="margin-left:0px" autocomplete="off"/>
                 <br><br>
                       <span class=" fa fa-credit-card"></span><span class="aplabel">Paid Amount</span><input name="outPaidAmount" type="text" class="apdesc" placeholder="Specify" style="margin-left:35px"/>
                     <br><br>
                      
                      
                    <span class="fa fa-hospital-o"></span><span class="aplabel">Consultation Results </span><input name="cResult" type="text" class="apdesc" style="margin-left:45px" />
                     <br><br>
                    
                       
                    
              </div>
                  
                  
                  