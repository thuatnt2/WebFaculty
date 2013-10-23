<?php
function download($file)
{
	if(!file_exists($file)){
	print "file's not exits"; exit(); 
	}
	$size = filesize($file);
	header("Content-Type: application/save");
	header("Content-Length: $size");
	header("Content-Disposition: attachment; filename=\"".$file."\"");
	header("Content-Transfer-Encoding: binary");
	if ($fh = fopen("$file", "rb")){
	fpassthru($fh);
	fclose($fh);
	} else {
	print ("Permission denied: ".$file); exit();
	}
}


$get_name=$_GET['name'];

$get_url='files-upload/'.$get_name;

 download($get_url);

 include_once('includes/connect-db.inc');
 $sql="select dem from upload where  name='".$get_name."'";
 $query=mysql_query($sql); 
 $row=mysql_fetch_array($query);
 $dem=$row['dem'];
 echo $dem;
 $sql1="update upload set dem='".($dem+1)."' where  name='".$get_name."'"; 
 $query1=mysql_query($sql1); 
 mysql_close($con);
?>