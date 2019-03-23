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
<title>Welcome <?php echo $_SESSION["admin"]; ?></title>
</head>
<body>
<?php
include_once ('include/main.php');
include'include/dbconfig.php';
?>
<div id="add_form">
    <table border="2px" align="center">
    <tr>
    	<th colspan="7">Music Lover's Messages </th>
    </tr>
        <tr>
        	<th>Sr. No.</th>
            <th>Name </th>
            <th>E-Mail</th>
            <th>Subject</th>           
            <th width="400">Message</th>
            <th>Date</th>
            <th>Delete Message</th>            
        </tr>
            <?php
				$i=1;
				$sel = "SELECT * from feedback order by date desc";
				$result_set = mysql_query($sel);
				while($row = mysql_fetch_array($result_set))
				{?>
                <tr>
                	<td><?php echo $i;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['e_mail'];?></td>
                    <td><?php echo $row['subject'];?></td>
                    <td><?php echo $row['message'];?></td>
                    <td><?php echo $row['date'];?></td>
                	<td><a href="lib/delete_msg.php?id=<?php echo $row['id']; ?>"><center><img src="image/Delete_Marker.png" height="40px"/></center></a></td>
				</tr>	
				 <?php
				 $i++;	
				}
            ?>
    </table>
</div>
</body>
</html>