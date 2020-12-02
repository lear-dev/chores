<?php
include('config.php');
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($dbcon,"select id, username from admin where username='$user_check' ");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session=$row['username'];
$login_id=$row['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>
<body>
<a href='index.php' class="refresh button hide">Refresh</a>
<div id="header">
	<div class="wrap">
		<h1 style="float: left;"><?php echo $title; ?></h1>
		<div style="float: right;"><?php if(isset($login_session)){ echo "<p style='margin:0' id='fixlineheight'><a href='admin/logout.php'><strong>Logout ";
		echo "(".$login_session.")";
		//echo "(".$login_id.")"; //test
		echo "</strong></a><a href='admin/'><strong>View Control Panel</strong></a></p>"; } else { echo "<p style='margin:0' id='fixlineheight'><a href='admin/'><strong>login</strong></a></p>"; } ?></div>
		<div class="clearfix"></div>
	</div>
</div>