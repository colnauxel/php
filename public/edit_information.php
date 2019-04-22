<?php
session_start();
require('layout/header.php');
require('layout/menu_admin.php');
require('../config/db.php');
$errors=array();
$msg=array();
$username='';
$idUser=$_GET['idUser'];
    $sql1="SELECT *FROM users WHERE idUser='$idUser'";
    $query1=mysqli_query($conn,$sql1);
    $user=mysqli_fetch_assoc($query1);
if(isset($_POST['change'])){
    $username=($_POST['username']);
    $password=($_POST['password']);
    $password_comfirm=($_POST['password_confirm']);
    $fullname=($_POST['fullname']);
    $email=($_POST['email']);
    $address=($_POST['address']);
    $target="upload/".basename($_FILES['image']['name']);

    $image=$_FILES['image']['name'];
    //check form
    if(empty($username)){
        array_push($errors,"Tài khoản không được bỏ trống");
    }
    if(empty($password)){
        array_push($errors,"Mật khẩu không được bỏ trống");
    }
    if($password!=$password_comfirm){
        array_push($errors,"Mật khẩu không trùng khớp");
    }
    if(count($errors)==0){
        $password=md5($password);
        $sql="UPDATE users SET 
        userName='$username',passWord='$password',fullName='$fullname',email='$email',address='$address',avatar='$image'
        WHERE idUser=$idUser";
        $query=mysqli_query($conn,$sql);
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){

        }
        if($query){
            array_push($msg,"Cập nhật thông tin thành công");
        }else{
            array_push($msg,"Cập nhật thông tin thất bại");
        }
    }
       
        
}
?>

<div class="container" id="form-login">
    <h1>Thay đổi đổi thông tin:<?php echo $user['fullName']?></h1>
    <!-- display validation -->
    <?php include('layout/error.php')?>
    <form class="form" action="" method="post" enctype="multipart/form-data" >
       
        <div class="form-group">
            <label >Tài Khoản:</label>
            <input type="text" name="username" value="<?php echo $user['userName']?>" class="form-control" placeholder="Tài khoản"  >
        </div>
        <div class="form-group">
            <label >Mật Khẩu:</label>
            <input type="password" name="password"  class="form-control" placeholder="Mật khẩu" >
        </div>
        <div class="form-group">
            <label >Nhập lại mật khẩu:</label>
            <input type="password" name="password_confirm"  class="form-control" placeholder="Xác nhận mật khẩu" >
        </div>
        <div class="form-group">
            <label >Họ và Tên:</label>
            <input type="text" name="fullname" value="<?php echo $user['fullName']?>"  class="form-control" placeholder="Họ và Tên" >
        </div>
        <div class="form-group">
            <label >Email:</label>
            <input type="email" name="email"value="<?php echo $user['email']?>"  class="form-control" placeholder="Email" >
        </div>
        <div class="form-group">
            <label >Địa Chỉ:</label>
            <input type="text" name="address" value="<?php echo $user['address']?>"  class="form-control" placeholder="Địa chỉ" >
        </div>
        <div class="form-group">
            <label >Hình đại diện:</label>
            <input type="file" name="image" value="<?php echo $user['avatar']?>" class="form-control-file" >
        </div>
    
       <button type="submit" name="change" class="btn btn-primary">Thay đổi</button>
    </form>
</div>





<?php
require('layout/footer.php');
?>