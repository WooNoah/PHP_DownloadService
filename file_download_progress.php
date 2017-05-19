<?php 
	
	require "FileDownService.php";	

	$file_name1 = $_REQUEST['filename'];
	// echo $file_name1;

	download_progress($file_name1,"/FileDownload/res/");
?>