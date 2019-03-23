<?php
$composer = $_REQUEST['composer'];
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
<title><?php echo $composer;?></title>
</head>

<body>
<div id="container">
	<?php
    include'include/header.php';
	?>
    <div id="navigator">
    <hr style="margin:0px;"/>
    	&nbsp;&nbsp;<a href="index.php">Home</a> >> <a href="composer.php">Composers</a> <b>>> <?php echo $composer;?></b>
        <hr style="margin:0px;"/>
	</div>
    <?php
    include'include/search.php';
    include'include/section1.php';
    ?>
    <div id="section2">
    	
		<div id="folder_head"><?php echo $composer;?></div>
        <table style="background-color:#FFF; padding:5px;">
        	<tr style="text-align:center;">
            	<td>        
                    <?php
                    include('include/dbconfig.php');
                    $sel = "SELECT * from folder WHERE composer='$composer' order by year desc LIMIT 12";
                    $result_set = mysql_query($sel);
					while($row = mysql_fetch_array($result_set)){
                        ?>
        		    <tr id="movie_folder">
            			<td style="padding:30px; width:220px;">
                            <a href="song.php?category=<?php echo 'Bollywood Music';?>&folder_id=<?php echo $row['id']; ?>" style="padding:30px;"><img src="uploads/<?php echo 'Bollywood Music';?>/<?php echo $row['name'];?>/<?php echo $row['poster']; ?>"></a><br>
                            <center><a href="song.php?category=<?php echo 'Bollywood Music';?>&folder_id=<?php echo $row['id']; ?>" style="padding:0px; font-family:Arial, Helvetica, sans-serif;"><?php echo $row['name']." (".$row['year'].")"; ?></a><hr />
                            <form action="lib/my_album.php" method="post">
                            <input type="hidden" name="folder_id" value="<?php echo $row['folder_id'];?>">
                            <input type="hidden" name="catagory" value="bollywood_music" />
                            <input type="submit" name="add_album" value="Add to My Album" />
                            </form></center>
                    	</td>
                    </tr>
                    <?php
                    }
                    ?>
        		</td>
            </tr>
        </table>        
                              
    </div>
    
	<?php
    include'include/footer.php';
    ?>    	
</div>
</body>
</html>