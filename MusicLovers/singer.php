<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="image/m-for-music.png" />
<link href="css/container.css" rel="stylesheet" type="text/css" media="all"  />
<link href="css/new_home.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/music_folder.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/song_list.css" rel="stylesheet" type="text/css" media="all" />
<title>Singers</title>
</head>

<body>
<div id="container">
	<?php
    include'include/header.php';
	?>
    <div id="navigator">
    <hr style="margin:0px;"/>
    	&nbsp;&nbsp;<a href="index.php">Home</a> >> <b>Singers</b> 
        <hr style="margin:0px;"/>
	</div>
    <?php
    include'include/search.php';
	include'include/section1.php';
    ?>
    <div id="section2">
		<table id="feature" cellspacing="1" width="800">
			<tr>
				<td colspan="2" id="folder_head">Singers</td>
            </tr>
            	<?php
				include('include/dbconfig.php');
				
				$rows_per_page = 20;
				$sel = "SELECT DISTINCT singer1 from song";
				$result = mysql_query($sel);
				$total_records = mysql_num_rows($result);
				$pages = ceil($total_records / $rows_per_page);
				mysql_free_result($result);
				$screen = $_GET["screen"];
				if (!isset($screen)){
				$screen = 0;
				$j=1;
				}
				$start = $screen * $rows_per_page;
					
				$sel_s = "SELECT DISTINCT singer1 from song order by singer1 LIMIT $start,20";
				
				$result_set_s = mysql_query($sel_s);
				$j=20*$screen+1;
				while($row_s1 = mysql_fetch_array($result_set_s)){
					?>
                    <tr bgcolor="#ccc">
                    	<td style="padding:5px; font-family:Arial, Helvetica, sans-serif; font-size:14px;">&nbsp;&nbsp;<a href="singer_song.php?singer=<?php echo $row_s1['singer1'];?>"><?php echo $j.") ".$row_s1['singer1']; ?></a></td>
                    </tr>
                    <?php
					$j++;
				}
				?>
		</table>
<center>
	<?php
	$result = mysql_query($sel);
	$rows = mysql_num_rows($result);
	echo "<p></p>\n";
	// let's create the dynamic links now
	if ($screen > 0) {
		$screen = $screen - 1;
	  ?><a href="singer.php?screen=<?php echo $screen;?>">Previous</a>
	  <?php
	}
	// page numbering links now
	for ($i = 0; $i < $pages; $i++) {
	  ?> | <a href="singer.php?screen=<?php echo $i;?>"><?php echo $i;?></a> | 
	<?php 
	}
	if ($screen < $pages) {
	  $screen = $screen + 1;
	  ?><a href="singer.php?screen=<?php echo $screen;?>">Next</a><br />
	  <?php
	}
	?>                          
</center>                                 
    </div>
    
	<?php
    include'include/footer.php';
    ?>    	
</div>
</body>
</html>