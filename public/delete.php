<?php 
session_start();
$user=$_SESSION['idUser'];
require('../config/db.php');
require('../config/config.php');
// $_SESSION['username']
if($_SESSION['username']==''){
    header('location:login.php');
}

        $delete_id=$_GET['idPost'];
        $sql1="DELETE FROM posts WHERE idPost='$delete_id' AND idUser='$user'";
        $query1=mysqli_query($conn,$sql1);
        if($query1){
            header('Location:http://localhost/php/public/member.php'); 
     
        }
 
    //  else if($_GET['idUser'] !=''){
        // $delete_user=$_GET['idUser'];
        // $sqlu="DELETE FROM users WHERE idUser='$delete_user'";
    
        // $queryu=mysqli_query($conn,$sqlu);
        // if($queryu){
        //     header('Location:http://localhost/php/public/admin.php'); 
     
        // }
    // }
   
    // else if( $_GET['idPostList']=''){
        //
    $delete_post=$_GET['idPostList'];
    $sqll="DELETE FROM posts WHERE idPost='$delete_post'";

    $queryl=mysqli_query($conn,$sqll);
    if($queryl){
        header('Location:http://localhost/php/public/list_post.php'); 
 
    }
    // }
  
    

?>