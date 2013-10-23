<div class="block-archive" id="link" >
    <div class="block-title-archive" id="link1" >Tin Xem Nhiều Nhất </div>
    <div class="block-content-archive">
        <div class="div-limited-archive" >
            
            <?php
              //  $query_tintucchinh = "SELECT id_tintuc, tieude, noidung, ngaythang FROM tbltintuc ORDER BY id_tintuc DESC";
                $query_tintucchinh = "SELECT * FROM tbl_thongbaogv WHERE idGV = {$idGV} ORDER BY solanxem DESC LIMIT 0,5";
                $tintucchinh = mysql_query($query_tintucchinh) or die(mysql_error());
                $row_tintucchinh = mysql_fetch_assoc($tintucchinh);
                $totalRows_tintucchinh = mysql_num_rows($tintucchinh);
            ?>
            
              <?php do { ?>
                <a href="?mod=chitiettin&idGV=<?php echo $idGV ?>&id_tintuc=<?php echo $row_tintucchinh['idTB']; ?>"><?php echo $row_tintucchinh['tenTB']; ?></a>
                <br />
                <?php } while ($row_tintucchinh = mysql_fetch_assoc($tintucchinh)); ?>
            
            <?php
             
            mysql_free_result($tintucchinh);
            
            ?>


        </div>
    </div>
</div>





<div class="block-archive" id="link">
    <div class="block-title-archive">Môn Học</div>
    <div class="block-content-archive">
        <div class="div-limited-archive">
    <?php  
    $query_monhoc = "SELECT * FROM tbl_theloaitbgv WHERE idGV = {$idGV}";
    $monhoc = mysql_query($query_monhoc) or die(mysql_error());
    $row_monhoc = mysql_fetch_assoc($monhoc);
    $totalRows_monhoc = mysql_num_rows($monhoc);
            do {
        $sql_query = @mysql_query("SELECT COUNT(idLoai) AS sobai FROM tbl_thongbaogv WHERE idLoai='{$row_monhoc[idLoai]}'");
        $baiviet = @mysql_fetch_array( $sql_query ); 
     ?>
    
    <a href="?mod=danhmuctin&idGV=<?php echo $idGV; ?>&idLoai=<?php echo $row_monhoc['idLoai'];?>"><?php echo $row_monhoc['tenLoai']; ?></a> (<?php echo $baiviet['sobai']; ?>)
    <br />
    <?php } while ($row_monhoc = mysql_fetch_assoc($monhoc)); 
 
    mysql_free_result($monhoc);
    
    ?>

        </div>
    </div>
</div>

<div class="block-archive" id="link">
    <div class="block-title-archive">Blog Archive</div>
    <div class="block-content-archive">
        <div class="div-limited-archive">
            <div style="text-align: left; width: 20%;"><ul class="flipMenu">
        <?php
            for ($x=1945; $x<=2100; $x++)
            {   
                $sql_query = @mysql_query("SELECT * FROM tbl_thongbaogv WHERE idGV = {$idGV} AND Year(`date`) = {$x}");
                $loai = @mysql_fetch_array( $sql_query ); 
                if ( @mysql_num_rows($sql_query ) > 0 )
                {
                    echo '<li><a href="?mod=danhmuctiny&idGV='.$idGV.'&year='.$x.'">'.$x.'</a>';
                    echo '<ul>';
                    for($y=1; $y<=12; $y++){
                        
                        $sql_query1 = @mysql_query("SELECT COUNT(idLoai) AS sobai FROM tbl_thongbaogv WHERE idGV = {$idGV} AND Year(`date`) = {$x} AND Month(`date`) = {$y}");
                        $baiviet1 = @mysql_fetch_array( $sql_query1 ); 
                        
                        echo '<li><a href="?mod=danhmuctinm&idGV='.$idGV.'&year='.$x.'&month='.$y.'">Tháng '.$y.'</a>('.$baiviet1["sobai"].')<ul class="flipMenu">';
                        
                        $sql = "SELECT * FROM tbl_thongbaogv WHERE idGV = {$idGV} AND Year(`date`) = {$x} AND Month(`date`) = {$y}";
                        $result = mysql_query($sql);
                            while ($row = mysql_fetch_array($result)) {
                                echo '<li><a href="?mod=chitiettin&idGV='.$idGV.'&id_tintuc='.$row['idTB'].'&id_theloai='.$row['idLoai'].'">'.$row['tenTB'].'</a></li>';
                            }
                        echo '</ul></li>';
                    }
                    echo '</ul></li>';
                }
            }
            
        ?>
            </div>
        </div>
    </div>
</div>

<div class="block-archive" id="link">
    <div class="block-title-archive">About Me</div>
    <div class="block-content-archive">
        <div class="div-limited-archive"><a href="?mod=chitietgv&idGV=<?php echo $idGV ?>" style="font-weight: bold;font-size: 15px;">
        <?php
            $sql_query = @mysql_query("SELECT * FROM tblgiaovien WHERE idGV = {$idGV}");
            $giaovien = @mysql_fetch_array( $sql_query ); 
                if ( @mysql_num_rows($sql_query ) > 0 )
                    echo $giaovien['tenGiaoVien'];
        ?>
        <br/></a>View my complete profile
        </div>
    </div>
</div>