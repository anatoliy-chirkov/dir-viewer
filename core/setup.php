<?php

require_once 'config.php';


$query = "CREATE DATABASE " . DB;
$result = (new PDO(DSN_WITHOUT_DB, USER, PASSWORD))->prepare($query);
echo $result->execute() ? "Database created\n" : "Error while creating database\n";

$query = "CREATE TABLE directory (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255) NOT NULL, size VARCHAR(255),  type VARCHAR(60), last_modified DATETIME)";
$result = (new PDO(DSN, USER, PASSWORD))->prepare($query);
echo $result->execute() ? "Table created\n" : "Error while creating table\n";
