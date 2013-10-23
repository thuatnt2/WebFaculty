<?php
$sql = "SELECT * FROM upload,loaitin WHERE upload.idloai=loaitin.idloai";
$result = mysql_query($sql);
if ($_GET["act"] == "ins") {
    echo '<div class="link">Upload File</div>';
}
if ($_GET["act"] == "edit") {
    echo '<div class="link">Cập Nhật File</div>';
    echo '<div class="float"><a href="?mod=upload&act=edit&id=' . $_GET["id"] . '&suaanh">Sửa ảnh</a></div>';
   
}
//ADD FILE
?>
<?php if ($_GET["act"] == "ins") { ?>
    <form id="frmUpload" name="frmUpload" method="post" action="" enctype="multipart/form-data">      
        <input type="file" name="fileUpload" id="textfield" />
        <input type="submit" name="btnUpload" id="btnUpload" value="Upload" />

        <div>Mã Loại tin</div>
        <select name="idloai" id="idloai">
            <?php
            $sql_loaitin = "SELECT * FROM loaitin";
            $result1 = mysql_query($sql_loaitin);

            $totalrow = mysql_num_rows($result1);
            if ($totalrow > 0) {
                while ($row1 = mysql_fetch_array($result1)) {
                    $idloaitin = $row1["idloai"];
                    $tenloai = $row1["tenloai"];
                    echo "<option value='$idloaitin'>$tenloai</option>";
                }
                ?>
            </select> 
            <?php
        } else {
            echo "no row";
        }
        ?>
    </form>
    <?php } ?>
<?php
//EDIT
if ($_GET["act"] == "edit") {
    if (isset($_GET['suaanh'])) {
     echo '<div class="float" style="margin-left:10px;"><a href="?mod=upload&act=edit&id=' . $_GET["id"] . '">Không sửa ảnh</a></div></br>';   
        ?>    

        <form id="frmUpload" name="frmUpload" method="post" action="" enctype="multipart/form-data">
            <?php
            $sqlup = "SELECT * FROM upload WHERE id=" . $_GET['id'];
            $result2 = mysql_query($sqlup);
            while ($rowup = mysql_fetch_array($result2)) {
                ?>
                
                <input type="file" name="fileUpload" id="textfield" /><br/>
  
                <div>Mã Loại tin</div>
                <select name="idloai" id="idloai">
                    <?php
                    $sql_loaitin = "SELECT * FROM loaitin";
                    $result1 = mysql_query($sql_loaitin);

                    $totalrow = mysql_num_rows($result1);
                    if ($totalrow > 0) {
                        while ($row1 = mysql_fetch_array($result1)) {
                            echo "<option value=\"" . $row1["idloai"] . "\"";
                            if ($row1["idloai"] == $rowup["idloai"])
                                echo "selected";
                            echo ">";
                            echo $row1["tenloai"];
                            "</option>";
                        }
                        ?>
                    </select> 
                    <input type="submit" name="btnUpload" id="btnUploadloaitin" value="Upload" />
                <?php
                }
                else {
                    echo "no row";
                }
            }
            ?>
        </form>
    <?php
    }
//khi khong nhan vao suaanh
    else {
        //UPLOAD ANH THI PHAI CO : <form enctype="multipart/form-data" ></form>
        ?>
        <form id="frmUpload" name="frmUpload" method="post" action="" enctype="multipart/form-data">
            <?php
            $sqlup = "SELECT * FROM upload WHERE id=" . $_GET['id'];
            $result2 = mysql_query($sqlup);
            while ($rowup = mysql_fetch_array($result2)) {
                ?>
            <div class="clear"></div>
                <input type="text" name="" disabled="disabled" id="textfield" value="<?php echo $rowup['name']; ?>" />
                <div>Mã Loại tin</div>
                <select name="idloai" id="idloai">
                    <?php
                    $sql_loaitin = "SELECT * FROM loaitin";
                    $result1 = mysql_query($sql_loaitin);

                    $totalrow = mysql_num_rows($result1);
                    if ($totalrow > 0) {
                        while ($row1 = mysql_fetch_array($result1)) {
                            echo "<option value=\"" . $row1["idloai"] . "\"";
                            if ($row1["idloai"] == $rowup["idloai"])
                                echo "selected";
                            echo ">";
                            echo $row1["tenloai"];
                            "</option>";
                        }
                        ?>
                    </select> 
                    <input type="submit" name="btnUploadloaitin" id="btnUploadloaitin" value="Upload" />
            <?php
            }
            else {
                echo "no row";
            }
        }
        ?>
        </form>
        <?php
    }
}
?>
<div class="danhsach" style="margin: 0 0 10px 0;">DANH SÁCH FILE</div>
<?php
$output = '<table cellpadding="3" class="bang">';
$output .= '<tr  class="head">';

$output .= '<td>Tên File</td>';
$output .= '<td>Đường dẫn</td>';
$output .= '<td>Kích thước</td>';
$output .= '<td>Ngày tạo</td>';
$output .= '<td>Loại</td>';
$output .= '<td>Lượt download</td>';


