<script language="javascript" src="../taovanban/ckeditor/ckeditor.js" type="text/javascript"></script>
<?php
 if($_SESSION["idGV"]){
	$id=$_SESSION["idGV"];
    if(isset($_POST['btaddTin'])){
        $tenLoai = $_POST['tenLoai'];
 
		 $ins = "INSERT INTO tbl_theloaitbgv(tenLoai,idGV) VALUES ('$tenLoai','$id')";
		 echo "$ins";
		 $kq=mysql_query($ins);
        if($kq){
           $output2 = '<div class="thongbao">Thành Công</div>';
            header('location:index.php?mod=qlymonhoc');
        }else
           $output2 = '<div class="thongbao">Thất bại</div>';
		  

          

    }
}
?>

<div id="formbox"> 
        <div class="tt">Thêm Môn Học </div>
        <form method="POST" name="AddnewINF" action="" enctype="multipart/form-data">     
		
         <div class="form-regit">
            <div class="label">Tên Môn Học </div>
            <div class="value"><input  type="text" name="tenLoai" id="tenLoai"></div>
         </div>
        
            
         <div class="form-but">
                    <div class="float"><input type="submit" style="background-image:url(../images/chapnhan.png); width:74px; height:28px;" value="" name="btaddTin" id="btaddTin" />
                    </div>
                   <div class="float"><input type="reset" style="background-image:url(../images/nhaplai.png); width:74px; height:28px;" value="" name="btaddTinre" id="btaddTinre"/> </div>
                    
           <div class="clear"></div>
                 <div class="link"><a href="index.php?mod=qlymonhoc">Xem tin </a> </div>     	
          </div>      
        </form>
        <div class="clear"></div>
            <div class="link"><?php echo $output2; ?><div class="link">
    </div>

  

 
