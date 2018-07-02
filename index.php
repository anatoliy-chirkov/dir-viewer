<?php

require_once 'core/config.php';

require_once 'controller/MainController.php';
require_once 'model/DirectoryModel.php';
require_once 'model/DirectoryScanner.php';

function getConnection()
{
    try {
        return new PDO(DSN, USER, PASSWORD);
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
    }
}

(new MainController())->showDirectories(isset($_GET['refresh']));
