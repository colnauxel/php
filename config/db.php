<?php
$local='localhost';
$username='root';
$password='';
$name_database='php';
//Create Connection
$conn=mysqli_connect($local,$username,$password,$name_database);

// Check Connection 
if(mysqli_connect_errno()){
    //Connection Failed 
    echo 'Connection Mysql Faild'.mysqli_connect_errno();
}