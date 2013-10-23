<?php
session_start();
error_reporting(0);
include_once('../includes/connect-db.inc');
?>
<?php
if (isset($_POST['btnLogin'])) {

    $u=$_POST['username'];
    $p=$_POST['password'];
    

        $sql = "SELECT * FROM admin WHERE username='" . $u . "' and password='" . $p . "'";
        $query = mysql_query($sql);
        if (mysql_num_rows($query) == 0) {
            $voutput = '<p class="error">ERROR: Username hoặc Password chưa chính xác</p>';
        } else {
            $row = mysql_fetch_array($query);
           $_SESSION['user'] = $row['username'];
           $_SESSION['id_quyen'] = $row['id_quyen'];
           $_SESSION['id_ad'] = $row['id_ad'];
		   $_SESSION['idGV'] = $row['idGV'];
            header('location:index.php');
       //     $_SESSION['pass'] = $row['password'];
        //    echo $_SESSION['username'];
            
             //$mes = '<p class="error">Username: '. $_SESSION["username"] .'  | <a href="?mod=logout">Logout</a></p>';
        }
        
}

?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="../css/style.css" />
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="../js/lib.js"></script>
        <script type="text/javascript" src="../css/generic.css"></script>
</head>
<body>
	<div class="lg-container">
		<h1>Admin Login</h1>
		<form action='' method='post' id="lg-form" name="lg-form" >
			
			<div>
				<label for="username">Username:</label>
				<input type="text" name="username" id="username" placeholder="username"/>
			</div>
			
			<div>
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" placeholder="password" />
			</div>
			
			<div>				
                            <button type='submit' name='btnLogin' id="btnLogin" >Login</button>
							
                            <button type='reset' name='btnLogin' id="btnRe" >Reset</button>
			</div>
			
		</form>
		<div> <?php echo $voutput; ?></div>
	</div>
</body>
</html>