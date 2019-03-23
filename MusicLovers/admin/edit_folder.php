<?php
include'lib/login.php';
if($_SESSION["admin"]==""){
	header("location:login.php");
}
$folder_id = $_REQUEST['folder_id'];
include 'include/dbconfig.php';
$sel = "SELECT * from folder where id=".$folder_id;
$result_set = mysql_query($sel);
$row = mysql_fetch_array($result_set);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit in <?php echo $row['name'];?></title>
<link rel="stylesheet" type="text/css" href="css/add_audio.css" />
</head>
<body>
<?php
include_once ('include/main.php');
?>
<div id="add_form"><center>Edit <b><u><?php echo $row['name'];?></u></b> Folder</center><p>
    	<table border="2px" align="center">
                <form method="post" action="lib/edit_folder.php?folder_id=<?php echo $folder_id;?>" enctype="multipart/form-data">
                <tr>
                    <td>Folder Category </td>
                    <td><select name="category">
                    		<?php echo $cat = $row['category'];?>
                    		<option
                            <?php
								if($cat=="Bollywood Music"){
							?>		selected="selected"
							<?php	}
							?>
                            value="Bollywood Music">Bollywood Music</option>
                            <option
                             <?php
								if($cat=="DJ Remix Mp3 Songs"){
							?>		selected="selected"
							<?php	}
							?>
                            value="DJ Remix Mp3 Songs">DJ Remix Mp3 Songs</option>
                            <option 
                             <?php
								if($cat=="Punjabi Music"){
							?>		selected="selected"
							<?php	}
							?>
                            value="Punjabi Music">Punjabi Music</option>
                            <option
                             <?php
								if($cat=="IndianPop Mp3 Songs"){
							?>		selected="selected"
							<?php	}
							?>
                            value="IndianPop Mp3 Songs">IndianPop Mp3 Songs</option>
                            <option 
                             <?php
								if($cat=="Instrumental Songs Collections"){
							?>		selected="selected"
							<?php	}
							?>
                            value="Instrumental Songs Collections">Instrumental Songs Collections</option>                    
                    	</select>
                    </td>
                </tr>
                <tr>
                    <td>Folder Name </td>
                    <td><input type="text" name="folder_name" value="<?php echo $row['name'];?>" required="required"/></td>
                </tr>
                <tr>
                    <td>Year </td>
                    <td><select name="year" id="year">
                    					   <option selected="selected" value="<?php echo $row['year'];?>"><?php echo $row['year'];?></option>
                				   <?php
								       for($i=date("Y");$i>1969;$i--){
										   if($row['year']==$i){
											   continue;
										   }
										   ?>
                                           <option value="<?php echo $i;?>"><?php echo $i; ?></option>
                                           <?php
									   }
								   ?>
                				   </select>
                    </td>
                </tr>
                <?php
				if($cat == "Bollywood Music"){
				?>
                <tr>
                    <td>Star 1 </td>
                    <td><input type="text" name="star1" value="<?php echo $row['star1'];?>"/></td>
                </tr>
                 <tr>
                    <td>Star 2 </td>
                    <td><input type="text" name="star2" value="<?php echo $row['star2'];?>"/></td>
                </tr>
                <tr>
                    <td>Director </td>
                    <td><input type="text" name="director" value="<?php echo $row['director'];?>" /></td>
                </tr>
                <tr>
                    <td>Music Director </td>
                    <td><input type="text" name="music_director" value="<?php echo $row['music_director'];?>" /></td>
                </tr>
                <tr>
                    <td>Composer </td>
                    <td><input type="text" name="composer" value="<?php echo $row['composer'];?>" /></td>
                </tr>
                <?php
				}
				?>
                <tr>
                    <td>Folder Pic </td>
                    <td><input type="file" name="pic"/></td>
                </tr>
                <tr align="center">
                	<td colspan="2"><input type="submit" name="edit" value="Edit Folder" /></td>
                </tr>
                </form>
		</table>
</div>
</body>
</html>