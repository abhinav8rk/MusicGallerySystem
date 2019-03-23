<?php
if(isset($_REQUEST['search_btn'])){
include'include/dbconfig.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="image/m-for-music.png" />
<link href="css/container.css" type="text/css" media="all" rel="stylesheet" />
<link href="css/new_home.css" type="text/css" rel="stylesheet" media="all" />
<link href="css/song_list.css" type="text/css" rel="stylesheet" media="all" />
<title>Search Result</title>
</head>

<body>
	<div id="container">
    
		<?php
		include('include/header.php');
		$search_txt = $_REQUEST['search_txt'];
		
		include'include/dbconfig.php';
		
		$screen = $_GET["screen"];
		if (!isset($screen)){
		$screen = 0;
		$i = 1;
		}
		$rows_per_page = 15;
		
		$start = $screen * $rows_per_page;
		
		$sel = "SELECT * FROM song WHERE name LIKE '%$search_txt%' OR singer1 LIKE '%$search_txt%' OR singer2 LIKE '%$search_txt%' LIMIT $start,$rows_per_page";
		$result = mysql_query($sel);
		
		$sel_total_records = "SELECT * FROM song WHERE name LIKE '%$search_txt%' OR singer1 LIKE '%$search_txt%' OR singer2 LIKE '%$search_txt%'";
		$result_record = mysql_query($sel_total_records);
		
		$total_records = mysql_num_rows($result_record);
		
		$pages = ceil($total_records / $rows_per_page);
		?>
		<div id="navigator">
    		<hr style="margin:0px;"/>
    			&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Home </a><b> >> Search Result for <?php echo $search_txt;?></b>
        	<hr style="margin:0px;"/>
		</div>
    	<?php
		include('include/search.php');
        include('include/section1.php');
		?>
        <div id="section2">
        <table id="feature" width="800" cellspacing="1">
         	<tr>
				<td colspan="3" id="folder_head">Search Result for <?php echo $search_txt;?></td>
            </tr>
            <?php
			$i = 15*$screen + 1;
            while($row = mysql_fetch_array($result)){
				$sel_folder = "SELECT * FROM folder WHERE id=".$row['folder_id'];
				$result_folder = mysql_query($sel_folder);
				$row_folder = mysql_fetch_array($result_folder);
			?>
                <tr bgcolor="#CCC">
                	<td style="padding:5px; font-family:Arial, Helvetica, sans-serif; font-size:14px;">
					<img src="image/google-music-logo.png" style="width:30px; height:30px; vertical-align:middle;"/>
					<?php
					echo $i.") <b>".$row['name']."</b><br>";
					echo "<i>singer(s) : "?><a href="singer_song.php?singer=<?php echo $row['singer1'];?>"><?php echo $row['singer1']?></a>
                    <?php
					if($row['singer2']!=''){ 
					?>
                    <a href="singer_song.php?singer=<?php echo $row['singer2'];?>"><?php echo ", ".$row['singer2']?></a>
					<?php } echo "<br>";
					echo "size : ".$row['size']." mb</i>";
					?>	
                    </td>
                    <td style="padding:5px; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:14px; vertical-align:middle;">
                <a href="lib/download_song.php?song_id=<?php echo $row['id']; ?>&folder_name=<?php echo $row_folder['name'];?>&category=<?php echo $row_folder['category'];?>"><img src="image/download.png" style="height:30px;"/></a>
       			<form action="lib/my_playlist.php" method="post">
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
				$display_rows = $i;
		 		$i++;
				}
			if($total_records != 0){
				echo "Displaying <b>".$display_rows."</b> Result(s) of <b>".$total_records.".</b>";
			}
			if($total_records == 0){
				?>
				<tr bgcolor="#CCC">
				<td style="padding:5px; font-family:Arial, Helvetica, sans-serif; font-size:14px;">
				Sorry....No Such Result Found...
				</td>
				</tr>
				<?php
			}
			?>
        </table>
<center>
	<?php
	mysql_free_result($result);				
		
	$rows = mysql_num_rows($result);
	echo "<p></p>\n";
	// let's create the dynamic links now
	if ($screen > 0) {
		$screen = $screen - 1;
	  ?><a href="search_result.php?search_txt=<?php echo $search_txt;?>&search_btn=Search&screen=<?php echo $screen;?>">Previous</a>
	  <?php
	}
	// page numbering links now
	for ($i = 0; $i < $pages; $i++) {
	  ?> | <a href="search_result.php?search_txt=<?php echo $search_txt;?>&search_btn=Search&screen=<?php echo $i;?>"><?php echo $i;?></a> | 
	<?php 
	}
	if ($screen < $pages) {
	  $screen = $screen + 1;
	  ?><a href="search_result.php?search_txt=<?php echo $search_txt;?>&search_btn=Search&screen=<?php echo $screen;?>">Next</a><br />
	  <?php
	}
	?>                          
</center>                                 
        
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