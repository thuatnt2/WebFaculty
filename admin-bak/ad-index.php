<?php
error_reporting(0);
	session_start();
	include_once('includes/connect-db.inc'); 
    if (!isset($_SESSION['user'])) {
                    ?>
	<script>
		alert('Bạn Chưa Đăng Nhập. Nhấn OK để quay về trang đăng nhập');
		window.location = "../index.php?menu=login";
	</script>
	<?php	}
?> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
function chuyenChuoi($str) {
// In thường
     $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
     $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
     $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
     $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
     $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
     $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
     $str = preg_replace("/(đ)/", 'd', $str);    
// In đậm
     $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
     $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
     $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
     $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
     $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
     $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
     $str = preg_replace("/(Đ)/", 'D', $str);
     return $str; // Trả về chuỗi đã chuyển
     }
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by INDEZINER</title>
<link rel="stylesheet" type="text/css" href="ckeditor/sample.css">
<link rel="stylesheet" type="text/css" href="css/styleAD.css" />
<script type="text/javascript" src="jsAD/clockp.js"></script>
<script type="text/javascript" src="jsAD/clockh.js"></script> 
<script type="text/javascript" src="jsAD/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jsAD/ddaccordion.js"></script>
<script language="javascript" src="ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript" src="ckeditor/ckfinder/ckfinder.js"></script>
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
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
<script>
    (function($){
        $(window).load(function(){
            $(".content").mCustomScrollbar();
        });
    })(jQuery);
</script>
<script>

			// This call can be placed at any point after the
			// <textarea>, or inside a <head><script> in a
			// window.onload event handler.

			// Replace the <textarea id="editor"> with an CKEditor
			// instance, using default configurations.
			CKEDITOR.appendTo( 'section1',
				null,
				'<p>This is some <strong>sample text</strong>. You are using <a href="http://ckeditor.com/">CKEditor</a>.</p>'
			);

</script>

<script language="javascript" type="text/javascript" src="jsAD/niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/niceforms-default.css" />

</head>
<body>
<div id="main_container">
	<?php 	include ('includes/ad-header.php'); ?>
    <div class="main_content">
	<?php 	include ('includes/ad-menu.php');
                
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
                        case '':  include_once("modules/ad-center.php");
                            break;
                    }
              
                    ?>


                </div>
	
    <div class="clear"></div>
    <?php 	include ('includes/ad-footer.php'); ?>
    </div> <!--end of main content-->
		
</body>
</html>