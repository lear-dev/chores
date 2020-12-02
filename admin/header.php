<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chores Control Panel</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/component.css" />
<script src="../js/modernizr.custom.js"></script>
</head>
<body>
<div id="header">
	<div class="wrap">
		<h1>Chores Admin</h1>
		<label>
			<ul id="cbp-tm-menu" class="cbp-tm-menu">
				<li><a href="index.php" class="toplevel">Edit Your Login</a></li>
				<li><a href="logout.php" class="toplevel">Logout<?php echo " (".$login_session.")"; ?></a></li>
				<?php if ($login_session=="admin"){ ?>
					<!-- Single Page -->
					<li><a href="add-edit-chores.php" class="toplevel">Chore Manager</a></li>
				<?php } else { ?>
					<!-- Multipage -->
					<li>
						<a href="javascript:void(0)" class="toplevel">Chore Manager</a>
						<ul class="cbp-tm-submenu">
							<?php //if ($login_session=="admin"){ ?>
							<li><a href="add-edit-chores.php">Add/Edit Chores</a></li>
							<?php //} ?>
							<?php if ($login_session!=="admin"){ ?>
							<li><a href="update-chore-counts.php">Update Chore Counts</a></li>
							<?php } ?>
						</ul>
					</li>
				<?php } ?>
				<li><a href="../index.php" class="toplevel">View Web Site</a></li>
			</ul>
		</label>
		<div class="clearfix"></div>
	</div>
</div>