<?php
include'../include/dbconfig.php';
include'login.php';
if($_SESSION['username']==""){
	?>
    <script>
	alert("First you have to log in.");
	window.history.back();
	</script>
    <?php
	exit();
}
if(isset($_REQUEST['add_album'])){
	$folder_id = $_REQUEST['folder_id'];
	$username = $_SESSION['username'];
	$select_user =mysql_query("SELECT * FROM user WHERE username='$username'");
	$row = mysql_fetch_array($select_user);
	$id = $row['id'];
	
	$sel = mysql_query("SELECT * FROM my_album WHERE id='$id' AND bm='$folder_id'");

	if(mysql_num_rows($sel)>0){
		?>
		<script>
		alert("This album is already added into your Favourite list.");
		window.location.href="../bm_folder.php";
		</script>
		<?php	
	}
	else{			
		$add_album = "INSERT into my_album(user_id,bm) values('$id','$folder_id')";
		if(mysql_query($add_album)){
			?>
			<script>
			alert("Album is Added to Your Favourite.");
			window.history.back();
			</script>
			<?php
		}
	}


}
?>