<?php 
    error_reporting(0);
    
    $sql = "SELECT * FROM tbltintuc WHERE `hien_an` = 1 LIMIT 0,7";
	$db = mysql_query($sql);

?>
    <div id="sliderFrame">
        <div id="slider">
            	<?php while ($rs=mysql_fetch_assoc($db)){ ?>
                <img src="anhTintuc/<?php echo $rs['ten_anh']?>"repeat alt="<?php echo $rs['tieude']?>" title="<?php echo $rs['tieude']?>" />
                <?php }?>
        </div>
  
    </div>

   

