

<div class="block" id="link" >
    <div class="block-title">TIN MỚI NHẤT<div id="show" class="mo1">-</div> <div id="show" class="dong1">+</div>  </div>
    <div class="block-content" id="link11">
        <?php
        error_reporting(0);
        include('modules/tinmoinhat.module.php');
        ?>

    </div>
</div>
<?php
//  $query_tintucchinh = "SELECT id_tintuc, tieude, noidung, ngaythang FROM tbltintuc ORDER BY id_tintuc DESC";
$query = "SELECT * FROM tbltheloai,tbltintuc WHERE tbltintuc.id_theloai=tbltheloai.id_theloai ORDER BY solanxem DESC LIMIT 0,5";
$rs = mysql_query($query) or die(mysql_error());

?>
<div class="block" id="link" >    
    <div class="block-title">TIN NỔI BẬT<div id="show" class="mo2">-</div> <div id="show" class="dong2">+</div>  </div>
    <div class="jcarouse" id="link12">
        <ul>
            <?php while ($row_tintucchinh = mysql_fetch_array($rs)) { ?>           
                <li>
                    <div class="thumb">
                        <img src="anhTintuc/<?php echo $row_tintucchinh['ten_anh'] ?>"repeat alt="<?php echo $row_tintucchinh['tieude'] ?>" title="<?php echo $row_tintucchinh['tieude'] ?>" />
                    </div>
                    <div class="info">
                        <a href="?mod=chitiettin&id_tintuc=<?php echo $row_tintucchinh['id_tintuc']; ?>&id_theloai=<?php echo $row_tintucchinh['id_theloai'] ?>"><?php echo $row_tintucchinh['tieude']; ?></a>
                    </div>
                    <div class="clr"></div>
                </li> 
            <?php } ?>
        </ul>
    </div>
</div>

<!--<div class="block" id="link">
    <div class="block-title">THĂM DÒ  <div id="show" class="mo3">-</div> <div id="show" class="dong3">+</div></div>
    <div class="block-content" id="link13">
        <div class="div-limited">
<?php
// error_reporting(0);
include('modules/giaodien/poll.module.php');
?>
        </div>
    </div>
</div>-->

<div class="block" id="link">
    <div class="block-title">THỐNG KÊ<div id="show" class="mo4">-</div> <div id="show" class="dong4">+</div></div>
    <div class="block-content" id="link14" style="height: 50px; padding: 1em;">        
        <?php
        error_reporting(0);
        include('includes/countvisiter.inc');
        include('includes/countonline.inc');
        ?>
    </div>
</div>

