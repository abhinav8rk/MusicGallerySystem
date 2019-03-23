<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome <?php
			   include'dbconfig.php';
			   include'../lib/login.php';
			   echo $_SESSION['username'];
			   ?>
</title>
<link rel="stylesheet" type="text/css" href="css/admin.css" />
</head>
<body>
<div id="nav">
    <div id="nav_wrapper">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li>
                <a href="#">Create New Folder in <img src="css/arrow.png" /></a>
                	<ul>
                    	<li><a href="create_folder.php?category=<?php echo "Bollywood Music";?>">Bollywood Music</a></li>
                        <li><a href="create_folder.php?category=<?php echo "DJ Remix Mp3 Songs";?>">DJ Remix Mp3 Songs</a></li>
                        <li><a href="create_folder.php?category=<?php echo "Punjabi Music";?>">Punjabi Music</a></li>
                        <li><a href="create_folder.php?category=<?php echo "IndianPop Mp3 Songs";?>">IndianPop Mp3 Songs</a></li>
                        <li><a href="create_folder.php?category=<?php echo "Instrumental Songs Collections";?>">Instrumental Songs Collections</a></li>
                    </ul>
                 </li>
                
            	<li>
                <a href="#">Add Song <img src="css/arrow.png" /></a>
                	<ul>
                    	<li><a href="add_song.php?category=<?php echo "Bollywood Music";?>">Bollywood Music</a></li>
                        <li><a href="add_song.php?category=<?php echo "DJ Remix Mp3 Songs";?>">DJ Remix Mp3 Songs</a></li>
                        <li><a href="add_song.php?category=<?php echo "Punjabi Music";?>">Punjabi Music</a></li>
                        <li><a href="add_song.php?category=<?php echo "IndianPop Mp3 Songs";?>">IndianPop Mp3 Songs</a></li>
                        <li><a href="add_song.php?category=<?php echo "Instrumental Songs Collections";?>">Instrumental Songs Collections</a></li>
                    </ul>
                 </li>
                	
                <li>
            	<a href="#">Delete from <img src="css/arrow.png" /></a>
					<ul>
                    	<li><a href="delete_folder.php?category=<?php echo "Bollywood Music";?>">Bollywood Music</a></li>
                        <li><a href="delete_folder.php?category=<?php echo "DJ Remix Mp3 Songs";?>">DJ Remix Mp3 Songs</a></li>
                        <li><a href="delete_folder.php?category=<?php echo "Punjabi Music";?>">Punjabi Music</a></li>
                        <li><a href="delete_folder.php?category=<?php echo "IndianPop Mp3 Songs";?>">IndianPop Mp3 Songs</a></li>
                        <li><a href="delete_folder.php?category=<?php echo "Instrumental Songs Collections";?>">Instrumental Songs Collections</a></li>
                    </ul>                
                </li>
                	
                <li>
                <a href="#">Edit in <img src="css/arrow.png" /></a>
                	<ul>
                    	<li><a href="edit.php?category=<?php echo "Bollywood Music";?>">Bollywood Music</a></li>
                        <li><a href="edit.php?category=<?php echo "DJ Remix Mp3 Songs";?>">DJ Remix Mp3 Songs</a></li>
                        <li><a href="edit.php?category=<?php echo "Punjabi Music";?>">Punjabi Music</a></li>
                        <li><a href="edit.php?category=<?php echo "IndianPop Mp3 Songs";?>">IndianPop Mp3 Songs</a></li>
                        <li><a href="edit.php?category=<?php echo "Instrumental Songs Collections";?>">Instrumental Songs Collections</a></li>
                    </ul>
                </li>
                	
                <li>
                <a href="setting.php">Setting</a></li>
                <li>
                <a href="log_out.php">Log Out</a></li>
        </ul>
    </div> 
</div>
</body>
</html>