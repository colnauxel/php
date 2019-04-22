<?php
require('../config/db.php');
$data=$_POST['data'];
$i=1;
// if($data !=''){
    
    // echo $data;
    $sql="SELECT * FROM users WHERE fullName LIKE '%$data%'   ";
// }elseif($data ==''){
//     $sql="SELECT * FROM users WHERE type='member'";
// }
    $query=mysqli_query($conn,$sql);
    
    $users=mysqli_fetch_all($query,MYSQLI_ASSOC);
    
    $num=mysqli_num_rows($query);



 foreach($users as $user ){

?>
<tr>
            <td><?php echo $i++;?></td>
            <td>
                <img src="upload/<?php echo $user['avatar']?>" width="60px" height="60px">
            </td>
            <td><?php echo $user['fullName'];?></td>
            <td><?php echo $user['email'];?></td>
            <td><?php echo $user['address'];?></td>
            <td><?php echo $user['type'];?></td>
            <td><a href="./edit_member.php/?idUser=<?php echo $user['idUser']?>" class="btn btn-primary" >Sửa</a></td>
            <td> <form action="" method="post">
                <input type="hidden" name="delete_id"  value="<?php echo $user['idUser']?>">
                <input type="submit" name="delete" class="btn btn-danger" value="Xoa">
                </form>
            </td>
            
        </tr>

<?php
    }
?>


