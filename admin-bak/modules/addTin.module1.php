<script language="javascript" src="../taovanban/ckeditor/ckeditor.js" type="text/javascript"></script>
<?php
   if($_SESSION["idGV"]){
	$id=$_SESSION["idGV"];
    if(isset($_POST['btaddTin'])){
        $tieude = $_POST['tieude'];
        $noidung =   $_POST['noidung'];
        $tacgia = $_POST['tacgia'];
        $ngaythang = date("YmdHis",time());
        $id_theloai =   $_POST['id_theloai'];
   //     $ten_anh =   $_POST['ten_anh'];
        $hien_an =   $_POST['hien_an'];
        
        $ten_anh = $_FILES['fileUpload']['name'];

        $path = "../anhTintuc/$ten_anh";
        if($size <1000000) {                      
            if($_FILES["fileUpload"]["error"] > 0) {
                /*Bao loi file*/
                $msg = '<div class="thongbao">Bạn chưa chọn file để up!!!</div>';
            } 
            else {
                //ktra file da co trong forder chua
                if(!file_exists($path)) {
                    move_uploaded_file($_FILES['fileUpload']['tmp_name'], $path);                  
                      $ins = "INSERT INTO tbltintuc(tieude,noidung,tacgia,ngaythang,id_theloai,ten_anh,hien_an) 
            VALUES ('$tieude','$noidung','$id','$ngaythang','$id_theloai','$ten_anh','$hien_an')";
			echo "$ins";
        $kq=mysql_query($ins);
                
                } else {
                     /*File ton tai*/
                    $msg = '<div class="thongbao">File '.$name.' đã tồn tại!</div>';
					$tempImage = $_FILES['fileUpload']['tmp_name'];
					$ten_anh1 = explode('.', $ten_anh);
					$ten_anh_moi=$ten_anh1[0] . '_' . time() . '.' . $ten_anh1[1];
					$path = "../anhTintuc/$ten_anh_moi";
					move_uploaded_file($tempImage, $path);
					//move_uploaded_file($_FILES['fileUpload']['tmp_name'], $path);
					$ten_anh = $_FILES['fileUpload']['name'];
					$ins = "INSERT INTO tbltintuc(tieude,noidung,tacgia,ngaythang,id_theloai,ten_anh,hien_an) 
            VALUES ('$tieude','$noidung','$id','$ngaythang','$id_theloai','$ten_anh_moi','$hien_an')";
			echo "$ins";
			$kq=mysql_query($ins);
                }                             
            }
        } else {
            /*Sai kieu va kich co*/
                 $msg = '<div class="thongbao">Loại file hoặc kích thước file không phù hợp!!!</div>';
        }
     
    if($kq){
          // $output2 = '<div class="thongbao">Thành Công</div>';
            header('location:index.php?mod=quanlitin');
        }else
			echo "$ins";
          $output2 = '<div class="thongbao">Thất bại</div>';

    }
}
?>

<div id="formbox"> 
        <div class="tt">TH&#202;M M&#7898;I TIN T&#431;&#769;C </div>
        <form method="POST" name="AddnewINF" action="" enctype="multipart/form-data">     
		
         <div class="form-regit">
            <div class="label">Ti&ecirc;u &#273;&ecirc;&#768; </div>
            <div class="value"><input  type="text" name="tieude" id="tieude1"></div>
         </div>
        <div class="form-regit">
            <div class="label">N&ocirc;&#803;i dung </div>
            <div class="value"><textarea name="noidung" id="noidung"></textarea>
            <script type="text/javascript">CKEDITOR.replace('noidung'); </script>
            </div>           
         </div>
            
            
		    <div class="form-regit">
            <div class="label">Tên loa&#803;i tin</div>
            <div class="value">
                                    <select name="id_theloai" id="idlt1">
                                    <option value=""></option>
					<?php
						$sql="SELECT * FROM tbltheloai";
						$result = mysql_query($sql);
						while ($row=mysql_fetch_array($result)){
							echo "<option value=".$row['id_theloai'].">".$row["ten_theloai"]."</option>";
				
						}
					?>
        		</select>
			</div>
         </div>
         <div class="form-regit">
            <div class="label">H&#236;nh &#7843;nh</div>
            <div class="value"><input type="file" name="fileUpload" id="hinhanh1"></div>
         </div>
       
          <div class="form-regit">            
                <div class="label">&Acirc;&#777;n / hi&ecirc;&#803;n tin </div>
                <div class="inc">
                    <div class="float"><input name="hien_an" type="radio" value='1' id="hien1">Hiện </div>
                    <div class="float"><input name="hien_an" type="radio" value='0' id="an1"> Ẩn </div>
                </div>
         </div>
            
         <div class="form-but">
                    <div class="float"><input type="submit" style="background-image:url(../images/chapnhan.png); width:74px; height:28px;" value="" name="btaddTin" id="btaddTin" />
                    </div>
                   <div class="float"><input type="reset" style="background-image:url(../images/nhaplai.png); width:74px; height:28px;" value="" name="btaddTinre" id="btaddTinre"/> </div>
                    
           <div class="clear"></div>
                 <div class="link"><a href="index.php?mod=quanlitin">Xem tin </a> </div>     	
          </div>      
        </form>
        <div class="clear"></div>
            <div class="link"><?php echo $output2; ?><?php echo $kq;?><div class="link">
    </div>

     
