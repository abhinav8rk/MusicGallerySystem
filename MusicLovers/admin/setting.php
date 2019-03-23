<?php
include'lib/login.php';
if($_SESSION["admin"]==""){
	header("location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/add_audio.css" />
<link rel="stylesheet" type="text/css" href="include/css/admin.css" />
<title>Account Setting</title>
</head>
<body>
<?php
include_once ('include/main.php');
$sel = "SELECT * from admin";
$result_set = mysql_query($sel);
$row = mysql_fetch_array($result_set);
?>
<div id="add_form"><center>Account Setting</center><p>
    	<table border="2px" align="center">
            <form method="post" action="lib/change_ac.php" enctype="multipart/form-data">
            <tr>
                <td>Change Admin Name </td>
                <td><input type="text" name="name" required="required" value="<?php echo $row['name'];?>"/></td>
            </tr>
            <tr>
                <td>Old Password </td>
                <td><input type="password" name="pass" required="required"/></td>
            </tr>
            <tr>
                <td>New Pasword </td>
                <td><input type="password" name="new_pass" required="required"/></td>
            </tr>
            <tr>
                <td>Confirm New Pasword </td>
                <td><input type="password" name="confirm_pass" required="required" /></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" name="change" value="Change" /></td>
            </tr>
            </form>
		</table>
</div>
</body>
</html>