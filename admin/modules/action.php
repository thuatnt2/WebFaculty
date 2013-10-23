<?php
if(isset($_GET['dmid'])){
    
    $dmid = $_GET['dmid'];
    $selectBox2  = '';
    
    if($dmid != 'noselect'){
       
		include_once('connect-db.inc');
        $sql = "SELECT * FROM tbltheloai WHERE idMnChinh = '$dmid'";
        $query = mysql_query($sql);
		
        $selectBox2 .= '<select name="clsp">';
        $selectBox2 .= '<option value="noselect" selected>Chọn Dòng</option>';
        while($row = mysql_fetch_array($query)){
            
            $selectBox2 .= '<option value="'.$row['id_theloai'].'">'.$row['ten_theloai'].'</option>';
        }
        $selectBox2 .= '</select>';    
    }
    else{
        $selectBox2 .= '<select name="clsp">';
        $selectBox2 .= '    <option>Chọn Dòng sản phẩm</option>';
        $selectBox2 .= '</select>';
    }
    
    echo $selectBox2;    
} 

?>