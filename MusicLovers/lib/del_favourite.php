<?php
include'../include/dbconfig.php';
include'login.php';

	$uname = $_SESSION['username'];
	$select_user =mysql_query("SELECT * FROM user WHERE username='$uname'");
	$row = mysql_fetch_array($select_user);
	$id = $row['id'];

if(isset($_REQUEST['del_album'])){
	$folder_id = $_REQUEST['folder_id'];	
	$del_folder = "DELETE FROM favourite WHERE user_id='$id' AND folder_id='$folder_id'";
	if(mysql_query($del_folder)){
		?>
		<script>
		alert("Album deleted successfully from your Favourite list.");
		window.history.back();
		</script>
		<?php	
	}
	else{			
		?>
		<script>
		alert("Problem while deleting...Please Try Again.");
		window.history.back();
		</script>
		<?php
	}
}
if(isset($_REQUEST['del_song'])){
	$song_id = $_REQUEST['song_id'];
	$del_song = "DELETE FROM favourite WHERE user_id='$id' AND song_id='$song_id'";
	if(mysql_query($del_song)){
		?>
		<script>
		alert("Song deleted successfully from your Playlist.");
		window.history.back();
		</script>
		<?php	
	}
	else{			
		?>
		<script>
		alert("Problem while deleting...Please Try Again.");
		window.history.back();
		</script>
		<?php
	}
}
?>