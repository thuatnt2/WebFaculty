
<?php
$sql1 = "SELECT * FROM loaitin WHERE idloai= " . $_GET["id"];
$rs1 = mysql_query($sql1);
$row1 = mysql_fetch_array($rs1);
?>
<?php
if (isset($_POST['btupdateTailieu'])) {
    $tenloai = $_POST['tenloai'];


    $capnhat = "UPDATE loaitin SET tenloai='$tenloai' where idloai=" . $_GET['id'];

    $kq = mysql_query($capnhat);

    if ($kq) {
        echo '<div class="thongbao">Cập nhật thông tin thành công</div>';
        header('location:index.php?mod=quanliTailieu');
    }
    else
        echo '<div class="thongbao">Cập nhật thông tin thất bại</div>';
}
?>
<div id="formbox"> 
    <div class="tt">CẬP NHẬT LOẠI TẬP TIN UPLOAD</div>
    <form method="POST" name="updateTailieu" action="">     

        <div class="form-regit">
            <div class="label">Mã loại </div>
            <div class="value"><input  type="text" disabled="disabled" name="idloai" id="idloai1" value="<?php echo $row1['idloai'] ?>" ></div>
        </div>
        <div class="form-regit">
            <div class="label">Tên loại tin </div>
            <div class="value"><input  type="text" name="tenloai" id="tenloai1" value="<?php echo $row1['tenloai'] ?>" ></div>
        </div>

        <div class="form-but">
            <div class="float"><input type="submit" style="background-image:url(../images/chapnhan.png); width:74px; height:28px;" value="" name="btupdateTailieu" id="btupdateTailieu" />
            </div>
            <div class="float"><input type="reset" style="background-image:url(../images/nhaplai.png); width:74px; height:28px;" value="" name="btupdateTailieure" id="btupdateTailieure"/> </div>

            <div class="clear"></div>
            <div class="link"><a href="index.php?mod=quanliTL">Xem tin </a> </div>     	
        </div>      
    </form>
</div>