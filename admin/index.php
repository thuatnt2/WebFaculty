<?php
error_reporting(0);

include_once('includes/connect-db.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Admin</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="../css/lightbox.css" rel="stylesheet" />

        <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="../js/validate.js"></script>
        <script type="text/javascript" src="../js/lib.js"></script>

        <!--slide-->
        <link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />

        <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
        <script type="text/javascript" src="../js/lightbox.js"></script>
		
<script language="javascript">
            function ajaxFunction(id) {
                var xmlHttp;
                if (window.XMLHttpRequest) {
                    // IE7+, Firefox, Chrome, Opera, Safari
                    xmlHttp = new XMLHttpRequest;
                }
                else if (window.ActiveXObject) {
                    // IE6, IE5
                    xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
                }

                xmlHttp.onreadystatechange = function() {
                    if (xmlHttp.readyState == 4) {
                        document.getElementById('clsp').innerHTML = xmlHttp.responseText;
                    }
                }
                xmlHttp.open('GET', 'modules/action.module.php?dmid=' + id, true);
                xmlHttp.send(null);
            }
        </script>
    </head>

    <body>
        <div id="wrapper">
            <div id="header"><?php include_once("includes/header.inc"); ?></div>
            <div class="cach"></div>
            <div id="menu-nav"><?php include_once("includes/menu.inc"); ?></div>
            <div class="clear"></div>


            <div id="main">
                <?php
                session_start();
                if (!isset($_SESSION['user'])) {
                    ?>
                    <div class="danhsach" style="height: 200px;">Bạn chưa đăng nhập! Nhấn vào đây để đăng nhập <a href="login.php">Login</a></div>

                <?php } else { ?>
                    <div><?php include_once('includes/session.inc'); ?> </div>
                    <?php
                    switch ($_GET["mod"]) {

                        case 'quanlitin': include_once("modules/quanlitintuc.module.php");
                            break;
                        case 'quanliAdmin': include_once("modules/quanliAdmin.module.php");
                            break;
                        case 'quanliGV': include_once("modules/quanliGiaoVien.module.php");
                            break;
                        case 'quanliTL': include_once("modules/quanliTheloaiTintuc.module.php");
                            break;
                        case 'quanliTailieu': include_once("modules/quanliTailieu.module.php");
                            break;

                        case 'addTin': include_once("modules/addTin.module.php");
                            break;
                        case 'addGV': include_once("modules/addGV.module.php");
                            break;
                        case 'addAdmin': include_once("modules/addAdmin.module.php");
                            break;
                        case 'addTL': include_once("modules/addTL.module.php");
                            break;
                        case 'addTailieu': include_once("modules/addTailieu.module.php");
                            break;

                        case 'updateTin': include_once("modules/updateTin.module.php");
                            break;
                        case 'updateGV': include_once("modules/updateGV.module.php");
                            break;
                        case 'updateAdmin': include_once("modules/updateAdmin.module.php");
                            break;
                        case 'updateCanhan': include_once("modules/updateCanhan.module.php");
                            break;
                        case 'updateTL': include_once("modules/updateTheloaiTintuc.module.php");
                            break;
                        case 'updateTailieu': include_once("modules/updateTailieu.module.php");
                            break;

                        case 'ttCanhan': include_once("modules/xemTTcanhan.module.php");
                            break;

                        case 'upload': include_once("modules/upload.module.php");
                            break;
						case 'addMonhoc': include_once("modules/addMonhoc.module.php");
                            break;
						case 'quanliTintucBloggv': include_once("modules/quanliTintucBloggv.module.php");
                            break;
						case 'qlymonhoc': include_once("modules/qlymonhoc.module.php");
                            break;
						case 'updateMonhoc': include_once("modules/updateMonhoc.module.php");
                            break;
						case 'addTinBlog': include_once("modules/addTinBlog.module.php");
                            break;
						case 'updateTinBlog': include_once("modules/updateTinBlog.module.php");
                            break;
						case 'chitietgv': include_once("modules/chitietgv.module.php");
                            break;
						case 'addMenu': include_once("modules/addMenu.module.php");
                            break;
						case 'quanliMenu': include_once("modules/quanliMenu.module.php");
                            break;
						case 'action': include_once("modules/action.module.php");
                            break;
						case 'combobox': include_once("modules/combobox.module.php");
                            break;
                        default : include_once("modules/frontpage.module.php");
                            break;
                    }
                    ?>


                </div>
            <?php } ?>
            <div class="clear"></div>
            <div class="cach"></div>
            <div id="footer"><?php include_once("includes/footer.inc"); ?></div>
        </div>
    </body>
</html>