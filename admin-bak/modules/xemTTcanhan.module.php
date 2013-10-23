
<?php
$sql1 = "SELECT * FROM admin WHERE id_ad= " . $_SESSION['id_ad'];
$rs1 = mysql_query($sql1);
$row1 = mysql_fetch_array($rs1);

if (isset($_POST['btnCanhan'])) {
    header('Location: index.php?mod=updateCanhan');
}
?>

<div id="formbox" style="font-size: 13px;"> 
    <div class="tt">THÔNG TIN CÁ NHÂN</div>
   <form method="POST" name="xemTTcanhan" action=""> 
        <div class="form-regit">
            <div class="label">Tên Đăng Nhập</div>
            <div class="value"><?php echo $row1['username'] ?></div>
        </div>
        <div class="form-regit">
            <div class="label">Mật khẩu</div>
            <div class="value"><?php echo $row1['password'] ?> </div>
        </div>
        <div class="form-regit">
            <div class="label">Tên</div>
            <div class="value"><?php echo $row1['fullname'] ?></div>
        </div>
        <div class="form-regit">
            <div class="label">Email </div>
            <div class="value"><?php echo $row1['Email'] ?></div>
         </div>
         <div class="form-regit">
            <div class="label">Số điện thoại </div>
            <div class="value"><?php echo $row1['Sodt'] ?></div>
         </div>

        <div class="form-but">
            <div class="float"><input type='submit' style="background-image:url(../images/chapnhan.png); width:74px; height:28px;" value="" name="btnCanhan" id="btnCanhan" />
            </div>          	
        </div>    
   </form>


