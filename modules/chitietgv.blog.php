<div class="display">
    <?php
    error_reporting(0);
    include_once('includes/connect-db.inc');
    ?>
    <?php
    $id = $_GET["idGV"];
    $sql = "SELECT * FROM tblgiaovien WHERE idGV = {$id}";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    echo '<div style="font-weight: bold; font-size: 20px;">Giới Thiệu Về Tôi</div>';
    echo '<div>'.$row['ChucVu'].' '.$row['tenGiaoVien'].'</div>';
    echo '<div style="font-weight: bold; font-size: 20px;">Liên Hệ Với Tôi</div>';
    echo '<div>Email: '.$row['Email'].'</div>';
    echo '<div>Số Điện Thoại: '.$row['Sodt'].'</div>';
    
    ?>
    
</div>
