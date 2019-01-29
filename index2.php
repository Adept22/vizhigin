<!DOCTYPE html>
<html>
     <head>
          <title>Document</title>
     </head>
     <body>
          <?php include "connect.php"; ?>
          <?php
               $s_size = false;
               if(isset($_GET['s_size']) && !empty($_GET['s_size'])) $s_size = $_GET['s_size'];
          ?>
          <form action="/index2.php" method="get">
               <legend>Выберите размер</legend>
               <select class="" name="s_size">
                    <?php if(!$s_size) { ?>
                         <option value="" selected>Все</option>
                    <?php } else { ?>
                         <option value="">Все</option>
                    <?php } ?>
                    <?php
                         $query = $connect->prepare("SELECT s_size FROM `shp_shoes_size` GROUP BY s_size ORDER BY s_size;");
                         $query->execute();

                         if($query) {
                              while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                   if($row['s_size'] == $s_size) {
                                        echo "<option value=\"" . $row['s_size'] . "\" selected>" . $row['s_size'] . "</option>";
                                   } else {
                                        echo "<option value=\"" . $row['s_size'] . "\">" . $row['s_size'] . "</option>";
                                   }
                              }
                              $query = null;
                         }
                    ?>
               </select>
               <button type="submit">Отправить</button>
          </form>
          <p>&nbsp;</p>
          <?php

               $sql = "SELECT ss.articul, sm.m_name, ss.s_name, ss.price, sss.s_size, sss.s_count FROM `shp_shoes` ss LEFT JOIN `shp_manufacturer`sm ON (ss.m_id = sm.m_id) LEFT JOIN `shp_shoes_size` sss ON (ss.articul = sss.articul)" . ($s_size !== false ? (" WHERE sss.s_size = " . $s_size) : "") . " GROUP BY ss.articul, sss.s_id ORDER BY sm.m_name, ss.articul, sss.s_size";

               $query = $connect->prepare($sql);
               $query->execute();

               echo "<table style='border-collase: collapse;' border='1'>";
               echo "<tr>";
               echo "<th>№</th>";
               echo "<th>Артикул</th>";
               echo "<th>Производитель</th>";
               echo "<th>Название</th>";
               echo "<th>Размер</th>";
               echo "<th>Количество</th>";
               echo "</tr>";
               if($query) {
                    $i = 1;
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                         echo "<tr>";
                         echo "<td>" . $i . "</td>";
                         echo "<td>" . $row['articul'] . "</td>";
                         echo "<td>" . $row['m_name'] . "</td>";
                         echo "<td>" . $row['s_name'] . "</td>";
                         echo "<td>" . $row['s_size'] . "</td>";
                         echo "<td>" . $row['s_count'] . "</td>";
                         echo "</tr>";
                         $i++;
                    }
                    $query = null;
               }
               echo "</table>";
          ?>
     </body>
</html>
