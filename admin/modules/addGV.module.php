
<?php
 
    if(isset($_POST['btaddGV'])){
        $tenGiaoVien =   $_POST['tengiaovien'];
		$chucvu =   $_POST['chucvu'];
        $Sodt =   $_POST['Sodt'];
        $Email =   $_POST['Email'];
        $ins = "INSERT INTO tblgiaovien(tenGiaoVien,ChucVu,Sodt,Email) 
                    VALUES('$tenGiaoVien','$chucvu','$Sodt','$Email')";
					echo "$ins";
        $kq=mysql_query($ins);
        if($kq){
          $output1 = '<div class="thongbao">Thành Công</div>';
            header('location:index.php?mod=quanliGV');
        }else
           $output1 = '<div class="thongbao">Thất bại</div>';

    }

?>

    <div id="formbox"> 
        <div class="tt">THÊM MỚI GIÁO VIÊN</div>
        <form method="POST" name="updateGV" action="">     

            <div class="form-regit">
            <div class="label">Tên giáo viên  </div>
            <div class="value"><input  type="text" name="tengiaovien" id="tengiaovien"></div>
         </div>
		<div class="form-regit">
            <div class="label">Chức vụ </div>
            <div class="value"><input  type="text"   name="chucvu" id="chucvu" ></div>
        </div>
		
         <div class="form-regit">
            <div class="label">Số điện thoại </div>
            <div class="value"><input  type="text" name="Sodt" id="Sodt1" ></div>
         </div>
        <div class="form-regit">
            <div class="label">Email </div>
            <div class="value"><input  type="text" name="Email" id="Email1"></div>
         </div>
            
           <div class="form-but">
                <div class="float"><input type="submit" style="background-image:url(../images/chapnhan.png); width:74px; height:28px;" value="" name="btaddGV" id="btaddGV" />
                </div>
                <div class="float"><input type="reset" style="background-image:url(../images/nhaplai.png); width:74px; height:28px;" value="" name="btaddGVre" id="btaddGVre"/> </div>

                <div class="clear"></div>
                 <div class="link"><a href="index.php?mod=quanliGV">Xem danh sách giáo viên </a> </div>     	
            </div>      
        </form>
        <div class="clear"></div>
            <div class="link"><?php echo $output1; ?><div class="link">
    </div>
   


