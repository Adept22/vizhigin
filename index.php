<!DOCTYPE html>
<html>
     <head>
          <title>Document</title>
     </head>
     <body>
          <?php
               include "connect.php";

               $query = $connect->query("SELECT * FROM `shp_shoes` ss LEFT JOIN `shp_shoes_size` sss ON (ss.articul = sss.articul) WHERE sss.delivered_at > 0 GROUP BY sss.s_id;");

               if (!$query) exit("Ошибка выполнения запроса" . mysql_error());

               echo "<table style='border-collase: collapse;' border='1'>";
               echo "<tr>";
               echo "<td>№</td>";
               echo "<td>Артикул</td>";
               echo "<td>Название</td>";
               echo "<td>Размер</td>";
               echo "<td>Количество</td>";
               echo "<td>Дата поставки</td>";
               echo "</tr>";
               $i = 1;
               foreach($query as $row) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $row['articul'] . "</td>";
                    echo "<td>" . $row['s_name'] . "</td>";
                    echo "<td>" . $row['s_size'] . "</td>";
                    echo "<td>" . $row['s_count'] . "</td>";
                    echo "<td>" . date("d F Y", strtotime(date("Y-m-d H:i:s")) + $row['delivered_at']) . "</td>";
                    echo "</tr>";
                    $i++;
               }
               echo "</table>";
          ?>
     </body>
</html>
