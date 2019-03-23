<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/container.css" rel="stylesheet" type="text/css" media="all"  />
<link href="css/new_home.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/song_list.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <div id="section2">
    	
		<table id="feature">
        	<tr>
            	<td id="folder_head">Featured Albums On MusicLovers.Com</td>
            </tr>
            <tr>
                <td style="background-color:#CCC;">
                    <?php
                    include('dbconfig.php');
                    $sel = "SELECT * from folder order by rand() desc LIMIT 4";
                    $result_set = mysql_query($sel);
                    while($row = mysql_fetch_array($result_set)){
                        ?>
                        <a href="song.php?category=<?php echo $row['category'];?>&folder_id=<?php echo $row['id'];?>"><img src="uploads/<?php echo $row['category'];?>/<?php echo $row['name'];?>/<?php echo $row['poster']; ?>" style="padding:15px;"></a>
                        <?php
                    }
                    ?>
                </td>
            </tr>
        
        </table>        
        
        <div id="latest">
        	<div id="latest_main_catagory">
            Latest Bollywood Music
            </div>
            <div id="latest_sub_catagory">
            <ul>
            	<?php
				$sel = "SELECT * from folder WHERE category='Bollywood Music' order by year desc LIMIT 10";
				$result_set2 = mysql_query($sel);

				while($row = mysql_fetch_array($result_set2)){
					?>
                    <li><img src="image/google-music-logo.png" style="width:30px;" />&nbsp;&nbsp;<a href="song.php?category=<?php echo $row['category'];?>&folder_id=<?php echo $row['id'];?>"><?php echo $row['name']; ?></a></li>
                    <?php
				}
				?>
            </ul>
            </div>
        </div>
        
        <div id="latest">
        	<div id="latest_main_catagory">
            Latest Punjabi Music
            </div>
            <div id="latest_sub_catagory">
            <ul>
            	<?php
				$sel = "SELECT * from folder WHERE category='Punjabi Music' order by year desc LIMIT 10";
				$result_set2 = mysql_query($sel);

				while($row = mysql_fetch_array($result_set2)){
					?>
                    <li><img src="image/google-music-logo.png" style="width:30px;" />&nbsp;&nbsp;<a href="song.php?category=<?php echo $row['category'];?>&folder_id=<?php echo $row['id'];?>"><?php echo $row['name']; ?></a></li>
                    <?php
				}
				?>
            </ul>
            </div>
        </div>
        
        <div id="latest">
        	<div id="latest_main_catagory">
            Latest DJ Remix Mp3 Songs
            </div>
            <div id="latest_sub_catagory">
            <ul>
            	<?php
				$sel = "SELECT * from folder WHERE category='DJ Remix Mp3 Songs' order by year desc LIMIT 10";
				$result_set2 = mysql_query($sel);

				while($row = mysql_fetch_array($result_set2)){
					?>
                    <li><img src="image/google-music-logo.png" style="width:30px;" />&nbsp;&nbsp;<a href="song.php?category=<?php echo $row['category'];?>&folder_id=<?php echo $row['id'];?>"><?php echo $row['name']; ?></a></li>
                    <?php
				}
				?>
            </ul>
            </div>
        </div>
       
        <div id="latest">
        	<div id="latest_main_catagory">
            Latest IndianPop Mp3 Songs
            </div>
            <div id="latest_sub_catagory">
            <ul>
            	<?php
				$sel = "SELECT * from folder WHERE category='IndianPop Mp3 Songs' order by year desc LIMIT 10";
				$result_set2 = mysql_query($sel);

				while($row = mysql_fetch_array($result_set2)){
					?>
                    <li><img src="image/google-music-logo.png" style="width:30px;" />&nbsp;&nbsp;<a href="song.php?category=<?php echo $row['category'];?>&folder_id=<?php echo $row['id'];?>"><?php echo $row['name']; ?></a></li>
                    <?php
				}
				?>
            </ul>
            </div>
        </div>
        
                           
    </div>
		
</body>
</html>