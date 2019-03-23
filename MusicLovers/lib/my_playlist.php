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
if(isset($_REQUEST['add_song'])){
	$song_id = $_REQUEST['song_id'];
	$uname = $_SESSION['username'];
	$select_user =mysql_query("SELECT * FROM user WHERE username='$uname'");
	$row = mysql_fetch_array($select_user);
	$id = $row['id'];
	
	if($_REQUEST['catagory'] == 'bollywood_music'){
	$sel = mysql_query("SELECT * FROM my_playlist WHERE user_id='$id' AND bm='$song_id'");
		if(mysql_num_rows($sel)>0){
			?>
			<script>
			alert("This playlist is already added into your Favourite list.");
			window.history.back();
			</script>
			<?php	
		}
		else{			
			$add_playlist = "INSERT into my_playlist(user_id,bm) values('$id','$song_id')";
			if(mysql_query($add_playlist)){
				?>
				<script>
				alert("Song is Added to Your Favourite.");
				window.history.back();
				</script>
				<?php
			}
		}
	}
	if($_REQUEST['catagory'] == 'dj_remix'){
    $sel = mysql_query("SELECT * FROM my_playlist WHERE user_id='$id' AND dj='$song_id'");
		if(mysql_num_rows($sel)>0){
			?>
			<script>
			alert("This playlist is already added into your Favourite list.");
			window.history.back();
			</script>
			<?php	
		}
		else{			
			$add_playlist = "INSERT into my_playlist(user_id,dj) values('$id','$song_id')";
			if(mysql_query($add_playlist)){
				?>
				<script>
				alert("Song is Added to Your Favourite.");
				window.history.back();
				</script>
				<?php
			}
		}
	}
	if($_REQUEST['catagory'] == 'punjabi'){
    $sel = mysql_query("SELECT * FROM my_playlist WHERE user_id='$id' AND punjabi='$song_id'");
		if(mysql_num_rows($sel)>0){
			?>
			<script>
			alert("This playlist is already added into your Favourite list.");
			window.history.back();
			</script>
			<?php	
		}
		else{			
			$add_playlist = "INSERT into my_playlist(user_id,punjabi) values('$id','$song_id')";
			if(mysql_query($add_playlist)){
				?>
				<script>
				alert("Song is Added to Your Favourite.");
				window.history.back();
				</script>
				<?php
			}
		}
	}
	if($_REQUEST['catagory'] == 'indianpop'){
    $sel = mysql_query("SELECT * FROM my_playlist WHERE user_id='$id' AND indianpop='$song_id'");
		if(mysql_num_rows($sel)>0){
			?>
			<script>
			alert("This playlist is already added into your Favourite list.");
			window.history.back();
			</script>
			<?php	
		}
		else{			
			$add_playlist = "INSERT into my_playlist(user_id,indianpop) values('$id','$song_id')";
			if(mysql_query($add_playlist)){
				?>
				<script>
				alert("Song is Added to Your Favourite.");
				window.history.back();
				</script>
				<?php
			}
		}
	}
	if($_REQUEST['catagory'] == 'instrumental'){
    $sel = mysql_query("SELECT * FROM my_playlist WHERE user_id='$id' AND instrumental='$song_id'");
		if(mysql_num_rows($sel)>0){
			?>
			<script>
			alert("This playlist is already added into your Favourite list.");
			window.history.back();
			</script>
			<?php	
		}
		else{			
			$add_playlist = "INSERT into my_playlist(user_id,instrumental) values('$id','$song_id')";
			if(mysql_query($add_playlist)){
				?>
				<script>
				alert("Song is Added to Your Favourite.");
				window.history.back();
				</script>
				<?php
			}
		}
	}
}
?>