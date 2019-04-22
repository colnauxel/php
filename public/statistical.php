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
//------------------Count ADMIN 
$sqla="SELECT COUNT(idUser) AS 'countUsers' FROM users";
$querya=mysqli_query($conn,$sqla);
$counta=mysqli_fetch_assoc($querya);
//-----------------Count POST
$sqlu="SELECT COUNT(idPost) AS 'countPosts' FROM posts";
$queryu=mysqli_query($conn,$sqlu);
$countu=mysqli_fetch_assoc($queryu);
//----------------SELECT LIST USER NEW
$sql='SELECT * FROM users ORDER BY idUser DESC LIMIT 5';
$query=mysqli_query($conn,$sql);
$users=mysqli_fetch_all($query,MYSQLI_ASSOC);

$u=1;
if(isset($_POST['delete'])){
    $delete_id=$_POST['delete_id'];
    $sql1="DELETE FROM users WHERE idUser='$delete_id'";

    $query1=mysqli_query($conn,$sql1);
    if($query1){
        header('Location:list_post.php'); 
    }
}
// -----------------SELECT LIST POST MEW
$sqlp="SELECT * FROM posts ORDER BY idPost LIMIT 5 ";
$queryp=mysqli_query($conn,$sqlp);
$posts=mysqli_fetch_all($queryp,MYSQLI_ASSOC);
$p=1;

if(isset($_POST['delete'])){
    $delete_id=$_POST['delete_id'];
    $sql1="DELETE FROM posts WHERE idPost='$delete_id'";

    $query1=mysqli_query($conn,$sql1);
    if($query1){
        header('Location:admin.php'); 
    }
}
?>
<div class="container">
    <h1>Thống kê</h1>
    <div class="row ">
        <div class="col-sm-6 col-md-6 ">
            <div class="thumbnail">
            <img src="upload/user.png" width="130px" height="130px">
                <div class="caption">
                    <h3>Số Thành Viên</h3>
                    <h3><b><?php echo $counta['countUsers'];?></b></h3>
                   
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-6">
            <div class="thumbnail">
            <img src="upload/posts.png" width="130px" height="130px">
                <div class="caption">
                    <h3>Số lượng bài viết</h3>
                    <h3><b><?php echo $countu['countPosts'];?></b></h3>
                    
                </div>
            </div>
        </div>

    </div>
</div>
<div class="container">
<h3>Danh Sách Khách Hàng Mới nhất</h3>

        <!-- <div class="form-group"> -->
            <!-- <label >Tìm kiếm</label>   -->
            <!-- <input type="text" id="search" class="form-control" placeholder="Tìm kiếm">
        </div> -->
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
            <td><?php echo $u++;?></td>
            <td>
                <img src="upload/<?php echo $user['avatar']?>" width="60px" height="60px">
            </td>
            <td><?php echo $user['fullName'];?></td>
            <td><?php echo $user['email'];?></td>
            <td><?php echo $user['address'];?></td>
            <td><?php echo $user['type'];?></td>
            <td><a href="./edit_member.php/?idUser=<?php echo $user['idUser']?>" class="btn btn-primary" >Sửa</a></td>
            <td><td><a href="http://localhost/php/public/user_delete.php/?user=<?php echo $user['idUser'];?>" class="btn btn-danger userDelete" >Xoa</a>
            </td>
            
        </tr>
    <?php endforeach?>
    </tbody>
    </table>    
</div>
<div class="container">
<h3>Danh Sách Bài đăng Mới Nhất</h3>

        <!-- <div class="form-group"> -->
            <!-- <label >Tìm kiếm</label>   -->
            <!-- <input type="text" id="search" class="form-control" placeholder="Tìm kiếm">
        </div> -->
    <table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Tiêu đề</th>
            <th>Hình đại diện</th>
            <th>Mô tả</th>
            <th>Chỉnh Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody class="list_users">
    <?php foreach($posts as $post ): ?>

        <tr>
            <td><?php echo $p++;?></td>
          
            <td><?php echo $post['titlePost'];?></td>
              <td>
                <img src="upload/<?php echo $post['imagePost']?>" width="60px" height="60px">
            </td>
            <td><?php echo $post['descriptionPost'];?></td>
            <td><a href="./edit_post.php/?idPost=<?php echo $post['idPost'];?>" class="btn btn-primary" >Sửa</a></td>
            <td> <a href="<?php echo ROOT_URL?>delete.php/?idPost=<?php echo $post['idPost'];?>"  class="btn btn-danger delete_post" >Xoa</a>
            </td>
            
        </tr>
    <?php endforeach?>
    </tbody>
    </table>    
</div>


<?php
require('layout/footer.php');
?>