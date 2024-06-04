<?php
//stap 1 connectie via mysqli

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phples";

try{
    $conn = new mysqli($servername,$username,$password,$dbname);
}catch(Exception $e){        //als er een fout is dan wordt er een foutmelding gegeven
    $error = "fatal error" . $e->getMessage();
    die ($error);
}