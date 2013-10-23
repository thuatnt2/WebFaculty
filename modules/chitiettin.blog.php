<div class="display-blog">
    <?php
    error_reporting(0);
    include_once('includes/connect-db.inc');
    ?>
    <?php
    $id = $_GET["id_tintuc"];
    $sql = "SELECT * FROM tbl_thongbaogv WHERE idTB = {$id}";
    $result = mysql_query($sql);

    while ($row = mysql_fetch_array($result)) {


        $output .= '<div class="link float">' . $row["tenTB"] . '</div>';
        $output .= '<div style="font-size:11px;padding-top:23px;">' . $row["date"] . '</div> <div class="clear"></div>';
        $output .= '<div>' . $row["ndTB"] . '</div>';
    }
    $query = mysql_query($sql);
    $row = mysql_fetch_array($query);
    $solanxem = $row['solanxem'];
    $kq = "update tbl_thongbaogv set solanxem='" . ($solanxem + 1) . "' where  idTB='" . $id . "'";
    $query1 = mysql_query($kq);
    ?>
    <?php
    echo $output;
    echo '<div style="font-size:12px;float:right;padding:20px 30px 0 0;">' . $solanxem . ' lần xem</div>';
    ?>


    <div class="tinmoinhat">Các tin liên quan</div>
<?php
$idtloai = $_GET["id_theloai"];
$sql1 = "SELECT * FROM tbl_thongbaogv WHERE idLoai=$idtloai LIMIT 0,7";
$res = mysql_query($sql1);
while ($row_lienquan = mysql_fetch_array($res)) {
    $out .='<div class="clear"></div>';
    $id = $row_lienquan['idTB'];
    $out .= '<div class="item-link float">' . '<a href="?mod=chitiettin&id_tintuc=' . $id . '&id_theloai=' . $idtloai . '">' . $row_lienquan['tenTB'] . '</a>' . '</div>';
}
echo $out;
?>

</div>
