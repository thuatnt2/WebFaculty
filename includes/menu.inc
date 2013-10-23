
<ul class="nav">
    <li class="trangchu"><a href="index.php">Trang chủ</a></li>
    <li class="gioithieu">
        <a href="#">Giới Thiệu</a>
        <ul>
            <li>
                <a href="?mod=khoa">Khoa</a>
            </li>
            <li>
                <a href="?mod=daoTao">Ðào Tạo</a>
            </li>
            <li>
                <a href="?mod=doiNgu">Đội Ngũ Cán Bộ</a>
            </li>
            <li >
                <a href="?mod=nghiencuukh">Nghiên Cứu Khoa Học</a>
            </li>
            <li>
                <a href="?mod=cosovc">Co Sở Vật Chất</a>
            </li>
            <li>
                <a href="?mod=cttienganh">CT Đào Tạo (Tiếng Anh)</a>
            </li>
        </ul>
    </li>
    <li class="bantinkhoa">
        <a href="#">Bản Tin Khoa</a>
        <ul>
            <?php
            include_once('includes/connect-db.inc');
            $query = mysql_query("SELECT * FROM tbltheloai,tbltintuc WHERE tbltheloai.id_theloai=tbltintuc.id_theloai GROUP BY tbltintuc.id_theloai");
            while ($row = mysql_fetch_array($query)) {
                echo '<li><a href="?mod=ndTin&id_theloai=' . $row['id_theloai'] . '">' . $row['ten_theloai'] . '</a></li>';
            }
            ?>
        </ul>
    </li>


    
    <li class="daotao">
        <a href="#">Ðào Tạo</a>
        <ul>
            <li>
                <a href="?mod=ctdtclc">Đào Tạo Đại Học</a>
            </li> 
            <li>
                <a href="?mod=ctdtclc">Đào Tạo Sau Đại Học</a>
            </li>
            <li>
                <a href="?mod=ctdtksvp">Chương Trình Liên Kết</a>
            </li> 
            <li>
                <a href="?mod=ctdtclc">Trung Tâm Tin Học</a>
            </li>
            <li>
                <a href="?mod=ctdtclc">Thông Tin Tuyển Sinh</a>
            </li>
        </ul>
    </li> 
    
    <li class="nckh">
        <a href="#">Nghiên Cứu</a>
        <ul>
            <li>
                <a href="?mod=bmmvtt">Nhóm Nghiên Cứu</a>
            </li> 
            <li>
                <a href="?mod=bmcnpm">Lĩnh Vực Ngiên Cứu</a>
            </li> 
            <li>
                <a href="?mod=bmhtn">Đề Tài Đang Triển Khai</a>
            </li> 
            <li>
                <a href="?mod=bmhtn">Kết Quả Nghiên Cứu</a>
            </li> 
        </ul>
    </li>

    <li class="hdsvien">
        <a href="#">Sinh Viên</a>
        <ul>
            <li>
                <a href="?mod=doanthanhnien">Hoạt Động LCĐ</a>
            </li> 
            <li>
                <a href="?mod=clbtinhoc">Cuộc Thi Dành cho Sinh Viên</a>
            </li> 
            <li>
                <a href="?mod=tainangtin">Học Bổng Du Học</a>
            </li>
            <li>
                <a href="?mod=tainangtin">Cựu Sinh Viên</a>
            </li>
        </ul>
    </li>

    <li class="tailieu"><a href="#">Tài Liệu</a>
        <ul>
            <li>
                <a href="?mod=download">Download</a>
            </li> 

        </ul>
    </li>
    <li class="blog"><a href="#">Blog Giáo viên</a>
    </li>
    <li class="hoptac"><a href="#">Hợp Tác</a>
        <ul>
            <li>
               
            </li> 

        </ul>
    </li>
    <li class="lienhe"><a href="#">Liên Hê</a>

    </li>