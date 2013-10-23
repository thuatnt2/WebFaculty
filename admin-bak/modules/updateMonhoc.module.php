
<?php
 if($_SESSION["id_ad"]){
	$idGV=$_SESSION["id_ad"];
$sql1 = "SELECT * FROM tbl_theloaitbgv WHERE idLoai= ".$_GET["id"];
$rs1 = mysql_query($sql1);
$row1 = mysql_fetch_array($rs1);

?>
   
<?php
 
    if(isset($_POST['btupdateGV'])){ 
        $tenMonhoc =   $_POST['tenLoai'];
        
       
        $capnhat = "UPDATE tbl_theloaitbgv SET tenLoai='$tenMonhoc'
                    where idLoai=".$_GET['id'];
        $kq = mysql_query($capnhat);
		echo "$capnhat";
        if($kq){
        //   echo '<div class="thongbao">Cập nhật thông tin thành công</div>';
           header('location:index.php?mod=qlymonhoc');
        }else
		
           $output1 = '<div class="thongbao">Cập nhật thông tin thất bại</div>';

    }
}
?>
    <div id="formbox"> 
        <div class="tt">CẬP NHẬT MÔN HỌC</div>
        <form method="POST" name="updateGV" action="">     

            <div class="form-regit">
            <div class="label">Tên Môn Học  </div>
            <div class="value"><input  type="text" name="tenLoai" id="tenLoai" value="<?php echo $row1['tenLoai'] ?>" ></div>
         </div>
		 

            <div class="form-but">
                <div class="float"><input type="submit" style="background-image:url(../images/chapnhan.png); width:74px; height:28px;" value="" name="btupdateGV" id="btupdateGV" />
                </div>
                <div class="float"><input type="reset" style="background-image:url(../images/nhaplai.png); width:74px; height:28px;" value="" name="btupdateGVre" id="btupdateGVre"/> </div>

                <div class="clear"></div>
                 <div class="link"><a href="index.php?mod=quanliGV">Xem tin </a> </div>     	
            </div>      
        </form>
   <div class="clear"></div>
            <div class="link"><?php echo $output1; ?><div class="link">
    </div>

