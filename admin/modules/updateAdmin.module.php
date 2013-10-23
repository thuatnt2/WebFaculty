
<?php
$sql1 = "SELECT * FROM admin WHERE id_ad= " . $_GET["id"];
$rs1 = mysql_query($sql1);
$row1 = mysql_fetch_array($rs1);
?>

<?php
if (isset($_POST['btupdateAD'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $Email = $_POST['Email'];
    $Sodt = $_POST['Sodt'];
    $id_quyen = $_POST['id_quyen'];

    $capnhatad = "UPDATE admin SET username='$username', password='$password', fullname='$fullname', 
                    Email='$Email',Sodt='$Sodt', id_quyen='$id_quyen'
                    where id_ad=" . $_GET['id'];
    $kq1 = mysql_query($capnhatad);
    if ($kq1) {
        //   echo '<div class="thongbao">Cập nhật thông tin thành công</div>';
        header('location:index.php?mod=quanliAdmin');
    }
    else
        $output1 = '<div class="thongbao">Cập nhật thông tin thất bại</div>';
}
?>
<div id="formbox"> 
    <div class="tt">CẬP NHẬT ADMIN</div>
    <form method="POST" name="updateAD" action="">     

        <div class="form-regit">
            <div class="label">Tên Đăng Nhập</div>
            <div class="value"><input  type="text" name="username" id="user1" value="<?php echo $row1['username'] ?>" ></div>
        </div>
        <div class="form-regit">
            <div class="label">Mật khẩu</div>
            <div class="value"><input type=password name="password" id="pass1" value="<?php echo $row1['password'] ?>"> </div>
        </div>
        <div class="form-regit">
            <div class="label">Tên</div>
            <div class="value"><input  type="text"  name="fullname" id="fname1" value="<?php echo $row1['fullname'] ?>"></div>
        </div>
        <div class="form-regit">
            <div class="label">Email </div>
            <div class="value"><input  type="text" name="Email" id="em1" value="<?php echo $row1['Email'] ?>"></div>
        </div>
        <div class="form-regit">
            <div class="label">Số điện thoại </div>
            <div class="value"><input  type="text" name="Sodt" id="sdt1" value="<?php echo $row1['Sodt'] ?>"></div>
        </div>
        <div class="form-regit">
            <div class="label">Quyền Quản Trị</div>
            <div class="value">
                <select name="id_quyen" id="quyen1">
                    <?php
                    $sql = "SELECT * FROM tblphanquyen";
                    $result = mysql_query($sql);
                    while ($row = mysql_fetch_array($result)) {                      
                        echo "<option value=\"".$row["id_quyen"]."\"";
                        if ($row["id_quyen"]==$row1["id_quyen"]) echo "selected";
                        echo ">";
                        echo $row["tenquyen"];"</option>";   
      }
                    
                    ?>
                </select>
            </div>
        </div>

        <div class="form-but">
            <div class="float"><input type="submit" style="background-image:url(../images/chapnhan.png); width:74px; height:28px;" value="" name="btupdateAD" id="btupdateAD"/>
            </div>
            <div class="float"><input type="reset" style="background-image:url(../images/nhaplai.png); width:74px; height:28px;" value="" name="btADre" id="btADre"/> </div>

            <div class="clear"></div>
            <div class="link"><a href="index.php?mod=quanliAdmin">Xem Danh Sách</a> </div>     	
        </div>      
    </form>
    <div class="clear"></div>
    <div class="link"><?php echo $output1; ?><div class="link">
        </div>

