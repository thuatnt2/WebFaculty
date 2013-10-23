
<?php
// get results from database
$result = mysql_query("SELECT * FROM tbltintuc,tbltheloai WHERE tbltintuc.id_theloai=tbltheloai.id_theloai ORDER BY tbltintuc.id_tintuc ") or die(mysql_error());
// display data in table

$output = '<div class="danhsach">DANH SÁCH TIN TỨC</div>';

$output .='<table border="1" cellpadding="3" class="bang">';
$output .='<tr class="head">';
$output .= '<td width="40px">ID</td>';
$output .= '<td width="100px">Ti&ecirc;u &#272;&ecirc;&#768; </td>';
$output .= '<td >N&ocirc;&#803;i Dung </td>';
$output .= '<td >Tác giả</td>';
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
    $output .= '<td>' . $row['id_tintuc'] . '</td>';
    $output .= '<td>' . $row['tieude'] . '</td>';
    $output .= '<td >' . $row['noidung'] . '</td>';
    $output .= '<td >' . $row['tacgia'] . '</td>';
    $output .= '<td>' . $row['ngaythang'] . '</td>';
    $output .= '<td>' . $row['ten_theloai'] . '</td>';
    //$output .= '<td><a href="' . $row['ten_anh'] . '" target="blank">' . $row['ten_anh'] . '</a></td>';
    $tenanh=$row["ten_anh"];
    $path="../anhTintuc/".$tenanh;
    $output .= '<td><a href="'. $path .'" rel="lightbox[roadtrip]" title="">' . $row['ten_anh'] . '</a></td>';
    $output .= '<td>' . $row['hien_an'] . '</td>';
    $output .= '<td>' . $row['solanxem'] . '</td>';
    $output .= '<td class="capnhat"><a href="?mod=updateTin&act=edit&id=' . $row['id_tintuc'] . '">Edit</a></td>';
    $output .= '<td class="capnhat"><a href="?mod=quanlitin&act=delete&id=' . $row['id_tintuc'] . '">Delete</a></td>';
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



?>
<?php echo $output; ?>

<div class="link"><a href="?mod=addTin">Thêm tin mới</a></div>

