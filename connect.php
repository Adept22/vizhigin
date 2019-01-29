<?php
     ini_set('display_errors', 1);
     ini_set('display_startup_errors', 1);
     error_reporting(E_ALL);

     // Использовал PDO, потому что разрабатывал на PHP 7.2, а там mysql_connect удален.

     $host = "localhost"; // Имя сервера
     $user = "root";      // Имя пользователя
     $passwd = "root";    // Пароль
     $dbname = "shoes_shop";      //имя базы
     $connect = new PDO("mysql:host={$host};dbname={$dbname}", $user, $passwd);
?>
