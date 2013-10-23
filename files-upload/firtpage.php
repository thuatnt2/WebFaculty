	<?php 
    error_reporting(0);
    include_once('includes/connect-db.inc');
?>
<div class="tinmoinhat">Th&ocirc;ng Tin M&#417;&#769;i Nh&acirc;&#769;t </div>
<?php

$sql = "SELECT * FROM tbltintuc";
$result = mysql_query($sql);

while($row = mysql_fetch_array($result)) {
    
    $id=$row['id_tintuc'];
    $output .= '<a href="?mod=chitiettin&id_tintuc='.$id.'">' . $row["tieude"] . '</a>';
    $nd=$row["noidung"];
    $output .=noidungtt(10,$nd).'</br>';
  
}

?>
<?php
echo $output;
?>

<?php
//ham lay noi dung tom tat
function noidungtt($sotu,$noidung)
{

	$n=explode(" ",$noidung);
	$noidunginra=" ";
	if($sotu<=count($n)){
        for($i=0;$i<$sotu;$i++)
		      $noidunginra = $noidunginra.$n[$i]." ";
        $noidunginra .="...";
    }
	else
		echo "<h1>cảnh báo : số từ tóm lược nhiều hơn nội dung ban đầu</h1>";  
	return $noidunginra;
}
?>
