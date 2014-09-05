<?php

// Connecting, selecting database
$link = mysql_connect('localhost', 'direwolf_se', 'gtrbbdET')
    or die('Could not connect: ' . mysql_error());
echo 'Connected successfully<br/>';

mysql_select_db('direwolf_se') or die('Could not select database<br/>');
echo "Selected db successfully<br/>";

// Performing SQL query
$query = "INSERT INTO 
		`JSCalendarErrors`
			(`state`, `errorMsg`, `url`, `lineNumber`) 
			VALUES ('" . 
				$_POST['state'] . "','" .
				$_POST['errorMsg'] . "','" .
				$_POST['url'] . "','" .
				$_POST['lineNumber'] . "'
			)";

echo $query . '<br/>';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());


// Closing connection
mysql_close($link);
?>