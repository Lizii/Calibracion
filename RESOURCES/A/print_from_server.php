<?php
	$filename = $_GET['filename'];

	ob_start();
	include $filename;
	$contents = ob_get_contents();
	ob_end_clean();

	$handle = printer_open("HP LaserJet 3015 Sistemas");
	printer_set_option($handle, PRINTER_MODE, "RAW");
	printer_write($handle, $contents);
	printer_close($handle);
?>