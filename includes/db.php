<?php 
 
 
$db_servername='localhost';
$db_user='root';
$db_pass='';
$db_name='test';

$connection=mysqli_connect($db_servername,$db_user,$db_pass,$db_name);
if(!$connection)
    {
        die("connection failed:" .mysqli_connect_error());
    }
    // echo "connection successfully";
?>