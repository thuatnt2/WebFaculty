
<?php
if (isset($_POST['btaddTin'])) {
    $tieude = $_POST['tieude'];
        $noidung = $_POST['nd'];
        $tacgia = $_POST['tacgia'];
        //  $ngaythang = now();
        // thiết lập vùng giờ mặc định 
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        //thiết lập định dạng ngày giờ 
        $ngaythang = date("YmdHis", time());
        // in ra màn hình
        $id_theloai = $_POST['id_theloai'];
        $hien_an = $_POST['hien_an'];
    
        if (isset($_POST) && $_POST['anh'] == "0"){
        $ten_anh = $_FILES['fileUpload']['name'];
        $path = "../anhTintuc/$ten_anh";
            if ($size < 1000000) {
                if ($_FILES["fileUpload"]["error"] > 0) {
                    /* Bao loi file */
                    $msg = '<div class="thongbao">Bạn chưa chọn file để up!!!</div>';
                } else {
                    //ktra file da co trong forder chua
                    if (!file_exists($path)) {
                        move_uploaded_file($_FILES['fileUpload']['tmp_name'], $path);
                        $ins = "INSERT INTO tbltintuc(tieude,noidung,tacgia,ngaythang,id_theloai,ten_anh,hien_an) 
            VALUES ('$tieude','$noidung','$tacgia','$ngaythang','$id_theloai','$ten_anh','$hien_an')";
                        $kq = mysql_query($ins);
                    } else {
                        /* File ton tai */
                        $msg = '<div class="thongbao">File ' . $name . ' đã tồn tại!</div>';
                    }
                }
            } else {
                /* Sai kieu va kich co */
                $msg = '<div class="thongbao">Loại file hoặc kich thươc file không phù hợp!!!</div>';
            }
            if ($kq)
                header('location:index.php?mod=quanlitin');
            else
                $output2 = '<div class="thongbao">Thất bại1</div>';
        }
        if (isset($_POST) && $_POST['anh'] == "1"){            
            $ten_anh = 'thongbao.png';
            $ins = "INSERT INTO tbltintuc(tieude,noidung,tacgia,ngaythang,id_theloai,ten_anh,hien_an) 
            VALUES ('$tieude','$noidung','$tacgia','$ngaythang','$id_theloai','$ten_anh','$hien_an')";
            $kq = mysql_query($ins);
            if ($kq)
                header('location:index.php?mod=quanlitin');
            else
                $output2 = '<div class="thongbao">Thất bại2</div>';
        }   
}
?>

<div id="formbox"> 
    <div class="tt">TH&#202;M M&#7898;I TIN T&#431;&#769;C </div>
    <form method="POST" name="AddnewINF" action="" enctype="multipart/form-data">  

        <div class="form-regit">
            <div class="label">H&#236;nh &#7843;nh</div>
            <div style="float:left;padding-left: 45px;"><input name="anh" type="radio" value="0" >Đính kèm </div>
            <div class="float"><input name="anh" type="radio" value="1" >Mặc định</div>

<!--            <div class="value"><input type="text" name="anh" id="macdinh" value="thongbao.png" disabled="disabled"></div>-->

            <!--                <div class="value"><a href="?mod=addTin">Ảnh mặc định</a></div>-->
            <div class="value"><input type="file" name="fileUpload" id="hinhanh1"></div>
            <div class="value"><input type="text" name="anhmacdinh" id="macdinh" value="thongbao.png" disabled="disabled"></div>


        </div>

        <div class="form-regit">
            <div class="label">Ti&ecirc;u &#273;&ecirc;&#768; </div>
            <div class="value"><input  type="text" name="tieude" id="tieude1"></div>
        </div>
        <div class="form-regit">
            <div class="label">N&ocirc;&#803;i dung </div>
        </div>
        <div class="form-regit">
            <textarea rows="5" cols="42" name="nd" id="nd"></textarea>
                <script type="text/javascript">CKEDITOR.replace('nd');</script>
                  
        </div> 
        <div class="form-regit">
            <div class="label">Tác giả</div>
            <div class="value">
<!--                <input  type="text" name="tacgia" id="tacgia1" >-->
            <?php
                $sqltacgia = "SELECT * FROM admin";
                $querytacgia = mysql_query($sqltacgia);

                $chontg = '';
                $chontg .= '<select name="tacgia" id="tacgia1">';
                $chontg .= '    <option></option>';

                while ($row = mysql_fetch_array($querytacgia)) {
                    $chontg .= '<option value="' . $row['id_ad'] . '">' . $row['username'] . '</option>';
                }
                $chontg .= '</select>';
                echo $chontg;
                ?>
            </div>
        </div>

        <div class="form-regit">
            <div class="label">Chọn loại tin</div>
            <div class="value">
                <?php
                $sql = "SELECT * FROM tblmenuchinh";
                $query = mysql_query($sql);

                $selectBox1 = '';
                $selectBox1 .= '<select name="menu1" onchange="ajaxFunction(this.value);">';
                $selectBox1 .= '    <option value="noselect" selected>Chon menu</option>';

                while ($row = mysql_fetch_array($query)) {
                    $selectBox1 .= '<option value="' . $row['idMnChinh'] . '">' . $row['tenMnChinh'] . '</option>';
                }
                $selectBox1 .= '</select>';
                echo $selectBox1;
                ?>
                <span id="id_theloai">
                    <select name="id_theloai" id="idlt1">
                        <option>Chọn thể loại tin</option>
                    </select>
                </span>

            </div>
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
    <div class="link"><?php echo $output2; ?><div class="link">
        </div>


        <script language="javascript">
            function ajaxFunction(id) {
                var xmlHttp;
                if (window.XMLHttpRequest) {
                    // IE7+, Firefox, Chrome, Opera, Safari
                    xmlHttp = new XMLHttpRequest;
                }
                else if (window.ActiveXObject) {
                    // IE6, IE5
                    xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
                }

                xmlHttp.onreadystatechange = function() {
                    if (xmlHttp.readyState == 4) {
                        document.getElementById('id_theloai').innerHTML = xmlHttp.responseText;
                    }
                }
                xmlHttp.open('GET', 'modules/action.module.php?dmid=' + id, true);
                xmlHttp.send(null);
            }
        </script>
<!--an hien chọn ảnh mac dinh hay đăng anh-->
        <script>
            $(document).ready(function() {
                $("#hinhanh1,#macdinh").hide();
                $("input[name='anh']").click(function() {
                    var value = $(this).val();
                    if (value == 0) {
                        $("#hinhanh1").show();
                        $("#macdinh").hide();
                    }
                    else {
                        $("#hinhanh1").hide();
                        $("#macdinh").show();
                    }
                });
            });
        </script>
