<?php
include'../include/dbconfig.php';
$id = $_REQUEST['id'];
$del = "DELETE from feedback WHERE id='$id'";
if(mysql_query($del)){
	?>
    <script>
	alert("Record deleted successfully.");
	window.location.href="../index.php";
	</script>
    <?php
}
else{
	?>
    <script>
	alert("Error while record deletion.");
	window.location.href="../index.php";
	</script>
    <?php
}
?>