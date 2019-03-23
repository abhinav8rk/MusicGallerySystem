<?php
session_start();
include_once '../include/dbconfig.php';
if(isset($_REQUEST['submit'])){
	$admin = $_REQUEST['admin'];
	$password = $_REQUEST['password'];
	$sql = "SELECT * from admin where name='".$admin."' and password='".$password."' limit 1";
	$rea = mysql_query($sql);
if(mysql_num_rows($rea)==1){
	header("location:../index.php");
	$_SESSION["admin"] = $admin;
}
else{
	?>
	<script>
    alert("Admin name or Password is incorrect...Please Try Again...");
	window.location.href="../login.php";
    </script>
    <?php
	exit();
}
}
?>
