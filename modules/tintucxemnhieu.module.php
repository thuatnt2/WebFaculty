
<?php  
  //  $query_tintucchinh = "SELECT id_tintuc, tieude, noidung, ngaythang FROM tbltintuc ORDER BY id_tintuc DESC";
    $query_tintucchinh = "SELECT * FROM tbltheloai,tbltintuc WHERE tbltintuc.id_theloai=tbltheloai.id_theloai ORDER BY solanxem DESC LIMIT 0,5";
    $tintucchinh = mysql_query($query_tintucchinh) or die(mysql_error());
    $row_tintucchinh = mysql_fetch_assoc($tintucchinh);
?>

  <?php
  while ($row_tintucchinh = mysql_fetch_assoc($tintucchinh)){ ?>
    <a href="?mod=chitiettin&id_tintuc=<?php echo $row_tintucchinh['id_tintuc']; ?>&id_theloai=<?php echo $row_tintucchinh['id_theloai']?>"><?php echo $row_tintucchinh['tieude']; ?></a>
    <br />
    <?php } ?>

<?php
 
mysql_free_result($tintucchinh);

?>
