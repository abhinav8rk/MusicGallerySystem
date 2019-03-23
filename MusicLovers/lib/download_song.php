<?php
include'../include/dbconfig.php';
$song_id = $_REQUEST['song_id'];
$folder_name = $_REQUEST['folder_name'];
$category = $_REQUEST['category'];
$sel = "SELECT * FROM song WHERE id='$song_id'";
$query = mysql_query($sel);
$row = mysql_fetch_array($query);
$file = "../uploads/".$category."/".$folder_name."/".$row['name'].".mp3";

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
?>
