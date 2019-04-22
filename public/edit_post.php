<?php
session_start();
require('layout/header.php');
require('layout/member_navbar.php');
require('../config/db.php');

$msg=array();
$errors=array();

$idPost=$_GET['idPost'];

$sql1="SELECT * FROM  posts WHERE idPost='$idPost'";
$query1=mysqli_query($conn,$sql1);
$post=mysqli_fetch_assoc($query1);

if(isset($_POST['post'])){
    $title=$_POST['title'];
    $description=$_POST['description'];
    $target="upload/".basename($_FILES['image']['name']);

    $image=$_FILES['image']['name'];
    if(empty($title)){
        array_push($errors,'Tiêu đề không được để trống');
    }
    if(empty($description)){
        array_push($errors,'Mô tả không được để trống');
    }
    if(empty($image)){
        array_push($errors,'Hình ảnh không được để trống');
    }
    if(count($errors)==0){
      
        $sql="UPDATE posts SET titlePost='$title',descriptionPost='$description',imagePost='$image'
        WHERE idPost='$idPost'";
        $query=mysqli_query($conn,$sql);
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
            
        }
        if($query){
            array_push($msg,'Cập nhật thành công');
        }else{
           
            array_push($errors,'Cập nhật Không thành công');
        }

       

    }
}

?>

<div class="container" id="form-login">
    <form class="form" action="" method="post"  enctype="multipart/form-data">
        <h3>Đăng bài</h3>
        <?php require('layout/error.php')?>
        <div class="form-group">
            <label >Tiêu đề:</label>
            <input type="text" name="title" value="<?php echo $post['titlePost'];?>" class="form-control" placeholder="Tiêu đề" >
        </div>
        <div class="form-group">
            <label>Mô tả:</label>
            <textarea class="form-control" rows="5" name="description" id="comment" placeholder="Nhập mô tả"><?php echo $post['descriptionPost'];?></textarea>
        </div>
        <div class="form-group">
            <label >Hình đại diện:</label>
            <input type="file" name="image" class="form-control-file" >
        </div>
       <button type="submit" name="post" class="btn btn-primary">Lưu</button>
    </form>
</div>





<?php
require('layout/footer.php');
?>