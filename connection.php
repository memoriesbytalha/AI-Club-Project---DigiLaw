<?php
$servername="localhost";
$username="root";
$password="";
$database_name="digitallaw"; 

//CREATE CONNECTION HERE:
$conn=mysqli_connect($servername, $username, $password, $database_name);//connection

//if()  else staemtes
if (!$conn){  //if($conn is succesful )
  die ("Connection failed" .mysqli_connect_error());
  //echo "Connection is successful"; //cout in c++ or printf in C or print in PYTHON
}

?>