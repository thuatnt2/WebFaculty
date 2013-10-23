
<?php
$query_doingugiaovien = "SELECT idGV, tenGiaoVien, ChucVu, Sodt, Email FROM tblgiaovien";
$doingugiaovien = mysql_query($query_doingugiaovien) or die(mysql_error());
$row_doingugiaovien = mysql_fetch_assoc($doingugiaovien);
$totalRows_doingugiaovien = mysql_num_rows($doingugiaovien);
$db = mysql_query("SELECT idGV, tenGiaoVien, ChucVu, Sodt, Email FROM tblgiaovien");
?>

<div id="content">
    <form method="post">
        <table cellpadding="10">
            <tr class='filehead'>
                <td >Họ và tên</td>
                <td >Chức vụ</td>
                <td >Số điện thoại</td>
                <td >Email</td>

            </tr >
            <?php while ($gvien = mysql_fetch_array($db)) { ?>
                <tr class="filecontent">
                    <td> <a href="blog.php?idGV=<?php echo $gvien['idGV']; ?>"><?php echo $gvien['tenGiaoVien']; ?></a>
                    </td>
                    <td><?php echo $gvien['ChucVu']; ?></td>
                    <td><?php echo $gvien['Sodt']; ?></td>
                    <td><?php echo $gvien['Email']; ?></td>

                </tr>
            <?php } ?>
        </table>
    </form>
</div>

<?php
mysql_free_result($doingugiaovien);
?>
