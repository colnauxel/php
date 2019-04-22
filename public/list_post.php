<?php
session_start();
// $_SESSION['username']
if($_SESSION['username']==''){
    header('location:login.php');
}else if($_SESSION['type']=='member'){
    header('location:member.php');
}
require('layout/header.php');
require('layout/menu_admin.php');
require('../config/db.php');

// $idUser=$_SESSION['idUser'];

// $sql="SELECT * FROM posts";
$sql="SELECT posts.idPost,posts.titlePost,posts.descriptionPost,users.fullName,posts.imagePost
FROM posts
INNER JOIN users
ON posts.idUser=users.idUser";
$query=mysqli_query($conn,$sql);
$posts=mysqli_fetch_all($query,MYSQLI_ASSOC);

$i=1;
// if(isset($_POST['delete'])){
//     $delete_id=$_POST['delete_id'];
//     $sql1="DELETE FROM posts WHERE idPost='$delete_id'";

//     $query1=mysqli_query($conn,$sql1);
//     if($query1){
//         header('Location:admin.php'); 
//     }
// }
?>

<div class="container">
<h3>Danh Sách Tất cả Sản phẩm</h3>

        <div class="form-group">
            <!-- <label >Tìm kiếm</label>   -->
            <input type="text" id="listpost" class="form-control" placeholder="Tìm kiếm">
        </div>
    <table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Tiêu đề</th>
            <th>Hình đại diện</th>
            <th>Mô tả</th>
            <th>Người đăng</th>
            <th>Chỉnh Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody class="list_post">
    <?php foreach($posts as $post ): ?>

        <tr>
            <td><?php echo $i++;?></td>
          
            <td><?php echo $post['titlePost'];?></td>
              <td>
                <img src="upload/<?php echo $post['imagePost']?>" width="60px" height="60px">
            </td>
            <td><?php echo $post['descriptionPost'];?></td>
            <td><?php echo $post['fullName'];?></td>
            <td><a href="http://localhost/php/public/edit_post.php/?idPost=<?php echo $post['idPost'];?>" class="btn btn-primary" >Sửa</a></td>
            <td>   <a href="http://localhost/php/public/delete.php/?idPostList=<?php echo $post['idPost'];?>"  class="btn btn-danger delete_post" >Xoa</a>
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