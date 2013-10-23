
<div class="center_content">  

    <div class="left_content">

        <div class="sidebar_search">
            <form>
                <input type="text" name="" class="search_input" value="Tìm Kiếm" onclick="this.value = ''" />
                <input type="image" class="search_submit" src="images/search.png" />
            </form>            
        </div>

        <div class="sidebarmenu">

            <a class="menuitem" href="index.php?mod=quanlitintuc">Quản Lý Tin Tức</a>
            <a class="menuitem submenuheader" href="index.php?mod=quanlitintuc" >Quản Lý Địa Điểm</a>
            <div class="submenu">
                <ul>
                    <li><a href="ad-index.php?ad=baibien">Bãi Biển</a></li>
                    <li><a href="ad-index.php?ad=khudulich">Khu Du Lịch</a></li>
                    <li><a href="ad-index.php?ad=tamlinh">Tâm Linh</a></li>
                    <li><a href="ad-index.php?ad=langnghe">Làng Nghề</a></li>
                    <li><a href="ad-index.php?ad=congtrinh">Công Trình</a></li>
                    <li><a href="ad-index.php?ad=baotang">Bảo Tàng</a></li>
                </ul>
            </div>
            <a class="menuitem" href="">Lễ Hội</a>
            <a class="menuitem submenuheader" href="ad-index.php?ad=dichvu">Dịch Vụ</a>
            <div class="submenu">
                <ul>
                    <li><a href="ad-index.php?ad=khachsan">Khách Sạn</a></li>
                </ul>
            </div>    

        </div>
    </div>  

    <!--    rightcontent-->
    <div class="right_content" >            

        <h2>Quản Lý Bài Viết</h2> 
        <div class="danhsach">DANH SÁCH TIN TỨC</div>
        <div class="scroll_box">

            <?php
// get results from database
            $result = mysql_query("SELECT * FROM tbltintuc,tbltheloai WHERE tbltintuc.id_theloai=tbltheloai.id_theloai ORDER BY tbltintuc.id_tintuc ") or die(mysql_error());
// display data in table

            $output .='<table class="rounded-corner" ellpadding="3">
        <thead>';
            $output .='<tr >';
            $output .= '<th class="rounded-company">STT</td>';
            $output .= '<th scope="col" class="rounded">Ti&ecirc;u &#272;&ecirc;&#768; </td>';
            $output .= '<th scope="col" class="rounded">N&ocirc;&#803;i Dung </td>';
            $output .= '<th scope="col" class="rounded">Tác giả</td>';
            $output .= '<th scope="col" class="rounded">Nga&#768;y Tha&#769;ng </td>';
            $output .= '<th scope="col" class="rounded">T&ecirc;n Loa&#803;i Tin </td>';
            $output .= '<th scope="col" class="rounded">T&ecirc;n A&#777;nh </td>';
            $output .= '<th scope="col" class="rounded">Hi&ecirc;&#803;n &Acirc;&#777;n A&#777;nh </td>';
            $output .= '<th scope="col" class="rounded">Số lần xem</td>';
            $output .= '<th scope="col" class="rounded">Edit</th>
            <th scope="col" class="rounded-q4">Delete</th>';

            $output .= '</tr></thead>';
            $stt=0;
// loop through results of database query, displaying them in the table
            while ($row = mysql_fetch_array($result)) {
                $stt++;
                // echo out the contents of each row into a table
                $output .= "<tr class ='content' >";
                $output .= '<td>' . $stt . '</td>';
                $output .= '<td>' . $row['tieude'] . '</td>';
                $output .= '<td>' . $row['noidung'] . '</td>';
                $output .= '<td>' . $row['tacgia'] . '</td>';
                $output .= '<td>' . $row['ngaythang'] . '</td>';
                $output .= '<td>' . $row['ten_theloai'] . '</td>';
                //$output .= '<td><a href="' . $row['ten_anh'] . '" target="blank">' . $row['ten_anh'] . '</a></td>';
                $tenanh = $row["ten_anh"];
                $path = "../anhTintuc/" . $tenanh;
                $output .= '<td><a href="' . $path . '" rel="lightbox[roadtrip]" title="">' . $row['ten_anh'] . '</a></td>';
                $output .= '<td>' . $row['hien_an'] . '</td>';
                $output .= '<td>' . $row['solanxem'] . '</td>';
                $output .= '<td class="capnhat"><a href="?mod=updateTin&act=edit&id=' . $row['id_tintuc'] . '"><img src="images/user_edit.png" alt="" title="" border="0" /></a></td>';
                $output .= '<td class="capnhat"><a href="?mod=quanlitin&act=delete&id=' . $row['id_tintuc'] . '"><img src="images/trash.png" alt="" title="" border="0" /></a></td>';
                $output .= "</tr>";
            }
// close table>
            $output .= "</table>";

            if ($_GET["act"] == "delete") {
                if (isset($_GET['id'])) {
                    $sql1 = "delete from tbltintuc where id_tintuc='" . $_GET['id'] . "'";
                    $query1 = mysql_query($sql1);
                }
                Header("Location: index.php?mod=quanlitin");
            }
            ?>

            <?php echo $output; ?>

        </div>        
        <a href="?mod=addTin" class="bt_green"><span class="bt_green_lft"></span><strong>Thêm Bài Viết Mới</strong><span class="bt_green_r"></span></a>

    </div><!-- end of right content-->

</div>   <!--end of center content -->       

