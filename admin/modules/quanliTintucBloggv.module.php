<?php
  if($_SESSION["idGV"]){
	$id=$_SESSION["idGV"];
// get results from database
$result = mysql_query("SELECT * FROM tbl_theloaitbgv,tbl_thongbaogv WHERE tbl_thongbaogv.idGV= $id and tbl_theloaitbgv.idLoai=tbl_thongbaogv.idLoai ORDER BY tbl_thongbaogv.idTB") or die(mysql_error());
// display data in table

$output = '<div class="danhsach">DANH SÁCH TIN TỨC</div>';

$output .='<table border="1" cellpadding="3" class="bang">';
$output .='<tr class="head">';
$output .= '<td width="40px">ID</td>';
$output .= '<td width="100px">Ti&ecirc;u &#272;&ecirc;&#768; </td>';
$output .= '<td >N&ocirc;&#803;i Dung </td>';
$output .= '<td width="100px">Nga&#768;y Tha&#769;ng </td>';
$output .= '<td width="100px">T&ecirc;n Loa&#803;i Tin </td>';
$output .= '<td width="100px">T&ecirc;n A&#777;nh </td>';
$output .= '<td width="50px">Hi&ecirc;&#803;n &Acirc;&#777;n A&#777;nh </td>';
$output .= '<td width="50px">Số lần xem</td>';
$output .= '<td colspan="2">&nbsp;</td>';

$output .= '</tr>';

// loop through results of database query, displaying them in the table
while ($row = mysql_fetch_array($result)) {

    // echo out the contents of each row into a table
    $output .= "<tr class ='content' >";
    $output .= '<td>' . $row['idTB'] . '</td>';
    $output .= '<td>' . $row['tenTB'] . '</td>';
    $output .= '<td >' . $row['ndTB'] . '</td>';
    $output .= '<td>' . $row['date'] . '</td>';
    $output .= '<td>' . $row['tenLoai'] . '</td>';
    //$output .= '<td><a href="' . $row['ten_anh'] . '" target="blank">' . $row['ten_anh'] . '</a></td>';
    $tenanh=$row["anh"];
    $path="../anhTintuc/".$anh;
    $output .= '<td><a href="'. $path .'" rel="lightbox[roadtrip]" title="">' . $row['anh'] . '</a></td>';
    $output .= '<td>' . $row['hien_an'] . '</td>';
    $output .= '<td>' . $row['solanxem'] . '</td>';
    $output .= '<td class="capnhat"><a href="?mod=updateTinBlog&act=edit&id=' . $row['idTB'] . '">Edit</a></td>';
    $output .= '<td class="capnhat"><a href="?mod=updateTinBlog&act=delete&id=' . $row['idTB'] . '">Delete</a></td>';
    $output .= "</tr>";
}
// close table>
$output .= "</table>";

if($_GET["act"]=="delete") {
    if(isset($_GET['id'])){	
	$sql1 = "delete from tbltintuc where id_tintuc='".$_GET['id']."'";
	$query1=mysql_query($sql1);	
    }
    Header("Location: index.php?mod=quanlitin");
}
}


?>
<?php echo $output; ?>

<div class="link"><a href="?mod=addTinBlog">Thêm tin mới</a></div>
