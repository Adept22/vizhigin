<?php
     // Использовал PDO, потому что разрабатывал на PHP 7.2, а там mysql_connect удален.

     $host = "localhost"; // Имя сервера
     $user = "root";      // Имя пользователя
     $passwd = "root";    // Пароль
     $dbname = "shoes_shop";      //имя базы
     try {
          $connect = new PDO("mysql:host={$host};dbname={$dbname}", $user, $passwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
     } catch (PDOException $e) {
          echo 'Подключение не удалось: ' . $e->getMessage();
          exit();
     }
?>
