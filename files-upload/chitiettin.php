<?php require_once('Connections/demo_website.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_chitiettin = "-1";
if (isset($_GET['id_tintuc'])) {
  $colname_chitiettin = $_GET['id_tintuc'];
}
mysql_select_db($database_demo_website, $demo_website);
$query_chitiettin = sprintf("SELECT tbltintuc.*,ten_theloai FROM tbltintuc,tbltheloai WHERE tbltintuc.id_theloai=tbltheloai.id_theloai and id_tintuc=%s", GetSQLValueString($colname_chitiettin, "int"));
$chitiettin = mysql_query($query_chitiettin, $demo_website) or die(mysql_error());
$row_chitiettin = mysql_fetch_assoc($chitiettin);
$totalRows_chitiettin = mysql_num_rows($chitiettin);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Templace Khoa.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Khoa Công Nghệ Thông Tin</title>
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/preview.css">
<link rel="stylesheet" type="text/css" href="css/wt-rotator.css">
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.wt-rotator.min.js"></script>
<script type="text/javascript" src="js/preview.js"></script>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>

<div class="container">
  <div class="header"><a href="#"><img src="anhKhoa.png" alt="Insert Logo Here" name="Insert_logo" width="100%" height="90" id="Insert_logo" style="background-color: #C6D580; display:block;" /></a> 
    <!-- end .header --></div>
  <div align="left" class="div">
  <ul class="nav">
    <li class="trangchu"><a href="#">Trang chủ</a></li>
      <li class="gioithieu">
      		<a href="#">Giới Thiệu</a>
        <ul>
        	<li>
            	<a href="#">Khoa</a>
            </li>
            <li>
            	<a href="#">Đào Tạo</a>
            </li>
            <li>
            	<a href="demoGiaoVien.php">Đội Ngũ Cán Bộ</a>
            </li>
            <li >
            	<a href="#">Nghiên Cứu Khoa Học</a>
            </li>
            <li>
            	<a href="#">Cơ Sở Vật Chất</a>
            </li>
            <li>
            	<a href="#">CT Đào Tạo (Tiếng Anh)</a>
            </li>
        </ul>
    </li>
         <li class="bantinkhoa">
    	<a href="#">Bản Tin Khoa</a>
        <ul>
        	 	<li>
    				<a href="#">Thông Báo </a>
    			</li> 
    			<li>
   				<a href="#">Thông Tin Đào Tạo </a></li>
        </ul>
      </li>
      <li class="bomon">
    	<a href="#">Bộ Môn</a>
        <ul>
        	 	<li>
    				<a href="#">Mạng và Truyền Thông</a>
    			</li> 
    			<li>
    				<a href="#">Công Nghệ Phần Mềm</a>
   				</li> 
                <li>
    				<a href="#">Hệ Thống Nhúng</a>
   				</li> 
        </ul>
    </li>
    <li class="daotao">
    	<a href="#">Chương Trình Đào Tạo</a>
         <ul>
        	 	<li>
    				<a href="#">Chất Lượng Cao</a>
    			</li> 
    			<li>
    				<a href="#">Kỹ Sư Việt-Pháp</a>
   				</li> 
        </ul>
    </li> 
     <li class="ttthoc">
    	<a href="#">Trung Tâm Dạy Tin Học</a>
         <ul>
        	 	<li>
    				<a href="#">DATIC</a>
    			</li> 
    			<li>
    				<a href="#">Tin Học Bách Khoa</a>
   				</li> 
        </ul>
    </li>
    <li class="hdsvien">
    	<a href="#">Hoạt Động Sinh Viên</a>
         <ul>
        	 	<li>
    				<a href="#">Đoàn Thanh Niên</a>
    			</li> 
    			<li>
    				<a href="#">CLB Tin Học</a>
   				</li> 
                <li>
    				<a href="#">Cuộc Thi Tài Năng Tin</a>
   				</li> 
        </ul>
    </li>
 </ul>
    </ul>
  </div>
  <div  class="div" align="left">
 	<div class="container">
 	  <div class="wt-rotator"> <a href="#"></a>
 	    <div class="desc"></div>
 	    <div class="preloader"></div>
 	    <div class="c-panel">
 	      <div class="thumbnails">
 	        <ul>
 	          <li> <a href="images/madness_arch2.jpg"></a> </li>
 	          <li> <a href="images/triworks_abstract17.jpg"></a> </li>
 	          <li> <a href="images/krazy-kartoons-robot-dj02.jpg"></a> </li>
 	          <li> <a href="images/sf.jpg"></a> </li>
 	          <li> <a href="images/triworks_abstract26.jpg"></a> </li>
 	          <li> <a href="images/tokyo.jpg"></a> </li>
 	          <li> <a href="images/scottwills_building2.jpg" ></a> </li>
 	          <li> <a href="images/highway.jpg" ></a> </li>
            </ul>
          </div>
        </div>
      </div>
 	</div>
    </div>
    <div class="sidebar1">
    <table width="180" height="244" border="1">
      <tr>
        <td height="238">Quảng Cáo</td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table width="175" height="204" border="1">
      <tr>
        <td height="198">Tin đọc nhiều nhất</td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table width="181" height="187" border="1">
      <tr>
        <td>Doanh Nghiệp và đối tác</td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table width="176" height="180" border="1">
      <tr>
        <td>Thống kê</td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>.</p>
    <table width="176" height="180" border="1">
      <tr>
        <td>Thăm dò</td>
      </tr>
    </table>
    <!-- end .sidebar1 --></div>
    <!-- InstanceBeginEditable name="content" -->
    <div class="content">
      <div id="chitiettin">
      	<p>Trang Chủ > <?php echo $row_chitiettin['tieude']; ?></p>
	<p><?php echo $row_chitiettin['tieude']; ?></p>
	<p><?php echo $row_chitiettin['ngaythang']; ?></p>
	<hr />
	<p><?php echo $row_chitiettin['noidung']; ?></p>
      </div>
      <!-- end .content -->
    </div>
    <!-- InstanceEndEditable -->
    <div class="footer">
    <p>This .footer contains the declaration position:relative; to give Internet Explorer 6 hasLayout for the .footer and cause it to clear correctly. If you're not required to support IE6, you may remove it.</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($chitiettin);
?>
