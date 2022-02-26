<?php 

$host = "localhost";
$username = "root";
$password = "";
$database = "myoffer";

$dbcon = mysqli_connect("$host", "$username", "$password", "$database");

if(!$dbcon){
    header("Location: ../error/dberror.php");
    die();
}






?>