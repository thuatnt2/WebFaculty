<?php

$tg=time();

$tgout=900;

$tgnew=$tg - $tgout;

$conn=mysql_connect("localhost","root","") or die("can't connect");

mysql_select_db("online",$conn);

$sql="insert into useronline(tgtmp,ip,local) values('$tg','$_SERVER[REMOTE_ADDR]','$_SERVER[PHP_SELF]')";
//tgtmp là thời gian mà họ truy cập được tính khi họ truy vào trang web đó.
//ip là dãy số lưu thông tin IP của họ khi viếng thăm website của chúng ta.
//local là nơi lưu đường dẫn mà họ đang truy cập.

$query=mysql_query($sql);

$sql="delete from useronline where tgtmp < $tgnew";

$query=mysql_query($sql);

$sql="SELECT DISTINCT ip FROM useronline WHERE local='$_SERVER[PHP_SELF]'";

$query=mysql_query($sql);

$user = mysql_num_rows($query);

echo "</br>Đang truy cập :$user";

?>
