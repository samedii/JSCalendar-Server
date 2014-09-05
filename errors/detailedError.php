<html>
<head>
</head>
<body>

<?php

// Connecting, selecting database
$link = mysql_connect('localhost', 'direwolf_se', 'gtrbbdET')
    or die('Could not connect: ' . mysql_error());
echo 'Connected successfully<br/>';

mysql_select_db('direwolf_se') or die('Could not select database<br/>');
echo "Selected db successfully<br/>";

// Performing SQL query
$query = 'SELECT state,id,errorMsg,url,lineNumber,date FROM JSCalendarErrors WHERE id=' . $_GET['id'];
$result = mysql_query($query) or die('Query failed: ' . mysql_error());


echo "<table style='border: 1px solid black;'>\n";

$state = -1;

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";

foreach ($line as $col_value) {
	if($state == -1) {
		$state = $col_value;
		continue;
	}

        echo "\t\t<td style='border: 1px solid black;'>$col_value</td>\n";
    }

    echo "\t</tr>\n";

echo "</table>\n";
}

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);

?>

<form>
      <div id="inputcontainer"><textarea id="text" rows="12" style="display:none;"><?php echo $state ?></textarea></div>
      <div id="output" class="output"></div>
   </form>


<script type="text/javascript" src="/JSCalendar-Server/json2html/scripts/json-min.js"></script>
<script type="text/javascript" src="/JSCalendar-Server/json2html/scripts/BubbleTooltips.js"></script>
<script type="text/javascript" src="/JSCalendar-Server/json2html/scripts/parse.js"></script>
<script>
doParse();
</script>

</body>
</html>