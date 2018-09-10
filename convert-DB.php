<?php

$server = 'server';
$username = 'username';
$password = 'password';
$database = 'database';

$conn = mysql_connect($server, $username, $password) or die('unable to connect to msql server: ' . msql_error());
mysql_select_db($database, $conn) or die("unable to select database 'db': " . msql_error());

$result = mysql_query('show tables;');
if (!$result) {
    die('query failed: ');
}
while ($row = mysql_fetch_array($rs)) {
    $tbl = $row[0];
    $sql = "ALTER TABLE $tbl ENGINE=INNODB;";
    #Command Reference: ALTER TABLE tableName ENGINE=MyISAM
    mysql_query($sql);
    echo $tbl . ' : OK!';
}
