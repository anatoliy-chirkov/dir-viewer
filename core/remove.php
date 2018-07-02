<?php

require_once 'config.php';


$query = "DROP DATABASE " . DB;
$result = (new PDO(DSN_WITHOUT_DB, USER, PASSWORD))->prepare($query);

echo $result->execute() ? "Database removed\n" : "Error\n";
