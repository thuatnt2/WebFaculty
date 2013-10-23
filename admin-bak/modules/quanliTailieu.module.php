<?php
// connect to the database
include('../includes/connect-db.inc');

// get results from database
$result = mysql_query("SELECT * FROM loaitin ORDER BY 	idloai") or die(mysql_error());
// display data in table
$output = '<div class="danhsach">DANH SÁCH LOẠI TIN UPLOAD</div>';
$output .= "<table border='1' cellpadding='3' class='bang'>";
$output .= "<tr class='head' width='100px'> <td >STT</td> 
                            <td >Tên loại tin</td> 
                            <td colspan='2'></a></td></tr>";
$stt=0;
while ($row = mysql_fetch_array($result)) {
    $stt++;
    // echo out the contents of each row into a table
    $output .= "<tr class='content'>";
    $output .= '<td>' . $stt . '</td>';
    $output .= '<td>' . $row['tenloai'] . '</td>';
    $output .= '<td width="30px" style="font-weight:bold;"><a href="?mod=updateTailieu&id=' . $row['idloai'] . '">Edit</a></td>';
    $output .= '<td width="30px" style="font-weight:bold;"><a href="?mod=quanliTailieu&act=delete&id=' . $row['idloai'] . '">Delete</a></td>';
    $output .= "</tr>";
}

// close table>
$output .= "</table>";
if ($_GET["act"] == "delete") {

    if (isset($_GET['id'])) {
        $sql1 = "delete from loaitin where idloai='" . $_GET['id'] . "'";
        $query1 = mysql_query($sql1);
    }
    Header('location:index.php?mod=quanliTailieu');
}
?>

<?php echo $output; ?>

<div class="link"><a href="?mod=addTailieu">Thêm Loại Tin </a></div>