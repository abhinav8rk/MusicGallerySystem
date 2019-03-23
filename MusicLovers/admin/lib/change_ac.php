<?php
require('../include/dbconfig.php');
if(isset($_REQUEST['change']))
{   				
	$name = $_REQUEST['name'];
	$old_pass1 = $_REQUEST['pass'];
	$new_pass = $_REQUEST['new_pass'];
	$confirm_pass = $_REQUEST['confirm_pass'];
	$sel = "SELECT * from admin";
	$result_set = mysql_query($sel);
	$row = mysql_fetch_array($result_set);
	$old_name = $row['name'];
	$old_pass2 = $row['password'];
	if($old_pass1 == $old_pass2){
		if($new_pass == $confirm_pass){
			$sql = "UPDATE admin SET name='$name', password='$new_pass'";
			if(mysql_query($sql)){
				?>
				<script>
				alert("Account Edited Successfully.");
				</script>
				<?php
				include'lib/login.php';
				session_destroy();
				header("location:../login.php");
			}
			else{
				?>
				<script>
				alert("Error while editing account.");
				window.location.href='../index.php';
				</script>
				<?php
			}
		}
		else{
			?>
			<script>
			alert("New Password did'nt match Confirm Password.");
			window.location.href='../setting.php';
			</script>
			<?php
		}
	}
	else{
			?>
			<script>
			alert("Old Password is not correct.");
			window.location.href='../setting.php';
			</script>
			<?php
	}
}
?>