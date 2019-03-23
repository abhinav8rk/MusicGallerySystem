<?php 
$category = $_REQUEST['category'];
include 'lib/login.php';
if($_SESSION['username'] != ""){
	$username = $_SESSION['username'];
	$sel_user = "SELECT * FROM user WHERE username='$username'";
	$result_set_user = mysql_query($sel_user);
	$row_user = mysql_fetch_array($result_set_user);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="image/m-for-music.png" />
<link href="css/container.css" rel="stylesheet" type="text/css" media="all"  />
<link href="css/new_home.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/music_folder.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/song_list.css" rel="stylesheet" type="text/css" media="all" />
<title><?php echo $category;?></title>
</head>

<body>
<div id="container">
	<?php
    include'include/header.php';
	?>
    <div id="navigator">
    <hr style="margin:0px;"/>
    	&nbsp;&nbsp;<a href="index.php">Home</a> <b>>> <?php echo $category;?></b>
        <hr style="margin:0px;"/>
	</div>
    <?php
    include'include/search.php';
    include'include/section1.php';
    ?>
    <div id="section2">
    	
		<div id="folder_head"><?php echo $category;?></div>
        <table style="background-color:#FFF; padding:5px;">
        	<tr style="text-align:center;">
            	<td>        
                    <?php
                    include('include/dbconfig.php');
					
					$rows_per_page = 12;
					$sel = "SELECT * FROM folder WHERE category='$category'";
					$result = mysql_query($sel);
					$total_records = mysql_num_rows($result);
					$pages = ceil($total_records / $rows_per_page);
					mysql_free_result($result);
					$screen = $_GET["screen"];
					if (!isset($screen)){
  					$screen = 0;
					}
					$start = $screen * $rows_per_page;
					
                    $sel = "SELECT * from folder WHERE category='$category' order by year desc LIMIT $start,$rows_per_page ";
                    $result_set = mysql_query($sel);
					while($row = mysql_fetch_array($result_set)){
                        ?>
        		    <tr id="movie_folder">
            			<td style="padding:30px; width:220px;">
                            <a href="song.php?category=<?php echo $category;?>&folder_id=<?php echo $row['id']; ?>" style="padding:30px;"><img src="uploads/<?php echo $category;?>/<?php echo $row['name'];?>/<?php echo $row['poster']; ?>"></a><br>
                            <center><a href="song.php?category=<?php echo $category;?>&folder_id=<?php echo $row['id']; ?>" style="padding:0px; font-family:Arial, Helvetica, sans-serif;"><?php echo $row['name']." (".$row['year'].")"; ?></a><hr />                    
                            <form action="lib/favourite.php" method="get">
                            <input type="hidden" name="folder_id" value="<?php echo $row['id'];?>" />
                            <input type="submit" name="add_album" value="Add to My Album" />
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
<center>
	<?php
	$result = mysql_query($sel);
	$rows = mysql_num_rows($result);
	echo "<p></p>\n";
	// let's create the dynamic links now
	if ($screen > 0) {
		$screen = $screen - 1;
	  ?><a href="folder.php?category=<?php echo $category;?>&screen=<?php echo $screen;?>">Previous</a>
	  <?php
	}
	// page numbering links now
	for ($i = 0; $i < $pages; $i++) {
	  ?> | <a href="folder.php?category=<?php echo $category;?>&screen=<?php echo $i;?>"><?php echo $i;?></a> | 
	<?php 
	}
	if ($screen < $pages) {
	  $screen = $screen + 1;
	  ?><a href="folder.php?category=<?php echo $category;?>&screen=<?php echo $screen;?>">Next</a><br />
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