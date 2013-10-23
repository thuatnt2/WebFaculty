<?php 

//T?o, ghi d? li?u 
$log = "counter.txt"; 
$count = file_get_contents($log) +1; 
$write = fopen($log,"w"); 
fwrite($write,$count); 
fclose($write); 

//Đ?c d? li?u 
$read = fopen($log,"r"); 
$content = fread($read,filesize($log)); 

//Hi?n th? d? li?u 
echo "Số lượt truy cập: "."{$content}"; 
?>