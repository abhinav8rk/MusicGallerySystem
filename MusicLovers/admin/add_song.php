<?php
include'lib/login.php';
if($_SESSION["admin"]==""){
	header("location:login.php");
}
$category = $_REQUEST['category'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Song in <?php echo $category;?></title>
<link rel="stylesheet" type="text/css" href="css/add_audio.css" />
</head>
<body>
<?php 
include_once ('include/main.php');
?>
<div id="add_form"><center>Add Song in <b><u><?php echo $category;?></u></b></center><p>
	<form action="lib/add_song.php?category=<?php echo $category;?>" method="post"  enctype="multipart/form-data">
    	<table border="2px" align="center">
            <tr>
                <td>Folder Name </td>
                	<td>
                    	<select name="folder_id">
                        <option value="" selected="selected">Select Folder</option>
                        	<?php
									include 'include/dbconfig.php';
									$sel = "SELECT * from folder WHERE category='$category' order by name";
									$result_set = mysql_query($sel);
									while($row = mysql_fetch_array($result_set))
									{?> 
                                    	<option value="<?php echo $row['id'];?>"><?php echo $row['name']; ?></option>
									 <?php	
									}
                           	?>
                        </select>
                	</td>
            </tr>
        	<tr>    
                <td>Select Song </td><td> <input type="file" name="song_file" width="200px"/></td>
            </tr>    
            <tr>    
                <td>Song Name </td><td><input type="text" name="song_name" width="200px" required="required"/></td>
            </tr>
            <tr>    
                <td>Singer(s) Name </td><td> <input type="text" name="singer1" width="200px"/><p><input type="text" name="singer2" width="200px" /></td>
            </tr>
            <tr>
            	<td colspan="2"><center><input type="submit" name="add_song" value="Add Song" /></center></td>
            </tr>
		</table>
	</form>
</div>
</body>
</html>