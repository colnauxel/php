<?php
session_start();
$_SESSION['type']='';
require('layout/header.php');
require('layout/menu_admin.php');
require('../config/db.php');
$errors=array();
$msg=array();
$username='';
if(isset($_POST['resgister'])){
    $username=($_POST['username']);
    $password=($_POST['password']);
    $password_comfirm=($_POST['password_confirm']);
    $fullname=($_POST['fullname']);
    $email=($_POST['email']);
    $address=($_POST['address']);
    $target="upload/".basename($_FILES['image']['name']);

    $image=$_FILES['image']['name'];//name image
    $sizeimage=$_FILES['image']['size'];// size image
    $typeimage=$_FILES['image']['type'];//type image
    if(empty($username)){
        array_push($errors,"Tài khoản không được bỏ trống");
    }
    if(empty($password)){
        array_push($errors,"Mật khẩu không được bỏ trống");
    }
    if($password!=$password_comfirm){
        array_push($errors,"Mật khẩu không trùng khớp");
    }
    if(empty($fullname)){
        array_push($errors,"Họ Tên không được bỏ trống");
    }
    if(empty($email)){
        array_push($errors,"Email không được bỏ trống");
    }
    if(empty($address)){
        array_push($errors,"Địa Chỉ không được bỏ trống");
    }
    if(empty($image)){
        array_push($errors,"Avatar không được bỏ trống");
    }
    
    if(count($errors)==0){
        $sql1="SELECT *FROM users WHERE userName='$username'";
        $query1=mysqli_query($conn,$sql1);
        if(mysqli_num_rows($query1)==1){
            array_push($errors,"Tai khoan da toi tai");
           
        }else{
           
            $password=md5($password);
            $sql2="INSERT INTO users(userName,passWord,fullName,email,address,avatar) VALUES ('$username','$password','$fullname','$email','$address','$image')";
            $query2=mysqli_query($conn,$sql2);
            move_uploaded_file($_FILES['image']['tmp_name'],$target);

            
            if($query2){
                array_push($msg,"Đăng kí thanh công");
            }else{
                array_push($msg,"Đăng kí thất bại");
            }
            // header('location:login.php');
        }
    }
}
?>

<div class="container" id="form-login">
    <!-- display validation -->
    <?php include('layout/error.php')?>
    <form class="form" action="" method="post" enctype="multipart/form-data">
       
        <div class="form-group">
            <label >Tài Khoản:</label>
            <input type="text" name="username"  class="form-control" placeholder="Tài khoản"  >
        </div>
        <div class="form-group">
            <label >Mật Khẩu:</label>
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" >
        </div>
        <div class="form-group">
            <label >Nhập lại mật khẩu:</label>
            <input type="password" name="password_confirm"  class="form-control" placeholder="Xác nhận mật khẩu" >
        </div>
        <div class="form-group">
            <label >Họ và Tên:</label>
            <input type="text" name="fullname" class="form-control" placeholder="Họ và Tên" >
        </div>
        <div class="form-group">
            <label >Email:</label>
            <input type="email" name="email"  class="form-control" placeholder="Email" >
        </div>
        <div class="form-group">
            <label >Địa Chỉ:</label>
            <input type="text" name="address"   class="form-control" placeholder="Địa chỉ" >
        </div>
        <div class="form-group">
            <label >Hình đại diện:</label>
            <input type="file" name="image" class="form-control-file" >
        </div>
        <div class="form-group">
        <p>Bạn đã có tài khoản?<a href="login.php">Đăng nhập</a></p>
        </div>
       <button type="submit" name="resgister" class="btn btn-primary">Đăng kí</button>
    </form>
</div>





<?php
require('layout/footer.php');
?>