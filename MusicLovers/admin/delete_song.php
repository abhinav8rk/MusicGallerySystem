<?php
include'lib/login.php';
if($_SESSION["admin"]==""){
	header("location:login.php");
}
include 'include/dbconfig.php';
$category = $_REQUEST['category'];
$folder_id = $_REQUEST['folder_id'];
$sel1 = "SELECT * from folder where id=".$folder_id;
$result_set1 = mysql_query($sel1);
$row1 = mysql_fetch_array($result_set1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete from <?php echo $row1['name']; ?> </title>
<link rel="stylesheet" type="text/css" href="css/add_audio.css" />
<link rel="stylesheet" type="text/css" href="include/css/admin.css" />
</head>
<body>
<?php
include ('include/main.php');
?>
<div id="add_form"><center>Delete from <b><u><?php echo $row1['name']; ?></u></b>
</center><p>
    <table border="2px" align="center">
        <tr>
        	<th>Serial No.</th>
            <th>Song Name </th>
            <th>Delete Song</th>
        </tr>
		<?php
		include 'include/dbconfig.php';
			$i=1;
			$sel = "SELECT * from song where folder_id=".$folder_id;
			$result_set = mysql_query($sel);

			while($row = mysql_fetch_array($result_set))
			{?>
            <tr>
            	<td><?php echo $i;?></td>
            	<td><?php echo $row['name']; ?></td>
                <td><a href="lib/delete_song.php?folder_id=<?php echo $folder_id;?>&song_id=<?php echo $row['id'];?>&folder_name=<?php echo $row1['name'];?>&category=<?php echo $category;?>"><center><img src="image/Delete_Marker.png" height="40px"/></center></a></td>
            </tr>
			 <?php
			 $i++;	
			}
        ?>
    </table>
</div>
</body>
</html>