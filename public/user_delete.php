<?php 
session_start();
require('../config/db.php');
// $_SESSION['username']

        $u=$_GET['user'];
        $sql_p="DELETE FROM posts WHERE idUser='$u'";
        $query_p=mysqli_query($conn,$sql_p);
        $sql="DELETE FROM users WHERE idUser='$u'";
        $query=mysqli_query($conn,$sql);
        
        if($query){
            header('Location:http://localhost/php/public/admin.php'); 
            
        }
 
    
    
       
?>