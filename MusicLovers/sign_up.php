<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="image/m-for-music.png" />
<link href="css/container.css" rel="stylesheet" type="text/css" media="all"  />
<link href="css/new_home.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/music_folder.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/song_list.css" rel="stylesheet" type="text/css" media="all" />
<title>Sign Up</title>
</head>

<body>
<div id="container">
	<?php
    include'include/header.php';
	?>
    <div id="navigator">
    <hr style="margin:0px;"/>
    	&nbsp;&nbsp;<a href="index.php">Home</a> >> <b>Sign Up</b> 
        <hr style="margin:0px;"/>
	</div>
    <?php
    include'include/search.php';
	include'include/section1.php';
    ?>
    <div id="section2">
    	<form action="lib/sign_up.php" method="post">
		<table id="feature" cellspacing="1" width="800">
			<tr>
				<td colspan="2" id="folder_head">Sign Up</td>
            </tr>
            <tr>
            	<td style="font-family:Arial, Helvetica, sans-serif; padding:10px; font-size:18px;">Name <sup>*</sup></td>
				<td style="padding:10px;"><input style="width:200px;height:20px;" type="text" name="name" required="required" title="Name field should be filled." /></td>
            </tr>
            <tr>
            	<td style="font-family:Arial, Helvetica, sans-serif; padding:10px; font-size:18px;">E-mail <sup>*</sup></td>
				<td style="padding:10px;"><input style="width:200px;height:20px;" type="text" name="e_mail" required="required" title="E-Mail field should be filled."/></td>
            </tr>
            <tr>
            	<td style="font-family:Arial, Helvetica, sans-serif; padding:10px; font-size:18px;">Phone no. <sup>*</sup></td>
				<td style="padding:10px;"><input style="width:200px;height:20px;" type="number" name="phone" required="required" title="Phone no. field should be filled." /></td>
            </tr>
            <tr>
            	<td style="font-family:Arial, Helvetica, sans-serif; padding:10px; font-size:18px; vertical-align:top;">Username <sup>*</sup></td>
				<td style="padding:10px;"><input style="width:200px;height:20px;" type="text" name="username" required="required" title="Username field should be filled." ></td>
            </tr>	
            <tr>
            	<td style="font-family:Arial, Helvetica, sans-serif; padding:10px; font-size:18px; vertical-align:top;">Password <sup>*</sup></td>
				<td style="padding:10px;"><input style="width:200px;height:20px;" type="password" name="password" required="required" title="Password field should be filled." ></td>
            </tr>
            <tr>
            	<td style="font-family:Arial, Helvetica, sans-serif; padding:10px; font-size:18px; vertical-align:top;">Confirm Password <sup>*</sup></td>
				<td style="padding:10px;"><input style="width:200px;height:20px;" type="password" name="c_password" required="required" title="Confirm Password field should be filled." ></td>
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