
<?php
    $query_monhoc = "SELECT * FROM tbl_theloaitbgv WHERE idGV = {$idGV}";
    $monhoc = mysql_query($query_monhoc) or die(mysql_error());
    $row_monhoc = mysql_fetch_assoc($monhoc);
    $totalRows_monhoc = mysql_num_rows($monhoc);
?>

  <?php do {
        $sql_query = @mysql_query("SELECT COUNT(idLoai) AS sobai FROM tbl_thongbaogv WHERE idLoai='{$row_monhoc[idLoai]}'");
        $baiviet = @mysql_fetch_array( $sql_query ); 
     ?>
    
    <a href="?mod=danhmuctin&idGV=<?php echo $idGV; ?>&idLoai=<?php echo $row_monhoc['idLoai'];?>"><?php echo $row_monhoc['tenLoai']; ?></a> (<?php echo $baiviet['sobai']; ?>)
    <br />
    <?php } while ($row_monhoc = mysql_fetch_assoc($monhoc)); ?>

<?php
 
mysql_free_result($monhoc);

?>
