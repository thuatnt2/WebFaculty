<?php 
    error_reporting(0);
    include_once('includes/connect-db.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Khoa Công Nghệ Thông Tin</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/lib.js"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
</head>

<body>
<div id="wrapper">
<div id="header"><?php include_once("includes/header.inc"); ?></div>
<div class="cach"></div>
<div id="menu-nav"><?php include_once("includes/menu.inc"); ?></div>
<div class="clear"></div>
<div id="banner-main">
	<div class="div-images" >
		<img src="images/banner.png" />
		<p style="font-size:18px">slide ở đây</p>
	</div>
  	<div class="div-text">Welcome to ....</div>
  	
</div>
<div class="clear"></div>
<div id="main">
	<div id="sidebar-right">
    	<?php include_once("includes/left.inc"); ?>
    </div>
    <div id="content">
        <?php
            switch ($_GET["mod"]) {
                
                case 'doiNgu': include_once("modules/DoiNguGiaoVien.module.php"); break;
                case 'upload': include_once("modules/upload.module.php"); break;
				case 'download': include_once("modules/loaidownload.module.php"); break;
                case 'chitiettin': include_once("modules/chitiettin.module.php"); break;
               // case 'd': include_once("modules/download.module.php"); break;
                default : include_once("modules/frontpage.module.php"); break;
            }
        ?>
        
    </div>
    <div class="clear"></div>
</div>
 <div class="cach"></div>
<div id="footer"><?php include_once("includes/footer.inc"); ?></div>
</div>
</body>
</html>