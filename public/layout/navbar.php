    <!-- Fixed navbar -->
    <?php require('../config/config.php')?>
    <div class="navbar navbar-default " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Khách hàng</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="./index.php">Trang Chủ</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <?php if($_SESSION['idUser']==''):?>
                <li><a href="<?php echo ROOT_URL; ?>resgister.php">Regester</a></li>
                <li><a href="<?php echo ROOT_URL; ?>login.php">Login</a></li>
              <?php endif ?>
              <!-- if Admin -->
              <?php if($_SESSION['type']=='admin'):?>
           <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo ROOT_URL;?>upload/<?php echo $_SESSION['avatar'];?>" alt="" width="30px" height="30px"> <?php echo $_SESSION['username'];?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo ROOT_URL;?>edit_information.php/?idUser=<?php echo $_SESSION['idUser'];?>">Thông tin cá nhân</a></li>
                <li><a href="<?php echo ROOT_URL;?>post.php">Đăng bài</a></li>
                <li><a href="<?php echo ROOT_URL;?>statistical.php">Thống kê</a></li>
                <li><a href="<?php echo ROOT_URL;?>logout.php">Logout</a></li>
               
              </ul>
            </li>
          <?php endif ?>
          <!--if Memeber  -->
          <?php if($_SESSION['type']=='member'):?>
           <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo ROOT_URL;?>upload/<?php echo $_SESSION['avatar'];?>" alt="" width="30px" height="30px"> <?php echo $_SESSION['username'];?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo ROOT_URL;?>edit_information.php/?idUser=<?php echo $_SESSION['idUser'];?>">Thông tin cá nhân</a></li>
                <li><a href="<?php echo ROOT_URL;?>post.php">Đăng bài</a></li>
                <li><a href="<?php echo ROOT_URL;?>logout.php">Logout</a></li>
               
              </ul>
            </li>
          <?php endif?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

