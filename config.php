<?php
$HOSTNAME='localhost';
$USERNAME="root";
$PASSWORD='';
$DATABASE='reglog';

$con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

if(!$con){
    echo("connection failed");
}

else{
    echo("");
}
?>