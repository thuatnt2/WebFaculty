
<?php
error_reporting(0);
include_once('includes/connect-db.inc');
?>
    <div class="tieude tinmoinhat">Th&ocirc;ng Tin M&#417;&#769;i Nh&acirc;&#769;t </div>
  
    <?php
    /*
     * Thong bao chung
     */
    $sqltb = "SELECT * FROM tbltintuc WHERE id_theloai='1' OR id_theloai='2' ORDER BY ngaythang DESC LIMIT 0,3";
    $resulttb = mysql_query($sqltb);
    $output .= '<div class="contain_total">';
    $output .= '<div class="tablines"><ul class="maintabs">
                        <li><a href="?mod=thongbaochung">Thông Báo</a></li>     
                    </ul></div>';
    $rowtb = mysql_fetch_array($resulttb);
    //   while ($row = mysql_fetch_array($result)) {
    $idtb = $rowtb['id_tintuc'];
    $id_theloaitb = $rowtb['id_theloai'];

    $output .='<div class="contain_content float">';
    $output .= '<div class="contain_title float">' . '<a href="?mod=chitiettin&id_tintuc=' . $idtb . '&id_theloai=' . $id_theloaitb . '">' . $rowtb['tieude'] . '</a></div>';
    $output .='<div class="clear"></div>';
    $tenanhtb = $rowtb["ten_anh"];
    $path = "anhTintuc/" . $tenanhtb;
    $output .= '<div class="hinh float"><a href="' . $path . '" rel="lightbox[roadtrip]" title=""><img src="anhTintuc/' . $rowtb["ten_anh"] . '" width="100px" height="100px" /></a></div>';

    //dem so tu trong noi dung 
    $ndtb = $rowtb['noidung'];

    $output .='<div class="tomtat">' . noidungtt(30, $ndtb) . '</div>';
    $output .='<div style="font-size:11px; float:right; padding-right:20px;">' . '<a href="?mod=chitiettin&id_tintuc=' . $idtb . '&id_theloai=' . $id_theloaitb . '"> xem thêm </a>';
    $output .='</div>';
   
    $output .='</div>';
    $output .='<div class="clear"></div>';
    $output .='<div class="more">';
    $output .='<div class="tieude tinthem">MORE:</div>';
    while ($rowtb = mysql_fetch_array($resulttb)) {
        $output .= '<div>' . '<a href="?mod=chitiettin&id_tintuc=' . $idtb . '&id_theloai=' . $id_theloaitb . '">' . $rowtb['tieude'] . '</a></div>';
    }
    $output .='</div>';
    $output .='<div class="clear"></div>';
    $output .='</div>';
    ?>
    
    
    <?php
    /*
     * Hoat dong khoa
     */
    $sqlhd = "SELECT * FROM tbltintuc WHERE id_theloai='3' ORDER BY ngaythang DESC LIMIT 0,3";
    $resulthd = mysql_query($sqlhd);
    $output .= '<div class="contain_total">';
    $output .= '<div class="tablines"><ul class="maintabs">
                        <li><a href="?mod=hoatdongkhoa">Hoạt Động Khoa</a></li>     
                    </ul></div>';
    $rowhd = mysql_fetch_array($resulthd);
    //   while ($row = mysql_fetch_array($result)) {
    $id = $rowhd['id_tintuc'];
    $id_theloaihd = $rowhd['id_theloai'];

    $output .='<div class="contain_content float">';
    $output .= '<div class="contain_title float">' . '<a href="?mod=chitiettin&id_tintuc=' . $id . '&id_theloai=' . $id_theloaihd . '">' . $rowhd['tieude'] . '</a></div>';
    $output .='<div class="clear"></div>';
    $tenanhhd = $rowhd["ten_anh"];
    $path = "anhTintuc/" . $tenanhhd;
    $output .= '<div class="hinh float"><a href="' . $path . '" rel="lightbox[roadtrip]" title=""><img src="anhTintuc/' . $rowhd["ten_anh"] . '" width="100px" height="100px" /></a></div>';
    
    $ndhd = $rowhd['noidung'];
    $output .='<div class="tomtat">' . noidungtt(30, $ndhd) . '</div>';
    $output .='<div style="font-size:11px; float:right; padding-right:20px;">' . '<a href="?mod=chitiettin&id_tintuc=' . $id . '&id_theloai=' . $id_theloaihd . '"> xem thêm </a>';
    $output .='</div>';
       
    $output .='</div>';
    $output .='<div class="clear"></div>';
    $output .='<div class="more">';
    $output .='<div class="tieude tinthem">MORE:</div>';
    while ($rowhd = mysql_fetch_array($resulthd)) {
        $output .= '<div>' . '<a href="?mod=chitiettin&id_tintuc=' . $id . '&id_theloai=' . $id_theloaihd . '">' . $rowhd['tieude'] . '</a></div>';
    }
    $output .='</div>';
    $output .='<div class="clear"></div>';
    // }
    $output .='</div>';
    ?>
    
    <?php
    /*
     * Lien chi doan khoa
     */
    $sql = "SELECT * FROM tbltintuc WHERE id_theloai='4' ORDER BY ngaythang DESC LIMIT 0,3";
    $result = mysql_query($sql);
    $output .= '<div class="contain_total">';
    $output .= '<div class="tablines"><ul class="maintabs">
                        <li><a href="?mod=lienchidoan">Liên Chi Đoàn Khoa</a></li>     
                    </ul></div>';
    $row = mysql_fetch_array($result);
    //   while ($row = mysql_fetch_array($result)) {
    $id = $row['id_tintuc'];
    $id_theloai = $row['id_theloai'];

    $output .='<div class="contain_content float">';
    $output .= '<div class="contain_title float">' . '<a href="?mod=chitiettin&id_tintuc=' . $id . '&id_theloai=' . $id_theloai . '">' . $row['tieude'] . '</a></div>';
    $output .='<div class="clear"></div>';
    $tenanh = $row["ten_anh"];
    $path = "anhTintuc/" . $tenanh;
    $output .= '<div class="hinh float"><a href="' . $path . '" rel="lightbox[roadtrip]" title=""><img src="anhTintuc/' . $row["ten_anh"] . '" width="100px" height="100px" /></a></div>';


    $nd = $row['noidung'];

    $output .='<div class="tomtat">' . noidungtt(30, $nd) . '</div>';
    $output .='<div style="font-size:11px; float:right; padding-right:20px;">' . '<a href="?mod=chitiettin&id_tintuc=' . $id . '&id_theloai=' . $id_theloai . '"> xem thêm </a>';
    $output .='</div>';
       
    $output .='</div>';
    $output .='<div class="clear"></div>';
    $output .='<div class="more">';
    $output .='<div class="tieude tinthem">MORE:</div>';
    while ($row = mysql_fetch_array($result)) {
        $output .= '<div>' . '<a href="?mod=chitiettin&id_tintuc=' . $id . '&id_theloai=' . $id_theloai . '">' . $row['tieude'] . '</a></div>';
    }
    $output .='</div>';
    $output .='<div class="clear"></div>';
    // }
    $output .='</div>';
    ?>
    
    <?php
    echo $output;
    ?>


<?php

//ham lay noi dung tom tat
function noidungtt($sotu, $noidung) {

    $n = explode(" ", $noidung);
    $noidunginra = " ";
    if ($sotu <= count($n)) {
        for ($i = 0; $i < $sotu; $i++)
            $noidunginra = $noidunginra . $n[$i] . " ";
        return $noidunginra . "...";
    }
    else
        return $noidung;
}
?>

