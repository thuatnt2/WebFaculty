<?php

/**
 * @author tuongvy
 * @copyright 2013
 */
    session_start();
    include_once('../includes/connect-db.inc');
    if(isset($_SESSION['user'])){
        $u=$_SESSION['user'];
 
        echo '<div class="danhsach" style="height:200px;" >Xin Chào Admin: ' . $u.'</div>';
    }
    else
       echo '<div class="danhsach" style="height:200px;" >Mời Đăng Nhập Để Thực Hiện Tác Vụ! </div>';
        
?>
