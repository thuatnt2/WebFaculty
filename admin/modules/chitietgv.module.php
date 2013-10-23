<script language="javascript" src="../taovanban/ckeditor/ckeditor.js" type="text/javascript"></script>
<?php

$sql1 = "SELECT * FROM tblgiaovien WHERE idGV= " . $_SESSION['idGV'];
$rs1 = mysql_query($sql1);
$row1 = mysql_fetch_array($rs1);
header('Location: index.php?mod=updateCanhan');
if (isset($_POST['btnCanhan'])) {
    $tengiaovien= $_POST['tengiaovien'];
    $chuyennganh = $_POST['chuyennganh'];
    $gioithieu = $_POST['gioithieu'];
    $Email =   $_POST['Email'];
    $Sodt =   $_POST['Sodt'];
        

    $capnhatad = "UPDATE tblgiaovien SET tenGiaoVien='$tengiaovien', chuyennganh='$chuyennganh',Email='$Email',Sodt='$Sodt',gioithieu='$gioithieu'
                    where idGV=" .  $_SESSION['idGV'];
    $kq1 = mysql_query($capnhatad);
    if ($kq1) {
        //   echo '<div class="thongbao">Cập nhật thông tin thành công</div>';
        header('location: index.php?mod=ttCanhan');
    }
    else
        $output1 = '<div class="thongbao">Cập nhật thông tin thất bại</div>';
}
?>

<div id="formbox" style="font-size: 13px;"> 
    <div class="tt">THÔNG TIN CÁ NHÂN</div>
   <form method="POST" name="xemTTcanhan" action=""> 
        <div class="form-regit">
            <div class="label">Tên giáo viên</div>
            <div class="value"><input type="text" name="tengiaovien"id="tengiaovien" value="<?php echo $row1['tenGiaoVien'] ?>"></div>
        </div>
        
		<div class="form-regit">
            <div class="label">Chuyên ngành</div>
            <div class="value"><input type="text" name="chuyennganh"id="chuyennganh" value="<?php echo $row1['chuyennganh'] ?>"></div>
        </div>
		
        <div class="form-regit">
            <div class="label">Email </div>
            <div class="value"><input type="text" name="Email"id="Email" value="<?php echo $row1['Email'] ?>"></div>
         </div>
         <div class="form-regit">
            <div class="label">Số điện thoại </div>
            <div class="value"><input type="text" name="Sodt"id="Sodt" value="<?php echo $row1['Sodt'] ?>"></div>
         </div>
		<div class="form-regit">
            <div class="label">Giới thiệu Chung</div>
            <div class="value"><textarea name="gioithieu" id="noidung1"></textarea>
            <script type="text/javascript">CKEDITOR.replace('noidung1'); </script>
            </div>           
         </div>
        <div class="form-but">
            <div class="float"><input type='submit' style="background-image:url(../images/chapnhan.png); width:74px; height:28px;" value="" name="btnCanhan" id="btnCanhan" />
            </div>          	
        </div>    
   </form>
