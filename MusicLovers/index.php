<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/container.css" type="text/css" media="all" rel="stylesheet" />
<link rel="icon" href="image/m-for-music.png" />
<title>Welcome to MusicLovers.Com</title>
</head>

<body>
	<div id="container">
    
		<?php
		include('include/header.php');
		?>
		<div id="navigator">
    		<hr style="margin:0px;"/>
    			&nbsp;&nbsp;&nbsp;&nbsp;<b>Home</b>
        	<hr style="margin:0px;"/>
		</div>
    	<?php
		include('include/search.php');
        include('include/section1.php');
		include('include/section2.php');
		include('include/footer.php');
		?>

	</div>
</body>
</html>