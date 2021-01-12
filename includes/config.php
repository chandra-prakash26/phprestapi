<?php

$servername = "localhost";
$username = "root";
$password = "8409270514@Cp";
$dbname = "testdb2";

try{
    $db = new PDO('mysql:host=127.0.0.1;dbname=' . $dbname . ';charset=utf8', $username, $password);
} catch(Exception $pde) {
    echo "Invalid details";
}

//set some db attributes
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

define('APP_NAME','PHP REST API TUTORIAL');

