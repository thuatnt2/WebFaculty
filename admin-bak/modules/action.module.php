<?php

if (isset($_GET['dmid'])) {

    $dmid = $_GET['dmid'];
    $selectBox2 = '';

    if ($dmid != 'noselect') {
        include_once('../includes/connect-db.inc');
        $query1 = "SELECT * FROM tbltheloai WHERE idMnChinh = $dmid";
        $result = mysql_query($query1) or die(mysql_error());
      //  $row1 = mysql_fetch_array($result);
       // echo $row1['id_theloai'];
        $selectBox2 .= '<select name="id_theloai">';
        $selectBox2 .= '<option value="noselect" selected>Chọn Menu2</option>';
        if (mysql_num_rows($result) > 0) {
            while ($row1 = mysql_fetch_array($result)) {

                $selectBox2 .= '<option value="' . $row1['id_theloai'] . '">' . $row1['ten_theloai'] . '</option>';
            }
            $selectBox2 .= '</select>';
        }
    } else {
        $selectBox2 .= '<select name="id_theloai">';
        $selectBox2 .= '    <option>Chọn menu2</option>';
        $selectBox2 .= '</select>';
    }

    echo $selectBox2;
}
?>