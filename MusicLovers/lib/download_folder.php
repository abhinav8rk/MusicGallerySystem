<?php
include'../include/dbconfig.php';
$folder_id = $_REQUEST['folder_id'];
$category = $_REQUEST['category'];
$folder_name = $_REQUEST['folder_name'];
$cqurfetch=mysql_query("SELECT * from song WHERE folder_id='$folder_id'");
$file_names = array();

while($row = mysql_fetch_array($cqurfetch, MYSQL_NUM))
{
	//Add the values to the array
	//Below 8 ,eams the the number of the mysql table column
   $file_names[] = $row[8];
}
function zipFilesAndDownload($file_names,$archive_file_name,$file_path)
{
	$zip = new ZipArchive();
	//create the file and throw the error if unsuccessful
	if ($zip->open($archive_file_name, ZIPARCHIVE::CREATE )!==TRUE) {
    	exit("cannot open <$archive_file_name>");
	}
	//add each files of $file_name array to archive
	foreach($file_names as $files)
	{
  		$zip->addFile($file_path.$files,$files);
		//echo $file_path.$files,$files."";
	}
	$zip->close();
	//then send the headers to foce download the zip file
	header("Content-type: application/zip"); 
	header("Content-Disposition: attachment; filename=$archive_file_name"); 
	header("Pragma: no-cache"); 
	header("Expires: 0"); 
	readfile("$archive_file_name");
	exit;
}
 
//Archive name
$archive_file_name=$folder_name.'.zip';
 
//Download Files path
$file_path=dirname(__FILE__)."../uploads/".$category."/".$folder_name."/";
 
//cal the function
zipFilesAndDownload($file_names,$archive_file_name,$file_path);
?>