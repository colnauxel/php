<?php
session_start();
require('layout/header.php');
require('layout/menu_admin.php');
require('../config/db.php');

$msg=array();
$errors=array();
$idUser=$_SESSION['idUser'];
if(isset($_POST['post'])){
    $title=$_POST['title'];
    $description=$_POST['description'];
    $target="upload/".basename($_FILES['image']['name']);
 
    
    $image=$_FILES['image']['name'];//name image
    $sizeimage=$_FILES['image']['size'];// size image
    $errorimage=$_FILES['image']['error'];// size image
    if(empty($title)){
        array_push($errors,'Tiêu đề không được để trống');
    }
    if(empty($description)){
        array_push($errors,'Mô tả không được để trống');
    }
    if(empty($image)){
        array_push($errors,'Hình ảnh không được để trống');
    }
    if($errorimage != 0){
        array_push($errors,'Hình ảnh quá lớn');
    }
    if(count($errors)==0){
        
            $sql="INSERT INTO posts(titlePost,descriptionPost,imagePost,idUser) VALUES('$title','$description','$image','$idUser')";
            $query=mysqli_query($conn,$sql);
           
            move_uploaded_file($_FILES['image']['tmp_name'],$target);
                
            
            if($query){
                array_push($msg,'Đăng bài thành công');
            }else{
               
                array_push($errors,'Đăng bài Không thành công');
            }
    
           
    
    }
  
    
   
}

?>

<div class="container" id="form-login">
    <form class="form" action="" method="post"  enctype="multipart/form-data">
        <h3>Sản phẩm</h3>
        <?php require('layout/error.php')?>
        <div class="form-group">
            <label >Tiêu đề:</label>
            <input type="text" name="title" class="form-control" placeholder="Tiêu đề" >
        </div>
        <div class="form-group">
            <label>Mô tả:</label>
            <textarea class="form-control" rows="5" name="description" id="comment"></textarea>
        </div>
        <div class="form-group">
            <label >Hình đại diện:</label>
            <input type="file" name="image" class="form-control-file" >
        </div>
       <button type="submit" name="post" class="btn btn-primary">Đăng bài</button>
    </form>
</div>





<?php
require('layout/footer.php');
?>