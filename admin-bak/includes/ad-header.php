<?php
    if(isset($_SESSION['user'])){
        $u=$_SESSION['user'];?>
        <div class="header">
    <div class="logo"><a href="../index.php"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>
    <div class="right_header">Xin Chào <?php echo $u; ?> | <a href="ad-index.php?ad=changepass">Đổi Mật Khẩu</a> | <a href="logout.php" class="logout">Thoát</a></div>
    <div id="clock_a"></div>
    </div>
  <?php }?>
    
	