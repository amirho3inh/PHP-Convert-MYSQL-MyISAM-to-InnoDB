<?php

$server = 'server';
$username = 'username';
$password = 'password';
$database = 'database';

$conn = mysqli_connect($server, $username, $password,$database) or die('unable to connect to msql server: ' . msql_error());

$result = mysqli_query($conn, "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = '$database'
        AND ENGINE = 'MyISAM'");

if (!$result) {
    die('query failed: ');
}
while ($row = mysqli_fetch_array($result)) {
    $tbl = $row[0];
    $sql = "ALTER TABLE $tbl ENGINE=INNODB;";
    #Command Reference: ALTER TABLE tableName ENGINE=MyISAM
    mysqli_query($conn, $sql);
    echo $tbl . ' : OK! </br>';
}
