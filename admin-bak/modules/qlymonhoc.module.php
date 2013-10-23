
<?php
 if($_SESSION["idGV"]){
	$id=$_SESSION["idGV"];
// get results from database
$result = mysql_query("SELECT * FROM tbl_theloaitbgv WHERE tbl_theloaitbgv.idGV=$id") or die(mysql_error());
// display data in table

$output = '<div class="danhsach">DANH SÁCH MÔN HỌC</div>';

$output .='<table border="1" cellpadding="3" class="bang">';
$output .='<tr class="head">';
$output .= '<td width="40px">STT</td>';
$output .= '<td width="100px">Tên Môn Học </td>';


$output .= '</tr>';
$stt=0;
// loop through results of database query, displaying them in the table
while ($row = mysql_fetch_array($result)) {
    $stt++;
    // echo out the contents of each row into a table
    $output .= "<tr class ='content' >";
    $output .= '<td>' . $stt. '</td>';
    $output .= '<td>' . $row['tenLoai'] . '</td>';

    $output .= '<td class="capnhat"><a href="?mod=updateMonhoc&act=edit&id=' . $row['idLoai'] . '">Edit</a></td>';
    $output .= '<td class="capnhat"><a href="?mod=qlymonhoc&act=delete&id=' . $row['idLoai'] . '">Delete</a></td>';
    $output .= "</tr>";
}
// close table>
$output .= "</table>";

if($_GET["act"]=="delete") {
    if(isset($_GET['id'])){	
	$sql1 = "delete from tbltintuc where idLoaiTB='".$_GET['id']."'";
	$query1=mysql_query($sql1);	
    }
    Header("Location: index.php?mod=qlymonhoc");
}
}


?>
<?php echo $output; ?>

<div class="link"><a href="?mod=addMonhoc">Thêm môn học mới</a></div>

