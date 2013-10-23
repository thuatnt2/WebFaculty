
<?php
$query_tintucchinh = "SELECT * FROM tbltintuc ORDER BY ngaythang DESC LIMIT 0,5";
$tintucchinh = mysql_query($query_tintucchinh) or die(mysql_error());
$row_tintucchinh = mysql_fetch_assoc($tintucchinh);
$totalRows_tintucchinh = mysql_num_rows($tintucchinh);
?>

<?php do { ?>
    <ul><li>
       <a href="?mod=chitiettin&id_tintuc=<?php echo $row_tintucchinh['id_tintuc']; ?>&id_theloai=<?php echo $row_tintucchinh['id_theloai'] ?>"><?php echo $row_tintucchinh['tieude']; ?></a>
    </ul></li>
<?php } while ($row_tintucchinh = mysql_fetch_assoc($tintucchinh)); ?>

<?php
mysql_free_result($tintucchinh);
?>
