<?php
include('lock.php');
if(isset($_POST['add_chore'])){
	$chore = $_POST['chore'];
	$frequency = $_POST['frequency'];
	if ($chore!=="") {
		//$sql=$dbcon->query("INSERT INTO chore_list(chore) VALUES('$chore')");
		$sql="INSERT INTO chore_list(chore,frequency) VALUES('$chore','$frequency')";
		if ($dbcon->query($sql) === TRUE) {
			$last_id = $dbcon->insert_id;
			//echo "New chore created successfully. Last inserted ID is: " . $last_id; //test
			$sql=$dbcon->query("INSERT INTO user_chore_relations(userid,choreid,count) VALUES('2','$last_id','0')");
			$sql=$dbcon->query("INSERT INTO user_chore_relations(userid,choreid,count) VALUES('3','$last_id','0')");
		} else {
			echo "Error: " . $sql . "<br>" . $dbcon->error;
		}
	}
}
$onenotright = "";
if(isset($_POST['edit_chore'])){
	// find out how many records there are to update 
	$size = count($_POST['chore']);
	//echo $size;
	// start a loop in order to update each record
	$i = 0;
	while ($i < $size) {
		// define each variable
		$chore = $_POST['chore'][$i];
		$frequency = $_POST['frequency'][$i];
		$id = $_POST['id'][$i];
		if ($chore=="") {
			$onenotright = "true";
		}
		// do the update
		if ($chore!=="") {
			$sql=$dbcon->query("UPDATE chore_list SET chore='$chore', frequency='$frequency' WHERE id='$id' LIMIT 1");
		}
		++$i;
	}
}
if(isset($_POST['delete_chore'])){
	// define variable
	$id = $_POST['delete_chore'];
	// do the delete
	$sql=$dbcon->query("DELETE FROM chore_list WHERE id='$id'");
	$sqltwo=$dbcon->query("DELETE FROM user_chore_relations WHERE choreid='$id'");
}
?>
<?php include("header.php"); ?>
<div class="wrap">
	<div id="content">
		<?php
		//if ($login_session=="admin"){
		$result_chores=$dbcon->query("SELECT * FROM chore_list ORDER BY chore ASC");
		if(mysqli_num_rows($result_chores)>0){
		?>
		<form method="post">
			<p><strong>Add a chore:</strong></p>
			<p><textarea name="chore" placeholder="chore :" style="width: 100%"></textarea>
			<select name="frequency" style="width: 100%;margin-top:0 !important;">
			<option value="Daily">Daily</option>
			<option value="As Needed">As Needed</option>
			<option value="Weekly" selected>Weekly</option>
			<option value="Bi-Monthly">Bi-Monthly</option>
			<option value="Monthly">Monthly</option>
			<option value="Bi-Annually">Bi-Annually</option>
			<option value="Annually">Annually</option>
			</select></p>
			<p><button type="submit" name="add_chore">Add chore</button></p>
			<?php if(isset($_POST['add_chore']) && $_POST['chore']!==""){ echo "<br /><em>Added!</em>"; } ?>
			<?php if(isset($_POST['add_chore']) && $_POST['chore']==""){ echo "<br /><em>Not Added! chore was empty.</em>"; } ?>
		</form>
		<p>&nbsp;</p>
		<form method="post">
			<p><strong>Edit chores:</strong></p>
			<?php
			while($row=$result_chores->fetch_array()){
				echo '<p>
				<textarea name="chore[]" placeholder="chore :" style="width: 100%">'.$row['chore'].'</textarea>
				<select name="frequency[]" style="width: 100%;margin-top:0 !important;">
				<option value="One Time"';if($row['frequency']=="One Time"){echo " selected";} echo '>One Time</option>
				<option value="Daily"';if($row['frequency']=="Daily"){echo " selected";} echo '>Daily</option>
				<option value="As Needed"';if($row['frequency']=="As Needed"){echo " selected";} echo '>As Needed</option>
				<option value="Weekly"';if($row['frequency']=="Weekly" || $row['frequency']==""){echo " selected";} echo '>Weekly</option>
				<option value="Bi-Monthly"';if($row['frequency']=="Bi-Monthly"){echo " selected";} echo '>Bi-Monthly</option>
				<option value="Monthly"';if($row['frequency']=="Monthly"){echo " selected";} echo '>Monthly</option>
				<option value="Bi-Annually"';if($row['frequency']=="Bi-Annually"){echo " selected";} echo '>Bi-Annually</option>
				<option value="Annually"';if($row['frequency']=="Annually"){echo " selected";} echo '>Annually</option>
				</select>
				<input name="id[]" type="hidden" value="'.$row['id'].'">';
				echo '<button type="submit" name="edit_chore">Edit chore(s)</button></p>';
				if ($login_session=="admin"){
					echo '<p><button type="submit" name="delete_chore" value="'.$row['id'].'">Delete</button></p>';
				}
				echo '
				';
			}
			?>
			<!--<p><button type="submit" name="edit_chore">Edit chore(s)</button></p>-->
			<?php if(isset($_POST['edit_chore']) && $onenotright==""){ echo "<br /><em>Updated!</em>"; } ?>
			<?php if($onenotright=="true"){ echo "<br /><em>One or more chores did not update, because chore was empty!</em>"; } ?>
			<?php if(isset($_POST['delete_chore'])){ echo "<br /><em>Deleted!</em>"; } ?>
		</form>
		<?php }
		//} else { echo "Nothing to see here!"; } ?>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.1.1.js"></script>
<script src="../js/jquery.autogrow.js"></script>
<script>
jQuery( document ).ready(function() {
	jQuery('textarea').autogrow();
});
</script>
<?php include("footer.php"); ?>