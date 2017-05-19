<?php


	function download_progress($file_name, $file_sub_path) {

		//对文件中的中文进行转码
		$file_name = iconv("utf-8", "gb2312", $file_name);

		//绝对路径
		$file_path = $_SERVER['DOCUMENT_ROOT'].$file_sub_path.$file_name;

		if (!file_exists($file_path)) {
			echo "<script language = 'javascript'>window.alert('对不起，您选择的文件不存在')</script>";
			return;
		}

		$fp = fopen($file_path, "r");

		//get the file size
		$file_size = filesize($file_path);
		echo "file_size:".$file_size;

		header("Content-type: application/octet_stream");
		header("Accept-Ranges: bytes");
		header("Accept-Length:".$file_size);
		header("Content-Disposition: attachment; filename: $file_name");


		$buffer = 1024;
		$file_count = 0;

		while (!feof($fp) && ($file_count < $file_size)) {
			$file_data = fread($fp, $buffer);
			$file_count += $buffer;
			echo $file_data;
		}

		//关闭文件
		$fclose($fp);
	}

?>