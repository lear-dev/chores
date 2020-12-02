<?php
include('config.php');
if (!empty($_POST['userroll'])) {
	$userroll = $dbcon->real_escape_string($_POST['userroll']);
	$choreid = $dbcon->real_escape_string($_POST['choreid']);
	$userid = $dbcon->real_escape_string($_POST['userid']);
	$query = $dbcon->query("UPDATE user_chore_relations SET roll='{$userroll}' WHERE userid='{$userid}' AND choreid='{$choreid}'");
	if($query) {
		echo "Saved Roll";
	} else {
		echo "Roll not Saved";
	}
} else {
	echo "Something went wrong"; //invalid post var
}
?>