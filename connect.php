<?php
    $conn = mysqli_connect("localhost", "root", "","ucmed");

    if(!$conn){
        echo "Error connecting to database";
        exit();
    }

?>