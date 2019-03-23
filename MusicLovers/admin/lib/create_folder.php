<?php
require('../include/dbconfig.php');
if(isset($_REQUEST['create_folder']))
{
	$category = $_REQUEST['category'];
	$name = $_REQUEST['name'];
	$year = $_REQUEST['year'];
	if($category == "Bollywood Music"){	
		$director = $_REQUEST['director'];
		$music_director = $_REQUEST['music_director'];
		$composer = $_REQUEST['composer'];
		$star1 = $_REQUEST['star1'];
		$star2 = $_REQUEST['star2'];
	}
	else{
		$director = "";
		$music_director = "";
		$composer = "";
		$star1 = "";
		$star2 = "";
	}
	$target_img = "../../uploads/".$category."/".$name."/";
	$banner = $_FILES['pic']['name'];

	if(!file_exists("../../uploads/".$category."/".$name)){
		mkdir("../../uploads/".$category."/".$name);
		
		$sql = "INSERT into folder(category,name,year,star1,star2,director,music_director,composer,poster) values ('$category','$name','$year','$star1','$star2','$director','$music_director','$composer','$banner')";
			
		if($_FILES['pic']['type'] == "image/jpeg"){			
			if(move_uploaded_file($_FILES['pic']['tmp_name'],$target_img.$_FILES['pic']['name']) && mysql_query($sql)){
				?>
				<script>
				alert("Folder Created Successfully with Poster.");
				window.location.href="../create_folder.php?category=<?php echo $category;?>";
				</script>
				<?php
			}
			else{
				?>
				<script>
				alert("Folder Creating Failed.");
				window.location.href="../create_folder.php?category=<?php echo $category;?>";
				</script>
				<?php
			}
		}
		else if($_FILES['pic']['name'] == ""){
			if(mysql_query($sql)){
				?>
				<script>
				alert("Folder Created Successfully without Poster.");
				window.location.href="../create_folder.php?category=<?php echo $category;?>";
				</script>
				<?php
			}
			else{
				?>
				<script>
				alert("Folder Creating Failed.");
				window.location.href="../create_folder.php?category=<?php echo $category;?>";
				</script>
				<?php
			}
		}
		else{
			?>
			<script>
			alert("Please enter only image file.");
			window.location.href="../create_folder.php?category=<?php echo $category;?>";
			</script>
			<?php
		}		
	}
	else{
		?>
		<script>
		alert("Folder already created.");
		window.location.href="../create_folder.php?category=<?php echo $category;?>";
		</script>
		<?php	
	}
}
?>