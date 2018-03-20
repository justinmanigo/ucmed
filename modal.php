<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

    
</head>


<body>
    
<div class=' col-md-offset-11  '>
	<a id="myBtn1" class="btn btn-warning btn-lg">
          <span class="glyphicon glyphicon-gift"></span> Inventory
        </a>
	
		</div>



    		
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
<span class="close">&times;</span>
	<h1>modal</h1>
	
  </div>
	
  </div>
  

</body>
</html>




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
    
  
</script>