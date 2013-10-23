
<?php
$sql = "SELECT * FROM tblmenuchinh";
$query = mysql_query($sql);

$selectBox1  = '';
$selectBox1 .= '<select name="dmsp" onchange="ajaxFunction(this.value);">';
$selectBox1 .= '    <option value="noselect" selected>Chon menu</option>';

while($row = mysql_fetch_array($query)){
    
    $selectBox1 .= '<option value="'.$row['idMnChinh'].'">'.$row['tenMnChinh'].'</option>';
}
$selectBox1 .= '</select>';
echo $selectBox1;
?>
<span id="clsp">
    <select name="clsp">
        <option>Chọn Menu2</option>
    </select>
</span>
