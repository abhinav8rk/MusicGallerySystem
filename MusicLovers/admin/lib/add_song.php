<?php
require('../include/dbconfig.php');
if(isset($_REQUEST['add_song']))
{					
	$category = $_REQUEST['category'];
	if($_REQUEST['folder_id'] != ""){
		$song_name = $_REQUEST['song_name'];
		$folder_id = $_REQUEST['folder_id'];
		$sel_folder = "SELECT * FROM folder WHERE id=".$folder_id;
		$result_set = mysql_query($sel_folder);
		$fetch = mysql_fetch_array($result_set);
		$folder_name = $fetch['name'];
		$singer1 = $_REQUEST['singer1'];
		$singer2 = $_REQUEST['singer2'];
		$target_audio = "../../uploads/".$category."/".$folder_name."/";
		$size = $_FILES['song_file']['size']/1048576;
		$ext = pathinfo($_FILES['song_file']['name'],PATHINFO_EXTENSION);
		
		if($_FILES['song_file']['name'] == ""){
			?>
			<script>
			alert("Please select mp3 file.");
			window.history.back();
			</script>	
			<?php
		}
		else{
				
			if($ext == 'mp3'){
				
				$new_song_name = $song_name.".".$ext;
						
				if(move_uploaded_file($_FILES['song_file']['tmp_name'], $target_audio.$new_song_name))
				{
					$sql = "INSERT into song(folder_id,name,singer1,singer2,size) values ('$folder_id','$song_name','$singer1','$singer2','$size')";
					mysql_query($sql);
					?>
					<script>
					alert("Song Uploaded Successfully.");
					window.location.href='../add_song.php?category=<?php echo $category;?>';
					</script>
					<?php
				}
				else
				{
					?>
					<script>
					alert("Problem while uploading.");
					window.history.back();
					</script>
					<?php
				}	
			}
			else{
				?>
				<script>
				alert("Please add only mp3 songs...");
				window.history.back();
				</script>
				<?php
			}
		}
	}
	else{
		?>
		<script>
		alert("Please select Folder...");
		window.history.back();
		</script>
		<?php
	}
}
?>