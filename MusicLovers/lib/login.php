<?php
session_start();
error_reporting(0);
mysql_connect("localhost","root","");
mysql_select_db("ml");
if(isset($_REQUEST['login'])){
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$sql = "SELECT * FROM user where username='".$username."' and password='".$password."' limit 1";
	$rea = mysql_query($sql);
	
if(mysql_num_rows($rea)==1){
	session_start();
	$_SESSION["username"] = $username;
	header("location:../user_index.php");	
}
else{
	?>
	<script>
    alert("Username or Password is incorrect...Please Try Again...");
	window.location.href="../index.php";
    </script>
    <?php
	exit();
}
}
?>
