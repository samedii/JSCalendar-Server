<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


header("Access-Control-Allow-Origin: *");
if ($handle = opendir("./templates")) {

	$templates = array();

	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != "..") {

			$template = file_get_contents("./templates/$entry");

			$explode = explode(".", $entry);
			$name = $explode[0];

			array_push($templates,array(
    				"name" => $name,
    				"template" => $template,
			));
		}
	}

	echo json_encode($templates);

	closedir($handle);
}
?>
