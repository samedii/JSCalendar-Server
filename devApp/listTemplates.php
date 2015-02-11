<?php
header('Content-Type: application/json');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


header("Access-Control-Allow-Origin: *");
if ($handle = opendir("./templates")) {

	$templates = array();

	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != "..") {

			$filename = "./templates/$entry";

      			$contents = file_get_contents($filename);

			array_push($templates, array(
    				"name" => $entry,
    				"template" => utf8_encode($contents),
			));

		}
	}

	echo json_encode($templates);

	closedir($handle);
}
?>
