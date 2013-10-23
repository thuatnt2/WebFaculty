
<?php
$idtloai = $_GET['id_theloai'];

if (isset($idtloai)) {
    $s1 = "SELECT ten_theloai FROM tbltheloai,tbltintuc WHERE tbltintuc.id_theloai=tbltheloai.id_theloai AND tbltheloai.id_theloai=$idtloai";
    $rs1 = mysql_query($s1);
    $row = mysql_fetch_array($rs1);
    echo ' <div class="tieude contain_ndtin">Bản Tin Khoa > ' . $row['ten_theloai'] . '</div>';
    //phan trang   
    //xac dinh bao nhiu dong trong 1 trang
    $display = 5;

    if (isset($_GET['page']) && (int) $_GET['page']) {
        $page = $_GET['page'];
    } else {//neu chua xac dinh thi tim so trang
        $query = "SELECT COUNT(id_tintuc) FROM tbltintuc WHERE id_theloai=$idtloai";
        $res = mysql_query($query) or die('khong the select idtintuc');
        $rows = mysql_fetch_array($res, MYSQL_NUM);
        $record = $rows[0];
        if ($record > $display) {
            $page = ceil($record / $display);
        } else {
            $page = 1;
        }
        $start = (isset($_GET['start']) && (int) $_GET['start'] >= 0) ? $_GET['start'] : 0;
        $sql = "SELECT tieude,id_tintuc,ngaythang, solanxem,id_theloai
					FROM tbltintuc where id_theloai=$idtloai
					ORDER BY ngaythang
					LIMIT $start,$display";
        $result = mysql_query($sql) or die('khong the lay tieu de');
        while ($set = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $id_tintuc = $set['id_tintuc'];
            $tieude = $set['tieude'];
            $date = $set['ngaythang'];
            $d = getdate(strtotime($date));
            $ngay= $d['mday'].'/'.$d['mon'].'/'.$d['year'];
            $solanxem = $set['solanxem'];
            echo "<div class='blockcontent-body'>
                            <ul><li>
                                <a href='?mod=chitiettin&id_tintuc=$id_tintuc&id_theloai=$idtloai'>$tieude</a><span style='padding:10px;'>($ngay)</span><span style='padding:10px;'>(số lần xem: $solanxem)</span>
                            </ul></li></div>";
        }
    }
    ?>
<div>
    <ul class="nav1">
        <?php
        if ($page > 1) {
            //neu can` hien? thi so' trang
            $next = $start + $display;
            $prev = $start - $display;
            $current = ($start / $display) + 1;
            //hien? thi tran prev
            if ($current != 1) {
                echo"<li><a href='?mod=ndTin&id_theloai=$idtloai&start=$prev'>Prev</a></li>";
            }
            // hien thi so link
            for ($i = 1; $i <= $page; $i++) {
                if ($current != $i) {
                    echo "<li><a href='?mod=ndTin&id_theloai=$idtloai&start=" . ($display * ($i - 1)) . "'>$i</a></li>";
                } else {
                    echo"<li>$i</li>";
                }
            }
            //hien thi tran next
            if ($current != $page) {
                echo"<li><a href='?mod=ndTin&id_theloai=$id&start=$next'>Next</a></li>";
            }
        }
        ?>	
    
<?php } ?>
        </ul>
</div>
