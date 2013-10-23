<?php
error_reporting(0);
include_once('includes/connect-db.inc');
$idGV = $_GET['idGV'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Khoa Công Nghệ Thông Tin</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="css/blog.css" rel="stylesheet" type="text/css" />
        <link href="css/lightbox.css" rel="stylesheet" />

        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/validate.js"></script>
        <script type="text/javascript" src="js/lightbox.js"></script>
        <script type="text/javascript" language="JavaScript" src="flipmenu.js"></script>
        <!--slide-->
        <link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />

        <link href="css/generic.css" rel="stylesheet" type="text/css" />

        <script src="themes/1/js-image-slider.js" type="text/javascript"></script>

        <style type='text/css'>
            #bttop{border:1px solid #4adcff;background:#24bde2;text-align:center;padding:5px;position:fixed;bottom:35px; right:10px;cursor:pointer;display:none; color:#fff;font-size:11px;font-weight:900;}
            #bttop:hover{border:1px solid #ffa789;background:#ff6734;}
        </style>
        <div id='bttop'>BACK TO TOP</div>
        <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js' type='text/javascript'></script>
        <script type='text/javascript'>$(function() {
                $(window).scroll(function() {
                    if ($(this).scrollTop() != 0) {
                        $('#bttop').fadeIn();
                    } else {
                        $('#bttop').fadeOut();
                    }
                });
                $('#bttop').click(function() {
                    $('body,html').animate({scrollTop: 0}, 800);
                });
            });</script>

    </head>

    <body id="bodyblog" onload="showhide('#link11', 1);
                showhide('#link12', 2);
                showhide('#link13', 3);
                showhide('#link14', 4);
                showhide('#link15', 5)         
                for (var i=1945;i<2100;i++){
                    showhide('#time'+i);
                    for (var y=1;y<=12;y++)
                    showhide('#time'+i+'-'+y);
                } 
                
                ">
                
        <div id="wrapper">
            <div class="cach"></div>
            <div class="clear"></div>
            <div id="banner-main-blog">
                
            </div>
            <div class="clear"></div>
            <div id="main">
                <div id="content1-blog">
                    <?php
                    switch ($_GET["mod"]) {
                        case 'chitiettin': include_once("modules/chitiettin.blog.php");
                            break;
                        case 'danhmuctin': include_once("modules/danhmuctin.blog.php");
                            break;
                        case 'danhmuctiny': include_once("modules/danhmuctiny.blog.php");
                            break;
                        case 'danhmuctinm': include_once("modules/danhmuctinm.blog.php");
                            break;
                        case 'chitietgv': include_once("modules/chitietgv.blog.php");
                            break;
                        default : include_once("modules/frontpage.blog.php");
                            break;
                    }
                    ?>
            
                    <div id="sidebar-right-blog">
                        <?php include_once("includes/left.blog.inc"); ?>
                    </div>
            <?php if(isset($_GET['mod'])){ ?>
            <div class="Home"><a href="blog.php?idGV=<?php echo $idGV; ?>">Home</a></div>
            <?php } ?>
                </div>
            
                <div class="clear"></div>
            </div>
            <div class="cach"></div>

            <div id="footer"><?php include_once("includes/footer.inc"); ?></div>
 
        </div>
    </body>
</html>