<?php
require('../include/dbconfig.php');
if(isset($_REQUEST['edit']))
{					
	$song_id = $_REQUEST['song_id'];
	$new_name = $_REQUEST['name'];
	$singer1 = $_REQUEST['singer1'];
	$singer2 = $_REQUEST['singer2'];
	
	$sel = "SELECT * from song where id=".$song_id;
	$result_set = mysql_query($sel);
	$row = mysql_fetch_array($result_set);
	$old_name = $row['name'];
	
	$sel1 = "SELECT * FROM folder WHERE id=".$row['folder_id'];
	$result_set1 = mysql_query($sel1);
	$row1 = mysql_fetch_array($result_set1);
	$category = $row1['category'];
	$folder_name = $row1['name'];
		
	$sql = "UPDATE song SET name='$new_name',singer1='$singer1',singer2='$singer2' WHERE id=".$song_id;
	if(mysql_query($sql) && rename("../../uploads/".$category."/".$folder_name."/".$old_name.".mp3","../../uploads/".$category."/".$folder_name."/".$new_name.".mp3")){
		?>
		<script>
		alert("Song Edited Successfully.");
		window.location.href='../edit.php?category=<?php echo $category;?>';
		</script>
		<?php
	}
	else{
		?>
		<script>
		alert("Error while editing song.");
		window.history.back();
		</script>
		<?php
	}
		
}
?>