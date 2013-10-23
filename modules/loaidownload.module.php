<?php
    error_reporting(0);
    include_once('includes/connect-db.inc');
?>
 <div class="display"> 
<?php

/**
 * @author tuongvy
 * @copyright 2013
 */
  
    $output  = '<div class="upload">Tài Liệu > Download</div>';
    $output  .= '<div class="loaitin">';
    $sql='select * from loaitin';
    $result=mysql_query($sql);
    
    while($row = mysql_fetch_array($result)) {
     //   $name=$row["name"];
        $tenloai=$row["tenloai"];
        $idloai=$row["idloai"];
        $output  .= '<div style="margin:5px 0 5px 10px;">';
        $output .= "<a href='?mod=download&act=down&id=$idloai'>$tenloai</a>";
        $output .='</div>';       
    }
    $output  .= '</div>';
/*download*/
    if($_GET["act"]=="down") {
        $id=$_GET["id"];
        $sql = "SELECT * FROM upload,loaitin where upload.idloai=loaitin.idloai and upload.idloai=$id";
        $query=mysql_query($sql);
        $r1 = mysql_fetch_array($query);
        $tloai=$r1['tenloai'];
        $output  .= '<div class="upload" >Download > '.$tloai.'</div>';
        $output .= '<table  width="660px"  cellpadding="5">';
        $output .= '<tr  class="filehead" >';
    
        $output .= '<td>Tên tài liệu </td>';
        $output .= '<td width="70px">Lượt download</td>';
        $output .= '<td width="70px">DownLoad</td>';
    
        $output .= '</tr>';
            
            
    	while($row=mysql_fetch_array($query))
    	{
    	    $name=$row['name'];
            $output .= '<tr  class="filecontent">';
            
            $output .= '<td>';
            $output .= '<img src="images/book.png" alt="">&nbsp&nbsp';
            $output .= "<a href='xulydown.php?name=$name'>$name</a>";
            $output .= '</td>';
            $output .= '<td style="width:100px;">'.$row['dem'].'</td>';
            $output .= '<td>';
            $output .= "<a href='xulydown.php?name=$name'>Download</a> ";
            $output .= '</td>';
            $output .= '</tr>';
                //echo $output;
    	}
    }
   $output .= '</table>';     
    mysql_close();
?>

<?php
    echo $output;
?>
 </div>