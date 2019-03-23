<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="image/m-for-music.png" />
<link href="css/container.css" rel="stylesheet" type="text/css" media="all"  />
<link href="css/new_home.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/music_folder.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/song_list.css" rel="stylesheet" type="text/css" media="all" />
<title>Feedback</title>
</head>

<body>
<div id="container">
	<?php
    include'include/header.php';
	?>
    <div id="navigator">
    <hr style="margin:0px;"/>
    	&nbsp;&nbsp;<a href="index.php">Home</a> >> <b>Feedback</b> 
        <hr style="margin:0px;"/>
	</div>
    <?php
    include'include/search.php';
	include'include/section1.php';
    ?>
    <div id="section2">
    	<form action="lib/feedback.php" method="get">
		<table id="feature" cellspacing="1" width="800">
			<tr>
				<td colspan="2" id="folder_head">Feedback</td>
            </tr>
            <tr>
            	<td style="font-family:Arial, Helvetica, sans-serif; padding:10px; font-size:16px;">Name <sup>*</sup></td>
				<td style="padding:10px;"><input style="width:200px;" value="<?php echo $row_name['name'];?>" type="text" name="name" required="required" title="Name field should be filled." /></td>
            </tr>
            <tr>
            	<td style="font-family:Arial, Helvetica, sans-serif; padding:10px; font-size:16px;">E-mail <sup>*</sup></td>
				<td style="padding:10px;"><input style="width:200px;" value="<?php echo $row_name['e_mail'];?>" type="text" name="e_mail" required="required" title="E-Mail field should be filled."/></td>
            </tr>
            <tr>
            	<td style="font-family:Arial, Helvetica, sans-serif; padding:10px; font-size:16px;">Subject <sup>*</sup></td>
				<td style="padding:10px;"><input style="width:200px;" type="text" name="subject" required="required" title="Subject field should be filled." /></td>
            </tr>
            <tr>
            	<td style="font-family:Arial, Helvetica, sans-serif; padding:10px; font-size:16px; vertical-align:top;">Message <sup>*</sup></td>
				<td style="padding:10px;"><textarea style="height:250px; width:400px;" name="message" required="required" title="Message field should be filled." ></textarea></td>
            </tr>	
            <tr>
            	<td style="padding:20px;" align="right"><input type="reset" value="Reset" /></td>
            	<td style="padding:20px;" align="left"><input type="submit" value="Submit" name="submit" /></td>
            </tr>
		</table>
        </form>
    </div>
    
	<?php
    include'include/footer.php';
    ?>    	
</div>
</body>
</html>