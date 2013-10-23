<script language="javascript" src="../taovanban/ckeditor/ckeditor.js" type="text/javascript"></script>
<?php
$sql1 = "SELECT * FROM tbltintuc WHERE id_tintuc= " . $_GET["id"];
$rs1 = mysql_query($sql1);
$row1 = mysql_fetch_array($rs1);
?>

<?php
//
if (isset($_POST['btupdateTin'])) {

    if (!isset($_GET['sua'])) {
        $tieude = $_POST['tieude'];
        $noidung = $_POST['noidung'];
        $tacgia = $_POST['tacgia'];
        $ngaythang = date("YmdHis", time());
        $id_theloai = $_POST['id_theloai'];
        $hien_an = $_POST['hien_an'];
        $ten_anh = $_FILES['fileUpload']['name'];


        $capnhat = "UPDATE tbltintuc SET tieude='$tieude',noidung='$noidung',tacgia='$tacgia',
            ngaythang='$ngaythang', id_theloai='$id_theloai',hien_an='$hien_an'
                    where id_tintuc=" . $_GET['id'];
        $kq = mysql_query($capnhat);
        if ($kq) {
            header('Location: index.php?mod=quanlitin');
        }
        else
            echo '<div class="thongbao">Cập nhật thông tin thất bại</div>';
    }
    else {
        $tieude = $_POST['tieude'];
        $noidung = $_POST['noidung'];
        $tacgia = $_POST['tacgia'];
        $ngaythang = date("YmdHis", time());
        $id_theloai = $_POST['id_theloai'];

        $hien_an = $_POST['hien_an'];
        $ten_anh = $_FILES['fileUpload']['name'];

        $path = "../anhTintuc/$ten_anh";

        if ($size < 1000000) {

            if ($_FILES["fileUpload"]["error"] > 0) {
                /* Bao loi file */
                $msg = '<div class="thongbao">Bạn chưa chọn file để up!!!</div>';
            } else {

                if (!file_exists($path)) {

                    $sql3 = "SELECT * FROM tbltintuc WHERE id=" . $_GET["id"];
                    $result3 = mysql_query($sql3);
                    $row3 = mysql_fetch_array($result3);
                    $name3 = $row3["ten_anh"];
                    $path3 = "../anhTintuc/$name3";
                    if (file_exists($path3)) {
                        unlink($path3);
                    }
                    move_uploaded_file($_FILES['fileUpload']['tmp_name'], $path);

                    $capnhat = "UPDATE tbltintuc SET tieude='$tieude',noidung='$noidung',tacgia='$tacgia',
                        ngaythang='$ngaythang', id_theloai='$id_theloai', ten_anh='$ten_anh', hien_an='$hien_an'
                    where id_tintuc=" . $_GET['id'];
                } else {
                    /* File ton tai */
                    $msg = '<div class="thongbao">File ' . $name . ' đã tồn tại!</div>';
                }
            }
        } else {
            /* Sai kieu va kich co */
            $msg = '<div class="thongbao">Loại file hoặc kích thước file không phù hợp!!!</div>';
        }


        $kq = mysql_query($capnhat);
        if ($kq) {
            header('Location: index.php?mod=quanlitin');
        }
        else
            $output2 = '<div class="thongbao">Cập nhật thông tin thất bại</div>';
    }
}
?>
<div id="formbox"> 
    <div class="tt">CẬP NHẬT TIN T&#431;&#769;C </div>
    <form method="POST" name="AddnewINF" action="" enctype="multipart/form-data">     

        <div class="form-regit">
            <div class="label">Ti&ecirc;u &#273;&ecirc;&#768; </div>
            <div class="value"><input  type="text" name="tieude" id="tieude" value="<?php echo $row1['tieude']; ?>"></div>
        </div>
        <div class="form-regit">
            <div class="label">N&ocirc;&#803;i dung </div>
            <div class="value"><textarea rows="5" cols="42" name="noidung" id="noidung"><?php echo $row1['noidung']; ?></textarea>
            <script type="text/javascript">CKEDITOR.replace('noidung'); </script>
            </div>       
        </div> 

        <div class="form-regit">
            <div class="label">Tác giả</div>
            <div class="value"><input  type="text" name="tacgia" id="tacgia" value="<?php echo $row1['tacgia']; ?>"></div>
        </div>
        
        <div class="form-regit">
            <div class="label">Tên loa&#803;i tin</div>
            <div class="value">
                <select name="id_theloai" id="idlt">
                    <option value=""></option>
                    <?php
                    $sql = "SELECT * FROM tbltheloai";
                    $result = mysql_query($sql);
                    while ($row = mysql_fetch_array($result)) {
                        //  echo "<option value=" . $row['id_theloai'] . ">" . $row["ten_theloai"] . "</option>";                       
                        echo "<option value=\"" . $row["id_theloai"] . "\"";
                        if ($row["id_theloai"] == $row1["id_theloai"])
                            echo "selected";
                        echo ">";
                        echo $row["ten_theloai"] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-regit">
            <div class="label">H&#236;nh &#7843;nh</div>
            <div class="value"><input type="text" name="ten_anh" id="hinhanh1" disabled="disabled" value="<?php echo $row1['ten_anh']; ?>"></div>
            </div>
            <div style="float:left;padding: 20px 20px 0 0;"><a href="?mod=updateTin&act=edit&id=<?php echo $_GET['id']; ?>&sua"> Sửa ảnh</a></div>
            <?php
            if (isset($_GET['sua'])) {
                //  echo '<div class="value"><input type="text" name="ten_anh" id="hinhanh" disabled="disabled" value="' . $row1['ten_anh'] . '"></div>';
                echo '<div class="value"><input type="file" name="fileUpload" id="hinhanh2"></div>';
            }
            ?>

        

        <div class="form-regit">
            <div class="label">&Acirc;&#777;n / hi&ecirc;&#803;n tin </div>
            <div class="inc">
                <?php
                if ($row1["hien_an"] == "1") {
                    ?>

                    <div class="float"><input name="hien_an" type="radio" value='1' checked="checked">Hiện </div>
                    <div class="float"><input name="hien_an" type="radio" value='0'  > Ẩn </div>
                <?php } else { ?> 
                    <div class="float"><input name="hien_an" type="radio" value='1' > Hiện </div>
                    <div class="float"><input name="hien_an" type="radio" value='0' checked="checked" > Ẩn </div>
                <?php } ?> 
            </div>
        </div>

        <div class="form-but">
            <div class="float"><input type="submit" style="background-image:url(../images/chapnhan.png); width:74px; height:28px;" value="" name="btupdateTin" id="btupdateTin" />
            </div>
            <div class="float"><input type="reset" style="background-image:url(../images/nhaplai.png); width:74px; height:28px;" value="" name="btupdateTinre" id="btupdateTinre"/> </div>

            <div class="clear"></div>
            <div class="link"><a href="index.php?mod=quanlitin">Xem tin </a> </div>     	
        </div>      
    </form>
    <div class="clear"></div>
    <div class="link"><?php echo $output2; ?><div class="link">
        </div>


