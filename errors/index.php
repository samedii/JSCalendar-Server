<?php

// Connecting, selecting database
$link = mysql_connect('localhost', 'direwolf_se', 'gtrbbdET')
    or die('Could not connect: ' . mysql_error());
echo 'Connected successfully<br/>';

mysql_select_db('direwolf_se') or die('Could not select database<br/>');
echo "Selected db successfully<br/>";

// Performing SQL query
$query = 'SELECT id,errorMsg,url,lineNumber,date FROM JSCalendarErrors';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());



// Printing results in HTML
echo "<table style='border: 1px solid black;'>\n";
echo "<tr><th>id</th><th>error msg</th><th>url</th><th>line number</th><th>date</th></tr>";

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";

$id = -1;

    foreach ($line as $col_value) {
if($id == -1) {
$id = $col_value;
}
        echo "\t\t<td style='border: 1px solid black;'>$col_value</td>\n";
    }

echo "<td><a href='detailedError.php?id=$id'>Detailed view</a></td>";

    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>