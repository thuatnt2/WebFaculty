
<ul class="nav">
    <li class="trangchu"><a href="index.php">Trang ch?</a></li>
    <li class="gioithieu">
        <a href="#">Gi?i Thi?u</a>
        <ul>
            <li>
                <a href="?mod=khoa">Khoa</a>
            </li>
            <li>
                <a href="?mod=daoTao">Ðào T?o</a>
            </li>
            <li>
                <a href="?mod=doiNgu">Ð?i Ngu Cán B?</a>
            </li>
            <li >
                <a href="?mod=nghiencuukh">Nghiên C?u Khoa H?c</a>
            </li>
            <li>
                <a href="?mod=cosovc">Co S? V?t Ch?t</a>
            </li>
            <li>
                <a href="?mod=cttienganh">CT Ðào T?o (Ti?ng Anh)</a>
            </li>
        </ul>
    </li>
    <li class="bantinkhoa">
        <a href="#">B?n Tin Khoa</a>
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
        <a href="#">Ðào T?o</a>
        <ul>
            <li>
                <a href="?mod=ctdtclc">Ða`o ta?o da?i ho?c</a>
            </li> 
            <li>
                <a href="?mod=ctdtclc">Ða`o ta?o sau da?i ho?c</a>
            </li>
            <li>
                <a href="?mod=ctdtksvp">Chuong Tri`nh liên kê´t</a>
            </li> 
            <li>
                <a href="?mod=ctdtclc">Trung tâm tin ho?c</a>
            </li>
            <li>
                <a href="?mod=ctdtclc">Thông tin tuyê?n sinh</a>
            </li>
        </ul>
    </li> 
    
    <li class="nckh">
        <a href="#">Nghiên Cu´u</a>
        <ul>
            <li>
                <a href="?mod=bmmvtt">Nho´m nghiên cu´u</a>
            </li> 
            <li>
                <a href="?mod=bmcnpm">Li~nh vu?c nghiên cu´u</a>
            </li> 
            <li>
                <a href="?mod=bmhtn">Ðê` Ta`i Ðang Triê?n Khai</a>
            </li> 
            <li>
                <a href="?mod=bmhtn">Kê´t Qua? Nghiên Cu´u</a>
            </li> 
        </ul>
    </li>

    <li class="hdsvien">
        <a href="#">Sinh Viên</a>
        <ul>
            <li>
                <a href="?mod=doanthanhnien">Hoa?t dô?ng LCÐ</a>
            </li> 
            <li>
                <a href="?mod=clbtinhoc">Cuô?c thi da`nh cho sinh viên</a>
            </li> 
            <li>
                <a href="?mod=tainangtin">Ho?c bô?ng du ho?c</a>
            </li>
            <li>
                <a href="?mod=tainangtin">Cu?u sinh viên</a>
            </li>
        </ul>
    </li>

    <li class="tailieu"><a href="#">Ta`i Liê?u</a>
        <ul>
            <li>
                <a href="?mod=download">Download</a>
            </li> 

        </ul>
    </li>
    <li class="blog"><a href="#">Blog Gia´o viên</a>
    </li>
    <li class="hoptac"><a href="#">Ho?p ta´c</a>
        <ul>
            <li>
               
            </li> 

        </ul>
    </li>
    <li class="lienhe"><a href="#">Liên hê?</a>

    </li>