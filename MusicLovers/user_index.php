<?php
include'include/dbconfig.php';
include'lib/login.php';
if($_SESSION["username"]==""){
	?>
    <script>
	alert("Please log in.");
	window.location.href="index.php";
	</script>
    <?php
}
else{
$username = $_SESSION['username'];
$sel = "SELECT * FROM user where username='$username'";
$result_set = mysql_query($sel);
$row = mysql_fetch_array($result_set);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/container.css" type="text/css" media="all" rel="stylesheet" />
<link href="css/song_list.css" rel="stylesheet" type="text/css" media="all" />
<link rel="icon" href="image/m-for-music.png" />
<title>Welcome to MusicLovers.Com</title>
</head>

<body>
	<div id="container">
    
		<?php
		include('include/header.php');
		?>
		<div id="navigator">
    		<hr style="margin:0px;"/>
    			&nbsp;&nbsp;&nbsp;&nbsp;<b>Home</b>
        	<hr style="margin:0px;"/>
		</div>
    	<?php
		include('include/search.php');
        include('include/section1.php');
		?>
        <div id="section2">
        <div id="folder_head">Welcome <?php echo $row['name'];?></div>
        Now you can add your favourite albums in <a href="my_album.php">My Albums</a>, and you can also add your favourite songs in  <a href="my_playlist.php">My Playlist</a>.  
        <br />
        <a href="lib/log_out.php">Log Out</a>
        </div>
        <?php
		include('include/footer.php');
		?>

	</div>
</body>
</html>
<?php
}
?>