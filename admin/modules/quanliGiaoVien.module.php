
<?php
// get results from database
$result = mysql_query("SELECT * FROM tblgiaovien ORDER BY idGV") or die(mysql_error());
// display data in table

$output = '<div class="danhsach">DANH SÁCH GIÁO VIÊN</div>';
$output .= "<table border='1' cellpadding='3' class='bang'>";
$output .= "<tr class='head'> <td >ID</td> 
                            <td >Tên Giáo Viên</td> 
                            <td width='150px'>Chức Vụ</td> 
                            <td width='120px'>Số Điện Thoại</td> 
                            <td width='100px'>Email</td> 
                            <td colspan='2'>Sửa / Xóa</td></tr>";

// loop through results of database query, displaying them in the table
while ($row = mysql_fetch_array($result)) {

    // echo out the contents of each row into a table
    $output .= "<tr class='content'>";
    $output .= '<td>' . $row['idGV'] . '</td>';
    $output .= '<td>' . $row['tenGiaoVien'] . '</td>';

    $output .= '<td>' . $row['ChucVu'] . '</td>';
    $output .= '<td>' . $row['Sodt'] . '</td>';
    $output .= '<td>' . $row['Email'] . '</td>';

    $output .= '<td width="30px" style="font-weight:bold;"><a href="?mod=updateGV&id=' . $row['idGV'] . '">Edit</a></td>';
    $output .= '<td width="30px" style="font-weight:bold;"><a href="?mod=quanliGV&act=delete&id=' . $row['idGV'] . '">Delete</a></td>';
    $output .= "</tr>";
}

// close table>
$output .= "</table>";

if ($_GET["act"] == "delete") {

    if (isset($_GET['id'])) {
        $sql1 = "delete from tblgiaovien where idGV='" . $_GET['id'] . "'";
        $query1 = mysql_query($sql1);
    }
    Header('location:index.php?mod=quanliGV');
}
?>
<?php echo $output; ?>

<div class="link"><a href="?mod=addGV">Thêm giáo viên</a></div>
