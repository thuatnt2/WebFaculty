
<ul class="nav">
    <li class="trangchu"><a href="index.php">Trang ch?</a></li>
    <li class="gioithieu">
        <a href="#">Gi?i Thi?u</a>
        <ul>
            <li>
                <a href="?mod=khoa">Khoa</a>
            </li>
            <li>
                <a href="?mod=daoTao">��o T?o</a>
            </li>
            <li>
                <a href="?mod=doiNgu">�?i Ngu C�n B?</a>
            </li>
            <li >
                <a href="?mod=nghiencuukh">Nghi�n C?u Khoa H?c</a>
            </li>
            <li>
                <a href="?mod=cosovc">Co S? V?t Ch?t</a>
            </li>
            <li>
                <a href="?mod=cttienganh">CT ��o T?o (Ti?ng Anh)</a>
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
        <a href="#">��o T?o</a>
        <ul>
            <li>
                <a href="?mod=ctdtclc">�a`o ta?o da?i ho?c</a>
            </li> 
            <li>
                <a href="?mod=ctdtclc">�a`o ta?o sau da?i ho?c</a>
            </li>
            <li>
                <a href="?mod=ctdtksvp">Chuong Tri`nh li�n k�t</a>
            </li> 
            <li>
                <a href="?mod=ctdtclc">Trung t�m tin ho?c</a>
            </li>
            <li>
                <a href="?mod=ctdtclc">Th�ng tin tuy�?n sinh</a>
            </li>
        </ul>
    </li> 
    
    <li class="nckh">
        <a href="#">Nghi�n Cu�u</a>
        <ul>
            <li>
                <a href="?mod=bmmvtt">Nho�m nghi�n cu�u</a>
            </li> 
            <li>
                <a href="?mod=bmcnpm">Li~nh vu?c nghi�n cu�u</a>
            </li> 
            <li>
                <a href="?mod=bmhtn">��` Ta`i �ang Tri�?n Khai</a>
            </li> 
            <li>
                <a href="?mod=bmhtn">K�t Qua? Nghi�n Cu�u</a>
            </li> 
        </ul>
    </li>

    <li class="hdsvien">
        <a href="#">Sinh Vi�n</a>
        <ul>
            <li>
                <a href="?mod=doanthanhnien">Hoa?t d�?ng LC�</a>
            </li> 
            <li>
                <a href="?mod=clbtinhoc">Cu�?c thi da`nh cho sinh vi�n</a>
            </li> 
            <li>
                <a href="?mod=tainangtin">Ho?c b�?ng du ho?c</a>
            </li>
            <li>
                <a href="?mod=tainangtin">Cu?u sinh vi�n</a>
            </li>
        </ul>
    </li>

    <li class="tailieu"><a href="#">Ta`i Li�?u</a>
        <ul>
            <li>
                <a href="?mod=download">Download</a>
            </li> 

        </ul>
    </li>
    <li class="blog"><a href="#">Blog Gia�o vi�n</a>
    </li>
    <li class="hoptac"><a href="#">Ho?p ta�c</a>
        <ul>
            <li>
               
            </li> 

        </ul>
    </li>
    <li class="lienhe"><a href="#">Li�n h�?</a>

    </li>