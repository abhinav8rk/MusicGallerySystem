<?php
include'lib/login.php';
if($_SESSION["admin"]==""){
	header("location:login.php");
}
include 'include/dbconfig.php';
$folder_id = $_REQUEST['folder_id'];
$sel1 = "SELECT * from folder where id=".$folder_id;
$result_set1 = mysql_query($sel1);
$row1 = mysql_fetch_array($result_set1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Song List of <?php echo $row1['name'];?></title>
<link rel="stylesheet" type="text/css" href="css/add_audio.css" />
</head>
<body>
<?php
include 'include/main.php';
?>
<div id="add_form"><center>Song List of <?php echo $row1['name'];?></center><p>
    	<table border="2px" align="center">
            <tr>
            	<th>Sr. No. </th>
                <th>Song Name</th>
            </tr>
            <?php
				$i=1;
				include 'include/dbconfig.php';
				$sel = "SELECT * from song where folder_id=".$folder_id;
				$result_set = mysql_query($sel);
				while($row = mysql_fetch_array($result_set))
				{?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><a href="edit_song.php?song_id=<?php echo $row['id'];?>"><?php echo $row['name']; ?></a></td>
				</tr>
				 <?php	
				 $i++;
				}
			?>
		</table>
</div>
</body>
</html>