<?php
session_start();
$_SESSION['type']='';
$_SESSION['idUser']='';

// $_SESSION['type']='';
require('layout/header.php');
require('layout/menu_admin.php');
require('../config/db.php');
$username='';
$password='';
$msg=array();
$errors=array();

//SET COOKIE
if(isset($_COOKIE['username'])){
    $user=$_COOKIE['username'];
}else{
    $user="";
   
}
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
 
    
    if(empty($username)){
        array_push($errors,'Tài khoản không được để trống');
    }
    if(empty($password)){
        array_push($errors,'Mật khẩu không được để trống');
    }
    if(count($errors)==0){
        $password=md5($password);
        $sql="SELECT * FROM users WHERE userName='$username'AND passWord='$password'";
        $query=mysqli_query($conn,$sql);
        $user=mysqli_fetch_assoc($query);
        if(mysqli_num_rows($query)==0){
            array_push($errors,'Tài khoản hoặc mật khẩu không chính xác');
        }else{
            if(!empty($_POST['remember'])){
                setcookie("username",$username,time()+3600);
              
            }else{
                setcookie("username","");
                setcookie("password","");
            }
            session_start();
            $_SESSION['idUser']=$user['idUser'];
            $_SESSION['username']=$user['userName'];
            $_SESSION['avatar']=$user['avatar'];
            $_SESSION['type']=$user['type'];
            if($_SESSION['type']=='admin'){
                header('location:admin.php');
            }
            else if($_SESSION['type']=='member'){
                header('location:member.php');
            }
            
        }


    }
}

?>

<div class="container" id="form-login">
    <form class="form-horizontal" action="" method="post">
        <?php require('layout/error.php')?>
        <div class="form-group">
            <label >Tài Khoản:</label>
            <input type="text" name="username" value="<?php echo $user; ?>" class="form-control" placeholder="Tài khoản" >
        </div>
        <div class="form-group">
            <label >Mật Khẩu:</label>
            <input type="password" name="password"  class="form-control" placeholder="Mật khẩu">
        </div>
        <div class="form-group">
                <div class="checkbox">
                    <label>
                    <input type="checkbox" name="remember"> Nhớ tài khoản
                    </label>
                </div>
        </div>
       <button type="submit" name="login" class="btn btn-primary">Đăng Nhập</button>
    </form>
</div>





<?php
require('layout/footer.php');
?>