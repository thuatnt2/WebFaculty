<!--hien thi noi dung chi tiet tin-->
    <?php
    error_reporting(0);
    include_once('includes/connect-db.inc');
    ?>
    <?php
    $id = $_GET["id_tintuc"];
    $sql = "SELECT * FROM tbltintuc WHERE id_tintuc = {$id}";
    $result = mysql_query($sql);

    while ($row = mysql_fetch_array($result)) {   
        //chuyen doi ngay
        $date = $row['ngaythang'];
        $d = getdate(strtotime($date));
        $inngay = $d['mday'].'/'.$d['mon'].'/'.$d['year'];

        $output .= '<div class="tieude tenthongbao float">' . $row["tieude"] . '</div>';
        $output .= '<div style="font-size:11px;padding-top:23px;">' . $inngay .'<span style="padding:10px;">Author: '. $row['tacgia'] . '</span></div>
                    <div class="clear"></div>';
        $output .= '<div>' . $row["noidung"] . '</div>';
    }
    $query = mysql_query($sql);
    $row = mysql_fetch_array($query);
    $solanxem = $row['solanxem'];
    $kq = "update tbltintuc set solanxem='" . ($solanxem + 1) . "' where  id_tintuc='" . $id . "'";
    $query1 = mysql_query($kq);
    ?>
    <?php
    echo $output;
    echo '<div style="font-size:12px;float:right;padding:5px 30px 0 0;">(' . $solanxem . ' lần xem)</div>';
    ?>

<!--lay tin cung the loai tru chinh no-->
    <div class="tieude tinlienquan">Các tin liên quan</div>
    <?php
    $idtloai = $_GET["id_theloai"];
    $sql1 = "SELECT * FROM tbltintuc WHERE id_theloai=$idtloai AND id_tintuc<>$id LIMIT 0,5";
    $res = mysql_query($sql1);
    while ($row_lienquan = mysql_fetch_array($res)) {
        $out .='<div class="clear"></div>';
        $id = $row_lienquan['id_tintuc'];
        $out .= '<div class="item-link float">' . '<a href="?mod=chitiettin&id_tintuc=' . $id . '&id_theloai=' . $idtloai . '">' . $row_lienquan['tieude'] . '</a>' . '</div>';
    }
    echo $out;
    ?>

