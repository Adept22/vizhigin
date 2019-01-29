<?php
     // Использовал PDO, потому что разрабатывал на PHP 7.2, а там mysql_connect удален.

     $host = "localhost"; // Имя сервера
     $user = "root";      // Имя пользователя
     $passwd = "root";    // Пароль
     $dbname = "shoes_shop";      //имя базы
     $connect = new PDO("mysql:host={$host};dbname={$dbname}", $user, $passwd);
?>
