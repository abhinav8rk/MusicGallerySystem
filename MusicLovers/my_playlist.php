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
<link href="css/music_song.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/song_list.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/new_home.css" rel="stylesheet" type="text/css" media="all" />
<title>My Playlist</title>
</head>

<body>
	<div id="container">
    
		<?php
		include('include/header.php');
		?>
		<div id="navigator">
    		<hr style="margin:0px;"/>
    			&nbsp;&nbsp;<a href="index.php">Home</a> <b>>> My Playlist</b>
        	<hr style="margin:0px;"/>
		</div>
    	<?php
		include('include/search.php');
        include('include/section1.php');
		?>
        <div id="section2">
            
             <table id="feature" width="800" cellspacing="1">
         	<tr>
				<td colspan="3" id="folder_head">Your Playlist</td>
            </tr>        
                        <?php
                        include('include/dbconfig.php');
                        $sel = "SELECT song_id from favourite WHERE user_id='$id' AND song_id!='0' LIMIT 12";
						$result_set = mysql_query($sel);
						$num = mysql_num_rows($result_set);
						$i=1;
						while($row = mysql_fetch_array($result_set)){
                            $sel1 = mysql_query("SELECT * FROM song WHERE id=".$row['song_id']);
							$row1 = mysql_fetch_array($sel1);
							$sel_folder = "SELECT * FROM folder WHERE id=".$row1['folder_id'];
							$result_set_folder = mysql_query($sel_folder);
							$row_folder = mysql_fetch_array($result_set_folder);
							?>
            <tr bgcolor="#CCC">
                <td style="padding:5px; font-family:Arial, Helvetica, sans-serif; font-size:14px;">
                <img src="image/google-music-logo.png" style="width:30px; height:30px; vertical-align:middle;"/>
                <?php
                echo $i.") <b>".$row1['name']."</b><br>";
                echo "<i>singer : "?><a href="singer_song.php?singer=<?php echo $row1['singer1'];?>"><?php echo $row1['singer1']?></a><br /><?php 
                echo "size : ".$row1['size']." mb</i>";
                ?>	
                </td>
                <td style="padding:5px; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:14px; vertical-align:middle;">
                <a href="lib/download_song.php?category=<?php echo $row_folder['category'];?>&folder_name=<?php echo $row_folder['name'];?>&song_id=<?php echo $row1['id']; ?>"><img src="image/download.png" style="height:30px;"/></a>			   
                <form action="lib/del_favourite.php" method="post">
                <input type="hidden" name="song_id" value="<?php echo $row1['id'];?>">
                <input type="submit" name="del_song" value="Delete Song" />
                </form>
				</td>
		 		<td id="song_list">
		 		<audio controls class="playback"> 
		 		<source src="uploads/<?php echo $row_folder['category'];?>/<?php echo $row_folder['name'];?>/<?php echo $row1['name'].".mp3"; ?>" type="audio/mpeg">
		 		</audio>
		 		</td>
		 	</tr>
                        <?php
						$i++;
                        }
						?>	
                
            </table>    
            <?php  
            if($num == 0){
            echo "&emsp;&emsp;Your Playlist is Empty...";
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