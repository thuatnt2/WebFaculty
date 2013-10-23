
<?php
error_reporting(0);
include_once('includes/connect-db.inc');
$year = $_GET['year'];
$month = $_GET['month'];
?>
<div id="content-blog">
    <?php
    if(!isset($_GET['page'])){  
        $page = 1;  
        } else {  
        $page = $_GET['page'];  
        }  
        // Chọn số kết quả trả về trong mỗi trang mặc định là 10 
        $max_results = 5;
        // Tính số thứ tự giá trị trả về của đầu trang hiện tại 
        $from = (($page * $max_results) - $max_results);  
    $sql = "SELECT * FROM tbl_thongbaogv WHERE idGV = {$idGV} AND  Year(`date`) = {$year} AND Month(`date`) = {$month} ORDER BY date DESC LIMIT 0,10";
    $result = mysql_query($sql);
    
    while ($row = mysql_fetch_array($result)) {

        $id = $row['idTB'];
		$id_theloai= $row['idLoai'];
        $output .= '<div class="contain_total-blog">';
        $output .= '<div class="contain_title-blog float">' . '<a href="?mod=chitiettin&idGV='.$idGV.'&id_tintuc=' . $id. '&id_theloai=' .$id_theloai. '">' . $row['tenTB'] . '</a></div>';
        $output .='<div class="clear"></div>';
        $output .='<div class="contain_content">';
        $tenanh=$row["anh"];
        $path="anhTintuc/".$tenanh;
        $output .= '<div class="hinh float"><a href="'. $path .'" rel="lightbox[roadtrip]" title=""><img src="anhTintuc/'. $row["anh"] .'" width="100px" height="100px" /></a></div>';
        
        $sql_query1 = "SELECT * FROM tbl_theloaitbgv WHERE idLoai = {$id_theloai}";
        $result1 = mysql_query($sql_query1);
        $loai1 = mysql_fetch_array($result1); 
        //dem so tu trong noi dung 
        $nd = $row['ndTB'];
        $demnd = count(explode(" ",$nd));
        
      //  $tomtat=count($nd);
        $date = $row['date'];
        $d = getdate(strtotime($date));
        $inngay = $d['mday'].'/'.$d['mon'].'/'.$d['year'];
        if($demnd > 10){
            $output .='<p style="font-weight: bold; color: blue;">Ngày đăng: '.$inngay. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Môn học: <a href="?mod=danhmuctin&idGV='. $idGV .'&idLoai='.$id_theloai.'">'.$loai['tenLoai'].'</a><p>';
            $output .='<div class="float">' . noidungtt(10, $nd) ;
             $output .= '<span style="font-size:11px;">' . '<a href="?mod=chitiettin&idGV='.$idGV.'&id_tintuc=' . $id . '&id_theloai=' .$id_theloai.'"> xem thêm </a></span>';
             $output .='</div>';
        }
        else {
            $output .='<p style="font-weight: bold; color: blue;">Ngày đăng: '.$inngay. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Môn học: <a href="?mod=danhmuctin&idGV='. $idGV .'&idLoai='.$id_theloai.'">'.$loai['tenLoai'].'</a><p>';
            $output .='<div class="float">' . $row['ndTB'] . '</div>';
            }
        $output .='</div>';

        $output .='<div class="clear"></div>';
        $output .='</div>';
    }
    ?>
    <?php
            echo $output;    $total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM tbl_thongbaogv WHERE idGV = {$idGV} AND  Year(`date`) = {$year} AND Month(`date`) = {$month}"),0);  
        
        // Tính tổng số trang. Làm tròn lên sử dụng ceil()  
        $total_pages = ceil($total_results / $max_results);  
        
        // Tạo liên kết đến các trang đã đánh số thứ tự 
        
        // Tạo liên kết đến trang trước trang đang xem 
        if($page > 1){  
        $prev = ($page - 1);
          
        }  
        for($i = 1; $i <= $total_pages; $i++){  
        if(($page) == $i){  
            
        echo "<div class='page'>";
        echo "$i&nbsp;";  
        
        echo "</div>";
        } else {  
            
        echo "<div class='page'>";
        echo "<a href='blog.php?idGV={$idGV}&page=$i'>$i</a>&nbsp;";  
        
        echo "</div>";
        
        }  
        }  
        // Tạo liên kết đến trang tiếp theo  
        if($page < $total_pages){  
        $next = ($page + 1);  
        }  
            ?>
</div>



<?php

//ham lay noi dung tom tat
function noidungtt($sotu, $noidung) {

    $n = explode(" ", $noidung);
    $noidunginra = " ";
    if ($sotu <= count($n)) {
        for ($i = 0; $i < $sotu; $i++)
            $noidunginra = $noidunginra . $n[$i] . " ";
        $noidunginra .="...";
    }
   
    return $noidunginra;
}
?>

