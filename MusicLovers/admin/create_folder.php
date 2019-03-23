<?php
include'lib/login.php';
if($_SESSION["admin"]==""){
	header("location:login.php");
}
$category = $_GET['category'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $category;?></title>
<link rel="stylesheet" type="text/css" href="css/add_audio.css" />
<link rel="stylesheet" type="text/css" href="include/css/admin.css" />
</head>
<body>
<?php
include('include/main.php');
?>
<div id="add_form"><center>Create New Folder In <b><u><?php echo $category;?></u></b></center><p>
	<form action="lib/create_folder.php?category=<?php echo $category;?>" method="post"  enctype="multipart/form-data">
    	<table border="2px" align="center">
        	<tr>
                <td>Movie/Album Name </td><td> <input type="text" name="name" required="required"/></td>
            </tr>
            <tr>    
                <td>Year </td><td> <select name="year" id="year">
                				   <?php
								       for($i=date("Y");$i>1969;$i--){
										   ?>
                                           <option value="<?php echo $i;?>"><?php echo $i; ?></option>
                                           <?php
									   }
								   ?>
                				   </select>
                			  </td>
            </tr>
            <?php
			if($category == "Bollywood Music"){
			?>
            <tr>    
                <td>Director  </td><td> <input type="text" name="director" width="200px"/></td>
            </tr>
            <tr>    
                <td>Music Director  </td><td> <input type="text" name="music_director" width="200px" /></td>
            </tr>
            <tr>    
                <td>Composer  </td><td> <input type="text" name="composer" width="200px"/></td>
            </tr>
            <tr>    
                <td>Starring </td><td> <input type="text" name="star1" width="200px"/><p><input type="text" name="star2" width="200px" req/></td>
            </tr>
            <?php
			}
			?>
            <tr>    
                <td>Poster </td><td> <input type="file" name="pic" /></td>
            </tr>
            <tr>
            	<td colspan="2"><center><input type="submit" name="create_folder" value="Create Folder" /></center></td>
            </tr>
		</table>
	</form>
</div>
</body>
</html>