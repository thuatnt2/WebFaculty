﻿ 
<?php
 
    if(isset($_POST['btaddTL'])){
        $ten_theloai =   $_POST['ten_theloai'];
		$menuchinh= $_POST['menuchinh'];
        $ins = "INSERT INTO tbltheloai(ten_theloai,idMnChinh) 
                    VALUES('$ten_theloai','$menuchinh')";		
		echo "$ins";
        $kq=mysql_query($ins);
        if($kq){
          // $output1 = '<div class="thongbao">Thành Công</div>';
            header('location:index.php?mod=quanliTL');
        }else
           $output1 = '<div class="thongbao">Thất bại</div>';

    }

?>
 <div id="formbox"> 
        <div class="tt">THÊM THỂ LOẠI</div>
        <form method="POST" name="updateTL" action="">     
			<div class="form-regit">
            <div class="label">Menu Chính </div>
            <div class="value">
				<select name="menuchinh" id="menuchinh">
                                    <option value=""></option>
					<?php
						$sql="SELECT * FROM tblmenuchinh";
						$result = mysql_query($sql);
						while ($row=mysql_fetch_array($result)){
							echo "<option value=".$row['idMnChinh'].">".$row["tenMnChinh"]."</option>";
				
						}
					?>
        		</select>
			</div>
        </div>
			
            <div class="form-regit">
            <div class="label">Tên thể loại  </div>
            <div class="value"><input  type="text" name="ten_theloai" id="ten_theloai"></div>
         </div>
		 
            
           <div class="form-but">
                <div class="float"><input type="submit" style="background-image:url(../images/chapnhan.png); width:74px; height:28px;" value="" name="btaddTL" id="btaddTL" />
                </div>
                <div class="float"><input type="reset" style="background-image:url(../images/nhaplai.png); width:74px; height:28px;" value="" name="btaddTLre" id="btaddTLre"/> </div>

                <div class="clear"></div>
                 <div class="link"><a href="index.php?mod=quanliTL">Xem danh sách</a> </div>     	
            </div>      
        </form>
        <div class="clear"></div>
            <div class="link"><?php echo $output1; ?><div class="link">
    </div>