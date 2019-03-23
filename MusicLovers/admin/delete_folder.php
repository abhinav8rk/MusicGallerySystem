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
<title>Delete from <?php echo $category;?></title>
<link rel="stylesheet" type="text/css" href="css/add_audio.css" />
</head>
<body>
<?php
include_once ('include/main.php');
?>
<div id="add_form"><center>Delete from <b><u><?php echo $category;?></u></b></center><p>
    <table border="2px" align="center">
        <tr>
        	<th>Serial No.</th>
            <th>Folder Name </th>
            <th>Delete Folder</th>
        </tr>
            <?php
				$i=1;
				include 'include/dbconfig.php';
				$sel = "SELECT * from folder WHERE category='$category' order by name";
				$result_set = mysql_query($sel);
				while($row = mysql_fetch_array($result_set))
				{?>
                <tr>
                	<td><?php echo $i;?></td>
                	<td><a href="delete_song.php?folder_id=<?php echo $row['id']; ?>&category=<?php echo $category;?>"><?php echo $row['name']; ?></a></td>
                    <td><a href="lib/delete_folder.php?folder_id=<?php echo $row['id']; ?>&category=<?php echo $category;?>&folder_name=<?php echo $row['name'];?>"><center><img src="image/Delete_Marker.png" height="40px"/></center></a></td>
				</tr>	
				 <?php
				 $i++;	
				}
            ?>
    </table>
</div>
</body>
</html>