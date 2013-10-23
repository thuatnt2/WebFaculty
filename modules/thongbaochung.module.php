<!--hien thi toan bo tin trong thong bao chung-->

<div class="contain_ndtin">Thông Báo</div>

<?php

//phan trang   
    //xac dinh bao nhiu dong trong 1 trang
    $display = 5;
    

    if (isset($_GET['page']) && (int) $_GET['page']) {
        $page = $_GET['page'];
    } else {//neu chua xac dinh thi tim so trang
        $query = "SELECT COUNT(id_tintuc) FROM tbltintuc WHERE id_theloai='1' OR id_theloai='2'";
        $res = mysql_query($query) or die('khong the select idtintuc');
        $rows = mysql_fetch_array($res, MYSQL_NUM);
        $record = $rows[0];
        if ($record > $display) {
            $page = ceil($record / $display);
        } else {
            $page = 1;
        }
        $start = (isset($_GET['start']) && (int) $_GET['start'] >= 0) ? $_GET['start'] : 0;
        $sql = "SELECT * FROM tbltintuc WHERE id_theloai='1' OR id_theloai='2' ORDER BY ngaythang DESC
					LIMIT $start,$display";
        $result = mysql_query($sql) or die('loi khong the lay tieu de');
        while ($row = mysql_fetch_array($result)) {           
            echo '<div class="blockcontent-body">
                    <ul><li> <a href="?mod=chitiettin&id_tintuc='.$row['id_tintuc'].'">'. $row['tieude'] .'</a>
                                <span style="padding-left:10px;">('.$row['ngaythang'].')</span>
                    </ul></li>
                  </div>'; 
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
                echo"<li><a href='?mod=thongbaochung&start=$prev'>Prev</a></li>";
            }
            // hien thi so link
            for ($i = 1; $i <= $page; $i++) {
                if ($current != $i) {
                    echo "<li><a href='?mod=thongbaochung&start=" . ($display * ($i - 1)) . "'>$i</a></li>";
                } else {
                    echo"<li>$i</li>";
                }
            }
            //hien thi tran next
            if ($current != $page) {
                echo"<li><a href='?mod=thongbaochung&id_theloai=$id_theloai&start=$next'>Next</a></li>";
            }
        }
        ?>	
    
        </ul>
</div>