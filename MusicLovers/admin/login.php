<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Login Page</title>
</head>
<body>
    <form method="post" action="lib/login.php">
        <table align="center">
            <tr align="center">
                <th colspan="2">Login Panel</th>    
            </tr>
            <tr align="center">
                <td>Admin Name</td>
                <td><input type="text" name="admin" required="required"/></td>
            </tr>
            <tr align="center">
                <td>Password</td>
                <td><input type="password" name="password" required="required"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" name="submit" value="Log In" /></td>
            </tr>
        </table>
    </form>
</body>
</html>
