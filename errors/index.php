<?php

// Connecting, selecting database
$link = mysql_connect('localhost', 'direwolf_se', 'gtrbbdET')
    or die('Could not connect: ' . mysql_error());
echo 'Connected successfully<br/>';

mysql_select_db('direwolf_se') or die('Could not select database<br/>');
echo "Selected db successfully<br/>";

// Performing SQL query
$query = 'SELECT * FROM JSCalendarErrors';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// Printing results in HTML

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    
    foreach ($line as $col_value) {
        echo "<br>$col_value<br>";
    }
    echo "<br>";
}

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>