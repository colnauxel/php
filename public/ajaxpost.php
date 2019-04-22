<?php
session_start();
$idUser=$_SESSION['idUser'];
// echo $idUser;
require('../config/db.php');
$data=$_POST['data'];
$i=1;
$sql="SELECT * FROM posts WHERE idUser='$idUser' AND titlePost LIKE '%$data%' ";
$query=mysqli_query($conn,$sql);
// echo $query;
$posts=mysqli_fetch_all($query,MYSQLI_ASSOC);

 foreach($posts as $post ){


?>
   <tr>
            <td><?php echo $i++;?></td>
          
            <td><?php echo $post['titlePost'];?></td>
              <td>
                <img src="upload/<?php echo $post['imagePost']?>" width="60px" height="60px">
            </td>
            <td><?php echo $post['descriptionPost'];?></td>
            <td><a href="./edit_post.php/?idPost=<?php echo $post['idPost'];?>" class="btn btn-primary" >Sửa</a></td>
            <td> <form action="" method="post">
                <input type="hidden" name="delete_id"  value="<?php echo $post['idPost']; ?>">
                <input type="submit" name="delete" id="delete" class="btn btn-danger" value="Xoa">
                </form>
            </td>
            
        </tr>
        <script>
        
        <script>
<?php
 }
?>
