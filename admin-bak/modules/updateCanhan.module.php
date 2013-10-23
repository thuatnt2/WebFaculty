
<?php
$sql1 = "SELECT * FROM admin WHERE id_ad= " . $_SESSION['id_ad'];
$rs1 = mysql_query($sql1);
$row1 = mysql_fetch_array($rs1);
?>

<?php
if (isset($_POST['btudCN'])) {
    $username= $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $Email =   $_POST['Email'];
    $Sodt =   $_POST['Sodt'];
        

    $capnhatad = "UPDATE admin SET username='$username', password='$password', fullname='$fullname',Email='$Email',Sodt='$Sodt'
                    where id_ad=" .  $_SESSION['id_ad'];
    $kq1 = mysql_query($capnhatad);
    if ($kq1) {
        //   echo '<div class="thongbao">Cập nhật thông tin thành công</div>';
        header('location: index.php?mod=ttCanhan');
    }
    else
        $output1 = '<div class="thongbao">Cập nhật thông tin thất bại</div>';
}
?>
<div id="formbox"> 
    <div class="tt">CẬP NHẬT THÔNG TIN CÁ NHÂN</div>
    <form method="POST" name="updateCanhan" action="">     

        <div class="form-regit">
            <div class="label">Tên Đăng Nhập</div>
            <div class="value"><input  type="text" name="username" id="user2" value="<?php echo $row1['username'] ?>" ></div>
        </div>
        <div class="form-regit">
            <div class="label">Mật khẩu</div>
            <div class="value"><input type=password name="password" id="pass2" value="<?php echo $row1['password'] ?>"> </div>
        </div>
        <div class="form-regit">
            <div class="label">Tên</div>
            <div class="value"><input  type="text"  name="fullname" id="fname2" value="<?php echo $row1['fullname'] ?>"></div>
        </div>
        <div class="form-regit">
            <div class="label">Email </div>
            <div class="value"><input  type="text" name="Email" id="em2"value="<?php echo $row1['Email'] ?>"></div>
         </div>
         <div class="form-regit">
            <div class="label">Số điện thoại </div>
            <div class="value"><input  type="text" name="Sodt" id="sdt2" value="<?php echo $row1['Sodt'] ?>"></div>
         </div>

        <div class="form-but">
            <div class="float"><input type="submit" style="background-image:url(../images/chapnhan.png); width:74px; height:28px;" value="" name="btudCN" id="btcapnhatCanhan" />
            </div>
            <div class="float"><input type="reset" style="background-image:url(../images/nhaplai.png); width:74px; height:28px;" value="" name="btudCNre" id="btcapnhatCanhanre"/> </div>

            <div class="clear"></div>
            <div class="link"><a href="index.php?mod=quanliAdmin">Xem Lại Thông Tin</a> </div>     	
        </div>      
    </form>
    <div class="clear"></div>
            <div class="link"><?php echo $output1; ?><div class="link">
    </div>

