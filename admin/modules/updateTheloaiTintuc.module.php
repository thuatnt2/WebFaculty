
<?php

$sql1 = "SELECT * FROM tbltheloai WHERE id_theloai= ".$_GET["id"];
$rs1 = mysql_query($sql1);
$row1 = mysql_fetch_array($rs1);
?>
<?php
 
    if(isset($_POST['btupdateTL'])){ 
        $ten_theloai =   $_POST['ten_theloai'];
      
        $capnhat = "UPDATE tbltheloai SET ten_theloai='$ten_theloai'
                    where id_theloai=".$_GET['id'];
        $kq = mysql_query($capnhat);
        if($kq){
        //   echo '<div class="thongbao">Cập nhật thông tin thành công</div>';
           header('location:index.php?mod=quanliTL');
        }else
           echo '<div class="thongbao">Cập nhật thông tin thất bại</div>';

    }

?>
<div id="formbox"> 
        <div class="tt">CẬP NHẬT THỂ LOẠI TIN TỨC</div>
        <form method="POST" name="updateTL" action="">     

             <div class="form-regit">
            <div class="label">Mã thể loại </div>
            <div class="value"><input  type="text" disabled="disabled" name="id_theloai" id="id_theloai" value="<?php echo $row1['id_theloai'] ?>" ></div>
         </div>
            <div class="form-regit">
            <div class="label">Tên thể loại </div>
            <div class="value"><input  type="text" name="ten_theloai" id="ten_theloai1" value="<?php echo $row1['ten_theloai'] ?>" ></div>
         </div>

            <div class="form-but">
                <div class="float"><input type="submit" style="background-image:url(../images/chapnhan.png); width:74px; height:28px;" value="" name="btupdateTL" id="btupdateTL" />
                </div>
                <div class="float"><input type="reset" style="background-image:url(../images/nhaplai.png); width:74px; height:28px;" value="" name="btupdateTLre" id="btupdateTLre"/> </div>

                <div class="clear"></div>
                 <div class="link"><a href="index.php?mod=quanliTL">Xem tin </a> </div>     	
            </div>      
        </form>
    </div>