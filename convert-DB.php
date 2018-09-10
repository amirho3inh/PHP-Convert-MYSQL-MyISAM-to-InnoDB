<?php

$server = 'server';
$username = 'username';
$password = 'password';
$database = 'database';

$conn = mysqli_connect($server, $username, $password,$database) or die('unable to connect to msql server: ' . msql_error());

$result = mysqli_query('show tables;');
if (!$result) {
    die('query failed: ');
}
while ($row = mysqli_fetch_array($rs)) {
    $tbl = $row[0];
    $sql = "ALTER TABLE $tbl ENGINE=INNODB;";
    #Command Reference: ALTER TABLE tableName ENGINE=MyISAM
    mysqli_query($sql);
    echo $tbl . ' : OK!';
}