$output .= '<td colspan="2">Edit/Delete</td>';
$output .= '</tr>';
while ($row = mysql_fetch_array($result)) {
    $output .= '<tr  class="content">';

    $output .= '<td>' . $row["name"] . '</td>';
    $output .= '<td>' . $row["path"] . '</td>';
    $output .= '<td width="100px">' . $row["size"] . '</td>';
    $output .= '<td width="150px">' . $row["date"] . '</td>';
    $output .= '<td>' . $row["tenloai"] . '</td>';
    $output .= '<td  width="100px">' . $row["dem"] . '</td>';

    $output .= '<td class="capnhat"><a href="?mod=upload&act=edit&id=' . $row["id"] . '">Edit</a></td>';
    $output .= '<td class="capnhat"><a href="?mod=upload&act=del&id=' . $row["id"] . '" onclick="return confirm(\'Do you want to delete this record?\');">Delete</a></td>';
    $output .= '</tr>';
}
$output .= '</table>';


/* Update */
if ($_GET["act"] == "ins") {

    if (isset($_POST["btnUpload"])) {

        $name = $_FILES['fileUpload']['name'];
        $path = "../files-upload/$name";
        $size = $_FILES['fileUpload']['size'];
        $type = $_FILES['fileUpload']['type'];
        $date = date("YmdHis", time());
        $type = (get_magic_quotes_gpc() == 0 ? mysql_real_escape_string(
                                $_FILES['fileUpload']['type']) : mysql_real_escape_string(
                                stripslashes($_FILES['fileUpload'])));
        $idloai = $_POST['idloai'];
        $fp = fopen($name, 'r');

        fclose($fp);


        if ($size < 1000000) {

            if ($_FILES["fileUpload"]["error"] > 0) {
                /* Bao loi file */
                $msg = '<div class="thongbao">Bạn chưa chọn file để up!!!</div>';
            } else {
                //ktra file da co trong folder chua
                if (!file_exists($path)) {
                    move_uploaded_file($_FILES['fileUpload']['tmp_name'], $path);
                    $SQL_ins = "INSERT INTO upload(name, path, type, size,date,idloai) VALUES('$name', '$path', '$type','$size','$date','$idloai')";
                    mysql_query($SQL_ins);

                    Header("Location: index.php?mod=upload");
                } else {
                    /* File ton tai */
                    $msg = '<div class="thongbao">File ' . $name . ' đã tồn tại!</div>';
                }
            }
        } else {
            /* Sai kieu va kich co */
            $msg = '<div class="thongbao">Loại file hoặc kích thước file không phù hợp!!!</div>';
        }
    }
}
if ($_GET["act"] == "edit") {
    //kich vao nut upload cho sua ma loai tin
    if (isset($_POST["btnUploadloaitin"])) {
        $idloai = $_POST['idloai'];
        $upLoaitin = "UPDATE upload SET idloai='$idloai' WHERE id = " . $_GET["id"];

        mysql_query($upLoaitin);

        Header("Location: index.php?mod=upload");
    }
    //kich vao nut upload cho sua anh va ma loai tin
    if (isset($_POST["btnUpload"])) {

        $name = $_FILES['fileUpload']['name'];
        $path = "../files-upload/$name";
        $size = $_FILES['fileUpload']['size'];
        $type = $_FILES["fileUpload"]["type"];
        $date = date("YmdHis", time());
        $idloai = $_POST['idloai'];
        if ($size < 1000000) {

            if ($_FILES["fileUpload"]["error"] > 0) {
                /* Bao loi file */
                $msg = '<div class="thongbao">Bạn chưa chọn file để up!!!</div>';
            } else {

                if (!file_exists($path)) {

                    $sql3 = "SELECT * FROM upload WHERE id=" . $_GET["id"];
                    $result3 = mysql_query($sql3);
                    $row3 = mysql_fetch_array($result3);
                    $name3 = $row3["name"];
                    $path3 = "files-upload/$name3";
                    if (file_exists($path3)) {
                        unlink($path3);
                    }

                    move_uploaded_file($_FILES['fileUpload']['tmp_name'], $path);

                    $sUpd = "UPDATE upload SET name = '$name', path = '$path',type='$type', size='$size',date='$date',idloai='$idloai' WHERE id = " . $_GET["id"];

                    mysql_query($sUpd);

                    Header("Location: index.php?mod=upload");
                } else {
                    /* File ton tai */
                    $msg = '<div class="thongbao">File ' . $name . ' đã tồn tại!</div>';
                }
            }
        } else {
            /* Sai kieu va kich co */
            $msg = '<div class="thongbao">Loại file hoặc kích thước file không phù hợp!!!</div>';
        }
    }
} elseif ($_GET["act"] == "del") {
    $sql3 = "SELECT * FROM upload WHERE id=" . $_GET["id"];
    $result3 = mysql_query($sql3);
    $row3 = mysql_fetch_array($result3);
    $name = $row3["name"];
    $path = "../files-upload/$name";
    echo $path;
    if (file_exists($path)) {
        unlink($path);
        $sql_del = "DELETE FROM upload WHERE id=" . $_GET["id"];
        $result_del = mysql_query($sql_del);
        Header("Location: index.php?mod=upload");
    }
}

mysql_close($con);
?>

<?php echo $msg; ?>
<?php echo $output; ?>
<div class="link"><a href="?mod=upload&act=ins">Upload file mới</a></div>



