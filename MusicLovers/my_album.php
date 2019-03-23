<?php
include'lib/login.php';
if($_SESSION['username']==""){
	?>
    <script>
	alert("First you have to log in to access this page.");
	window.history.back();
	</script>
    <?php
}
else{
	$username = $_SESSION['username'];
	$sel_user = mysql_query("SELECT * FROM user WHERE username='$username'");
	$row_user = mysql_fetch_array($sel_user);
	$id = $row_user['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/container.css" type="text/css" media="all" rel="stylesheet" />
<link rel="icon" href="image/m-for-music.png" />
<link href="css/music_folder.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/song_list.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/new_home.css" rel="stylesheet" type="text/css" media="all" />
<title>My Album</title>
</head>

<body>
	<div id="container">
    
		<?php
		include('include/header.php');
		?>
		<div id="navigator">
    		<hr style="margin:0px;"/>
    			&nbsp;&nbsp;<a href="index.php">Home</a> <b>>> My Albums</b>
        	<hr style="margin:0px;"/>
		</div>
    	<?php
		include('include/search.php');
        include('include/section1.php');
		?>
        <div id="section2">
            <div id="folder_head">Your Favourite Albums</div>
            <table style="background-color:#FFF; padding:5px;">
                <tr style="text-align:center;">
                    <td>        
                        <?php
                        include('include/dbconfig.php');
					    $sel = "SELECT folder_id from favourite WHERE user_id='$id' AND folder_id!='0' LIMIT 12";
						$result_set = mysql_query($sel);
						$num = mysql_num_rows($result_set);
						while($row = mysql_fetch_array($result_set)){
                            $sel1 = mysql_query("SELECT * FROM folder WHERE id=".$row['folder_id']);
							$row1 = mysql_fetch_array($sel1);
							?>
                        <tr id="movie_folder">
                            <td style="padding:30px; width:220px;">
                                <a href="song.php?category=<?php echo $row1['category'];?>&folder_id=<?php echo $row1['id']; ?>" style="padding:30px;"><img src="uploads/<?php echo $row1['category'];?>/<?php echo $row1['name'];?>/<?php echo $row1['poster']; ?>"></a><br>
                                <center><a href="song.php?category=<?php echo $row1['category'];?>&folder_id=<?php echo $row1['id']; ?>" style="padding:0px; font-family:Arial, Helvetica, sans-serif;"><?php echo $row1['name']." (".$row1['year'].")"; ?></a><hr />
                            <form action="lib/del_favourite.php" method="post">
                            <input type="hidden" name="folder_id" value="<?php echo $row1['id'];?>">
                            <input type="submit" name="del_album" value="Delete Album" />
                            </form>
                                </center>
                            </td>
                        </tr>
                        <?php
						}
						?>
						
                    </td>
                </tr>
            </table>     
            <?php
            if($num == 0){
            echo "Your Album is Empty...";
            } 
			?>  

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