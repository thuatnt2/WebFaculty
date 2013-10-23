
<?php
if (isset($_POST['btaddAdmin'])) {
    $fullname = $_POST['idgv'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_quyen = $_POST['id_quyen'];

    $ins = "INSERT INTO admin(username,password,idGV,id_quyen) 
            VALUES ('$username','$password','$fullname','$id_quyen')";
	echo "$ins";
    $kq = mysql_query($ins);
    if ($kq) {
        //  $output1 = '<div class="thongbao">Thành Công</div>';
        header('location:index.php?mod=quanliAdmin');
    }
    else
        $output1 = '<div class="thongbao">Thất bại</div>';
}
?>

<div id="formbox"> 
    <div class="tt">THÊM MỚI ADMIN</div>
    <form method="POST" name=addAD" action="">     

        <div class="form-regit">
            <div class="label">Tên Đăng Nhập</div>
            <div class="value"><input  type="text" name="username" id="user" value="<?php echo $row1['username'] ?>" ></div>
        </div>
        <div class="form-regit">
            <div class="label">Mật Khẩu</div>
            <div class="value"><input type=password name="password" id="pass" value="<?php echo $row1['password'] ?>"> </div>
        </div>
        <div class="form-regit">
            <div class="label">Tên</div>
            <div class="value">
				<select name="idgv" id="idgv">
                                    <option value=""></option>
					<?php
						$sql="SELECT * FROM tblgiaovien";
						$result = mysql_query($sql);
						while ($row=mysql_fetch_array($result)){
							echo "<option value=".$row['idGV'].">".$row["tenGiaoVien"]."</option>";
				
						}
					?>
        		</select>
			</div>
        </div>
        <div class="form-regit">
            <div class="label">Quyền Quản Trị</div>
            <div class="value">
                <select name="id_quyen" id="quyen">
                    <option values=""></option>
<?php
$sql = "SELECT * FROM tblphanquyen";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
    echo "<option value=" . $row['id_quyen'] . ">" . $row["tenquyen"] . "</option>";
}
?>
                </select>
            </div>
        </div>

        <div class="form-but">
            <div class="float"><input type="submit" style="background-image:url(../images/chapnhan.png); width:74px; height:28px;" value="" name="btaddAdmin" id="btaddAdmin" />
            </div>
            <div class="float"><input type="reset" style="background-image:url(../images/nhaplai.png); width:74px; height:28px;" value="" name="btaddAdminre" id="btaddAdminre"/> </div>

            <div class="clear"></div>
            <div class="link"><a href="index.php?mod=quanliAdmin">Xem Danh Sách</a> </div>     	
        </div>      
        <div class="clear"></div>
        <div class="link"><?php echo $output1; ?><div class="link">
            </div>


