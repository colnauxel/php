<?php
session_start();



// $_SESSION['username']
if($_SESSION['username']==''){
    header('location:login.php');
}

require('layout/header.php');
require('layout/menu_admin.php');
require('../config/db.php');

$sql="SELECT posts.idPost,posts.titlePost,posts.descriptionPost,users.fullName,posts.imagePost
FROM posts
INNER JOIN users
ON posts.idUser=users.idUser";
$query=mysqli_query($conn,$sql);
$posts=mysqli_fetch_all($query,MYSQLI_ASSOC);


?>
<!-- <div class="container"> -->
    <img src="upload/pexels-photo-331990.jpeg" id="logo">
    <h2>Tất Cả Sản phẩm</h2>
            <?php foreach($posts as $post ): ?>
            <div class="container">
                    <div class="jumbotron">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="upload/<?php echo $post['imagePost']; ?>"  width="100%">
                            </div>
                                <div class="col-md-4">
                                    <h3><b><?php echo $post['titlePost'];?></b></h3>
                                    <p>Mô tả:<?php echo $post['descriptionPost'];?></p>
                                    <p>Người đăng:<?php echo $post['fullName'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>   
    <?php endforeach ?>
<!-- </div> -->


<?php
require('layout/footer.php');
?>