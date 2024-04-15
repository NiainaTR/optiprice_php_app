<?php
    
    $servername = "localhost";
    $dbusername = "root";
    $dbpwd = "";
    $dbname = "optiprice";

    $conn = mysqli_connect($servername , $dbusername , $dbpwd , $dbname);
    
    if(!$conn){
        die("Connection Failed ! ".mysqli_connect_error());
    }
    
?>