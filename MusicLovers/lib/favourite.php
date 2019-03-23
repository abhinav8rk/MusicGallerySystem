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
	
	$sel = mysql_query("SELECT * FROM favourite WHERE user_id='$id' AND folder_id='$folder_id'");

	if(mysql_num_rows($sel)>0){
		?>
		<script>
		alert("This album is already added into your Favourite list.");
		window.history.back();
		</script>
		<?php	
	}
	else{			
		$add_album = "INSERT into favourite(user_id,folder_id) values('$id','$folder_id')";
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
if(isset($_REQUEST['add_playlist'])){
	$song_id = $_REQUEST['song_id'];
	$username = $_SESSION['username'];
	$select_user =mysql_query("SELECT * FROM user WHERE username='$username'");
	$row = mysql_fetch_array($select_user);
	$id = $row['id'];
	
	$sel = mysql_query("SELECT * FROM favourite WHERE user_id='$id' AND song_id='$song_id'");

	if(mysql_num_rows($sel)>0){
		?>
		<script>
		alert("This song is already added into your Playlist.");
		window.history.back();
		</script>
		<?php	
	}
	else{			
		$add_song = "INSERT into favourite(user_id,song_id) values('$id','$song_id')";
		if(mysql_query($add_song)){
			?>
			<script>
			alert("Song is Successfully Added to Your Playlist.");
			window.history.back();
			</script>
			<?php
		}
	}
}
?>