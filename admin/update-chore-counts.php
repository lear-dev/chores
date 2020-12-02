<?php
include('lock.php');
$onenotright = "";
if(isset($_POST['update_chore_counts'])){
	date_default_timezone_set('America/New_York');
	$todaysdate = date('Y-m-d');
	//echo "->".$todaysdate;
	// find out how many records there are to update 
	$size = count($_POST['chore']);
	//echo $size;
	// start a loop in order to update each record
	$i = 0;
	while ($i < $size) {
		// define each variable
		$chore = $_POST['chore'][$i];
		$id = $_POST['id'][$i];
		$count = $_POST['count'][$i];
		//echo $count; //test
		if ($count=="") {
			$onenotright = "true";
		}
		// do the update
		if ($count!=="") {
			$result_count=$dbcon->query("SELECT * FROM user_chore_relations WHERE choreid = ".$id." AND userid = ".$login_id."");
			if($row_count=$result_count->fetch_array()){
				//need this so put back when done testing
				$sql=$dbcon->query("UPDATE user_chore_relations 
				SET 
				last_done = CASE WHEN count != '$count' THEN '$todaysdate' else last_done END, 
				count = '$count' 
				WHERE userid='$login_id' AND choreid='$id' LIMIT 1");
				//echo "a";
			} else {
				//need this so put back when done testing
				$sql=$dbcon->query("INSERT INTO user_chore_relations(userid,choreid,count,last_done) VALUES('$login_id','$id','$count','$todaysdate')");
				//echo "b";
			}
		}
		
		//make roll for both users null again if both people rolled...
		
		$after_result=$dbcon->query("SELECT * FROM user_chore_relations WHERE choreid = ".$id."");
		$prevCount = NULL;
		$prevRoll = NULL;
		$y = 0;
		while($after_row=$after_result->fetch_array()){
			//echo "choreid:".$id."-"; //test
			$after_row_userid = $after_row['userid'];
			//echo "userid:".$after_row_userid."-"; //test
			$after_row_roll = $after_row['roll'];
			//echo "r:".$after_row_roll."-"; //test
			$after_row_count = $after_row['count'];
			//echo "c:".$after_row_count."<br>"; //test
			if ($y == 1) {
				//echo "compare now"; //test
				if ($prevRoll !== NULL && $after_row['roll'] !== NULL) { //both not null so both rolled
					//echo $id.": "; //test
					//echo "r: ".$prevRoll."_"; //test
					//echo $after_row['roll'].""; //test
					//echo " c: ".$prevCount."_"; //test
					//echo $after_row['count'].""; //test
					if ($after_row['count'] !== $prevCount) {
						//$arecountsequal = "false"; //not needed
						//echo " c: ".$prevCount."_"; //test
						//echo $after_row['count']." (clear here)<br>"; //test
						//echo " (clear here)<br>"; //test
						
						//since both rolls are not null and both counts are equal and someone is updating (making the counts unequal), clear both rolls (make them null again)
						$sql=$dbcon->query("UPDATE user_chore_relations SET roll=NULL, last_done='0000-00-00' WHERE choreid='$id'");
					}
				}
			}
			$prevCount = $after_row['count'];
			$prevRoll = $after_row['roll'];
			$y++;
		}
		
		//echo "<br>";
		//$after_result_count=$dbcon->query("SELECT * FROM user_chore_relations WHERE choreid = ".$id." AND userid = ".$login_id."");
		//while($after_row_count=$after_result_count->fetch_array()){
			//echo "c:".$after_row_count['count']."<br>";
		//}
		++$i;
	}
}
?>
<?php include("header.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<div class="wrap">
	<div id="content">
		<?php
		if ($login_session!=="admin"){
		$result_chores=$dbcon->query("SELECT * FROM chore_list ORDER BY chore ASC");
		if(mysqli_num_rows($result_chores)>0){
		?>
		<form method="post">
			<p><strong>Update your chore counts:</strong></p>
			<?php
			while($row=$result_chores->fetch_array()){
				$choreid = $row['id'];
				echo '<p>
				<input type="hidden" name="chore[]" value="'.$row['chore'].'" placeholder="chore :" />';
				//echo '<strong>'.$row['id'].')</strong> '; //optional
				echo $row['chore'].': ';
				
				$result_count=$dbcon->query("SELECT * FROM user_chore_relations WHERE choreid = ".$choreid." AND userid = ".$login_id."");
				
				echo "<input type='button' value='-' class='qtyminus".$choreid."' field='count".$choreid."' style='width: 25px' />";
				
				if($row_count=$result_count->fetch_array()){
					echo '<input type="text" class="count'.$choreid.'" name="count[]" value="'.$row_count['count'].'" placeholder="count :" style="width: 45px" readonly />';
				} else {
					echo '<input type="text" class="count'.$choreid.'" name="count[]" value="0" placeholder="count :" style="width: 45px" readonly />';
				}
				
				echo "<input type='button' value='+' class='qtyplus".$choreid."' field='count".$choreid."' style='width: 25px' />";
				
				echo '<input name="id[]" type="hidden" value="'.$choreid.'">';
				echo '</p>
				';
				echo "
				<script>
				jQuery(document).ready(function($){
					$('.qtyminus".$choreid."').click(function(){
						//alert('.qtyminus".$choreid."');
						$(this).prop('disabled', true);
						$('.qtyplus".$choreid."').prop('disabled', false);
					});
					$('.qtyplus".$choreid."').click(function(){
						//alert('.qtyplus".$choreid."');
						$(this).prop('disabled', true);
						$('.qtyminus".$choreid."').prop('disabled', false);
					});
				});
				</script>
				";
			}
			?>
			<button type="submit" name="update_chore_counts">Update chore counts</button>
			<?php if(isset($_POST['update_chore_counts']) && $onenotright==""){ echo "<br /><em>Updated!</em>"; } ?>
			<?php if($onenotright=="true"){ echo "<br /><em>One or more counts did not update, because a count was empty!</em>"; } ?>
		</form>
		<?php } } else { echo "Nothing to see here!"; } ?>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
jQuery(document).ready(function(){
	<?php $result_chores=$dbcon->query("SELECT * FROM chore_list ORDER BY chore ASC");
	while($row=$result_chores->fetch_array()){
	$choreid = $row['id'];
	?>
    // This button will increment the value
    $('.qtyplus<?php echo $choreid; ?>').click(function(e){
		//alert('plus with id 3');
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
		//alert(fieldName);
        // Get its current value
        //var currentVal = parseInt($('input[name='+fieldName+']').val());
		var currentVal = parseInt($('.'+fieldName).val());
		//alert(currentVal);
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            //$('input[name='+fieldName+']').val(currentVal + 1);
			$('.'+fieldName).val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            //$('input[name='+fieldName+']').val(0);
			$('.'+fieldName).val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus<?php echo $choreid; ?>").click(function(e) {
		//alert('minus with id 3');
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
		//alert(fieldName);
        // Get its current value
        //var currentVal = parseInt($('input[name='+fieldName+']').val());
		var currentVal = parseInt($('.'+fieldName).val());
		//alert(currentVal);
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            //$('input[name='+fieldName+']').val(currentVal - 1);
			$('.'+fieldName).val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            //$('input[name='+fieldName+']').val(0);
			$('.'+fieldName).val(0);
        }
    });
	<?php } ?>
});
</script>
<?php include("footer.php"); ?>