<?php
include("../config.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chores Control Panel Login</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/component.css" />
<script src="../js/modernizr.custom.js"></script>
</head>
<body>
<div id="header">
	<div class="wrap">
		<h1>Chores Control Panel Login</h1>
		<label>
			<ul id="cbp-tm-menu" class="cbp-tm-menu">
				<li><a href="../index.php" class="toplevel">View Web Site</a></li>
			</ul>
		</label>
	</div>
</div>
<div class="wrap">
	<div id="content">
		<form action="" method="post">
			<input type="text" name="username" placeholder="UserName :" /><br />
			<input type="password" name="password" placeholder="Password :" /><br/>
			<input type="submit" value=" Submit "/>
			<?php
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				// username and password sent from Form
				$myusername=mysqli_real_escape_string($dbcon,$_POST['username']); 
				$mypassword=mysqli_real_escape_string($dbcon,$_POST['password']); 

				$sql="SELECT id FROM admin WHERE username='$myusername' and passcode='$mypassword'";
				$result=mysqli_query($dbcon,$sql);
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				$active=$row['active'];
				$count=mysqli_num_rows($result);

				// If result matched $myusername and $mypassword, table row must be 1 row
				if($count==1) {
					//session_register("myusername");
					$_SESSION['login_user']=$myusername;

					header("location: index.php");
				}
				else {
					echo $error="<br /><em>Your Login Name or Password is invalid!</em>";
				}
			}
			?>
		</form>
	</div>
</div>
</body>
</html>