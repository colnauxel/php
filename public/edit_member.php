<?php
session_start();
// $_SESSION['username']
if($_SESSION['username']==''){
    header('location:login.php');
}
require('layout/header.php');
require('layout/menu_admin.php');
    $idUser=$_GET['idUser'];
    $sql="SELECT * FROM users Where idUser='$idUser'";
    $query=mysqli_query($conn,$sql);
    $user=mysqli_fetch_assoc($query);
    if(isset($_POST['change'])){
        $type=$_POST['type'];
      
        $sql1="UPDATE users SET type='$type'WHERE idUser='$idUser'";
        $query1=mysqli_query($conn,$sql1);
    }


?>

<div class="container">

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
  <h1>Thông tin cá nhân: <b><?php echo $user['fullName']?></b></h1>
  <form class="form" action=""  method="post">
        <div class="form-group">
            <label >Họ tên:</label>
            <p><?php echo $user['fullName']?></p>
        </div>
        <div class="form-group">
            <label >Email:</label>
            <p><?php echo $user['email']?></p>
        </div>
        <div class="form-group">
            <label >Địa Chỉ:</label>
            <p><?php echo $user['address']?></p>
        </div>
        <div class="form-group">
            <label >Địa Chỉ:</label>
            <p><?php echo $user['address']?></p>
        </div>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="inlineCheckbox1" checked="checked" value="member">
                <label class="form-check-label">Member</label>
                <input class="form-check-input" type="radio"  name="type" id="inlineCheckbox1" value="admin">
                <label class="form-check-label">Admin</label>
            </div>
                
        </div>
        <button type="submit" name="change" class="btn btn-primary">Thay đổi</button>
  </form>
    
   
  </p>
</div>

</div> <!-- /container -->






<?php
require('layout/footer.php');
?>