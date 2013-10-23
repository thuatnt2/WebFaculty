
<?php
session_start();
    if(isset($_SESSION['user'])){
        $u=$_SESSION['user'];
        $output ='<div class="chao" >Xin Chào Admin: ' . $u.' | <a href="?mod=logout">Logout</a></div>';
    }
    
	/*Logout - Huy Session*/
    if(isset($_GET["mod"])&&($_GET["mod"]=="logout")) {
        unset($_SESSION["user"]);
        $output ='<div class="chao" style="font-size:13px;"><a href="login.php">Login</a></div>';
        
    }
    echo $output;
?>
