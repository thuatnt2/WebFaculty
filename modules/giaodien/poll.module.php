<?php
$conn=mysql_connect("localhost","root","") or die("can not connect database");
mysql_select_db("db_webkhoa",$conn);


$sql="select * from question order by qid desc";
$query=mysql_query($sql);
if(mysql_num_rows($query) > 0)
{
	$row=mysql_fetch_array($query);
	$qid=$row['qid'];
	echo "<form action=\"\" method=\"post\" >";
	echo "<div style='font-size:14px;color:RED;'>$row[qtitle]</div>";
	$sql2="select * from answer where qid='".$qid."' order by aid";
	$query2=mysql_query($sql2);
	if(mysql_num_rows($query2) > 0)
	{
		while($row2=mysql_fetch_array($query2))
		{
			echo "<input type=radio name=answer value=$row2[aid]>$row2[atitle]<br />";
		}
	}
	echo "<input type=submit name=ok value=\"Chọn\">";
	echo "<a href=modules/giaodien/result.module.php?questionid=$qid>Kết quả</a>";
	echo "</form>";
}
if(isset($_POST['ok']))
{
	$id=$_POST['answer'];
	$qid=$_GET['questionid'];
	$sql3="update answer set acount=acount + 1 where aid='".$id."'";
	$kqchon=mysql_query($sql3);
        if($kqchon){
            header('location:index.php?mod=');
        }
}
?>
