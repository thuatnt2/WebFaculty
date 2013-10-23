
<?php

$sql1 = "SELECT * FROM tblgiaovien WHERE idGV= ".$_GET["id"];
$rs1 = mysql_query($sql1);
$row1 = mysql_fetch_array($rs1);

?>
   
<?php
 
    if(isset($_POST['btupdateGV'])){ 

        $tenGiaoVien =   $_POST['tenGiaoVien'];
        $ChucVu =   $_POST['ChucVu'];
        $Sodt =   $_POST['Sodt'];
        $Email =   $_POST['Email'];
       
        $capnhat = "UPDATE tblgiaovien SET  tenGiaoVien='$tenGiaoVien',ChucVu='$ChucVu', Sodt='$Sodt', Email='$Email'
                    where idGV=".$_GET['id'];
					echo "$capnhat";
        $kq = mysql_query($capnhat);
        if($kq){
        //   echo '<div class="thongbao">Cập nhật thông tin thành công</div>';
           header('location:index.php?mod=quanliGV');
        }else
           $output1 = '<div class="thongbao">Cập nhật thông tin thất bại</div>';

    }

?>
    <div id="formbox"> 
        <div class="tt">CẬP NHẬT GIÁO VIÊN</div>
        <form method="POST" name="updateGV" action="">     
		 <div class="form-regit">
            <div class="label">Tên</div>
            <div class="value"><input  type="text"  name="tenGiaoVien" id="tenGiaoVien" value="<?php echo $row1['tenGiaoVien'] ?>"></div>
		</div>
         
         <div class="form-regit">
            <div class="label">Chức vụ</div>
            <div class="value"><input  type="text"   name="ChucVu" id="ChucVu" value="<?php echo $row1['ChucVu'] ?>"></div>
        </div>
         <div class="form-regit">
            <div class="label">Số điện thoại </div>
            <div class="value"><input  type="text" name="Sodt" id="Sodt" value="<?php echo $row1['Sodt'] ?>"></div>
         </div>
        <div class="form-regit">
            <div class="label">Email </div>
            <div class="value"><input  type="text" name="Email" id="Email"value="<?php echo $row1['Email'] ?>"></div>
         </div>

            <div class="form-but">
                <div class="float"><input type="submit" style="background-image:url(../images/chapnhan.png); width:74px; height:28px;" value="" name="btupdateGV" id="btupdateGV" />
                </div>
                <div class="float"><input type="reset" style="background-image:url(../images/nhaplai.png); width:74px; height:28px;" value="" name="btupdateGVre" id="btupdateGVre"/> </div>

                <div class="clear"></div>
                 <div class="link"><a href="index.php?mod=quanliGV">Xem Danh sách giáo viên </a> </div>     	
            </div>      
        </form>
   <div class="clear"></div>
            <div class="link"><?php echo $output1; ?><div class="link">
    </div>

