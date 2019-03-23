<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/container.css" rel="stylesheet" type="text/css" media="all" />
<script>
function validateForm() {
    var x = document.forms["myForm"]["search"].value;
    if (x == null || x == "") {
        alert("Please type some song name or singer name here.");
        return false;
    }
}
</script>
</head>

<body>
    <div id="header">
		<?php
		error_reporting(0);
		include'lib/login.php';
		if($_SESSION["username"] == ""){
		?>
        <h3>
       	<form action="lib/login.php" method="post">
        <input type="text" name="username" placeholder="User Name" required="required" />&nbsp;&nbsp;
        <input type="password" name="password" placeholder="Password" required="required"/>&nbsp;&nbsp;
        <input type="submit" value="Log In" name="login" /><br /><a href="sign_up.php">New User</a>
        </form>
        </h3>
        <?php
		}
		else{
			$uname = $_SESSION['username'];
			$name = mysql_query("SELECT * FROM user WHERE username='$uname'");
			$row_name = mysql_fetch_array($name);
			?>
            <h2><?php echo "Welcome "?><a href="user_index.php"><?php echo $row_name['name'];?></a></h2>
            <h3>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href="lib/log_out.php">Log Out</a></h3>
            <?php
		}
		?>
        <img src="image/banner.jpg" />
    </div>
</body>
</html>