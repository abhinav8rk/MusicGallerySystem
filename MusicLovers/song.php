<?php
	include('include/dbconfig.php');
	$category = $_REQUEST['category'];
	$folder_id = $_GET["folder_id"];
	$pic_name = "SELECT * from folder WHERE id='$folder_id'";
	$query_pic = mysql_query($pic_name);
	$row_pic = mysql_fetch_array($query_pic);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $row_pic['name']." (".$row_pic['year'].")"; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="image/m-for-music.png" />
<link href="css/container.css" rel="stylesheet" type="text/css" media="all"  />
<link href="css/new_home.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/song_list.css" rel="stylesheet" type="text/css" media="all" />
<script>
$(".playback").click(function(e) {

  // pause all other tracks
  $('.audio').each(function () {
    var song = this;
    if (!song.paused) { song.pause(); }
  });

  // play the audio associated with this element
  this.play();

});
</script>
</head>

<body>
<div id="container">
	<?php
    include'include/header.php';
	?>
    <div id="navigator">
    <hr style="margin:0px;"/>
    	&nbsp;&nbsp;<a href="index.php">Home</a> >> <a href="folder.php?category=<?php echo $category;?>"><?php echo $category;?></a> >> <b><?php echo $row_pic['name']." (".$row_pic['year'].")"; ?></b> 
        <hr style="margin:0px;"/>
	</div>
    <?php
    include'include/search.php';
	include'include/section1.php';
    ?>
    <div id="section2">
    	<table id="feature" cellspacing="1" width="800">
			<tr>
				<td colspan="2" id="folder_head"><?php echo $row_pic['name']." (".$row_pic['year'].")";?></td>
            </tr>
        	<tr bgcolor="#CCC">
               	<?php
				if(isset($_GET["folder_id"])){
				$songname = "";
				$folder_id = $_GET["folder_id"];
include('include/dbconfig.php');
				$rows_per_page = 6;
				$sel = "SELECT * FROM song";
				$result = mysql_query($sel);
				$total_records = mysql_num_rows($result);
				$pages = ceil($total_records / $rows_per_page);
				mysql_free_result($result);
				$screen = $_GET["screen"];
				if (!isset($screen)){
				$screen = 0;
				}
				$start = $screen * $rows_per_page;

				$pic_name = "SELECT * from folder WHERE id=".$folder_id;
				$query_pic = mysql_query($pic_name);
				$row_pic = mysql_fetch_array($query_pic);
				?>
                <td style="padding-top:10px; padding-bottom:10px; width:50%; text-align:center;"><img src="uploads/<?php echo $category;?>/<?php echo $row_pic['name'];?>/<?php echo $row_pic['poster'];?>" style="width:300px; height:225px;"/></td>
                <?php
				if($category == "Bollywood Music"){ 
				?>
                <td style="vertical-align:top; width:50%; font-family:Arial, Helvetica, sans-serif; font-size:16px; padding-left:10px; padding-top:20px;">
                <b> Starring : </b><a href="star_movie.php?star=<?php echo $row_pic['star1'];?>"><?php echo $row_pic['star1'];?></a>
                				   <?php
                                   if($row_pic['star2']!=""){
								   ?><a href="star_movie.php?star=<?php echo $row_pic['star2'];?>"><?php echo ", ".$row_pic['star2'];?></a>
                				   <?php }
                                   ?>
                                   
                <br />
                <b> Director : </b><a href="director_movie.php?director=<?php echo $row_pic['director'];?>"><?php echo $row_pic['director'];?></a><br />
                <b> Music Director : </b><a href="music_director_movie.php?md=<?php echo $row_pic['music_director'];?>"><?php echo $row_pic['music_director'];?></a>
               <br />
                <b> Composer : </b><a href="composer_movie.php?composer=<?php echo $row_pic['composer'];?>"><?php echo $row_pic['composer'];?></a>
                
                </td>
                <?php
				}
				?>
            </tr>
         </table>
         
         <table id="feature" width="800" cellspacing="1">
         	<tr>
				<td colspan="3" id="folder_head">Song List</td>
            </tr>    
         		<?php 
				$sql="SELECT * FROM song WHERE folder_id='$folder_id' LIMIT $start,$rows_per_page";
				$query = mysql_query($sql);
				$i=1;
				$total_size = 0;
				while($row = mysql_fetch_array($query)){
				?>
            <tr bgcolor="#CCC">    
				<td style="padding:5px; font-family:Arial, Helvetica, sans-serif; font-size:14px; text-decoration:none;">
                <img src="image/google-music-logo.png" style="width:30px; height:30px; vertical-align:middle;"/>
				<?php
				echo $i.") <b>".$row["name"]."</b><br>";
				echo "<i>singer(s) : "?><a href="singer_song.php?singer=<?php echo $row['singer1'];?>"><?php echo $row['singer1']?></a>
                						<a href="singer_song.php?singer=<?php echo $row['singer2'];?>"><?php if($row['singer2']!=""){
																											 echo ", ".$row['singer2'];}?></a>
                                                        <br /><?php 
				echo "size : ".$row['size']." mb</i>";
				$total_size = $total_size + $row['size'];
		 		?>
		 		</td>
                <td style="padding:5px; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:14px; vertical-align:middle;">
                <a href="lib/download_song.php?category=<?php echo $category;?>&folder_name=<?php echo $row_pic['name'];?>&song_id=<?php echo $row['id']; ?>"><img src="image/download.png" style="height:30px;"/></a>
				<form action="lib/favourite.php?song_id=<?php echo $row['id'];?>" method="post">
                <input type="submit" name="add_playlist" value="Add to My Playlist" />
                </form></td>
		 		<td id="song_list">
                <audio controls="controls" class="playback"> 
		 		<source src="uploads/<?php echo $category;?>/<?php echo $row_pic['name'];?>/<?php echo $row['name'].".mp3"; ?>" type="audio/mpeg">
		 		</audio>
		 		</td>
		 	</tr>
		 		<?php
		 		$i++;
				}
		 		}
		 		?>  
         </table>
         <table id="feature" width="800" cellspacing="1">
         	<tr>
            	<td id="folder_head">Download All in One - Zip Link</td>
            </tr>
            <tr bgcolor="#CCC">
            	<td id="song_list">
                <a href="lib/download_folder.php?category=<?php echo $category;?>&folder_name=<?php echo $row_pic['name'];?>&folder_id=<?php echo $folder_id;?>"><img src="image/Zip-Rar.png" style="width:30px; height:30px; vertical-align:middle;"/><?php echo $row_pic['name'].	"(".$row_pic['year'].") Mp3 Songs Zip Download (".$total_size." MB)";?></a>
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