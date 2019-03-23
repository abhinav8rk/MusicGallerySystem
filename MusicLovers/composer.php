<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="image/m-for-music.png" />
<link href="css/container.css" rel="stylesheet" type="text/css" media="all"  />
<link href="css/new_home.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/music_folder.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/song_list.css" rel="stylesheet" type="text/css" media="all" />
<title>Composers</title>
</head>

<body>
<div id="container">
	<?php
    include'include/header.php';
	?>
    <div id="navigator">
    <hr style="margin:0px;"/>
    	&nbsp;&nbsp;<a href="index.php">Home</a> >> <b>Composers</b> 
        <hr style="margin:0px;"/>
	</div>
    <?php
    include'include/search.php';
	include'include/section1.php';
    ?>
    <div id="section2">
		<table id="feature" cellspacing="1" width="800">
			<tr>
				<td colspan="2" id="folder_head">Composers</td>
            </tr>
            	<?php
				include('include/dbconfig.php');
				
				$rows_per_page = 30;
				$sel = "SELECT DISTINCT composer FROM folder WHERE category='Bollywood Music' AND composer!=''";
				$result = mysql_query($sel);
				$total_records = mysql_num_rows($result);
				$pages = ceil($total_records / $rows_per_page);
				mysql_free_result($result);
				$screen = $_GET["screen"];
				if (!isset($screen)){
				$screen = 0;
				}
				$start = $screen * $rows_per_page;
				
				$sel = "SELECT DISTINCT composer from folder WHERE category='Bollywood Music' AND composer!='' order by composer LIMIT $start,$rows_per_page";
				$result_set = mysql_query($sel);
				$i=1;
				while($row = mysql_fetch_array($result_set)){
					?>
                    <tr bgcolor="#CCC">
                    	<td style="padding:5px; font-family:Arial, Helvetica, sans-serif; font-size:14px;">&nbsp;&nbsp;<a href="composer_movie.php?composer=<?php echo $row['composer'];?>"><?php echo $i.") ".$row['composer']; ?></a></td>
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
	  ?><a href="composer.php?screen=<?php echo $screen;?>">Previous</a>
	  <?php
	}
	// page numbering links now
	for ($i = 0; $i < $pages; $i++) {
	  ?> | <a href="composer.php?screen=<?php echo $i;?>"><?php echo $i;?></a> | 
	<?php 
	}
	if ($screen < $pages) {
	  $screen = $screen + 1;
	  ?><a href="composer.php?screen=<?php echo $screen;?>">Next</a><br />
	  <?php
	}
	?>                          
</center>     -->                            

    </div>
    
	<?php
    include'include/footer.php';
    ?>    	
</div>
</body>
</html>