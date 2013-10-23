<?php
if (isset($_SESSION['id_quyen']) && $_SESSION['id_quyen'] == '1') {
    // get results from database
    $result = mysql_query("SELECT * FROM admin,tblphanquyen WHERE admin.id_quyen=tblphanquyen.id_quyen") or die(mysql_error());
    // display data in table

    $output = '<div class="danhsach">DANH SÁCH ADMIN</div>';
    $output .= "<table border='1' cellpadding='3' class='bang'>";
    $output .= "<tr class='head'> 
                            <td width='50px'>ID</td> 
                            <td width='150px'>Tên Đăng Nhập</td> 
                            <td width='150px'>Mật Khẩu</td> 
                                               
                            <td width='120px'>Quyền Quản Trị</td>                            
                            <td colspan='2'>Sửa / Xóa</td></tr>";

    // loop through results of database query, displaying them in the table
    while ($row = mysql_fetch_array($result)) {

        // echo out the contents of each row into a table
        $output .= "<tr class='content'>";
        $output .= '<td>' . $row['id_ad'] . '</td>';
        $output .= '<td>' . $row['username'] . '</td>';
        $output .= '<td>' . $row['password'] . '</td>';
  
        $output .= '<td>' . $row['tenquyen'] . '</td>';

        $output .= '<td width="30px" style="font-weight:bold;"><a href="?mod=updateAdmin&id=' . $row['id_ad'] . '">Edit</a></td>';
        $output .= '<td width="30px" style="font-weight:bold;"><a href="?mod=quanliAdmin&act=delete&id=' . $row['id_ad'] . '">Delete</a></td>';
        $output .= "</tr>";
    }

    // close table>
    $output .= "</table>";


if ($_GET["act"] == "delete") {

    if (isset($_GET['id'])) {
        $sql1 = "DELETE FROM admin where id_ad='" . $_GET['id'] . "'";
        mysql_query($sql1);
    }
    Header('location:index.php?mod=quanliAdmin');
}   ?>
    <?php echo $output; ?>

    <div class="link"><a href="?mod=addAdmin">Thêm Admin</a></div>

<?php
}else{
    echo '<div class="danhsach" style="height:200px;" >Bạn Không Thể Thực Hiện Tác Vụ Này! </div>';
} ?>