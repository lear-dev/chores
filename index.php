<?php
include('config.php');
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($dbcon,"select id, username from admin where username='$user_check' ");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session=$row['username'];
$login_id=$row['id'];
$title = "Chores";
date_default_timezone_set('America/New_York');
$thedatetoday = date('Y-m-d');
$thedatetodaywithtime = $thedatetoday." 00:00:00";
//echo $thedatetodaywithtime;
$date1Timestamp = strtotime($thedatetodaywithtime);
$now = time();
?>
<?php include("header.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.1.1.js"></script>
<div class="wrap">
	<ul id="nav" class="hide">
		<select id="shortnav" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
			<option value="">-Navigation-</option>
			<?php
			$res=$dbcon->query("SELECT * FROM main_menu ORDER BY m_menu_order ASC");
			while($row=$res->fetch_array()){
			?>
			<option value="<?php echo $row['m_menu_link']; ?>"><?php echo $row['m_menu_name']; ?></option>
			<?php
			$res_pro=$dbcon->query("SELECT * FROM sub_menu WHERE m_menu_id=".$row['m_menu_id']." ORDER BY s_menu_order ASC");
			?>
			<?php while($pro_row=$res_pro->fetch_array()){?>
				<option value="<?php echo $pro_row['s_menu_link']; ?>">&nbsp;&nbsp;-&nbsp;<?php echo $pro_row['s_menu_name']; ?></option>
			<?php } ?>
			<?php } ?>
		</select>
	
		<?php
		$res=$dbcon->query("SELECT * FROM main_menu ORDER BY m_menu_order ASC");
		while($row=$res->fetch_array()){
		?>
			<li class="topli"><a href="<?php echo $row['m_menu_link']; ?>" class="topa"><?php echo $row['m_menu_name']; ?></a>
			<?php
			$res_pro=$dbcon->query("SELECT * FROM sub_menu WHERE m_menu_id=".$row['m_menu_id']." ORDER BY s_menu_order ASC");
			?>
			<ul>				
				<?php while($pro_row=$res_pro->fetch_array()){?>
					<li class="subli"><a href="<?php echo $pro_row['s_menu_link']; ?>" class="suba"><?php echo $pro_row['s_menu_name']; ?></a></li>
				<?php } ?>
			</ul>
			</li>
			
		<?php } ?>
	</ul>

	<div id="content">
		<?php
		$result=$dbcon->query("SELECT id, username FROM admin WHERE id != 1 ORDER BY username ASC");
		$result_chores=$dbcon->query("SELECT id, chore, frequency FROM chore_list ORDER BY chore ASC");
		$x = $result->num_rows;
		echo "
		<table id='choretable' width='100%'>
			<thead>
				<tr>";
					echo "<th>chores</th>";
					while($row=$result->fetch_array()){
						echo "<th";
						//if(isset($login_session)){
							echo " width='80'";
						//}
						echo ">".$row['username']."";
						if($login_session=="admin"){
							echo "(".$row['id'].")"; //test
						}
						echo "</th>";
						$ids[] = $row['id'];
					}
					if(isset($login_session) && $login_session<>"admin"){
						echo "<th width='80'>roll</th>";
					}
				echo "
				</tr>
			</thead>
			<tbody>";
				$z = "1";
				while($row_chores=$result_chores->fetch_array()){
					$arecountsequal = "false";
					$arerollsequal = "false";
					$whosturn = "";
					$thisisnewer = "";
					$otheroneisnewer = "";
					echo "
					<tr>";
						echo "<td valign='middle'><div style='min-height: 30px !important;'>";
						if($login_session=="admin"){
							echo "<strong>".$row_chores['id'].")</strong> "; //optional
						}
						echo $row_chores['chore'];
						if ($row_chores['frequency']=="Daily") {
							$daysfromfrequency = "1";
						} else if ($row_chores['frequency']=="Weekly") {
							$daysfromfrequency = "7";
						} else if ($row_chores['frequency']=="Bi-Monthly") {
							$daysfromfrequency = "15";
						} else if ($row_chores['frequency']=="Monthly") {
							$daysfromfrequency = "30";
						} else if ($row_chores['frequency']=="Bi-Annually") {
							$daysfromfrequency = "182";
						} else if ($row_chores['frequency']=="Annually") {
							$daysfromfrequency = "365";
						} else {
							$daysfromfrequency = "";
						}
						echo " <span style='background-color:#ccc;'>".$row_chores['frequency'];
						//if ($daysfromfrequency<>"") {
							//echo " - ".$daysfromfrequency;
						//}
						echo "</span>";
						echo "</div></td>";
						$y = 0;
						$row_chores_id = $row_chores['id'];
						$prevCount = NULL;
						$prevRoll = NULL;
						while($y < $x) {
							echo "<td align='center'>";
							//echo "(".$y." ".$z.") ";
							//echo "[".$ids[$y]."]"; //user ids
							//echo $thedatetoday."<br>";
							//echo "((".$date1Timestamp."))<br>";
							$result_count=$dbcon->query("SELECT * FROM user_chore_relations WHERE userid = ".$ids[$y]." AND choreid = ".$row_chores_id."");
							$j_count=$dbcon->query("SELECT * FROM user_chore_relations WHERE userid = 2 AND choreid = ".$row_chores_id."");
							$l_count=$dbcon->query("SELECT * FROM user_chore_relations WHERE userid = 3 AND choreid = ".$row_chores_id."");
							if($jrow=$j_count->fetch_array()){$jscount = $jrow['count']; $jsdate = $jrow['last_done'];}
							if($lrow=$l_count->fetch_array()){$lscount = $lrow['count']; $lsdate = $lrow['last_done'];}
							//echo $jscount; //test
							//echo $lscount; //test
							//if ($jsdate<>"0000-00-00" && $lsdate<>"0000-00-00") {
								//echo $jsdate; //test
								//echo $lsdate; //test
							//}
							//if ($lsdate<>"0000-00-00") {
								//echo $lsdate; //test
							//}
							//if ($jscount==$lscount) {
								//echo "equal";
							//}
							//$row_count_count = $result_count->num_rows;
							if($row_count=$result_count->fetch_array()){
								$row_count_count = $row_count['count'];
								$theid = $row_count['userid'];
								$row_count_roll = $row_count['roll'];
								$row_count_last_done = $row_count['last_done'];
								if ($row_count_last_done<>"0000-00-00") {
									$row_count_last_done = date('m-d-Y', strtotime($row_count['last_done']));
									$thedatewithtime = $row_count['last_done']." 00:00:00";
									$date2Timestamp = strtotime($thedatewithtime);
									//echo "((".$date2Timestamp."))<br>";
									//$difference = $date2Timestamp - $date1Timestamp;
									$difference = $now - $date2Timestamp;
									//Convert seconds into days.
									$days = floor($difference / (60*60*24) );
									//echo "((".$days."))";
								}
								//if ($row_count_count <> "") {
									echo "<span style='float:left;'>".$row_count_count."</span>"; //need this one
									if ($row_count_roll <> NULL) {
										if(isset($login_session)){
											echo "<span style='float:right;'>[".$row_count_roll."]</span>"; //need this one
										}
									}
									//echo "(".$theid.")"; //test
									if ($jsdate<>"0000-00-00" && $lsdate<>"0000-00-00") {
										$jsdate = strtotime($jsdate);
										$lsdate = strtotime($lsdate);
										if ($theid == 2) {
											//echo $jsdate; //test
											//echo "<br>";
											//echo $lsdate; //test
											if($jsdate > $lsdate) {$thisisnewer = "yes"; $otheroneisnewer = "no";}
											if($lsdate > $jsdate) {$thisisnewer = "no"; $otheroneisnewer = "yes";}
											
										} else if ($theid == 3) {
											//echo $lsdate; //test
											//echo "<br>";
											//echo $jsdate; //test
											if($lsdate > $jsdate) {$thisisnewer = "yes"; $otheroneisnewer = "no";}
											if($jsdate > $lsdate) {$thisisnewer = "no"; $otheroneisnewer =  "yes";}
										} else {}
										//echo "thisisnewer:".$thisisnewer;
										//echo " otheroneisnewer:".$otheroneisnewer;
									}
									//if ($thisisnewer=="no" && $otheroneisnewer=="yes"){echo "dont color it";}
									if ($row_count_last_done<>"0000-00-00") {
										echo "<span style='clear:both;display:block;font-size:11px;";
										if ($row_count_last_done<>"") {
											if ($daysfromfrequency=="") {
												echo "background-color:orange;color:white;";
											} else {
												if ($days >= $daysfromfrequency){
													if ($thisisnewer=="no" && $otheroneisnewer=="yes"){
														//dont color it
													} else {
														echo "background-color:red;color:white;";
													}
												}
											}
										}
										echo "'>";
										//if ($row_count_last_done<>"") {
											//$datediff = $thedatetoday - $row_count_last_done;
											//echo floor($datediff/(60*60*24))." - ";
											//if ($days >= $daysfromfrequency) {
												//echo "((".$days."))";
												//echo "((It's Time))";
											//}
										//}
										echo $row_count_last_done;
										echo "</span>";
									}
									//if ($row_count_count == $row_count_count) {echo "check";}
									if ($row_count_count == $prevCount) {$arecountsequal = "true";}
									if ($row_count_roll == $prevRoll && $row_count_roll <> NULL) {$arerollsequal = "true";}
									if ($y == 1) {
										//echo "compare now"; //test
										if ($prevRoll !== NULL && $row_count_roll !== NULL) {
											//echo $prevRoll."_"; //test
											//echo $row_count_roll; //test
											if ($prevRoll < $row_count_roll) {
												$whosturn = "J's turn";
											}
											if ($prevRoll > $row_count_roll) {
												$whosturn = "L's turn";
											}
										}
										if ($prevCount < $row_count_count) {
											$whosturn = "J's turn";
										}
										if ($prevCount > $row_count_count) {
											$whosturn = "L's turn";
										}
									}
								//} else {
									//echo "-";
								//}
							} else {echo "0";}
							$prevCount = $row_count_count;
							$prevRoll = $row_count_roll;
							//echo $z;
							//echo $test;
							echo "
							</td>";
							$y++;
							$z++;
						}
						if(isset($login_session) && $login_session<>"admin"){
							echo "<td align='center'>";
							$result_roll=$dbcon->query("SELECT * FROM user_chore_relations WHERE userid = ".$login_id." AND choreid = ".$row_chores_id."");
							if($row_roll=$result_roll->fetch_array()){
								//$test="true";
								//echo "blah";
								//echo $row_roll['roll']; //test
								echo $whosturn;
								
								$formcode = "
								<form method='post'>
								<input type='hidden' id='roll".$z."' name='user_roll' value=''>
								<input type='hidden' id='chore".$z."' name='chore_id' value='".$row_chores_id."'>
								<input type='hidden' id='user".$z."' name='user_id' value='".$login_id."'>
								<button type='button' name='buttonpassvalue' id='random".$z."' style='margin:0 auto !important; width: 80px;' >Roll</button>
								</form>
								<script>
								jQuery(document).ready(function($){
									$('#random".$z."').click(function(){
										$(this).prop('disabled', true);
										var roll = 1 + Math.floor(Math.random() * 100);
										$('#roll".$z."').val(roll);
										$('#roll".$z."').attr('value',roll);
										$('#random".$z."').text(roll);
									});
									
									$('#random".$z."').click(function(e) {
									  e.preventDefault();
									  //alert('#roll".$z."'); //test
									  //alert('#chore".$z."'); //test
									  var userroll = $(this).siblings('#roll".$z."').val();
									  var choreid = $(this).siblings('#chore".$z."').val();
									  var userid = $(this).siblings('#user".$z."').val();
									  var dataString = 'userroll='+userroll+'&choreid='+choreid+'&userid='+userid;
									  
									  //alert(userroll); //test
									  //alert(choreid); //test
									  //alert(userid); //test
									  //alert(dataString); //test
									  
									  $.ajax({
										type:'POST',
										data:dataString,
										url:'insert.php',
										success:function(data) {
										  //alert(data); //optional to alert what insert.php echos
										}
									  });
									  
									});
								});
								</script>
								";
								
								if ($arerollsequal=="true") {
									//echo "roll again";
									echo $formcode;
								}
								if ($arecountsequal=="true" && $row_roll['roll'] == "") {
									echo $formcode;
								}
							}
							echo "</td>";
						}
					echo "</tr>";
				}
				echo "<tr>";
				echo "<td>Running Totals</td><td>";
				
				$j_tcount=$dbcon->query("SELECT sum(count) as jtotal FROM user_chore_relations WHERE userid = 2");
				if($jtrow=$j_tcount->fetch_array()){
					$jstcount = $jtrow['jtotal'];
					echo $jstcount;
				}
				
				echo "</td><td>";
				
				$l_tcount=$dbcon->query("SELECT sum(count) AS ltotal FROM user_chore_relations WHERE userid = 3");
				if($ltrow=$l_tcount->fetch_array()){
					$lstcount = $ltrow['ltotal'];
					echo $lstcount;
				}
				
				echo "</td><td></td>";
				echo "</tr>";
				$z++;
			echo "
			</tbody>
		</table>";
		?>
	</div>
</div>
<?php include("footer.php"); ?>