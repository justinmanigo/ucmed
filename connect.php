<?php
    $conn = mysqli_connect("localhost", "root", "","ucmed_database");

    if(!$conn){
        echo "Error connecting to database";
        exit();
    }

?>