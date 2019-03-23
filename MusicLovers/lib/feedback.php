<?php

include'../include/dbconfig.php';
if(isset($_REQUEST['submit'])){
	$name = $_REQUEST['name'];
	$e_mail = $_REQUEST['e_mail'];
	$subject = $_REQUEST['subject'];
	$message = $_REQUEST['message'];
	$date = date("Y-m-d");
	
	$ins = "INSERT into feedback(name,e_mail,subject,message,date) values('$name','$e_mail','$subject','$message','$date')";
	if(mysql_query($ins)){
		?>
        <script>
		alert("Your Message has been sent successfully!!! Thank you...");
		window.location.href="../feedback.php";
		</script>
        <?php
	}
	else{
		?>
        <script>
		alert("Message Sending fail...Try Again...");
		window.history.back();
		</script>
        <?php
	}
}

?>