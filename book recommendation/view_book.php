<?php
	
	if (isset($_REQUEST['book']))
	{
		$file = 'admin/files_folder/'.$_REQUEST['book'];
		header('Content-type: application/pdf');
		header('Content-Description: inline; filename="' .$file. '"');
		header('Content-Transfer-Encoding: binary');
		header('Accept-Ranges: bytes');
		@readfile($file);
	}
	


?>