<?php
session_start();
// $_SESSION['username']
if($_SESSION['username']==''){
    header('location:login.php');
}
else if($_SESSION['type']=='member'){
    header('location:member.php');
}
require('layout/header.php');
require('layout/menu_admin.php');
require('../config/db.php');


$sql="SELECT * FROM users WHERE type='member'";
$query=mysqli_query($conn,$sql);
$users=mysqli_fetch_all($query,MYSQLI_ASSOC);
// $images=mysqli_fetch_array($query);
// var_dump($users);
// $count=mysqli_num_rows($users);
$i=1;
// if(isset($_POST['delete'])){
//     $delete_id=$_POST['delete_id'];
//     $sql1="DELETE FROM users WHERE idUser='$delete_id'";

//     $query1=mysqli_query($conn,$sql1);
//     if($query1){
//         header('Location:admin.php'); 
//     }
// }
?>

<div class="container">
<h3>Danh Sách Khách Hàng</h3>

        <div class="form-group">
            <!-- <label >Tìm kiếm</label>   -->
            <input type="text" id="search" class="form-control" placeholder="Tìm kiếm">
        </div>
    <table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Avatar</th>
            <th>Họ Tên</th>
            <th>Email</th>
            <th>Địa Chỉ</th>
            <th>Chức vụ</th>
            <th>Chỉnh Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody class="list_users">
    <?php foreach($users as $user ): ?>

        <tr>
            <td><?php echo $i++;?></td>
            <td>
                <img src="upload/<?php echo $user['avatar']?>" width="60px" height="60px">
            </td>
            <td><?php echo $user['fullName'];?></td>
            <td><?php echo $user['email'];?></td>
            <td><?php echo $user['address'];?></td>
            <td><?php echo $user['type'];?></td>
            <td><a href="http://localhost/php/public/edit_member.php/?idUser=<?php echo $user['idUser'];?>" class="btn btn-primary" >Sửa</a></td>
            <td><a href="http://localhost/php/public/user_delete.php/?user=<?php echo $user['idUser'];?>" class="btn btn-danger userDelete" >Xoa</a>
            </td>
            
        </tr>
<?php endforeach;?>
    </tbody>
    </table>    
</div>

<script>

</script>
<?php
require('layout/footer.php');
?>