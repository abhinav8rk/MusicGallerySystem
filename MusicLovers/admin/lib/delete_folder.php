<?php
if(isset($_REQUEST['folder_id'])){
	include'../include/dbconfig.php';
	$category = $_REQUEST['category'];
	$folder_id = $_REQUEST['folder_id'];
	$folder_name = $_REQUEST['folder_name'];
	
	$sel = "SELECT * from song where folder_id=".$folder_id;
	$result_set = mysql_query($sel);
	
	$pic_name = mysql_query("SELECT * from folder where id=$folder_id");
	$fetch_pic = mysql_fetch_array($pic_name);
	
	$del_folder = "DELETE from folder where id=".$folder_id;
	
	while($row = mysql_fetch_array($result_set)){
			  mysql_query("DELETE from song where folder_id=".$folder_id);
			  unlink("../../uploads/".$category."/".$folder_name."/".$row['name'].".mp3");
		  }
	unlink("../../uploads/".$category."/".$folder_name."/".$fetch_pic['poster']);
		
	if(rmdir("../../uploads/".$category."/".$folder_name)){
		if(mysql_query($del_folder)){
			?>
			<script>
			alert("Folder Deleted successfully...");
			window.location.href='../delete_folder.php?category=<?php echo $category;?>';
			</script>
			<?php			
		}
		else{
			?>
			<script>
			alert("Problem while deleting folder from database...Try Again...");
			window.location.href='../delete_folder.php?category=<?php echo $category;?>';
			</script>
			<?php
		}
	}
	else{
		?>
		<script>
		alert("Problem while deleting uploaded folder...Try Again...");
		window.location.href='../delete_folder.php?category=<?php echo $category;?>';
		</script>
		<?php	
	}
}
?>