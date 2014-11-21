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
			$fhandle = fopen ($filename, "r");

			$contents = "";

    			while ($x<1) {
      				$data = @fread ($fhandle, filesize ($filename));
      				if (strlen($data) == 0) {
       				break;
      				}
      				$contents .= $data;
    			}
    			fclose ($fhandle);

			$explode = explode(".", $entry);
			$name = $explode[0];

			array_push($templates,array(
    				"name" => $name,
    				"template" => $contents,
			));
		}
	}

	echo json_encode($templates);

	closedir($handle);
}
?>
