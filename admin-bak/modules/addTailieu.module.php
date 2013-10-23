
<?php
 
    if(isset($_POST['btaddTL'])){
        $tenloai =   $_POST['tenloai'];

        $ins = "INSERT INTO loaitin(tenloai) 
                    VALUES('$tenloai')";			
        $kq=mysql_query($ins);
        if($kq){
           $output1 = '<div class="thongbao">Thành Công</div>';
            header('location:index.php?mod=quanliTailieu');
        }else
           $output1 = '<div class="thongbao">Thất Bại</div>';

    }

?>
 <div id="formbox"> 
        <div class="tt">THÊM LOẠI TẬP TIN</div>
        <form method="POST" name="updateTL" action="">     

            <div class="form-regit">
            <div class="label">Tên loại tin  </div>
            <div class="value"><input  type="text" name="tenloai" id="tenloai"></div>
         </div>
		 
            
           <div class="form-but">
                <div class="float"><input type="submit" style="background-image:url(../images/chapnhan.png); width:74px; height:28px;" value="" name="btaddTaiLieu" id="btaddTaiLieu" />
                </div>
                <div class="float"><input type="reset" style="background-image:url(../images/nhaplai.png); width:74px; height:28px;" value="" name="btaddTaiLieure" id="btaddTaiLieure"/> </div>

                <div class="clear"></div>
                 <div class="link"><a href="index.php?mod=quanliTailieu">Xem tin </a> </div>     	
            </div>      
        </form>
        <div class="clear"></div>
            <div class="link"><?php echo $output1; ?><div class="link">
    </div>