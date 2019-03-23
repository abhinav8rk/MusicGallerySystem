<?php
include'lib/login.php';
if($_SESSION["admin"]==""){
	header("location:login.php");
}
	$song_id = $_REQUEST['song_id'];
	include_once 'include/dbconfig.php';
	$sel = "SELECT * from song where id=".$song_id;
	$result_set = mysql_query($sel);
	$row = mysql_fetch_array($result_set);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit <?php echo $row['name'];?> Song</title>
<link rel="stylesheet" type="text/css" href="css/add_audio.css" />
</head>
<body>
<?php
include_once ('include/main.php');
?>
<div id="add_form"><center>Edit <b><u><?php echo $row['name'];?></u></b> Song</center><p>
    	<table border="2px" align="center">
                <form method="post" action="lib/edit_song.php?song_id=<?php echo $song_id;?>" enctype="multipart/form-data">
                <tr>
                    <td>Song Name </td>
                    <td><input type="text" name="name" required="required" value="<?php echo $row['name'];?>"/></td>
                </tr>
                <tr>
                    <td>Singer 1 </td>
                    <td><input type="text" name="singer1" value="<?php echo $row['singer1'];?>"/></td>
                </tr>
                <tr>
                    <td>Singer 2 </td>
                    <td><input type="text" name="singer2" value="<?php echo $row['singer2'];?>"/></td>
                </tr>
                <tr align="center">
                	<td colspan="2"><input type="submit" name="edit" value="Edit Song" /></td>
                </tr>
                </form>
		</table>
</div>
</body>
</html>