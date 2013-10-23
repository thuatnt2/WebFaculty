<?php
// connect to the database
include('../includes/connect-db.inc');

// get results from database
$result = mysql_query("SELECT * FROM tbltheloai ORDER BY id_theloai") or die(mysql_error());
// display data in table
$output = '<div class="danhsach">DANH SÁCH THỂ LOẠI TIN TỨC</div>';
$output .= "<table border='1' cellpadding='3' class='bang'>";
$output .= "<tr class='head'> <td width='100px'>ID</td> 
                            <td >Tên thể loại</td> 
                            <td colspan='2'></a></td></tr>";

while ($row = mysql_fetch_array($result)) {

    // echo out the contents of each row into a table
    $output .= "<tr class='content'>";
    $output .= '<td>' . $row['id_theloai'] . '</td>';
    $output .= '<td>' . $row['ten_theloai'] . '</td>';
    $output .= '<td width="30px" style="font-weight:bold;"><a href="?mod=updateTL&id=' . $row['id_theloai'] . '">Edit</a></td>';
    $output .= '<td width="30px" style="font-weight:bold;"><a href="?mod=quanliTL&act=delete&id=' . $row['id_theloai'] . '">Delete</a></td>';
    $output .= "</tr>";
}

// close table>
$output .= "</table>";
if ($_GET["act"] == "delete") {

    if (isset($_GET['id'])) {
        $sql1 = "delete from tbltheloai where id_theloai='" . $_GET['id'] . "'";
        $query1 = mysql_query($sql1);
    }
    Header('location:index.php?mod=quanliTL');
}
?>

<?php echo $output; ?>

<div class="link"><a href="?mod=addTL">Thêm Thể Loại </a></div>