<?php
if(isset($_REQUEST['song_id'])){
	include'../include/dbconfig.php';
	$category = $_REQUEST['category'];
	$folder_id = $_REQUEST['folder_id'];
	$folder_name = $_REQUEST['folder_name'];
	$song_id = $_REQUEST['song_id'];	
	
	$sel = "SELECT * from song where id=".$song_id;
	$result_set = mysql_query($sel);
	$fetch_song = mysql_fetch_array($result_set);
	
	if(	mysql_query("DELETE from song where id=".$song_id) 	&&
		   unlink("../../uploads/".$category."/".$folder_name."/".$fetch_song['name'].".mp3")					
	  ){
		   ?>
		   <script>
		   alert("Songs Deleted successfully...");
		   window.location.href='../delete_song.php?folder_id=<?php echo $folder_id;?>&category=<?php echo $category;?>';
		   </script>
		   <?php
	}
	else{
		?>
	   <script>
	   alert("Error while deleting song.");
	   window.location.href='../delete_song.php?folder_id=<?php echo $folder_id;?>&category=<?php echo $category;?>';
	   </script>
	   <?php
	}           
}
?>