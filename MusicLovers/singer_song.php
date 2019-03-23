<?php
$singer = $_REQUEST['singer'];
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="image/m-for-music.png" />
<link href="css/container.css" type="text/css" media="all" rel="stylesheet" />
<link href="css/new_home.css" type="text/css" rel="stylesheet" media="all" />
<link href="css/song_list.css" type="text/css" rel="stylesheet" media="all" />
<title><?php echo $singer;?></title>
</head>

<body>
	<div id="container">
    
		<?php
		include('include/header.php');
		include 'include/dbconfig.php';
		?>
		<div id="navigator">
    		<hr style="margin:0px;"/>
    			&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Home </a> >><a href="singer.php">Singers</a> <b> >> <?php echo $singer;?></b>
        	<hr style="margin:0px;"/>
		</div>
    	<?php
		include('include/search.php');
        include('include/section1.php');
				
		?>
        <div id="section2">
        <table id="feature" width="800" cellspacing="1">
         	<tr>
				<td colspan="3" id="folder_head"><?php echo $singer;?></td>
            </tr>
            <?php
			$sel = "SELECT * FROM song WHERE singer1='$singer' OR singer2='$singer'";
			$result_set = mysql_query($sel);
			$i = 1;
            while($row = mysql_fetch_array($result_set)){
			
				$sel_folder = "SELECT * FROM folder WHERE id=".$row['folder_id'];
				$result_set_folder = mysql_query($sel_folder); 
				$row_folder = mysql_fetch_array($result_set_folder);
			?>
                <tr bgcolor="#CCC">
                	<td style="padding:5px; font-family:Arial, Helvetica, sans-serif; font-size:14px;">
					<img src="image/google-music-logo.png" style="width:30px; height:30px; vertical-align:middle;"/>
					<?php
					echo $i.") <b>".$row['name']."</b><br>";
					echo "<i>singer(s) : "?><a href=""><?php echo $row['singer1']?></a>
                    		<a href="singer_song.php?singer=<?php echo $row['singer2'];?>"><?php if($row['singer2']!=""){
																							echo ", ".$row['singer2'];}?></a>
                    <br /><?php 
					echo "size : ".$row['size']." mb</i>";
					?>	
                    </td>
                    <td style="padding:5px; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:14px; vertical-align:middle;">
                <a href="lib/download_song.php?category=<?php echo $row_folder['category'];?>&folder_name=<?php echo $row_folder['name'];?>&song_id=<?php echo $row['id']; ?>"><img src="image/download.png" style="height:30px;"/></a><form action="lib/my_playlist.php" method="post">
                <input type="hidden" name="song_id" value="<?php echo $row['id'];?>">
                <input type="hidden" name="catagory" value="bollywood_music" />
                <input type="submit" name="add_song" value="Add to My Playlist" />
                </form>
				</td>
		 		<td id="song_list">
		 		<audio controls="controls" class="playback"> 
		 		<source src="uploads/<?php echo $row_folder['category'];?>/<?php echo $row_folder['name'];?>/<?php echo $row['name'].".mp3"; ?>" type="audio/mpeg">
		 		</audio>
		 		</td>
		 	</tr>
		 		<?php
		 		$i++;
				}
				?>
		</table>
        </div>
        <?php
		include('include/footer.php');
		?>

	</div>
</body>
</html>
