<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="image/m-for-music.png" />
<link href="css/container.css" rel="stylesheet" type="text/css" media="all"  />
<link href="css/new_home.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/music_folder.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/song_list.css" rel="stylesheet" type="text/css" media="all" />
<title>Stars</title>
</head>

<body>
<div id="container">
	<?php
    include'include/header.php';
	?>
    <div id="navigator">
    <hr style="margin:0px;"/>
    	&nbsp;&nbsp;<a href="index.php">Home</a> >> <b>Stars</b> 
        <hr style="margin:0px;"/>
	</div>
    <?php
    include'include/search.php';
	include'include/section1.php';
    ?>
    <div id="section2">
		<table id="feature" cellspacing="1" width="800">
			<tr>
				<td colspan="2" id="folder_head">Stars</td>
            </tr>
            	<?php
				include('include/dbconfig.php');
				
				$rows_per_page = 20;
				$sel = "SELECT DISTINCT star1,sat2 FROM folder WHERE category='Bollywood Music'";
				$result = mysql_query($sel);
				$total_records = mysql_num_rows($result);
				$pages = ceil($total_records / $rows_per_page);
				mysql_free_result($result);
				$screen = $_GET["screen"];
				if (!isset($screen)){
				$screen = 0;
				}
				$start = $screen * $rows_per_page;

				$sel1 = "SELECT DISTINCT star1 from folder WHERE category='Bollywood Music' LIMIT $start,10";
				$sel2 = "SELECT DISTINCT star2 from folder WHERE category='Bollywood Music' LIMIT $start,10";
				$result_set1 = mysql_query($sel1);
				$result_set2 = mysql_query($sel2);
				$i=1;
				while($row1 = mysql_fetch_array($result_set1)){
					?>
                    <tr bgcolor="#CCC">
                    	<td style="padding:5px; font-family:Arial, Helvetica, sans-serif; font-size:14px;">&nbsp;&nbsp;<a href="star_movie.php?star=<?php echo $row1['star1'];?>"><?php echo $i.") ".$row1['star1']; ?></a></td>
                    </tr>
                    <?php
					$i++;
				}
				while($row2 = mysql_fetch_array($result_set2)){
				?>
                <tr bgcolor="#CCC">
                    	<td style="padding:5px; font-family:Arial, Helvetica, sans-serif; font-size:14px;">&nbsp;&nbsp;<a href="star_movie.php?star=<?php echo $row2['star2'];?>"><?php echo $i.") ".$row2['star2']; ?></a></td>
                </tr>
                <?php 
				$i++;
                }
				?>
		</table>
<!-- <center>
	<?php
	$result = mysql_query($sel);
	$rows = mysql_num_rows($result);
	echo "<p></p>\n";
	// let's create the dynamic links now
	if ($screen > 0) {
		$screen = $screen - 1;
	  ?><a href="star.php?screen=<?php echo $screen;?>">Previous</a>
	  <?php
	}
	// page numbering links now
	for ($i = 0; $i < $pages; $i++) {
	  ?> | <a href="star.php?screen=<?php echo $i;?>"><?php echo $i;?></a> | 
	<?php 
	}
	if ($screen < $pages) {
	  $screen = $screen + 1;
	  ?><a href="star.php?screen=<?php echo $screen;?>">Next</a><br />
	  <?php
	}
	?>                          
</center> -->                                
    </div>
    
	<?php
    include'include/footer.php';
    ?>    	
</div>
</body>
</html>