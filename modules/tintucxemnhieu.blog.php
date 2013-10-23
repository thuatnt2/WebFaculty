
<?php
  //  $query_tintucchinh = "SELECT id_tintuc, tieude, noidung, ngaythang FROM tbltintuc ORDER BY id_tintuc DESC";
    $query_tintucchinh = "SELECT * FROM tbl_thongbaogv WHERE idGV = {$idGV} ORDER BY solanxem DESC LIMIT 0,5";
    $tintucchinh = mysql_query($query_tintucchinh) or die(mysql_error());
    $row_tintucchinh = mysql_fetch_assoc($tintucchinh);
    $totalRows_tintucchinh = mysql_num_rows($tintucchinh);
?>

  <?php do { ?>
    <a href="?mod=chitiettin&id_tintuc=<?php echo $row_tintucchinh['idTB']; ?>"><?php echo $row_tintucchinh['tenTB']; ?></a>
    <br />
    <?php } while ($row_tintucchinh = mysql_fetch_assoc($tintucchinh)); ?>

<?php
 
mysql_free_result($tintucchinh);

?>
