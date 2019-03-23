<?php
require('../include/dbconfig.php');
if(isset($_REQUEST['edit']))
{
	$folder_id = $_REQUEST['folder_id'];
	$category = $_REQUEST['category'];
	$folder_name = $_REQUEST['folder_name'];
	$year = $_REQUEST['year'];
	if($category == "Bollywood Music"){
		$director = $_REQUEST['director'];
		$md = $_REQUEST['music_director'];
		$composer = $_REQUEST['composer'];
		$star1 = $_REQUEST['star1'];
		$star2 = $_REQUEST['star2'];
	}
	else{
		$director = "";
		$md = "";
		$composer = "";
		$star1 = "";
		$star2 = "";
	}
	$banner = $_FILES['pic']['name'];
	
	$sel_folder_name = "SELECT * from folder WHERE id=".$folder_id;
	$result_set = mysql_query($sel_folder_name);
	$row = mysql_fetch_array($result_set);
	$old_folder_name = $row['name'];
	
	if($old_folder_name != $folder_name){
		rename("../../uploads/".$category."/".$old_folder_name,"../../uploads/".$category."/".$folder_name);
		$target_img = "../../uploads/".$category."/".$folder_name."/";	
	}
	else{
		$target_img = "../../uploads/".$category."/".$old_folder_name."/";
	}
	$sql = "UPDATE folder SET category='$category', name='$folder_name', year='$year', director='$director', music_director='$md', composer='$composer', star1='$star1', star2='$star2', poster='$banner' WHERE id=".$folder_id;
	
	if($_FILES['pic']['type'] == "image/jpeg"){
		if(move_uploaded_file($_FILES['pic']['tmp_name'],$target_img.$_FILES['pic']['name']) && mysql_query($sql)){
			?>
			<script>
			alert("Folder Edited Successfully with Poster.");
			window.location.href='../edit.php?category=<?php echo $category;?>';
			</script>
			<?php
		}
		else{
			?>
			<script>
			alert("Folder Editing Failed.");
			window.history.back();
			</script>
			<?php
		}
	}
	else if($_FILES['pic']['name'] == ""){
		if(mysql_query($sql)){
			?>
			<script>
			alert("Folder Edited Successfully without Poster.");
			window.location.href='../edit.php?category=<?php echo $category;?>';
			</script>
			<?php
		}
		else{
			?>
			<script>
			alert("Folder Editing Failed.");
			window.history.back();
			</script>
			<?php
		}
	}
	else{
		?>
		<script>
		alert("Please enter only image file.");
		window.history.back();
		</script>
		<?php
	}
}
?>