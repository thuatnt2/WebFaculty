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
        <link href="css/lightbox.css" rel="stylesheet" />
        <link href="css/tabs.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/validate.js"></script>
        <script type="text/javascript" src="js/lightbox.js"></script>
        <script type="text/javascript" src="js/jcarousellite_1.0.1c4.js"></script>

        <!--slide-->
        <link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />

        <link href="css/generic.css" rel="stylesheet" type="text/css" />

        <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
        <!--button back-top-->
        <style type='text/css'>
            #bttop{border:1px solid #4adcff;background:#24bde2;text-align:center;padding:5px;position:fixed;bottom:35px; right:10px;cursor:pointer;display:none; color:#fff;font-size:11px;font-weight:900;}
            #bttop:hover{border:1px solid #ffa789;background:#ff6734;}
        </style>
        <div id='bttop'>BACK TO TOP</div>

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
        <!---->

        <!--tabs-->   
        <script>
            $(document).ready(function() {
                $("#contenttab div").hide(); // Initially hide all content
                $("#tabs li:first").attr("id", "current"); // Activate first tab
                $("#contenttab div:first").fadeIn(); // Show first tab content

                $('#tabs a').click(function(e) {
                    e.preventDefault();
                    if ($(this).closest("li").attr("id") == "current") { //detection for current tab
                        return
                    }
                    else {
                        $("#contenttab div").hide(); //Hide all content
                        $("#tabs li").attr("id", ""); //Reset id's
                        $(this).parent().attr("id", "current"); // Activate this
                        $('#' + $(this).attr('name')).fadeIn(); // Show content for current tab
                    }
                });
            });
        </script>

        <!------------->
        <!------cuon tin tuc noi bat------->
        <script type="text/javascript">
            $(document).ready(function() {
                $(".jcarouse").jCarouselLite({// Lấy class của ul và gọi hàm jCarouselLite() trong thư viện
                    vertical: true, // chạy theo chiều dọc
                    hoverPause: true, // Hover vào nó sẽ dừng lại
                    visible: 3, // Số bài viết cần hiện
                    auto: 500, // Tự động scroll
                    speed: 1000					// Tốc độ scroll
                });
            });
        </script>


    </head>

    <body onload="showhide('#link11', 1);
                showhide('#link12', 2);
                showhide('#link13', 3);
                showhide('#link14', 4);">
        <div id="wrapper">
            <div id="header"><?php include_once("includes/header.inc"); ?></div>
            <div class="cach"></div>
            <div id="menu-nav"><?php include_once("includes/menu.inc"); ?></div>
            <div class="clear"></div>
            <div id="banner-main">
                <div class="div-images" >
                    <?php include_once("modules/giaodien/slide.module.php"); ?>
                </div>
                <div class="div-text"><ul id="tabs">
                        <li><a href="#" name="tab1">Tin Sinh Viên</a></li>
                        <li><a href="#" name="tab2">Tin Giáo Viên</a></li>       
                    </ul>

                    <div id="contenttab"> 
                        <div id="tab1" class="blockcontent-body">                         
                            <?php
                            include_once("modules/tinsinhvien.module.php");
                            ?> 

                        </div>
                        <div id="tab2" class="blockcontent-body">    
                            <?php
                            include_once("modules/tingiaovien.module.php");
                            ?> 
                        </div>
                    </div>
                </div>


            </div>
            <div class="clear"></div>
            <div id="main">
                <div id="sidebar-right">
                    <?php include_once("includes/right.inc"); ?>
                </div>
                <div class="content1">
                    <div class="content">
                        <?php
                        switch ($_GET["mod"]) {
                            // ----- menu ------
                            case 'doiNgu': include_once("modules/DoiNguGiaoVien.module.php");
                                break;
                            case 'download': include_once("modules/loaidownload.module.php");
                                break;
                            case 'chitiettin': include_once("modules/chitiettin.module.php");
                                break;
                            case 'ndTin': include_once("modules/ndTin.module.php");
                                break;

                            case 'khoa':include_once("modules/view/khoa.module.php");
                                break;
                            case 'nghiencuukh':include_once("modules/view/nghiencuukhoahoc.module.php");
                                break;
                            case 'cosovc':include_once("modules/view/cosovatchat.module.php");
                                break;
                            case 'cttienganh':include_once("modules/view/cttienganh.module.php");
                                break;

                            case 'bmmvtt':include_once("modules/view/bomonmvtt.module.php");
                                break;
                            case 'bmcnpm':include_once("modules/view/bomoncnpm.module.php");
                                break;
                            case 'bmhtn':include_once("modules/view/bomonhtn.module.php");
                                break;

                            case 'ctdtclc':include_once("modules/view/ctdtclc.module.php");
                                break;
                            case 'ctdtksvp':include_once("modules/view/ctdtksvp.module.php");
                                break;

                            case 'doanthanhnien':include_once("modules/view/doanthanhnien.module.php");
                                break;
                            case 'clbtinhoc':include_once("modules/view/clbtinhoc.module.php");
                                break;
                            case 'tainangtin':include_once("modules/view/tainangtin.module.php");
                                break;
                            //------tab-------
                            case 'thongbaochung': include_once("modules/thongbaochung.module.php");
                                break;
                            case 'hoatdongkhoa': include_once("modules/hoatdongkhoa.module.php");
                                break;
                            case 'lienchidoan': include_once("modules/lienchidoan.module.php");
                                break;
                            default : include_once("modules/frontpage.module.php");
                                break;
                        }
                        ?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="cach"></div>

            
            <div id="footer"><?php include_once("includes/footer.inc"); ?></div>

        </div>
    </body>
</html>