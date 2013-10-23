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
        <link href="css/styleAD.css" rel="stylesheet" type="text/css" />
        <link href="../css/lightbox.css" rel="stylesheet" />

        <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="../js/validate.js"></script>
        <script type="text/javascript" src="../js/lib.js"></script>

       
        <script language="javascript" src="taovanban/ckeditor/ckeditor.js" type="text/javascript"></script>


        <script language="javascript" type="text/javascript" src="jsAD/niceforms.js"></script>
        <link rel="stylesheet" type="text/css" media="all" href="css/niceforms-default.css" />

        <script type="text/javascript">
            ddaccordion.init({
                headerclass: "submenuheader", //Shared CSS class name of headers group
                contentclass: "submenu", //Shared CSS class name of contents group
                revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
                mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
                defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
                onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
                animatedefault: false, //Should contents open by default be animated into view?
                persiststate: true, //persist state of opened contents within browser session?
                toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
                togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
                animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
                oninit: function(headers, expandedindices) { //custom code to run when headers have initalized
                    //do nothing
                },
                onopenclose: function(header, index, state, isuseractivated) { //custom code to run whenever a header is opened or closed
                    //do nothing
                }
            })
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
                        case 'quanlitintuc': include_once("modules/adquanlitintuc.module.php");
                            break;
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