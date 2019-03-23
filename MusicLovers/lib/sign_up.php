<?php
include'../include/dbconfig.php';
if(isset($_REQUEST['submit'])){
	$name = $_REQUEST['name'];
	$e_mail = $_REQUEST['e_mail'];
	$phone = $_REQUEST['phone'];
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$c_password = $_REQUEST['c_password'];
	
	if($password == $c_password){
	$ins = "INSERT into user(name,e_mail,phone,username,password) values('$name','$e_mail','$phone','$username','$password')";
	if(mysql_query($ins)){
		?>
        <script>
		alert("Sign Up Successfully...Thank you...");
		window.location.href="../index.php";
		</script>
        <?php
	}
	else{
		?>
        <script>
		alert("Error while Registring...Please Try Again...");
		window.location.href="../sign_up.php";
		</script>
        <?php
	}
	}
	else{
		?>
        <script>
		alert("Password didn't match with Confirm Password.");
		window.location.href="../sign_up.php";
		</script>
        <?php
	}
}
?>