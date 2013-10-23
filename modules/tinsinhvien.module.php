
<?php
//  $query_tintucchinh = "SELECT id_tintuc, tieude, noidung, ngaythang FROM tbltintuc ORDER BY id_tintuc DESC";
$query_tintucchinh = "SELECT * FROM tbltintuc WHERE id_theloai='1' ORDER BY ngaythang DESC LIMIT 0,8";
$tintucchinh = mysql_query($query_tintucchinh) or die(mysql_error());
$row_tintucchinh = mysql_fetch_assoc($tintucchinh);
?>

<?php do { ?>
    <ul>
        <li>
            <a href="?mod=chitiettin&id_tintuc=<?php echo $row_tintucchinh['id_tintuc']; ?>&id_theloai=<?php echo $row_tintucchinh['id_theloai'] ?>"><?php echo $row_tintucchinh['tieude']; ?></a>
        </li>
    </ul>
<?php } while ($row_tintucchinh = mysql_fetch_assoc($tintucchinh)); ?>

<?php
mysql_free_result($tintucchinh);
?>
